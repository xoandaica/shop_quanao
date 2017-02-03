

<div class="line-1"></div>
<article class="article">
<div class="container">
<div class="row_p">
    <div class="pro_floo">
        <div class="tit break_crum">
            <a href="<?= base_url();?>">Trang chủ</a>
            <i class="fa fa-angle-right"></i>
            <span style="color: #696969">Sản phẩm yêu thích</span>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <?php $x=1;
                foreach ($view_like as $n) {
                    $z=$x++;
                    ?>
                    <div class="col-md-4-3 col-md-3 col-sm-4 lazy_load">
                        <div class="item_p-2">
                            <div class="<?=@$class;?> pull-right">
                                <a href="javascript:void(0)"
                                    <?=array_key_exists(@$n['pro_id'],@$this->session->userdata('liked'))?
                                        'onclick="unlikep($(this))"':'onclick="likep($(this))"';?>
                                   data-item="<?=@$n['pro_id'];?>">
                                    <i style="font-size: 24px"
                                        <?=array_key_exists(@$n['pro_id'],$this->session->userdata('liked'))?
                                            'class="fa fa-heart"':'class="fa fa-heart-o"';?>
                                        ></i>
                                </a>
                            </div>
                            <div class="img_size_pro_all img_products-2 ">
                                <a href="<?=  base_url(@$n['cate_alias'].'/'.$n['alias'].'-c'.@$n['cate_id'].'p'.$n['pro_id'])?>">
                                    <img class="img_100 lazy_load" border="0"
                                         src="" data-src="<?= $n['image']; ?>" title=""
                                         alt=""/>
                                </a>
                            </div>
                            <div class="clearfix-10"></div>
                            <div class="">
                                <div class="price red pull-left">
                                    <b>
                                        <?php if($n['price_sale'] != 0){
                                            echo''.number_format($n['price_sale']).'đ';
                                        }elseif($n['price_sale'] == 0){
                                            echo''.number_format($n['price']).'đ';
                                        }
                                        ?>
                                    </b>
                                </div>
                                <?php if($n['price'] > 0 && $n['price_sale'] > 0 && $n['price'] > $n['price_sale']){
                                    echo'<div class="sale-2 pull-right whrite">
                                    -'.floor(100-($n['price_sale']/$n['price'])*100).'%</div>';
                                }else{
                                    echo'';
                                }?>

                            </div>
                            <div class="clearfix"></div>
                            <div class="price_sale">
                                <del>
                                    <?php if($n['price'] > 0 && $n['price_sale'] > 0){
                                        echo''.number_format($n['price']).'đ';
                                    }elseif($n['price'] > 0 && $n['price_sale'] < 0){
                                        echo'';
                                    }
                                    ?>
                                </del>
                            </div>
                            <div class="clearfix-10"></div>
                            <div class="name_p-2 text-left">
                                <a href="<?=  base_url(@$n['cate_alias'].'/'.$n['alias'].'-c'.@$n['cate_id'].'p'.$n['pro_id'])?>" title=" <?= $n['name']; ?>">
                                    <?= $n['name']; ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php
                    if($z%5==0) echo '<div class="clearfix"></div>';
                    if($z==6) break;
            }?>
        </div>
    </div>
    <div class="clearfix-20"></div>




    <style type="text/css">
        .article{
            background: #fff !important;
            overflow: hidden;
        }
    </style>