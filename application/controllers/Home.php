<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->lang->load('auth');
        $this->load->model('room_model');
        if (!$this->ion_auth->logged_in()) {
            redirect('auth');
        }
    }

    public function index() {
        if ($this->ion_auth->is_admin()) {
            redirect('auth/index');
        } else {
            $data['userData'] = $this->room_model->get_user_data();
            $data['userSchool'] = $this->room_model->get_user_school();
            $data['members'] = $this->mySchoolMembers();
            renderView('home', $data);
        }
    }

    public function profile($id = 0) {
        $data['userData'] = $this->room_model->get_user_data();
        $data['profile'] = $this->room_model->get_user_data($id);
        $data['school'] = $this->room_model->get_user_school($id);
        renderView('profile', $data);
    }

    private function mySchoolMembers() {
        $members = array();
        $schoolMembers = $this->room_model->get_school_members();
        foreach ($schoolMembers as $value) {
            $members[] = $value->user_id;
        }
        return $members;
    }

}
