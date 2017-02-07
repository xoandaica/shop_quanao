<div class="container">
<div class="row">
    <div class="cates-header">
        <div class="list-cates-hd" style="margin-left: 30px;">
            <br><br><br>
            <div class="break_crum text-uppercase head-infomation ">
                <i class="fa fa-angle-right"></i>&nbsp; Đăng ký thành công
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="clearfix-10"></div>

<div class="line-1"></div>
<article class="article">
<div class="container">
<div class="row_p">
<div class="pro_floo clearfix">
    <div class="col-md-2 col-sm-2" style="display: none">
        <div class="row">
            <div class="acount_nav">
                <ul>
                    <li>
                        <i class="fa fa-user"></i> &nbsp;
                        <a href="<?= base_url('thong-tin-ca-nhan')?>">Quản lý tài khoản</a>
                    </li>
                    <li>
                        <i class="fa fa-heart-o"></i>
                        <a href="<?= base_url('acount-like')?>">Sản phẩm yêu thích</a>
                    </li>
                    <li>
                        <i class="fa fa-file-text-o"></i> &nbsp;
                        <a href="<?= base_url('acount-order')?>"> Đơn hàng của tôi</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">

        <section class="content_about" style="margin-top: -10px;">
            <div style="text-shadow:0px 0px 15px #f9ff5f; color:#596067; margin-top:25px; font-size: 20px;
                        border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                Cảm ơn quý khách đã đăng ký tài khoản!
            </div><br> <div class="clearfix-10"></div>
            <?php if(isset($_GET['reset'])){?>


                <p> Chúng tôi đã gửi email lấy lại mật khẩu vào địa chỉ hòm thư <b><a href=""> <?=@$u2->email;?></a></b>, vui lòng kiểm tra hộp thư đến của quý khách.</p>

                <p>Quý khách lưu ý kiểm tra hòm thư trong tất cả thư mục (bao gồm Inbox và Bulk mail) để tìm thư đến từ địa chỉ
                    <b><a href=""> support@cezanne.vn</a></b>. Đôi khi do đường truyền mà email có thể đến chậm 5-10 phút.</p>

                <p>  Quý khách chỉ thực sự hoàn tất thủ tục đăng ký thành viên sau khi đã kích hoạt tài khoản được gửi từ mail kích hoạt  <b><a href=""><?= $this->site_email?></a></b>. </p>

                <p>  Khi cần trợ giúp, vui lòng gọi <b>090123456</b> hoặc <b>0912345678</b> (Giờ hành chính: 8h15-18h00)</p>

                <p> Email hỗ trợ kỹ thuật <?= $this->site_email?> nếu quý khách không nhận được thông tin kích hoạt tài khoản.</p>

            <?php  }else{
                if(isset($u)){?>
                    <div class="confirm" >


                        <p>  Khi cần trợ giúp, vui lòng gọi <b><?= $this->hotline1?></b> hoặc <b><?= $this->hotline2?></b> (Giờ hành chính: 8h15-18h00)</p>

                        <p> Email hỗ trợ kỹ thuật <?= $this->site_email?> nếu quý khách gặp trục trặc kĩ thuật.</p>

                    </div>
                <br><br><br>
                <?php }else{?>
                    <div class="confirm" >

                        <p>Đăng ký không thành công, đã có lỗi khi gửi mail đến email bạn đăng ký hoặc email của bạn không tồn tại! </p>



                        <p> Email hỗ trợ kỹ thuật <?= $this->site_email?> nếu quý khách gặp trục trặc kĩ thuật</p>

                    </div>
                <br><br><br>
                <?php }
            }?>

            <script type="text/javascript">
                function newpage()
                {
                    self.location = "<?=base_url();?>"; //Mở 1 trang mới có địa chỉ là b.html
                }
                setTimeout("newpage()",70000); //Goi hàm "newpage" sau 1 giây
            </script>
        </section>
    </div>

</div>
<div class="clearfix-20"></div>
</div>
</div>







