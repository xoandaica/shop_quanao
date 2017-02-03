
<section class="container">
<div class="fix-list"></div>
<div class="menu-detail">
    <section class="cate-danh-muc">
        <a href="#">
            <p>Rao vặt</p>
        </a>
    </section>
</div><!---menu-detail--->
<div class="clearfix"></div>

<section class="col-xs-12">
<div class="row">
<section class="col-md-9 col-sm-12 col-xs-12" >
    <div id="loginbox" class="danhsachraovat" style="padding-top: 10px">
        <div class="row">
        <div class="col-md-2" style="padding-bottom: 10px">
            <div class="">

                <?php if ($this->session->userdata('userid')) { ?>
                    <a href="<?= base_url('dang-tin'); ?>" class="btn btn-sm btn-default">
                        <i class="fa fa-cloud-upload"></i> Đăng tin
                    </a>
                <?php } else { ?>
                    <a data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-sm btn-default">
                        <i class="fa fa-cloud-upload"></i> Đăng tin
                    </a>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-4" style="padding-bottom: 10px">
            <div>
                <select    class=" input-sm  form-control" name="tinh_thanh" onchange="change_provin2($(this))">
                    <option value="0">--Chọn Tỉnh/Thành--</option>
                    <?php
                    foreach(@$tinhthanh as $t){?>
                        <option value="
                            <?=base_url('rao-vat-'.$t->alias)?>
                        "
                            <?=@$_SESSION['tinh_raovat']==$t->alias?'selected':''?>>
                            <?=$t->name;?></option>
                    <?php }
                    ?>
                </select>
                <script>
                    function change_provin2(sender) {
                        window.location.href = sender.val();
                        ;
                    }
                </script>
            </div>
        </div>
        <div class="col-md-4" style="padding-bottom: 10px">
            <div >



                <select class=" input-sm  form-control" name="" id="danh_muc" onchange="change_cate($(this))">
                    <option value="<?= base_url('rao-vat-toan-quoc/') ?>">Tất cả</option>
                    <?php raovat_cate($cate, 0, '', $curent_cate); ?>
                </select>
                <script>
                    function change_cate(sender) {
                        window.location.href = sender.val();
                        ;
                    }
                </script>
            </div>
        </div>
        </div>
        <br>
        <br>

        <div class="clearfix"></div>
        <?php

        function raovat_cate($data,$parent=0,$text='',$edit=null){
                isset($_SESSION['tinh_raovat'])?$tinh=$_SESSION['tinh_raovat']:$tinh='toan-quoc';
            foreach ($data as $k=>$v) {
                if ($v->parent_id == $parent) {
                    unset($data[$k]);
                    $id = $v->id;
                    $v->alias==$edit?$selected='selected':$selected='';
                    echo '<option value="'.base_url('rao-vat-'.$tinh.'/'.$v->alias).'" '.$selected.'>'.$text.$v->name.'</option>';

                    raovat_cate($data, $id, $text . '. &nbsp;&nbsp; ',$edit);
                }
            }
        }

        ?>


        <div style="clear: both"></div>

        <ul>
            <?php if(isset($list)&&!empty($list)){
                foreach($list as $v){?>
                    <li>
                        <div class="col-md-12">

                        </div>
                        <style type="text/css">
                            .col1{
                                width: 5%; float: left;
                                padding-left: 5px;
                            }
                            .col1 img{
                                width: 100%;
                            }
                            .col19{
                                width: 95%; float: left;
                            }
                        </style>

                        <div class="col1">

                            <?php if(file_exists($v->avatar)){?>
                                <img class="img-responsive" src="<?=base_url($v->avatar)?>" />
                            <?php  }else{?>
                                <img class="img-responsive" src="<?=base_url('img/default-avatar.jpg')?>" />
                            <?php }?>

                        </div>
                            <div class="col19">
                        <div class="col-md-6">
                            <a href="<?=base_url('rao-vat/'.$v->alias)?>"> <?=$v->tieude;?></a>
                            <p><i class="fa fa-user"></i> <?=$v->fullname;?></p>
                            <ul>
                                <li><i class="fa fa-map-marker"></i> <?=$v->province_name;?></li>
                                <li><i class="fa fa-eye"></i> <?=$v->dientich;?></li>
                                <li><i class="fa fa-map-marker"></i> <?=date('d-m-Y',$v->time);?></li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <?php
                            if(file_exists($v->anh)){
                                echo '<img class="img_post" src="'.base_url($v->anh).'" />';
                            }
                            foreach($post_image as $img){
                                if($img->id_item==$v->id&&file_exists($img->link)){
                                    echo '<img class="img_post"  src="'.base_url($img->link).'" />';
                                }
                            }
                            ?>
                        </div>

    </div>
                        <div class="clearfix" ></div>
                    </li>
            <?php }
            }else{ echo 'Chưa có tin đăng nào!';}?>
        </ul>

        <div class="text-center">
            <?php
            echo $this->pagination->create_links(); // tạo link phân trang
            ?>
        </div>

    </div><!-- .loginbox-->
</section>
<!---End Left------->


    <section class="col-md-3  col-sm-12 col-xs-12">
        <div class="row">
            <section>
                <iframe style="border: none" width="100%" height="" src="https://www.youtube.com/embed/<?=$this->option->video;?>" frameborder="0" allowfullscreen></iframe>
                <div class="banner_right">
                <?php if (isset($banner_right)) {
                    foreach ($banner_right as $item) {
                        ?>
                        <?php if ($item->url != null) echo "<a href='" . $item->url . "' target='" . $item->target . "'>"; ?>
                        <img src="<?= base_url($item->link); ?>"/>
                        <?php if ($item->url != null) echo "</a>"; ?>
                    <?php
                    }
                }?>
                </div>
            </section>

            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
        </div><!--end row-->
    </section>
    <!---End .sidebar_box_1--->

</div><!--end row-->
</section>
</section>


