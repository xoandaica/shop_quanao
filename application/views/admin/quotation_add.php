<link rel="stylesheet" href="<?= base_url('assets/plugin/tabs_boostrap.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/plugin/ValidationEngine/style/validationEngine.jquery.css') ?>">
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-en.js') ?>"
        charset="utf-8"></script>
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugin/autonumber/jquery.number.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugin/autonumber/autoNumeric.js') ?>"></script>
<script>
    $(document).ready(function () {
        $(".validate").validationEngine();
    });
</script>
<input type="hidden" id="baseurl" value="<?= base_url(); ?>">
<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-sm-12">

        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> <a href="<?= base_url('vnadmin') ?>">Admin</a>
            </li>
            <li class="active">
                <i class="fa fa-table"></i>   khóa học
            </li>
            <?php if (isset ($error)) { ?>
                <li class="">
                    <span style="color: red"> <?= $error; ?></span>
                </li>
            <?php } ?>
        </ol>
    </div>
    <style>
        li {
            list-style: none;
        }

        .checklist_cate ul {
            padding: 0px;
            margin: 0px
        }

        .checklist_cate label {
            font-weight: normal
        }
    </style>
    <div class=" ">
        <div class="body collapse in" id="div1">


        <form class="validate form-horizontal" role="form" id="form1" method="POST" action=""
              enctype="multipart/form-data">


            <input type="hidden" name="edit" value="<?= @$edit->id; ?>">

            <div class="col-md-9" style="font-size: 12px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tổng quan</h3>

                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                    class="fa fa-check"></i> <?= @$btn_name; ?>
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label  class="col-sm-12">Tên khóa học</label>

                            <div class="col-sm-12">
                                <input type="text" class="validate[required] form-control input-sm " name="name"
                                       value="<?= @$edit->name; ?>" placeholder=""/>
                            </div>

                        </div>


                        <div class="form-group">
                            <label  class="col-sm-12">Giá</label>

                            <div class="col-sm-12">
                                <input type="text" class="validate[required] form-control input-sm auto " name="price"
                                       value="<?= @$edit->price; ?>" placeholder="" id="price"/>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-12  ">Tóm tắt <span style="color: #aaa; font-size: 12px; font-style: italic">(Ngăn cách bằng dấu chấm phẩy ' ; ')</span></label>

                            <div class="col-sm-12">
                                <textarea name="item"   rows="4"
                                          class="form-control input-sm"><?= @$edit->item; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keyword" class="col-sm-12">Chi tiết</label>

                            <div class="col-sm-12">
                                <textarea name="detail"
                                          class="form-control input-sm" id="ckeditor"><?= @$edit->detail; ?></textarea>
                                <?php echo display_ckeditor($ckeditor); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="keyword" class="col-sm-12">Title SEO</label>

                            <div class="col-sm-12">
                                <input type="text" name="title_seo" placeholder="Title seo"
                                       value="<?= @$edit->title_seo; ?>" class="form-control input-sm"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label   class="col-sm-12" value="<?=@$edit->keyword_seo;?>">Từ khóa SEO</label>

                            <div class="col-sm-12">

                                <input type="text" name="keyword_seo" placeholder="Key word"
                                       value="<?= @$edit->keyword_seo; ?>" class="form-control input-sm"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Description SEO</label>

                            <div class="col-sm-12">
                                <textarea name="desc_seo" placeholder="Description SEO" rows="4"
                                          class="form-control input-sm"><?= @$edit->desc_seo; ?></textarea>
                            </div>
                        </div>

                        <div class="text-right" style="padding-bottom: 15px">
                            <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                    class="fa fa-check"></i> <?= @$btn_name; ?>
                            </button>
                        </div>


                    </div>
                </div>
            </div>



            <div class="col-md-3" style="font-size: 12px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tùy chọn</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">


                        <label class="col-sm-12" style="padding-left: 0px">
                            Hiển thị
                        </label>

                        <div class="col-sm-12" style="  border: 1px solid #ccc; padding: 5px">
                            <label class="  checkbox-inline">
                                <input type="checkbox" value="1" name="home" <?= @$edit->home == 1 ? 'checked' : '' ?>>
                                Trang chủ
                            </label>

                            <label class="  checkbox-inline">
                                <input type="checkbox" value="1" name="hot" <?= @$edit->hot == 1 ? 'checked' : '' ?>>
                                Hot
                            </label>

                            <!--<label class="col-sm-6">
                                        <input type="checkbox" value="1"
                                               name="focus" <?/*= @$edit->focus == 1 ? 'checked' : '' */?>>
                                        <?/*= _title_product_focus */?>
                                    </label>-->

                            <!--<label class="col-sm-6">
                                        <input type="checkbox" value="1"
                                               name="coupon" <?/*= @$edit->coupon == 1 ? 'checked' : '' */?>>
                                        <?/*= _title_product_coupon */?>
                                    </label>-->
                        </div>
                        <div class="clearfix"></div>

                        <br>


                        <div class="form-group">
                            <label class="col-sm-12 ">Hình ảnh</label>

                            <div class="col-sm-12">

                                <input type="file" name="userfile"  id="input_img" onchange="handleFiles()"/>

                                <?php
                                if(file_exists(@$edit->image)){
                                    echo '<img src="'.base_url($edit->image).'" id="image_review">';
                                }else{
                                    echo '<img src="" id="image_review">';
                                }
                                ?>

                            </div>
                        </div>



                    </div>
                </div>
            </div>


        </form>













        </div>
    </div>
</div>
<!-- /.row -->


<!-- /.row -->


<!-- /.row -->


<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>