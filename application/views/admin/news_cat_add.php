<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?=$btn_name;?> danh mục
                    </li>
                    <?= @$images_lang; ?>
                    <?php if (isset ($error)) { ?>
                        <li class="">
                            <span style="color: red"> <?= $error; ?></span>
                        </li>
                    <?php } ?>
                </ol>
            </div>
            <div class="col-md-12">

                <div class="body collapse in" id="div1">
                    <form class="validate form-horizontal" role="form" id="form1" method="POST" action=""
                          enctype="multipart/form-data">
                        <input type="hidden" name="lang" value="<?= @$id_lang != null?@$id_lang:1; ?>">
                        <input type="hidden" name="edit" value="<?=@$edit->id;?>">
                        <div class="col-md-8" style="font-size: 12px">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title pull-left">Tổng quan</h3>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-success btn-xs" name="addcate"><i
                                                class="fa fa-check"></i> <?= @$btn_name; ?>
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label  class="col-sm-12">Tên danh mục <?= @$name_lang; ?></label>
                                        <div class="col-sm-12">
                                            <input type="text" class="validate[required] form-control input-sm " name="name"
                                                   value="<?=@$edit->name;?>" placeholder="Tên danh mục"  />
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-12">Alias</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control input-sm " name="alias"
                                                   value="<?=@$edit->alias;?>" placeholder="đường-link"  />
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-12">Danh mục cha <?= @$name_lang; ?></label>
                                        <div class="col-sm-12">
                                            <select name="parent" class="form-control input-sm">
                                                <option value="0">Lựa chọn</option>
                                                <?php view_news_cate_select($category,0,'',@$edit->parent_id);?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-12  ">Nội dung <?= @$name_lang; ?></label>
                                        <div class="col-sm-12">
                                            <textarea name="description" class="form-control input-sm" id="ckeditor"><?=@$edit->description;?></textarea>
                                            <?php echo display_ckeditor($ckeditor); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label  class="col-sm-12">Meta title <?= @$name_lang; ?></label>
                                        <div class="col-sm-12">
                                            <input type="text" name="title_seo" class="input-sm form-control" value="<?=@$edit->title_seo;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-12">Meta keyword <?= @$name_lang; ?></label>
                                        <div class="col-sm-12">
                                            <textarea name="keyword_seo" class="form-control input-sm" placeholder=""
                                                ><?=@$edit->keyword_seo;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-12">Meta description <?= @$name_lang; ?></label>
                                        <div class="col-sm-12">
                                            <textarea name="description_seo" class="form-control input-sm" placeholder=""
                                                      rows="4"><?=@$edit->description_seo;?></textarea>
                                        </div>
                                    </div>

                                    <div class=" ">
                                        <button type="submit" class="btn btn-success btn-xs pull-right" name="addcate">
                                            <i class="fa fa-check"></i> <?=$btn_name;?></button>
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
                                        <label  class="col-sm-12 hidden">Hiển thị</label>

                                        <div class="col-sm-12 row hidden">
                                            <label class="col-sm-12">
                                                <input type="checkbox" value="1" class="checkbox-inline"
                                                       name="home" <?= @$edit->home == 1 ? 'checked' : '' ?>>
                                                <?= _title_news_cate_home ?>
                                            </label>
                                            <label class="col-sm-12">
                                                <input type="checkbox" value="1" class=" checkbox-inline" name="hot" <?= @$edit->hot == 1 ? 'checked' : '' ?>>
                                                <?= _title_news_cate_hot ?>
                                            </label>
                                            <label class="col-sm-12">
                                                <input type="checkbox" value="1" name="focus" <?= @$edit->focus == 1 ? 'checked' : '' ?>>
                                                <?= _title_news_cate_focus ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group hidden">
                                        <label  class="col-sm-12">Icon</label>
                                        <div class="col-lg-12">
                                            <input type="hidden" name="icon" id="caticon" value="<?=@$edit->icon;?>"/>
                                            <div style="float: left;position: relative; <?= (@$edit->icon=='')?'display:none':'';?>">
                                                <div id="showcaticon" style="border: 1px #ddd dotted;padding: 10px;float: left">
                                                    <?= (@$edit->icon!='')?'<i class="'.@$edit->icon.'"></i>':'';?>
                                                </div>
                                                <div id="icon_option" style="position: absolute;top:5px;right:5px">
                                                    <?= (@$edit->icon!='')?'<a onclick="removeicon($(this))"><i class="fa fa-times" style="color: red;cursor: pointer"></i></a>':'';?>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="btn btn-xs btn-default pull-left"   data-item='#caticon'
                                                 data-toggle="modal" data-target="#exampleModal">
                                                Chọn icon</div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-12">Ảnh</label>
                                        <div class="col-sm-12">
                                            <input type="file" name="userfile"  id="input_img" onchange="handleFiles()" />

                                            <div>
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
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <?=$iconmodal;?>

    </div>

</div>