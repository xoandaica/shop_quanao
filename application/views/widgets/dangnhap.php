<script>
    $(document).ready(function(){
        $('#login-password,#login-username').keyup(function (e) {
            if (e.keyCode == 13) {
                login();
            }
        });
    });

    function login() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '<?php echo base_url()?>' + 'dang-nhap',
            data: {user: $('#login-username').val(), pass: $('#login-password').val()},
            success: function (result) {
                if (result.login == true) {
                    location.reload();
                }
                if (result.login == false) {
                    $('#login-alert').html(result.message);
                    $('#login-alert').show();
                }
            }
        })
    }
    $("#login-username,#login-password").focus(function () {
        $('#usser-login-alert').fadeOut(1);
    });
    $("#usser-login-alert").click(function () {
        $('#usser-login-alert').fadeOut(1);
    });

    function change_provi2(alias) {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '<?php echo base_url()?>' + 'home/chose_provi',
            data: {alias: alias},
            success: function (result) {
                window.location = "<?=base_url()?>" + 'deal-' + result;
            }
        })

    }
    /*timkiem();*/
</script>
<!-- SINGIN Small modal -->
<div class="modal fade bs-example-modal-sm"   tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="panel panel-success" >
                <div class="panel-heading">
                    <div class="panel-title">Đăng nhập
<!--                        <button  type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>-->
                    </div>
                </div>
                <div style="padding-top:30px" class="panel-body" >
                    <div style="height: 35px; position: relative">
                        <div style="display:none; padding: 5px 10px;position: absolute" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    </div>
                    <form id="loginform" class="form-horizontal" role="form">
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="login-username" type="text" class="form-control"
                                   name="username" value="" placeholder="Đăng nhập bằng email">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="login-password" type="password" class="form-control"
                                   name="password" placeholder="Mật khẩu">
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <div onclick="login()" style="background: #70AD01; border-color: #70AD01" id="btn-login"  class="btn btn-info">Đăng
                                    nhập</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:100%" >
                                    Nếu chưa có tài khoản!
                                    <a onclick="$('.fade').hide();" data-toggle="modal" data-target=".bs-example-modal-sm2">
                                        Đăng ký
                                    </a>
                                    <div style="display: none !important;">
                                        <a href="#" onclick="$('.fade').fadeOut();" data-toggle="modal" data-target=".forgot_pass">
                                            Quên mật khẩu
                                        </a></div>
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



