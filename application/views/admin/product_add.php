<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= base_url('vnadmin') ?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?= base_url('vnadmin/product/products') ?>"><?= _title_product ?></a>
                    </li>
                    <li>
                        <a href="<?= base_url('vnadmin/product/add') ?>"><?= $btn_name; ?></a>
                    </li>
                    <li >
                        <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a>
                    </li>
                    <?= @$images_lang; ?>
                    <?php if (isset($error)) { ?>
                        <li class="">
                            <span style="color: red"> <?= $error; ?></span>
                        </li>
                    <?php } ?>
                </ol>
            </div>
            <form class="validate form-horizontal" role="form" id="form1" method="POST" action=""
                  enctype="multipart/form-data">
                <input type="hidden" name="lang" value="<?= @$id_lang != null ? @$id_lang : 1; ?>">
                <input type="hidden" name="edit" value="<?= @$edit->id; ?>">
                <input type="hidden" name="session" value="1"> <!-- check session products-->
                <div class="col-md-9" style="font-size: 12px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Tổng quan</h3>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                        class="fa fa-check"></i> <?= $btn_name; ?>
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-12">Tên <?= _title_product ?><?= @$name_lang; ?></label>
                                <div class="col-sm-12">
                                    <input type="text" class="validate[required] form-control input-sm " name="name"
                                           value="<?= @$edit->name; ?>" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Ngày tạo</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control input-sm " name="date"
                                           value="<?= @$edit->date; ?>" placeholder="<?= date('Y-m-d', time()) ?>"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Alias</label>
                                <div class="col-sm-12">
                                    <input type="text" class=" form-control input-sm " name="alias"
                                           value="<?= @$edit->alias; ?>" placeholder=""/>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-12"> Giá sỉ</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="desc" id="product_price_sale"
                                                   data-v-max="9999999999999" data-v-min="0" class=" auto form-control input-sm"
                                                   value="<?= @$edit->desc; ?>" placeholder=""/>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-12  ">Giá cũ :</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="price" id="product_price"
                                                   data-v-max="9999999999999" data-v-min="0" class="auto form-control input-sm"
                                                   value="<?= @$edit->price ?>" placeholder=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-12">Giá <?= _title_product ?></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="price_sale" id="product_price_sale"
                                                   data-v-max="9999999999999" data-v-min="0" class=" auto form-control input-sm"
                                                   value="<?= @$edit->price_sale; ?>" placeholder=""/>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Màu sắc</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control input-sm " name="color"
                                           value="<?= @$edit->color; ?>" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Chất liệu</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control input-sm " name="origin"
                                           value="<?= @$edit->origin; ?>" placeholder=""/>
                                </div>
                            </div>
                            <div class="row hidden" >
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-12">Mã <?= _title_product ?></label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control input-sm " name="code"
                                                   value="<?= @$edit->code; ?>" placeholder=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-12">Nhà Sản xuất</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control input-sm " name="caption_2"
                                                   value="<?= @$edit->caption_2; ?>" placeholder=""/>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-12">Quy cách sản phẩm:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control input-sm " name="caption_1"
                                                   value="<?= @$edit->caption_1; ?>" placeholder=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-12">Trọng lượng:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control input-sm " name="note"
                                                   value="<?= @$edit->note; ?>" placeholder="Lọ 50 ml"/>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-sm-12 ">Thông tin ngắn</label>
                                <div class="col-sm-12">
                                    <textarea name="description" class="form-control input-sm" id="ckeditor1"
                                              ><?= @$edit->description; ?></textarea>
                                              <?php echo display_ckeditor($ckeditor1); ?>
                                </div>
                            </div>
                            <div class="form-group" >
                                <div class="col-sm-12 ">
                                    <label  class="  ">Thông tin chi tiết</label>
                                    <textarea name="content" class="form-control input-sm" id="ckeditor2"
                                              style="height: 200px"><?= @$edit->content; ?></textarea>
                                              <?php echo display_ckeditor($ckeditor2); ?>
                                </div>
                            </div>

                            <hr>
                            <div class="form-group">
                                <label class="col-sm-12 ">Title SEO</label>
                                <div class="col-sm-12">
                                    <input type="text" name="title_seo" placeholder=""
                                           value="<?= @$edit->title_seo; ?>" class="form-control input-sm"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 ">Keyword SEO</label>
                                <div class="col-sm-12">
                                    <input type="text" name="keyword_seo" placeholder=""
                                           value="<?= @$edit->keyword_seo; ?>" class="form-control input-sm"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label f class="col-sm-12 ">Description SEO:</label>
                                <div class="col-sm-12">
                                    <textarea name="description_seo" placeholder=""
                                              class="form-control input-sm"><?= @$edit->description_seo; ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="text-right" style="padding-bottom: 15px">
                                    <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                            class="fa fa-check"></i> <?= $btn_name; ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="col-md-3" style="font-size: 12px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tùy chọn</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-12" >
                                    Danh mục
                                </label>
                                <div class="col-sm-12  " >
                                    <div class=" checklist_cate cat_checklist" style="border: 1px solid #ccc;padding: 5px">
                                        <?php if (@$edit->id != null) { ?>
                                            <?php
                                            if (isset($cate_selected))
                                                $cate_selected = $cate_selected;
                                            else
                                                $cate_selected = null;
                                            view_product_cate_checklist($cate, 0, '', @$cate_selected)
                                            ?>
                                        <?php }else {
                                            echo'';
                                        } ?>

<?php if (@$edit->id == null) { ?>
    <?php
    if (isset($cate_selected))
        $cate_selected = $cate_selected;
    else
        $cate_selected = null;
    view_product_cate_checklist_add($cate, 0, '', @$cate_selected)
    ?>
<?php }else {
    echo'';
} ?>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group" style="">
                                <label class="col-sm-12 ">
                                    Hiển thị
                                </label>
                                <div class="col-sm-12">
                                    <div style="  border: 1px solid #ccc;   padding: 10px 0px; overflow: hidden">
                                        <label class="col-sm-12">
                                            <input type="checkbox" value="1" class="checkbox-inline"
                                                   name="home" <?= @$edit->home == 1 ? 'checked' : '' ?>>
<?= _title_product_home ?>
                                        </label>
                                        <label class="col-sm-12 hidden">
                                            <input type="checkbox" value="1" class="checkbox-inline"
                                                   name="hot" <?= @$edit->hot == 1 ? 'checked' : '' ?>>
                                                   <?= _title_product_hot ?>
                                        </label>

                                        <label class=" col-sm-12 hidden">
                                            <input type="checkbox" value="1" class="checkbox-inline"
                                                   name="focus" <?= @$edit->focus == 1 ? 'checked' : '' ?>>
<?= _title_product_focus ?>
                                        </label>

                                        <label class="col-sm-6 display_none">
                                            <input type="checkbox" value="1"
                                                   name="vip" <?= @$edit->vip == 1 ? 'checked' : '' ?>>
<?= _title_product_vip ?>
                                        </label>
                                        <label class="col-sm-12 display_none" >
                                            <input type="checkbox" value="1"
                                                   name="coupon" <?= @$edit->coupon == 1 ? 'checked' : '' ?>>
                                        <?= _title_product_coupon ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="display: none;">
                                <label class="col-sm-12">
                                    Thương hiệu
                                </label>
                                <div class="col-sm-12" >
                                    <div class=" checklist_cate cat_checklist" style="border: 1px solid #ccc;padding: 5px;overflow: hidden ">
<?php
foreach ($brand as $k => $v) {
    @$edit_id = $edit->trademark_id;
    $v->id == $edit_id ? $selected = 'checked' : $selected = '';
    ?>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name ="trademark_id" value="<?= $v->id ?>"
                                        <?= $selected ?> class="chk" id="<?= $v->id ?>">  <?= $v->name ?>
                                                </label>
                                            </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Ảnh</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile" class="" id="input_img" onchange="handleFiles()"/>
<?php
if (file_exists(@$edit->image)) {
    echo '<img src="' . base_url($edit->image) . '" id="image_review">';
} else {
    echo '<img src="" id="image_review">';
}
?>
                                </div>
                            </div>
                            <div class="form-group" style="">
                                <label class="col-sm-12 ">
                                    SIZE
                                </label>
                                <div class="col-sm-12">
                                    <div style="  border: 1px solid #ccc;   padding: 10px 0px; overflow: hidden">
                                        <label class="col-sm-3">
                                            <input type="checkbox" value="1" class="checkbox-inline"
                                                   name="size1" <?= @$edit->size1 == 1 ? 'checked' : '' ?>>
                                            S
                                        </label>
                                        <label class="col-sm-3 ">
                                            <input type="checkbox" value="1" class="checkbox-inline"
                                                   name="size2" <?= @$edit->size2 == 1 ? 'checked' : '' ?>>
                                            M
                                        </label>

                                        <label class=" col-sm-3 ">
                                            <input type="checkbox" value="1" class="checkbox-inline"
                                                   name="size3" <?= @$edit->size3 == 1 ? 'checked' : '' ?>>
                                            L
                                        </label>

                                        <label class="col-sm-3 ">
                                            <input type="checkbox" value="1"
                                                   name="size4" <?= @$edit->size4 == 1 ? 'checked' : '' ?>>
                                            XL
                                        </label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="display: none" >
                                <label class="col-sm-12">Ảnh  trang chủ</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile2" class="" id="input_img" onchange="handleFiles2()"/>
                                    <?php
                                    if (file_exists(@$edit->image2)) {
                                        echo '<img src="' . base_url($edit->image2) . '" id="image_review">';
                                    } else {
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group " style="display: none">
                                <label class="col-sm-12">Ảnh trang danh mục</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile3" class="" id="input_img" onchange="handleFiles2()"/>
                                    <?php
                                    if (file_exists(@$edit->image3)) {
                                        echo '<img src="' . base_url($edit->image3) . '" id="image_review">';
                                    } else {
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group " style="display: none;">
                                <label class="col-sm-12">Ảnh Thương hiệu</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile4" class="" id="input_img" onchange="handleFiles2()"/>
                                    <?php
                                    if (file_exists(@$edit->image4)) {
                                        echo '<img src="' . base_url($edit->image4) . '" id="image_review">';
                                    } else {
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group " style="display: none;">
                                <label class="col-sm-12">Ảnh đại diện mobiles</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile5" class="" id="input_img" onchange="handleFiles2()"/>
<?php
if (file_exists(@$edit->image5)) {
    echo '<img src="' . base_url($edit->image5) . '" id="image_review">';
} else {
    echo '<img src="" id="image_review">';
}
?>
                                </div>
                            </div>
                            <div class="text-right" style="padding-bottom: 15px">
                                <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                        class="fa fa-check"></i> <?= $btn_name; ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



        </div>

    </div><!-- /.container-fluid -->
    <style type="text/css">
        .input-group {
            margin: 5px 0px !important;
        }
        .bootstrap-tagsinput{
            border-radius: 0 !important;
        }
    </style>
    <script src="<?= base_url('assets/plugin/autonumber/autoNumeric.js') ?>"></script>
    <script src="<?= base_url('assets/plugin/autonumber/jquery.number.js') ?>"></script>

    <link rel="stylesheet" href="<?= base_url('assets/plugin/colorpicker/bootstrap-colorpicker.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugin/colorpicker/jquery.minicolors.css') ?>">
    <script src="<?= base_url('assets/plugin/colorpicker/jquery.minicolors.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugin/slimscroll/jquery.slimscroll.min.js') ?>"></script>

    <script>
                                    $('#product_price,#product_price_sale').autoNumeric(0);
                                    $('.cat_checklist').slimScroll({
                                        height: '200px',
                                        alwaysVisible: true,
                                        railVisible: true
                                    });
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/plugin/tagsinput') ?>/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="<?= base_url('assets/plugin/tagsinput') ?>/css/app.css">
    <script type="text/javascript" src="<?= base_url('assets/plugin/tagsinput') ?>/js/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugin/tagsinput') ?>/js/typeahead.bundle.min.js"></script>


    <script src="<?= base_url('assets/js/admin/product.js') ?>"></script>