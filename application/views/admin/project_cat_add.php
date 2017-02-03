<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?=base_url('vnadmin')?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="<?=base_url('vnadmin/project/projects')?>">Danh sách <?= _title_project?>  <?= @$name_lang; ?></a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('vnadmin/project/categories') ?>">Danh mục</a>
                    </li>
                    <li >
                        <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a>
                    </li>
                    <?= @$images_lang; ?>
                    <?php if(isset ($error)){?>
                        <li class="">
                            <span style="color: red"> <?= $error;?></span>
                        </li>
                    <?php }?>
                </ol>
            </div>
            <div class="col-md-12">

                <div class="body collapse in" id="div1">
                    <form class="form-horizontal" role="form" id="form1" method="POST" action="" enctype="multipart/form-data" >
                        <input type="hidden" name="edit" value="<?=@$edit->id;?>">
                        <input type="hidden" name="lang" value="<?= @$id_lang != null?@$id_lang:1; ?>">
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
                                        <label  class="col-sm-12">
                                            Tên Danh mục  <?= @$name_lang; ?>   :
                                        </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="validate[required] form-control input-sm " name="name"
                                                   value="<?=@$edit->name;?>" placeholder=""  />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label  class="col-sm-12">
                                            Alias
                                        </label>
                                        <div class="col-sm-12">
                                            <input type="text" class=" form-control input-sm " name="alias"
                                                   value="<?=@$edit->alias;?>" placeholder=""  />
                                        </div>
                                    </div>

                                    <div class="form-group hidden">
                                        <label  class="col-sm-12">
                                            Tên mô tả tiếng anh   :
                                        </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control input-sm " name="name_alias"
                                                   value="<?=@$edit->name_alias;?>" placeholder=""  />
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label  class="col-sm-12">Danh mục cha:</label>
                                        <div class="col-sm-12">
                                            <select name="parent" class="form-control input-sm">
                                                <option value="0">Lựa chọn</option>
                                                <?php view_product_cate_select($cate,0,'',$edit->parent_id);?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label  class="col-sm-12">Mô Tả:</label>
                                        <div class="col-sm-12">
                                            <textarea name="description" class="form-control input-sm" placeholder=""
                                                      rows="5"><?=@$edit->description;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-12">SEO title:</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="title_seo" class="input-sm form-control" value="<?=@$edit->title_seo;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-12">SEO keyword:</label>
                                        <div class="col-sm-12">
                                            <textarea name="keyword_seo" class="form-control input-sm" placeholder=""
                                                ><?=@$edit->keyword_seo;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-12">SEO description:</label>
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
                                        <label  class="col-sm-12">Thứ tự:</label>
                                        <div class="col-sm-12">
                                            <input type="number" name="sort" class="form-control input-sm" value="<?=$max_sort;?>" />
                                        </div>
                                    </div>

                                    <div class="form-group hidden">
                                        <label for="inputEmail1" class="col-sm-12">Màu:</label>
                                        <div class="col-sm-1 ">
                                            <div class="btn btn-sm btn-default" ><i
                                                    class="fa fa-check"></i></div>
                                        </div>
                                        <div class="col-sm-10 color1" id="color_input">
                                                <input name="color" type="text" id="hue-demo" class=" form-control color_picker minicolors-input input-sm"
                                                       data-control="hue" value="<?= @$edit->color; ?>" size="7">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label  class="col-sm-12">Hiển thị:</label>

                                        <div class="col-sm-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="home" <?=@$edit->home==1?'checked':''?>>
                                                <?=_title_project_home?>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <div class="clearfix"></div>
                                            <label class="checkbox-inline hidden">
                                                <input type="checkbox" value="1" name="focus" <?=@$edit->focus==1?'checked':''?>>
                                                <?=_title_project_focus?>
                                            </label>

                                        </div>
                                    </div>


                                    <div class="form-group display_none">
                                        <label  class="col-sm-12">Icon:</label>
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
                                    <div class="form-group hidden">
                                        <label  class="col-sm-12">Ảnh icon:</label>
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


                                    <div class="form-group hidden">
                                        <label  class="col-sm-12">Logo trang danh mục:</label>
                                        <div class="col-sm-12">
                                            <input type="file" name="userfile2"  id="input_img2" onchange="handleFiles2()" />

                                            <div>
                                                <?php
                                                if(file_exists(@$edit->image2)){
                                                    echo '<img src="'.base_url($edit->image2).'" id="image_review2">';
                                                }else{
                                                    echo '<img src="" id="image_review2">';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label  class="col-sm-12">Ảnh nền trang danh mục:</label>
                                        <div class="col-sm-12">
                                            <input type="file" name="userfile3"  id="input_img2" onchange="handleFiles2()" />

                                            <div>
                                               <?php  if(file_exists(@$edit->image3)){
                                                    echo '<img src="'.base_url($edit->image3).'" id="image_review2">';
                                                }else{
                                                    echo '<img src="" id="image_review2">';
                                                } ?>
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
<link rel="stylesheet" href="<?= base_url('assets/plugin/colorpicker/bootstrap-colorpicker.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/plugin/colorpicker/jquery.minicolors.css') ?>">
<script src="<?= base_url('assets/plugin/colorpicker/jquery.minicolors.min.js') ?>"></script>


<script type="text/javascript">
    // color
    $(document).ready(function () {
        $('.color_picker').each(function () {
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom left',
                change: function (hex, opacity) {
                    if (!hex) return;
                    if (opacity) hex += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(hex);
                    }
                },
                theme: 'bootstrap'
            });

        });
    });

</script>