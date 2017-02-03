<article class="article">
<div class="container">
<div class="row">
    <div class="cates-header">
        <div class="list-cates-hd" style="margin-left: 15px">
            <div class="break_crum box_title_x  w_100 text-uppercase">
                <a  class="back_link" href="<?= base_url(); ?>">Trang chủ</a>
                <i class="fa fa-angle-right" style="color: #17100a"></i>
                <a  class="back_link" href="">Thông tin cá nhân</a>
            </div>
        </div>
    </div>
</div>
<div class="row_p">
    <div class="pro_floo clearfix">
        <div class="col-md-2 hidden col-sm-2" style="width: 20%">
            <div class="row">
                <div class="acount_nav">
                    <ul>
                        <li>
                            <i class="fa fa-user"></i> &nbsp;
                            <a href="<?= base_url('thong-tin-ca-nhan') ?>">Quản lý tài khoản</a>
                        </li>
                        <li class="hidden">
                            <i class="fa fa-file-text-o"></i> &nbsp;
                            <a href="<?= base_url('acount-order')   ?>"> Đơn hàng của tôi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <style type="text/css">
            .acount_tit {
                font-size: 15px;
                font-weight: bold;
                display: none;
            }
            .infor_acount {
                border: 1px solid rgb(230, 230, 230);
                padding-top: 25px;
            }
            .infor_tit {
                margin-top: -34px;
                background-color: rgb(255, 255, 255);
                width: 30%;
                position: absolute;
                font-weight: bold;
                color: #644833;
            }
        </style>
        <div class="col-md-12 col-sm-12" style="margin-top: 15px;">
            <div class="acount_tit">Quản lý tài khoản: </div>
            <div class="clearfix-10"></div>
            <div class="row">
            <div class="infor_acount clearfix col-md-6  col-sm-6">
                <div class="infor_tit">Thông tin tài khoản</div>
                <div class="clearfix"></div>
                <form action="<?= base_url('thong-tin-ca-nhan') ?>" method="post"
                      class="validate form-horizontal" enctype="multipart/form-data" role="form">
                    <div class="123">
                        <div class="form-group">
                            <label class="col-sm-3">Tài khoản</label>
                            <label class="col-sm-9"><?= @$user_item->email; ?></label>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-3">Họ tên</label>
                            <div class="col-sm-9">
                                <input type="text" class="validate[required] form-control input-sm "
                                       name="fullname"
                                       value="<?= @$user_item->fullname; ?>" placeholder=""/>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group" style="display: none">
                            <label class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="validate[required] form-control input-sm "
                                       name="email"
                                       value="<?= @$user_item->email; ?>" placeholder=""/>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-3">Điện thoaị</label>
                            <div class="col-sm-9">
                                <input type="text" class="validate[required] form-control input-sm "
                                       name="phone"
                                       value="<?= @$user_item->phone; ?>" placeholder=""/>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-3">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm "
                                       name="address"
                                       value="<?= @$user_item->address; ?>" placeholder=""/>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-md-3">Giới tính</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <label class="checkbox-inline" style="text-transform: none">
                                        <input type="radio" value="122" name="cate_tour[]">
                                        Nam
                                    </label>
                                    <label class="checkbox-inline" style="text-transform: none">
                                        <input type="radio" value="122" name="cate_tour[]">
                                        Nữ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-3">Tình thành</label>
                            <div class="col-sm-9">
                                <select id="location5" onclick="change_province($(this).val())"
                                        class="input-sm  form-control validate[required]" name="province">
                                    <option value="0">--Chọn Tỉnh/Thành--</option>
                                    <?php
                                    foreach (@$province as $t) {
                                        ?>
                                        <option <?php if ($t->provinceid == $user_item->province) {
                                            echo 'selected="selected"';
                                        } ?> value="<?= $t->provinceid; ?>">
                                            <?= $t->name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-3">&nbsp;</label>
                            <div class="col-sm-9">
                                <button name="update_profiler" type="submit"
                                        class="btn btn-blue btn-sm pull-right" style="background: #644833 !important;">
                                    <div class="button-green" style="color: #FFF">
                                        <i class="icons icon-basket-2"></i>Cập nhật
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                    </div>
                </form>
            </div>
            <div class="infor_acount clearfix col-md-6 col-sm-6" style="border-left: 0">
                <div class="infor_tit">Thay đổi mật khẩu</div>
                <div class="clearfix"></div>
                <form action="<?= base_url('doi-mat-khau') ?>" method="post" class="validate form-horizontal"
                      role="form">
                    <div class="123">
                        <div class="form-group">
                            <label class="col-sm-4">Tài khoản</label>
                            <label class="col-sm-8"><?= @$user_item->email; ?></label>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-4">Mật khẩu cũ</label>
                            <div class="col-sm-8">
                                <div id="show_error_pass2"></div>
                                <input type="password" class="validate[required] form-control"
                                       onchange="check_pass($(this).val())"
                                       name="id" name="old_pass" placeholder="Mật khẩu cũ">
                                <input id="pass_check"  name="pass_check" value="1" type="hidden">
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-4">Mật khẩu mới</label>
                            <div class="col-sm-8">
                                <input type="password"
                                       class=" validate[required,custom[onlyLetterNumber,minSize[6]]] form-control"
                                       id="new_pass" name="new_pass" placeholder="Mật khẩu mới">
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-4">Xác nhận mật khẩu mới</label>
                            <div class="col-sm-8">
                                <input type="password" class="validate[required,equals[new_pass]] form-control"
                                       name="id" name="re_pass" placeholder="Nhập lại mật khẩu mới">
                            </div>
                        </div>
                        <div class="clearfix-5"></div>
                        <div class="form-group">
                            <label class="col-sm-4">&nbsp;</label>
                            <div class="col-sm-8">
                                <button name="update_pass" class="btn btn-blue btn-sm pull-right" style="background: #644833 !important;">
                                    <div class="button-green" style="color: #FFF">
                                        <i class="icons icon-basket-2"></i>Cập nhật mật khẩu
                                    </div>
                                </button>
                            </div
                        </div>
                        <div class="clearfix-5"></div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div class="clearfix-20"></div>
</div>
</div>
</article>
<script type="text/javascript" src="<?= base_url('assets/js/site/users.js') ?>"></script>