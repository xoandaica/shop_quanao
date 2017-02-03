<link rel="stylesheet" href="<?= base_url('assets/plugin/ValidationEngine/style/validationEngine.jquery.css') ?>">
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-en.js') ?>"
        charset="utf-8"></script>
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js') ?>"></script>
<script>

    $(document).ready(function () {
        $(".validate").validationEngine();
    });

</script>
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
                        <a href="<?=base_url('vnadmin/product/products')?>">Danh sách Sản phẩm <?= @$name_lang; ?></a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('vnadmin/trademark/trademark_category') ?>">Thương hiệu</a>
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
                    <form class="form-horizontal validate " role="form" id="form1" method="POST" action="" enctype="multipart/form-data" >
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
                                        <label  class="col-sm-12">Tên Thương hiệu <?= @$name_lang; ?>:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="validate[required] form-control input-sm " name="name"
                                                   value="<?=@$edit->name;?>" placeholder=""  />
                                            <input type="hidden" class="form-control input-sm " name="is_cate"
                                                   value="<?=$this->input->get('is_cat')==0?'0':'1';?>" placeholder=""  />
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
                                    <div class="form-group" >
                                        <label  class="col-sm-12">Danh mục sản phẩm:</label>
                                        <div class="col-sm-12">
                                            <select name="category_id" class="form-control input-sm">
                                                <option value="0">Lựa chọn</option>
                                                <?php   foreach ($cate_pro as $k=>$v) {
                                                        $edit_id=$edit->category_id;
                                                        $v->id==$edit_id?$selected='selected':$selected='';
                                                ?>
                                                        <option value="<?=$v->id; ?>" <?= $selected ?> ><?= $v->name; ?></option>
                                                        <?php
                                                        foreach ($cate_pro_sub as $sub) {
                                                            if ($sub->parent_id == $v->id) {
                                                            $edit_id=$edit->category_id;
                                                            $sub->id==$edit_id?$selected='selected':$selected='';
                                                            ?>
                                                            <option value="<?=$sub->id; ?>" <?= $selected ?> >&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;<?= $sub->name; ?></option>

                                                        <?php  }} ?>
                                                <?php } ?>
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
                                    <div class="form-group">
                                        <label  class="col-sm-12">Hiển thị:</label>

                                        <div class="col-sm-12">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="home" <?=@$edit->home==1?'checked':''?>>
                                                <?=_title_product_cate_home?>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="1" name="focus" <?=@$edit->focus==1?'checked':''?>>
                                                <?=_title_product_cate_focus?>
                                            </label>
                                            <!--<label >
                                    <input type="checkbox" value="1" name="hot" <?/*=@$edit->hot==1?'checked':''*/?>>
                                    <?/*=_title_product_cate_hot*/?>
                                </label>-->


                                        </div>
                                    </div>


                                    <div class="form-group">
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
                                    <div class="form-group">
                                        <label  class="col-sm-12">Ảnh icon :</label>
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


                                    <div class="form-group" style="display: none">
                                        <label  class="col-sm-12">Ảnh icon trang chủ:</label>
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