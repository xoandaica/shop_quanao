<script type="text/javascript">
    $('#singup_frm').on('shown.bs.modal', function () {
        refresh_capcha();
    });
        function refresh_capcha(){
            var base_url =$('#base_url').val();
            $.ajax({
                type: "POST",
                dataType: "json",
                url:'users_frontend/refresh_capcha',
                data: {capcha:$('#captcha_input').val(),captcha_check:$('#captcha_check').val()},
                success: function (result) {
                    $('#captcha_check').val(result.word);
                    $('#captcha_check2').val(result.word);
                    $('.captcha_check_reply').val(result.word);
                    $('#captcha_img').html(result.image);
                    $('#captcha_img2').html(result.image);
                    $('.captcha_reply_cmt').html(result.image);
                }
            });
        }
    refresh_capcha();
</script>

<div class="modal fade shown.bs.modal  bs-example-modal-sm2" id="singup_frm" tabindex="-1" role="dialog"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="panel-title">Đăng ký
                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                </div>
                <div style="padding-top:30px" class="panel-body">
                    <div style="height: 35px; position: relative">
                        <div style="display:none; padding: 5px 10px;position: absolute" id="login-alert"
                             class="alert alert-danger col-sm-12"></div>
                    </div>
                    <form action="<?= base_url('dang-ky') ?>" method="post" id="singup_form"
                          class="validate form-horizontal" role="form">
                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">Họ tên</label>
                            <div class="col-md-9">
                                <input type="text" class="validate[required] form-control input-sm" name="fullname"
                                       placeholder="Họ tên">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <div id="show_error"></div>
                                <input type="text" onblur="check_mail($(this).val())" id="code"
                                       class="validate[required,custom[email]] form-control input-sm" name="email"
                                       placeholder="Email">
                                <input type="hidden" name="status_check" id="status_check" value="1">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Điện thoại</label>
                            <div class="col-md-9">
                                <input type="text"
                                       class="validate[required,custom[phone,minSize[10]]] form-control input-sm"
                                       name="phone"
                                       placeholder="Điện thoại">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-md-3 control-label">Tỉnh thành</label>
                            <div class="col-md-9">
                                <select name="location" class="form-control input-sm">
                                    <option value="">Lựa chọn</option>
                                    <?php
                                    foreach (@$province as $t) {
                                        ?>
                                        <option value="<?= $t->provinceid; ?>"><?= $t->name; ?></option>
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
                                       class=" validate[required,custom[onlyLetterNumber,minSize[6]]] form-control input-sm"
                                       id="password" name="password" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Nhập lại mật khẩu</label>
                            <div class="col-md-9">
                                <input type="password" class="validate[required,equals[password]] form-control input-sm"
                                       name="repassword" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Mã xác nhận</label>
                            <div class="col-md-9">
                                <div style="position: relative">
                                    <div id="error_capcha"></div>
                                    <div id="captcha_img" class="pull-left">
                                        Kích vào biểu tượng
                                        <i style="cursor: pointer;" class="fa fa-refresh" onclick="refresh_capcha()"></i>
                                        để nhận mã Capcha
                                    </div>
                                    <div class="pull-left" style="padding: 0px 10px 10px 15px;cursor: pointer;">
                                        <i class="fa fa-refresh" onclick="refresh_capcha()"></i>
                                    </div>
                                    <div class="clearfix"></div>
                                    <input type="hidden" id="captcha_check" value="">
                                    <p></p>
                                    <input type="text" id="captcha_input" value="" class="form-control input-sm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <div style="background: #70AD01; border-color: #70AD01" name="signup"
                                     onclick="check_capcha()" id="btn-signup" class="btn btn-info">
                                    <i class="icon-hand-right"></i> &nbsp Đăng ký
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:100%">
                                    Nếu bạn đã có tài khoản!
                                    <a onclick="$('.fade').hide();" data-toggle="modal" data-target=".bs-example-modal-sm">
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
