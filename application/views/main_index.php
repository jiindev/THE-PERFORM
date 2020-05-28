<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main_banner">

<!--
            <div class="banner_content center">
                <h2>THE PERFORM:
                    <br><b>FIRST STEP</b></h2>
                <p class="playtime">05:02</p>
                <p class="content">
                    2018년 5월 3일, the perform의 웹사이트가 오픈되었습니다.<br> 다양한 인터뷰와 미디어아트를 다룬 웹진으로써 많은 이들과 함께 하게 될 더퍼폼,<br> 그 시작을 영상으로 담아보았습니다.

                </p>

                <a href="#">자세히 보기</a>
            </div>
-->
        </div>

    </header>
<!--
    <section class="event">
        <div class="center clearfix">
            <h2>THE PERFOME <b>PROJECT</b></h2>
            <p class="content"><span class="mini_text">new</span>2018.05.03 프로젝트 전시 세미나. 현재 참가자 모집 중. </p>
            <a href="#" class="more_btn_mini">자세히 보기</a>
        </div>
    </section>
-->
    <section class="review center section_cate">
        <h2>REVIEW</h2>
        <ul class="clearfix">
           <?php
                    foreach ($review as $rv){
                    ?>
            <li class="col-4" onclick="location.href='/php/project_perform/index.php/main/article/<?=$rv->num?>'">
              
                <div class="img"><span class="inner" style="background-image:url(
                        
                            
                                
                            
                     <?php
                        if($rv->thumbnail==true){
                            echo str_replace('"','',$rv->thumbnail);
                        }else echo "/php/project_perform/static/img/subbanner_review.jpg"
                        ?>
                     )"></span></div>
                <div class="text clearfix">
                    <h3><span class="tag"><?=$rv->headword?></span><?=mb_substr($rv->title, 0, 30,'UTF-8')?></h3>
                    <p class="content"><?=mb_substr((strip_tags($rv->description)), 0, 120, 'UTF-8')?>...</p>
                    <a href="#" class="more_btn_mini">더보기</a>
                </div>
            
            </li>
            <?php } ?>
        </ul>
        <a href="/php/project_perform/index.php/main/review" class="more_btn">목록 더보기</a>
    </section>

    <section class="interview center section_cate">
        <h2>INTERVIEW</h2>
        <ul class="clearfix">
            <?php
                    foreach ($interview as $iv){
                    ?>
            <li class="col-4" onclick="location.href='/php/project_perform/index.php/main/article/<?=$iv->num?>'">
              
                <div class="img"><span class="inner" style="background-image:url(
                        
                            
                                
                            
                     <?php
                        if($iv->thumbnail==true){
                            echo str_replace('"','',$iv->thumbnail);
                        }else echo "/php/project_perform/static/img/subbanner_interview.jpg"
                        ?>
                     )"></span></div>
                <div class="text clearfix">
                    <h3><span class="tag"><?=$iv->headword?></span><?=mb_substr($iv->title, 0, 30,'UTF-8')?></h3>
                    <p class="content"><?=mb_substr((strip_tags($iv->description)), 0, 120, 'UTF-8')?>...</p>
                    <a href="#" class="more_btn_mini">더보기</a>
                </div>
            
            </li>
            <?php } ?>
        </ul>
        <a href="#" class="more_btn">목록 더보기</a>
    </section>
    <section class="tech center section_cate">
        <h2>TECH</h2>
        <ul class="clearfix">
            <?php
                    foreach ($tech as $tc){
                    ?>
            <li class="col-4" onclick="location.href='/php/project_perform/index.php/main/article/<?=$tc->num?>'">
              
                <div class="img"><span class="inner" style="background-image:url(
                        
                            
                                
                            
                     <?php
                        if($tc->thumbnail==true){
                            echo str_replace('"','',$tc->thumbnail);
                        }else echo "/php/project_perform/static/img/subbanner_tech.jpg"
                        ?>
                     )"></span></div>
                <div class="text clearfix">
                    <h3><span class="tag"><?=$tc->headword?></span><?=mb_substr($tc->title, 0, 30,'UTF-8')?></h3>
                    <p class="content"><?=mb_substr((strip_tags($tc->description)), 0, 120, 'UTF-8')?>...</p>
                    <a href="#" class="more_btn_mini">더보기</a>
                </div>
            
            </li>
            <?php } ?>
        </ul>
        <a href="#" class="more_btn">목록 더보기</a>
    </section>
    <footer>
        <div class="footer_top">
            <div class="logo center">
                THE <b>PERFOME</b>
            </div>
            <div class="footer_contents center">
               <p>
               <span class="project_name">더퍼폼</span>
               <span class="project_email">master@theperform.org</span><br class="footer_br">
               <span class="project_phone">070-4084-8965</span>
               <span class="project_address">서울시 서대문구 연희동 132-27</span>
                </p>
            </div>
        </div>
    </footer>
</body>

</html>
