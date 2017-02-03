<!DOCTYPE html>
<html xmlns:fb='http://www.facebook.com/2008/fbml'>
<head>

    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?></title>
    <meta name='description'
          content='<?= isset($seo['description']) ? $seo['description'] : @$this->option->site_description; ?>'/>
    <meta name='keywords'
          content='<?= isset($seo['keyword']) && $seo['keyword'] != '' ? $seo['keyword'] : $this->option->site_keyword; ?>'/>
    <meta name='robots' content='index,follow'/>
    <meta name='revisit-after' content='1 days'/>
    <meta http-equiv='content-language' content='vi'/>

    <!--    for facebook-->
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

    <!-- for Twitter -->
    <meta name="twitter:card"
          content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
    <meta name="twitter:title"
          content="<?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?>"/>
    <meta name="twitter:description"
          content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
    <meta name="twitter:image"
          content="<?= isset($seo['image']) && $seo['image'] != '' ? base_url($seo['image']) : base_url(@$this->option->site_logo); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url($this->option->site_favicon) ?>"/>

    <link href="<?= base_url('assets/css/site/bootstrap.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/site/font-awesome.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/site/setmedia.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/site/menu-1.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/site/style00.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/site/slider_main.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/site/style_edit.css') ?>" rel="stylesheet"/>


    <script type="text/javascript" src="<?= base_url('assets/js/site/jquery-1.11.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/site/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/site/nav-menu3.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/site/style-img.js') ?>"></script>


    <script type="text/javascript" src="<?= base_url('assets/js/site/main_site.js') ?>"></script>

</head>
<body>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript"> // giỏ hàng
    function base_url() {
        return '<?php echo base_url();?>';
    }
</script>
<header>
    <div class="bg_topheader hidden-xs">
        <div class="container">
            <div class="row_pc">
                <div class="pull-left">
                    <ul class="list_top_left">
                        <li>
                            <img src="<?= base_url('assets/css/img/icon_time.png') ?>" alt="icon"/>
                            <a href="" title="icon">Deal giờ vàng giá tốt</a>
                        </li>
                        <li>
                            <img src="<?= base_url('assets/css/img/icon_vanchuyen.png') ?>" alt="icon"/>
                            <a href="" title="icon">Vận chuyển trong 24 h</a>
                        </li>
                    </ul>
                </div>
                <div class="pull-right">

                    <ul class="list_top_right">
                        <li>
                            <img src="<?= base_url('assets/css/img/icon_login.png') ?>" alt="icon"/>
                            <?php if ($this->session->userdata('userid')) {
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
                    <a href="" class="firt" data-toggle="modal" data-target=".bs-example-modal-sm"
                       title=" Đăng nhập">
                       Đăng nhập
                    </a> &nbsp; | &nbsp;
                  ';
                            } ?>
                            <style type="text/css">
                                .user_dropdown li a:hover {
                                    background: 0 !important;
                                }
                                .li-user {
                                    padding-left: 0px !important;
                                }
                                .li-user a:hover {
                                    color: rgb(111, 174, 58) !important;
                                }

                            </style>
                        </li>
                        <li>
                            <img src="<?= base_url('assets/css/img/icon_newacc.png') ?>" alt="icon"/>
                            <a style="cursor: pointer" data-toggle="modal" data-target=".bs-example-modal-sm2"
                               title="icon">Đăng ký</a>
                        </li>
                        <?php if ($page_home_top != null) { ?>
                            <li>
                                <img src="<?= base_url($page_home_top->icon) ?>" alt="icon"/>
                                <a target="_blank" href="<?= $page_home_top->alias . '-pg' . $page_home_top->id ?>"
                                   title="icon">
                                    <?= $page_home_top->name ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?= $dangnhap?>

    <?= $dangky?>
    <div class="clearfix"></div>
    <div class="bg_top_mid">
        <div class="container">
            <div class="row_pc">
                <button class="nav-toggle menu-mobi" style="height: 60px">
                    <div class="icon-menu">
                        <span class="line line-1"></span>
                        <span class="line line-2"></span>
                        <span class="line line-3"></span>
                    </div>
                </button>
                <div class="visible-xs" style="position:absolute; top: -18px;left: 20%;">
                    <div class="logo logo-mobi">
                        <a href="<?= base_url() ?>" title="<?= $this->site_name ?>">
                            <img class="w_100" src="<?= base_url($this->site_logo) ?>"
                                 alt="<?= $this->site_name ?>"/>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-5 hidden-xs">
                        <div class="logo logo-mobi">
                            <a href="<?= base_url() ?>" title="<?= $this->site_name ?>">
                                <img class="" style="width: 80%;" src="<?= base_url($this->site_logo) ?>"
                                     alt="<?= $this->site_name ?>"/>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 hidden-xs">
                        <div class="top_hotline">
                            <div class="txt_hotline">
                                Hotline
                                <br>
                                <span class="txt_tvdh">Tư vấn đặt hàng</span>
                            </div>
                            <div class="number_hotline">
                                <?= $this->hotline1 ?>
                                <br>
                                <?= $this->hotline2 ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-2 ">
                        <div class="pull-right">
                            <a id="result"  href="<?= base_url('gio-hang') ?>" class=" cart_shop">
                                Giỏ hàng (<span class="number_item"><?=  $this->count_cart?></span>)
                            </a>
                            <div class="clearfix"></div>
                            <div class="total_money">Tổng tiền: <span class="totalPrice"><?= number_format($this->total_price);?></span>  ₫</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="bg_menu">
        <div class="container">
            <div class="row_pc">
                <nav class="nav is-fixed" role="navigation" style="position: relative;z-index: 5;">
                    <div class="wrapper wrapper-flush">
                        <div class="nav-container">
                            <ul class="nav-menu menu">
                                <li class="menu-item"><a href="<?= base_url() ?>" class="menu-link">Trang chủ</a></li>
                                <?php foreach ($menus as $menu) {
                                    if ($menu->parent_id == 0) {
                                        ?>
                                        <li class="menu-item  menu-li-root <?php check_hassub($menu->id_menu, $menu_sub); ?>"
                                            style="z-index: 999999 !important; position: relative !important;">
                                            <a target="<?= $menu->target ?>" <?php if ($menu->url != 'null') echo 'href="' . site_url($menu->url) . '"' ?>
                                               class="menu-link" title="<?= $menu->name; ?>"><?= $menu->name; ?></a>
                                            <ul class="nav-dropdown menu-ul-root">
                                                <?php foreach ($menu_sub as $sub) {
                                                    if ($menu->id_menu == $sub->parent_id) {
                                                        ?>
                                                        <li class="menu-item menu-li-sub"
                                                            style="position: relative !important;">
                                                            <a target="<?= $sub->target ?>"  <?php if ($sub->url != 'null') echo 'href="' . site_url($sub->url) . '"' ?>
                                                               title="<?= $sub->name; ?>" class="menu-link">
                                                                <?= $sub->name; ?>
                                                            </a>
                                                        </li>
                                                    <?php }
                                                } ?>
                                            </ul>
                                        </li>
                                    <?php }
                                } ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="bg_search">
        <div class="container">
            <div class="row_pc">
                <form action="<?= base_url('tim-kiem') ?>" method="get">
                    <div class="pull-right">
                        <div class="input-group search_box">
                            <input type="text" name="key" class="form-control input_search"
                                   placeholder="Từ khóa tìm kiếm">
                            <span class="input-group-btn">
                                <button class="btn btn-default button_search" type="submit"></button>
                            </span>
                        </div>
                        <div class="txt_search">
                            Xu hướng tìm kiếm: chăm sóc da, chăm sóc tóc, trang điểm, mặt nạ....
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>
<!--end header-->
<div class="clearfix"></div>
<div class="container">
    <div class="row_pc">
        <div class="content_home clearfix">