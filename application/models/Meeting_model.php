<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Room_model
 *
 * @author ClassTune
 */
class Meeting_model extends CI_Model{
    
    public function get_teacher_meetings($user_id){
        $this->db->select("meetings.id, meetings.name, meetings.user_id, meetings.moderator, meetings.attendee, users.first_name as teacher");
        $this->db->from('meetings');
        $this->db->join('users', 'users.id=meetings.id', 'inner');
        $this->db->where('meetings.user_id', $user_id);
        return $this->db->get()->result();
    }
    
    public function get_meeting_data($id){
        $this->db->select("meetings.id, meetings.name, meetings.user_id, meetings.moderator, meetings.attendee, users.first_name as teacher");
        $this->db->from('meetings');
        $this->db->join('users', 'users.id=meetings.id', 'inner');
        $this->db->where('meetings.id', $id);
        return $this->db->get()->row();
    }

}
