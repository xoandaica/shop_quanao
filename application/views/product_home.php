<article>
    <div id="top"></div>
    <div class="clearfix visible-xs"></div>
    <div class="back_link">
        <div class="container">
            <div class="col-md-3 col-xs-12 col-sm-4">
                <div class="tit_back_link_mb">
                    <i class="fa fa-home"></i>
                    &nbsp;
                    <i class="fa  fa-caret-right"></i>
                    &nbsp;&nbsp;&nbsp; Sản phẩm home
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-md-offset-2 col-sm-offset-1">
                <ul class="list-inline">
                    <li class="hidden">
                        <div class="fb-like fb_iframe_widget" data-href="https://developers.facebook.com/docs/plugins/"
                             data-layout="button_count" data-action="like" data-show-faces="true"
                             data-share="true"></div>

                    </li>
                    <li class="hidden">
                        <div class="g-plusone" data-annotation="inline" data-width="300"></div>
                    </li>
                </ul>
                <div class="pull-right">
                    <i class="fa fa-phone"></i> &nbsp; <?= $this->option->hotline1 ?>
                    ; <?= $this->option->hotline2 ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="menu_bottom_header">
        <div class="container">
            <div class="row black-link">
                <div class="hidden-xs hidden-sm hidden-md hidden-lg">
                    <h1>Sản phẩm home</h1>
                </div>
                <ul>
                    <li class="">
                        <a href="<?= base_url() ?>">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li class="active" style="color: #fffc00;">
                        <a href="">Sản phẩm home</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <section class="ds_product container">
        <div class="row">
            <?php $count = 0;
            foreach ($list as $p) {
                ?>
                <section class="col-md-3 col-sm-4 col-xs-12">
                    <div class="sty_pro">
                        <section>
                            <div class="sty_hover_caption_ds_pro">

                                <a class="h_784"
                                   href="<?= base_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                   title="<?= $p->name ?>">
                                    <img class="w_100" src="<?= base_url($p->image) ?>" alt="<?= $p->name ?>"/>
                                </a>
                            <span class="caption_ds text_caption">
                                <p>   <?= $p->name ?></p>
                            </span>
                            </div>
                        </section>
                        <div class="clearfix"></div>
                        <div class="title_pro">
                            <a href="<?= base_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                               target="_self">
                                <?= $p->name ?>
                            </a>
                        </div>
                        <div class="price_pro col-md-12">
                            <div class="item_price">
                                <div class="col-md-6 col-sm-6 col-xs-6 sale">
                                    <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . '<sup>đ</sup>' : 'Liên hệ' ?>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 <?php if ($p->price == 0) {
                                    echo 'hidden';
                                } ?> item_price_befor">
                                    <del> <?= number_format($p->price) ?><sup>đ</sup></del>
                                </div>
                            </div>

                        </div>
                        <div class="thrifty row">
                            <?php if ($p->price > $p->price_sale) { ?>
                                <div class="thrifty_money col-xs-9 ">
                                    <?php if ($p->price_sale > 0 && $p->price > 0 && $p->price > $p->price_sale) { ?>
                                        <?php $tong = 0;
                                        $sale = 0;
                                        $sale = 0;
                                        $sale = $p->price - $p->price_sale;
                                        $tong = $p->price_sale / $p->price;
                                        $tong = $tong * 100;
                                        $tong = 100 - $tong;
                                        $tong = (int)$tong;
                                        ?>
                                        <div class="">
                                            <?= lang('saving') ?>
                                            <?php $sale = 0;
                                            $sale = $p->price - $p->price_sale;
                                            ?>
                                            <?= number_format($sale) ?> đ
                                            (<?= $tong ?>%)
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <a href="<?= base_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                   class="pull-right">
                                    <div class="more_read">
                                        <i class="fa fa-angle-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <div class="clearfix"></div>
            <div class="phantrang ">
                <?php echo $this->pagination->create_links(); // tạo link phân trang ?>
            </div>
        </div>
    </section>
</article>