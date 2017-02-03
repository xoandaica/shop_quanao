<article>
    <section class="main_content">
        <div class="container">
            <div class="row_pc">
                <div class="news_headline mg_topbot10">
                    <div class="pb_label_home">
                        <div class="tabbar_left col-fx-md-225 col-xs-12 f14u_fff">
                            Danh mục hệ thống
                        </div>
                        <!--/tabbar_left -->
                        <div class="tabbar_right col-fx-md-775 hidden-xs hidden-sm">
                            <ul class="list_tm">
                            </ul>
                        </div>
                        <!-- /tabbar_left -->

                    </div>
                    <div class="clearfix"></div>

                    <div class="content_tc mg_bot75">
                        <div class="row">
                        <div class="ct_left col-fx-md-225 col-sm-3 col-xs-12">
                            <div class="dm_ht mg_5_0">
                                <ul>
                                    <li>
                                        <a href="">
                                            - Quản lý thông tin cá nhân
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">- Đổi mật khẩu</a>
                                    </li>
                                    <li>
                                        <a href="">- Quản lý danh sách tin đăng</a>
                                    </li>
                                    <li>
                                        <a href="">- Quản lý danh sách tin đã hết hạn</a>
                                    </li>
                                    <li>
                                        <a href="">- Quản lý danh sách tin đã được duyệt</a>
                                    </li>
                                    <li>
                                        <a href="">- Thông báo</a>
                                    </li>

                                </ul>
                            </div>
                            <!--/dm_ht -->
                            <div class="clearfix"></div>
                            <div class="f14u_fff bg_color_009fa8 text_center pd_6">
                                Sản phẩm nổi bật
                            </div>
                            <div class="clearfix"></div>
                            <div class="mg_5_0 bd_1px_d4d4d4" style="overflow: hidden">

                                <div class="col-md-12 col-sm-12 col-xs-6 pd_5_15 text_center">
                                    <div class="">
                                        <a href="" title="" class="h_784">
                                            <img class="w_100" src="img/prod_h1.png" alt=""/>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="">
                                        <a href="" title="" class="f14b_878989 color_f09903_hover">Máy siêu âm 4D DC-7 Mindray</a>

                                        <div class="clearfiz"></div>
                                        <span class="f14b_f07d02">Giá</span>
                                        <span class="f14b_f00202">499,000</span>
                                        <span class="f14b_959595">/</span>
                                        <del class="f14b_6f6f6f">8069,000</del>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-6 pd_5_15 text_center">
                                    <div class="">
                                        <a href="" title="" class="h_784">
                                            <img class="w_100" src="img/prod_h1.png" alt=""/>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="">
                                        <a href="" title="" class="f14b_878989 color_f09903_hover">Máy siêu âm 4D DC-7 Mindray</a>

                                        <div class="clearfiz"></div>
                                        <span class="f14b_f07d02">Giá</span>
                                        <span class="f14b_f00202">499,000</span>
                                        <span class="f14b_959595">/</span>
                                        <del class="f14b_6f6f6f">8069,000</del>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-6 pd_5_15 text_center">
                                    <div class="">
                                        <a href="" title="" class="h_784">
                                            <img class="w_100" src="img/prod_h1.png" alt=""/>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="">
                                        <a href="" title="" class="f14b_878989 color_f09903_hover">Máy siêu âm 4D DC-7 Mindray</a>

                                        <div class="clearfiz"></div>
                                        <span class="f14b_f07d02">Giá</span>
                                        <span class="f14b_f00202">499,000</span>
                                        <span class="f14b_959595">/</span>
                                        <del class="f14b_6f6f6f">8069,000</del>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="ct_right col-fx-md-775 col-sm-9 col-xs-12">
                        <div class="">
                            <div class="bd_1px_d4d4d4 pd715515 f12u_212121 mg_5_0 clearfix" style="padding-left: 7px;">
                                Form trang tin
                            </div>
                            <div class="clearfix"></div>
                            <form class=" form-horizontal"   method="post" action="<?= base_url('postings-classifieds')?>" role="form" >
                                <div class="borform">

                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5 label_form">
                                            <span class="input-group-addon f12_212121" >Tiêu đề</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name=""
                                                   value="<?= @$raovat->tieude; ?>"  name="tieude"
                                                   class="validate[required] form-control placeholder col-md-9" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5 label_form">
                                            <span class="input-group-addon f12_212121" >Tóm tắt</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="tomtat"
                                                   class="validate[required] form-control placeholder col-md-9" placeholder=""
                                                   value="<?= @$raovat->tomtat; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5 label_form">
                                            <span class="input-group-addon f12_212121" >Loại tin rao</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="loai_giaodich"
                                                   value="<?= @$raovat->loai_giaodich; ?>"    class="validate[required] form-control placeholder col-md-9"
                                                   placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="input-group sty_input">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-5 col-xs-5 label_form" >
                                                        <span class="input-group-addon f12_212121">Ngày bắt đầu</span>
                                                    </div>
                                                    <div class="col-md-8 col-sm-7 col-xs-7 ">
                                                        <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="ngay_batdau"
                                                               value="<?= date('d-m-Y',@$raovat->ngay_batdau); ?>" class="validate[required] form-control placeholder col-md-9"  placeholder="Ngày bắt đầu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="input-group sty_input">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-5 col-xs-5 label_form" >
                                                        <span class="input-group-addon f12_212121" >Ngày kết thúc</span>
                                                    </div>
                                                    <div class="col-md-8 col-sm-7 col-xs-7">
                                                        <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name=""
                                                               value="<?= date('d-m-Y',@$raovat->ngay_ketthuc); ?>"   class="validate[required] form-control placeholder col-md-9"
                                                               placeholder="Ngày kết thúc" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- /w_80 -->
                                <div class="clearfix"></div>
                                <div class="input-group sty_input w_965 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5 label_form">
                                            <span class="input-group-addon f12_212121">Nội dung</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <div class="row">
                                                <textarea name="noidung" class=" form-control placeholder" id="ckeditor" style="border-radius: 15px"
                                                          rows="15"   cols="78"  ><?= @$raovat->noidung; ?></textarea>
                                                <?php echo display_ckeditor($ckeditor); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5" style="text-align: left; padding-left: 0px;">
                                            <span class="input-group-addon f12_212121" style="border: none; background: #fff;text-align: left;">Hình ảnh:</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <?php if (@$raovat->anh != null) { ?>

                                                <div class="col-md-2">
                                                    <input type="file"  value="<?= @$raovat->anh; ?>"  name="userfile"  >
                                                </div>
                                                <div class="col-md-3 text-right">
                                                    <label class="control-label">Ảnh:</label>
                                                    <img src="<?= base_url($raovat->anh) ?>"
                                                         style="width: 100px; max-height: 100px"/>
                                                </div>
                                            <?php }else{?>
                                                <input type="file"  value="<?= @$raovat->anh; ?>"  name="userfile"  >
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="pd_25"></div>
                                <div class="clearfix"></div>
                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="" style="text-align: left; padding-left: 0px;">
                                            <span class="input-group-addon f12_212121" style="border: none; background: #fff;text-align: left;">Thông tin liên hệ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5" style="text-align: left; padding-top: 2px;">
                                        <span class="input-group-addon f12_212121"
                                              style="border: none; background: #fff;text-align: left;">Tên liên hệ</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="ten_lienhe"
                                                   class="validate[required] form-control placeholder col-md-9" placeholder=""
                                                   value="<?= @$raovat->ten_lienhe; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="input-group sty_input w_80">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5" style="text-align: left; padding-top: 2px;">
                                                    <span class="input-group-addon f12_212121"
                                                          style="border: none; background: #fff;text-align: left;">Địa chỉ</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="diachi_lienhe"
                                                   class="validate[required] form-control placeholder col-md-9" placeholder=""
                                                   value="<?= @$raovat->diachi_lienhe; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5" style="text-align: left; padding-top: 2px;">
                                                    <span class="input-group-addon f12_212121"
                                                          style="border: none; background: #fff;text-align: left;">Điện thoại</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="dienthoai_lienhe"
                                                   class="validate[required] form-control placeholder col-md-9" placeholder=""
                                                   value="<?= @$raovat->dienthoai_lienhe; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5" style="text-align: left; padding-top: 2px">
                                                    <span class="input-group-addon f12_212121"
                                                          style="border: none; background: #fff;text-align: left;">Di động</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="phone"
                                                   class="validate[required] form-control placeholder col-md-9" placeholder=""
                                                   value="<?= @$raovat->phone; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5" style="text-align: left; padding-top: 2px;">
                                                    <span class="input-group-addon f12_212121"
                                                          style="border: none; background: #fff;text-align: left;">Email</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="email_lienhe"
                                                   class="validate[required] form-control placeholder col-md-9" placeholder=""
                                                   value="<?= @$raovat->email_lienhe; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="input-group sty_input w_80 w_xs_98">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-5" style="text-align: left;">
                                            <span class="input-group-addon f12_212121" style="border: none; background: #fff;text-align: left;">File đính kèm:</span>
                                        </div>
                                        <div class="col-md-10 col-sm-9 col-xs-7">
                                            <input type="file" name="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="input-group sty_input w_80 w_xs_98" style="overflow: hidden; margin: 10px 0px 35px 0px;">
                                    <div class="w_215" style="margin: auto">
                                        <button type="submit" class="dangtin">Đăng tin </button>
                                        <button type="reset" class="huy">Hủy</button>
                                    </div>

                                </div>


                                </div>
                            </form>
                        </div>
                        </div>
                        <!-- /ct_right -->

                        </div>
                    </div>
                    <!-- /content_tc -->
                </div>
            </div>
        </div>
    </section>
</article>


<link href="<?= base_url('assets/plugin/datetimepicker/jquery.datetimepicker.css') ?>"  rel="stylesheet" media="all"/>
<script>
    $('#price,#dientich').autoNumeric();
</script>

<script type="text/javascript" src="<?= base_url('assets/plugin/datetimepicker/jquery.datetimepicker.js') ?>"></script>
<input type="hidden" value="<?=base_url();?>" id="baseurl">
<script type="text/javascript">
    $('#datetimepicker,#datetimepicker1').datetimepicker({

        onGenerate:function( ct ){
            $(this).find('.xdsoft_date')
                .toggleClass('xdsoft_disabled');
        },
        timepicker:false,
        format:'d-m-Y'

    });

    $(document).ready(function(){
        $("#location9").change(function(){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: $('#baseurl').val() + 'user_post/getdistric',
                data: {id:this.value},
                success: function (result) {
                    var sc='';
                    $.each(result, function (key, val) {
                        sc += '<option value="' + val.districtid + '">' + val.name + '</option>';
                    });
                    $('#distric9').html(sc);
                }
            })
        });
    });
    //ajax

</script><!--ajax from contrycite-->