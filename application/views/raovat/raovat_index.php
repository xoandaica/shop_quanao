
                            <div class="ct_right col-fx-md-775 col-sm-9 col-xs-12">
                                <div class="">
                                    <div class="bd_1px_d4d4d4 pd715515 f12u_212121 mg_5_0 clearfix" style="padding-left: 7px; margin-top: 0px">
                                        Danh sách tin rao vặt
                                    </div>
                                    <div class="pd_top10 bd_1px_d4d4d4 pd_bot42" style="padding-left: 25px; overflow: hidden">
                                        <form action="<?= base_url('rao-vat-s')?>" method="get">
                                            <div class="input-group sty_input w_80 w_xs_98">
                                                <div class="row"> <div class="text_center mg_bot5 f18u_212121">Tìm kiếm</div> </div>
                                            </div>
                                            <div class="input-group sty_input w_80 w_xs_98">
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-3 col-xs-5" style="text-align: left; padding-left: 0px; padding-top: 2px">
                                                        <span class="input-group-addon f12_212121" style="border: none; background: #fff;text-align: left;">Tiêu đề</span>
                                                    </div>
                                                    <div class="col-md-10 col-sm-9 col-xs-7">
                                                        <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="tieude"
                                                               class="validate[required] form-control placeholder col-md-9" placeholder="" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w_80 w_xs_98">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-group sty_input">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-5 col-xs-5" style="text-align: left; padding-left: 0px; padding-top: 2px; ">
                                                                    <span class="input-group-addon f12_212121" style="border: none; background: #fff;text-align: left;">Ngày bắt đầu</span>
                                                                </div>
                                                                <div class="col-md-8 col-sm-7 col-xs-7 ">
                                                                    <input id="datetimepicker" type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="date_start"
                                                                           class="validate[required] form-control placeholder col-md-9" placeholder="" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input-group sty_input">
                                                            <div class="row">
                                                                <div class="col-md-4 col-sm-5 col-xs-5" style="text-align: left; padding-left: 0px; padding-top: 2px; ">
                                                                    <span class="input-group-addon f12_212121"
                                                                          style="border: none; background: #fff;text-align: left;">Ngày kết thúc</span>
                                                                </div>
                                                                <div class="col-md-8 col-sm-7 col-xs-7">
                                                                    <input id="datetimepicker1" type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="date_end"
                                                                           class="validate[required] form-control placeholder col-md-9" placeholder="" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="input-group sty_input w_80 w_xs_98">
                                                <div class="row">
                                                    <div class="col-md-2 col-sm-3 col-xs-5" style="text-align: left; padding-left: 0px; padding-top: 2px; ">
                                                        <span class="input-group-addon f12_212121"
                                                              style="border: none; background: #fff;text-align: left;">Loại tin</span>
                                                    </div>
                                                    <div class="col-md-10 col-sm-9 col-xs-7">
                                                        <div class="">
                                                            <input type="text" style="z-index: 0;border-radius: 5px;height: 25px;" name="cat"
                                                                   class="validate[required] form-control placeholder sty_sear" placeholder="" >
                                                            <button type="submit" class="timkiem_trangcon">Tìm kiếm</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div>

                                    <div class="cleafix"></div>

                                    <div class="mg_top5">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr class="bg_019fa8 f12_fff text_center">
                                                <th class="">SST</th>
                                                <th class="">Tiêu đề</th>
                                                <th class="">Nội dung</th>
                                                <th class="">Ngày đăng</th>
                                                <th class="">Ngày hết hạn</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $c=0; if(isset($list)&&!empty($list)){
                                            foreach($list as $v){ $c++;?>
                                                <tr class="text_center f12_212121">
                                                    <td class=""><?= $c; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('rao-vat/'.$v->alias); ?>"><?= $v->tieude; ?></a>
                                                    </td>
                                                    <td><?= $v->mota; ?></td>
                                                    <td><?= date('d-m-Y',$v->ngay_batdau)?></td>
                                                    <td><?= date('d-m-Y',$v->ngay_ketthuc)?></td>
                                                </tr>
                                            <?php }} ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/main_content -->
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