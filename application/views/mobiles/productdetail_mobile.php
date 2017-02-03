
<article>
    <div class="container">
        <div class="row">
            <div class="show_product">

                <div class="box_show_product">
                    <div id="slider_show_product"
                         style="position: relative; margin: 0 auto; top: 0px; left: 0px;
                          width: 1000px; height:500px ; overflow: hidden;">
                        <div u="slides"
                             style="cursor: move; position: absolute; left: 0px;
                             top: 0px; width: 1000px; height: 500px; overflow: hidden;">


                            <div class="center">
                                <a href="">
                                    <?= check_img_product_chitiet($pro_first->image); ?>
                                </a>
                            </div >

                            <?php if (isset($product_img)) {
                            foreach ($product_img as $p) {
                            ?>
                                <div class="center">
                                    <a href="">
                                        <img style="min-height: 300px !important;" class="w_60 " alt="<?= @$pro_first->name; ?>" u="image" src="<?= base_url($p->link) ?>"/>
                                    </a>
                                </div >
                            <?php }}?>
                        </div>
                        <div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
                            <!-- bullet navigator item prototype -->
                            <div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align:center; line-height:19px; color:White; font-size:12px;"></div>
                        </div>

                        <span u="arrowleft" class="jssora21l"  style="width: 55px; height: 55px; top: 123px; left: 75px;">
                        </span>

                        <span u="arrowright" class="jssora21r"style="width: 55px; height: 55px; top: 123px; right: 75px">
                        </span>

                    </div>
                </div><!-- /box_show_product -->

                <div class="clearfix"></div>
                <div class="box_subpage_prod">
                    <span class="b_13px"><?= @$pro_first->name; ?></span>
                    <div class="clearfix"></div>
<!--                    <span class="n_12px">Thương hiệu:</span> <a href="" title="Nhãn hiệu"><span class="blue_12px">Thiên Hoàng</span></a>-->
                    <div class="clearfix"></div>
                    <div class="price_prod">
                        <span class="red_13b">
                            <?= number_format(@$pro_first->price_sale); ?>đ
                        </span>
                        <del> <?= number_format(@$pro_first->price); ?>đ</del> |
                        <?php if($pro_first->price > 0 && $pro_first->price_sale > 0){
                            echo''.floor(100-($pro_first->price_sale/$pro_first->price)*100).'%';
                        }else{
                            echo'';
                        }?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box_cart">
                        <div class="icon_cart_mb">
                            <a href=""><i class="fa fa-shopping-cart"></i></a>
                        </div>
                        <div class="text_cart">
                            <a style="cursor: pointer" onclick="add_cart(<?= @$pro_first->id; ?>)" >
                                Cho vào giỏ hàng
                            </a>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="product_info">
                        <div class="text_info">
                            Thông tin sản phẩm
                        </div>
                        <div class="clearfix"></div>
                        <div class="describe_prod">
                            <?= $pro_first->detail; ?>
                        </div>
                    </div>
                </div><!-- /box_subpage_prod -->
                <div class="cleafix"></div>
                <div class="similar_product">
                    <div class="slider_promotion_mobile">
                        <div class="title_mobile">
                            Sản phẩm tương tự
                        </div>


                        <div class="box_subpage">
                            <?php $x=1;
                            if(isset($product_lq)) {
                                foreach ($product_lq as $key=>$n) {
                                    $z=$x++;
                                    ?>
                                    <div class="col-xs-6">
                                        <div class="row">
                                            <div class="box_prod_mb">
                                                <a   href="<?=base_url($cate->alias.'/'.$n->alias.'-c'.$cate->id.'p'.$n->id)?>" title="<?= $n->name; ?>">
                                                    <?= check_img_products($n->image)?>
                                                </a>
                                                <div class="box_subprod">
                                                    <a  class="title_prod" href="<?=base_url($cate->alias.'/'.$n->alias.'-c'.$cate->id.'p'.$n->id)?>"
                                                        title="<?= $n->name; ?>">
                                                        <?= LimitString($n->name,85,'...'); ?>
                                                    </a>
                                                    <div class="clearfix"></div>
                                                    <div class="red_14">
                                                        <?php if($n->price_sale != 0){
                                                            echo''.number_format($n->price_sale).'đ';
                                                        }  ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php if($z%2==0) echo '<div class="clearfix" ></div>';  } }?>


                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</article>

<script type="text/javascript" src="<?= base_url('assets/js/site/show_product.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/site/mobile/sliding.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/site/mobile/itemslide.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/site/mobile/jquery.mousewheel.min.js') ?>"></script>
