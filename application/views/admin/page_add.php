<div id="page-wrapper">
<style>.view_checkbox input[type=checkbox]{margin-top:2px }</style>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?= base_url('vnadmin') ?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?= base_url('vnadmin/pages/pages')?>">Pages</a>
                    </li>
                    <li >
                        <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a>
                    </li>

                    <?= @$images_lang; ?>
                </ol>
            </div>
            <form class="validate form-horizontal" role="form" id="form1" method="POST" action=""
                  enctype="multipart/form-data">

                <input type="hidden" name="edit" value="<?= @$edit->id; ?>">

                <div class="col-md-9" style="font-size: 12px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Tổng quan</h3>
                            <input type="hidden" name="lang" value="<?= @$id_lang != null?@$id_lang:1; ?>">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success btn-xs" name="addnews"><i
                                        class="fa fa-check"></i> <?= @$btn_name; ?>
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label  class="col-sm-12">Tiêu Đề</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control input-sm " name="name"
                                           value="<?=@$edit->name;?>" placeholder=""/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-sm-12">Alias</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control input-sm " name="alias"
                                           value="<?=@$edit->alias;?>" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-12">Mô tả</label>

                                <div class="col-sm-12">
                                    <textarea name="description" class="form-control input-sm" placeholder=""
                                              rows="4"><?=@$edit->description;?></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-12  ">Nội dung:</label>
                                <div class="col-sm-12">
                                    <textarea name="content" class="form-control input-sm" id="ckeditor"><?=@$edit->content;?></textarea>
                                    <?php echo display_ckeditor($ckeditor); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="keyword" class="col-sm-12">Title SEO</label>

                                <div class="col-sm-12">
                                    <input type="text" name="title_seo" class="form-control input-sm" value="<?=@$edit->title_seo;?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label   class="col-sm-12" value="<?=@$edit->keyword_seo;?>">Từ khóa SEO</label>

                                <div class="col-sm-12">
                                    <input type="text" name="keyword_seo" class="form-control input-sm" value="<?=@$edit->keyword_seo?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12">Description SEO</label>

                                <div class="col-sm-12">
                                    <textarea name="description_seo" class="form-control input-sm" placeholder=""
                                              rows="4"><?=@$edit->description_seo?></textarea>
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


                            <label class="col-sm-12 hidden" style="padding-left: 0px">
                                Hiển thị
                            </label>
                            <div class="col-sm-12 view_checkbox hidden" style="  border: 1px solid #ccc; padding-left: 0px; padding: 10px">
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="1"
                                           name="home" <?= @$edit->home == 1 ? 'checked' : '' ?>>
                                    <?= _title_pages_home ?>
                                </label>
                                <label class="checkbox-inline display_none" >
                                    <input type="checkbox" value="1"
                                           name="hot" <?= @$edit->hot == 1 ? 'checked' : '' ?>>
                               Hot
                                </label>
                                <label class="checkbox-inline hidden" >
                                    <input type="checkbox" value="1"
                                           name="focus" <?= @$edit->focus == 1 ? 'checked' : '' ?>>
                                   Focus
                                </label>

                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <div class="form-group">
                                <label class="col-sm-12 ">Hình ảnh</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile" id="input_img" onchange="handleFiles()" />
                                    <?php
                                    if(file_exists(@$edit->icon)){
                                        echo '<img src="'.base_url($edit->icon).'" id="image_review">';
                                    }else{
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group display_none">
                                <label class="col-sm-12 ">Hình ảnh 2</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile2" id="input_img" onchange="handleFiles()" />
                                    <?php
                                    if(file_exists(@$edit->icon2)){
                                        echo '<img src="'.base_url($edit->icon2).'" id="image_review">';
                                    }else{
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group display_none">
                                <label class="col-sm-12 ">Hình ảnh 3</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile3" id="input_img" onchange="handleFiles()" />
                                    <?php
                                    if(file_exists(@$edit->icon3)){
                                        echo '<img src="'.base_url($edit->icon3).'" id="image_review">';
                                    }else{
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group display_none">
                                <label class="col-sm-12 ">Hình ảnh 4</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile4" id="input_img" onchange="handleFiles()" />
                                    <?php
                                    if(file_exists(@$edit->icon4)){
                                        echo '<img src="'.base_url($edit->icon4).'" id="image_review">';
                                    }else{
                                        echo '<img src="" id="image_review">';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group display_none">
                                <label class="col-sm-12 ">Hình ảnh 5</label>
                                <div class="col-sm-12">
                                    <input type="file" name="userfile5" id="input_img" onchange="handleFiles()" />

                                    <?php
                                    if(file_exists(@$edit->icon5)){
                                        echo '<img src="'.base_url($edit->icon5).'" id="image_review">';
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
        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
