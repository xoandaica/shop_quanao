<article>
    <div id="top"></div>
    <div class="container">
        <div class="row">
            <div class="banner_top_tintuc">
                <div class="text_top_tintuc">
                    <h1 style="">Bài viết</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content_tintuc ds_product">
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <?= $right?>
                </div>
                <div class="clearfix-20 visible-xs  visible-sm "></div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="row_tin">
                        <?php $c=0; foreach ($list as $key=>$p) { $c++; ?>
                            <div class="item_ds_tin">
                                <a class="col-md-4 col-sm-4 col-xs-12 row_15" href="<?= site_url($p->alias.'-pg'.$p->id)?>" title="<?= $p->name; ?>" title="<?= $p->name; ?>">
                                    <img class="w_100" src="<?= base_url($p->icon); ?>" alt="<?= $p->name; ?>">
                                </a>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <a href="<?= site_url($p->alias.'-pg'.$p->id)?>" title="<?= $p->name; ?>" title="<?= $p->name; ?>"><?= $p->name; ?></a>
                                    <p>
                                        <span class="date_up"><i class="fa fa-calendar"></i> Ngày đăng: <?= date('d-m-Y',$p->time)?></span>
                                    </p>
                                    <div class="dcs_ds_tin">
                                        <?= LimitString($p->description,200) ?>
                                    </div>
                                    <div class="xemthem">
                                        <a class="sty_xemthem" href="<?= site_url($p->alias.'-pg'.$p->id)?>">
                                        <?= lang('dentail')?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        <?php } ?>
                        <div class="clearfix"></div>
                        <div class="phantrang ">
                            <?php   echo $this->pagination->create_links(); // tạo link phân trang ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</article>