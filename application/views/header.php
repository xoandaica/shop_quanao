<!DOCTYPE html>
<html xmlns:fb='http://www.facebook.com/2008/fbml'>
    <head>

        <!--    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
            <title><?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?></title>
            <meta name='description'
                  content='<?= isset($seo['description']) ? $seo['description'] : @$this->option->site_description; ?>'/>
            <meta name='keywords'
                  content='<?= isset($seo['keyword']) && $seo['keyword'] != '' ? $seo['keyword'] : $this->option->site_keyword; ?>'/>
            <meta name='robots' content='index,follow'/>
            <meta name='revisit-after' content='1 days'/>
            <meta http-equiv='content-language' content='vi'/>
        
                for facebook
            <meta property="og:title"
                  content="<?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?>"/>
            <meta property="og:site_name" content="<?= @$this->option->site_name; ?>"/>
            <meta property="og:url" content="<?= current_url(); ?>"/>
            <meta property="og:description"
                  content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
            <meta property="og:type" content="<?= @$seo['type']; ?>"/>
            <meta property="og:image"
                  content="<?= isset($seo['image']) && $seo['image'] != '' ? base_url($seo['image']) : $this->option->site_logo; ?>"/>
        
            <meta property="og:locale" content="vi"/>
        
             for Twitter 
            <meta name="twitter:card"
                  content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
            <meta name="twitter:title"
                  content="<?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?>"/>
            <meta name="twitter:description"
                  content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
            <meta name="twitter:image"
                  content="<?= isset($seo['image']) && $seo['image'] != '' ? base_url($seo['image']) : base_url(@$this->option->site_logo); ?>"/>
            <meta name="viewport" content="width=device-width, initial-scale=1">-->
        <meta name="viewport" id="viewport" content="user-scalable=no,width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0" />
        <link rel="shortcut icon" href="<?= base_url($this->option->site_favicon) ?>"/>



        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/bootstrap-theme.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/flexslider.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/jquery.mCustomScrollbar.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/responsive-phone.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/responsive-ipad.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/responsive-desktop.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/editor.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/owl.carousel.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/owl.theme.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/css/prism.css') ?>" rel="stylesheet"/>


        <script type="text/javascript" src="<?= base_url('assets/js/site/jquery-1.11.1.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/site/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/site/nav-menu3.js') ?>"></script><!--menu-->


        <script type="text/javascript" src="<?= base_url('assets/js/site/style-img.js') ?>"></script>

        <script type="text/javascript" src="<?= base_url('assets/js/site/main_site.js') ?>"></script>

    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <script src="https://apis.google.com/js/platform.js" async defer>
            {
                lang: 'vi'
            }
        </script>
        <!--script G+-->

        <script type="text/javascript"> // giỏ hàng
            function base_url() {
                return '<?php echo base_url(); ?>';
            }
        </script>
        <header>
            <div class="container">
                <div class="row">

                    <!-- menu mobile -->

                    <div class="col-xs-12 hidden-md hidden-lg hidden-sm menu-mobile">
                        <ul>
                            <li><a class="icon-menu toggleMenu" href="#menu" style="display: none;"><i class="fa fa-bars"></i></a></li>
                            <li><a href="my-account/index.html"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/login-icon.png" alt=""></a></li>
                            <li class="cart-icon"><a href="http://kkfashion.vn/cart/"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/cart-icon.png" alt=""><span class="cart-number">0</span></a></li>
                            <li class="endli"><a id="search-mb" href="#"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav-top hidden-lg hidden-md hidden-sm" style="display: block;">
                        <li>
                            <a href="gioi-thieu/index.html">Giới thiệu</a>


                        </li>
                        <li>
                            <a href="#" class="parent">Shop online</a>

                            <ul>
                                <li><a href="danh-muc/dam-cong-so-kk/index.html">+ Đầm công sở</a></li>

                                <li><a href="danh-muc/vay-dam-da-hoi/index.html">+ Váy đầm dạ hội</a></li>

                                <li><a href="danh-muc/vay-chong-nang-kk/index.html">+ Váy chống nắng</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="huong-dan-mua/index.html" class="parent">Hướng dẫn mua hàng</a>

                            <ul>
                                <li><a href="huong-dan-mua/index.html">+ Các bước mua hàng</a></li>

                                <li><a href="huong-dan-mua/quy-dinh-doi-hang/index.html">+ Quy định đổi hàng</a></li>

                                <li><a href="huong-dan-mua/thong-tin-tai-khoan/index.html">+ Tài khoản ngân hàng</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="category/lookbook/index.html">Lookbook</a>


                        </li>
                        <li>
                            <a href="category/video/index.html">Video</a>


                        </li>
                        <li>
                            <a href="category/tin-tuc/index.html">Tin tức</a>


                        </li>
                        <li>
                            <a href="lien-he/index.html">Liên hệ</a>


                        </li>
                    </ul>
                    <div class="form-search hidden hidden-lg hidden-md hidden-sm">
                        <form id="searchform" method="get" role="search" action="http://kkfashion.vn/">
                            <input type="text" placeholder="Nhập mã sản phẩm cần tìm..." class="sb-search-input" name="s" id="search">
                            <input class="sb-search-submit" type="submit" value="Tìm">
                        </form>
                    </div>

                    <!-- /menu mobile -->

                    <div class="col-md-2 col-sm-3 logo hidden-xs">
                        <a href="index.html"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/logo.png" alt=""></a>
                        <div class="clearfix"></div>
                    </div>

                    <!-- menu ipad -->
                    <div class="col-sm-9 hidden-xs hidden-lg hidden-md">
                        <div class="login-cart-search">
                            <div class="search">
                                <form action="http://kkfashion.vn/" role="search" method="get" id="searchform">

                                    <input name="s" class="search-input" type="text" placeholder="Nhập mã sản phẩm cần tìm...">
                                    <a href="javascript:void(0)" onclick="$('#searchform').submit()"><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                            <div class="cart">
                                <a href="http://kkfashion.vn/cart/"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/icon-cart.png" alt=""> Giỏ hàng <span class="number-cart">0</span></a>
                            </div>
                            <div class="login-register">
                                <a href="my-account/index.html"><i class="fa fa-user"></i> 
                                    Đăng ký / Đăng nhập	                            </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 hidden-xs hidden-lg hidden-md">
                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div>
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown">
                                            <a href="gioi-thieu/index.html">Giới thiệu</a>


                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop online<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="danh-muc/dam-cong-so-kk/index.html">Đầm công sở</a></li>

                                                <li><a href="danh-muc/vay-dam-da-hoi/index.html">Váy đầm dạ hội</a></li>

                                                <li><a href="danh-muc/vay-chong-nang-kk/index.html">Váy chống nắng</a></li>

                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="huong-dan-mua/index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hướng dẫn mua hàng<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="huong-dan-mua/index.html">Các bước mua hàng</a></li>

                                                <li><a href="huong-dan-mua/quy-dinh-doi-hang/index.html">Quy định đổi hàng</a></li>

                                                <li><a href="huong-dan-mua/thong-tin-tai-khoan/index.html">Tài khoản ngân hàng</a></li>

                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="category/lookbook/index.html">Lookbook</a>


                                        </li>
                                        <li class="dropdown">
                                            <a href="category/video/index.html">Video</a>


                                        </li>
                                        <li class="dropdown">
                                            <a href="category/tin-tuc/index.html">Tin tức</a>


                                        </li>
                                        <li class="dropdown">
                                            <a href="lien-he/index.html">Liên hệ</a>


                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- /menu ipad -->

                    <div class="col-md-12 hidden-xs hidden-sm">
                        <div class="row">
                            <div class="col-md-12 login-cart-search">
                                <div class="search">
                                    <form action="http://kkfashion.vn/" role="search" method="get" id="searchform">
                                        <input name="s" class="search-input" type="text" placeholder="Nhập mã sản phẩm cần tìm...">
                                        <a href="javascript:void(0)" onclick="$('#searchform').submit()"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                                <div class="cart">
                                    <a href="http://kkfashion.vn/cart/"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/icon-cart.png" alt=""> Giỏ hàng <span class="number-cart">0</span></a> 
                                </div>
                                <div class="login-register">
                                    <a href="my-account/index.html"><i class="fa fa-user"></i> 
                                        Đăng ký / Đăng nhập                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-12 main-menu">
                                <nav class="navbar navbar-default m-p">
                                    <div class="container-fluid m-p">
                                        <div class="navbar-header">
                                            <div id="header" class="visible-xs">
                                                <a href="#menu">
                                                    <button type="button" class="navbar-toggle collapsed">
                                                        <span class="sr-only">Toggle navigation</span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="collapse navbar-collapse m-p" id="bs-example-navbar-collapse-1">

                                            <ul class="nav navbar-nav pull-right">
                                                <li class="dropdown">
                                                    <a href="gioi-thieu/index.html">Giới thiệu</a>


                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop online<span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="danh-muc/dam-cong-so-kk/index.html">Đầm công sở</a></li>

                                                        <li><a href="danh-muc/vay-dam-da-hoi/index.html">Váy đầm dạ hội</a></li>

                                                        <li><a href="danh-muc/vay-chong-nang-kk/index.html">Váy chống nắng</a></li>

                                                    </ul>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="huong-dan-mua/index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hướng dẫn mua hàng<span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="huong-dan-mua/index.html">Các bước mua hàng</a></li>

                                                        <li><a href="huong-dan-mua/quy-dinh-doi-hang/index.html">Quy định đổi hàng</a></li>

                                                        <li><a href="huong-dan-mua/thong-tin-tai-khoan/index.html">Tài khoản ngân hàng</a></li>

                                                    </ul>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="category/lookbook/index.html">Lookbook</a>


                                                </li>
                                                <li class="dropdown">
                                                    <a href="category/video/index.html">Video</a>


                                                </li>
                                                <li class="dropdown">
                                                    <a href="category/tin-tuc/index.html">Tin tức</a>


                                                </li>
                                                <li class="dropdown">
                                                    <a href="lien-he/index.html">Liên hệ</a>


                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <nav id="menu" class="padd-menu hidden-sm hidden-md hidden-lg">
                                    <ul>
                                        <li>
                                            <a href="gioi-thieu/index.html">Giới thiệu</a>
                                        </li>
                                        <li>
                                            <a href="#">Shop online</a>
                                            <ul>
                                                <li><a href="danh-muc/dam-cong-so-kk/index.html">Đầm công sở</a></li>
                                                <li><a href="danh-muc/vay-dam-da-hoi/index.html">Váy đầm dạ hội</a></li>
                                                <li><a href="danh-muc/vay-chong-nang-kk/index.html">Váy chống nắng</a></li>
                                            </ul>                                        </li>
                                        <li>
                                            <a href="huong-dan-mua/index.html">Hướng dẫn mua hàng</a>
                                            <ul>
                                                <li><a href="huong-dan-mua/index.html">Các bước mua hàng</a></li>
                                                <li><a href="huong-dan-mua/quy-dinh-doi-hang/index.html">Quy định đổi hàng</a></li>
                                                <li><a href="huong-dan-mua/thong-tin-tai-khoan/index.html">Tài khoản ngân hàng</a></li>
                                            </ul>                                        </li>
                                        <li>
                                            <a href="category/lookbook/index.html">Lookbook</a>
                                        </li>
                                        <li>
                                            <a href="category/video/index.html">Video</a>
                                        </li>
                                        <li>
                                            <a href="category/tin-tuc/index.html">Tin tức</a>
                                        </li>
                                        <li>
                                            <a href="lien-he/index.html">Liên hệ</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="subbg" class="bg-sub-menu hidden hidden hidden-xs hidden-sm"></div>

            <script type="text/javascript">
                var ww = document.body.clientWidth;

                $(document).ready(function () {
                    $(".nav-top li a").each(function () {
                        if ($(this).next().length > 0) {
                            $(this).addClass("parent");
                        }
                        ;
                    })

                    $(".toggleMenu").click(function (e) {
                        e.preventDefault();
                        $(this).toggleClass("active");
                        $(".nav-top").toggle();
                    });
                    adjustMenu();
                })

                $(window).bind('resize orientationchange', function () {
                    ww = document.body.clientWidth;
                    adjustMenu();
                });

                var adjustMenu = function () {
                    if (ww < 768) {
                        $(".toggleMenu").css("display", "inline-block");
                        if (!$(".toggleMenu").hasClass("active")) {
                            $(".nav-top").hide();
                        } else {
                            $(".nav-top").show();
                        }
                        $(".nav-top li").unbind('mouseenter mouseleave');
                        $(".nav-top li a.parent").unbind('click').bind('click', function (e) {
                            // must be attached to anchor element to prevent bubbling
                            e.preventDefault();
                            $(this).parent("li").toggleClass("hover");
                        });
                    }
                    else if (ww >= 768) {
                        $(".toggleMenu").css("display", "none");
                        $(".nav-top").show();
                        $(".nav-top li").removeClass("hover");
                        $(".nav-top li a").unbind('click');
                        $(".nav-top li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function () {
                            // must be attached to li so that mouseleave is not triggered when hover over submenu
                            $(this).toggleClass('hover');
                        });
                    }
                }

            </script>
            <script type="text/javascript" charset="utf-8">
                jQuery(window).ready(function () {

                    jQuery('#search-mb').click(function () {
                        if (jQuery('.form-search').hasClass('hidden')) {
                            jQuery('.form-search').removeClass('hidden');
                        } else {
                            jQuery('.form-search').addClass('hidden');
                        }

                    });
                });
            </script>
        </header>
