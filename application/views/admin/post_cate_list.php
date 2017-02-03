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
                        <a href="<?= base_url('vnadmin/raovat/raovat_list')?>">Rao vặt</a>
                    </li>
                </ol>
            </div>
            <div class="col-md-12">

                <div class="text-right" style="padding-bottom: 15px">
                    <a href="<?= base_url('vnadmin/raovat/cat_raovat_add') ?>">
                        <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Thêm</button>
                    </a>
                </div>

                <div class="table-striped">
                    <table class="table">
                        <tr>
                            <th width="60%">Tên</th>
                            <th width="20%">Ảnh</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                        <?php
                        view_post_cate_table($cate,0,'');
                         ?>

                    </table>
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