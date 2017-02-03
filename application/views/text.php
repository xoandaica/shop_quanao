<section class="main-tintuc page-detail clearfix">
<div class="container">
<div class="row">
<div class="link-home">
    <i class="fa fa-home"></i>
    <a class="<?= base_url()?>" title="Trang chủ">
        Trang chủ /
    </a>

    <?php creat_break_crum2('project',$cate,$cate_current->id,$cate_current->alias,$cate_current->name); ?>

    <a  title="<?= $pro_first->project_name; ?>">
        / <?= $pro_first->project_name; ?>
    </a>
</div><!--end link-home-->
<div class="clearfix"></div>
<div class="col-tintuc col-tt col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="slide-img col-md-12" style="width: 99%;">
            <div id="slider" class="flexslider slider_da">
                <ul class="slides">
                    <li>
                        <img src="<?= base_url(@$pro_first->project_image) ?>" />
                    </li>
                    <?php foreach ($project_image as $key => $img) {
                        if ($img->project_id == $pro_first->id ) { ?>
                            <li>
                                <img src="<?= base_url($img->link)?>" />
                            </li>
                        <?php } } ?>
                    <!-- items mirrored twice, total of 12 -->
                </ul>
            </div>
            <div id="carousel" class="flexslider">
                <ul class="slides">
                    <li>
                        <img class="img_pj_slide" src="<?= base_url($pro_first->project_image)?>" />
                    </li>
                    <?php foreach ($project_image as $key => $img) {
                        if ($img->project_id == $pro_first->id ) { ?>
                            <li>
                                <img class="img_pj_slide" src="<?= base_url($img->link)?>" />
                            </li>
                        <?php } } ?>
                    <!-- items mirrored twice, total of 12 -->
                </ul>
            </div>

        </div><!--end slide-img-->
        <div class="clearfix"></div>
        <div class="ho-tro-KH col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-3 col-sm-3 ho-tro">
                <p>
                    <?= $this->option->hotline1;?>
                </p>
            </div>
            <div class="col-md-3 bao-gia col-sm-3">
                <h3>
                    <a href="" title="" class="" data-toggle="modal" data-target="#myModal">
                        yêu cầu báo giá
                    </a>
                </h3>
            </div>
        </div><!--end hotro-KH-->
        <div class="col-md-12 thong-tin col-sm-12 col-xs-12">
            <h4 class="tit-tt">
                <a href="" title="">Thông tin</a>
            </h4>
            <div class="detail clearfix">
                <?= $pro_first->project_description?>
            </div>
        </div><!--end thong-tin-->
        <div class="detail-tt col-md-12 thong-tin col-sm-12 col-xs-12">
            <h4>Mô tả</h4>
            <p><?= $pro_first->project_content?></p>
            <div class="clearfix-10"></div>
            <div class="tagcloud" style="margin: 0 !important;">
                <?php foreach ($duan_focus as $key => $da) {  ?>
                    <a href="<?= site_url($da->alias.'-pj'.$da->id)?>" title=""><?= $da->name?></a>
                <?php  } ?>
            </div>
            <div class="clearfix"></div>
        </div><!--end detail--t-->

        <div class="lien-he col-md-12 thong-tin col-sm-12 col-xs-12">
            <div class="tit-lh">
                <p>Liên hệ với chúng tôi</p>
            </div>
            <form action="" method="post" class="validate form-horizontal" role="form">
                <div class="contact-form ct-form col-md-12">
                    <input type="hidden" value="<?= @$pro_first->project_name; ?>" name="name_project"/>
                    <input type="hidden" value="<?= @$link_share; ?>" name="link_project"/>
                    <p class="newline ct-hoten">
                        <span class="lb">Họ tên</span>
                                <span class=" ">
                                    <input type="text" name="full_name" value="" size="40" class="validate[required] inpt inpt-1"  />
                                </span>
                    </p>
                    <p class="newline ct-hoten">
                        <span class="lb">Email</span>
                                <span class=" ">
                                    <input type="text" name="email" value="" size="40" class="validate[required,custom[email]] inpt inpt-2"  />
                                </span>
                    </p>
                    <p class="newline ct-hoten">
                        <span class="lb">Điện thoại</span>
                                <span class=" ">
                                    <input type="text" name="phone" value="" size="40" class="inpt inpt-3"  />
                                </span>
                    </p>
                    <p class="newline ct-hoten">
                        <span class="lb">Công ty</span>
                                <span class=" ">
                                    <input type="text" name="city" value="" size="40" class="inpt inpt-4"  />
                                </span>
                    </p>
                    <p class="newline ct-hoten">
                        <span class="lb">Tiêu đề</span>
                                <span class=" ">
                                    <input type="text" name="country" value="" size="40" class="inpt inpt-5"  />
                                </span>
                    </p>
                    <p class="newline ct-hoten">
                        <span class="lb">Nội dung yêu cầu dịch vụ</span>
                                <span class=" ">
                                    <input type="text" name="comment" value="" size="40" class="inpt inpt-6"  />
                                </span>
                    </p>
                    <p class="text-center">
                        <input type="submit" name="sendcontact" value="Gửi yêu cầu" class="wpcf7-form-control wpcf7-submit">


                    </p>
                </div>
            </form>  <!--end form-->
            <div class="rating"> </div> <!-- /start rating-->
            <div class="comment col-md-12">
                <div class="tit-cm">
                    <h4>
                        <a href="" title="">Bình luận</a>
                    </h4>
                </div><!--end tit-cm-->
                <div class="link-lk col-md-12">
                    <a href="" title=""><img src="<?= base_url('assets/css/img/ctda/icon_fb.png') ?>" alt=""></a>
                    <a href="" title=""><img src="<?= base_url('assets/css/img/ctda/icon_tw.png') ?>" alt=""></a>
                    <a href="" title=""><img src="<?= base_url('assets/css/img/ctda/icon_g.png') ?>" alt=""></a>
                    <a href="" title=""><img src="<?= base_url('assets/css/img/ctda/icon_p.png') ?>" alt=""></a>
                </div>
            </div><!--end comment-->
            <div class="clearfix"></div>
            <div class="binhluan">
                <div class="fb-comments" data-href="<?= @$link_share; ?>" data-num-posts="10" data-order-by='reverse_time' data-width="100%" data-colorscheme="dark">
                </div>
            </div>

            <script type="text/javascript">
                function add_customer(){
                    var  color_defauf = 'red';
                    var myElement = document.querySelector("._5mdd");
                    myElement.style.background = color_defauf;
                }
                add_customer();
            </script>
            <style type="text/css">

                body.plugin{
                    color: red !important;
                }
                ._42ef{
                    color: red !important;
                }
                .fb-comments{
                    color: red !important;
                }
            </style>
        </div><!--end lien-he-->

    </div><!--end row-->
</div><!--end col-tintuc-->

<!--widgets -->
<?= $right_project; ?>

<div class="clearfix"></div>
<div class="other-service col-md-12">
    <div class="tit-service">
        <h3>
            dự án khác
        </h3>
    </div>
    <div class="box-other row">
        <?php $i_c=0; foreach ($project_lienquan as  $pro) { $i_c++; ?>
            <div class="item-other col-md-3 col-sm-3">
                <div class="img-other">
                    <a href="<?= site_url($pro->cat_alias.'/'.$pro->project_alias.'-c'.$pro->cat_id.'pj'.$pro->id)?>" title="<?= $pro->project_name?>">
                        <img class="img_pj_lq" src="<?= base_url($pro->project_image)?>" alt="">
                    </a>
                </div>
                <div class="text-other">
                    <a href="<?= site_url($pro->cat_alias.'/'.$pro->project_alias.'-c'.$pro->cat_id.'pj'.$pro->id)?>" title="<?= $pro->project_name?>" title="">
                        <?= $pro->project_name?>
                    </a>
                </div>
            </div>
            <?php
            if($i_c == 4){ echo'<div class="clearfix_pc"></div>'; }
            if($i_c == 4){ echo'<div class="clearfix_sm"></div>'; }
            if($i_c == 4){ echo'<div class="clearfix_xs"></div>'; }
        } ?>

    </div><!--end box-->
</div><!--end service-->
<div class="posts-related"> <p id="posts-related-title"> </p>  </div>  <!-- end rating-->
</div><!--end row-->
</div><!--end container-->
</section>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="z-index: 99999999999">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="background-color: rgb(29, 31, 33); margin-top: 100px; z-index: 99999">
            <div class="modal-header" style="border: none">
                <button type="button" class="close close_cusomer" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center; color: rgb(213, 204, 142);">YÊU CẦU BÁO GIÁ</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post" class="validate form-horizontal" role="form">
                    <div class="col-md-6">
                        <img style="margin-top: 14px; height: 185px;" src="<?= base_url(@$pro_first->project_image) ?>" />
                        <div class="clearfix" style="margin-bottom: 15px;"></div>
                        <div class="text-center project_name"  >
                            <a> <?=  @$pro_first->project_name ?> </a>
                        </div>

                    </div>
                    <div class="contact-form ct-form col-md-6">
                        <input type="hidden" value="<?= @$pro_first->project_name; ?>" name="name_project"/>
                        <input type="hidden" value="<?= @$link_share; ?>" name="link_project"/>
                        <p class="newline ct-hoten">
                            <span class="lb">Họ tên</span>
                            <input type="text" name="full_name" value="" size="40" class="validate[required]  inpt inpt-1"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Email</span>
                            <input type="text" name="email" value="" size="40" class="validate[required,custom[email]] inpt inpt-2"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Điện thoại</span>
                            <input type="text" name="phone" value="" size="40" class="inpt inpt-3"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Công ty</span>
                            <input type="text" name="city" value="" size="40" class="inpt inpt-4"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Tiêu đề</span>
                            <input type="text" name="country" value="" size="40" class="inpt inpt-5"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Nội dung yêu cầu báo giá</span>
                            <input type="text" name="comment" value="" size="40" class="inpt inpt-6"  />
                        </p>
                        <p class="text-center">
                            <input type="submit" name="sendcontact" value="GỬI YÊU CẦU" class="wpcf7-form-control wpcf7-submit">
                        </p>
                    </div>
                    <div class="clearfix-10"></div>

                </form>  <!--end form-->
            </div>
        </div>

    </div>
</div>




<?php  foreach ($project_lienquan as  $p ) { ?>


    <div class="suggest-post-detail animate-down">
        <div class="suggest-post-content">
            <a href="<?= site_url($p->cat_alias.'/'.$p->project_alias.'-c'.$p->cat_id.'pj'.$p->pro_id)?>" title=" <?= $p->project_name?>">

                <img src="<?= base_url($p->project_image)?>" alt="<?= $p->project_name?>">
            </a>
            <i>Bạn đừng bỏ lỡ</i>
            <a href="<?= site_url($p->cat_alias.'/'.$p->project_alias.'-c'.$p->cat_id.'pj'.$p->pro_id)?>" class="post-title" target="_blank">
                <?= $p->project_name?>
            </a>
            </a><a id="close" href="javascript:;">X</a>
            <div class="clear"></div>
        </div>
    </div>
    <?php break; } ?>
<link rel="stylesheet" id="bones-stylesheet-css" href="./css_js/style_z1.css" type="text/css" media="all">
<link href="<?= base_url('assets/css/site/style_z1.css') ?>" rel="stylesheet" media="all"/>
<script type="text/javascript">
    jQuery(document).ready(function () {
        var is_close = false;

        jQuery('.suggest-post-detail #close').click(function () {
            is_close = true;
            jQuery(".suggest-post-detail").removeClass("animate-up").addClass("animate-down");
        });

        jQuery(window).scroll(function () {

            if (is_close === true) return;

            var window_scroll_position = jQuery(window).scrollTop();

            var article_position = jQuery('.rating').offset();

            if (window_scroll_position >= article_position.top - 900) {
                if (jQuery('#posts-related-title').length > 0) {
                    var related_position = jQuery('#posts-related-title').offset();
                    if (window_scroll_position > related_position.top - 500) {
                        jQuery(".suggest-post-detail").removeClass("animate-up").addClass("animate-down");
                    }
                    else {
                        jQuery(".suggest-post-detail").removeClass("animate-down").addClass("animate-up");
                    }
                }
            }
            else {
                jQuery(".suggest-post-detail").removeClass("animate-up").addClass("animate-down");
            }

        });
    });
</script>
<link rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v2/yT/r/VJx-L5qLy3d.css"/>

