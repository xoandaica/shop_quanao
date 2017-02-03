
<script type="text/javascript" src="<?= base_url('assets/plugin/autonumber/autoNumeric.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugin/autonumber/jquery.number.js') ?>"></script>

<section class="container">
<div class="fix-list"></div>
<div class="menu-detail" style="margin-top: 50px;">
    <section class="cate-danh-muc">
        <a href="#">
            <p>Đăng tin</p>
        </a>
    </section>
</div><!---menu-detail--->
<div class="clearfix"></div>

<section class="col-xs-12">
<div class="row">
<section class="col-md-3  col-sm-12 col-xs-12">
    <div class="row">
        <section class="sidebar">
            <section class="sidebar_title">TRANG CÁ NHÂN</section>
            <ul style="background: #ffffff">
                <li>
                    <a href="<?= base_url('san-pham-quan-tam') ?>">
                        <i class="fa fa-check"></i>
                        Sản phẩm quan tâm
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('trang-ca-nhan') ?>">
                        <i class="fa fa-check"></i>
                        Tin rao vặt đã đăng
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('thong-tin-dat-hang') ?>">
                        <i class="fa fa-check"></i>
                        Danh sách đặt hàng
                    </a>
                </li>
            </ul>
        </section>
    </div><!--end row-->
</section>
<!---End .sidebar_box_1--->
<section class="col-md-9 col-sm-12 col-xs-12" >

    <?php

    function raovat_cate($data,$parent=0,$text='',$edit=null){

        foreach ($data as $k=>$v) {
            if ($v->parent_id == $parent) {
                unset($data[$k]);
                $id = $v->id;
                $v->alias==$edit?$selected='selected':$selected='';
                echo '<option value="'.base_url('ds-rao-vat/'.$v->alias).'" '.$selected.'>'.$text.$v->name.'</option>';

                raovat_cate($data, $id, $text . '. &nbsp;&nbsp; ',$edit);
            }
        }
    }

    ?>
   Danh mục:
    <select name="" id="danh_muc" onchange="change_cate($(this))">
        <option value="<?= base_url('trang-ca-nhan')?>">Tất cả</option>
        <?php raovat_cate($cate,0,'',$curent_cate);?>
    </select>

    <script>
        function change_cate(sender){
            window.location.href = sender.val();;
        }
    </script>
    <div id="loginbox" style="padding-top: 10px">

        <table class="table table-hover table-bordered">
            <tr>
                <th>STT</th>
                <th>Tiêu đề</th>
                <th>Ngày đăng</th>
                <th>Giá</th>
                <th>Chức năng</th>
            </tr>
            <?php if (isset($userslist)) {
                $s=1;
                foreach ($userslist as $v) {
                    ?>
                    <tr>
                        <td width="5%"><?=$s++; ?></td>
                        <td >
                            <a href="<?= base_url('rao-vat/'.@$v->alias); ?>">
                            <?= @$v->tieude ?> </a></td>


                        <td width="15%"
                            style="font-size: 12px"><?= date('d-m-Y H:i',$v->time); ?>
                        </td>
                        <td width="15%"
                            style="font-size: 12px">
                            <?= number_format($v->gia_m) ?>
                        </td>
                        <td width='15%' class="text-center">
                            <?php if($v->view==0){?>
                                <div class="btn-group btn-group-xs">
                                    <a href="<?= base_url('sua-tin/' . $v->id) ?>" title="sửa"
                                       class="btn btn-xs btn-primary" style="color: #fff" >
                                        <i class="fa fa-pencil"></i> </a>
                                </div>
                            <?php }?>


                            <div class="btn-group btn-group-xs">
                                <a href="<?= base_url('raovat/delete/' . $v->id) ?>" title="Xóa"
                                   class="btn btn-xs btn-danger" style="color: #fff"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                    <i class="fa fa-times"></i> </a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
            } ?>
        </table>
        <div class="pagination">
            <?php
            echo $this->pagination->create_links(); // tạo link phân trang
            ?>
        </div>

    </div><!-- .loginbox-->
</section>
<!---End Left------->
</div><!--end row-->
</section>
</section>


