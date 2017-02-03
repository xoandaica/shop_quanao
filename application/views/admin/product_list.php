<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="">
                <ol class="breadcrumb">
                    <li>
                         <a href="<?= base_url('vnadmin') ?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?=base_url('vnadmin/product/products')?>">
                        Danh sách <?= _title_product?><?= @$name_lang; ?>
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
                        <a href="<?= base_url('vnadmin/product/add') ?>" class="btn btn-success btn-sm">
                             <i class="fa fa-plus"></i> Thêm
                        </a>
                      <!--  <a href="<?/*= base_url('admin/product/product_saler') */?>" class="btn btn-success btn-sm">
                             <i class="fa fa-plus"></i> Bán hàng
                        </a>-->
                    </div>
                    <div class="col-sm-12" >
                        <form action="" method="get">
                            <div class="form-group row">
                                <div class="col-sm-2 hidden">
                                    <input name="code" type="search" value="<?=$this->input->get('code');?>"
                                           placeholder="Mã sản phẩm..."
                                           class="form-control input-sm">
                                </div>
                                <div class="col-sm-2">
                                    <input name="name" type="search" value="<?=$this->input->get('name');?>"
                                           placeholder="Tìm tên <?= _title_product?>..."
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
                                        <option value="home" <?=$this->input->get('view')=='home'?'selected':'';?> ><?=_title_product_home;?></option>
<!--                                        <option value="hot" --><?//=$this->input->get('view')=='hot'?'selected':'';?><!-->--><?//=_title_product_hot;?><!--</option>-->
<!--                                        <option value="focus" --><?//=$this->input->get('view')=='focus'?'selected':'';?><!-->--><?//=_title_product_focus;?><!--</option>-->
<!--                                        <option value="vip" --><?//=$this->input->get('view')=='vip'?'selected':'';?><!-->--><?//=_title_product_coupon;?><!--</option>-->
<!--                                        <option value="coupon" --><?//=$this->input->get('view')=='coupon'?'selected':'';?><!-->Khuyến mại</option>-->
<!--                                        <option value="status" --><?//=$this->input->get('view')=='status'?'selected':'';?><!-->SP còn hàng</option>-->
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
                            <th >Tên <?= _title_product?></th>
                            <th width="14%">Danh mục</th>
<!--                            <th width="8%">Số lượng</th>-->
                            <th class="hidden"  width="8%">Trạng thái</th>
                            <th class="" width="6%">Hiển thị</th>
                            <th width="10%">Action</th>
                        </tr>
                        <?php if (isset($prolist)) {
                            $s=1;
                            foreach ($prolist as $v) {
                                ?>
                                <tr>
                                    <td><?= $s++; ?></td>
                                    <td>
                                        <?php if (file_exists($v->image)) { ?>
                                            <img src="<?= base_url(@$v->image) ?>" style="width: 65px; ">
                                        <?php } else echo 'No image'; ?>
                                    </td>
                                    <td>
                                        <?= @$v->name ?>

                                    </td>
                                    <td>
                                    <?php foreach($cate as $cat){
                                        if($v->category_id == $cat->id){ ?>
                                      <?= @$cat->name; ?>
                                    <?php break; } }?>
                                    </td>
                                    <td style="display: none">
                                        <?= @$v->counter ?>
                                        <a href="#" class="pull-right" onclick="get_product_data($(this))"
                                              data-item="<?=$v->id;?>"
                                           data-toggle="modal" data-target="#modalAnimated"

                                            ><i class="fa fa-plus"></i></a>
                                    </td>
                                    <td class="hidden">
                                        <div data-toggle="tooltip" data-placement="top" title='<?=($v->status == 0)?'Hết Hàng':'';?><?=($v->status == 1)?'Còn Hàng':'';?>'
                                             data-value="<?=$v->id;?>" data-view="status"
                                             class='view_color' style='border: 1px solid #C3C3C3;padding: 10px;
                                             width: auto;padding:5px;text-align: center;height: auto;color: rgb(125, 33, 0);background: #fff;
                                        <?=($v->status == 1)?'background:#C3C3C3;color: rgb(125, 33, 0)':'';?>'>
                                            <?=($v->status == 0)?'Hết Hàng':'';?><?=($v->status == 1)?'Còn Hàng':'';?>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div data-toggle="tooltip" data-placement="top" title="<?=_title_product_home;?>"
                                             data-value="<?=$v->id;?>" data-view="home"
                                        class='view_color' style='border: 1px solid #000088;margin-right: 10px;<?=($v->home == 1)?'background:#000088':'';?>'></div>

                                        <div data-toggle="tooltip" data-placement="top" title="<?=_title_product_hot;?>"
                                             data-value="<?=$v->id;?>" data-view="hot"
                                        class='view_color hidden' style='border: 1px solid #ff0000;margin-right: 10px;<?=($v->hot == 1)?'background:#ff0000':'';?>'></div>

                                        <div data-toggle="tooltip" data-placement="top" title="<?=_title_product_focus;?>"
                                             data-value="<?=$v->id;?>" data-view="focus"
                                        class=' view_color hidden' style='border: 1px solid #008855;margin-right: 10px;<?=($v->focus == 1)?'background:#008855':'';?>'></div>

                                        <div data-toggle="tooltip" data-placement="top" title="vip"
                                             data-value="<?=$v->id;?>" data-view="vip"
                                        class='view_color display_none' style='border: 1px solid #A90077;margin-right: 10px;<?=($v->vip == 1)?'background:#B30056':'';?>'></div>

                                        <div data-toggle="tooltip" data-placement="top" title="Khuyến mại"
                                             data-value="<?=$v->id;?>" data-view="coupon"
                                        class='view_color display_none' style='border: 1px solid rgb(2, 125, 187);margin-right: 10px;<?=($v->coupon == 1)?'background:rgb(0, 132, 132)':'';?>'></div>
                                    </td>
                                    <td>
                                        <div style="text-align: center; " class="action">

                                                    <a href="<?= base_url('vnadmin/product/edit/' . $v->id) ?>"
                                                       class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>

                                                    <a href="<?= base_url('vnadmin/product/images/' . $v->id) ?>"
                                                       class="btn btn-xs btn-default" title="Ảnh sản phẩm"  ><i class="fa fa-image"></i></a>

                                                    <a href="<?= base_url('vnadmin/product/delete/' . $v->id) ?>"
                                                       data-confirm="Bạn có chắc chắn muốn xóa?"  data-title="Xóa sản phẩm"
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
                                url: baseurl+"admin/product/getrow",
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
                                url: baseurl+"admin/product/addpro",
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
                                url: baseurl+"admin/product/update_view",
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