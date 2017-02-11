<!DOCTYPE html>
<html xmlns:fb='http://www.facebook.com/2008/fbml'>
    <head>
        <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″/>
        <meta name="viewport" id="viewport" content="user-scalable=no,width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=1.0" />
        <link rel="shortcut icon" href="<?= base_url($this->option->site_favicon) ?>"/>
        <link href="<?= base_url('assets/css/site/bootstrap.min.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/bootstrap-theme.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/flexslider.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/style.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/jquery.mCustomScrollbar.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/responsive-phone.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/responsive-ipad.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/responsive-desktop.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/editor.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/owl.carousel.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/owl.theme.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/prism.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/custom/asset/css/custom.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/plugin/woocommerce/css/woocommerce-layout18f6.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/plugin/woocommerce/css/woocommerce-smallscreen18f6.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/plugin/woocommerce/css/woocommerce18f6.css') ?>" rel="stylesheet"/>
        <link href="<?= base_url('assets/font-awesome-4.1.0/css/font-awesome.css') ?>" rel="stylesheet"/>
        <script type="text/javascript" src="<?= base_url('assets/js/site/jquery-1.11.1.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/site/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/site/nav-menu3.js') ?>"></script><!--menu-->
        <script type="text/javascript" src="<?= base_url('assets/js/site/style-img.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/js/site/main_site.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/custom/asset/js/jquery.mCustomScrollbar.concat.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/custom/asset/js/jquery.flexslider.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/custom/asset/js/owl.carousel.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/custom/asset/js/prism.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/custom/asset/js/jquery.newsTicker.js') ?>"></script>

    </head>
    <body>
        <div id="fb-root"></div>
        <script type="text/javascript"> // giỏ hàng f
            function base_url() {
                return '<?php echo base_url(); ?>';
            }
        </script>

        <header>
            <?= $dangnhap ?>
            <?= $dangky ?>
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
                        <li> <a href="<?= base_url() ?>" class="menu-link">Trang chủ</a> </li>
                        <?php
                        foreach ($menus as $menu) {
                            if ($menu->parent_id == 0) {
                                ?>
                                <li 
                                    >
                                    <a target="<?= $menu->target ?>" <?php if ($menu->url != 'null') echo 'href="' . site_url($menu->url) . '"' ?>
                                       class="<?php check_hassub1($menu->id_menu, $menu_sub); ?>" title="<?= $menu->name; ?>"><?= $menu->name; ?></a>
                                    <ul >
                                        <?php
                                        foreach ($menu_sub as $sub) {
                                            if ($menu->id_menu == $sub->parent_id) {
                                                ?>
                                                <li 
                                                    >
                                                    <a target="<?= $sub->target ?>"  <?php if ($sub->url != 'null') echo 'href="' . site_url($sub->url) . '"' ?>
                                                       title="<?= $sub->name; ?>">
                                                           <?= $sub->name; ?>
                                                    </a>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>



                    <!--                    <ul class="nav-top hidden-lg hidden-md hidden-sm" style="display: block;">
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
                                        </ul>-->
                    <div class="form-search hidden hidden-lg hidden-md hidden-sm">
                        <form id="searchform" method="get" role="search" action="http://kkfashion.vn/">
                            <input type="text" placeholder="Nhập mã sản phẩm cần tìm..." class="sb-search-input" name="s" id="search">
                            <input class="sb-search-submit" type="submit" value="Tìm">
                        </form>
                    </div>

                    <!-- /menu mobile -->

                    <div class="col-md-2 col-sm-3 logo hidden-xs">
                        <a href="<?= base_url() ?>"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/logo.png" alt=""></a>
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
                            <?php
                            if ($this->session->userdata('userid')) {
                                echo '<li class="li_menu_top">
                                                            <div class="dropdown ">
                                                                <a  id="dLabel"  style=" cursor: pointer;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    ' . $this->session->userdata('fullname') . '
                                                                    <span class="caret"></span>
                                                                </a>
                                                                <ul class="dropdown-menu user_dropdown pull-right" role="menu" aria-labelledby="dLabel"
                                                                 style="position: absolute; z-index:100;background-color: rgb(100, 72, 51);">

                                                                    <li class="li-user" >
                                                                        <a  style="color: #FFF;" href="' . base_url('thong-tin-ca-nhan') . '">Thông tin cá nhân</a>
                                                                    </li>
                                                                    <li  class="li-user">
                                                                        <a  style="color: #FFF;" href="' . base_url('thong-tin-ca-nhan') . '">Đổi mật khẩu</a>
                                                                    </li>
                                                                    <li  class="li-user">
                                                                        <a  style="color: #FFF;" href="' . base_url('dang-xuat') . '">Đăng xuất</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>';
                            } else {
                                echo '
                                                           <div class="login-register">
                                <a style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm2"
                                   title="Đăng ký">Đăng ký</a>
                                <a href="" class="firt" data-toggle="modal" data-target=".bs-example-modal-sm"
                                   title="Đăng nhập">
                                    Đăng nhập
                                </a> 
                            </div>            ';
                            }
                            ?>


                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 hidden-xs hidden-lg hidden-md">
                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <div>

                                    <ul class="nav navbar-nav" >
                                        <li class="dropdown"> <a href="<?= base_url() ?>" class="menu-link">Trang chủ</a> </li>
                                        <?php
                                        foreach ($menus as $menu) {
                                            if ($menu->parent_id == 0) {
                                                ?>
                                                <li class="dropdown"
                                                    >
                                                        <?php if (check_hassub($menu->id_menu, $menu_sub)) {
                                                            ?>
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $menu->name; ?><span class="caret"></span></a>
                                                        <?php
                                                        foreach ($menu_sub as $sub) {
                                                            if ($menu->id_menu == $sub->parent_id) {
                                                                ?>
                                                            <li class="dropdown"
                                                                >
                                                                <a target="<?= $sub->target ?>"  <?php if ($sub->url != 'null') echo 'href="' . site_url($sub->url) . '"' ?>
                                                                   title="<?= $sub->name; ?>">
                                                                       <?= $sub->name; ?>
                                                                </a>
                                                            </li>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ul>
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
                                    <form action="<?= base_url('tim-kiem') ?>" role="search" id="searchform">
                                        <input class="search-input" style=" top: 60% !important;" placeholder=" Nhập sản phẩm..." type="text" value="" name="key" id="search">
                                        <a href="javascript:void(0)" onclick="$('#searchform').submit()"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                                <!--                                <div class="search">
                                                                    <form action="http://kkfashion.vn/" role="search" method="get" id="searchform">
                                                                        <input name="s" class="search-input" type="text" placeholder="Nhập mã sản phẩm cần tìm...">
                                                                        <a href="javascript:void(0)" onclick="$('#searchform').submit()"><i class="fa fa-search"></i></a>
                                                                    </form>
                                                                </div>-->
                                <div class="cart">
                                    <a href="<?= base_url('gio-hang') ?>"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/icon-cart.png" alt=""> Giỏ hàng <span class="number-cart"><?php
                                            if (isset($_SESSION['totalProduct'])) {
                                                echo $_SESSION['totalProduct'];
                                            } else {
                                                echo '0';
                                            }
                                            ?></span></a> 
                                </div>
                                <?php
                                if ($this->session->userdata('userid')) {
                                    echo '<div class="login-register">';
                                    echo ' <div class="dropdown ">
                                                                <a  id="dLabel"  style=" cursor: pointer;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    ' . $this->session->userdata('fullname') . '
                                                                    <span class="caret"></span>
                                                                </a>
                                                                <ul class="dropdown-menu user_dropdown pull-right" role="menu" aria-labelledby="dLabel"
                                                                 style="position: absolute; z-index:100;background-color: rgb(100, 72, 51);">

                                                                    <li class="li-user" >
                                                                        <a  style="color: #FFF;" href="' . base_url('thong-tin-ca-nhan') . '">Thông tin cá nhân</a>
                                                                    </li>
                                                                    <li  class="li-user">
                                                                        <a  style="color: #FFF;" href="' . base_url('thong-tin-ca-nhan') . '">Đổi mật khẩu</a>
                                                                    </li>
                                                                    <li  class="li-user">
                                                                        <a  style="color: #FFF;" href="' . base_url('dang-xuat') . '">Đăng xuất</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        ';
                                    echo '</div>';
                                } else {
                                    echo '
                                                           <div class="login-register">
                                <a style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm2"
                                   title="Đăng ký">Đăng ký</a>
                                <a href="" class="firt" data-toggle="modal" data-target=".bs-example-modal-sm"
                                   title="Đăng nhập">
                                    Đăng nhập
                                </a> 
                            </div>            ';
                                }
                                ?>
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
                                            <ul class="nav navbar-nav pull-right" >
                                                <li class="dropdown"> <a href="<?= base_url() ?>" class="menu-link">Trang chủ</a> </li>
                                                
                                                <?php
                                                foreach ($menus as $menu) {
                                                    if ($menu->parent_id == 0) {
                                                        ?>
                                                        <li class="dropdown">
                                                            <?php if (check_hassub1($menu->id_menu, $menu_sub)) {
                                                                ?>
                                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $menu->name; ?><span class="caret"></span></a>
                                                                <ul class="dropdown-menu">
                                                                    <?php
                                                                    foreach ($menu_sub as $sub) {
                                                                        if ($menu->id_menu == $sub->parent_id) {
                                                                            ?>
                                                                            <li> <a href="<?= site_url($sub->url) ?>"><?= $sub->name ?></a></li>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            <?php } else {
                                                                ?>
                                                                <a href="<?= site_url($menu->url) ?>"><?= $menu->name ?></a>
                                                            <?php }
                                                            ?>

                                                        </li>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                            <!--                                    </ul>
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
                                            
                                                                                        </ul>-->
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
                    } else if (ww >= 768) {
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
