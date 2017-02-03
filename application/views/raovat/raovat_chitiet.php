

<div class="ct_right col-fx-md-775 col-sm-9 col-xs-12">
    <div class="content_news">
        <div class="bd_1px_d4d4d4 pd715515 f12u_212121 mg_5_0 clearfix back_cum" style="padding-left: 7px;">
            <a href="<?= base_url();?>">Trang chủ</a>
            <i class="fa fa-angle-right"></i>&nbsp;<a href="#!"><?= @$news->title; ?></a>
        </div>

        <div class="clearfix"></div>
        <div class="list_news">
            <div class="f16b_333 mg_bot5"><?= $item->tieude; ?></div>
            <div class="clearfix"></div>
                <?php if(isset($item->fullname)){?>
                    <p><b>Người đăng: </b><?=@$item->fullname;?></p>
                <?php }
                if(isset($item->name)){
                    ?>
                    <p><b>Khu vực: </b><?=@$item->name;?></p>
                <?php }
                if(isset($item->gia_m)){
                    ?>
                    <p><b>Giá: </b><?=number_format(@$item->gia_m);?></p>
                <?php }
                ?>
        </div>
        <div class="clearfix"></div>
        <div class="t_news pd_10_0">
            <?= $item->noidung; ?>
        </div>
        <div class="clearfix"></div>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-comments" data-href="<?=current_url()?>" data-width="100%" data-numposts="100" data-colorscheme="light"></div>



    </div>
</div>
<!-- /ct_right -->

</div>
</div>
<!-- /content_tc -->

</div>
<!-- line_cate_home -->

</div>
</div>

</section>
<!--/main_content -->

</article>