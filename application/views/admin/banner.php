<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?= base_url('vnadmin') ?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url('vnadmin/imageupload/banners') ?>">Banner</a>
                    </li>

                </ol>
            </div>
            <div class="col-md-12">

                <div class="clear"></div>
                <div class="" style="padding-bottom: 15px">
                    <div class=" " style="padding-bottom: 10px">
                        <a href="<?= base_url('vnadmin/imageupload/banner_add') ?>" class="btn btn-success btn-xs">
                            <i class="fa fa-plus"></i> Thêm
                        </a>
                    </div>
                </div>


                <div class="col-sm-12">
                    <form action="" method="get" class="row">
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input name="title" type="search" value="<?= $this->input->get('title'); ?>"
                                       placeholder="Tiêu đều"
                                       class="form-control input-sm">
                            </div>
                            <div class="col-sm-2">
                                <select name="p" class="input-sm form-control">
                                    <option value="">Vị trí</option>
                                    <?php
                                    foreach ($type as $k => $t) {
                                        ?>
                                        <option
                                            value="<?= $k; ?>" <?= $this->input->get('p') == $k ? 'selected' : '';; ?>><?= $t; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-2  " style="display: none">
                                <select name="lang" class="input-sm form-control">

                                    <option value="">Ngôn ngữ</option>
                                    <?php foreach ($datalang as $val) {
                                        $select = '';
                                        if ($val->id == $this->input->get('lang')) {
                                            $select = 'selected';
                                        }

                                        echo '<option value="' . $val->id . '" ' . $select . '>' . $val->name . '</option>';
                                    }?>

                                </select>
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-sm btn-default">
                                    <i class="fa fa-search"></i> Tìm kiếm
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                <div class="table-striped" style="overflow-x: auto">
                    <div class="clearfix"></div>
                    <table class="table table-bordered">
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh</th>
                            <th>Vị trí</th>
                            <th>Sắp xếp</th>
                            <th>Target</th>
                            <th class="text-center">#</th>
                        </tr>
                        <?php if (isset($list)) {
                            $stt = 1;
                            foreach ($list as $v) {
                                ?>
                                <tr>
                                    <td width="3%"><?= $stt++; ?></td>
                                    <td><?= @$v->title ?></td>
                                    <td width="10%"><img style="max-width: 100%; max-height: 100px; min-width: 50px"
                                                         src="<?= base_url($v->link); ?>" alt=""/></td>
                                    <td width="18%"><?= @$type[@$v->type]; ?></td>
                                    <td width="5%">
                                        <input type="number"  onchange="banner_sort($(this))" value="<?= @$v->sort ?>"
                                               data-item='<?= @$v->id; ?>' style="width: 55px">
                                    </td>
                                    <td width="5%"><?= @$v->target ?></td>

                                    <td width='10%' class="text-center">

                                        <a class="btn btn-xs btn-default"
                                           href="<?= base_url('vnadmin/imageupload/banner_edit/' . $v->id) ?>"><i
                                                class="fa fa-pencil"></i> </a>

                                        <a class="btn btn-xs btn-danger"
                                           href="<?= base_url('vnadmin/imageupload/delete/' . $v->id) ?>" title="Xóa"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                                                class="fa fa-times"></i> </a>

                                    </td>
                                </tr>
                            <?php
                            }
                        } ?>
                    </table>
                </div>
                <div class="pagination  ">
                    <?php
                    echo $this->pagination->create_links(); // tạo link phân trang
                    ?>
                </div>
            </div>
        </div>

        <script>
            function banner_sort(s) {
                var baseurl = $("#baseurl").val();
                var form_data = {
                    id: s.attr('data-item'), sort: s.val()
                };
                $.ajax({
                    url: baseurl + "admin/imageupload/banner_sort",
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