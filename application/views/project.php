<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="wrap my_page">
        <div class="center">


            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    $("#search_btn").click(function() {
                        if ($('#q').val() == '') {
                            alert('검색어를 입력하세요');
                            return false;
                        } else {
                            var act = '/php/project_perform/index.php/tpfm/storage/q/' + $('#q').val() + '/page/1';
                            $('#bd_search').attr('action', act).submit();
                        }
                    })
                });

                function board_search_enter(form) {
                    var keycode = window.event.keyCode;
                    if (keycode == 13) $('#search_btn').click();
                }

                function delete_ok() {
                    confirm('')
                }

            </script>


            <div class="menu_title">
                <h1>
                
                <?php
                    if($this->uri->segment(2)=='storage'){
                        ?>
                        임시저장글
                        <?php
                    }else if($this->uri->segment(2)=='post'){
                        ?>
                        업로드게시글
                        <?php
                    }else if($this->uri->segment(2)=='project'){
                        ?>
                        프로젝트
                        <?php
                    }
                    
                    ?>
                
                
                
                </h1>
            </div>

            <div class="tab_view">
                <section>
                    <div class="post_list center">
                        <ul>
                            <?php
                    foreach ($list as $lt){
                    ?>
                                <li class="clearfix">
                                    <p class="num">
                                        <?=$lt->num;?>
                                    </p>
                                    
                                    
                                    <?php
                                    if(($lt->thumbnail!='0')&&($lt->thumbnail!=null)&&($lt->thumbnail!='')){
                            
                                ?>
                                        <span class="thumbnail" style='background-image:url(<?php echo $lt->thumbnail;?>)'>현재 이미지</span>

                                        <?php
                                    }
                                ?>

                                            <div class="info clearfix">
                                                <p class="category">
                                                    <?=$lt->category?>
                                                </p>
                                                <p class="title"><b><?=$lt->headword?></b>
                                                    <?=$lt->title?>
                                                </p>
                                                <p>
                                                    <?=$lt->date?>
                                                </p>
                                                <p>written by <b><?=$lt->writtenBy?></b></p>
                                            </div>
                                            <div class="admin_btn">
                                               <?php
                                                    if($this->uri->segment(2)=='storage'){
                                                        if($lt->statue=='finish'){
                                                            echo "<b>작성완료</b>";
                                                        } 
                                                    }
                                                ?>
                                                <a rel="external" href="/php/project_perform/index.php/tpfm/view/<?=$this->uri->segment(2);?>/<?php echo $lt->num?>" target="_blank">미리보기</a>
                                                <a rel="external" href="/php/project_perform/index.php/<?php echo $this->uri->segment(1);?>/modify/<?=$this->uri->segment(2);?>/num/<?php echo $lt->num?>">편집</a>
                                                <a rel="external" href="/php/project_perform/index.php/<?php echo $this->uri->segment(1);?>/delete_ok/<?=$this->uri->segment(2);?>/num/<?php echo $lt->num?>">삭제</a>
                                            </div>

                                </li>
                                <?php } ?>


                        </ul>
                    </div>
                </section>
                <section></section>
                <p class="paging">
                    <?php echo $pagination;?>
                </p>

                <div class="search">
                    <form id="bd_search" method="post">
                        <input type="text" name="search_word" id="q" onkeypress="board_search_enter(document.q);">
                        <input type="button" value="검색" id="search_btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
