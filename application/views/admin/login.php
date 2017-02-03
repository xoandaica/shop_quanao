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


</head>

<body>

<div class="wrapper">

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
                                jQuery(document).ready(function ($) {
                                    var _CaptionTransitions = [];
                                    //Left to Right
                                    _CaptionTransitions["L"] = { $Duration: 800, $FlyDirection: 1 };
                                    //Right to Left
                                    _CaptionTransitions["R"] = { $Duration: 800, $FlyDirection: 2 };
                                    //Top to Bottom
                                    _CaptionTransitions["T"] = { $Duration: 800, $FlyDirection: 4 };
                                    //Bottom to Top
                                    _CaptionTransitions["B"] = { $Duration: 800, $FlyDirection: 8 };
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

                                <!-- Loading Screen -->
                                <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                                    <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                                            background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                                    </div>
                                    <div style="position: absolute; display: block; background: url(images/img/loading.gif) no-repeat center center;
                                        top: 0px; left: 0px;width: 100%;height:100%;">
                                    </div>
                                </div>
                                <!-- Slides Container -->
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
                            <!-- Jssor Slider End -->
                        </div>

                    </div>
                    <div class="col-xs-4 ">
                        <?php check_datedefault();  ?>
                    </div>
                    <div class="clear"></div>
                    <div class="hr"></div>

                </div>
            </div>
            <footer>
                <b>CÔNG TY CỔ PHẦN ĐẦU TƯ VÀ THƯƠNG MẠI QUỐC TẾ</b><BR>
                Số 52, đường Lê Quang Đạo, Quận Nam Từ Liêm, Hà Nội | Điện thoại: 04 3785 6973 | Email: info@qts.com.vn
            </footer>
            <!--<div class="row" style="border-top: ">

            </div>-->
        </div>
    </div>
</div>


</body>


</html>





