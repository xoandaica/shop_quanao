<article>
    <div class="container">
        <div class="row_pc">
            <div class="col-md-3 col-sm-3 col-left hidden-xs">
                <?= $right ?>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="box_title_x  w_100 back_link">
                    <a href="<?= base_url()?>" class="" title="">TRANG CHỦ </a>
                    <i class="fa fa-angle-right" style="color: #17100a"></i>
                    <?php creat_break_crum('news',$cate,@$cate_current->id); ?>
                    <i class="fa fa-angle-right" style="color: #17100a"></i>
                    <?= @$news->title?>
                </div>
                <div class="clearfix"></div>
                <div class="list_prod_home" style="padding-top: 5px;">
                    <div class="">

                        <div class=" list_prod_cate page-content">
                           <?= @$news->content?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="list_paging" style="text-align: center; margin-bottom: 25px"><img src="img/paging.png"
                                                                                                  alt=""/></div>


                </div>
            </div>
        </div>
    </div>
</article>

<div class="clearfix"></div>