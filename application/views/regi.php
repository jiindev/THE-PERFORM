<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
   <?php echo validation_errors(); ?>
    <div class="center">
       
        <form action="/php/project_perform/index.php/tpfm/regi" method="post" class="admin_regi_form">
          <h1>ADMIN RESISTER</h1>
           <label for="userType">회원분류</label>
            <select name="userType" id="userType">
               <option value="1">관리자</option>
               <option value="2" selected>기자</option>
           </select><br>
            <label for="userId">아이디</label>
            <input type="text" name="userId" id="userId" value="<?php echo set_value('userId');?>"><br>
            <label for="userPw">비밀번호</label>
            <input type="password" name="userPw" id="userPw" value="<?php echo set_value('userPw');?>"><br>
            <label for="userPw_confirm">비밀번호 확인</label>
            <input type="password" name="userPw_confirm" id="userPw_confirm" value="<?php echo set_value('userPw_confirm');?>"><br>
            <label for="userName">이름</label>
            <p class="warning">기사 작성 시 표기되는 이름입니다.</p>
            <input type="text" name="userName" id="userName" value="<?php echo set_value('userName');?>"><br>
            <label for="userMail">이메일</label>
            <input type="text" name="userMail" id="userMail" value="<?php echo set_value('userMail');?>"><br>
          
            <input type="submit" value="관리자 등록" class="resister">

        </form>
    </div>
</body>

</html>
