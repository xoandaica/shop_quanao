// giỏ hàng
<script type="text/javascript">
    function base_url(){
        return '<?php echo base_url();?>';
    }

</script>
// btn-mua
<div class="buy_pro col-md-4">
    <a  title="Mua ngay sản phẩm"  class="add-cart" style="cursor: pointer;" onclick="add_cart(<?= @$pro_first->id; ?>)">
        Mua ngay
    </a>
</div>
<!--link-->
<?php creat_break_crum('products',$cate,@$cate_curent->id); ?>
<i class="fa fa-angle-right"></i>
<?php creat_break_crum2('product',$cate,$cate_current->id); ?>
<!-- code menu-->
<?php foreach($menus as $menu){
    if($menu->parent_id==0){?>
        <li class="menu-item  menu-li-root <?php check_hassub($menu->id_menu, $menu_sub); ?>"
            style="z-index: 999999 !important; position: relative !important;">
            <a target="<?= $menu->target?>" <?php if($menu->url != 'null')  echo 'href="'.site_url($menu->url).'"'?> class="menu-link" title="<?=$menu->name;?>"><?=$menu->name;?></a>
            <ul class="nav-dropdown menu-ul-root" >
                <?php foreach($menu_sub as $sub){
                    if($menu->id_menu==$sub->parent_id){?>
                        <li class="menu-item menu-li-sub" style="position: relative !important;">
                            <a target="<?= $sub->target?>"  <?php if($sub->url != 'null')  echo 'href="'.site_url($sub->url).'"'?> title="<?=$sub->name;?>" class="menu-link">
                                <?=$sub->name;?>
                            </a>
                        </li>
                    <?php }} ?>
            </ul>
        </li>
    <?php }}?>
<!--end code menu-->
<!--    code banner-slide -->
<?php $data['slider']              = $this->f_homemodel->getBanner('banner'); ?>
<?php $data['banner_top']        =$this->f_homemodel->Get_images('banner',5,0); ?>
<?php foreach ($slider as $key => $img) { ?>
    <div class="img">
        <a target="<?= $img->target ?>" <?php if ($img->url != null) {
            echo ' href="' . $img->url . '" ';
        } ?> title="<?= $img->title?>">
            <img class="w_100"   u="image" src="<?= base_url($img->link); ?>" alt="<?= $img->title?>"/>
        </a>
    </div>
<?php } ?>
<!--end code banner-slide-->
<!--code sanpham-->
<!--product-->
<?php $count=0; foreach ($pro_home as $p ) { ?>
    <a href="<?= site_url($p->cat_alias.'/'.$p->alias.'-c'. $p->cat_id.'p'. $p->id) ?>" title="<?= $p->name?>">
        <img class="w_100" src="<?= base_url($p->image)?>" alt="<?= $p->name?>"/>
    </a>
    <a href="<?= site_url($p->cat_alias.'/'.$p->alias.'-c'. $p->cat_id.'p'. $p->id) ?>" title="<?= $p->name?>">
        <?= $p->name?>
    </a>
    <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'VNĐ' : lang('contact') ?>

    <?php  if($count%4==0){ echo '<div class="clearfix-md"></div>'; }
       if($count%3==0){ echo '<div class="clearfix-sm"></div>'; }
       if($count%2==0){ echo '<div class="clearfix-xs"></div>'; }
} ?>
<div class="cleanfix">  </div>
<?php   echo $this->pagination->create_links(); // tạo link phân trang ?>
<!--product/category-->
<?php $data['product_cat_hot']   = $this->f_homemodel->getFirstRowWhere('product_category',array('hot'=> 1)); ?>
<?php $data['product_cat_focus']   = $this->f_homemodel->Get_product_category('focus',2,0); ?>
<?php foreach ($pro_cat_home as $cat ) {
    ?>
    <li>
        <a href="<?= base_url($cat->alias.'-pc'.$cat->id)?>" title="<?= $cat->name ?>">
            <img src="<?= base_url($cat->image)?>" style="margin-right: 6px; width: 25px; height: 32px;" alt="<?= $cat->name ?>"/><?= $cat->name ?></a>

    </li>
<?php } ?>
<!--end code sanpham-->
<!--file code tintuc-->
<?php $data['news_cat_home']           = $this->f_homemodel->Get_news_category('home',2,0);?>
<a href="<?= base_url($cat->alias.'-nc'.$cat->id)?>" title="<?= $cat->name ?>">
    <img src="<?= base_url($cat->image)?>"  alt="<?= $cat->name ?>"/>
    <?= $cat->name ?>
</a>

<?php $data['news_home']           = $this->f_homemodel->Get_news('home',100,0); ?>
<?php $c=0; foreach ($list as $key=>$n) { $c++; ?>
    <a href="<?= site_url($n->cat_alias.'/'.$n->alias.'-c'.$n->cat_id.'n'.$n->id)?>" title="<?= $n->title?>">
        <img class="w_100" src="<?= base_url($n->image)?>" alt="<?= $n->title?>"/>
    </a>
    <a href="<?= site_url($n->cat_alias.'/'.$n->alias.'-c'.$n->cat_id.'n'.$n->id)?>" title="<?= $n->title?>">
        <?= $n->title?>
    </a>
<?php } ?>

<!--lay da ta -->
<?php $data['page_home']       = $this->f_homemodel->Get_pages('home',1,0);  ?>
<a href="<?= site_url($p->alias.'-pg'.$p->id)?>" title="<?= $p->name; ?>">
 <img src="<?= base_url($p->icon); ?>" alt="<?= $p->name; ?>">
</a>
<h3>
    <a href="<?= site_url($p->alias.'-pg'.$p->id)?>" title="<?= $p->name; ?>" title="<?= $p->name; ?>"><?= $p->name; ?></a>
</h3>

<?php

//menu
$data['menus']           =$this->f_homemodel->GetMenu_Parent('top',10,0);
$data['menu_sub']        =$this->f_homemodel->GetMenu_Children('top',50,0);
// product
$data['pro_category']    =$this->f_homemodel->get_data('product_category',array('home' => 1,'lang' => $this->language));
$data['pro_home']        = $this->f_homemodel->Get_product('home',15,0);
$data['cat_home']        = $this->f_homemodel->Get_product_category('home',15,0);
//news
$data['news_cat']        = $this->f_homemodel->Get_news_category('home',15,0);
$data['news_home']       = $this->f_homemodel->Get_news('home',15,0);
//page

// lấy 1
$data['cate_news_one']   = $this->f_homemodel->getFirstRowWhere('news_category',array('home'=>1,'lang' => $this->language));
//lay banner
$data['banner_top']        =$this->f_homemodel->Get_images('banner',5,0);
//widget
$data['wiget_footer']=$this->widget('wiget_footer');
//  print_r($data['cate_news_one']); die();

//suport lấy dữ liệu bảng hỗ trợ trực tuyến
$data['support_online']          =$this->f_homemodel->get_data('support_online',array('active' => 1));
$sup->vitri;
$sup->name;
$sup->phone;
$sup->email;
$sup->email;
//<a target="_blank" href="ymsgr:SendIM?m=<?= $sup->yahoo?>"><img src="<?= base_url('assets/css/img/icon_yahoo.png') ?>" alt="icon"/></a>
<!--//<a  target="_blank" href="skype:--><?//= $sup->skype?><!--?chat"><img src="--><?//= base_url('assets/css/img/icon_skype.png') ?><!--" alt="icon"/></a>-->
// end suport lấy dữ liệu bảng hỗ trợ trực tuyến
//end


?>

// footer
<!--  thông báo  -->
<div id="show_added" style="position: fixed; top: 20px; right: 20px;z-index: 999999999999999999999 "></div>
<div id="show_success_mss" style="position: fixed; top: 20px; right: 20px">
    <?php if(isset($_SESSION['mss_success'])){?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?=$_SESSION['mss_success'];?>
        </div>
        <?php
        unset($_SESSION['mss_success']);
    }?>
</div>
<script>
    setTimeout(function(){
        $('#show_success_mss').fadeOut().empty();
    }, 5000)
</script>

<!--// validate-->
<script type="text/javascript">
   $(document).ready(function () {
        $(".validate").validationEngine();
    });
</script>
<script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-en.js') ?>"></script>
<link href="<?= base_url('assets/plugin/ValidationEngine/style/validationEngine.jquery.css') ?>" rel="stylesheet" media="all"/>

<!--// js hay dung-->
<!--banner chay theo màn hình-->
<div class="banner_fix banner_fix_right hidden-xs hidden-sm" style="">
    <?php foreach ($qc_right as $key => $sli) { ?>
        <a target="<?= $sli->target ?>" <?php if ($sli->url != null) {
            echo ' href="' . $sli->url . '" ';
        } ?> title="<?= $sli->title?>">
            <img class=""   style="width: 150; height: 400"  src="<?= base_url($sli->link); ?>" alt="<?= $sli->title?>"/>
        </a>
    <?php } ?>
</div>
<link rel="stylesheet" href=".css"/>
        element {
        }
        .banner_fix_left {
        left: 15px;
        }
        .fixed_bn {
        top: 170px !important;
        }
        .banner_fix {
        position: fixed;
        -moz-transition: all 1s ease-in-out !important;
        transition: all 1s ease-in-out !important;
        top: 170px;
        }
<script type="text/javascript">
    if (window.innerWidth > 1024) {
        $(window).scroll(function () {
            if ($(window).scrollTop() >=170) {
                $('.banner_fix').addClass('fixed_bn');
            }
            else {
                $('.banner_fix').removeClass('fixed_bn');
            }
        });
    }
</script>
<!---->
<!--end-->

<!-- pup up-->
<div class="modal fade in" id="formSaludo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block; background: rgba(4, 4, 4, 0.65)">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: 1px solid transparent">
            <!--
               <div class="modal-body">
                   <div class="fb-like" data-href="https://www.facebook.com/cloudsblacks" data-width="200" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>    </div>
               <div class="modal-footer">
                   <a class="btn btn-link" data-dismiss="modal" style="font-size:15px;color:#808080;cursor: pointer;text-decoration: none;">????,???...</a>
               </div>    -->
            <div class="col-md-9 col-md-offset-1">
                <?php if($pupup_home != null){ foreach( $pupup_home as $sli ) { ?>
                    <a target="<?= $sli->target ?>" <?php if ($sli->url != null) {
                        echo ' href="' . $sli->url . '" ';
                    } ?> title="<?= $sli->title?>">
                        <img class="img_100 w_100"  style="height: 100%; max-width: 100% " u="image" src="<?= base_url($sli->link); ?>" alt="<?= $sli->title?>"/>
                    </a>
                <?php } } ?>
            </div>
            <div class="modal-footer col-md-1" style="border-top:transparent">
                <button type="button" class="close closekm" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    /*   $(document).ready(function() {
     $('#formSaludo').click();
     });*/
    /*   setTimeout(function(){
     $('#formSaludo').fadeOut().empty();
     }, 3000)*/

    $( "button.closekm" ).click(function() {
        $('#formSaludo').fadeOut().empty();
    })
    $( "#formSaludo" ).click(function() {
        $('#formSaludo').fadeOut().empty();
    })
</script>
// liên kết xa hoi
// Google +
<script src="https://apis.google.com/js/platform.js" async defer>
    {lang: 'vi'}
</script>
<div class="g-plusone" data-annotation="inline" data-width="300"></div>