<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();    
    }
    
    function add($option)
    {
        $this->db->set('userId',$option['userId']);
        $this->db->set('userPw',$option['userPw']);
        $this->db->set('userName',$option['userName']);
        $this->db->set('userMail',$option['userMail']);
        $this->db->set('userType',$option['userType']);
        $this->db->insert('adminMember');
        $result=$this->db->insert_id();
        return $result;
    }
    
    function getById($option)
    {
        $query = $this->db->get_where('adminMember',array('userId'=>$option['userId']));
        
        if($query->num_rows()>0){
            return $query->row();
        }else return FALSE;
        
    }
//    
//    function login($auth){
//       
//        
//        $sql = "SELECT userId, userMail FROM adminMember WHERE userId = '" . $auth['userId'] . "' AND userPw = '" . $auth['userPw'] . "' ";
//        
//        $query=$this->db->query($sql);
//        
//        if($query->num_rows()>0){
//            return $query->row();
//        }else{
//            return FALSE;
//        }
//    }
    
    
}