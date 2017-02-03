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
                    <?php creat_break_crum('news',$cate,@$cate_curent->id); ?>
                </div>
            <div class="clearfix"></div>
            <div class="list_prod_home">
                <div class="">
                    <div class=" list_prod_cate">
                        <?php $count = 0;
                        foreach ($list as $n) {
                            ?>
                            <li>
                                <div class="box_prod_cate">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-5 col-480-12">
                                            <div class="img_prod_cates">

                                                <a class="h_755"
                                                   href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>"
                                                   title="<?= $n->title ?>">
                                                    <img class="w_100" src="<?= base_url($n->image) ?>"
                                                         alt="<?= $n->title ?>"/>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-7 col-480-12">
                                            <div class="sub_prod_cate page-content">
                                                <a class="name-news"
                                                   href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>"
                                                   title="<?= $n->title ?>">
                                                    <?= $n->title ?>
                                                </a>

                                                <p class="name-desc">
                                                    <?= LimitString($n->description, 500) ?>
                                                </p>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>
                    <div class="cleanfix">  </div>
                    <?php   echo $this->pagination->create_links(); // tạo link phân trang ?>
                </div>
                <div class="clearfix"></div>


            </div>
            </div>
        </div>
    </div>
</article>

<div class="clearfix"></div>