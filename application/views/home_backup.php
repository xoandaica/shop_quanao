<article>
    <div class="content_top clearfix">
        <div class="col-lg-193 col-md-3 col-sm-3 hidden-xs">
            <div class="row">
                <ul class="menu_content_left">

                    <?php foreach ($pro_cat_home as $cat) {
                        if ($cat->parent_id == 0) {
                            ?>
                            <li>
                                <a href="<?= base_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                                    <?= $cat->name ?>
                                </a>
                                <ul class="menu_content_left_ul2">
                                    <?php foreach ($pro_cat_home as $cat_sub) {
                                        if ($cat_sub->parent_id == $cat->id) {
                                            ?>
                                            <li>
                                                <a href="<?= base_url($cat_sub->alias . '-pc' . $cat_sub->id) ?>"
                                                   title="<?= $cat_sub->name ?>">
                                                    <?= $cat_sub->name ?>
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
        <div class="col-lg-597 col-md-6 col-sm-9 col-xs-12">
            <div class="row">
                <?= $slider_top ?>
            </div>
        </div>
        <div class="col-lg-210 col-md-3 col-sm-12 hidden-xs">
            <div class="row">
                <div class="content_top_right clearfix">
                    <div class="txt_nhapcode">Bạn đã có mã giảm giá?</div>
                    <div class="clearfix"></div>
                    <div class="input-group box_code">
                        <input type="text" class="form-control input_code" placeholder="">
                    <span class="input-group-btn">
                        <button class="btn btn-default button_code" type="button">OK</button>
                    </span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box_csbh">
                        <div class="tit_csbh">Chính sách bán hàng</div>
                        <div class="clearfix"></div>
                        <div class="list_csbh">
                            <?= $this->show_room ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="box_email_input">
                        <span class="txt_dkem">ĐĂNG KÝ EMAIL</span>

                        <div class="clearfix"></div>
                        <span class="txt_nnv">NHẬN NGAY VOUCHER 100.000đ</span>

                        <div class="clearfix"></div>
                        <form action="<?= base_url('gui-email') ?>" method="post" class="validate" role="form">
                            <div class="input-group form-send-email" style="margin:5px 12px 0px 10px;">
                                <input type="text" name="email"
                                       class="form-control validate[required,custom[email]] input_code"
                                       placeholder="Địa chỉ Email của bạn">

                        <span class="input-group-btn">
                            <button class="" name="send_emails2" type="submit" style="">
                                <img src="<?= base_url('assets/css/img/icon_email_z.png') ?>" alt=""/>
                            </button>
                        </span>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                        <div class="pull-right" style="margin: 5px 11px 0px 0px;">
                            <a href="" style="color: #fff">Đăng ký - nhận tiện ích</a>
                            <img style="margin-left: 8px" src="<?= base_url('assets/css/img/icon_ti.png') ?>" alt=""/>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <div class="video_left" style="">
                        <iframe width="100%" height="150"
                                src="https://www.youtube.com/embed/<?= $this->site_video ?>"
                                data-name="false" title='false' frameborder="" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($pro_cat_focus1 != null) {
        $count_cat = 0;
        foreach ($pro_cat_focus1 as $cat) {
            $count_cat++; ?>
            <div class="clearfix clearfix-10"></div>
            <div class="tt_content_home">
                <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>"
                   title="<?= $cat->name ?>"><?= $cat->name ?></a>
            </div>
            <div class="clearfix"></div>
            <div class="list_all_prod_content clearfix">
                <div class="col-lg-375 col-md-377 col-sm-4 hidden-xs">
                    <div class="row">
                        <div class="banner_content">
                            <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                                <img class="w_100" src="<?= base_url($cat->image) ?>" alt="<?= $cat->name ?>"/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-625 col-md-623 col-sm-8 col-xs-12">
                    <div class="border_list_prod">
                        <ul>
                            <?php  ;
                            $count = 0;
                            foreach ($pro_home as $p) {
                                if ($p->category_id == $cat->id) {
                                    $count++; ?>
                                    <li class="col-md-4 col-sm-4 col-xs-6 col-480-12">
                                        <div class="box_prod">
                                            <div class="img_prod">
                                                <a class="h_755"
                                                   href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                                   title="<?= $p->name ?>">
                                                    <img class="w_100" src="<?= base_url($p->image) ?>"
                                                         alt="<?= $p->name ?>"/>
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="sub_prod">
                                                <div class="name_prod">
                                                    <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                                       title="<?= $p->name ?>">
                                                        <?= $p->name ?>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="price_prod">
                                                    <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'VN?' : lang('contact') ?>
                                                </div>
                                                <div class="buy_now_prod">
                                                    <a style="cursor: pointer;" class="add-cart"
                                                       onclick="add_cart(<?= @$p->id; ?>)">
                                                        Mua ngay
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php if ($count == 6) break;
                                }
                            } ?>
                        </ul>
                    </div>
                </div>
                <div class="visible-xs col-xs-12">
                    <div class="row">
                        <div class="banner_content">
                            <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                                <img class="w_100" src="<?= base_url($cat->image) ?>" alt="<?= $cat->name ?>"/>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix clearfix-10"></div>
        <?php }    } ?>
    <?php if ($pro_cat_focus2 != null) {    $count_cat = 0;    foreach ($pro_cat_focus2 as $cat) {    $count_cat++; ?>
    <div class="clearfix clearfix-10"></div>
    <div class="tt_content_home">
        <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>"title="<?= $cat->name ?>"><?= $cat->name ?></a>
    </div>
    <div class="clearfix"></div>
    <div class="list_all_prod_content clearfix">
        <div class="col-lg-208 col-md-207 col-sm-222 col-xs-12">
            <div class="border_list_prod">
                <ul>
                    <?php  ;
                    $count = 0;
                    foreach ($pro_home as $p) {
                        if ($p->category_id == $cat->id) {
                            $count++; ?>
                            <li class="col-md-12 col-sm-12 col-xs-6 col-480-12">
                                <div class="box_prod">
                                    <div class="img_prod">
                                        <a class="h_755"
                                           href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                           title="<?= $p->name ?>">
                                            <img class="w_100" src="<?= base_url($p->image) ?>"
                                                 alt="<?= $p->name ?>"/>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="sub_prod">
                                        <div class="name_prod">
                                            <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                               title="<?= $p->name ?>">
                                                <?= $p->name ?>
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="price_prod">
                                            <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'VNĐ' : lang('contact') ?>
                                        </div>
                                        <div class="buy_now_prod">
                                            <a style="cursor: pointer;" class="add-cart"
                                               onclick="add_cart(<?= @$p->id; ?>)">
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php if ($count == 2) break;
                        }
                    } ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-375 col-md-377 col-sm-4 hidden-xs">
            <div class="row">
                <div class="banner_content">
                    <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                        <img class="w_100" src="<?= base_url($cat->image) ?>" alt="<?= $cat->name ?>"/>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-417 col-md-416 col-sm-444 col-xs-12">
            <div class="border_list_prod">
                <ul>
                    <?php  ;
                    $count = 0;
                    foreach ($pro_home as $p) {
                        if ($p->category_id == $cat->id) {
                            $count++;
                            if ($count >= 3) { ?>
                            <li class="col-md-6 col-sm-6 col-xs-6 col-480-12">
                                <div class="box_prod">
                                    <div class="img_prod">
                                        <a class="h_755"
                                           href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                           title="<?= $p->name ?>">
                                            <img class="w_100" src="<?= base_url($p->image) ?>"
                                                 alt="<?= $p->name ?>"/>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="sub_prod">
                                        <div class="name_prod">
                                            <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                               title="<?= $p->name ?>">
                                                <?= $p->name ?>
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="price_prod">
                                            <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'VNĐ' : lang('contact') ?>
                                        </div>
                                        <div class="buy_now_prod">
                                            <a style="cursor: pointer;" class="add-cart"
                                               onclick="add_cart(<?= @$p->id; ?>)">
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php if ($count == 6) break;
                        } }
                    } ?>
                </ul>
            </div>
        </div>
        <div class="visible-xs col-xs-12">
            <div class="row">
                <div class="banner_content">
                    <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                        <img class="w_100" src="<?= base_url($cat->image) ?>" alt="<?= $cat->name ?>"/>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <?php }    } ?>
    <?php if ($pro_cat_focus3 != null) {    $count_cat = 0;    foreach ($pro_cat_focus3 as $cat) {    $count_cat++; ?>
        <div class="clearfix clearfix-10"></div>
        <div class="tt_content_home">
            <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>"title="<?= $cat->name ?>"><?= $cat->name ?></a>
        </div>
        <div class="clearfix"></div>
        <div class="list_all_prod_content clearfix">
            <div class="col-lg-417 col-md-416 col-sm-444 col-xs-12">
                <div class="border_list_prod">
                    <ul>
                        <?php  ;
                        $count = 0;
                        foreach ($pro_home as $p) {
                            if ($p->category_id == $cat->id) {
                                $count++; ?>
                                <li class="col-md-6 col-sm-6 col-xs-6 col-480-12">
                                    <div class="box_prod">
                                        <div class="img_prod">
                                            <a class="h_755"
                                               href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                               title="<?= $p->name ?>">
                                                <img class="w_100" src="<?= base_url($p->image) ?>"
                                                     alt="<?= $p->name ?>"/>
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="sub_prod">
                                            <div class="name_prod">
                                                <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                                   title="<?= $p->name ?>">
                                                    <?= $p->name ?>
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="price_prod">
                                                <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'VNĐ' : lang('contact') ?>
                                            </div>
                                            <div class="buy_now_prod">
                                                <a style="cursor: pointer;" class="add-cart"
                                                   onclick="add_cart(<?= @$p->id; ?>)">
                                                    Mua ngay
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php if ($count == 4) break;
                            }
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-375 col-md-377 col-sm-4 hidden-xs">
                <div class="row">
                    <div class="banner_content">
                        <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                            <img class="w_100" src="<?= base_url($cat->image) ?>" alt="<?= $cat->name ?>"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-208 col-md-207 col-sm-222 col-xs-12">
                <div class="border_list_prod">
                    <ul>
                        <?php  ;
                        $count = 0;
                        foreach ($pro_home as $p) {
                            if ($p->category_id == $cat->id) {
                                $count++;
                                if ($count >= 5) { ?>
                                    <li class="col-md-12 col-sm-12 col-xs-6 col-480-12">
                                        <div class="box_prod">
                                            <div class="img_prod">
                                                <a class="h_755"
                                                   href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                                   title="<?= $p->name ?>">
                                                    <img class="w_100" src="<?= base_url($p->image) ?>"
                                                         alt="<?= $p->name ?>"/>
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="sub_prod">
                                                <div class="name_prod">
                                                    <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                                       title="<?= $p->name ?>">
                                                        <?= $p->name ?>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="price_prod">
                                                    <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'VNĐ' : lang('contact') ?>
                                                </div>
                                                <div class="buy_now_prod">
                                                    <a style="cursor: pointer;" class="add-cart"
                                                       onclick="add_cart(<?= @$p->id; ?>)">
                                                        Mua ngay
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php if ($count == 6) break;
                                } }
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="visible-xs col-xs-12">
                <div class="row">
                    <div class="banner_content">
                        <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                            <img class="w_100" src="<?= base_url($cat->image) ?>" alt="<?= $cat->name ?>"/>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    <?php }    } ?>
    <?php if ($pro_cat_focus4 != null) {    $count_cat = 0;    foreach ($pro_cat_focus4 as $cat) {    $count_cat++; ?>
        <div class="clearfix clearfix-10"></div>
        <div class="tt_content_home">
            <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>"title="<?= $cat->name ?>"><?= $cat->name ?></a>
        </div>
        <div class="clearfix"></div>
        <div class="list_all_prod_content clearfix">
            <div class="col-lg-625 col-md-623 col-sm-8 col-xs-12">
                <div class="border_list_prod">
                    <ul>
                        <?php  ;
                        $count = 0;
                        foreach ($pro_home as $p) {
                            if ($p->category_id == $cat->id) {
                                $count++; ?>
                                <li class="col-md-4 col-sm-4 col-xs-6 col-480-12">
                                    <div class="box_prod">
                                        <div class="img_prod">
                                            <a class="h_755"
                                               href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                               title="<?= $p->name ?>">
                                                <img class="w_100" src="<?= base_url($p->image) ?>"
                                                     alt="<?= $p->name ?>"/>
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="sub_prod">
                                            <div class="name_prod">
                                                <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                                   title="<?= $p->name ?>">
                                                    <?= $p->name ?>
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="price_prod">
                                                <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'VNĐ' : lang('contact') ?>
                                            </div>
                                            <div class="buy_now_prod">
                                                <a style="cursor: pointer;" class="add-cart"
                                                   onclick="add_cart(<?= @$p->id; ?>)">
                                                    Mua ngay
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php if ($count == 6) break;
                            }
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-375 col-md-377 col-sm-4 hidden-xs">
                <div class="row">
                    <div class="banner_content">
                        <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                            <img class="w_100" src="<?= base_url($cat->image) ?>" alt="<?= $cat->name ?>"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-417 col-md-416 col-sm-444 col-xs-12">
                <div class="border_list_prod">
                    <ul>
                        <?php  ;
                        $count = 0;
                        foreach ($pro_home as $p) {
                            if ($p->category_id == $cat->id) {
                                $count++;
                                if ($count >= 7) { ?>
                                    <li class="col-md-6 col-sm-6 col-xs-6 col-480-12">
                                        <div class="box_prod">
                                            <div class="img_prod">
                                                <a class="h_755"
                                                   href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                                   title="<?= $p->name ?>">
                                                    <img class="w_100" src="<?= base_url($p->image) ?>"
                                                         alt="<?= $p->name ?>"/>
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="sub_prod">
                                                <div class="name_prod">
                                                    <a href="<?= site_url($p->cat_alias . '/' . $p->alias . '-c' . $p->cat_id . 'p' . $p->id) ?>"
                                                       title="<?= $p->name ?>">
                                                        <?= $p->name ?>
                                                    </a>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="price_prod">
                                                    <?= $p->price_sale > 0 ? ' ' . number_format($p->price_sale) . 'VNĐ' : lang('contact') ?>
                                                </div>
                                                <div class="buy_now_prod">
                                                    <a style="cursor: pointer;" class="add-cart"
                                                       onclick="add_cart(<?= @$p->id; ?>)">
                                                        Mua ngay
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php if ($count == 6) break;
                                } }
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="visible-xs col-xs-12">
                <div class="row">
                    <div class="banner_content">
                        <a href="<?= site_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                            <img class="w_100" src="<?= base_url($cat->image) ?>" alt="<?= $cat->name ?>"/>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    <?php }    } ?>

    <div class="clearfix"></div>
    <div class="visible-xs col-xs-12">
        <?= $bottom_mb ?>
    </div>

</article>
<div class="clearfix clearfix-10"></div>
