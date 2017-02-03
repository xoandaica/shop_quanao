
<article>

<div class="container">
<div class="row">
<div class="slider_full_w">
    <div id="slider1_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <?php foreach($ads_category as $img){ ?>
                <div>
                    <a href="<?= $img->url; ?>">
                        <img  class="w_100 " u="image"  src="<?= base_url($img->link);?>" alt=""/>
                    </a>
                </div>
            <?php }?>
        </div>
        <div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
            <!-- bullet navigator item prototype -->
            <div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
        </div>
        <span u="arrowleft" class="jssora21l"  style="width: 55px; height: 55px; top: 123px; left: 8px;"> </span>
        <span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 8px"> </span>
    </div>

</div>
<div class="box_product_main border_top">
    <div class="text_spkm"><a href="">Sản phẩm khuyến mãi</a></div>
    <div class="clearfix"></div>
    <div class="block_content">
        <?php $km=0; foreach($product_km as $pro){  $km++;  ?>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="product_wrapper hover_box">
                    <a title="<?= $pro->name; ?>" href="<?= site_url($pro->cat_alias.'/' . @$pro->pro_alias.'-c'.$pro->cat_id.'p'.@$pro->pro_id); ?>" class="img_mobile_h">
                        <img class="w_100" src="<?= base_url($pro->image5)?>" alt="<?= $pro->name; ?>"/>
                    </a>
                </div>
            </div>
       <?php if($km >=8){ break; } } ?>
        <div class="clearfix"></div>
    <!--    <div class="block__footer">
            <a href="">Xem tất cả sản phẩm khuyến mãi mới nhất</a>
        </div>-->
    </div><!-- /block_content -->
</div>
<div class="clearfix"></div>
    <?php $c=1; $id_tbl= -1;
    foreach($home_cats as $k=>$cat){
        $id_c=$c++; $id_tbl++; ?>
        <div class="box_product_main border_top">
            <div class="list_title">
                <div class="title_main_1">
                    <a href="<?=base_url(@$cat->alias.'-pc'.@$cat->id);?>" title="<?= $cat->name; ?>"><?= $cat->name; ?></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php $cate= $function->cate_idarray($cat->id); ?>
            <div class="block_content">
                <?php $km2=0; foreach($products as $pro){
                        if (isset($pro->category_id) && in_array($pro->category_id, $cate)  ) {
                        $km2++;  ?>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="product_wrapper hover_box">
                            <a title="<?= $pro->pro_name; ?>"  href="<?= site_url($pro->cat_alias.'/' . @$pro->pro_alias.'-c'.$pro->cat_id.'p'.@$pro->pro_id); ?>" class="img_mobile_h">
                                <?= check_img_mobile($pro->pro_image5,$pro->pro_name)?>
                            </a>

                        </div>
                    </div>
                <?php if($km2 >=8){ break; } }} ?>
                <div class="clearfix"></div>
                <div class="block__footer">
                    <a href="<?=base_url(@$cat->alias.'-pc'.@$cat->id);?>" title="<?= @$cat->name; ?>">Xem tất cả sản phẩm</a>
                </div>
            </div><!-- /block_content -->
        </div>
        <div class="clearfix"></div>

    <?php  unset($home_cats[$k]); }?>

</div>
</div>

</article>


<script type="text/javascript" src="<?= base_url('assets/js/site/slider_full_w.js') ?>"></script>