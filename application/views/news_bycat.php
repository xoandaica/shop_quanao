


<article>
    <div class="content-page">
        <div class="kk-new-page">
            <div class="container">
                <div class="row hidden-lg hidden-md hidden-sm">
                    <div class="row headding-page">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="new-headding video-headding"><span>Tin tức</span></div>
                        </div>
                    </div>
                    <div class="col-xs-12 content-menu">
                        <?php foreach ($list as $n) { ?>
                            <div class="kk-new-item">
                                <div class="kk-new-img">
                                    <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">
                                        <img width="360" height="188" src="<?= base_url($n->image) ?>" class="attachment-360x320 size-360x320 wp-post-image"  sizes="(max-width: 360px) 100vw, 360px">                                    </a>                            </div>
                                <p class="kk-title-new">
                                    <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>"><?= $n->title ?></a>
                                </p>
                                <p class="kk-new-description">
                                    <?= $n->description ?>
                                </p>
                                <p class="kk-read-more"><a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">Chi tiết &gt;&gt;</a></p>
                                <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="row hidden-xs">
                    <div class="col-sm-12 col-md-12">
                        <?php
                        if (sizeof($list) == 1) {
                            $n = array_pop($list);
                            ?>
                            <div class="kk-new-item-2">
                                <div class="col-sm-12 col-md-12">
                                    <div class="kk-new-item-2">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="kk-new-img">
                                                <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">
                                                    <img width="560" height="292" src="<?= base_url($n->image) ?>" class="attachment-560x292 size-560x292 wp-post-image"  sizes="(max-width: 560px) 100vw, 560px">                                            </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 right-item">
                                            <p class="kk-title-new-4">
                                                <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>"><?= $n->title ?></a>
                                            </p>
                                            <div class="kk-title-new-3-desc"><p><?= $n->description ?></p>
                                            </div>
                                            <div class="btn-item-readmore">
                                                <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">Chi tiết</a>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="line"></div>
                                </div>
                            </div>
                            <?php
                        } else if (sizeof($list) == 2) {
                            $firstElement = array_pop($list);
                            $secondElement = array_pop($list);
                            if ($firstElement != null && $secondElement != null) {
                                ?>

                                <div class="line"></div>
                                <div class="kk-new-item-2">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="kk-new-img kk-sm-img">
                                            <a href="<?= site_url($firstElement->cat_alias . '/' . $firstElement->alias . '-c' . $firstElement->cat_id . 'n' . $firstElement->id) ?>"><img width="560" height="292" src="<?= base_url($firstElement->image) ?>" class="attachment-560x292 size-560x292 wp-post-image" alt="<?= $firstElement->title ?>"  sizes="(max-width: 560px) 100vw, 560px"></a>
                                            <div class="caption">
                                                <p><a href="<?= site_url($firstElement->cat_alias . '/' . $firstElement->alias . '-c' . $firstElement->cat_id . 'n' . $firstElement->id) ?>" class="btn-lg" data-toggle="modal" data-target="#lb-popup"><?= $firstElement->title ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="kk-new-img kk-sm-img">
                                            <a href="<?= site_url($secondElement->cat_alias . '/' . $secondElement->alias . '-c' . $secondElement->cat_id . 'n' . $secondElement->id) ?>"><img width="560" height="292" src="<?= base_url($secondElement->image) ?>" class="attachment-560x292 size-560x292 wp-post-image" alt="<?= $secondElement->title ?>"  sizes="(max-width: 560px) 100vw, 560px"></a>
                                            <div class="caption">
                                                <p><a href="<?= site_url($secondElement->cat_alias . '/' . $secondElement->alias . '-c' . $secondElement->cat_id . 'n' . $secondElement->id) ?>" class="btn-lg" data-toggle="modal" data-target="#lb-popup"><?= $secondElement->title ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="line"></div>
                                <?php
                            }
                        } else {
                            $firstElement = array_pop($list);
                            $secondElement = array_pop($list);
                            if ($firstElement != null && $secondElement != null) {
                                ?>

                                <div class="line"></div>
                                <div class="kk-new-item-2">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="kk-new-img kk-sm-img">
                                            <a href="<?= site_url($firstElement->cat_alias . '/' . $firstElement->alias . '-c' . $firstElement->cat_id . 'n' . $firstElement->id) ?>"><img width="560" height="292" src="<?= base_url($firstElement->image) ?>" class="attachment-560x292 size-560x292 wp-post-image" alt="<?= $firstElement->title ?>"  sizes="(max-width: 560px) 100vw, 560px"></a>
                                            <div class="caption">
                                                <p><a href="<?= site_url($firstElement->cat_alias . '/' . $firstElement->alias . '-c' . $firstElement->cat_id . 'n' . $firstElement->id) ?>" class="btn-lg" data-toggle="modal" data-target="#lb-popup"><?= $firstElement->title ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="kk-new-img kk-sm-img">
                                            <a href="<?= site_url($secondElement->cat_alias . '/' . $secondElement->alias . '-c' . $secondElement->cat_id . 'n' . $secondElement->id) ?>"><img width="560" height="292" src="<?= base_url($secondElement->image) ?>" class="attachment-560x292 size-560x292 wp-post-image" alt="<?= $secondElement->title ?>"  sizes="(max-width: 560px) 100vw, 560px"></a>
                                            <div class="caption">
                                                <p><a href="<?= site_url($secondElement->cat_alias . '/' . $secondElement->alias . '-c' . $secondElement->cat_id . 'n' . $secondElement->id) ?>" class="btn-lg" data-toggle="modal" data-target="#lb-popup"><?= $secondElement->title ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="line"></div>
                                <?php
                            }
                            $count = 0;
                            foreach ($list as $n) {
                                ++$count;
                                if ($count % 2 == 0) {
                                    ?>
                                    <div class="kk-new-item-2">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="kk-new-item-2">
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="kk-new-img">
                                                        <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">
                                                            <img width="560" height="292" src="<?= base_url($n->image) ?>" class="attachment-560x292 size-560x292 wp-post-image"  sizes="(max-width: 560px) 100vw, 560px">                                            </a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 right-item">
                                                    <p class="kk-title-new-4">
                                                        <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>"><?= $n->title ?></a>
                                                    </p>
                                                    <div class="kk-title-new-3-desc"><p><?= $n->description ?></p>
                                                    </div>
                                                    <div class="btn-item-readmore">
                                                        <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">Chi tiết</a>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="line"></div>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="kk-new-item-2">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="kk-new-item-2">
                                                <div class="col-sm-6 col-md-6 right-item">
                                                    <p class="kk-title-new-4">
                                                        <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>"><?= $n->title ?></a>
                                                    </p>
                                                    <div class="kk-title-new-3-desc"><p><?= $n->description ?></p>
                                                    </div>
                                                    <div class="btn-item-readmore">
                                                        <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">Chi tiết</a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="kk-new-img">
                                                        <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">
                                                            <img width="560" height="292" src="<?= base_url($n->image) ?>" class="attachment-560x292 size-560x292 wp-post-image"  sizes="(max-width: 560px) 100vw, 560px">                                            </a>
                                                    </div>
                                                </div>

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="line"></div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <!-- mobile -->
                <div class="row hidden-lg hidden-md hidden-sm">
                    <div class="col-xs-12 news-page-column">
                        <?php foreach ($list as $n) { ?>
                            <div class="kk-new-item">
                                <div class="kk-new-img">
                                    <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">
                                        <img width="360" height="188" src="<?= base_url($n->image) ?>" class="attachment-360x320 size-360x320 wp-post-image"  sizes="(max-width: 360px) 100vw, 360px">                                    </a>                            </div>
                                <p class="kk-title-new">
                                    <a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>"><?= $n->title ?></a>
                                </p>
                                <p class="kk-new-description">
                                    <?= $n->description ?>
                                </p>
                                <p class="kk-read-more"><a href="<?= site_url($n->cat_alias . '/' . $n->alias . '-c' . $n->cat_id . 'n' . $n->id) ?>">Chi tiết &gt;&gt;</a></p>
                                <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- /mobile -->

                <div class="row">
                    <div align="center" class="col-sm-12 paging new-page-paging">
                        <?php echo $this->pagination->create_links(); // tạo link phân trang        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<div class="clearfix"></div>