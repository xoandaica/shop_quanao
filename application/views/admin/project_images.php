<link rel="stylesheet" href="<?= base_url('assets/plugin/ValidationEngine/style/validationEngine.jquery.css')?>">
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-en.js')?>" charset="utf-8"></script>
<script src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js')?>"></script>
<script>
    $(document).ready(function(){
        $(".validate").validationEngine();
    });
</script>
<div id="page-wrapper">

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?=base_url('vnadmin')?>">Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url('vnadmin/project/projects') ?>">Danh sách dự án  <?= @$name_lang; ?></a>
                    </li>
                    <li>
                        <a href="<?= base_url('vnadmin/project/images') ?>">Hình ảnh</a>
                    </li>
                    <?= @$images_lang;?>
                </ol>
            </div>
            <div class="clear"></div>
           <!-- <div class="col-md-12">
                <?php /*echo form_open_multipart(base_url('vnadmin/product_images/' . $id)); */?>
                <div class="col-md-3">
                    <input name="userfile[]" id="userfile" type="file" multiple="" class="form-control"/>
                </div>
                <div class="col-md-1">
                    <input type="submit" value="upload" class="btn btn-success"/>
                </div>
                <div style="padding-top: 5px;   font-style: italic;">
                    (Note: Bạn có thể chọn nhiều ảnh Upload cùng 1 lúc.)
                </div>
                <?php /*echo form_close() */?>
            </div>-->
            <div class="col-md-12">
                <button   class="btn btn-success btn-sm" data-toggle="modal" data-target=".bs-example-modal-sm-up">
                    <i class="fa fa-plus"></i> Thêm ảnh
                </button>
            </div>

            <!-- UPLOAD Small modal -->
            <div class="modal fade bs-example-modal-sm-up"   tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="panel panel-success" >
                            <div class="panel-heading">
                                <div class="panel-title"  >Thêm ảnh</div>
                            </div>
                            <div style="padding-top:30px" class="panel-body" id="getmodal">
                            <div class="row">
                                <form action="<?= base_url('vnadmin/project/images/' . $id) ?>" method="post"
                                      class="validate"
                                      accept-charset="utf-8" enctype="multipart/form-data">

                                    <div class="col-xs-12" style="margin-bottom: 10px">
                                        <input name="title" id="userfile" type="text" placeholder="Tiêu đề"
                                               class="  form-control input-sm"/>
                                    </div>
                                    <div class="col-md-12">
                                        <input name="userfile[]" id="userfile" type="file" class="validate[required]  "/>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <input name ="Upload"  type="submit" value="Upload" class="btn btn-success btn-xs"/>
                                    </div>

                                </form>

                                <!---->

                            </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- Page Heading -->



            <br>
            <br>

            <div class="col-md-12">
                <table class="table table-hover">
                    <tr>
                        <th width='5%'>STT</th>
                        <th width='20%'>Ảnh</th>
                        <th >Tiêu đề</th>
                        <th width='10%'></th>
                    </tr>
                    <?php if (isset($pro_image)&& !empty($pro_image)) {
                        $s=1;
                        foreach ($pro_image as $v1) {
                            ?>
                            <tr>
                                <td><?= $s++; ?></td>
                                <td>
                                    <?php if ($v1->link != null) { ?>
                                        <img src="<?= base_url($v1->link) ?>" style="width: 80px">
                                    <?php } else {
                                        echo '';
                                    } ?>
                                </td>
                                <td><?= $v1->name; ?></td>

                                <td>
                                    <div class="btn-group btn-group-xs">
                                        <a onclick="getModal(<?=$v1->img_id;?>)"
                                           data-toggle="modal" data-target=".bs-example-modal-sm-up"
                                           class="btn btn-xs btn-default" title="Sửa"><i class="fa fa-pencil"></i></a>

                                        <a href="<?= base_url('vnadmin/project/delete_img/' . $v1->img_id) ?>"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                           class="btn btn-xs btn-danger" title="Xóa" style="color: #fff">
                                            <i class="fa fa-times"></i> </a>

                                    </div>

                                </td>
                            </tr>
                        <?php
                        }
                    }?>

                </table>
            </div>
            <div class="pagination">
                <?php
                echo $this->pagination->create_links(); // tạo link phân trang
                ?>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <input type="hidden" id="baseurl" value="<?=base_url();?>">
    <input type="hidden" id="id_product" value="<?=$id;?>">
    <script type="text/javascript">
        function getModal(id) {
            var baseurl = $('#baseurl').val();
            var id_product = $('#id_product').val();


            $.ajax({
                type: "POST",
                dataType: 'json',
                url: baseurl + 'admin/project/popupdata',
                data: {id:id},
                success: function (rs) {
                    if(rs.link!=null){
                        var img='<img src="'+baseurl+rs.link+'" style="width:100px; margin-top:5px"/>';
                    }else var img='';

                    var sc = '<form action="'+baseurl+'vnadmin/project/images/'+id_product+'" method="post"\
                        accept-charset="utf-8" enctype="multipart/form-data">\
                        <input name="edit"  type="hidden" value="'+id+'"/>\
                        <div class="col-xs-10" style="margin-bottom: 10px">\
                        <input name="title" id="userfile" type="text" value="'+rs.name+'"\
                        class="form-control input-sm"/>\
                        </div>\
                        <div class="col-md-10">\
                        <input name="userfile[]" id="userfile" type="file"/>'+img+'\
                        \
                        </div>\
                        <div class="col-md-2">\
                        <input type="submit" value="Upload" name ="Upload" class="btn btn-success btn-xs"/>\
                        </div>\
                        </form>';


                    $("#getmodal").empty();
                    $("#getmodal").html(sc);
                    remove_val();
                }
            })
        }
        function remove_val(){
            if($('.form-control').val()=='undefined'){
                $('.form-control').attr('value','');
            }
        }
    </script>

</div>