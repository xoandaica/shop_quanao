margin-right: 16px;<div class="row">
    <div class="menu_left_tintuc">
        <div class="title_silebar"><?= lang('banquantam')?></div>
        <ul>
            <li>
                <a href="<?= base_url()?>">
                    <i class="fa fa-home"></i> <?= lang('home')?>
                </a>
            </li>
            <?php $c=0; foreach ($page_home as $key=>$p) { $c++; ?>
            <li>

                <a href="<?= site_url($p->alias.'-pg'.$p->id)?>" title="<?= $p->name; ?>" title="<?= $p->name; ?>">
                    <h2 style="font-size: 13px;margin: 0px;">  <?= $p->name; ?></h2>
                </a>
            </li>
            <?php } ?>

        </ul>
    </div>
</div>