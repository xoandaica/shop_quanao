<div class="row">
    <ul class="menu_content_left">
        <?php foreach ($pro_category as $cat) {
            if ($cat->parent_id == 0) {
                ?>
                <li>
                    <a href="<?= base_url($cat->alias . '-pc' . $cat->id) ?>" title="<?= $cat->name ?>">
                        <?= $cat->name ?>
                    </a>
                    <ul class="menu_content_left_ul2">
                        <?php foreach ($pro_category as $cat_sub) {
                            if ($cat_sub->parent_id == $cat->id) {
                                ?>
                                <li>
                                    <a href="<?= base_url($cat_sub->alias . '-pc' . $cat_sub->id) ?>"
                                       title="<?= $cat_sub->name ?>">
                                        <?= $cat_sub->name ?>
                                    </a>
                                </li>
                            <?php }
                        } ?>
                    </ul>
                </li>
            <?php }
        } ?>
    </ul>
    <div class="clearfix-10 clearfix"></div>
    <div class="txt_nhapcode">Bạn đã có mã giảm giá?</div>
    <div class="clearfix"></div>
    <div class="input-group box_code">
        <input type="text" class="form-control input_code" placeholder="">
                    <span class="input-group-btn">
                        <button class="btn btn-default button_code" type="button">OK</button>
                    </span>
    </div>
    <div class="clearfix"></div>
    <div class="pdt_phone">
        <span>Ngại đặt hàng Gọi ngay Hotline</span>
        <div class="clear"></div>
        <div class="pd_tel" style="padding: 0px !important;"><?= $this->hotline1?></div>
    </div>
    <div class="clearfix"></div>
    <div class="box_csbh">
        <div class="tit_csbh">Chính sách bán hàng</div>
        <div class="clearfix"></div>
        <div class="list_csbh">
            <?= $this->show_room?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="box_email_input clearfix">
        <span class="txt_dkem">ĐĂNG KÝ EMAIL</span>
        <div class="clearfix"></div>
        <span class="txt_nnv">NHẬN NGAY VOUCHER 100.000đ</span>
        <div class="clearfix"></div>
        <form action="<?= base_url('gui-email') ?>" method="post" class="validate" role="form">
            <div class="input-group form-send-email" style="margin:5px 12px 0px 10px;">
                <input class="hidden" type="text"  name="code" value=""/>
                <input type="text" name="email"
                       class="form-control validate[required,custom[email]] input_code"
                       placeholder="Địa chỉ Email của bạn">

                        <span class="input-group-btn">
                            <button class="" name="send_emails2" type="submit" style="">
                                <img src="<?= base_url('assets/css/img/icon_email_z.png') ?>" alt=""/>
                            </button>
                        </span>
            </div>
        </form>
        <div class="clearfix"></div>
        <div class="pull-right" style="margin: 5px 11px 0px 0px;">
            <a  style="color: #fff">Đăng ký - nhận tiện ích</a>
            <img style="margin-left: 8px" src="<?= base_url('assets/css/img/icon_ti.png') ?>" alt=""/>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="video_left" style="">
        <div class="tit_csbh">Video</div>
        <iframe width="100%" height="150" src="https://www.youtube.com/embed/<?= $this->site_video?>" data-name="false" title="false" frameborder="<?= $c_vd;?>" allowfullscreen="">
        </iframe>
    </div>
    <div class="clearfix"></div>
</div>