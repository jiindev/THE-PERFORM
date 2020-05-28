<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <script src="/php/project_perform/static/ckeditor/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <div class="center write">
      <div class="menu_title"><h1>PROJECT 작성</h1></div>
       
        <?php echo validation_errors(); ?>
        <form enctype="multipart/form-data" action="/php/project_perform/index.php/tpfm/project_write" method="post" class="admin_write_form" id="admin_write_form">

            
            <label for="title">제목</label>
            <input type="text" name="title" placeholder="제목"><br>
            <label for="title">장소</label>
            <input type="text" name="title" placeholder="제목"><br>
            <label for="title">일시</label>
            <input type="text" name="title" placeholder="제목"><br>
            <label for="title">요약</label>
            <textarea type="text" name="title" placeholder="제목"></textarea>
            <label for="title">종료 여부</label>
            <input type="checkbox" name="title" placeholder="제목"><br>
            <p class="warning">체크시 목록에서 "현재 진행중"이 표시되지 않습니다.</p><br>

            <label for="thumbnail">썸네일 이미지</label>

            <input type="file" name="thumbnail" id="thumbnail"><br>
            <p class="warning">썸네일 이미지는 최소 800x600 사이즈 jpg파일을 권장합니다.</p><br>
            <label for="description">본문</label><br>
            <textarea name="description" id="description" cols="100" rows="40"></textarea><br>

            <p class="warning">* 장시간 로그인 할 경우 세션이 만료되어 작성하던 글이 삭제될 수 있습니다.<br>* 혹시 모를 유실사태를 대비하여 게시글 작성 전 전체 본문을 복사한 후에 작성하기를 눌러주세요.</p>

            <br>
        
            <input type="button" value="사이트에 올리기" id="upload_btn">
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
