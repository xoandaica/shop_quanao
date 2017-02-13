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
                        <i class="fa fa-table"></i> Siteoption
                    </li>
                    <li>
                        <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a>
                    </li>
                    <?= @$images_lang; ?>
                </ol>
            </div>
            <form class="validate form-horizontal" role="form" id="form1" method="POST" action=""
                  enctype="multipart/form-data">
                <input type="hidden" name="edit" value="<?= @$row->id; ?>">

                <div class="col-md-9" style="font-size: 12px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Thông tin chung</h3>

                            <div class="pull-right">
                                <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                        class="fa fa-check"></i> Cập nhật
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-12">Tên đơn vị</label>

                                <div class="col-sm-12">
                                    <input name="site_name" type="text" class="validate[required] form-control input-sm"
                                           value="<?= @$row->site_name; ?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Slogan</label>

                                <div class="col-sm-12">
                                    <input name="slogan" type="text" class="form-control input-sm"
                                           value="<?= @$row->slogan; ?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Video (Youtube)</label>

                                <div class="col-sm-12">
                                    <input name="site_video" type="text" class="form-control input-sm"
                                           value="<?= $row->site_video == '' ? '' : 'https://www.youtube.com/watch?v=' . $row->site_video; ?>"
                                           placeholder="Vd:https://www.youtube.com/watch?v=XXXXXX">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12  ">Địa chỉ (tiếng việt)</label>
                                <div class="col-sm-12">
                                    <textarea name="address" class="form-control input-sm input-sm"
                                              id="ckeditor"><?= @$row->address; ?></textarea>
                                              <?php echo display_ckeditor($ckeditor); ?>
                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-sm-12">Chính sách bán hàng</label>
                                <div class="col-sm-12">
                                    <textarea name="show_room" class="form-control input-sm input-sm"
                                              id="ckeditor2"><?= @$row->show_room; ?></textarea>
                                              <?php echo display_ckeditor($ckeditor2); ?>
                                </div>
                            </div>
                            <div class="form-group hidden">
                                <label class="col-sm-12  ">Địa chỉ: (Tiếng Anh)</label>
                                <div class="col-sm-12">
                                    <textarea name="address_en" class="form-control input-sm input-sm"
                                              id="ckeditor3"><?= @$row->address_en; ?></textarea>
                                              <?php echo display_ckeditor($ckeditor3); ?>
                                </div>
                            </div>
                            <div class="form-group hidden" >
                                <label class="col-sm-12  ">Văn phòng tại - Hà Nội (Tiếng Anh)</label>
                                <div class="col-sm-12">
                                    <textarea name="option_1" class="form-control input-sm input-sm"
                                              id="ckeditor4"><?= @$row->option_1; ?></textarea>
                                              <?php echo display_ckeditor($ckeditor4); ?>
                                </div>
                            </div>
                            <div class="form-group hidden">
                                <label class="col-sm-12  ">Thông tin liên hệ (Tiếng Việt)</label>
                                <div class="col-sm-12">
                                    <textarea name="option_2" class="form-control input-sm input-sm"
                                              id="ckeditor5"><?= @$row->option_2; ?></textarea>
                                              <?php echo display_ckeditor($ckeditor5); ?>
                                </div>
                            </div>
                            <div class="form-group hidden">
                                <label class="col-sm-12  ">Thông tin liên hệ (Tiếng Anh)</label>
                                <div class="col-sm-12">
                                    <textarea name="option_3" class="form-control input-sm input-sm"
                                              id="ckeditor6"><?= @$row->option_3; ?></textarea>
                                              <?php echo display_ckeditor($ckeditor6); ?>
                                </div>
                            </div>
                            <div class="form-group hidden" >
                                <label class="col-sm-12  ">Thông tin liên hệ (Tiếng Anh)</label>
                                <div class="col-sm-12">
                                    <textarea name="option_4" class="form-control input-sm input-sm"
                                              id="ckeditor7"><?= @$row->option_4; ?></textarea>
                                              <?php echo display_ckeditor($ckeditor7); ?>
                                </div>
                            </div>
                            <div class="form-group display_none">
                                <label class="col-sm-12">Mã javascript APP quản lý comment Facebook</label>
                                <div class="col-sm-12">
                                    <textarea name="option_6" class="form-control input-sm input-sm" id="option_6"><?= @$row->option_6; ?></textarea>
                                    <?php echo display_ckeditor(@$ckeditor8); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="col-sm-12">Title Seo</label>

                                <div class="col-sm-12">
                                    <input name="site_title" type="text" class="form-control input-sm"
                                           value="<?= @$row->site_title; ?>" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Keyword Seo</label>

                                <div class="col-sm-12">
                                    <input name="site_keyword" type="text" class="form-control input-sm"
                                           value="<?= @$row->site_keyword; ?>" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Description Seo</label>

                                <div class="col-sm-12">
                                    <textarea rows="7" name="site_description"
                                              class="form-control input-sm"><?= @$row->site_description; ?></textarea>
                                </div>
                            </div>

                            <div class="content_config" style="display: none">
                                <div class="name_config">Phần tắt/bật các vùng hiển thị</div>

                                <div class="form-group">
                                    <label class="col-sm-8">
                                        <div class="lable_config">Form Liên hệ trang chi tiết</div>
                                        <textarea name="install_1" class="form-control input-sm input-sm"
                                                  id="ckeditor9"><?= @$row->install_1; ?></textarea>
                                                  <?php echo display_ckeditor(@$ckeditor9); ?>
                                    </label>

                                    <div class="col-sm-4">
                                        <div class="form-group col-md-12" style="margin-top: 24px">
                                            <label> <input value="0" <?= @$row->setup_1 == 0 ? 'checked' : ''; ?> type="radio"
                                                           name="setup_1"/>Tắt form</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label> <input value="1" <?= @$row->setup_1 == 1 ? 'checked' : ''; ?> type="radio"
                                                           name="setup_1"/>Bật form</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-8">
                                        <div class="lable_config">Form yêu cầu báo giá trang chủ</div>
                                        <textarea name="install_2" class="form-control input-sm input-sm"
                                                  id="ckeditor10"><?= @$row->install_2; ?></textarea>
                                                  <?php echo display_ckeditor(@$ckeditor10); ?>
                                    </label>
                                    <div class="col-sm-4">
                                        <div class="form-group col-md-12" style="margin-top: 24px">
                                            <label> <input value="0" <?= @$row->setup_2 == 0 ? 'checked' : ''; ?> type="radio"
                                                           name="setup_2"/>Tắt form</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label> <input value="1" <?= @$row->setup_2 == 1 ? 'checked' : ''; ?>  type="radio"
                                                           name="setup_2"/>Bật form</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-8">
                                        <div class="lable_config"> Popup lần đầu tiên vào trang</div>
                                        <textarea name="install_4" class="form-control input-sm input-sm"
                                                  id="ckeditor7"><?= @$row->install_4; ?></textarea>
                                                  <?php echo display_ckeditor($ckeditor7); ?>
                                    </label>
                                    <div class="col-sm-4">
                                        <div class="form-group col-md-12" style="margin-top: 24px">
                                            <label> <input value="0" <?= @$row->setup_4 == 0 ? 'checked' : ''; ?> type="radio"
                                                           name="setup_4"/>Tắt form</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label> <input value="1" <?= @$row->setup_4 == 1 ? 'checked' : ''; ?> type="radio"
                                                           name="setup_4"/>Bật form</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-12  ">Popup footer</label>
                                    <div class="col-sm-12">
                                        <div class="form-group col-md-12">
                                            <label> <input value="0" <?= @$row->setup_3 == 0 ? 'checked' : ''; ?> type="radio"
                                                           name="setup_3"/>Tắt form</label> &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label> <input value="1" <?= @$row->setup_3 == 1 ? 'checked' : ''; ?> type="radio"
                                                           name="setup_3"/>Bật form</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /content_config-->
                            <div class="text-right" style="padding-bottom: 15px">
                                <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                        class="fa fa-check"></i> Cập nhật
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

                            <div class="form-group">
                                <label class="col-sm-12 ">Logo</label>

                                <div class="col-sm-12">
                                    <input type="file" name="userfile" id="input_img" onchange="handleFiles()"/>
                                    <?php
                                    if (file_exists(@$row->site_logo)) {
                                        echo '<img src="' . base_url($row->site_logo) . '" id="image_review">';
                                    } else {
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 ">Favicon</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile2" id="input_img" onchange="handleFiles()"/>
                                    <?php
                                    if (file_exists(@$row->site_favicon)) {
                                        echo '<img style="max-width:100% !important; width:auto !important" src="' . base_url(@$row->site_favicon) . '" id="image_review">';
                                    } else {
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group hidden">
                                <label class="col-sm-12 ">Logo text</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile3" id="input_img" onchange="handleFiles()"/>
                                    <?php
                                    if (file_exists(@$row->site_logo2)) {
                                        echo '<img style="max-width:100% !important; width:auto !important" src="' . base_url(@$row->site_logo2) . '" id="image_review">';
                                    } else {
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Email</label>

                                <div class="col-sm-12">
                                    <input name="site_email" type="text" class="form-control input-sm"
                                           value="<?= @$row->site_email; ?>" placeholder="">
                                </div>
                            </div>

                            <div style="clear: both"></div>

                            <div class="form-group">
                                <label class="col-sm-12">Điện thoại :</label>

                                <div class="col-sm-12">
                                    <input name="hotline1" type="text" class="form-control input-sm"
                                           value="<?= @$row->hotline1; ?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Điện thoại 2:</label>

                                <div class="col-sm-12">
                                    <input name="hotline2" type="text" class="form-control input-sm"
                                           value="<?= @$row->hotline2; ?>" placeholder="">
                                </div>
                            </div>


                            <div class="form-group hidden">
                                <label class="col-sm-12">Điện thoại: 3</label>
                                <div class="col-sm-12">
                                    <input name="hotline3" type="text" class="form-control input-sm"
                                           value="<?= @$row->hotline3; ?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Facebook: 3</label>
                                <div class="col-sm-12">
                                    <input name="site_facebook" type="text" class="form-control input-sm"
                                           value="<?= @$row->site_facebook; ?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">App Facebook ID</label>
                                <div class="col-sm-12">
                                    <input name="app_facebook" type="text" class="form-control input-sm"
                                           value="<?= @$row->app_facebook; ?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">User Facebook ID</label>
                                <div class="col-sm-12">
                                    <input name="user_facebook" type="text" class="form-control input-sm"
                                           value="<?= @$row->user_facebook; ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

<style type="text/css">
    .content_config {
        padding: 10px;
    }

    .name_config {
        background: rgba(14, 14, 14, 0);
        font-size: 14px;
        color: red;
        font-weight: bold;
        border-bottom: 1px solid rgba(255, 0, 0, 0.3);
        margin-bottom: 10px;
    }

    .lable_config {
        padding: 5px 0px;
    }
</style>