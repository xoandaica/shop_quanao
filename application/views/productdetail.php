<link  href="<?= base_url('assets/css/site/related_product.css')?>" rel="stylesheet"/><!-- slider san pham tham khao -->
<script type="text/javascript" src="<?= base_url('assets/js/site/jqueryZoom.js')?>"></script><!-- prod_slider zoom -->

<script type="text/javascript" src="<?= base_url('assets/js/site/related_product.js')?>"></script><!-- slider san pham tham khao -->
<article>
<div class="container">
<div class="row_pc">
<div class="content_detail_prod clearfix">
<div class="box_title_x  w_100">
    <a href="<?= base_url()?>" class="back_link" title="">TRANG CHỦ </a>
    <i class="fa fa-angle-right"></i>
    <?php creat_break_crum('product', $cate, @$cate_current->id); ?>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-4 col-sm-5 col-xs-6 col-480-12">
        <div class="bzoom_wrap" id="bzoom_wrap">
            <ul id="bzoom" class="image-list">
                <li>
                    <img class="bzoom_thumb_image" src="<?= base_url($pro_first->image)?>" alt="" title="<?= $pro_first->name?>" />
                    <img class="bzoom_big_image" src="<?= base_url($pro_first->image)?>" alt="" title="<?= $pro_first->name?>"/>
                </li>
                <?php foreach($product_image as $img) { ?>
                <li>
                    <img class="bzoom_thumb_image" src="<?= base_url($img->link)?>" alt="<?= $pro_first->name?>"   />
                    <img class="bzoom_big_image" src="<?= base_url($img->link)?>" alt="<?= $pro_first->name?>"  />
                </li>
                <?php } ?>
            </ul>
            <script type="text/javascript">
                $("#bzoom").zoom({
                    zoom_area_width: 450,
                    autoplay_interval :3000,
                    small_thumbs : 4,
                    autoplay : false
                });
                $(window).load(function(){
                    var imglage=$('.bzoom_thumb_image').height();
                    var imgsmall=$('.bzoom_smallthumb_active').height();
                    $('.bzoom_wrap').height(parseInt(imglage)+parseInt(imgsmall)+20);
                });
            </script>
        </div>
    </div>
    <div class="col-md-8 col-sm-7 col-xs-6 col-480-12">
        <div class="sub_prod_detail">
            <h1 class="name_prod_detail"><?= $pro_first->name?></h1>
            <div class="clearfix"></div>
            <section class="col-md-3  col-sm-3 col-xs-12 ma_detail">Mã sp: <?= $pro_first->code?></section>
            <section class="col-md-9 col-sm-9 col-xs-12 " style="margin-top: 5px;">
                <ul class="list-inline">
                    <div class="like"></div>
                    <li>
                        <div class="qantam qantam-active btn btn-xs btn-default " style="">
                            <div>
                                <a  onclick="add_liked(<?= @$pro_first->id?>)">Quan tâm</a>
                                <i class="fa fa-heart" style="color: #aaaaaa"></i>
                            </div>
                        </div>
                        <!--jquery btt face-->
                    </li>

            <li>
                <div class="fanpage">
                <div class="fb-like" data-href="<?= $link_share?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                </div>
            </li>
                <li class="google">
                <div style="float: left; margin-top: -5px;" class="g-plusone" data-annotation="inline" data-width="200"></div>
                </li>
                </ul>
                    </br>
                </br>

            </section>
            </div>
            <div class="clearfix"></div>
            <div class="desc_detail_title">
                Thông tin sản phẩm:
            </br>
                <p class="page-content pro-desc"> <?= $pro_first->description ?></p>

            </div>
            <div></div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-xs-6">
                    <?php if ($pro_first->price != null)  { ?>
                    <div class="price_parent">Giá cũ: <?= number_format($pro_first->price)?>&nbsp;VND</div>
                    <?php } ?>
                    <div class="clearfix"></div>
                    <div class="price_news_dentail">
                        <?= $pro_first->price_sale > 0 ? 'Giá: ' . number_format($pro_first->price_sale) . 'VNĐ' :'Giá: '. lang('contact') ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="price_parent">Giá sỉ:</div>
                    <div class="clearfix"></div>
                    <div class="price_news_dentail">
                        <?= $pro_first->desc > 0 ? ' ' . number_format($pro_first->desc) . 'VNĐ' : lang('contact') ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php $sale=0;  if ($pro_first->price_sale > 0 && $pro_first->price > 0 && $pro_first->price > $pro_first->price_sale) {
                $sale = $pro_first->price - $pro_first->price_sale;
                ?>
                <div class="save_money">
                   Tiết kiệm <?= number_format($sale)?>đ (<?= check_sale($pro_first->price_sale,$pro_first->price)?>%)
                 </div>
            <?php } ?>
            <div class="clearfix"></div>
            <br>
            <div class="color_size">
                <div style="padding: 0px 5px; line-height: 30px; float: left">Size</div>
                <?php if ($pro_first->size1 != 0 ) { ?>
                <div class="size" style="min-width: 30px; height: 30px; float: left; margin-right: 5px; border: 1px #aaa solid">
                    S
                </div>
                <?php } ?>
                <?php if ($pro_first->size2 != 0 ) { ?>
                    <div class="size" style="min-width: 30px; height: 30px; float: left; margin-right: 5px; border: 1px #aaa solid">
                        M
                    </div>
                <?php } ?>
                <?php if ($pro_first->size3 != 0 ) { ?>
                    <div class="size" style="min-width: 30px; height: 30px; float: left; margin-right: 5px; border: 1px #aaa solid">
                       L
                    </div>
                <?php } ?>
                <?php if ($pro_first->size4 != 0 ) { ?>
                    <div class="size" style="min-width: 30px; height: 30px; float: left; margin-right: 5px; border: 1px #aaa solid">
                        XL
                    </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <div class="btn_mua">
                <a onclick="add_cart(<?= @$pro_first->id; ?>)">
                    <img src="<?= base_url('assets/css/img/btn-mua.png')?>">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div style="border: 1px #aaa solid; padding: 15px 30px 15px 13px; margin-bottom: 15px;margin-top: 15px;">
    <div class="row">
        <div class="col-md-12">
            <div class="page-content">
                <?= @$pro_first->content ?>
            </div>
        </div>
        <div class="clearfix" style=""></div>
        <div style="width: 100%;padding-top: 20px;"></div>
        <div class="col-md-7" style="">
            <h2 style="margin: 0px">
                <?= @$pro_first->code ?>
            </h2>
            <div style="color: red; font-weight: bold; font-size: 20px">
                <?= $pro_first->price_sale > 0 ? ' Giá: ' . number_format($pro_first->price_sale) . 'đ' : 'Giá: '.lang('contact') ?>
            </div>
        </div>
        <div class="col-md-5 col-xs-12">
            <div class="pull-right" style="">
                <a onclick="add_cart(<?= @$pro_first->id; ?>)">
                    <img src="<?= base_url('assets/css/img/btn-mua.png')?>">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<h3>
    <i class="fa fa-comments"></i> Nhận xét &amp; Thảo luận
</h3>
<div class="fb-comments" data-href="<?= @$link_share; ?>" data-num-posts="10"
     data-order-by='reverse_time' data-width="100%" data-colorscheme="dark">
<div class="hidden" style="position: relative">
    <textarea onfocus="check_login()" id="comment" name="comment" placeholder="Viết bình luận..."
              style="padding-right: 50px" class="form-control"></textarea>
    <button class="btn btn-default btn-xs" data-items="941" data-reply="0" data-content="comment"
            data-toggle="modal" data-target=".bs-example-modal-sm" id="btn_sent"
            style="position: absolute; top: 20px; right: 10px">Gửi
    </button>
</div>
<div class="" style="padding-left: 15px; color: #333; font-size: 14px; line-height: 20px">Chưa có bình luận nào.</div>
<div class="clearfix"></div>
<div class="fb-comments"
     data-href="https://www.facebook.com/FacebookVietnam/photos/pb.278992552121199.-2207520000.1464146751./983061755047605/?type=3&amp;theater"
     data-width="100%" data-numposts="5">
</div>
<div class="clearfix"></div>
    <section class="pro_box_title ">
    <strong>Sản phẩm  tham khảo</strong>
</section>
<div class="clearfix"></div>
<div class="ma-onsaleproductslider-container module-top">
<div class="row">
<ul class="owl">
    <?php  ;
    $count = 0;
    foreach ($product_lq as $p) {
    if ($p->id != $pro_first->id) {
    $count++; ?>
<li class='onsaleproductslider-item item'>
    <div class="item-inner">
        <div class="box_prod_home">
            <div class="img_prod_home">
                <a class="h_15"
                   href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                   title="<?= $p->name ?>">
                    <img class="w_100" src="<?= base_url($p->image) ?>"
                         alt="<?= $p->name ?>"/>
                </a>
                <div class="view_prod_detail" style="display: none">
                    <?= LimitString($p->description,110) ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="sub_prod_home">
                <div class="name_prod_home">
                    <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                       title="<?= $p->name ?>">
                        <?= $p->name ?>
                    </a>
                </div>
                <div class="clearfix"></div>
                <div class="prince_retail clearfix">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="row">
                            <div class="prince_new_retail">Giá lẻ: <span
                                    style="font-size: 14px; color: #ff0000; font-weight: bold">
                                                           <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'đ' : lang('contact') ?>
                                                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="row">
                            <?php if ($p->price != null)  { ?>
                                <del class="prince_old_retail pull-right"><?= number_format($p->price)?>đ</del>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                        <?php if ($p->desc != null && $p->desc != 0 )  { ?>
                            <div class="prince_wholesale_retail">Giá sỉ: <span
                                    style="font-size: 14px; color: #ff0000; font-weight: bold"><?= number_format($p->desc) ?>đ</span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="row">
                        <div class="pull-right">
                            <a style="cursor: pointer;"
                               onclick="add_cart(<?= @$p->id; ?>)" class="fa fa-shopping-cart cart_pro_home"></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
    <?php if ($count == 8) break;  } } ?>
</ul>
</div>
<script type="text/javascript">
    $jq(document).ready(function () {
        $jq(".ma-onsaleproductslider-container .owl").owlCarousel({
            autoPlay: false,
            items: 4,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [980, 3],
            itemsTablet: [768, 2],
            itemsMobile: [479, 1],
            slideSpeed: 1000,
            paginationSpeed: 3000,
            rewindSpeed: 3000,
            navigation: true,
            stopOnHover: true,
            pagination: false,
            scrollPerPage: true,
        });
    });
</script>

<script type="text/javascript">
    if (typeof MA == 'undefined') MA = {};
    MA.QuickView = {
        CATEGORY_ENABLE: 'true',
        BASE_URL: '',
        PARENT_ELEMENT: 'item-inner',
        CHILDREN_ELEMENT: 'actions'
    };
    initQuickButton('.ma-newproductslider-container');
    initQuickButton('.ma-onsaleproductslider-container');
    initQuickButton('.category-tab-container');
    initQuickButton('.ma-featuredproductslider-container');
</script>

</div>


</div>
</div>
</div>
</article>

<div class="clearfix"></div>