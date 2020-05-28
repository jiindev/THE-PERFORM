<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../static/css/grid.css">
    <link rel="stylesheet" href="../../static/css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
   
    <div id="login_page">
       <h1>ADMIN <b>LOGIN</b></h1>
        <form action="/php/project_perform/index.php/tpfm/in" method="post" class="login_form">
            <label for="userId">아이디 </label>
            <input type="text" name="userId" id="userId" value="<?php echo set_value('userId');?>"><br>
            <label for="userPw">비밀번호 </label>
            <input type="password" name="userPw" id="userPw"><br>
            <input type="submit" value="관리자 접속">
            <p class="warning"><?php echo validation_errors();?></p>
        </form>
    </div>
</body>

</html>
