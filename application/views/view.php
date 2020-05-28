<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <?php

if($views==false){
            
?>
        <script>
            alert('잘못된 경로입니다.');
            history.go(-1);

        </script>
        <?php
    exit;
}
?>
            </header>
            <div class="wrap view sub">
                <section class="post_view center">
                    <div class="view_title">
                        <p class="tag">
                            <?=$views->headword?>
                        </p>
                        <h2>
                            <?=$views->title?>
                        </h2>
                        <p>
                            <?=$views->date?>
                                <?=$views->writtenBy?> 에디터</p>
                        <div class="share">
                            <span class="facebook_icon"></span>
                            <span class="twitter_icon"></span>
                        </div>
                    </div>
                    <div class="content center">
                        <?=$views->description?>
                            <div class="by">
                                <span class="name">written by. <?=$views->writtenBy?> 에디터</span>
                                <span class="email"></span>
                            </div>

                    </div>

                    <div class="post_nav">
                        <div class="near_post">
                            <a href="javascript:history.back();" class="back_btn">&lt; BACK</a>
                            <a href="#" class="top_btn">TOP</a>
                        </div>

                    </div>




                </section>
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
                $(function() {
                    

                    $(".top_btn").click(function() {
                        $('html, body').animate({
                            scrollTop: 0
                        }, 400);
                        return false;
                    });

                    var $img_length = $("img").length;
                    for (var i = 0; i < $img_length; i++) {
                        var $img_width = $("img").eq(i).width();
                        $("img").eq(i).css({
                                'max-width': $img_width
                            });

                    }
                    
                    $("img").css({
                        width: '100%',
                        height: 'auto'
                    });



                    var $iframe_length = $("iframe").length;

                    for (var i = 0; i < $iframe_length; i++) {
                        var $iframe_width = $("iframe").eq(i).width();
                        var $iframe_height = $("iframe").eq(i).height();
                        var $iframe_ratio = $iframe_height / $iframe_width;

                    }

                    $("iframe").css({
                        width: '100%'
                    });

                    $(window).on('load resize',function() {
                        for (var i = 0; i < $iframe_length; i++) {
                            var $iframe_now_width = $("iframe").eq(i).width();
                            $("iframe").eq(i).css({
                                height: $iframe_ratio * $iframe_now_width
                            });
                        }
                    })


                });

            </script>
            </body>

            </html>
