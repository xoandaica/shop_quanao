<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="">
                <ol class="breadcrumb">
                    <li>
                         <a href="<?= base_url('vnadmin') ?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?=base_url('vnadmin/project/projects')?>">
                        Danh sách <?= _title_project?>  <?= @$name_lang; ?>
                        </a>
                    </li>
                    <li >
                        <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a>
                    </li>
                    <?= @$images_lang; ?>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="row" style="padding-bottom: 15px">
                    <div class="col-md-2" style="padding-bottom: 10px">
                        <a href="<?= base_url('vnadmin/project/add') ?>" class="btn btn-success btn-sm">
                             <i class="fa fa-plus"></i> Thêm
                        </a>
                    </div>
                    <div class="col-sm-12" >
                        <form action="" method="get">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    <input name="code" type="search" value="<?=$this->input->get('code');?>"
                                           placeholder="Mã <?= _title_project?>..."
                                           class="form-control input-sm">
                                </div>
                                <div class="col-sm-2">
                                    <input name="name" type="search" value="<?=$this->input->get('name');?>"
                                           placeholder="Tìm tên <?= _title_project?>..."
                                           class="form-control input-sm">
                                </div>
                                <div class="col-sm-2">
                                    <select name="cate" class="input-sm form-control">
                                        <option value="">Danh mục</option>
                                        <?php view_product_cate_select2($cate,0,'',@$this->input->get('cate'));?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select name="view" class="input-sm form-control" >
                                        <option value="">Hiển thị</option>
                                        <option value="project_home" <?=$this->input->get('view')=='project_home'?'selected':'';?> ><?=_title_project_home;?></option>
<!--                                        <option value="project_hot" --><?//=$this->input->get('view')=='project_hot'?'selected':'';?><!-->--><?//=_title_project_hot;?><!--</option>-->
<!--                                        <option value="project_focus" --><?//=$this->input->get('view')=='project_focus'?'selected':'';?><!-->--><?//=_title_project_focus;?><!--</option>-->
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-sm btn-default">
                                        <i class="fa fa-search"></i>  Tìm kiếm
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <script>
                            $(function () {
                                $('[data-toggle="tooltip"]').tooltip()
                            })
                        </script>
                        <style>
                            .view_color{width: 10px; height: 10px;float: left;margin-top: 5px;cursor: pointer}
                        </style>

                    </div>
                </div>
                <div class="">
                    <div class="clear"></div>
                    <table class="table  table-hover table-bordered">
                        <tr>
                            <th width="2%">#</th>
                            <th width="8%">Ảnh</th>
                            <th class="hidden" width="10%">Ảnh trang chủ</th>
                            <th class="hidden" width="10%">Ảnh trang danh mục</th>
                            <th >Tên <?= _title_project?></th>
                            <th width="14%">Danh mục</th>
                            <th width="8%" class="display_none">Trạng thái</th>
                            <th width="6%">Hiển thị</th>
                            <th width="10%">Action</th>
                        </tr>
                        <?php if (isset($project_list)) {
                            $s=1;
                            foreach ($project_list as $v) {
                                ?>
                                <tr>
                                    <td><?= $s++; ?></td>
                                    <td>
                                        <?php if (file_exists($v->project_image)) { ?>
                                            <img src="<?= base_url(@$v->project_image) ?>" style="width: 65px; ">
                                        <?php } else echo 'No image'; ?>
                                    </td>
                                    <td class="hidden">
                                        <?php if (file_exists($v->project_image2)) { ?>
                                            <img src="<?= base_url(@$v->project_image2) ?>" style="width: 65px; ">
                                        <?php } else echo 'No image'; ?>
                                    </td>
                                    <td class="hidden">
                                        <?php if (file_exists($v->project_image3)) { ?>
                                            <img src="<?= base_url(@$v->project_image3) ?>" style="width: 65px; ">
                                        <?php } else echo 'No image'; ?>
                                    </td>
                                    <td> <?= @$v->project_name ?></td>
                                    <td>
                                    <?php foreach($cate as $cat){
                                        if($v->category_id == $cat->id){ ?>
                                      <?= @$cat->name; ?>
                                    <?php break; } }?>
                                    </td>
                                    <td>
                                        <div data-toggle="tooltip" data-placement="top" title="<?=_title_project_home;?>"
                                             data-value="<?=$v->id;?>" data-view="project_home"
                                        class='view_color' style='border: 1px solid #000088;margin-right: 10px;<?=($v->project_home == 1)?'background:#000088':'';?>'></div>

                                        <div data-toggle="tooltip" data-placement="top" title="<?=_title_project_hot;?>"
                                             data-value="<?=$v->id;?>" data-view="project_hot"
                                        class='view_color display_none' style='border: 1px solid #ff0000;margin-right: 10px;<?=($v->project_hot == 1)?'background:#ff0000':'';?>'></div>

                                        <div data-toggle="tooltip" data-placement="top" title="<?=_title_project_focus;?>"
                                             data-value="<?=$v->id;?>" data-view="project_focus"
                                        class='view_color hidden' style='border: 1px solid #008855;margin-right: 10px;<?=($v->project_focus == 1)?'background:#008855':'';?>'></div>
                                    </td>
                                    <td>
                                        <div style="text-align: center; " class="action">
                                            <a href="<?= base_url('vnadmin/project/edit/' . $v->id) ?>"
                                               class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>
                                            <a href="<?= base_url('vnadmin/project/images/' . $v->id) ?>"
                                               class="btn btn-xs btn-default" title="Ảnh dự án"  ><i class="fa fa-image"></i></a>

                                            <a href="<?= base_url('vnadmin/project/delete/' . $v->id) ?>"
                                               onclick="return confirm('Bạn có chắc chắn muốn xóa dự án ?')"  data-title="xóa dự án"
                                               class="btn btn-xs btn-danger"title="Xóa" style="color: #fff"><i class="fa fa-times"></i> </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                        } ?>
                    </table>
                    <script>
                        function send_content(id){
                            var baseurl = $("#baseurl").val();
                            var form_data = {
                                id: id
                            };
                            $.ajax({
                                url: baseurl+"admin/project/getrow",
                                type: 'POST',
                                dataType: 'json',
                                data: form_data,
                                success: function (rs) {
                                    send_posst(rs);
                                }
                            });
                        }

                        function send_posst(data){
                            var baseurl = $("#baseurl").val();
                            var form_data = {
                                name:data.name,
                                addnews:'1'
                            };
                            $.ajax({
                                url: baseurl+"admin/project/addpro",
                                type: 'POST',
                                dataType: 'json',
                                data: form_data,
                                success: function (rs) {

                                }
                            });
                        }

                        $('.view_color').click(function(){
                            var color = $( this ).css( "border-color" );
                            var background = $( this ).css( "background-color" );

                            var baseurl = $("#baseurl").val();
                            var form_data = {
                                id: $( this ).attr('data-value'),view:$( this ).attr('data-view')
                            };
                            $.ajax({
                                url: baseurl+"admin/project/update_view",
                                type: 'POST',
                                dataType: 'json',
                                data: form_data,
                                success: function (rs) {

                                }
                            });
                            if(color!=background){
                                $( this ).css( "background-color",color ) ;
                            }else{
                                $( this ).css( "background-color",'#fff' ) ;
                            }
                        })/*.hover(function(){
                            var color = $( this ).css( "border-color" );
                            var background = $( this ).css( "background-color" );


                            if(color!=background){
                                $( this ).css( "background-color",color ) ;
                            }else{
                                $( this ).css( "background-color",'#fff' ) ;
                            }
                        })*/
                    </script>
                </div>
                <div class="pagination  ">
                    <?php
                    echo $this->pagination->create_links(); // tạo link phân trang
                    ?>
                </div>
            </div>
        </div>


        <!-- modalAnimated -->
        <div class="modal fade" data-sound="off" id="modalAnimated" tabindex="-1" role="dialog" aria-labelledby="modalAnimatedLabel" aria-hidden="true">
            <div class="modal-dialog animated bounceIn">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="modalAnimatedLabel">Cập nhật số lượng</h4>
                    </div>
                    <div class="modal-body" id="getmodal">

                        <div class="clearfix"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-xs" onclick="$('#pro_img_frm').submit()">Cập nhật</button>
                        <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Hủy</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <script src="<?=base_url('assets/js/admin/product.js')?>"></script>

        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>