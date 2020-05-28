<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();    
    }
    
    
    function modify($change){
        $this->db->set('description',$change);
        $this->db->insert('about');
        $result=$this->db->insert_id();
        return $result;
    }
    
    function load(){
        $sql='SELECT * FROM about ORDER BY num DESC LIMIT 1';
        $query=$this->db->query($sql);
        $result=$query->result();
        return $result;
    }
    
    
}
