<div class="container">
    <div class="row_p">
        <div class="pro_floo clearfix">
            <div class="col-md-2 col-sm-2" style="display: none">
                <div class="row">
                    <div class="acount_nav">
                        <ul>
                            <li>
                                <i class="fa fa-user"></i> &nbsp;
                                <a href="<?= base_url('thong-tin-ca-nhan') ?>">Quản lý tài khoản</a>
                            </li>
                            <li>
                                <i class="fa fa-heart-o"></i>
                                <a href="<?= base_url('acount-like') ?>">Sản phẩm yêu thích</a>
                            </li>
                            <li>
                                <i class="fa fa-file-text-o"></i> &nbsp;
                                <a href="<?= base_url('acount-order') ?>"> Đơn hàng của tôi</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="acount_tit" style="text-shadow:0px 0px 15px #f9ff5f; color:#596067;
                        border-bottom: 1px solid #ccc;padding-bottom: 5px; margin-bottom: 20px">Kích hoạt tài khoản
                    thành công!
                </div>
                <div class="clearfix-10"></div>
                <section class="content_about" style="margin-top: -10px;">
                    <div class="confirm">
                        <p>Tài khoản đã được kích hoạt thành công!</p>

                        <p> Tài khoản đăng ký của quý khách đã được kích hoạt thành công. Quý khách có thể
                            <a href="" style="color: red" data-toggle="modal" data-target=".bs-example-modal-sm">Đăng
                                nhập</a> vào
                            tài khoản hoặc vào Trang chủ <b><a href="<?= base_url(); ?>"
                                                               style="color: #333"><?= $this->site_name ?></b></a>
                            để bắt đầu giao dịch mua hàng.</p>
                    </div>


                </section>
            </div>

        </div>
        <div class="clearfix-20"></div>


        <script type="text/javascript">
            function newpage() {
                self.location = "<?=base_url();?>"; //Mở 1 trang mới có địa chỉ là b.html
            }
            setTimeout("newpage()", 75000); //Goi hàm "newpage" sau 1 giây
        </script>


    </div>
</div>






