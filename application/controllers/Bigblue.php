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
    
    public function create($id)
    {
        $meeting = $this->meeting_model->get_meeting_data($id);
        $this->setConfigValue();
        try {
            $bbb = new BigBlueButton();
   
            $createMeetingParams = new CreateMeetingParameters($meeting->mid, $meeting->name);
            $createMeetingParams->setAttendeePassword($meeting->attendee);
            $createMeetingParams->setModeratorPassword($meeting->moderator);
            $createMeetingParams->setLogoutUrl(base_url());
            $createMeetingParams->setRecord(true);
            $createMeetingParams->setAllowStartStopRecording(true);
            $createMeetingParams->setAutoStartRecording(true);

            $response = $bbb->createMeeting($createMeetingParams);
            if ($response->getReturnCode() == 'FAILED') {
                renderView('meeting/error',array('error' => 'responseFailed'));
            } else {
                $joinUrl = $this->getJoinUrl($meeting->mid, $meeting->moderator);
                redirect($joinUrl);
            }
        } catch (\Exception $e) {
            renderView('meeting/error',array('error' => $e));
        }
    }

    public function join($id) {
        $this->setConfigValue(1);
        $meeting = $this->meeting_model->get_meeting_data($id);
        $joinUrl = $this->getJoinUrl($meeting->mid, $meeting->attendee);
        redirect($joinUrl);
    }
    
    private function getJoinUrl($meetingID, $password){
        $bbb = new BigBlueButton();
        $userData = $this->user_model->get_user_data();
        $name = $userData->first_name.' '.$userData->last_name;
        $joinMeetingParams = new JoinMeetingParameters($meetingID, $name, $password);
        $joinMeetingParams->setRedirect(true);
        $joinMeetingParams->setJoinViaHtml5(true);
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
