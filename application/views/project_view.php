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
                <section class="post_view center">
                   <div class="project_view_title">
                       <p class="numbering"><b>PROJECT 004</b></p>
                       <h2>프로젝트 제목</h2>
                       <p class="when">2018.05.03 금 오후 3시</p>
                       <p class="where">더미디엄 (서울시 서대문구 연희동 132-27,3층)</p>
                   </div>
                    
                    <div class="content center">
                        <p>글에서 중요한 것은 내용이라는 것은 분명하지만 형식 또한 중요합니다. 웹상에 공개된 글은 작문의 기본을 무시하고 적은 것이 많습니다만 반대로 말하면 조금만 수정하면 훨씬 좋아진다는 말도 됩니다. 이 글에서는 이미 적혀 있는 콘텐츠의 형식을 정리해 읽기 쉽고 이해하기 쉽게 구성하는 방법에 대해 설명합니다.</p>
                        <img src="./img/banner_bg.png" alt="">
                        <h3>제목에서부터 메리트를 알려주자</h3>
                        <p>독자가 기사를 읽는다는 것은 독자의 시간을 사용하게 하는 것과 같습니다. 독자의 시간을 빼앗은 이상 기사에는 독자가 투자한 시간에 상응하는 가치를 주어야 합니다. 독자가 기사를 읽은 시간이 낭비였다는 생각을 하게 되면 모처럼의 기사는 쓸모없는 기사가 되어버립니다. 우리은 기사에 대한 것을 ‘콘텐츠’라고 부르는데, 이 콘텐츠란 “교육적인 가치 또는 즐거움에 속하는 저작물로 받는 사람의 문맥에 따라 가치가 있는 정보나 체험을 제공하는 것”이라고 정의됩니다. 콘텐츠를 통해 독자에게 전달해야 하는 가치란 교육적인 가치와 즐거움이지 선전이나 판매가 아니라는 것에 주의합시다. 이상적인 기사는 “재미있고 도움이 된다”는 특성을 갖습니다. 양쪽 모두를 채우는 것은 어려울지도 모릅니다. 그럴 경우에는 “도움이 된다” 만을 생각하시기 바랍니다. 그 기사는 독자에게 어떤 “도움이 되는 것”을 제공하는 것일까? 간결하고 알기 쉽게 독자에게 어필합시다. 검색엔진 최적화(SEO)에도 도움이 됩니다. 그러기 위해서는 다음을 반드시 챙겨야 하겠습니다.
                        </p>
                        <div class="by">
                            <span class="name">written by. 박지수 에디터</span>
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
            });

        </script>
    </body>

    </html>
      
           
           