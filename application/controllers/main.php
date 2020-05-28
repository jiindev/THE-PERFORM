<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this -> load -> helper('form');
        $this->load->helper(array('url','date'));
    }

	public function index()
	{
        $this->_head();
        $this->load->database();
        $this->load->model('main_model');
        $data['review']=$this->main_model->index_list('review');
        $data['interview']=$this->main_model->index_list('interview');
        $data['tech']=$this->main_model->index_list('tech');
        $this->load->view('main_index',$data);
	}
    public function about()
	{
        $this->_head();
        $this->load->view('main_about');
	}
    
    public function review(){
        $this->_head();
        $this->_lists();
    }
    public function interview(){
        $this->_head();
        $this->_lists();
    }
    public function tech(){
        $this->_head();
        $this->_lists();
    }
    public function _head()
    {
            $this->load->view('main_header');
    }
          
    
    function article(){
        $this->_head();
        $this->load->database();
        $this->load->helper('alert');
        $this->load->model('main_model');
        
        $data['views']=$this->main_model->get_view($this->uri->segment(3));
        
        $this->load->view('view',$data);
        
    }
    
    public function _lists(){
        
        $this->load->database();
        $this->load->model('main_model');
        //페이지 타입 지정
        //검색어초기화
        $search_word=$page_url='';
        $uri_segment=4;
        
        $uri_array=$this->segment_explode($this->uri->uri_string());
        if(in_array('q',$uri_array)){
            $search_word=urldecode($this->url_explode($uri_array,'q'));
            $page_url='/q/'.$search_word;
            $uri_segment=6;
        }
        
        //페이지네이션 라이브러리 로딩 추가
        $this->load->library('pagination');
        
        //페이지네이션 설정
        $config['base_url']='/php/project_perform/index.php/main/'.$this->uri->segment(2).'/'.$page_url.'/page/';
        $config['total_rows']=$this->main_model->category_list($this->uri->segment(2),'count','','',$search_word);
        //게시물의 전체 개수
        $config['per_page']=5; //한페이지에 표시할 게시물 수
        $config['uri_segment']=$uri_segment; //페이지 번호가 위치한 세그먼트
        
        //페이지네이션 초기화
        $this->pagination->initialize($config);
        //페이징 링크를 생성하여 view에서 사용할 변수에 할당
        $data['pagination']=$this->pagination->create_links();
        
        //게시물 목록을 불러오기 위한 offset, limit 값 가져오기
        $page=$this->uri->segment($uri_segment,1);
        
        if($page>1){
            $start=(($page/$config['per_page']))*$config['per_page'];
        }
        else{
            $start=($page-1)*$config['per_page'];
        }
        $limit=$config['per_page'];
        
        $data['category']=$this->main_model->category_list($this->uri->segment(2),'',$start,$limit,$search_word);
        
        if($this->uri->segment(2)=='review'){
            $this->load->view('main_review',$data);
        }else if($this->uri->segment(2)=='interview'){
            $this->load->view('main_interview',$data);
        }else if($this->uri->segment(2)=='tech'){
            $this->load->view('main_tech',$data);
        }
        
    }
    function segment_explode($seg){
        $len=strlen($seg);
        if(substr($seg,0,1)=='/'){
            $seg=substr($seg,1,$len);
        }
        $len=strlen($seg);
        if(substr($seg,-1)=='/'){
            $seg=substr($seg,0,$len-1);
        }
        $seg_exp=explode("/",$seg);
        return $seg_exp;
    }
  
    
    
}
