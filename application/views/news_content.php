<article>
    <!--    <div class="container">
            <div class="row_pc">
                <div class="col-md-3 col-sm-3 col-left hidden-xs">
    <?= $right ?>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="box_title_x  w_100 back_link">
                        <a href="<?= base_url() ?>" class="" title="">TRANG CHỦ </a>
                        <i class="fa fa-angle-right" style="color: #17100a"></i>
    <?php creat_break_crum('news', $cate, @$cate_current->id); ?>
                        <i class="fa fa-angle-right" style="color: #17100a"></i>
    <?= @$news->title ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="list_prod_home" style="padding-top: 5px;">
                        <div class="">
    
                            <div class=" list_prod_cate page-content">
    <?= @$news->content ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="list_paging" style="text-align: center; margin-bottom: 25px"><img src="img/paging.png"
                                                                                                      alt=""/></div>
    
    
                    </div>
                </div>
            </div>
        </div>-->
    <div class="content-page">
        <div class="kk-new-page post-detail-page">
            <div class="container">
                <div class="row headding-page">
                    <div class="col-md-12">
                        <div class="new-headding"><a style="color:#000;" class="lookbook-head-title" href="#"><span>Tin tức</span></a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="row new-detail-content entry-content">
                            <h1 class="detail-title"> <?= @$news->title ?></h1>


                            <?= @$news->content ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="comments">
                            <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-href="http://kkfashion.vn/khoi-dong-tuan-dau-nam-that-phong-cach/" data-width="100%" data-numposts="5" data-colorscheme="light" fb-xfbml-state="rendered"><span style="height: 176px;"><iframe id="f2c35e9c6eeb6ac" name="f79bcf5954c7f4" scrolling="no" title="Facebook Social Plugin" class="fb_ltr fb_iframe_widget_lift" src="https://www.facebook.com/plugins/comments.php?api_key=317214681786679&amp;channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0eWevUAMuoH.js%3Fversion%3D42%23cb%3Df2fc86e1198d7b4%26domain%3Dkkfashion.vn%26origin%3Dhttp%253A%252F%252Fkkfashion.vn%252Ff50ddcdb0fab68%26relation%3Dparent.parent&amp;colorscheme=light&amp;href=http%3A%2F%2Fkkfashion.vn%2Fkhoi-dong-tuan-dau-nam-that-phong-cach%2F&amp;locale=en_GB&amp;numposts=5&amp;sdk=joey&amp;skin=light&amp;version=v2.7&amp;width=100%25" style="border: none; overflow: hidden; height: 176px; width: 100%;"></iframe></span></div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="other-new">
                            <p class="bold font-20">Các tin tức khác</p>
                            <p>
                            </p><ul>
                                <?php
                                foreach ($list as $n) {
                                    if ($n->title != $news->title) {
                                        ?>
                                        <li><i class="fa fa-caret-right"></i> <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>"><?= $n->title ?></a></li>
                                    <?php }
                                } ?>
                            </ul>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<div class="clearfix"></div>