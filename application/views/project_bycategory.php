<div id="ctl00_divAlt1" class="altcontent1 cmszone">
    <div class='banner mrb20 Module Module-159'>
        <div class='ModuleContent'>
            <?php if ($slider_top != null) { ?>
                <div class="text-center">
                    <?= $slider_top?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class='container text-right Module Module-141'>
        <ol class='breadcrumb'>
            <li >
                <a href="<?= base_url()?>" class='itemcrumb' itemprop='url'>
                    <span itemprop='title'><?= lang('home')?></span>
                </a>
            </li>
            <li >
                <?php creat_break_crum('project',$cate,@$cate_curent->id); ?>
            </li>
        </ol>
    </div></div>
<main class="container">
    <section class="row">
        <div id="ctl00_divCenter" class="col-main col-md-9 col-md-push-3 mrb20">
            <div class='Module Module-77'>
                <div class='ModuleContent'>
                    <div class="news-wrap">
                        <h1 class="title-page"><?= $cate_curent->name?></h1>
                        <?php $c=0; foreach ($list as $key=>$pj) { $c++; ?>
                            <section class="clearfix news-item mrb20">
                                <div class="row">
                                    <a class="col-md-3 col-sm-4 mrb15"
                                       href="<?= site_url($cate_curent->alias.'/'.$pj->project_alias.'-c'.$cate_curent->id.'pj'.$pj->id)?>"
                                       target="_self"
                                       title="<?= $pj->project_name?>">
                                        <img class="center-block hvr-glow" src="<?= base_url($pj->project_image)?>"
                                             alt="<?= $pj->project_name?>">
                                    </a>
                                    <div class="col-md-9 col-sm-8 news-desc mrb15">
                                        <h2>
                                            <a href="<?= site_url($cate_curent->alias.'/'.$pj->project_alias.'-c'.$cate_curent->id.'pj'.$pj->id)?>"
                                               target="_self"
                                               title="<?= $pj->project_name?>">Câu
                                                <?= $pj->project_name?></a>
                                        </h2>
                                        <time> <?= date('d-m-Y',$pj->time)?></time>
                                        <div class="text-justify">  <?= LimitString($pj->project_description,200) ?>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php } ?>
                    </div>
                    <div class="cleanfix">  </div>
                    <?php   echo $this->pagination->create_links(); // tạo link phân trang ?>
                </div>
            </div>
        </div>
        <div id="ctl00_divLeft" class="col-left col-md-3 col-md-pull-9 mrb20 cmszone">
            <?= $right_project?>
        </div>
    </section>
</main>