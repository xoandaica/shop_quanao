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
                        <i class="fa fa-table"></i> Cập nhật banner
                    </li>
                    <?php if(isset ($error)){?>
                        <li class="">
                            <span style="color: red"> <?= $error;?></span>
                        </li>
                    <?php }?>
                </ol>
            </div>
            <div class="col-md-12">

                <div class="body collapse in" id="div1">
                    <form class="validate form-horizontal" role="form" id="form1" method="POST" action="" enctype="multipart/form-data" >
                        <input type="hidden" name="edit_id" value="<?=@$edit->id;?>">
                        <div class="form-group">
                            <label for="inputEmail1" class="col-sm-2 control-label">Tiêu đề:</label>
                            <div class="col-sm-5">
                                <input type="text" class="validate[required] form-control input-sm " name="title" placeholder="Tiêu đề..." value="<?=@$edit->title;?>" />
                            </div>
                        </div>
                        <div class="form-group display_none">
                            <label for="inputEmail1" class="col-sm-2 control-label">Hàng xách tay :</label>
                            <div class="col-sm-5">
                                <select name="session" class="form-control input-sm">
                                    <?php foreach($session_products as $session){?>
                                    <option value="<?= $session->id; ?>"
                                        <?= $session->id == @$edit->session?'selected':''; ?>><?= $session->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-sm-2 control-label">Vị trí:</label>
                            <div class="col-sm-5">
                                <select name="type" class="form-control input-sm">
                                    <?php
                                    foreach($type as $k=>$v){
                                        $select='';
                                        if($k==@$edit->type){
                                            $select='selected';
                                        } ?>
                                        <option  <?= $select ?> value="<?=$k;?>"><?=$v;?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group hidden">
                            <label  class="col-sm-2 control-label">Danh mục SP:</label>
                            <div class="col-sm-5">
                                <select name="cate" class="form-control input-sm">
                                    <option value="0">Lựa chọn</option>
                                    <?php view_product_cate_select($procate,0,'',@$edit->cate);?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group display_none">
                            <label  class="col-sm-2 control-label">Danh mục Dự án:</label>
                            <div class="col-sm-5">
                                <select name="idcat_project" class="form-control input-sm">
                                    <option value="0">Lựa chọn</option>
                                    <?php view_product_cate_select($project_category,0,'',@$edit->idcat_project);?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-sm-2 control-label">Url:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control input-sm "
                                       value="<?=@$edit->url;?>" name="url" placeholder="..."  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-sm-2 control-label">Target:</label>
                            <div class="col-sm-5">
                            <div class="row">
                            <label  class="col-sm-3  ">
                                <input type="radio"  name="target" value="_self"
                                    <?php if(@$edit->target=='_self'||@$edit->target==0||!isset($edit))echo 'checked=""'; else echo '';?>/>
                                Mặc định</label>

                            <label   class="col-sm-3  ">
                                <input type="radio"  name="target" value="_blank"
                                    <?=@$edit->target=='_blank'?'checked':'';?>/>
                                Tab mới
                            </label>

                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Ảnh:</label>
                            <div class="col-sm-2">
                                <input type="file" name="userfile"  id="input_img" onchange="handleFiles()" />

                                <?php
                                if(file_exists(@$edit->link)){
                                    echo '<img src="'.base_url($edit->link).'" id="image_review" >';
                                }else{
                                    echo '<img src="" id="image_review"  >';
                                }
                                ?>

                            </div>
                        </div>

                        <div class="form-group">
                        <div class="text-right col-sm-7">
                            <button type="submit" class="btn btn-success btn-xs" name="upload"><i class="fa fa-check"></i> <?=$btn_name;?></button>
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
