

<div class="line-1"></div>
<article class="article">
<div class="container">
<div class="row_p">
    <div class="pro_floo">
        <div class="tit break_crum">
            <a href="<?= base_url();?>">Trang chủ</a>
            Sản phẩm đã xem
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <?php
            foreach($review_pro as $pro){
                ?>
                <div class="col-md-4-3 col-sm-3 lazy_load">
                    <div class="item_p-2">
                        <div class="img_size_pro_all_3 img_products-2 ">
                            <a href="<?=  base_url(@$pro['cate'].'/'.$pro['url'].'-c'.@$pro['cate_id'].'p'.$pro['id'])?>">
                                <img class="img_100 lazy_load" border="0"
                                     src="" data-src=" <?= base_url($pro['image'])?>"
                                     alt=""/>
                            </a>
                        </div>
                        <div class="clearfix-10"></div>
                        <div class="">
                            <div class="price red pull-left">
                                <b>399.000đ</b>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="name_p-2 text-left">
                            <a href="<?=  base_url(@$pro['cate'].'/'.$pro['url'].'-c'.@$pro['cate_id'].'p'.$pro['id'])?>" title="<?= ($pro['name'])?>">
                                <?= LimitString($pro['name'],35,'...')?>
                            </a>
                        </div>
                    </div>
                </div>

            <?php
            }?>


        </div>
    </div>
    <div class="clearfix-20"></div>

    <div class="pagination">
        <?php
        echo $this->pagination->create_links(); // tạo link phân trang
        ?>
    </div>


    <style type="text/css">
        .article{
            background: #fff !important;
            overflow: hidden;
        }
    </style>