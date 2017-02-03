<div class="row">
    <ul class="menu_content_left">
        <?php  foreach($menus_btt as $menu){
            if($menu->parent_id==0){?>
                <li>
                    <a target="<?= $menu->target?>" <?php if($menu->url != 'null')  echo 'href="'.site_url($menu->url).'"'?> class="menu-link" title="<?=$menu->name;?>"><?=$menu->name;?></a>
                    <ul class="menu_content_left_ul2">
                        <?php foreach($menus_btt_sub as $sub){
                            if($menu->id_menu==$sub->parent_id){?>
                                <li class="menu-item menu-li-sub" style="position: relative !important;">
                                    <a target="<?= $sub->target?>"  <?php if($sub->url != 'null')  echo 'href="'.site_url($sub->url).'"'?> title="<?=$sub->name;?>" class="menu-link">
                                        <?=$sub->name;?>
                                    </a>
                                </li>
                            <?php }} ?>
                    </ul>
                </li>
            <?php
            } } ?>
    </ul>
    <div class="clearfix"></div>
    <div class="content_top_right clearfix">
        <div class="txt_nhapcode">Bạn đã có mã giảm giá?</div>
        <div class="clearfix"></div>
        <div class="input-group box_code">
            <input type="text" class="form-control input_code" placeholder="">
            <span class="input-group-btn">
                <button class="btn btn-default button_code" type="button">OK</button>
            </span>
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
            <iframe width="100%" height="150" src="https://www.youtube.com/embed/<?= $this->site_video?>" data-name="false"
                    title="false" frameborder="" allowfullscreen="">
            </iframe>
        </div>
    </div>
</div>