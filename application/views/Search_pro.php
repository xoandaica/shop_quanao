<article class="container content">
    <section class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="menu-detail">
                <section class="cate-danh-muc">
                    <a href="#">
                        Kết quả tìm kiếm
                    </a>
                </section>

            </div>
        </div>
        <!--menu-detail-->
        <Div class="clearfix"></Div>
        <div>
            <div class="clearfix" style="clear: both"></div>
            <div class="col-md-12" style="margin-top: 30px">
                <div class="row">
                    <?php if($list) : ?>
                    <?php if (isset($list)) {
                        foreach ($list as $pro) {
                            ?>
                            <div class="col-md-4 col-sm-6 ">
                                <div class="item-pro">
                                    <div class="box">
                                        <a href="<?= base_url('san-pham/' . @$pro->pro_alias); ?>">
                                            <img style="width: 100%" src="<?= base_url($pro->pro_img);?>" alt="<?=@$pro->pro_name;?>"/>
                                        </a>
                                        <!--<span class="caption simple-caption">
                        <p>
                            <?/*= $pro->description; */?>
                        </p>
                    </span>-->
                                        <?php if($pro->caption_1!=''){?>
                                            <div class="caption simple-caption">
                                                <div class="blur"></div>
                                                <div class="caption-text">
                                                    <ul>
                                                        <?php
                                                        $arr=explode(';',$pro->caption_1);
                                                        foreach($arr as $it){
                                                            echo "<li>$it</li>";
                                                        }
                                                        ?>
                                                    </ul>
                                                    <div style="clear: both"></div>
                                                </div>
                                                <div style="clear: both"></div>
                                            </div>
                                        <?php }?>
                                        <?php if($pro->pro_price > 0 && $pro->pro_price_sale > 0) :?>
                                            <span class="pro-discount">
                                                <p>-<?=floor(100-($pro->pro_price_sale/$pro->pro_price)*100)?>%</p>
                                            </span>
                                        <?php endif;?>
                                    </div>
                                    <div class="bought">
                                        <span class="b_color">
                                            Đã mua :
                                            <?php if($pro->bought > 0) :?>
                                                <?=@$pro->bought;?>
                                            <?php else :?>
                                                <?=@$pro->bought + 1;?>
                                            <?php endif;?>
                                        </span>
                                    </div>
                                    <div class="thread-arrow-up">&nbsp;</div>
                                    <div class="pro-info">
                                            <h3 class="pro-info-title">
                                                <a href="<?= base_url('san-pham/' . @$pro->pro_alias); ?>" title="<?=@$pro->pro_name;?>">
                                                    <?=@$pro->pro_name;?>
                                                </a>
                                            </h3>

                                        <div class="pro-info-code">
                                            <span><?=@$pro->view + 9;?></span>
                                        </div>
                                        <div class="pro-info-f">
                                            <div class="lf">
                                                <div class="price_new">
                                                    <?php if($pro->pro_price_sale != 0){
                                                        echo''.number_format($pro->pro_price_sale).'';
                                                    }elseif($pro->pro_price_sale == 0){
                                                        echo''.number_format($pro->pro_price).'';
                                                    }
                                                    ?>đ
                                                </div>
                                                <div class="price_old">
                                                    <?php if($pro->pro_price >0 &&$pro->pro_price_sale>0){
                                                        echo 'Giá gốc :'.number_format($pro->pro_price_sale).'đ';
                                                    } elseif($pro->pro_price > 0 && $pro->pro_price_sale > 0){
                                                        echo '';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="lr">
                                                <div class="pro-view">
                                                    <a href="#">Chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!--<div class="pull-right">
                        <a href="<?/*= base_url('san-pham/' . @$pro->pro_alias); */?>" class="view_more">
                            <img  src="<?/*= base_url('assets/css/img/view_more.png')*/?>" alt=""/>
                        </a>
                    </div>-->
                                </div>
                            </div>
                        <?php }
                    } ?>
                    <div class="clearfix"></div>
                    <div class="pagination">
                        <?php
                        echo $this->pagination->create_links(); // tạo link phân trang
                        ?>
                    </div>


                </div>
                <div class="clearfix"></div>
                <?php else :?>

                    <p style="margin-left: 15px;">Không tìm thấy sản phẩm nào !!!</p>
                <?php endif;?>
            </div>



    </section>


</article>
