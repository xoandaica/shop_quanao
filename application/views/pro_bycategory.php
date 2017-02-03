<article>
<div class="container">
<div class="row_pc">

<div class="tit_home">
    <a href="">
        <img style="width: 28px; height: 28px" src="<?= base_url(@$cate_curent->image)?>" alt=""/>
        <span class="txt_tit_home"><?= @$cate_curent->name?></span>
    </a>
</div>
<div class="clearfix"></div>
<div class="list_prod_home">
<div class="row">

    <?php $count = 0;
    foreach ($list as $p) { $count++; ?>

        <div class="col-md-3 col-sm-4 col-xs-6 col-480-12">
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

                                <div class="prince_wholesale_retail">Giá sỉ: <span
                                        style="font-size: 14px; color: #ff0000; font-weight: bold">
                                         <?= $p->desc > 0 ? ' ' . number_format($p->desc) . 'đ' : lang('contact') ?>
                                        </span>
                                </div>

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
    <?php  if ($count % 4 == 0 )echo '<div class="clearfix-md"></div>';
        if ($count % 3 == 0 )echo '<div class="clearfix-sm"></div>';
        if ($count % 2 == 0 )echo '<div class="clearfix-xs"></div>';
    } ?>
</div>
</div>
<div class="clearfix"></div>

<div class="list_paging" style="text-align: center; margin-bottom: 25px">
    <?php   echo $this->pagination->create_links(); // tạo link phân trang ?>
</div>


</div>
</div>
</article>

<div class="clearfix"></div>