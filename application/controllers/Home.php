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
    
    public function profile_photo()
    {
        $userData =  $this->room_model->get_user_data();
        $imagePath = $this->file_upload();
        if ($userData->image) {
            if($userData->image != 'assets/profile/noimage.jpg' && file_exists($userData->image)){
                 unlink($userData->image);
            }
            $this->db->update('user_image', 
                array('image' => $imagePath), 
                array('user_id' => $userData->id)
           );
        }else{
            $this->db->insert('user_image', 
                array('user_id' => $userData->id,'image' => $imagePath)
            );
        }
        redirect('/home/profile');
    }

    private function mySchoolMembers() {
        $members = array();
        $schoolMembers = $this->room_model->get_school_members();
        foreach ($schoolMembers as $value) {
            $members[] = $value->user_id;
        }
        return $members;
    }
    
    private function file_upload()
    {
        $config = array(
            'upload_path' => "./assets/profile/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'max_size' => "8048",
            'encrypt_name' => TRUE
        );
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('pphoto')) {
            $data = $this->upload->data();
            return 'assets/profile/' . $data['file_name'];
        } else {
            return 'assets/profile/noimage.jpg';
        }
    }


}
