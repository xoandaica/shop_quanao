<footer>
<div class="bg_footer">
    <div class="container">
        <div class="row">

            <div class="footer_mobile">
                <div class="title_ft_mb">
                    Tất cả danh mục
                </div>

                <div class="list_menu_footer">
                    <ul>
                        <?php $c = 1;
                        foreach ($cate_home_root as $key => $root) {
                            $c++; ?>
                            <li>
                                <a href="<?= base_url(@$root->alias.'-pc'.@$root->id); ?>" >
                                    <div class="icon_ft">
                                        <img class="w_100" src="<?= base_url($root->image3); ?>" alt=""/>
                                    </div>
                                </a>
                                <a href="<?= base_url(@$root->alias.'-pc'.@$root->id); ?>" >
                                    <div class="title_menu_ft">
                                        <?= $root->name; ?>
                                    </div>
                                </a>
                            </li>
                        <?php unset($cate_home_root[$key]); } ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /bg_footer -->


<!-- SINGUP Small modal -->
<div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="panel-title">Đăng ký
                        <button style="color: red;opacity: 0.9" type="button" class="close pull-right"
                                data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                </div>

                <div style="padding-top:30px" class="panel-body">
                    <!--      <div style="height: 35px; position: relative">
                                  <div style="display:none; padding: 5px 10px;position: absolute" id="login-alert" class="alert alert-danger col-sm-12"></div>
                              </div>-->
                    <form action="<?=base_url('dang-ky')?>" method="post" id="singup_frm"
                          class="font-si validate form-horizontal" role="form">

                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">Họ tên</label>

                            <div class="col-md-9">
                                <input type="text" class="validate[required] form-control" name="fullname"
                                       placeholder="Họ tên">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Email</label>

                            <div class="col-md-9">
                                <div id="show_error"></div>
                                <input type="text" onblur="check_mail($(this).val())" id="email"
                                       class="validate[required,custom[email]] form-control" name="email"
                                       placeholder="Email">
                                <input type="hidden" name="status_check" id="status_check" value="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Điện thoại</label>

                            <div class="col-md-9">
                                <input type="text"
                                       class="validate[custom[phone,minSize[10]]] form-control" name="phone"
                                       placeholder="Điện thoại">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Tỉnh thành</label>

                            <div class="col-md-9">

                                <select name="location" class="form-control">
                                    <option value="">Lựa chọn</option>
                                    <?php
                                    foreach(@$tinh as $t){?>
                                        <option value="<?=$t->provinceid;?>"><?=$t->name;?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class=" col-md-3 control-label">Mật khẩu</label>

                            <div class="col-md-9">
                                <input type="password"
                                       class=" validate[required,custom[onlyLetterNumber,minSize[6]]] form-control"
                                       id="password" name="password" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Nhập lại mật khẩu</label>

                            <div class="col-md-9">
                                <input type="password" class="validate[required,equals[password]] form-control"
                                       name="repassword" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                             <label for="password" class="col-md-3 control-label">Mã xác nhận</label>

                             <div class="col-md-9">
                                 <div style="position: relative">
                                     <div id="error_capcha"></div>
                                 </div>

                                 <?php echo $this->recaptcha->recaptcha_get_html();?>
                             </div>


                         </div>-->


                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <div name="signup" onclick="check_capcha()" id="btn-signup" class="btn btn-success ">
                                    <i class="icon-hand-right"></i> &nbsp Đăng ký
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%"
                                     class="btn_hover">
                                    Nếu bạn đã có tài khoản
                                    <a onclick="$('.fade').hide();" data-toggle="modal"
                                       data-target=".bs-example-modal-sm">
                                        Đăng nhập
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Heading -->


<div class="bg_signature">
    <div class="container">
        <div class="row">
            <div class="signature_bottom">
                BNF Việt Nam
                <div class="clearfi"></div>
                Copyright &copy; 2014 myphamgiadinh.vn
                <div class="clearfi"></div>
                All rights Designed by QTS.VN
            </div>
        </div>
    </div>
</div>
</footer>


<div id="show_added" style="position: fixed; top: 20px; right: 20px;z-index: 999999999999999999999 "></div>
<div id="show_success_mss" style="position: fixed; top: 20px; right: 20px">
    <?php if(isset($_SESSION['mss_success'])){?>

        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?=$_SESSION['mss_success'];?>
        </div>

        <?php
        unset($_SESSION['mss_success']);
    }?>
</div>
<script>
    setTimeout(function(){
        $('#show_success_mss').fadeOut().empty();
    }, 5000)
</script>

<script type="text/javascript">
    function base_url(){
        return '<?php echo base_url();?>';
    }

    $(document).ready(function () {
        $(".validate").validationEngine();
    });

    $('#singup_frm').on('shown.bs.modal', function () {
        refresh_capcha();
    });

</script>


<script type="text/javascript" src="<?= base_url('assets/js/site/menu-mobile1.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/site/menu-mobile2.js') ?>"></script>


<script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-en.js') ?>"></script>
<link href="<?= base_url('assets/plugin/ValidationEngine/style/validationEngine.jquery.css') ?>" rel="stylesheet" media="all"/>


</body>

</html>