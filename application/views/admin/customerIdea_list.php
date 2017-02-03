<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?= base_url('vnadmin') ?>">Admin</a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('vnadmin/customerIdea/customerIdeas') ?>">Ý kiến khách hàng </a>
                    </li> 
                    <?= @$images_lang; ?>
                </ol>
            </div>
            <div class="col-md-12">

                <div class="" style="padding-bottom: 15px">
                    <a href="<?= base_url('vnadmin/customerIdea/add') ?>" class="btn btn-success btn-sm">
                         <i class="fa fa-plus"></i> Thêm
                    </a>
                </div>

                <div class=" ">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th width="7%">Sắp xếp</th>
                            <th  >Tên</th>
                            <th width="20%">Ảnh</th>
                            <th width="6%">Hiển thị</th>
                            <th width="8%" class="text-center">Action</th>
                        </tr>
                        <?php foreach($cate as $v){
                            $id = $v->id;
                            if(isset($v->image)&&file_exists($v->image)){
                                $img="<img src='".base_url($v->image)."' style='height:40px; max-width:100px'/>";
                            }else $img='';

                            if(isset($v->image2)&&file_exists($v->image2)){
                                $img2="<img src='".base_url($v->image2)."' style='height:40px; max-width:100px'/>";
                            }else $img2='';

                            ($v->home == 1)?$home='background:#000088':$home='';
                            ($v->focus == 1)?$focus='background:#008855':$focus='';


                            echo "<tr>
                <td>
                    <input type='number' value='".@$v->sort."' data-item='".$v->id."' onchange='cat_sort($(this))' style='width: 45px; padding: 2px;border:1px solid #ddd'/>
                </td>
                <td>".$v->name."</td>
                <td>$img $img2</td>
                <td class=\"text-center\">



                 <div data-toggle='tooltip' data-placement='top' title='"._title_product_cate_home."'
                    data-value='$v->id' data-view='home'
                    class='view_color' style='border: 1px solid #000088;margin-right: 10px; ".$home."'></div>

                 <div data-toggle='tooltip' data-placement='top' title='"._title_product_cate_focus."'
                    data-value='$v->id' data-view='focus'
                    class='view_color display_none' style='border: 1px solid #008855;margin-right: 10px;".$focus." '></div>

                </td>


            <td class='text-center'>
            <a href='".base_url('vnadmin/customerIdea/edit/' . $v->id)."'
                    class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>
            <a href='".base_url('vnadmin/customerIdea/delete/' . $v->id)."'
                   onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                   class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                </td>
            </tr>";

                   } ?>
                    </table>
                </div>
            </div>
        </div>
        <style>
            .view_color{width: 10px; height: 10px;float: left;margin-top: 5px;cursor: pointer}
        </style>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })


            $('.view_color').click(function(){
                var color = $( this ).css( "border-color" );
                var background = $( this ).css( "background-color" );

                var baseurl = $("#baseurl").val();
                var form_data = {
                    id: $( this ).attr('data-value'),view:$( this ).attr('data-view')
                };
                $.ajax({
                    url: baseurl+"admin/customerIdea/update_cat_view",
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
            });

            function cat_sort(s){
                var baseurl = $("#baseurl").val();
                var form_data = {
                    id: s.attr('data-item'),sort:s.val()
                };
                $.ajax({
                    url: baseurl+"admin/customerIdea/cat_sort",
                    type: 'POST',
                    dataType: 'json',
                    data: form_data,
                    success: function (rs) {

                    }
                });
            }
        </script>
        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>