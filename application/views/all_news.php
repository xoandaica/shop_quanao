<div class="clearfix"></div>
<article>
    <div class="container">
        <div class="row_md row_sm">
            <div class="container_web">
                <?= $slider_top?>
            </div>
            <div class="clearfix"></div>
            <div class="content_home clearfix">
                <div class="col-md-3 col-md-275 col-sm-4 hidden-xs">
                    <?= $right?>
                </div>
                <div class="col-md-9 col-md-725 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="qts_right">
                            <div class="box_right">
                                <div class="box_cate_right box_black_link">
                                    <a href="<?= base_url()?>" class="back_link" title="">TRANG CHỦ </a>
                                    <i class="fa fa-angle-right" style="color: #fff"></i>
                                    <a >Danh sách tin tức</a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="all_news_cate">
                                    <ul>
                                        <?php $c=0; foreach ($list as $key=>$news) { $c++; ?>
                                            <li>
                                                <div class="news_right">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                                            <a href="<?= site_url($news->cat_alias.'/'.$news->alias.'-c'.$news->cat_id.'n'.$news->id)?>" title="<?= $news->title?>">
                                                                <img class="w_100" src="<?= base_url($news->image)?>" alt="<?= $news->title?>"/>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <div class="sub_news_home">
                                                                <div class="tit_news_home">
                                                                    <a href="<?= site_url($news->cat_alias.'/'.$news->alias.'-c'.$news->cat_id.'n'.$news->id)?>" title="<?= $news->title?>">
                                                                        <?= $news->title?>
                                                                    </a>
                                                                </div>
                                                                <div class="clearfix"></div>
                                                                <div class="date_news_home">
                                                                    <img style="padding-right: 5px" src="<?= base_url('assets/css/img/icon_date_home.png')?>" alt="">
                                                                    <?= date('d-m-Y',$news->time)?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <div class="cleanfix">  </div>
                                    <?php   echo $this->pagination->create_links(); // tạo link phân trang ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 visible-xs">
                    <?= $right?>
                </div>
            </div>
        </div>
    </div>
</article>