
<?= @$script_jquery; ?>
<ul class="blog-masonry"> <!--post-masonry-->
    <?php if(isset($list)){
        foreach($list as $n){  ?>
            <li class="post-masonry col-md-4 col-sm-4 col-xs-12"  >
                <div class="fist_hidde">
                    <img class="" style="width: 100% !important;min-height: 150px !important; "  src="<?= base_url($n->project_image3); ?>" alt="<?= $n->project_name; ?>"/>
                    <div class="back_over">
                        <div class="over_block">
                            <a href="<?= site_url($n->cat_alias.'/'.$n->project_alias.'-c'.$n->cat_id.'pj'.$n->project_id)?>" class="products_name"
                               title="<?= $n->project_name; ?>">
                                <?= $n->project_name; ?>
                                <div class="clearfix"></div>
                                <div class="img_zx" style="margin-top: 5px">
                                    <img class="display_none" style="max-width: 150px;" src="<?= base_url($this->option->site_logo2) ?>"
                                         alt="<?= $n->project_name; ?>">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        <?php    } } ?></ul>
<div class="clearfix"></div>
<div class="phantrang"> <?=$phantrang;?></div>