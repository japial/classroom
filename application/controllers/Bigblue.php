<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->load->database();
        $this->lang->load('auth');
        $this->load->model('room_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
    }
    
     public function create()
    {
        try {
            $data = $this->getRequest();

            $bbb = new BigBlueButton();
            $createMeetingParams = new CreateMeetingParameters($data->meeting_id, $data->meeting_name);
            $createMeetingParams->setAttendeePassword($data->attendee_password);
            $createMeetingParams->setModeratorPassword($data->moderator_password);

            if (isset($data->is_recording)) {
                $createMeetingParams->setRecord(true);
                $createMeetingParams->setAllowStartStopRecording(true);
                $createMeetingParams->setAutoStartRecording(true);
            }

            $response = $bbb->createMeeting($createMeetingParams);

            if ($response->getReturnCode() == 'FAILED') {
                return 'Can\'t create room! please contact our administrator.';
            } else {
                echo('<pre>');
                print_r($response);
                echo('</pre>');
            }
        } catch (\Exception $e) {
            return show_error('Internal error '.$e, 500);
        }
    }

    public function join() {
        $meeting = $this->input->post('meeting');
        return $meeting;
    }
    
    private function getRequest()
    {
        $request = json_decode(file_get_contents('php://input'));
        if (is_null($request) || empty($request)) {
            return show_error('Data not found!', 404);
        }
        putenv("BBB_SECURITY_SALT=$request->security_salt");
        putenv("BBB_SERVER_BASE_URL=$request->server_base_url");
        return $request;
    }

}
