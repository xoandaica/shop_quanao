
<ul class="nav nav-tabs">
    <li id="hien0">
        <a class="cusor" onclick="timtatca()" style="border: none !important;">
            Tất cả
        </a>
    </li>
    <?php foreach($danhmuc as $cat){ ?>
        <li id="hien_<?= $cat->id; ?>">
            <a class="cusor" onclick="Bo_loc(this)" data-id="<?= $cat->id; ?>" style="border: none !important;"
               data-color = "<?= $cat->color; ?>" data-image= "<?= $cat->image3; ?>">
                <?= $cat->name; ?><p><?= $cat->name_alias; ?></p>
            </a>
        </li>
    <?php } ?>

</ul>