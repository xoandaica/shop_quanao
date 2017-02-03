<div id="page-wrapper">
<div class="container-fluid">
<!-- Page Heading -->
<div class="row">
<div class="col-sm-12">
    <ol class="breadcrumb">
        <li>
            <i class="fa fa-dashboard"></i> <a href="<?=base_url('vnadmin')?>">Dashboard</a>
        </li>
        <li>
            <a href="<?= base_url('vnadmin/menu/menulist') ?>">Menus</a>
        </li>
        <?php if (isset ($error)) { ?>
            <li class="">
                <span style="color: red"> <?= $error; ?></span>
            </li>
        <?php } ?>
    </ol>
</div>
<div class="col-md-12">
    <div class="body collapse in" id="div1">
        <form class="form-horizontal" role="form" id="form1" method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" value="<?=@$id_edit;?>">
            <div class="col-md-8" style="font-size: 12px">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">Tổng quan</h3>
                 <!--   <input type="hidden" name="lang" value="<?= @$id_lang != null?@$id_lang:1; ?>"> -->
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success btn-xs" name="addmenu"><i
                                class="fa fa-check"></i> <?= @$btn_name; ?>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                <div class="form-group">
                    <label  class="col-sm-12">Tên menu:</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control input-sm " name="title"
                               value="<?=@$edit->name;?>" placeholder="Tên menu"/>
                    </div>
                </div>
                <div class="form-group" >
                    <label  class="col-sm-12">Ngôn ngữ:</label>
                    <div class="col-sm-6">
                        <select class="form-control input-sm" name="lang" id="lang"
                         onchange="select_lang($(this).val(),$('#position').val())" >
                            <?php foreach(@$language as $v){
                                if(@$edit->lang==$v->id){
                                    $s='selected';
                                }else $s='';
                                echo "<option value='{$v->id}'".$s.">{$v->name}</option>";
                            }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-12">Menu cha:</label>
                    <div class="col-sm-6">
                        <select name="parent" class="form-control input-sm" id="parent_menu">
                            <option value="0">Lựa chọn</option>
                            <?php show_menu_select($menu,0,'',@$edit->parent_id);?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-12">Module:</label>
                    <div class="col-sm-6">
                        <!--<option value="news" /*<?= @$edit->module=='news'?'selected':''?>*/ >Tin tức</option>-->
                        <select name="module" id="sc_get" class="form-control input-sm">
                            <option value="0">Chọn module</option>
                            <option value="news" <?=@$edit->module=='news'?'selected':''?> >Tin bài</option>
                            <option value="products" <?=@$edit->module=='products'?'selected':''?> ><?= _title_product?></option>
                            <option value="projects" <?=@$edit->module=='projects'?'selected':''?> ><?= _title_project?></option>
                            <option value="pages" <?=@$edit->module=='pages'?'selected':''?> >Trang nội dung</option>
                            <option value="contact" <?=@$edit->module=='contact'?'selected':''?> >Liên hệ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-12">Trỏ đến:</label>
                    <?php
                    function show_cate_menu($cate,$parent=0,$text='',$module=null,$url=null){
                        foreach ($cate as $k=>$v) {
                            if (@$v->parent_id == $parent) {
                                unset($cate[$k]);
                                $id = $v->id;
                                $menu_url='';
                                switch ($module) {
                                    case 'products':
                                        $menu_url  =   strstr($url, '-pc',true);
                                        break;
                                    case 'projects':
                                        $menu_url  =   strstr($url, '-pj',true);
                                        break;
                                    case 'news':
                                        $menu_url  =   strstr($url, '-nc',true);
                                        break;
                                    case 'pages':
                                        $menu_url  =   strstr($url, '-page',true);
                                        break;
                                }
                                if($menu_url==$v->alias){
                                    $selected='selected';
                                }else{
                                    $selected='';
                                }

                                echo '<option value="'.$v->alias.'"  '.$selected.'>'.$text.$v->name.'</option>';

                                show_cate_menu($cate, $id, $text . '. &nbsp;&nbsp; ',$module,$url);
                            }
                        }
                    }
                    ?>
                    <div class="col-sm-6">
                        <select name="subcat" id="sc_show" class="form-control input-sm">
                            <?php show_cate_menu($cate_edit,0,'',@$edit->module,@$edit->url)?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-12">URL:</label>
                    <div class="col-md-12">
                        <input name="url" type="text" id="url_menu" class="form-control input-sm"
                               value="<?=@$edit->url;?>">
                        <input type="hidden" id="products" value="<?=$module_link['products'];?>">
                        <input type="hidden" id="projects" value="<?=$module_link['projects'];?>">
                        <input type="hidden" id="news" value="<?=$module_link['news'];?>">
                        <input type="hidden" id="pages" value="<?=$module_link['page'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-12">Mô Tả:</label>

                    <div class="col-sm-12">
                        <textarea name="description"
                                  class="form-control input-sm" placeholder="Mô tả" ><?=@$edit->description;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="text-right">
                            <button type="submit" class="btn btn-success btn-xs" name="addmenu"><i class="fa fa-check"></i>
                            <?=$btn_name;?>
                            </button>
                        </div>
                    </div>
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
                        <label  class="col-sm-12">Vị trí:</label>
                        <div class="col-sm-12">
                            <select name="position" class="form-control input-sm"
                                    onchange="select_lang($('#lang').val(),$(this).val())" id="position">
                                <option value="top"<?=(@$edit->position=='top'||@$position=='top')?'selected':''?>>Menu top</option>
                                <option value="left" <?=(@$edit->position=='left'||@$position=='left')?'selected':''?> >Menu left</option>
                                <option value="right" <?=(@$edit->position=='right'||@$position=='right')?'selected':''?>  >Menu right</option>
                                <option value="bottom" <?=(@$edit->position=='bottom'||@$position=='bottom')?'selected':''?> >Menu bottom</option>
                            </select>
                        </div>
                    </div>
                <div class="form-group">
                    <label  class="col-sm-12">Target:</label>
                    <div class="col-md-12">
                        <label class="radio-inline">
                            <input type="radio" name="target" value="" <?=(!isset($edit->target)||$edit->target=='')?'checked':'';?> />Tab hiện tại
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="target" value="_blank" <?=(@$edit->target=='_blank')?'checked':'';?>> Tab mới
                        </label>
                    </div>
                </div>
                <input type="hidden" id="baseurl" value="<?=base_url();?>">
                <div class="form-group">
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
                    <label  class="col-sm-12">Ảnh:</label>
                    <div class="col-sm-12">
                        <input type="file" name="userfile" id="input_img" onchange="handleFiles()" />
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
        </form>
    </div>
</div>
</div>
<?=$admin_showicon;?>
</div>
<!-- /.container-fluid -->
</div>
<script src="<?= base_url('assets/js/admin_menu.js')?>"></script>