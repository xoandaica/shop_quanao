<link href="<?= base_url('assets/css/front_end/jquery.datetimepicker.css') ?>"  rel="stylesheet" media="all"/>
<script type="text/javascript" src="<?= base_url('assets/js/front_end/jquery.datetimepicker.js') ?>"></script>
<script>
    $('#datetimepicker8').datetimepicker({
        onGenerate: function (ct) {
            $(this).find('.xdsoft_date')
                    .toggleClass('xdsoft_disabled');
        },
        minDate: '-1970/01/2',
        maxDate: '+1970/01/2',
        timepicker: false
    });
</script>
<article>
    <div class="container">
        <div class="hidden col-lg-193 col-md-3 col-sm-3 col-xs-12">
            <?= $right_cat ?>
        </div>

        <div class="col-lg-807_old col-md-12 col-sm-12 col-xs-12">
            <div class="row headding-page">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <br> <br> <br>
                    <div class="new-headding cart-headding"><span>Giỏ hàng</span></div>
                </div>
            </div>
            <!--            <div class="box_title_x  w_100">
                            <a href="" class="back_link" title="">TRANG CHỦ </a>
                            <i class="fa fa-angle-right" style="color: #17100a"></i>
                            <a class="back_link" href="">Giỏ hàng</a>
                        </div>-->
            <div class="content-cart">
                <form id="checkoutform" class="validate form-horizontal" method="post" role="form">
                    <div class="">
                        <div class="table-responsive">
                            <table class="table table-bordered orderinfo-table  itemInfo-table">
                                <tbody>
                                    <tr  style="padding: 10px 2px;height: 31px; margin-bottom: 10px !important; ">
                                        <th class="th-title hidden-xs" width='10%'><?= lang('picture') ?></th>
                                        <th class="th-title" width='35%'><?= lang('name') ?> <?= lang('product') ?></th>
                                        <th class="th-title" width='15%'><?= lang('number') ?></th>
                                        <th class="th-title" width='20%'><?= lang('price') ?></th>
                                        <th class="th-title" width='20%'><?= lang('total') ?></th>
                                        <th class="th-title" width='15%'>Action</th>
                                    </tr>
                                    <?php
                                    if (!empty($cart)) {
                                        //    print_r($cart); die(); $v['lang' == @$this->language
                                        $stt = 1;
                                        foreach ($cart as $key => $v) {
                                            if (1 == 1) {
                                                ?>
                                                <tr style="padding: 10px 2px;height: 31px; margin-bottom: 10px !important; ">
                                                    <td class="hidden-xs">
                                                        <a href="#"  title="">
                                                            <?= isset($v['image']) ? '<img  style="width: 150px; height:200px; margin:10px"
                                                  src="' . base_url($v['image']) . '" alt="' . $v['name'] . '" />' : ''; ?>
                                                        </a>
                                                        <input type="hidden" value="<?= $v['rowid']; ?>" id="rowid" name="rowid"/>
                                                    </td>
                                                    <td>
                                                        <a style="font-weight: bold; color: #333" title="<?= $v['name']; ?>"><?= $v['name']; ?></a><br>

                                                    </td>
                                                    <td>
                                                        <div class="numeric-input">
                                                            <input onchange="update_cart('<?= $key ?>', $(this).val())"
                                                                   min="1" max="20"
                                                                   type="number" value="<?= $v['qty']; ?>" id="qty" name="count[]">
                                                            <input type="hidden" name="item_id[]" value="<?= $v['rowid']; ?>">
                                                            <input type="hidden" name="price_sale[]"  value="<?= $v['price_sale']; ?>">
                                                        </div>
                                                    </td>
                                                    <td><?= number_format($v['price_sale']); ?>₫</td>
                                                    <td><span id="item_total<?= $key; ?>"><?= number_format($v['qty'] * $v['price_sale']); ?></span>₫</td>
                                                    <td class="text-center" style="text-align: center">
                                                        <a title="xóa sản phẩm khỏi giỏ hàng" href="<?= base_url('xoa-gio-hang/' . $key) ?>" class="btn btn-danger btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="4" class="align-right"><?= lang('vat') ?></td>
                                            <td><strong><span id="total_cart">  <?= number_format(@$total); ?></span>₫</strong></td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="6" class="align-left"><strong class="red">→
                                                    <?= lang('cartempty') ?></strong></td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (!empty($cart)) { ?>
                                        <tr>
                                            <td colspan="6" class="align-left">
                                                <strong class="red">→  <?= @$shipping->shipping; ?></strong>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--Thong tin dat hang -->
                    <div class="hidden forrm-dathang">
                        <div class="modal-dialog_old modal-md_old">
                            <div class="  modal-content_old" >
                                <div class="panel panel-success" >
                                    <div class="panel-heading">
                                        <div class="panel-title" style="text-align: center">
                                            <?= lang('informationreceiver') ?>
                                            <button style="color: red;opacity: 0.9" type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                    </div>
                                    <div style="padding-top:5px" class="panel-body" >
                                        <div class="col-md-12 wal-payment">
                                            <div class="form-group">
                                                <label for="firstname" class="col-md-3 control-label"> <?= lang('fullname') ?> (*) </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="validate[required] form-control"
                                                           name="fullname"
                                                           value="<?= @$user->fullname; ?>"
                                                           placeholder=" <?= lang('fullname') ?>">
                                                </div>
                                            </div>
                                            <input type="number"  name="lang" class="hidden"
                                                   value="<?= @$this->language ?>"/>
                                            <div class="form-group">
                                                <label for="firstname" class="col-md-3 control-label">
                                                    <?= lang('mobile') ?> (*)</label>
                                                <div class="col-md-9">
                                                    <input type="text"
                                                           class="validate[required,custom[phone]] form-control placeholder"
                                                           name="phone"
                                                           id="phone" placeholder=" <?= lang('mobile') ?>"
                                                           value="<?= @$user->phone; ?>"
                                                           data-original-title="Your activation email will be sent to this address.">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstname" class="col-md-3 control-label">
                                                    Email  (*)</label>
                                                <div class="col-md-9">
                                                    <input type="text"
                                                           class="validate[required,custom[email]] form-control placeholder"
                                                           name="phone"
                                                           id="phone" placeholder="Email"
                                                           value="<?= @$user->email; ?>"
                                                           data-original-title="Your activation email will be sent to this address.">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstname" class="col-md-3 control-label"> <?= lang('address') ?></label>
                                                <div class="col-md-9">
                                                    <textarea type="text" class="
                                                              form-control placeholder" name="address"
                                                              placeholder="<?= lang('address') ?>" data-bind="value: address"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstname" class="col-md-3 control-label"><?= lang('note') ?></label>
                                                <div class="col-md-9">
                                                    <textarea type="text" class=" form-control" name="note"
                                                              placeholder="<?= lang('note') ?>"></textarea>
                                                </div>
                                            </div>
                                            <div style="margin-top:10px; margin: auto" class="form-group">
                                                <!-- Button -->
                                                <div class="col-sm-12 btn-sent-cart controls text-right buy_pro"  >
                                                    <button  name="sendcart"  id="btn-login"  class="btn
                                                             btn-info">Gửi đơn hàng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page Heading -->
                </form>
                <script>
                    function formatNumber(num) {
                        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    function update_cart(id, qty) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: '<?php echo base_url() ?>' + 'shoppingcart/update_cart',
                            data: {id: id, qty: qty},
                            success: function (ketqua) {
                                $('#count_cart').html(ketqua.count);
                                $('#total_cart').html(formatNumber(ketqua.total));
                                $('#item_total' + id).html(formatNumber(ketqua.item_total));
                            }
                        })
                    }
                    function getdistrict(sender) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: $('#baseurl').val() + 'shoppingcart/getdistric',
                            data: {id: sender.val()},
                            success: function (result) {
                                var sc = '';
                                $.each(result, function (key, val) {
                                    sc += '<option value="' + val.districtid + '">' + val.name + '</option>';
                                });
                                $('#district').html(sc);
                            }
                        })
                    }
                    function getward(sender) {
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: $('#baseurl').val() + 'shoppingcart/getward',
                            data: {id: sender.val()},
                            success: function (result) {
                                var sc = '';
                                $.each(result, function (key, val) {
                                    sc += '<option value="' + val.wardid + '">' + val.name + '</option>';
                                });
                                $('#ward').html(sc);
                            }
                        })
                    }
                </script>
                <?php if (!empty($cart)) { ?>
                    <div  class="kk-btn" >
                        <a  class="checkout-button button alt wc-forward" href="<?= base_url('dat-hang') ?>"  style="cursor: pointer;" data-target=".bs-example-modal-sm_checkout_old" data-toggle="modal_old">
                            <?= lang('thuchiendathang') ?></a>
                        <a  class="checkout-button button alt wc-forward" onclick="window.history.go(-2);">
                            <?= lang('continueshopping') ?></a>
                        <a  class="checkout-button button alt wc-forward" href="<?= base_url('shoppingcart/destroy_cart') ?>" onclick="return confirm('Hủy giỏ hàng sẽ xóa toàn bộ sản phẩm trong giỏ hàng của bạn?')">
                            <?= lang('cancellationcart') ?></a> 
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="line-bttcart" style="padding-bottom: 15px;"></div>
</article>
<div class="clearfix"></div>
