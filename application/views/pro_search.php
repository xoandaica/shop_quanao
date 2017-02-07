<article>
    <div class="container">
        <div class="row_pc">

            <div class="clearfix"></div>
            <div class="list_prod_home">
                <div class="kk-shop">
                    <div class="row">
                        <?php
                        $count = 0;
                        if ($list != null) {
                            foreach ($list as $p) {
                                $count++;
                                ?>
                                <div class="col-md-3 col-sm-4 col-xs-6 kk-item">
                                    <div class="kk-image">
                                        <a
                                            href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                            title="<?= $p->name ?>">
                                            <img  width="227" height="340" class="attachment-235x340 size-235x340 wp-post-image" src="<?= base_url($p->image) ?>"
                                                  alt="<?= $p->name ?>"/>
                                        </a>
                                        <span><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/new.png" alt=""></span>
                                        <div class="kk-size hidden-xs hidden-sm">
                                            <div class="size">
                                                <span class="pull-left">Size</span>
                                                <span class="pull-right">
                                                    <ul>
                                                        <li id="dsize_s" onclick="xaddcart('s')" itemid="s">S</li>
                                                        <li id="dsize_m" onclick="xaddcart('m')" itemid="m">M</li>
                                                        <li id="dsize_l" onclick="xaddcart('l')" itemid="l">L</li>
                                                        <li id="dsize_xl" onclick="xaddcart('xl')" itemid="xl">XL</li>
                                                    </ul>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kk-name"><a href="shop/dam-cong-so-kk63-43/index.html"><?= $p->alias ?></a></div>
                                    <div class="kk-price"><span class="amount"><?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'đ' : lang('contact') ?></span> VNĐ</div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="list_paging" style="text-align: center; margin-bottom: 25px">
<?php echo $this->pagination->create_links(); // tạo link phân trang  ?>
            </div>


        </div>
    </div>
</article>

<div class="clearfix"></div>