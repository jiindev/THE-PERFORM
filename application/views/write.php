<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <script src="/php/project_perform/static/ckeditor/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="center write">
      <div class="menu_title"><h1>새 글 작성</h1></div>
       
        <?php echo validation_errors(); ?>
        <form enctype="multipart/form-data" action="/php/project_perform/index.php/tpfm/write" method="post" class="admin_write_form" id="admin_write_form">
            <label for="writtenBy">글쓴이</label>
            <input type="text" name="writtenBy" id="writtenBy"><br>
            <label for="category">카테고리</label>
            <select name="category" id="category">
               <option value="review">review</option>
               <option value="interview">interview</option>
               <option value="tech">tech</option>
           </select><br>
            <label for="title">제목</label>
            <div class="title_input clearfix">
                <input type="text" name="headword" id="headword" class="col-2" placeholder="머릿말 (4글자 이하 권장)">

                <input type="text" name="title" id="title" class="col-10" placeholder="제목"><br>
            </div>

            <label for="thumbnail">썸네일 이미지</label>

            <input type="file" name="thumbnail" id="thumbnail"><br>
            <p class="warning">썸네일 이미지는 최소 800x600 사이즈 jpg파일을 권장합니다.</p><br>
            <label for="description">본문</label><br>
            <textarea name="description" id="description" cols="100" rows="40"></textarea><br>

            <p class="warning">* 장시간 로그인 할 경우 세션이 만료되어 작성하던 글이 삭제될 수 있습니다.<br>* 혹시 모를 유실사태를 대비하여 게시글 작성 전 전체 본문을 복사한 후에 작성하기를 눌러주세요.</p>

            <input type="text" name="submit_type" id="submit_type" hidden="">

            <label for="statue">작성 상태</label>
            <select name="statue" id="statue">
           <option value="writing">작성중</option>
            <option value="finish">작성완료</option>
        </select><br>
            <p class="warning">작성완료로 상태 등록 시 홈페이지에 업로드가 가능해집니다. <br>현재 작성중이라면 작성중으로 등록하시고, 작성 완료 시 상태를 변경해주세요.</p><br>

            <input type="button" value="저장하기" id="save_btn">
        </form>
        <script>
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: '/php/project_perform/index.php/tpfm/upload_receive_from_ck'
            });

        </script>
        <script>
            /*save*/
            $('#admin_write_form input[type=button]').on('click', function() {
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

                $('#admin_write_form').submit();
                return false;
            });

        </script>
    </div>
    </body>

    </html>
