<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
        <title>QTS  - HỆ THỐNG QUẢN TRỊ WEBSITE</title>
        <!--    <link rel="stylesheet" type="text/css" href="css/admin.css" />-->
        <!--    <link href="../css/style.css" rel="stylesheet">-->

        <!--    <link href="../css/default.css" rel="stylesheet">-->
        <!--    <script type="text/javascript" src="../js/jquery.min.js"></script>-->


        <link type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet"/>
        <!--    <link type="text/css" href="-->
        <?//= base_url('assets/css/font-awesome.min.css')?><!--" rel="stylesheet"/>-->
        <link type="text/css" href="<?= base_url('assets/css/style_login2.css') ?>" rel="stylesheet"/>
        <script type="text/javascript" src="<?= base_url('assets/js/jquery-1.9.1.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jssor.core.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jssor.utils.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/jssor.slider.js') ?>"></script>
        <style>
            @import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
            @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

            body{
                margin: 0;
                padding: 0;
                background: #fff;

                color: #fff;
                font-family: Arial;
                font-size: 12px;
            }

            .body{
                position: absolute;
                top: -20px;
                left: -20px;
                right: -40px;
                bottom: -40px;
                width: auto;
                height: auto;
                background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
                background-size: cover;
                -webkit-filter: blur(5px);
                z-index: 0;
            }

            .grad{
                position: absolute;
                top: -20px;
                left: -20px;
                right: -40px;
                bottom: -40px;
                width: auto;
                height: auto;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
                z-index: 1;
                opacity: 0.7;
            }

            .header{
                position: absolute;
                top: calc(50% - 35px);
                left: calc(50% - 405px);
                z-index: 2;
            }

            .header div{
                float: left;
                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 35px;
                font-weight: 200;
            }

            .header div span{
                color: #5379fa !important;
            }

            .login{
                position: absolute;
                top: calc(50% - 75px);
                left: calc(50% - 50px);
                height: 150px;
                width: 350px;
                padding: 10px;
                z-index: 2;
            }

            .login input[type=text]{
                width: 350px;
                height: 40px;
                background: transparent;
                border: 1px solid rgba(255,255,255,0.6);
                border-radius: 2px;
                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
            }

            .login input[type=password]{
                width: 350px;
                height: 40px;
                background: transparent;
                border: 1px solid rgba(255,255,255,0.6);
                border-radius: 2px;
                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
                margin-top: 10px;
            }

            .login input[type=submit]{
                width: 350px;
                height: 35px;
                background: #fff;
                border: 1px solid #fff;
                cursor: pointer;
                border-radius: 2px;
                color: #a18d6c;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-weight: 400;
                padding: 6px;
                margin-top: 10px;
            }

            .login input[type=button]:hover{
                opacity: 0.8;
            }

            .login input[type=button]:active{
                opacity: 0.6;
            }

            .login input[type=text]:focus{
                outline: none;
                border: 1px solid rgba(255,255,255,0.9);
            }

            .login input[type=password]:focus{
                outline: none;
                border: 1px solid rgba(255,255,255,0.9);
            }

            .login input[type=button]:focus{
                outline: none;
            }

            ::-webkit-input-placeholder{
                color: rgba(255,255,255,0.6);
            }

            ::-moz-input-placeholder{
                color: rgba(255,255,255,0.6);
            }
        </style>


    </head>

    <body>
        <div class="body"></div>
        <div class="grad"></div>
        <div class="header">
            <div>Website<span><?= base_url() ?></span></div>
        </div>
        <br>
            <div class="login">
                <form class="form-signin" role="form" method="post" action="">
                    <input type="text" placeholder="username" name="email"><br>
                            <input type="password" placeholder="password" name="pass"><br>
                                    <input type="submit" value="Login">
                                        </
                                        </div>
                                        <!--       <div class="wrapper">
                                        
                                                    <div class="site_main">
                                        
                                                        <div class="container wrapper1 ">
                                                            <header>
                                                                <div class="row banner">
                                                                    <img src="<?= base_url('images/top1.jpg'); ?>">
                                                                </div>
                                                                <div class="line"></div>
                                                                <div class="menu ">
                                                                    <div class="container">
                                                                        <ul>
                                        
                                        
                                                                            <li><a href="#">HƯỚNG DẪN SỬ DỤNG</a></li>
                                        
                                                                            <li><a href="#">CỔNG THÔNG TIN ĐIỆN TỬ</a></li>
                                                                            <li><a href="#">THƯ ĐIỆN TỬ</a></li>
                                                                            <li><a href="#">LIÊN HỆ</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </header>
                                                            <div style="padding: 5px">
                                                                <div class="login_main">
                                                                    <div class="col-xs-12">
                                                                        <div class="row" style="padding: 5px 0px 5px 10px;">
                                                                            <img src="<?= base_url('images/text.png') ?>">
                                        
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-8 slide">
                                        
                                        
                                                                        <div class="row">
                                        
                                                                            <script>
                                                                                jQuery(document).ready(function($) {
                                                                                    var _CaptionTransitions = [];
                                                                                    //Left to Right
                                                                                    _CaptionTransitions["L"] = {$Duration: 800, $FlyDirection: 1};
                                                                                    //Right to Left
                                                                                    _CaptionTransitions["R"] = {$Duration: 800, $FlyDirection: 2};
                                                                                    //Top to Bottom
                                                                                    _CaptionTransitions["T"] = {$Duration: 800, $FlyDirection: 4};
                                                                                    //Bottom to Top
                                                                                    _CaptionTransitions["B"] = {$Duration: 800, $FlyDirection: 8};
                                                                                    //Reference http://www.jssor.com/development/caption-transition-viewer.html
                                        
                                                                                    var options = {
                                                                                        $AutoPlay: true,
                                                                                        $PlayOrientation: 1,
                                                                                        $DragOrientation: 3,
                                                                                        $CaptionSliderOptions: {
                                                                                            $Class: $JssorCaptionSlider$,
                                                                                            $CaptionTransitions: _CaptionTransitions,
                                                                                            $PlayInMode: 1,
                                                                                            $PlayOutMode: 3
                                                                                        }
                                                                                    };
                                        
                                                                                    var jssor_slider1 = new $JssorSlider$("slider1_container", options);
                                                                                });
                                                                            </script>
                                                                            <div id="slider1_container" style="position: relative; width: 660px; height: 310px;">
                                        
                                                                                 Loading Screen 
                                                                                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                                                                                    <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                                                                                         background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                                                                                    </div>
                                                                                    <div style="position: absolute; display: block; background: url(images/img/loading.gif) no-repeat center center;
                                                                                         top: 0px; left: 0px;width: 100%;height:100%;">
                                                                                    </div>
                                                                                </div>
                                                                                 Slides Container 
                                                                                <div u="slides"
                                                                                     style="cursor: move; position: absolute; left: 0px; top: 0px; width:660px; height:310px; overflow: hidden;">
                                                                                    <div><img u="image" src="<?= base_url('images/bn1.jpg') ?>" style="height: 310px"/>
                                                                                    </div>
                                                                                    <div><img u="image" src="<?= base_url('images/bn2.jpg') ?>" style="height: 310px"/>
                                                                                    </div>
                                                                                    <div><img u="image" src="<?= base_url('images/bn3.jpg') ?>" style="height: 310px"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                             Jssor Slider End 
                                                                        </div>
                                        
                                                                    </div>
                                                                    <div class="col-xs-4 ">
                                        <?php check_datedefault(); ?>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                    <div class="hr"></div>
                                        
                                                                </div>
                                                            </div>
                                                            <footer>
                                                                <b>CÔNG TY CỔ PHẦN ĐẦU TƯ VÀ THƯƠNG MẠI QUỐC TẾ</b><BR>
                                                                    Số 52, đường Lê Quang Đạo, Quận Nam Từ Liêm, Hà Nội | Điện thoại: 04 3785 6973 | Email: info@qts.com.vn
                                                            </footer>
                                                            <div class="row" style="border-top: ">
                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->

                                        </body>


                                        </html>





