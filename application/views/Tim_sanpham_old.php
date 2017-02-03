
<?= @$script_jquery; ?>
<ul class="blog-masonry"> <!--post-masonry-->
    <?php if(isset($list)){
       foreach($list as $n){  ?>
            <li class="post-masonry col-md-4 col-sm-4 col-xs-12"  >
                <div class="fist_hidde">
                    <img class="" style="width: 100% !important;min-height: 150px !important; "  src="<?= base_url($n->pro_img); ?>" alt="<?= $n->pro_name; ?>"/>
                    <div class="back_over">
                        <div class="over_block">
                            <a href="<?= base_url($n->cat_alias.'/'.$n->pro_alias.'-c'.$n->cat_id.'p'.$n->pro_id)?>" class="products_name" title="<?= $n->pro_name; ?>">
                                <?= $n->pro_name; ?>
                                 <div class="cleanfix"></div>
                                 Giá : <?= $n->pro_price; ?> 
                                <div class="clearfix"></div>
                                <img style="max-width: 150px;" src="<?= base_url($this->option->site_logo2) ?>" alt="<?= $n->pro_name; ?>">
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        <?php    } } ?></ul>
    <div class="clearfix"></div>
<div> <?=$phantrang;?></div>