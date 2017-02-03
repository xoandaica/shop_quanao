
<div class="catemenuBaza ">
    <div class="width_219">
        <a href=""><?= $cate_curent->name; ?></a>
        <ul>
            <?php  foreach($cate_sub as $sub){
                if($sub->is_cat==1){?>
                    <li>
                        <a href="<?=base_url(@$sub->alias.'-pc'.@$sub->id);?>" title="<?= $sub->name; ?>">
                            <?= $sub->name; ?>
                        </a>
                        <ul>
                            <?php foreach($cate_sub_pro as $sub_2){
                                if($sub_2->parent_id==$sub->id){  ?>
                                    <li>
                                        <a href="<?=base_url(@$sub_2->alias.'-pc'.@$sub_2->id);?>" title="<?= $sub_2->name; ?>">
                                            <?= $sub_2->name; ?>
                                        </a>
                                    </li>
                                <?php }}?>
                        </ul>
                    </li>
                <?php }}?>
        </ul>
    </div>
    <div class="clearfix-10"></div>
    <div class="panel-group ">
     <!--   <div class="box_14px655D5D">
            Thương hiệu
        </div>-->


        <form action="<?= base_url('searchcategory')?>" method="get">
            <div class="panel_body">

                <ul class="list-unstyled">
                    <?php foreach($brands as $brand){ ?>
                        <li>
                            <label>
                                <!--onclick="search_product(this)"-->
                                <input class="check_branch" type="checkbox" value="<?= $brand->name; ?>" name="key" style="margin: 0px">
                                <span><?= $brand->name; ?>   </span>

                            </label>
                        </li>
                        <div class="clearfix"></div>
                    <?php }?>
                </ul>

            </div>
            <!--/panel_body-->
            <div class="clearfix"></div>
            <div class="box_14px655D5D">Giá</div>
            <div class="min_price">
                <input type="text" name="price_form"  class="form-control">
            </div>
            <div class="gach_ngang">_</div>
            <div class="max_price">
                <input type="text" name="price_to"  class="form-control">
            </div>
            <div class="clearfix"></div>
            <div class="text-center">
                <button class="box_timkiem" style="background: #91c139; border: 0; box-shadow: 0; padding:5px 10px; color: #fff" type="submit">Tìm Kiếm</button>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $(function(){
            $(".check_branch").click(function(){
                $(".check_branch").prop("checked",false);
                $(this).prop("checked",true);

            });
        });
    </script>
    <!--
    <script type="text/javascript">
        var str = "";
        function search_product(s){
            var stri = $(s).val()+"_";
            if($(s).is(":checked")){
                str = str + stri;
            }
            else{
                str = str.replace(stri,'');
            }

            // gọi hàm ajax search data từ server truyền giá trị thương hiệu bằng str
            // Ví dụ Search_product?thuonghieu=str
            // Bên hàm server lấy giá trị của string dùng hàm cắt chuỗi implode theo ký tự _ được
            // 1 mảng for mảng gán vào điều kiện để query
            // Hàm ajax lấy dữ liệu thàng công thì gán vào DIV
        }
    </script>-->
</div>

</div>
<div class="container_pro">
    <div class="link_list">
        <a href="<?= base_url(); ?>">Trang chủ</a>
        <a> <i class="fa fa-angle-right"></i> <?= $cate_curent->name; ?> </a>


    </div>
    <div class="banner_promotion">
        <?php foreach($banner_category as $banner){
            if($banner->cate == $cate_curent->id) { ?>
                <a href="<?= $banner->url; ?>" title="<?= $banner->title; ?>">
                    <img style="max-height: 250px" class="banner_detail w_100" src="<?= base_url($banner->link); ?>" alt=""/>
                </a>
                <?php break; }} ?>
    </div>
    <div class="box_mid">
        <div class="row">
            <div class="no_name">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="left_14"><?= $cate_curent->name; ?></div>
                </div>
                <div class="col-md-6 col-sm-9 col-xs-12">
                    <div class="center_20">
                        <marquee behavior="scroll" scrollamount="5" direction="left" width="100%" style="width: 100%;">
                            <i class="fa fa-angle-double-right"></i>
                            <?= $this->option->slogan; ?>
                            <i class="fa fa-angle-double-left"></i>
                        </marquee>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 box">
                    <div class="right_13">

                        <form role="form">
                            <div class="form-group">
                                <?php $ts='-ts'; $td='-td'; ?>
                                <!--                         <select class="form-control input-sm" id="Select1" onchange="window.open(this.options[this.selectedIndex].value,'_blank');this.options[0].selected=true" name="select">-->
                                <select class="form-control input-sm" id="sel1" onchange="window.open(this.options[this.selectedIndex].value,'_parent');this.options[0].selected=true" name="select">
                                    <option  value="<?= base_url(@$cate_curent->alias.'-th'.@$cate_curent->id);?>">Sắp xếp theo</option>
                                    <option value="<?= base_url(@$cate_curent->alias.'-th'.@$cate_curent->id);?>">
                                        Mới nhất
                                    </option>

                                    <option selected="selected" value="<?=base_url(@$cate_curent->alias.'-ts'.@$cate_curent->id.$ts);?>">
                                        Giá tăng
                                    </option>
                                    <option value="<?=base_url(@$cate_curent->alias.'-td'.@$cate_curent->id.$td);?>">
                                        Giá giảm
                                    </option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="list_prod">
                <?php $x=1;
                if (!empty($list)) {
                    foreach ($list as $n) {
                        $z=$x++;
                        ?>
                        <div class="item-pro sp-item col-md-3 col-sm-4 col-xs-6 item_size1 box_size" style="padding:5px; margin: 5px 0px;">
                            <a class="img_size_pro3" href="<?=base_url(@$n->cate_alias.'/'.$n->pro_alias.'-c'.@$n->cate_id.'p'.$n->pro_id)?>">
                                <?= check_img_products($n->pro_img);?>
                            </a>
                            <!--     <a href="" title="" class="img_item">
                                     <img alt='' class='img-responsive img-primary img_product' src='img/hot_prod4.jpg'/>
                                     <img class='img-responsive img-alternate img_product' src='img/detail_prod1.png' style='display: none'/>
                                 </a>-->
                            <div class="clearfix"></div>
                            <div class="pd_5">
                                <div class="f12_333">
                                    <a href="<?=base_url(@$n->cate_alias.'/'.$n->pro_alias.'-c'.@$n->cate_id.'p'.$n->pro_id)?>" title="<?= $n->pro_name; ?>">
                                        <?= LimitString($n->pro_name,80,'...'); ?>
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                <span class="b18_7aab2a">
                     <?php if($n->pro_price_sale != 0){
                         echo''.number_format($n->pro_price_sale).'đ';
                     }  ?>
                </span>
                                <div class="clearfix"></div>
                                <div class="box-mua">
                                    <a onclick="add_cart(<?= @$n->pro_id; ?>)" >
                                        <button type="button" class="btn-3">MUA NGAY</button>
                                    </a>
                                </div>
                                <!--end box-mua-->
                            </div>
                        </div>
                        <!--end itme-pro-->
                        <?php
                        if($z%4==0) echo '<div class="clearfix" style="height: 1px"></div>';
//                                 if($z==6) break;
                    } }?>
            </div>
            <?php if (($list) == null) {
                echo'<h2 class="text-center null_list">Không có sản phẩm nào thuộc thương hiệu này  !</h2>';
            }?>
            <div class="clearfix-20"></div>
            <div class="pagination">
                <?php
                echo $this->pagination->create_links(); // tạo link phân trang
                ?>
            </div>
        </div>
    </div>

</div>