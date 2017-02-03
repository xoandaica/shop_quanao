<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Sửa tin rao vặt
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?= base_url('vnadmin')?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('vnadmin/raovat/raovat_list')?>">Rao vặt</a>
                    </li>
                    <?php if (isset ($error)) { ?>
                        <li class="">
                            <?= $error; ?>
                        </li>
                    <?php } ?>
                </ol>
            </div>
            <div class="col-md-12">

                <div class="body collapse in" id="div1">
                    <form class="form-horizontal" role="form" id="form1" method="POST" action=""
                          enctype="multipart/form-data">
                        <div class="text-right" style="padding-bottom: 15px">
                            <button type="submit" class="btn btn-success btn-sm" name="editnews"><i class="fa fa-check"></i> Lưu</button>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 control-label">Tiêu Đề <span
                                    style="color: red">* </span>:</label>
                            <div class="col-lg-5">
                                <input type="text" class="form-control " name="title" placeholder="Tiêu đề"
                                       value="<?= @$raovat->tieude; ?>"/>
                            </div>

                        </div>

                        <div class="col-md-6 ">

                        </div>
                        <div class="col-md-12 ">
                        <div class="row ">
                            <div class="form-group">
                                <?php if ($raovat->anh != null) { ?>
                                    <div class="col-md-3 text-right">
                                        <label class="control-label">Ảnh:</label>
                                        <img src="<?= base_url($raovat->anh) ?>"
                                             style="width: 100px; max-height: 100px"/>
                                    </div>
                                    <label class="col-lg-2 control-label">Thay đổi ảnh:</label>

                                    <div class="col-lg-3">
                                        <input type="file" name="userfile" class="form-control" style="font-size: 12px"/>
                                    </div>
                                <?php }else{?>
                                    <label class="col-lg-2 control-label">Ảnh:</label>

                                    <div class="col-lg-5">
                                        <input type="file" name="userfile" class="form-control" style="font-size: 12px"/>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        </div>


                        <div class="form-group">
                            <label for="inputcontent" class="col-lg-2 control-label">Nội dung:</label>

                            <div class="col-lg-7">
                                <textarea name="content" class="form-control"
                                          id="ckeditor"><?= $raovat->noidung; ?></textarea>
                                <?php echo display_ckeditor($ckeditor); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 control-label">Mô Tả:</label>

                            <div class="col-lg-5">
                                <textarea name="description" class="form-control" placeholder="Mô tả"
                                          rows="4"><?= @$raovat->mota; ?></textarea>
                            </div>
                        </div>

                        <div class="text-center" style="padding-bottom: 15px">
                            <button type="submit" class="btn btn-success btn-sm" name="editraovat"><i class="fa fa-check"></i> Lưu</button>
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