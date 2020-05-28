<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpfm extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this -> load -> helper('form');
        $this->load->helper(array('url','date'));
    }

	public function index()
	{
        $this->storage();
	}
    public function _head()
    {
        if($this->session->userdata['logged_in']==TRUE){
            $this->load->view('header');
        }else{
            $this->load->helper('alert');
            alert('로그인 후 이용해주십시오','/php/project_perform/index.php/tpfm/in');
        }
    }
          
    function storage(){
        $this->_head();
        $this->_lists();
    }
    
    function post(){
        $this->_head();
        $this->_lists();
    }
    
    function project(){
        $this->_head();
        $this->_lists();
    }
    
    function project_write(){
        $this->_head();
        $this->load->view('project_write');
    }
    
    function write(){
        $this->_head();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title','제목','required');  
        if($this->form_validation->run()==FALSE){
            $this->load->view('write');
        }else
        {
            $this->load->helper('alert');
            $thumbnail_url=$this->upload_receive();
            $submit_type=$this->input->post('submit_type');
            
            if($submit_type=='save'){
                
                $this->load->model('contents_model');
                $this->contents_model->save(array(
                
                'category'=>$this->input->post('category'),
                'writtenBy'=>$this->input->post('writtenBy'),
                'headword'=>$this->input->post('headword'),
                'title'=>$this->input->post('title'),
                'thumbnail'=>$thumbnail_url,
                'description'=>$this->input->post('description'),
                'recommend'=>$this->input->post('recommend'),
                'statue'=>$this->input->post('statue')
            ));
                
                
                if($thumbnail_url==''||$thumbnail_url==null){
                echo "<script>alert('썸네일 이미지가 등록되지 않았거나, 이미지 사이즈가 초과되었습니다. 기본 이미지로 대체됩니다.')</script>";
                }
                 alert('저장되었습니다.','http://localhost/php/project_perform/index.php/tpfm/storage');
                
            }else if($submit_type=='preview'){
                alert('미리보기창이 나옵니다.','http://naver.com');
            }
        }
        
    }
    function in(){
        $this -> load -> model('user_model');
        $this->load->library('form_validation');
        $this->load->helper('alert');
        $this->form_validation->set_rules('userId','아이디','required');
        $this->form_validation->set_rules('userPw','비밀번호','required');
        
        if($this->form_validation->run()==FALSE){
            $this->load->view('in');
        }else
            {   
                
                $user = $this->user_model->getById(array('userId'=>$this->input->post('userId')));
                
                if($user==FALSE){
                    alert('존재하지 않는 아이디입니다','/php/project_perform/index.php/tpfm/in');
                    exit;
                }
                else
                {
                    if($this->input->post('userId') == $user->userId && password_verify($this->input->post('userPw'), $user->userPw))
                    {
                        $newdata=array(
                            'userId'=>$user->userId,
                            'logged_in'=>TRUE
                        );
                        $this->session->set_userdata($newdata);
                        alert('로그인되었습니다.','/php/project_perform/index.php/tpfm/storage');
                        exit;
                    }else{
                        alert('패스워드가 틀렸습니다','/php/project_perform/index.php/tpfm/in');
                        exit;
                    }
                }
                
            }
        }
        
        
    function out(){
        $this->session->sess_destroy();
        $this->load->helper('alert');
            alert('로그아웃 되었습니다.','/php/project_perform/index.php/tpfm/in');
    }
    
    public function _lists(){
        $this->load->database();
        $this->load->model('contents_model');
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
        $config['base_url']='/php/project_perform/index.php/tpfm/'.$this->uri->segment(2).'/'.$page_url.'/page/';
        $config['total_rows']=$this->contents_model->get_list($this->uri->segment(2),'count','','',$search_word);
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
        
        $data['list']=$this->contents_model->get_list($this->uri->segment(2),'',$start,$limit,$search_word);
        
        if($this->uri->segment(2)=='storage'){
            $this->load->view('mypage',$data);
        }
        if($this->uri->segment(2)=='post'){
            $this->load->view('mypage',$data);
        }
        if($this->uri->segment(2)=='project'){
            $this->load->view('project',$data);
        }
        
    }
    function test(){
        $this->load->helper('url');
        redirect('naver.com');
    }
    
    
    function url_explode($url,$key){
        $cnt=count($url);
        for($i=0;$cnt>$i;$i++){
            if($url[$i]==$key){
                $k=$i+1;
                return $url[$k];
            }
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
    
    function view(){
        if($this->session->userdata['logged_in']==TRUE){
            $this->load->view('preview_header');
        }else{
            $this->load->helper('alert');
            alert('로그인 후 이용해주십시오','/php/project_perform/index.php/tpfm/in');
        }
        
        
        $this->load->database();
        $this->load->helper('alert');
        $this->load->model('contents_model');
        $data['views']=$this->contents_model->get_view($this->uri->segment(3),$this->uri->segment(4));
        
        $this->load->view('view',$data);
    }
    function delete_ok(){
        $this->_head();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('user_model');
        $this->load->model('contents_model');
        $this->load->library('form_validation');
        $this->load->helper('alert');
        $this->form_validation->set_rules('userPw','비밀번호','required');
        
        
        if($this->form_validation->run()==FALSE){
            $this->load->view('delete_ok');
        }else
            {   
                $user = $this->user_model->getById(array('userId'=>$_SESSION['userId']));
                
                    if(password_verify($this->input->post('userPw'), $user->userPw))
                    {
                         $this->_delete();
                        exit;
                    }else{
                        alert('패스워드가 틀렸습니다');
                        exit;
                    }
                

            }
        
    }
    function _delete(){
        $this->load->helper('alert');
        $this->load->database();
        $this->load->model('contents_model');
        $return=$this->contents_model->delete_content($this->uri->segment(3),$this->uri->segment(5));
        if($return){
            
            alert('삭제 되었습니다.','/php/project_perform/index.php/tpfm/'.$this->uri->segment(3));
            
            
        }else{
            alert('삭제 실패하였습니다','/php/project_perform/index.php/tpfm/'.$this->uri->segment(3).'/num/'.$this->uri->segment(5));
        }
    }
    
    function about(){
        $this->_head();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description','내용','required');
        $this->load->model('about_model');
        
        if($this->form_validation->run()==FALSE){
            $data['about']=$this->about_model->load();
            $this->load->view('about',$data);
            
        }else
        {
            $this->load->helper('alert');
            $this->about_model->modify($this->input->post('description'));
            alert('저장되었습니다.','/php/project_perform/index.php/tpfm/about');
        }      
    }
    
    
    function modify(){
        $this->_head();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title','제목','required');
        $this->load->model('contents_model');
        
        if($this->form_validation->run()==FALSE){
            $data['views']=$this->contents_model->get_view($this->uri->segment(3),$this->uri->segment(5));
            $this->load->view('modify',$data);
            
        }else
        {
            $this->load->helper('alert');
            
            if($this->upload_receive()==false){
                $thumbnail_url=$this->input->post('exist_thumbnail');
            }else{
                $thumbnail_url=$this->upload_receive();
            }
            
            
            $submit_type=$this->input->post('submit_type');
            
            if($submit_type=='save'){
                if($this->uri->segment(3)=='storage'){
                    $this->contents_model->modify(array(
                    'table'=>$this->uri->segment(3),
                    'num'=>$this->uri->segment(5),
                    'category'=>$this->input->post('category'),
                    'writtenBy'=>$this->input->post('writtenBy'),
                    'headword'=>$this->input->post('headword'),
                    'title'=>$this->input->post('title'),
                    'thumbnail'=>$thumbnail_url,
                    'description'=>$this->input->post('contents_des'),
                    'statue'=>$this->input->post('statue')
                    ),'storage');
                }else if($this->uri->segment(3)=='post'){
                    $this->contents_model->modify(array(
                    'table'=>$this->uri->segment(3),
                    'num'=>$this->uri->segment(5),
                    'category'=>$this->input->post('category'),
                    'writtenBy'=>$this->input->post('writtenBy'),
                    'headword'=>$this->input->post('headword'),
                    'title'=>$this->input->post('title'),
                    'thumbnail'=>$thumbnail_url,
                    'description'=>$this->input->post('contents_des')
                    ),'post');
                }
                
                
                
                if($thumbnail_url==''||$thumbnail_url==null){
                echo "<script>alert('썸네일 이미지가 등록되지 않았거나, 이미지 사이즈가 초과되었습니다. 기본 이미지로 대체됩니다.')</script>";
                }
               
                
                alert('저장되었습니다.','/php/project_perform/index.php/tpfm/'.$this->uri->segment(3));
                
               
            }else if($submit_type=='preview'){
                alert('미리보기창이 나옵니다.','http://naver.com');
            }else if($submit_type=='upload'){
                $this->contents_model->upload(array(
                'table'=>$this->uri->segment(3),
                'category'=>$this->input->post('category'),
                'writtenBy'=>$this->input->post('writtenBy'),
                'headword'=>$this->input->post('headword'),
                'title'=>$this->input->post('title'),
                'thumbnail'=>$thumbnail_url,
                'description'=>$this->input->post('contents_des')
                    ),$this->uri->segment(5));
                
                
                alert('등록되었습니다.','/php/project_perform/index.php/tpfm/post');
            }
        }
        
    }
    
    
    
    function regi(){
        $this->load->database();
        $this->_head();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('userMail', '이메일 주소', 'required|valid_email|is_unique[adminMember.userMail]');
        $this->form_validation->set_rules('userId', '아이디', 'required|min_length[5]|max_length[20]|is_unique[adminMember.userId]');
        $this->form_validation->set_rules('userPw', '비밀번호', 'required|min_length[6]|max_length[30]|matches[userPw_confirm]');
        $this->form_validation->set_rules('userPw_confirm', '비밀번호 확인', 'required');
    
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('regi');
        }
        else
        {
            $hash=password_hash($this->input->post('userPw'),PASSWORD_BCRYPT);
            $this->load->model('user_model');
            $this->user_model->add(array(
                'userMail'=>$this->input->post('userMail'),
                'userId'=>$this->input->post('userId'),
                'userPw'=>$hash,
                'userName'=>$this->input->post('userName'),
                'userType'=>$this->input->post('userType')
            ));
            echo "성공";
        }
    }
    
    function upload_receive(){
        $config['upload_path'] = './static/thumbnail';
        // git,jpg,png 파일만 업로드를 허용한다.
        $config['allowed_types'] = 'gif|jpg|png';
        // 허용되는 파일의 최대 사이즈
        $config['max_size'] = '1024';
        // 이미지인 경우 허용되는 최대 폭
        $config['max_width']  = '1280';
        // 이미지인 경우 허용되는 최대 높이
        $config['max_height']  = '768';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload("thumbnail"))
		{
            echo "<script>alert('다음의 사유로 썸네일 업로드에 실패했습니다, ".$this->upload->display_errors()."
            기본 이미지로 대체됩니다.
            ')</script>";
            return false;
        }	
		else
		{
            
			$data = $this->upload->data();
            $file_type=substr($data['file_name'],-3);

            $filename = "thumb".date("YmdHis").'.'.$file_type;
            $data['file_name']=$filename;  rename($data['full_path'],$data['file_path'].$filename);  $thumbnail_url='"/php/project_perform/static/thumbnail/'.$filename.'"';
            return $thumbnail_url;
		}
    }
    
    function upload_receive_from_ck(){

        $config['upload_path'] = './static/contents_img';
        // git,jpg,png 파일만 업로드를 허용한다.
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // 허용되는 파일의 최대 사이즈
        $config['max_size'] = '1024';
        // 이미지인 경우 허용되는 최대 폭
        $config['max_width']  = '2000';
        // 이미지인 경우 허용되는 최대 높이
        $config['max_height']  = '2500';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload("upload"))
		{
            
            echo "<script>alert('업로드에 실패했습니다, ".$this->upload->display_errors()."')";
        }	
		else
		{
            
            $CKEditorFunNum = $this->input->get('CKEcitorFuncNum');
            
			$data = $this->upload->data();
            $file_type=substr($data['file_name'],-3);
//            $filename = $data['file_name'];
            
            $filename = date("YmdHis").'.'.$file_type;
            $data['file_name']=$filename;
            
            rename($data['full_path'],$data['file_path'].$filename);
            $url='/php/project_perform/static/contents_img/'.$filename;
			echo '{"filename" : "'.$filename.'", "uploaded" : 1, "url":"'.$url.'"}';
		}
    }
    
}
