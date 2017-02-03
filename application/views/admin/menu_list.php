<link href="<?= base_url('assets/css/plugins/tabs_boostrap.css')?>" media="all" type="text/css" rel="stylesheet">
<link href="<?= base_url('assets/plugin/nestable/style_nestable.css')?>" media="all" type="text/css" rel="stylesheet">
<script src="<?= base_url('assets/plugin/nestable/jquery.nestable.js')?>"></script>
<script src="<?= base_url('assets/plugin/nestable/menu_list.js')?>"></script>
<script>

    function Save_Order_Menu(input_id) {
        var form_data = {
            name: $('#'+input_id).val()
        };
        $.ajax({
            url: "<?php echo site_url('admin/menu/Save_menu'); ?>",
            type: 'POST',
            dataType: 'json',
            data: form_data,
            success: function (msg) {
                alert('Câp nhật thành công!')
            }
        });
    }
    function active_tab(id) {
        $.ajax({
            url: "<?php echo site_url('admin/menu/active_tab'); ?>",
            type: 'POST',
            dataType: 'json',
            data: {id:id},
            success: function (msg) {

            }
        });
    }
</script>
<style>
    .nav-tabs li a{
        padding: 4px 15px !important;
    }
    .nestable-lists{
        border-top: none !important;
    }
    .action {
        position: relative;
    }

    .link_v {
        position: absolute;
        right: 0px;
        top: -34px;
    }

    .link_v  li a{
        padding: 3px 5px !important;
    }
    .link_v  li:hover a{
        text-decoration: underline;
    }
    .drop_action {
        padding: 3px 4px;
        border-radius: 0px;
    }

</style>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?= base_url('vnadmin') ?>">Admin</a>
                    </li>
                    <li>
                        <a href="<?= base_url('vnadmin/menu/menulist') ?>">Menus</a>
                    </li> 
                </ol>
            </div>
            <!--<div class="col-md-12">
                <div class="text-left" style="padding-bottom: 15px">
                    <a href="<?/*= base_url('vnadmin/menu/add') */?>">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm</button>
                    </a>
                </div>
            </div>-->
            <?php
            function view_menu_admin($data,$parent=0,$text=''){
                $i=1;
                foreach ($data as $k=>$v) {
                    $t=$i++;
                    if ($v->parent_id == $parent) {
                        unset($data[$k]);
                        $id = $v->id_menu;

                        echo '<li class="dd-item" data-id="' . $v->id_menu . '">
                                            <div class="dd-handle" data-items="id_'.$t.'">' . $v->name . '</div>

                                             <div class="action">
                                             <div class="btn-group link_v">
                                                <button class="btn dropdown-toggle drop_action" data-toggle="dropdown"><span class="caret"></span></button>
                                                <ul class="dropdown-menu" style="min-width: 40px !important; padding: 5px">
                                                  <li><a href="'.base_url('vnadmin/menu/edit/' . $v->id_menu.'?p='.$v->position.'').'" style="color: #0011ca">Sửa</a></li>
                                                  <li><a href="'.base_url('vnadmin/menu/delete/' . $v->id_menu).'"style="color: red"onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')" >Xóa</a></li>
                                                </ul>
                                              </div>
                                             </div>


                                            <ol class="dd-list">';

                        view_menu_admin($data, $id, $text . '');

                        echo '</ol>
                                        </li>';
                    }
                }
            }

            ?>

            <div class="col-md-12">
                <div class="panel with-nav-tabs panel-primary">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li <?php
                                if(!isset($_SESSION['tab_active'])||$_SESSION['tab_active']=='top'){
                                        echo 'class="active"';
                                }else echo ''; ?>
                                onclick="active_tab($(this).attr('data-items'))" data-items="top">
                                <a href="#tab1primary" data-toggle="tab">Menu Top</a>
                            </li>
                            <li style="display: none"  <?=($_SESSION['tab_active']=='left')?'class="active"':''; ?>

                                onclick="active_tab($(this).attr('data-items'))" data-items="left">
                                <a href="#tab2primary" data-toggle="tab">Menu Left</a>
                            </li>
                            <li style="display: none"  <?=($_SESSION['tab_active']=='right')?'class="active"':''; ?>
                                onclick="active_tab($(this).attr('data-items'))" data-items="right">
                                <a href="#tab3primary" data-toggle="tab">Menu Right</a>
                            </li>
                            <li <?=($_SESSION['tab_active']=='bottom')?'class="active"':''; ?>
                                onclick="active_tab($(this).attr('data-items'))" data-items="bottom">
                                <a href="#tab4primary" data-toggle="tab">Menu Bottom</a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade
                            <?php
                            if(!isset($_SESSION['tab_active'])||$_SESSION['tab_active']=='top'){
                                echo 'in active';
                            }else echo ''; ?>
                             " id="tab1primary">

                                    <div class="">

                                        <div class="cf nestable-lists">
                                            <!-- input chua mang thu tu menu-->
                                            <input id="nestable-output-top" name="value" type="hidden">
                                            <a class="btn btn-primary btn-sm  btn-xs" href="<?= base_url('vnadmin/menu/add?p=top') ?>">
                                                 <i class="fa fa-plus"></i> Thêm
                                            </a>
                                            <input type="button" value="Lưu vị trí" class="btn btn-xs btn-primary" name="ok"
                                                   onclick="Save_Order_Menu('nestable-output-top')">

                                            <div style="clear: both"></div>
                                            <div class="dd" id="nestable">
                                                <ol class="dd-list">
                                                    <?php view_menu_admin($menu_top); ?>
                                                </ol>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            <div class="tab-pane fade  <?=($_SESSION['tab_active']=='left')?'in active':''; ?>" id="tab2primary">
                                <div class="">

                                    <div class="cf nestable-lists">
                                        <!-- input chua mang thu tu menu-->
                                        <input id="nestable-output-left" name="value" type="hidden">
                                        <a class="btn btn-primary btn-sm  btn-xs" href="<?= base_url('vnadmin/menu/add?p=left') ?>">
                                            <i class="fa fa-plus"></i> Thêm
                                        </a>
                                        <input type="button" value="Lưu vị trí" class="btn btn-xs btn-primary" name="ok"
                                               onclick="Save_Order_Menu('nestable-output-left')">

                                        <div style="clear: both"></div>
                                        <div class="dd" id="nestable_left">
                                            <ol class="dd-list">
                                                <?php view_menu_admin($menu_left); ?>
                                            </ol>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade <?=($_SESSION['tab_active']=='right')?'in active':''; ?>" id="tab3primary">
                                <div class="">

                                    <div class="cf nestable-lists">
                                        <!-- input chua mang thu tu menu-->
                                        <input id="nestable-output-right" name="value" type="hidden">
                                        <a class="btn btn-primary btn-sm  btn-xs" href="<?= base_url('vnadmin/menu/add?p=right') ?>">
                                            <i class="fa fa-plus"></i> Thêm
                                        </a>
                                        <input type="button" value="Lưu vị trí" class="btn btn-xs btn-primary" name="ok"
                                               onclick="Save_Order_Menu('nestable-output-right')">

                                        <div style="clear: both"></div>
                                        <div class="dd" id="nestable_right">
                                            <ol class="dd-list">
                                                <?php view_menu_admin($menu_right); ?>
                                            </ol>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade <?=($_SESSION['tab_active']=='bottom')?'in active':''; ?>" id="tab4primary">
                                <div class="">

                                    <div class="cf nestable-lists">
                                        <!-- input chua mang thu tu menu-->
                                        <input id="nestable-output-bottom" name="value" type="hidden">
                                        <a class="btn btn-primary btn-sm  btn-xs" href="<?= base_url('vnadmin/menu/add?p=bottom') ?>">
                                            <i class="fa fa-plus"></i> Thêm
                                        </a>
                                        <input type="button" value="Lưu vị trí" class="btn btn-xs btn-primary" name="ok"
                                               onclick="Save_Order_Menu('nestable-output-bottom')">

                                        <div style="clear: both"></div>
                                        <div class="dd" id="nestable_bottom">
                                            <ol class="dd-list">
                                                <?php view_menu_admin($menu_bottom); ?>
                                            </ol>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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
