<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use BigBlueButton\BigBlueButton;
use BigBlueButton\Parameters\CreateMeetingParameters;

class Meeting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('meeting_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
    }

    public function create() {
        renderView('meeting/create');
    }
    
    public function edit($id) {
        $userData = $this->user_model->get_user_data();
        $meeting = $this->meeting_model->get_meeting_data($id);
        if($userData->id == $meeting->user_id){
           $data['meeting'] =  $meeting;
           renderView('meeting/edit', $data);
        }else{
            redirect('home');
        }
    }
    
    public function delete($id) {
        $userData = $this->user_model->get_user_data();
        $meeting = $this->meeting_model->get_meeting_data($id);
        if($userData->id == $meeting->user_id){
           $data['meeting'] =  $meeting;
           renderView('meeting/delete', $data);
        }else{
            redirect('home');
        }
    }

    public function store() {
        $userData = $this->user_model->get_user_data();
        $this->db->insert('meetings', array(
            'name' => $this->input->post('name'),
            'moderator' => $this->input->post('moderator'),
            'attendee' => $this->input->post('attendee'),
            'user_id' => $userData->id
        ));
        
        redirect('home');
    }
    
    public function update($id) {
        $this->db->update('meetings', array(
            'name' => $this->input->post('name'),
            'moderator' => $this->input->post('moderator'),
            'attendee' => $this->input->post('attendee')
        ), array('id' => $id));
        
        redirect('home');
    }
    
    public function destroy($id) {
        $this->db->delete('meetings', array('id' => $id));
        redirect('home');
    }
    
}
