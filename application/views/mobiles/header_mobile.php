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
    <meta property="og:image" content="<?= isset($seo['image']) && $seo['image'] != '' ? base_url($seo['image']) : $this->option->site_logo ; ?>"/>

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

    <link href="<?= base_url('assets/css/site/bootstrap.min.css') ?>" rel="stylesheet" media="all"/>
    <link href="<?= base_url('assets/css/site/font-awesome.css') ?>" rel="stylesheet" media="all"/>
    <link href="<?= base_url('assets/css/site/nav-menu3.css') ?>" rel="stylesheet" media="all"/>
    <link href="<?= base_url('assets/css/site/setmedia.css') ?>" rel="stylesheet" media="all"/>
    <link href="<?= base_url('assets/css/site/style00.css') ?>" rel="stylesheet" media="all"/>
    <link href="<?= base_url('assets/css/site/slider-banner.css') ?>" rel="stylesheet" media="all"/>
    <link href="<?= base_url('assets/css/site/style-hover.css') ?>" rel="stylesheet" media="all"/>
    <link href="<?= base_url('assets/css/site/flexisel.css') ?>" rel="stylesheet" media="all"/>
    <link href="<?= base_url('assets/css/site/slide-text.css') ?>" rel="stylesheet" media="all"/>

    <link href="<?= base_url('assets/css/site/post_Masonry.css') ?>" rel="stylesheet" media="all"/>
    <link href="<?= base_url('assets/css/site/flexslider.css') ?>" rel="stylesheet" type="text/css">


    <script type="text/javascript" src="<?= base_url('assets/js/site/jquery-1.11.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/site/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/site/nav-menu3.js') ?>"></script>

    <script type="text/javascript" src="<?= base_url('assets/js/site/post_Masonry.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/site/plugins.js') ?>" ></script>

    <script type="text/javascript" src="<?= base_url('assets/js/site/jquery.flexslider.js') ?>" ></script>
    <script type="text/javascript" src="<?= base_url('assets/js/site/jquery.flexslider-min.js') ?>" ></script>

    <script type="text/javascript" src="<?= base_url('assets/js/site/flexisel.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/site/style-img.js') ?>"></script>
    <script type="text/javascript">
        function base_url(){
            return '<?php echo base_url();?>';
        }
        $(document).ready(function () {
            $(".validate").validationEngine();
        });

    </script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=109817749354673";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<header class="main-head clearfix">
    <div class="top-2 sticky-header">
        <div class="container">
            <div class="row">
                <div class="menu-head">
                    <nav class="nav is-fixed" role="navigation">
                        <div class="wrapper wrapper-flush">
                            <div class="visible-sm visible-xs">
                                <div class="logo-mobile clearfix">
                                    <button class="nav-toggle">
                                        <div class="icon-menu">
                                            <span class="line line-1"></span>
                                            <span class="line line-2"></span>
                                            <span class="line line-3"></span>
                                        </div>
                                    </button>
                                    <div class="logo-text">
                                        <div class="logo_img">
                                            <a href="<?= base_url(); ?>">
                                                <img src="<?= base_url($this->option->site_favicon) ?>">
                                            </a>
                                        </div>
                                    </div><!--end logo-text -->
                                </div><!--end logo-mobile-->
                            </div><!--end visi-->
                            <div class="nav-container">
                                <ul class="nav-menu menu">
                                    <li class="menu-item"> <a href="<?= base_url(); ?>" class="menu-link is-active" title="Trang chủ">Trang chủ</a></li>
                                    <?php foreach($Menu_ParentL as $root){?>
                                        <li class="menu-item <?= check_hassub($root->id_menu,$Menu)?>">
                                            <a href="<?= site_url($root->url); ?>" class="menu-link" title="<?= $root->name; ?>"><?= $root->name; ?></a>
                                            <ul class="nav-dropdown menu">
                                                <?php foreach($Menu as $chil){
                                                    if($chil->parent_id  == $root->id_menu){?>
                                                        <li class="menu-item">
                                                            <a href="<?= site_url($chil->url); ?>" class="menu-link" title="<?= $chil->name; ?>"><?= $chil->name; ?></a>
                                                        </li>
                                                    <?php }} ?>
                                            </ul><!--end ul nav-dropdown-->
                                        </li>
                                    <?php } ?>
                                    <li class="menu-item hidden-xs hidden-sm">
                                        <a href="<?= base_url(); ?>" title="<?=  $this->site_name; ?>">
                                            <img src="<?= base_url($this->option->site_logo) ?>">
                                        </a>
                                    </li>
                                    <?php foreach($Menu_ParentR as $root){?>
                                        <li class="menu-item <?= check_hassub($root->id_menu,$Menu)?>">
                                            <a href="<?= site_url($root->url); ?>" class="menu-link" title="<?= $root->name; ?>"><?= $root->name; ?></a>
                                            <ul class="nav-dropdown menu">
                                                <?php foreach($Menu as $chil){
                                                    if($chil->parent_id  == $root->id_menu){?>
                                                        <li class="menu-item">
                                                            <a href="<?= site_url($chil->url); ?>" class="menu-link" title="<?= $chil->name; ?>"><?= $chil->name; ?></a>
                                                        </li>
                                                    <?php }} ?>
                                            </ul><!--end ul nav-dropdown-->
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div><!--end nav-container-->

                        </div><!--end wrapper-->
                    </nav><!--end-->
                </div><!--end menu-head-->
            </div><!--end row-->
        </div><!--end container-->
    </div><!--end top-2-->

</header><!--end header-->
