<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="/php/project_perform/static/ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="center modify">
   <div class="menu_title"><h1>게시글 수정</h1></div>
    <?php echo validation_errors(); ?>
    <form enctype="multipart/form-data" action="" method="post" class="admin_modify_form" id="admin_modify_form">
        <label for="writtenBy">글쓴이</label>
        <input type="text" name="writtenBy" id="writtenBy" value="<?=($views->writtenBy)?>"><br>
        <label for="category">카테고리</label>
        <select name="category" id="category" value="<?=($views->category)?>">
                <option value="review"
            <?php
        if($views->category=='review'){
    ?>selected="selected"
           <?php } ?>
           >review</option>
            <option value="interview"
            <?php
        if($views->category=='interview'){
    ?>selected="selected"
           <?php } ?>
            >interview</option>
             <option value="tech"
            <?php
        if($views->category=='tech'){
    ?>selected="selected"
           <?php } ?>
            >tech</option>
           </select><br>
        <label for="title">제목</label>
        <div class="title_input clearfix">
            <input type="text" name="headword" id="headword" class="col-2" placeholder="머릿말" value="<?=($views->headword)?>">

            <input type="text" name="title" id="title" class="col-10" placeholder="제목" value="<?=($views->title)?>"><br>
        </div>

        <label for="thumbnail">썸네일 이미지</label>
        <?php
                                    if(($views->thumbnail!='0')&&($views->thumbnail!=null)&&($views->thumbnail!='')){
                            
                                ?>
                                <div class="exist_thumbnail">
                                <img src=<?php echo $views->thumbnail;?> alt="" width="100px"><br>
                                <input type="text" name="exist_thumbnail" id="exist_thumbnail" value='"<?=str_replace('"','',$views->thumbnail)?>"' hidden>
                                <br>
                                <a href="#" class="delete_btn">기존 썸네일 삭제</a>
                                </div>
            <?php
                                    }
                                ?>
                <div class="thumbnail" style="display:none">
                <input type="file" name="thumbnail" id="thumbnail"><br>
                <p class="warning">썸네일 이미지는 최소 800x600 사이즈를 권장합니다.</p><br>
                </div>
                <label for="description">본문</label><br>
                <div class="contents_load" style="display:none"><?=($views->description)?></div>
                <textarea name="contents_des" id="description" cols="100" rows="40" value="<?=($views->description)?>"></textarea><br>

                <p class="warning">* 장시간 로그인 할 경우 세션이 만료되어 작성하던 글이 삭제될 수 있습니다.<br>* 혹시 모를 유실사태를 대비하여 게시글 작성 전 전체 본문을 복사한 후에 작성하기를 눌러주세요.</p><br>
                <label for="statue">작성 상태</label>
                
                <?php
                if($this->uri->segment(3)=='storage'){
    ?>
                
                <select name="statue" id="statue" value="<?=($views->statue)?>">
           <option value="writing"
            <?php
        if($views->statue=='writing'){
    ?>selected="selected"
           <?php } ?>
           >작성중</option>
            <option value="finish"
            <?php
        if($views->statue=='finish'){
    ?>selected="selected"
           <?php } ?>
            >작성완료</option>
        </select><br>
                <p class="warning">작성완료로 상태 등록 시 홈페이지에 업로드가 가능해집니다. <br>현재 작성중이라면 작성중으로 등록하시고, 작성 완료 시 상태를 변경해주세요.</p><br>
                <?php
                    
                }
                          
                          ?>
                <input type="text" name="submit_type" id="submit_type" hidden="">

                <input type="button" value="수정사항 저장" id="save_btn">
                
                
                <?php 
                if(($this->uri->segment(3)=='storage')&&$views->statue=='finish'){
        ?>
                <input type="button" value="사이트에 올리기" id="upload_btn">
                <?php 
                }
        ?>


    </form>
    <script>
        var t=$('.contents_load').html();

        CKEDITOR.replace('description', {
            filebrowserUploadUrl: '/php/project_perform/index.php/tpfm/upload_receive_from_ck'
        });




        CKEDITOR.instances.description.setData(t);

    </script>
    <script>
        /*save*/
        $('#admin_modify_form input[type=button]').on('click', function() {
            var button_type = $(this).attr('id');
            if (button_type == 'preview_btn') {
                $('#submit_type').val('preview');
            } else if (button_type == 'save_btn') {
                $('#submit_type').val('save');
            } else if (button_type == 'upload_btn') {
                $('#submit_type').val('upload');
            } else {
                alert('잘못된 접근입니다.');
                exit;
            }

            $('#admin_modify_form').submit();
            return false;
        });

        /*thumbnail del*/
        if($('#exist_thumbnail').attr('value')==null){
            $('.thumbnail').css({display:'block'});
        }
        $('.delete_btn').on('click',function(){
            $('.thumbnail').css({display:'block'});
            $('.exist_thumbnail').css({display:'none'});
        })
    </script>
</div>
</body>

</html>
