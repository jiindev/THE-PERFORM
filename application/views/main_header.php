<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>THE PERFOME</title>
    <meta property="og:title" content="THE PERFORM" />
    <meta property="og:url" content="http://www.theperform.org" />
    <meta property="og:image" content="/php/project_perform/static/img/thumbnail.jpg" />
    <meta property="og:description" content="디지털 미디어를 활용한 공연 예술 플랫폼 더 퍼폼" />
    <link rel="stylesheet" href="/php/project_perform/static/css/grid.css">
    <link rel="stylesheet" href="/php/project_perform/static/css/style.css">
    <link rel="shortcut icon" href="/php/project_perform/static/img/pavicon3.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <script>
        $(document).ready(function() {
            $(".menu_icon").click(function() {
                $(".side_menu").fadeIn();
                $(".side_menu .menu_layer").animate({left:0},500);
            });
            $(".side_menu .close_btn").click(function() {
                $(".side_menu .menu_layer").animate({left:'-768px'},500);
                $(".side_menu").fadeOut();
            });
            $(".side_menu .dim_layer").click(function() {
                $(".side_menu .close_btn").trigger('click');
            });
            
        });

    </script>

    <div class="side_menu">
        <div class="menu_layer">

            <span class="close_btn">close</span>
            <ul>
                <li><a href="/php/project_perform/index.php/main">index</a></li>
                <li><a href="/php/project_perform/index.php/main/about">about</a></li>
                <li><a href="/php/project_perform/index.php/main/review">review</a></li>
                <li><a href="/php/project_perform/index.php/main/interview">interview</a></li>
                <li><a href="/php/project_perform/index.php/main/tech">tech</a></li>
                <li><a href="#">project</a></li>
            </ul>
        </div>
        <div class="dim_layer"></div>
    </div>
    <header>
        <nav>
            <div class="center clearfix">
                <span class="logo"><a href="/php/project_perform/index.php/main">THE <b>PERFORM</b></a></span>
                <div class="pc_menu">
                    <ul>
                        <li><a href="/php/project_perform/index.php/main/about">about</a></li>
                        <li><a href="/php/project_perform/index.php/main/review">review</a></li>
                        <li><a href="/php/project_perform/index.php/main/interview">interview</a></li>
                        <li><a href="/php/project_perform/index.php/main/tech">tech</a></li>
                        <li><a href="#">project</a></li>
                    </ul>
<!--                    <a href="#" class="search">search</a>-->
                </div>
                <div class="mobile_menu">
                    <span class="menu_icon">menu</span>
                </div>
            </div>
        </nav>