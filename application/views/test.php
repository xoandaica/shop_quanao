<div id="ctl00_divAlt1" class="altcontent1 cmszone">
    <div class="banner mrb20 Module Module-147">
        <div class="ModuleContent">
            <?php if ($slider_top != null) { ?>
                <div class="text-center">
                    <?= $slider_top ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container text-right Module Module-141">
        <ol class="breadcrumb">
            <li>
                <a><?= lang('home') ?></span></a>
            </li>
            <li>
                <?php creat_break_crum('news', $cate, $cate_current->id); ?>
            </li>
            <li>
                <a class="active" href=""><?= $news->title; ?></a>
            </li>
        </ol>
    </div>
</div>
<main class="container">
    <section class="row">
        <div id="ctl00_divCenter" class="col-main col-md-9 col-md-push-3 mrb20">
            <div class="Module Module-88">
                <div class="ModuleContent">
                    <div id="ctl00_mainContent_ctl00_ctl00_pnlInnerWrap">
                        <section class="news-live">
                            <div class="text-justify mrb20">
                                <h1 class="title-page"><?= $news->title; ?></h1>

                                <div></div>
                                <p><img alt="" src="<?= base_url($news->image) ?>"
                                        style="box-sizing: border-box; border: 0px solid; color: #333333; font-family: Roboto,sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18.1818px; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; width: 359px; height: 253px; float: right; margin-left: 10px;">
                                </p>
                                <div style="text-align: justify;"><span style="line-height: 1.42857;">
                                        <?= $news->content; ?>
                                </span></div>
                                <p>&nbsp;</p>

                                <div style="text-align: justify;"><br>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <a class="back-button"
                               href="<?= base_url($cate_current->alias . '-nc' . $cate_current->id) ?>">
                                <i class="fa fa-arrow-circle-left">
                                </i><?= lang('backlist')?></a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix-xs clearfix-sm"></div>
        <div id="ctl00_divLeft" class="col-left col-md-3 col-md-pull-9 mrb20 cmszone">
            <?= $right_news ?>
        </div>
    </section>

</main>
