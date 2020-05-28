<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();    
    }
    
    function save($option){
        $this->db->set('writtenBy',$option['writtenBy']);
        $this->db->set('category',$option['category']);
        $this->db->set('headword',$option['headword']);
        $this->db->set('title',$option['title']);
        $this->db->set('thumbnail',$option['thumbnail']);
        $this->db->set('description',$option['description']);
        $this->db->insert('storage');
        $result=$this->db->insert_id();
        return $result;
    }
    
    function post($option){
        $this->db->set('writtenBy',$option['writtenBy']);
        $this->db->set('category',$option['category']);
        $this->db->set('headword',$option['headword']);
        $this->db->set('title',$option['title']);
        $this->db->set('thumbnail',$option['thumbnail']);
        $this->db->set('description',$option['description']);
        $this->db->set('recommend',$option['recommend']);
        $this->db->insert('post');
        $result=$this->db->insert_id();
        return $result;
    }
    
    function add($option)
    {
        $this->db->set('writtenBy',$option['writtenBy']);
        $this->db->set('userPw',$option['userPw']);
        $this->db->set('userName',$option['userName']);
        $this->db->set('userMail',$option['userMail']);
        $this->db->set('userType',$option['userType']);
        $this->db->insert('adminMember');
        $result=$this->db->insert_id();
        return $result;
    }
    
    function modify($option){
        
        $modify_array=array(
            'writtenBy'=>$option['writtenBy'],
            'category'=>$option['category'],
            'headword'=>$option['headword'],
            'title'=>$option['title'],
            'thumbnail'=>$option['thumbnail'],
            'description'=>$option['description']
        );
        $where=array(
            'num'=>$option['num']
        );
        
        $result=$this->db->update($option['table'], $modify_array, $where);
        
        return $result;
        
    }
    
    function delete_content($table,$no){
        $delete_array=array('num'=>$no);
        $result=$this->db->delete($table,$delete_array);
        return result;
    }
    
    
    function index_list($category){
        $sql='SELECT * FROM post WHERE category like "%'.$category.'%" ORDER BY num DESC LIMIT 3';
        $query=$this->db->query($sql);
        $result=$query->result();
        return $result;
    }
    
    function category_list($category='',$type='',$offset='',$limit='',$search_word=''){
        $sword='';
        
        if($search_word!=''){
            
                $sword=' WHERE title like "%'.$search_word.'%" or description like "%'.$search_word.'%"';
            
            
        }else{
            $sword='';
            }
        
        
        
        
        $limit_query='';
        if($limit!='' OR $offset!=''){
            $limit_query=' LIMIT '.$offset.','.$limit;
        };
        
        $sql='SELECT * FROM post'.$sword.' WHERE category like "%'.$category.'%" ORDER BY num DESC'.$limit_query;
        $query=$this->db->query($sql);
        
        if($type=='count'){
            $result=$query->num_rows();
            
            //$this->db->count_all($table);
        }else {
            $result=$query->result();
        }
        return $result;
        
    }
    
    
    function get_list($table='',$type='',$offset='',$limit='',$search_word=''){
        $sword='';
        
        if($search_word!=''){
            
                $sword=' WHERE title like "%'.$search_word.'%" or description like "%'.$search_word.'%"';
            
            
        }else{
            $sword='';
            }
        
        
        
        
        $limit_query='';
        if($limit!='' OR $offset!=''){
            $limit_query=' LIMIT '.$offset.','.$limit;
        };
        
        $sql='SELECT * FROM '.$table.$sword.' ORDER BY num DESC'.$limit_query;
        $query=$this->db->query($sql);
        
        if($type=='count'){
            $result=$query->num_rows();
            
            //$this->db->count_all($table);
        }else {
            $result=$query->result();
        }
        return $result;
        
    }
    
    function get_view($num){
        $sql="SELECT * FROM post WHERE num='".$num."'";
        $query = $this->db->query($sql);
        
        $result=$query->row();
        
        return $result;
    }
    
}
