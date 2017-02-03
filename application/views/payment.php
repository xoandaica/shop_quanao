<section class="main-tintuc clearfix">
    <div class="container">
        <div class="row">
            <div class=" hidden link-home box_title_x  w_100" >
                <i class="fa fa-home"></i>
                <a href="<?= base_url() ?>" class="" title="Trang chủ">
                    Trang chủ /
                </a>
                <a class="" title="Giỏ hàng">
                    Đặt hàng thành công
                </a>
            </div>
            <!--end link-home-->
            <div class="col-md-12 col-sm-12 main-1" style="background: rgba(255,255,255,.95); margin-bottom: 15px">
                <div class="row">
                    <div class="img-payment">
                        <center>
                            <img style="max-width: 100%" src="<?= base_url('assets/img/thanh-toan.png') ?>"
                                 alt="skin-dr.vn"/>
                        </center>
                        <div class="paysitename">
                            <?= $this->option->site_name?>
                        </div>
                        <div style="" class="paysitehotline">
                            <?= $this->option->hotline1?>
                        </div>
                        <style type="text/css">
                            .paysitename {
                                color: rgb(1, 120, 36);
                                font-size: 26px;
                                position: absolute;
                                top: 44%;
                                left: 37%;

                            }
                            .paysitehotline {
                                color: red;
                                font-size: 26px;
                                position: absolute;
                                top: 69%;
                                right: 13%;
                            }
                        </style>
                    </div>
                </div>
                <!--end row-->
            </div>
            <!--end main-1-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>


<script type="text/javascript">
    function newpage() {
        self.location = "<?=base_url();?>"; //Mở 1 trang mới có địa chỉ là b.html
    }
    setTimeout("newpage()", 5000); //Goi hàm "newpage" sau 1 giây
</script>