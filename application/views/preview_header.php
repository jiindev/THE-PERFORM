<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>THE PERFOME</title>
    <link rel="stylesheet" href="/php/project_perform/static/css/grid.css">
    <link rel="stylesheet" href="/php/project_perform/static/css/style.css">
    <link rel="shortcut icon" href="/php/project_perform/static/img/pavicon3.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
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
                <li><a href="#">index</a></li>
                <li><a href="#">about</a></li>
                <li><a href="#">review</a></li>
                <li><a href="#">interview</a></li>
                <li><a href="#">tech</a></li>
                <li><a href="#">project</a></li>
            </ul>
        </div>
        <div class="dim_layer"></div>
    </div>
    <header>
        <nav>
            <div class="center clearfix">
                <span class="logo"><a href="#">THE <b>PERFORM</b></a></span>
                <div class="pc_menu">
                    <ul>
                        <li><a href="#">about</a></li>
                        <li><a href="#">review</a></li>
                        <li><a href="#">interview</a></li>
                        <li><a href="#">tech</a></li>
                        <li><a href="#">project</a></li>
                    </ul>
<!--                    <a href="#" class="search">search</a>-->
                </div>
                <div class="mobile_menu">
                    <span class="menu_icon">menu</span>
                </div>
            </div>
        </nav>