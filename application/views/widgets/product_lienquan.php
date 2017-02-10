<div class="hidden-sm">
    <div class="col-lg-3 col-md-3 col-xs-12 static-product-sidebar">
        <div class="row headding-page">
            <div class="col-md-12 col-xs-12">
                <div class="special-headding-2"><span>Sản phẩm hot nhất</span></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="kk-special mCustomScrollbar">
                    <div class="woocommerce">
                        <ul class="products">
                            <ul>

                                <?php
                                foreach ($product_lienquan as $p) {
                                    ?>
                                    <li>
                                        <div class="prothumb" ele="99467">
                                            <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"> 
                                                <img src="<?= base_url($p->image) ?>" class="img-thumbnail shop-imgs" >
                                            </a>
                                        </div>
                                        <p> <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"><?= $p->name ?><br />KK63-34</a></p>
                                        <p ><b><?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'đ' : lang('contact') ?></b></p>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>             
</div>