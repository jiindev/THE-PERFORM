<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<form action="/php/project_perform/index.php/tpfm/delete_ok/<?=$this->uri->segment(3);?>/num/<?=$this->uri->segment(5);?>" method="post" class="login_form">
           <p>정말 삭제하시겠습니까? <br>
현재 로그인되어 있는 계정(<?=($this->session->userdata('userId'))?>)의 비밀번호를 입력해주세요.<br><br><br></p>
            <input type="password" name="userPw" id="userPw"><br>
            <input type="submit" value="삭제하기">
            <p class="warning"><?php echo validation_errors();?></p>
        </form>