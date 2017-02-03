<div class="sp-daxem col-md-12">
    <div class="title-daxem">
        <a href="" title="">Sản Phẩm Đã Xem</a>
    </div>
    <div class="san-pham">
        <?php
        foreach($review_pro as $pro){
            ?>
            <div class="itemsp col-md-3" style="padding:3px;">
                <a class="img_size_pro2" href="<?=  base_url(@$pro['cate'].'/'.$pro['url'].'-c'.@$pro['cate_id'].'p'.$pro['id'])?>">
                    <img class="img_100" src="<?= base_url($pro['image'])?>" alt="">
                </a>
            </div>
        <?php
        }?>
    </div>
</div>
</div>
</section><!--en home-main-->