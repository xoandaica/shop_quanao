<div class="row">
    <div class="title-cat title-left">
        Có thể bạn quan tâm
    </div>
    <ul class="menu_content_left">
        <?php foreach ($menus_btt as $menu) {
            if ($menu->parent_id == 0) {
                ?>
                <li>
                    <a target="<?= $menu->target ?>" <?php if ($menu->url != 'null') echo 'href="' . site_url($menu->url) . '"' ?>
                       class=" " title="<?= $menu->name; ?>">
                        <img style="width: 30px; height: 30px;" src="<?= base_url($menu->image) ?>" alt="<?= $menu->name; ?>"/>

                        <span style="padding-left: 15px; "> <?= $menu->name; ?></span>
                    </a>

                    <ul class="hidden menu_content_left_ul2">

                    </ul>
                </li>
            <?php }
        } ?>
    </ul>

</div>