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
    
    public function get_school_meetings($school){
        $schoolteachers = $this->get_school_teachers($school);
        $meetings = array();
        foreach ($schoolteachers as $teacher) {
             $meetings[] = $this->get_teacher_meetings($teacher->id);
        }
        return $this->array_2d_to_1d($meetings);
    }
    
    public function get_meeting_data($id){
        $this->db->select("meetings.id, meetings.name, meetings.user_id, meetings.moderator, meetings.attendee, users.first_name as teacher");
        $this->db->from('meetings');
        $this->db->join('users', 'users.id=meetings.id', 'inner');
        $this->db->where('meetings.id', $id);
        return $this->db->get()->row();
    }
    
    public function get_school_teachers($school) {
        $this->db->select("users.id");
        $this->db->from('user_school');
        $this->db->join('users', 'users.id=user_school.user_id', 'inner');
        $this->db->where('user_school.school_id', $school);
        return $this->db->get()->result();
    }
    
    private function array_2d_to_1d($input_array)
    {
        $output_array = array();
        for ($i = 0; $i < count($input_array); $i++) {
            for ($j = 0; $j < count($input_array[$i]); $j++) {
                $output_array[] = $input_array[$i][$j];
            }
        }
        return $output_array;
    }

}
