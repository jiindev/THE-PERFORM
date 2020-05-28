<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="/php/project_perform/static/ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="center modify">
   <div class="menu_title"><h1>사이트 소개글 수정</h1></div>
    <?php echo validation_errors(); ?>
    <form enctype="multipart/form-data" action="" method="post" class="admin_modify_form" id="admin_modify_form">
        
                <label for="description">본문</label><br>
                <?php foreach($about as $about):?>
                <div class="about_load" style="display:none"><?=($about->description)?></div>
                <textarea name="description" id="description" cols="100" rows="40" value="<?=($about->description)?>"></textarea><br>
                <?php endforeach;?>

                <input type="submit" value="수정사항 저장" id="save_btn">
                
                

    </form>
    <script>
        var t=$('.about_load').html();

        CKEDITOR.replace('description', {
            filebrowserUploadUrl: '/php/project_perform/index.php/tpfm/upload_receive_from_ck'
        });




        CKEDITOR.instances.description.setData(t);

    </script>
    
</div>
</body>

</html>
