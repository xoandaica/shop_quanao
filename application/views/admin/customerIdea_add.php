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
                        <a href="<?=base_url('vnadmin/personnel/personnels')?>">Ý kiến khách hàng</a>
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
                                            Tên Khách hàng :
                                        </label>
                                        <div class="col-sm-12">
                                            <input type="text" class="validate[required] form-control input-sm " name="name"
                                                   value="<?=@$edit->name;?>" placeholder=""  />
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label  class="col-sm-12">Nội dung:</label>
                                        <div class="col-sm-12">
                                            <textarea name="description" class="form-control input-sm" placeholder=""
                                                      rows="5"><?=@$edit->description;?></textarea>
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
                                        </div>
                                    </div>
                                    <div class="form-group" style="background: url('')">
                                        <label  class="col-sm-12">Ảnh đại diện:</label>
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
    </div>
</div>