
<?= @$script_jquery; ?>
<ul class="blog-masonry"> <!--post-masonry-->
    <?php if(isset($list_products)){
        foreach($list_products as $n){  ?>
            <li class="post-masonry col-md-4 col-sm-4 col-xs-12"  >

                    <div class="fist_hidde">
                        <a href="<?= site_url($n->cat_alias.'/'.$n->pro_alias.'-c'.$n->cat_id.'p'.$n->pro_id)?>"  title="<?= $n->pro_name; ?>">
                            <img class="" style="width: 100% !important;min-height: 150px !important; "  src="<?= base_url($n->pro_img3); ?>" alt="<?= $n->pro_name; ?>"/>
                            <div class="back_over">
                                <div class="over_block">
                                    <a href="<?= site_url($n->cat_alias.'/'.$n->pro_alias.'-c'.$n->cat_id.'p'.$n->pro_id)?>" class="products_name" title="<?= $n->pro_name; ?>">
                                        <?= $n->pro_name; ?>
                                        <div class="cleanfix"></div>
                                        Giá : <?= $n->pro_price !=  0?number_format($n->pro_price).' VNĐ':'Liên hệ'; ?>
                                        <div class="clearfix"></div>
                                        <div class="img_zx" style="margin-top: 5px">
                                            <img class="display_none" style="max-width: 150px;" src="<?= base_url($this->option->site_logo2) ?>"
                                                 alt="<?= $n->pro_name; ?>">
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </a>
                </div>

            </li>
        <?php    } } ?></ul>
<div class="clearfix"></div>
<div style="text-align: center; margin-top: 20px;" > <?=$phantrang;?></div>