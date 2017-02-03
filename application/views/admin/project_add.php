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
                    <a href="<?= base_url('vnadmin/project/projects') ?>">Danh sách <?= _title_project?> <?= @$name_lang; ?></a>
                </li>
                <li>
                    <a href="<?= base_url('vnadmin/project/add') ?>"><?= $btn_name; ?></a>
                </li>
                <li >
                    <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a>
                </li>
                <?= @$images_lang; ?>
                <?php if (isset ($error)) { ?>
                    <li class="">
                        <span style="color: red"> <?= $error; ?></span>
                    </li>
                <?php } ?>
            </ol>
        </div>

        <form class="validate form-horizontal" role="form" id="form1" method="POST" action=""
              enctype="multipart/form-data">
            <input type="hidden" name="lang" value="<?= @$id_lang != null?@$id_lang:1; ?>">
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
                            <label class="col-sm-12">Tên <?= _title_project?><?= @$name_lang; ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="validate[required] form-control input-sm " name="project_name"
                                       value="<?= @$edit->project_name; ?>" placeholder=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Alias</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control input-sm " name="project_alias"
                                       value="<?= @$edit->project_alias; ?>" placeholder=""/>
                            </div>
                        </div>
                        <div class="row" style="display: none;">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-12">Mã <?= _title_project?></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control input-sm " name="project_code"
                                               value="<?= @$edit->project_code; ?>" placeholder=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-12  ">Giá gốc</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="project_price" id="product_price"
                                               data-v-max="9999999999999" data-v-min="0" class="auto form-control input-sm"
                                               value="<?= @$edit->project_price; ?>" placeholder=""/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label class="col-sm-12" >Giá bán:</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="project_price_sale" id="product_price_sale"
                                               data-v-max="9999999999999" data-v-min="0" class=" auto form-control input-sm"
                                               value="<?= @$edit->project_price_sale; ?>" placeholder=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="display: none;">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-12">Lượt xem</label>
                                    <div class="col-sm-12">
                                        <input type="number" name="project_view" data-v-max="9999999999999" data-v-min="0"
                                         class="form-control input-sm" value="<?= @$edit->project_view; ?>" placeholder="Lượt xem"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="col-sm-12 ">Tags</label>
                                    <div class="col-sm-12">
                                        <div class="bs-example">
                                            <input type="text" name="tags" id="tagsinput" value="<?=@$tags;?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12 ">Thông tin ngắn</label>
                            <div class="col-sm-12">
                                <textarea name="project_description" class="form-control input-sm" id="ckeditor1"
                                    ><?= @$edit->project_description; ?></textarea>
                                <?php echo display_ckeditor($ckeditor1); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 ">
                                <label  class="  ">Nội dung</label>
                                <textarea name="project_content" class="form-control input-sm" id="ckeditor2"
                                          style="height: 200px"><?= @$edit->project_content; ?></textarea>
                                <?php echo display_ckeditor($ckeditor2); ?>
                            </div>
                        </div>
                        <div class="form-group display_none">
                            <div class="col-sm-12 ">
                                <label  class="  ">Ghi chú</label>
                                <textarea name="project_note" class="form-control input-sm" id="ckeditor3"
                                          style="height: 200px"><?= @$edit->project_note; ?></textarea>
                                <?php echo display_ckeditor($ckeditor3); ?>
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
                                    <?php if(@$edit->id != null){ ?>
                                        <?php if (isset($cate_selected)) $cate_selected = $cate_selected;
                                        else $cate_selected = null;
                                        view_product_cate_checklist($cate, 0, '', @$cate_selected)?>
                                    <?php }else{ echo''; }?>

                                    <?php if(@$edit->id == null){ ?>
                                        <?php if (isset($cate_selected)) $cate_selected = $cate_selected;
                                        else $cate_selected = null;
                                        view_product_cate_checklist_add($cate, 0, '', @$cate_selected)?>
                                    <?php }else{ echo''; }?>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">
                                Hiển thị
                            </label>
                            <div class="col-sm-12">
                                <div style="  border: 1px solid #ccc;   padding: 10px 0px; overflow: hidden">
                                    <label class="col-sm-12">
                                        <input type="checkbox" value="1" class="checkbox-inline"
                                               name="project_home" <?= @$edit->project_home == 1 ? 'checked' : '' ?>>
                                        <?= _title_project_home ?>
                                    </label>
                                    <label class="col-sm-12 display_none">
                                        <input type="checkbox" value="1" class="checkbox-inline"
                                               name="project_hot" <?= @$edit->project_hot == 1 ? 'checked' : '' ?>>
                                        <?= _title_product_hot ?>
                                    </label>

                                    <label class="col-sm-12 hidden">
                                        <input type="checkbox" value="1" class="checkbox-inline"
                                               name="project_focus" <?= @$edit->project_focus == 1 ? 'checked' : '' ?>>
                                        <?= _title_product_focus ?>
                                    </label>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Hình Ảnh</label>
                            <div class="col-sm-12">
                                <input type="file" name="userfile" class="" id="input_img" onchange="handleFiles()"/>
                                <?php
                                if(file_exists(@$edit->project_image)){
                                    echo '<img src="'.base_url($edit->project_image).'" id="image_review">';
                                }else{
                                    echo '<img src="" id="image_review">';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <label class="col-sm-12">Ảnh 2</label>
                            <div class="col-sm-12">
                                <input type="file" name="userfile2" class="" id="input_img" onchange="handleFiles()"/>
                                <?php
                                if(file_exists(@$edit->project_image2)){
                                    echo '<img src="'.base_url($edit->project_image2).'" id="image_review">';
                                }else{
                                    echo '<img src="" id="image_review">';
                                } ?>
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <label class="col-sm-12">Ảnh 3</label>
                            <div class="col-sm-12">
                                <input type="file" name="userfile3" class="" id="input_img" onchange="handleFiles()"/>
                                <?php
                                if(file_exists(@$edit->project_image3)){
                                    echo '<img src="'.base_url($edit->project_image3).'" id="image_review">';
                                }else{
                                    echo '<img src="" id="image_review">';
                                } ?>
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
    <script src="<?=base_url('assets/plugin/slimscroll/jquery.slimscroll.min.js')?>"></script>

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

    <script src="<?=base_url('assets/js/admin/product.js')?>"></script>