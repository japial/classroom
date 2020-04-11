<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once './vendor/autoload.php';

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;
use BigBlueButton\Parameters\JoinMeetingParameters;
use BigBlueButton\Parameters\EndMeetingParameters;
use BigBlueButton\Parameters\GetMeetingInfoParameters;
use BigBlueButton\Parameters\GetRecordingsParameters;
use BigBlueButton\Parameters\DeleteRecordingsParameters;

class Bigblue extends CI_Controller
{
    private $securitySalt = '8cd8ef52e8e101574e400365b55e11a6';
    private $serverBaseUrl = 'http://test-install.blindsidenetworks.com/bigbluebutton/';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('meeting_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
        putenv("BBB_SECURITY_SALT=$this->securitySalt");
        putenv("BBB_SERVER_BASE_URL=$this->serverBaseUrl");
    }

    public function create($id)
    {
        $meeting = $this->meeting_model->get_meeting_data($id);
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
                renderView('meeting/error', array('error' => 'responseFailed'));
            } else {
                $joinUrl = $this->getJoinUrl($meeting->mid, $meeting->moderator);
                redirect($joinUrl);
            }
        } catch (\Exception $e) {
            renderView('meeting/error', array('error' => $e));
        }
    }

    public function join($id)
    {
        $meeting = $this->meeting_model->get_meeting_data($id);
        $joinUrl = $this->getJoinUrl($meeting->mid, $meeting->attendee);
        redirect($joinUrl);
    }

    private function getJoinUrl($meetingID, $password)
    {
        $bbb = new BigBlueButton();
        $userData = $this->user_model->get_user_data();
        $name = $userData->first_name.' '.$userData->last_name;
        $joinMeetingParams = new JoinMeetingParameters($meetingID, $name, $password);
        $joinMeetingParams->setRedirect(true);
        $joinMeetingParams->setJoinViaHtml5(true);
        $url = $bbb->getJoinMeetingURL($joinMeetingParams);
        return $url;
    }

    public function meeting_info($id) {
        $bbb = new BigBlueButton();
        $meeting = $this->meeting_model->get_meeting_data($id);
        $getMeetingInfoParams = new GetMeetingInfoParameters($meeting->mid, '', $meeting->moderator);
        $response = $bbb->getMeetingInfo($getMeetingInfoParams);
        if ($response->getReturnCode() == 'FAILED') {
            $liveMeeting = FALSE;
        } else {
           $liveMeeting = $this->meetingDataFilter($response->getRawXml());
        }
        echo json_encode($liveMeeting);
    }
    
    public function meetings() {
        $bbb = new BigBlueButton();
        $response = $bbb->getMeetings();
        $meetings = array();
        if ($response->getReturnCode() == 'SUCCESS') {
            $simpleXML = $response->getRawXml()->meetings->meeting;
            foreach ($simpleXML as $value) {
                $meetings[] = $this->meetingDataFilter($value);
            }
        }
        echo json_encode($meetings);
    }
    
    public function recordings($mid = 0){
        $recordingParams = new GetRecordingsParameters();
        if($mid){
           $recordingParams->setMeetingID($mid);
        }
        $bbb = new BigBlueButton();
        $response = $bbb->getRecordings($recordingParams);
        $recordings = array();
        if ($response->getReturnCode() == 'SUCCESS') {
            foreach ($response->getRawXml()->recordings->recording as $recording) {
                $recordings[] = $recording;
            }
        }
        echo json_encode($recordings);
    }
    
    public function delete_recording($id) {
        $meeting = $this->meeting_model->get_meeting_data($id);
        if($meeting){
            $bbb = new BigBlueButton();
            $deleteRecordingsParams= new DeleteRecordingsParameters($meeting->mid);
            $response = $bbb->deleteRecordings($deleteRecordingsParams);
            if ($response->getReturnCode() == 'SUCCESS') {
                echo 'success';
            } else {
                echo 'failed';
            }
        }else{
            echo 'NotFound';
        }
    }

     private function meetingDataFilter($value) {
        $info['mid'] = (string) $value->meetingID;
        $info['name'] = (string) $value->meetingName;
        $info['running'] = (string) $value->running;
        $info['createTime'] = (string) $value->createTime;
        $info['startTime'] = (string) $value->startTime;
        $info['endTime'] = (string) $value->endTime;
        $info['date'] = (string) $value->createDate;
        $info['duration'] = (string) $value->duration;
        $info['userJoined'] = (string) $value->hasUserJoined;
        $info['recording'] = (string) $value->recording;
        $info['maxUsers'] = (string) $value->maxUsers;
        $info['moderator'] = (string) $value->moderatorCount;
        $info['participant'] = (string) $value->participantCount;
        $info['listener'] = (string) $value->listenerCount;
        $info['speaker'] = (string) $value->voiceParticipantCount;
        $info['video'] = (string) $value->videoCount;
        $info['attendees'] =  $value->attendees;
            
        return $info;
    }

}
