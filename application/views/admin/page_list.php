<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?= base_url('vnadmin')?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?= base_url('vnadmin/pages/pages')?>">Pages</a>
                    </li>
                    <?= @$images_lang; ?>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="text-left" style="padding-bottom: 15px">
                    <a href="<?= base_url('vnadmin/pages/add')?>" class="btn btn-success btn-xs">
                         <i class="fa fa-plus"></i> Thêm
                    </a>
                </div>
                <div class="">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th width="3%" class="text-center">STT</th>
                            <th>Tiêu đề</th>
                            <th width="10%">Ảnh</th>
                            <th class="hidden" width="6%">Hiển thị</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                        <?php if(isset($pagelist)){
                            $i=1;
                            foreach($pagelist as $v){?>

                                <tr>
                                    <td class="text-center"><?= $i++;?></td>
                                    <td><?= @$v->name?></td>
                                    <td>
                                        <?php if(file_exists($v->icon)){?>
                                        <img src="<?= base_url().@$v->icon?>" style="max-width: 100px; max-height: 80px">
                                        <?php }?>
                                    </td>
                                    <td class="text-center hidden">
                                        <div data-toggle="tooltip" data-placement="top" title="<?= _title_pages_home ?>"
                                             data-value="<?= $v->id; ?>" data-view="home"
                                             class='view_color '
                                             style='border: 1px solid #000088; <?= ($v->home == 1) ? 'background:#000088' : ''; ?>'></div>

                                        <div data-toggle="tooltip " data-placement="top" title="<?= _title_pages_hot ?>"
                                             data-value="<?= $v->id; ?>" data-view="hot"
                                             class='view_color display_none'
                                             style='border: 1px solid red; <?= ($v->hot == 1) ? 'background:red' : ''; ?>'>
                                        </div>

                                        <div data-toggle="tooltip" data-placement="top" title="<?= _title_pages_focus ?>"
                                             data-value="<?= $v->id; ?>" data-view="focus"
                                             class='view_color hidden'
                                             style='border: 1px solid #008855; <?= ($v->focus == 1) ? 'background:#008855' : ''; ?>'>
                                        </div>

                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('vnadmin/pages/edit/'.$v->id)?>" class="btn btn-xs btn-default">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="<?= base_url('vnadmin/pages/images/' . $v->id) ?>"
                                           class="btn btn-xs btn-default" title="Ảnh Pages"  ><i class="fa fa-image"></i></a>

                                        <a href="<?= base_url('vnadmin/pages/delete/'.$v->id)?>" class="btn btn-xs btn-danger">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </table>
                </div>
                <div class="pagination">
                    <?php
                    echo $this->pagination->create_links(); // tạo link phân trang
                    ?>
                </div>
            </div>
        </div>

        <script>
            $('.view_color').click(function(){
                var color = $( this ).css( "border-color" );
                var background = $( this ).css( "background-color" );

                var baseurl = $("#baseurl").val();
                var form_data = {
                    id: $( this ).attr('data-value'),view:$( this ).attr('data-view')
                };
                $.ajax({
                    url: baseurl+"admin/pages/update_view",
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
            })


            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <style>
            .view_color{width: 10px; height: 10px;margin-top: 5px;cursor: pointer; float: left;margin-right: 5px }
        </style>
        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>