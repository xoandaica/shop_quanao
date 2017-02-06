<!DOCTYPE html>
<html lang="en">
<?php $_SESSION['quyenhan']='admin'; ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta property="og:title" content="<?= @$Pagetitle; ?>" />
    <meta property="og:type" content="<?=@$facebook['type'];?>" />
    <meta property="og:image" content="<?=@$facebook['image'];?>" />
    <meta property="og:url" content="<?=@$facebook['url'];?>" />
    <meta property="og:description" content="<?= @$Description ?>" />

    <title><?= @$headerTitle?></title>

    <!-- Bootstrap Core CSS -->
    <link rel="shortcut icon" type="image/png" href="<?=base_url('assets/favicon.png')?>">
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style_meu_filter.css')?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/sb-admin.css')?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url('assets/css/plugins/morris.css')?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?=base_url('assets/js/jquery-1.9.1.js')?>"> </script>
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/ckfinder/ckfinder.js')?>" type="text/javascript"></script>

    <script src="<?= base_url('assets/js/admin/images.js')?>" type="text/javascript"></script>


    <link href="<?=base_url('assets/css/bootstrap-toggle.min.css')?>" rel="stylesheet">
    <script src="<?=base_url('assets/js/bootstrap-toggle.min.js')?>"></script>


    <script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-en.js') ?>"></script>
    <link href="<?= base_url('assets/plugin/ValidationEngine/style/validationEngine.jquery.css') ?>" rel="stylesheet" media="all"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".validate").validationEngine();
        });
    </script>
</head>
<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url('vnadmin')?>"><i class="fa fa-user"></i> Admin-CP</a>
        </div>
        <!-- Top Menu Items -->
        <a href="<?= base_url(); ?>" style="color: rgb(157, 157, 157); text-decoration: none;" target="_blank" ><i class="fa fa-home fa-2x" style="color: rgb(157, 157, 157); margin-top: 10px; margin-left: 32px; "></i><?= lang('home')?></a>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown <?= @$display_lang; ?> hidden">
                <div class="col-sm-3 pull-left lang_select">
                    <select class="input-sm"  onchange="window.open(this.options[this.selectedIndex].value,'_parent');this.options[0].selected=true">                        <?php if(isset($lang)){
                            foreach($lang as $v){ ?>
                            <option  <?= $v->id == @$this->language?'selected class="red"':''; ?>
                            value="<?= base_url('home/lang/'.$v->alias); ?>"><?= $v->name; ?></option>
                        <?php  }}?>
                    </select>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $this->session->userdata('adminname')?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= base_url('vnadmin/admin/users')?>"><i class="fa fa-fw fa-cogs"></i> Phân quyền </a>
                    </li>
                    <li>
                        <a href="<?= base_url('vnadmin/doi-mat-khau')?>"><i class="fa fa-fw fa-refresh"></i> Đổi mật khẩu</a>
                    </li>
                    <li class="divider"></li>
                    <li class="">
                        <a href="<?= base_url('vnadmin/logout')?>"><i class="fa fa-fw fa-power-off" style="color: red"></i> Đăng xuất</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav menu_admin">
                <li class="">
                    <a href="<?= base_url('vnadmin')?>"><i class="fa fa-fw fa-dashboard"></i> Trang chủ</a>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-navicon"></i> Quản lý tin tức <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="<?= base_url('vnadmin/news/add')?>">Thêm tin tức</a>
                        </li>
                        <li>
                            <a href="<?= base_url('vnadmin/news/newslist')?>">Danh sách tin</a>
                        </li>
                        <li>
                            <a href="<?= base_url('vnadmin/news/categories')?>">Danh mục tin</a>
                        </li>
                        <li class="display_none">
                            <a href="<?= base_url('vnadmin/news/newslist_recycle')?>">Thùng rác tin</a>
                        </li>

                    </ul>
                </li>

                <li class="hidden">
                    <a href="javascript:;" data-toggle="collapse" data-target="#project">
                        <i class="fa fa-navicon"></i> Quản lý <?= _title_project?> <i class="fa fa-fw fa-caret-down"></i>
                    </a>
                    <ul id="project" class="collapse">
                        <li>
                            <a href="<?= base_url('vnadmin/project/add')?>">Thêm <?= _title_project?></a>
                        </li>
                        <li>
                            <a href="<?= base_url('vnadmin/project/projects')?>">Danh sách <?= _title_project?></a>
                        </li>
                        <li>
                            <a href="<?= base_url('vnadmin/project/categories')?>">Danh mục <?= _title_project?></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#product"><i class="fa fa-navicon"></i>Quản lý <?= _title_product?> <i class="fa fa-fw fa-caret-down"></i>
                        <span id="count_order" style="    color: #fff;
                                                            font-size: 10px !important;
                                                            border-radius: 50%;
                                                            position: absolute;
                                                            margin: -9px 0px 0px -18px;"></span>
                    </a>
                    <ul id="product" class="collapse">
                        <li>
                            <a href="<?= base_url('vnadmin/product/add')?>">Thêm <?= _title_product?>  </a>
                        </li>
                        <li>
                            <a href="<?= base_url('vnadmin/product/products')?>">Danh sách <?= _title_product?>   </a>
                        </li>
                        <li>
                            <a href="<?= base_url('vnadmin/product/categories?is_cat=1')?>">Danh mục <?= _title_product?>  </a>
                        </li>
                        <li style="display: none;">
                            <a href="<?= base_url('vnadmin/trademark/trademark_category')?>">Thương hiệu</a>
                        </li>
                        <!--<li>
                            <a href="<?/*= base_url('vnadmin/danh-muc-hangsx')*/?>">Danh sách hãng SX</a>
                        </li>-->
                        <li class="">
                            <a href="<?= base_url('vnadmin/order/orders')?>"> Danh sách đặt hàng
                                <span id="count_order2" style="    color: #fff;
                                                            font-size: 10px !important;
                                                            border-radius: 50%;
                                                            position: absolute;
                                                            margin: -3px 0px 0px 0px;"></span>
                            </a>
                        </li>

                        <li class="hidden" >
                            <a href="<?= base_url('vnadmin/list-shipping')?>">
                                <i class="fa fa-angle-double-right"></i>
                                Phí vận chuyển
                            </a>
                        </li>
                        <li class="hidden">
                            <a href="<?= base_url('vnadmin/list-code-sale')?>">
                                <i class="fa fa-angle-double-right"></i>
                                Quản lý mã giảm giá
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('vnadmin/menu/menulist')?>"><i class="fa fa-navicon"> </i> Quản lý menu</a>
                </li>
                <!--<li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#raovat">
                        <i class="fa fa-navicon"></i> Quản lý rao vặt
                        <span id="count_post" style="color: #fff; font-size: 10px !important;border-radius: 50%;"></span>
                        <i class="fa fa-fw fa-caret-down"></i>

                    </a>
                    <ul id="raovat" class="collapse">
                        <li>
                            <a href="<?/*= base_url('vnadmin/raovat/raovat_list')*/?>">Danh sách tin rao vặt</a>
                        </li>
                        <li>
                            <a href="<?/*= base_url('vnadmin/raovat/cat_raovat')*/?>">Danh mục rao vặt</a>
                        </li>
                    </ul>
                </li>-->


                <li>
                    <a href="<?= base_url('vnadmin/pages/pagelist')?>"><i class="fa fa-navicon"></i> Quản lý nội dung</a>
                </li>
                <li>
                    <a href="<?= base_url('vnadmin/imageupload/banners')?>"><i class="fa fa-navicon"></i> Quản lý banner</a>
                </li>
                <li>
                    <a href="<?= base_url('vnadmin/contact/contacts')?>"><i class="fa fa-navicon"></i> Quản lý liên hệ</a>
                </li>
                <li class="hidden">
                    <a href="<?= base_url('vnadmin/contact/contacts2')?>"><i class="fa fa-navicon"></i>Đăng ký Voucher</a>
                </li>
                <!--<li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#report"><i class="fa fa-navicon"></i> Báo cáo-Thống kê <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="report" class="collapse">
                        <li>
                            <a href="<?/*= base_url('admin/report/soldout')*/?>"> Hết hàng</a>
                        </li>
                        <li>
                            <a href="<?/*= base_url('admin/report/bestsellers')*/?>"> Hàng bán chạy</a>
                        </li>
                    </ul>
                </li>-->
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#banner"><i class="fa fa-navicon"></i> Module khác <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="banner" class="collapse">
                        <li class="hidden">
                            <a href="<?= base_url('vnadmin/personnel/personnels')?>"> Quản lý Nhân viên </a>
                        </li>
                         <li class="hidden">
                            <a href="<?= base_url('vnadmin/support_online/listSuport')?>">Hỗ trợ trực tuyến</a>
                        </li>
                        <li class="hidden">
                            <a href="<?= base_url('vnadmin/customerIdea/customerIdeas')?>"> Ý kiến khách hàng </a>
                        </li>
                        <li class="hidden">
                            <a href="<?= base_url('vnadmin/users/emails')?>"> Quản lý email KM </a>
                        </li>

                        <li>
                            <a href="<?= base_url('vnadmin/site_option')?>"> Cấu hình hệ thống </a>
                        </li>
                    </ul>
                </li>
                <li class="display_none">
                    <a href="<?= base_url('vnadmin/comment/comments')?>">
                         Quản lý bình luận
                        <span id="count_cmt"
                              style="color: #fff; font-size: 10px !important;border-radius: 50%;"></span>
                    </a>
                </li>

                <li class="">
                    <a href="<?= base_url('vnadmin/users/userslist')?>"> Quản lý thành viên</a>
                </li>


                    <!--<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#menu"><i class="fa fa-navicon"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="menu" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>-->


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <script>
        jQuery(document).ready(function ($) {
            // Get current url
            // Select an a element that has the matching href and apply a class of 'active'. Also prepend a - to the content of the link
            var url = window.location.href;
            $('.menu_admin  a[href="' + url + '"]').parent().addClass('active');

            $('.menu_admin  a[href="' + url + '"]').parent().parent().parent('li').addClass('active').find('.collapse').addClass('in');

        });

        function count_comments(){

            var baseurl='<?php echo base_url();?>';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: baseurl + 'admin/admin/count_comments',
                success: function (result) {
                    if(parseInt(result)>0){
                        $('#count_cmt').empty();
                        $('#count_cmt').html('('+result+')');
                    }//
                }
            })
        }

        function count_post(){

            var baseurl='<?php echo base_url();?>';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: baseurl + 'admin/admin/count_post',
                success: function (result) {
                    if(parseInt(result)>0){
                        $('#count_post').empty();
                        $('#count_post').html('('+result+')');
                    }//
                }
            })
        }

        function count_order(){

            var baseurl='<?php echo base_url();?>';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: baseurl + 'admin/admin/count_order',
                success: function (result) {
                    if(parseInt(result)>0){
                        $('#count_order').empty();
                        $('#count_order').html('('+result+')');
                        $('#count_order2').html('('+result+')');
                    }//
                }
            })
        }
        count_comments();
        count_post();
        count_order();
        $(document).ready(
            function() {
                setInterval(function() {
                    count_comments();
                    count_post();
                    count_order();
                }, 60000);
            });
    </script>
    <input type="hidden" id="baseurl" value="<?=base_url();?>"/>