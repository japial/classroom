<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once './vendor/autoload.php';

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use BigBlueButton\Parameters\EndMeetingParameters;
use BigBlueButton\Parameters\GetMeetingInfoParameters;
use BigBlueButton\Parameters\GetRecordingsParameters;
use BigBlueButton\Parameters\DeleteRecordingsParameters;

class Bigblue extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('meeting_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
    }
    
    public function create($meeting = array())
    {
        $meetingID = $this->input->post('meeting_id');
        $meetingName = $this->input->post('meeting_name');
        $attendee_password = $this->input->post('moderator');
        $moderator_password = $this->input->post('attendee');
        $this->setConfigValue();
        try {
            $bbb = new BigBlueButton();
   
            $createMeetingParams = new CreateMeetingParameters($meetingID, $meetingName);
            $createMeetingParams->setAttendeePassword($attendee_password);
            $createMeetingParams->setModeratorPassword($moderator_password);
            $createMeetingParams->setDuration(40);
            $createMeetingParams->setLogoutUrl('http://classroom.local');
            $createMeetingParams->setRecord(true);
            $createMeetingParams->setAllowStartStopRecording(true);
            $createMeetingParams->setAutoStartRecording(true);

            $response = $bbb->createMeeting($createMeetingParams);
            if ($response->getReturnCode() == 'FAILED') {
                renderView('meeting/error',array('error' => 'responseFailed'));
            } else {
                $joinUrl = $this->joinTeacher($meetingID, $moderator_password);
                redirect($joinUrl);
            }
        } catch (\Exception $e) {
            renderView('meeting/error',array('error' => $e));
        }
    }

    public function join() {
        $this->setConfigValue(1);
        $bbb = new BigBlueButton();
        $userData = $this->user_model->get_user_data();
        $name = $userData->first_name.' '.$userData->last_name;
        $meetingID = $this->input->post('meeting');
        $password = $this->input->post('password');
        $joinMeetingParams = new JoinMeetingParameters($meetingID, $name, $password);
        $joinMeetingParams->setRedirect(true);
        $joinMeetingParams->setJoinViaHtml5(true);
        $joinUrl = $bbb->getJoinMeetingURL($joinMeetingParams);
        redirect($joinUrl);
    }
    
    private function joinTeacher($meetingID, $password) {
        $bbb = new BigBlueButton();
        $userData = $this->user_model->get_user_data();
        $name = $userData->first_name.' '.$userData->last_name;
        $joinMeetingParams = new JoinMeetingParameters($meetingID, $name, $password);
        $joinMeetingParams->setRedirect(true);
        $url = $bbb->getJoinMeetingURL($joinMeetingParams);
        return $url;
    }
    
    private function setConfigValue($html = 0) {
        $securitySalt = '2sqX6A7LiUNRP2ndgE5PPnM7ksUNJM7CxUiAxul1LU';
        if($html){
            $serverBaseUrl = 'https://edoozz.org/bigbluebutton/html5client/'; 
        }else{
            $serverBaseUrl = 'https://edoozz.org/bigbluebutton/';
        }
        putenv("BBB_SECURITY_SALT=$securitySalt");
        putenv("BBB_SERVER_BASE_URL=$serverBaseUrl"); 
    }
}
