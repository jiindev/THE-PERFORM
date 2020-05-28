<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="sub_banner tech_banner">
</div>

</header>
<div class="wrap tech sub">
    <div class="subpage_content center">
        <h2 class="subpage_title">TECH</h2>
        <ul class="article_li">
            <?php
                    foreach ($category as $dt){
                        ?>

                <li class="clearfix" onclick="location.href='/php/project_perform/index.php/main/article/<?=$dt->num?>'">
                    <div class="img col-4 col-fit"><span class="inner" style="background-image:url(
                        
                            
                                
                            
                     <?php
                        if($dt->thumbnail==true){
                            echo str_replace('"','',$dt->thumbnail);
                        }else echo "/php/project_perform/static/img/subbanner_tech.jpg"
                        ?>
                     )"></span></div>
                    <div class="text clearfix col-8 col-fit">
                        <h3><span class="tag"><?=$dt->headword?></span>
                            <?=mb_substr($dt->title, 0, 30,'UTF-8')?>
                        </h3>
                        <div class="when">2018-05-18</div>

                        <p class="content">
                            <?=mb_substr((strip_tags($dt->description)), 0, 220, 'UTF-8')?>...</p>
                        <a href="#" class="more_btn_mini">더보기</a>
                    </div>
                </li>
                <?php } ?>

        </ul>
        <div class="paging">
            <ul class="page_li clearfix">
                <?php echo $pagination;?>
            </ul>
        </div>
    </div>

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
</div>
<script>
    var article_length = $('.article_li li').length;
    $(window).resize(listResize);
    $(document).ready(listResize);


    function listResize(e) {
        

        for (var i = 0; i < article_length; i++) {
            var article=$('.article_li li').eq(i);
            var text_size=article.children('.text').height();
            var img = article.children('.img');
            
            img.css({
                height: text_size
            });
        }

    }

</script>
</body>

</html>
