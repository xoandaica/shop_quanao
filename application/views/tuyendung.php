<div id="ctl00_divAlt1" class="altcontent1 cmszone">
    <div class="banner mrb20 Module Module-154">
        <div class='ModuleContent'>
            <?php if ($slider_top != null) { ?>
                <div class="text-center">
                    <?= $slider_top ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="container text-right Module Module-141">
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>" class="itemcrumb">
                    <span itemprop="title"><?= lang('home') ?></span>
                </a>
            </li>
            <li>
                <?php if ($news_cat_hot != null) { ?>
                    <a href="" class="itemcrumb active">
                        <span><?= $news_cat_hot->name ?></span>
                    </a>
                <?php } ?>
            </li>
        </ol>
    </div>
</div>
<main class="container">
    <section class="row">
        <div id="ctl00_divCenter" class="col-main col-md-9 col-md-push-3 mrb20">
            <?php if ($news_cat_hot != null) { ?>
                <div class="clearfix mrb20 job-description Module Module-156">
                    <div class="ModuleContent">
                        <h1 class="title-job" style="text-align: justify;">
                            <?= $news_cat_hot->name ?>
                        </h1>
                        <div class="row">
                            <div class="col-sm-8 mrb20">
                                <?= $news_cat_hot->description ?>
                            </div>
                            <div class="col-sm-4 mrb20">
                                <img alt="" src="<?= base_url($news_cat_hot->image) ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix mrb20 Module Module-157">
                    <div class="ModuleContent">
                        <div class="job-wrap">
                            <h2 class="title-job"><?= lang('vitritd')?></h2>
                            <?php $c = 0;
                            foreach ($news_tuyendung as $key => $n) {
                                if ($n->category_id == $news_cat_hot->id) {
                                    $c++; ?>
                                    <div class="faq-item2">
                                        <div class="clearfix question2">
                                            <div class="col-xs-2 col-sm-1 number"><?= $c ?></div>
                                            <div class="col-xs-10 col-sm-11 q_title">
                                                <div class="row"> <?= $n->title ?>
                                                    <time><?= date('d-m-Y', $n->time) ?></time>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="display: none;" class="answer2">
                                            <div class="col-sm-offset-1 mrt20">
                                                <div class="career-text">
                                                    <div class="clearfix mrb15">
                                                        <?= $n->content ?>
                                                    </div>
                                                    <a class="button-page hidden-xs"
                                                       target="_blank" href="<?= base_url('lien-he') ?>">
                                                        <?= lang('recruitment')?> <i
                                                            class="fa fa-chevron-right">
                                                        </i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?= $right_tuyendung ?>
    </section>
</main>