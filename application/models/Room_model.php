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
 * @author jahan
 */
class Room_model extends CI_Model{
    
    public function get_user_data($id = 0){
        if($id){
            $userID = $id;
        }else{
            $authUser = $this->ion_auth->user()->row();
            $userID = $authUser->user_id;
        }
        $this->db->select("id, username, email, first_name, last_name, company, phone, active, ip_address");
        $this->db->from('users');
        $this->db->where('users.id', $userID);
        return $this->db->get()->row();
    }
    
    public function get_school_members(){
        $userSchool = $this->get_user_school();
        if($userSchool){
            $this->db->select('user_id');
            $this->db->from('user_school');
            $this->db->where('user_school.school_id', $userSchool->school_id);
            return  $this->db->get()->result();
        }else{
            return array();
        }
      
    }
    
    public function get_user_school($id = 0){
        if($id){
            $userID = $id;
        }else{
            $authUser = $this->ion_auth->user()->row();
            $userID = $authUser->user_id;
        }
       $this->db->select('user_school.school_id, schools.name');
       $this->db->from('user_school');
       $this->db->join('schools', 'schools.id=user_school.school_id');
       $this->db->where("user_school.user_id", $userID);
       return $this->db->get()->row(); 
    }
}