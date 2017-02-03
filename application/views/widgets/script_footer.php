<!-- Modal popup load page one news-->

<div class="modal fade in <?= $this->install_4 == null || $this->setup_4 == 0?'display_none':''; ?>"
     id="formSaludo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: block; background: rgba(29, 31, 33, 0.62) !important;">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content modal-fomart" style=" background: transparent !important;; margin-top: 100px;
        z-index: 99999">
            <div class="modal-header" style="border: none">
                <button type="button" onclick="closekm()" class="close closekm " data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <?= $this->install_4 != null ?$this->install_4:''; ?>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    function closekm() {
        $('#formSaludo').fadeOut().empty();
    }
    $("#formSaludo").click(function () {
        $('#formSaludo').fadeOut().empty();
    })
</script>

<!-- Modal Window -->


    <link href="<?= base_url('assets/css/site/dialog.css')?>"  rel="stylesheet" media="all"/>
    <link  href="<?= base_url('assets/css/site/phone.css')?>" rel="stylesheet" />
    <script  src="<?= base_url('assets/js/site/dialog.js')?>" type="text/javascript"></script>


<div id="coccoc-alo-phoneIcon" class="hidden-xs coccoc-alo-phone coccoc-alo-green coccoc-alo-show
  <?= $this->setup_2 == 0?'display_none':''; ?>" >
    <div class="coccoc-alo-ph-circle"></div>
    <div class="coccoc-alo-ph-circle-fill"></div>
    <div class="coccoc-alo-ph-img-circle">
        <a  href="#login-box"
            class="login-window button"></a>
    </div>
</div>
<div id="login-box" class="login hidden-xs ">
    <div class="modal-dialog modal-format  ">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: rgb(29, 31, 33); margin-top: 100px; z-index: 99999">
            <div class="modal-body">
                <div class="codejava">
                    <a href="#" class="close2">
                        <img src="<?= base_url('assets/css/img/close.png')?>" class="img-close2" title="Đóng của sổ" alt="Đóng" />
                    </a>
                    <?= $this->install_2 != '' && $this->setup_2 == 1?$this->install_2:''; ?>
                </div>

                <form action="" method="post"
                      class="validate form-horizontal  <?= $this->install_2 != null?'display_none':''; ?>" role="form">
                    <div class="contact-form ct-form col-md-12">
                        <div class="tit-lh tit-lh-coccoc">
                            <p>GỬI YÊU CẦU TƯ VẤN</p>
                        </div>
                        <div class="clearfix-10"></div>
                        <p class="newline ct-hoten">
                            <span class="lb">Họ tên</span>
                            <input type="text" name="full_name" value="" size="40" class="validate[required] inpt-name inpt  inpt-1"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Email</span>
                            <input type="text" name="email" value="" size="40" class="validate[required,custom[email]] inpt inpt-2"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Điện thoại</span>
                            <input type="text" name="phone" value="" size="40" class="inpt inpt-3"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Công ty</span>
                            <input type="text" name="city" value="" size="40" class="inpt inpt-4"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Tiêu đề</span>
                            <input type="text" name="country" value="" size="40" class="inpt inpt-5"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Nội dung yêu cầu báo giá</span>
                            <input type="text" name="comment" value="" size="40" class="inpt inpt-6"  />
                        </p>
                        <p class="text-center">
                            <input type="submit" name="sendcontact" value="Gửi yêu cầu" class="wpcf7-form-control wpcf7-submit">
                        </p>
                    </div>
                    <div class="clearfix-10"></div>

                </form>  <!--end form-->
            </div>
        </div>

    </div>

</div>

<!-- end phone -->

<script type="text/javascript">

    $(window).scroll(function () {
        var emty_value = $('#emty_value').val();
        var setup_3 = $('#setup_3').val();
//        alert(emty_value);
        if ($(window).scrollTop() >= 4000 ) {
            if(emty_value == 0 && setup_3 == 1 ){
                $('#popup_footer').addClass('show');
            }
        }
        else {
//            $('#popup_footer').removeClass('show');
        }
    });
    function show_popupf(){
        $('#popup_footer').show();
        $('#popup_footer').addClass('show');
        $('#popup_footer').fadeOut().show();
    }
    function emty_close(){
        $('#popup_footer').hide();
        $('#popup_footer').removeClass('show');
        $('#popup_footer').fadeOut().empty();
        document.getElementById('emty_value').value = 1;
    }
</script>
<input type="hidden" value="0" id="emty_value"/>
<style type="text/css">
    .show{
        display: block !important;
        /*background: rgba(0, 0, 0, 0.3);*/
        opacity: 1 !important;
        padding-top: 50px !important;
    }
    #emty_close{
        color: #fff;
        opacity: 1 !important;
    }
</style>


<input type="hidden" id="setup_3" value="<?= $this->setup_3; ?>"/>
<!-- Modal popup_footer-->
<div id="popup_footer" class="modal fade <?=  $this->setup_3 == 0?'display_none':''; ?>" role="dialog" style="z-index: 99999999999">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: rgb(29, 31, 33); margin-top: 100px; z-index: 99999">
            <div class="modal-header" style="border: none">
                <button type="button" onclick="emty_close()" id="emty_close" class="close close_cusomer "
                        data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center; color: rgb(213, 204, 142);">Yêu cầu báo giá</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('add_contact')?>" method="post" class="validate form-horizontal" role="form">
                    <div class="contact-form ct-form col-md-12">
                        <p class="newline ct-hoten">
                            <span class="lb">Họ tên</span>
                            <input type="text" name="full_name" value="" size="40" class="validate[required]  inpt inpt-1"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Email</span>
                            <input type="text" name="email" value="" size="40" class="validate[required,custom[email]] inpt inpt-2"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Điện thoại</span>
                            <input type="text" name="phone" value="" size="40" class="inpt inpt-3"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Công ty</span>
                            <input type="text" name="city" value="" size="40" class="inpt inpt-4"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Tiêu đề</span>
                            <input type="text" name="country" value="" size="40" class="inpt inpt-5"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Nội dung yêu cầu báo giá</span>
                            <input type="text" name="comment" value="" size="40" class="inpt inpt-6"  />
                        </p>
                        <p class="text-center">
                            <input type="submit" name="sendcontact" value="Gửi yêu cầu" class="wpcf7-form-control wpcf7-submit">
                        </p>
                    </div>
                    <div class="clearfix-10"></div>

                </form>  <!--end form-->
            </div>
        </div>

    </div>
</div>

<div id="popup_footer2" class=" modal fade" role="dialog" style="z-index: 99999999999">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="background-color: rgb(29, 31, 33); margin-top: 100px; z-index: 99999">
            <div class="modal-header" style="border: none">
                <button type="button" class="close close_cusomer" data-dismiss="modal">&times;</button>
                        &times;</button>
                <h4 class="modal-title tit-lh-coccoc" style="text-align: center; color: rgb(213, 204, 142);">Yêu cầu báo giá</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('add_contact')?>" method="post" class="validate form-horizontal" role="form">
                    <div class="contact-form ct-form col-md-12">
                        <p class="newline ct-hoten">
                            <span class="lb">Họ tên</span>
                            <input type="text" name="full_name" value="" size="40" class="validate[required]  inpt inpt-1"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Email</span>
                            <input type="text" name="email" value="" size="40" class="validate[required,custom[email]] inpt inpt-2"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Điện thoại</span>
                            <input type="text" name="phone" value="" size="40" class="inpt inpt-3"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Công ty</span>
                            <input type="text" name="city" value="" size="40" class="inpt inpt-4"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Tiêu đề</span>
                            <input type="text" name="country" value="" size="40" class="inpt inpt-5"  />
                        </p>
                        <p class="newline ct-hoten">
                            <span class="lb">Nội dung yêu cầu báo giá</span>
                            <input type="text" name="comment" value="" size="40" class="inpt inpt-6"  />
                        </p>
                        <p class="text-center">
                            <input type="submit" name="sendcontact" value="Gửi yêu cầu" class="wpcf7-form-control wpcf7-submit">
                        </p>
                    </div>
                    <div class="clearfix-10"></div>

                </form>  <!--end form-->
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(window).load(function() {

        $("#flexiselDemo3").flexisel({
            visibleItems:1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 1
                }
            }
        });

    });
    $(window).load(function() {

        $("#flexiselDemo4").flexisel({
            visibleItems:1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 1
                }
            }
        });

    });
    $(window).load(function() {

        $("#flexiselDemo5").flexisel({
            visibleItems:1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 1
                }
            }
        });

    });

    $(window).load(function() {

        $("#flexiselDemo6").flexisel({
            visibleItems:1,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint:640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint:768,
                    visibleItems: 1
                }
            }
        });

    });

    // menu fix
    if (window.innerWidth > 768) {
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 100) {
                $('.sticky-header').addClass('fixed');
            }
            else {
                $('.sticky-header').removeClass('fixed');
            }
        });
    }

    if (window.innerWidth > 320) {
        $(window).scroll(function () {
            if ($(window).scrollTop() >= 100) {
                $('.sticky-header').addClass('clearfix');
            }
            else {
                $('.sticky-header').removeClass('clearfix');
            }
        });
    }

    // cause

    $(function(){
        SyntaxHighlighter.all();
    });
    $(window).load(function(){
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 155,
            itemMargin: 3,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });

</script>
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


<script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-en.js') ?>"></script>

<link href="<?= base_url('assets/plugin/ValidationEngine/style/validationEngine.jquery.css') ?>" rel="stylesheet" media="all"/>
