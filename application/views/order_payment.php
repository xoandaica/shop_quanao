<style type="text/css">
    .infor_contact_cart {
        padding: 9px;
        background-color: #FFF9AE;
        margin-bottom: 15px;
    }
    .infor_contact_cart strong {
       color: #000;
    }
</style>
<article>
<div class="container">
<div class="p-relative" style="min-height: 450px;">
<div class="box_title_x  w_100">
    <a href="<?= base_url()?>" class="back_link" title="">TRANG CHỦ </a>
    <i class="fa fa-angle-right" style="color: #17100a"></i>
    <a  class="back_link" href="">Thanh toán đặt hàng</a>
</div>
<div class="row">
<form id="checkoutform" action="<?= base_url('dat-hang') ?>" class="validate form-horizontal" method="post" role="form">
<div class="col-md-6 col-sm-6">
    <div class="">
        <div class="box_infoCart" style="margin-top: 0">
            <div class="infor_contact_cart ">
                <strong>Thông tin người nhận hàng</strong>
            </div>
            <div class="clearfix-10"></div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Họ tên</label>
                <div class="col-sm-7">
                    <input type="text" class="validate[required] form-control input-sm " id="fullname" name="fullname"
                           value="<?= @$user_item->fullname; ?>" placeholder="" onkeyup="change_name()"/>
                    <input type="hidden" class=" form-control input-sm " name="user_id"
                           value="<?= @$user_item->id; ?>" placeholder=""/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2  control-label">Email</label>
                <div class="col-sm-7">
                    <input type="text" class="validate[required] form-control input-sm " id="email" name="email"
                           value="<?= @$user_item->email; ?>" placeholder="" onkeyup="change_name()"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2  control-label">Điện thoaị</label>
                <div class="col-sm-7">
                    <input type="text" class="validate[required] form-control input-sm " id="phone" name="phone"
                           value="<?= @$user_item->phone; ?>" placeholder="Điện thoại..." onkeyup="change_name()"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2  control-label">Địa chỉ</label>
                <div class="col-sm-7">
                    <input type="text" class="validate[required] form-control input-sm " id="address" name="address"
                           value="<?= @$user_item->address; ?>" placeholder="Số, Nhà, Thôn, Xóm.."
                           onkeyup="change_name()"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2  control-label">Tình thành</label>
                <div class="col-sm-7">
                    <select name="province" class=" validate[required] required form-control input-sm">
                        <option class=" validate[required]" value="">--Chọn tỉnh thành--</option>
                        <?php foreach ($province as $v) { ?>
                            <option
                                value="<?= $v->provinceid; ?>"  <?= $v->provinceid == @$user_item->province ? 'selected' : '' ?>>
                                <?= $v->name; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2  control-label">Ghi chú</label>
                <div class="col-sm-7">
                    <input type="text" class=" form-control input-sm " name="note" id="note"
                           value="" placeholder="Hình ảnh, màu sắc sản phẩm.." onkeyup="change_name()"/>
                </div>
            </div>
            <div class="form-group" style="display: none !important;">
                <div class="col-md-12">
                    <div style="background: #edf0f0; color: #454444; margin: 0px 10px; padding: 10px; display: none">
                        Thời gian giao hàng từ 1-2 ngày đối với Hà Nội, 2-3 ngày đối với Tp HCM, 4-7 ngày đối với các
                        tỉnh thành khác.
                        Phí giao hàng quy định như sau: Nội thành Hà Nội: 10.000đ, Nội thành Tp. HCM: 20.000đ, Tỉnh
                        thành khác: 30.000đ
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-md-6 col-sm-6" style="border-left: 1px #ddd solid">
    <aside>
        <div class="col-md-12">
            <div class="row">
                <div class="box_infoCart" style="margin-top: 0">
                    <div class="infor_contact_cart clearfix">
                        <strong>Thông tin đơn hàng</strong>
                    </div>
                    <?php if (!empty($cart)) {
                        $stt = 1;
                        foreach ($cart as $key => $v) {
                            ?>
                            <div style="padding-bottom: 5px; border-bottom: 1px solid #ddd; margin-bottom: 10px">
                                <aside class="col-md-3 col-sm-3 col-xs-3">
                                    <a href="#" title="">
                                        <?= isset($v['image']) ? '<img  style="padding: 9px;" class="w_100" src="' . base_url($v['image']) . '" alt="' . $v['name'] . '" />' : '';?>
                                    </a>
                                    <input type="hidden" value="<?= $v['rowid']; ?>" id="rowid" name="rowid"/>
                                </aside>
                                <aside class="col-md-9 col-ms-9 col-xs-9" style="padding-top: 9px;">
                                    <div class="row">
                                        <div class="infor_name">
                                            <a style="color: #333;" href="<?= @$v['url']; ?>"
                                               title="<?= $v['name']; ?>"><strong><?= $v['name']; ?></strong></a>
                                        </div>
                                        <section class="row">
                                            <div class="col-md-4 col-sm-4 col-xs-4">
                                                <?= number_format($v['price_sale']); ?>₫</br>
                                                <span class="gray text-center font_size_10">Giá tiền</span>
                                            </div>
                                            <div class="col-md-4  col-sm-4 col-xs-4">
                                                <div class="numeric-input">
                                                    <div class="col-md-12">
                                                        <input class="" style="max-width:60px "
                                                               onchange="update_cart('<?= $key ?>',$(this).val())"
                                                               min="1" max="20" type="number" value="<?= $v['qty']; ?>"
                                                               id="qty" name="count[]">
                                                        <input type="hidden" name="item_id[]"
                                                               value="<?= $v['rowid']; ?>">
                                                        <input type="hidden" name="price_sale[]"
                                                               value="<?= $v['price_sale']; ?>"></br>
                                                        <span class="gray text-center font_size_10">Số lượng:</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <span
                                                        id="item_total<?= $key; ?>"><?= number_format($v['qty'] * $v['price_sale']); ?></span>₫</br>
                                                    <span class="gray text-center font_size_10">Thành tiền</span>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </aside>
                                <div class="clearfix-10"></div>
                            </div>
                            <div class="clearfix"></div>
                        <?php } ?>
                        <div class="clearfix-10"></div>
                        <div class="clearfix-5"></div>
                        <div class="total ">
                            <div class="">
                                <label class="col-md-9 text-left">
                                    Tổng tiền đơn hàng (chưa bao gồm VAT):
                                </label>
                                <div class="col-md-3 text-right">
                                    <span><?= number_format($total) ?></span><sup>đ</sup>
                                </div>
                            </div>
                            <div class="clearfix-10"></div>
                            <div class="hidden">
                                <label class="col-md-4 col-sm-4 col-xs-4 text-left">
                                    Phí vận chuyển
                                </label>
                                <div class="col-sm-5 col-sm-5 col-xs-5 ">
                                    <select name="shipping" class=" required form-control input-sm" id="shipping"
                                            onchange="update_shipping($(this).val())">
                                        <option class="validate[required]" value="">--Chọn khu vực--</option>
                                        <?php foreach ($shipping as $ship) { ?>
                                            <option value="<?= $ship->price; ?>"><?= $ship->name; ?>  </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 control-label">
                                    <strong class="shipprice">
                                        0đ
                                    </strong>
                                </div>
                            </div>
                            <div class="clearfix-10"></div
                            <div class="hidden clearfix ">
                                <label class="hidden col-sm-4 col-sm-4 col-xs-4">Mã giảm giá</label>
                                <label class="hidden col-sm-4 col-sm-4 col-xs-4 ">
                                    <div class="" style="position: relative; width: 100%">
                                        <input type="text" id='sale_code' name="sale_code" style="width: 100%"
                                               placeh   older="Mã giảm giá">
                                        <div id="isset_code"
                                             style="position: absolute; right: 5px; margin-top: -20px;display: none "
                                             class="text-success">
                                        </div>
                                    </div>
                                </label>
                                <div class="hidden col-sm-4 col-sm-4 col-xs-4 control-label" style="font-weight: bold">
                                       <span id="price_sale">  0 %</span>
                                    <span id="price_sale_code"></span>
                                </div>
                            </div>
                            <div class="clearfix-10"></div>
                            <div class="hidden" style=" border-top: 1px solid #ddd; padding-top: 10px ">
                                <label class="col-md-8 col-sm-8 col-xs-8 text-left red"
                                       style="font-size: 12px; padding-bottom: 10px">
                                    Tổng tiền phải thanh toán (Chưa bao gồm VAT)<i></i>
                                </label>
                                <div class="col-md-4 col-sm-4 col-xs-4 text-right red">
                                    <div id="new_total">
                                    <b><?= number_format(@$total); ?><sup>đ</sup></b>
                                    </div>
                                    <input type="hidden" id="total_price_add" value="<?= (@$total); ?>"
                                           name="total_price_add" placeholder="Số tiền phải thanh toán">
                                    <input type="hidden" name="shipping" value="0" id="value_ship">
                                    <input type="hidden" value="0" id="value_code">
                                    <input type="hidden" value="<?= @$total . 'đ' ?>" id="_total">
                                    <input name="total_all" type="hidden" value="<?= @$total . 'đ' ?>"
                                           id="_total_input">
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6" class="align-left"><strong class="red">→
                                    Giỏ hàng của bạn hiện không có sản phẩm nào!</strong></td>
                        </tr>
                    <?php } ?>
                </div>
            </div>
        </div>
    </aside>
</div>
<div class="clearfix-10"></div>
<!-- Button -->
<div class="col-sm-7 controls text-right">
    <div class="row btn-sent-cart" style="margin-bottom: 10px;">
        <button name="sendcart_dathang" class="btn btn-blue btn-send-cart">Gửi đơn hàng</button>
    </div>
</div>
</form>
<script>
    function change_name() {
        var fullname = $("#fullname").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var address = $("#address").val();
        var note = $("#note").val();
        document.getElementById('payer_name').value = fullname;
        document.getElementById('payer_phone_no').value = phone;
        document.getElementById('payer_email').value = email;
        document.getElementById('address_hidden').value = address;
        document.getElementById('note_hidden').value = note;
    }
    $('#sale_code').keyup(function () {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '<?php echo base_url()?>' + 'shoppingcart/check_sale',
            data: {code: $(this).val()},
            success: function (rs) {
                if (rs.check == true) {
                    /*alert($('#_total').val());*/
                    var _total = parseInt($('#_total').val()) * parseInt(rs.item.price) / 100;
                    $('#value_code').val(_total);
                    $('#price_sale').html(rs.item.price + '%');
                    $('#price_sale_code').html('<input type="hidden" name="code_sale_all" class="input_fomart" style="padding-left: 40px !important;" value="'
                        + rs.item.price + '">');
                    $('#new_total').html('<b class="red" >' + formatNumber((parseInt($('#_total').val()) - parseInt(_total)) + parseInt($('#value_ship').val())) + 'đ</b>');
                    $('#_total_input').val(parseInt($('#_total').val()) - _total);
                    $('#isset_code').html('<i class="fa fa-check"></i>').fadeIn('show').css('color', '#569b4a');
                    /* total bao kim */
                    $("#total_amount").val(((parseInt($('#_total').val()) - parseInt(_total)) + parseInt($('#value_ship').val())));
                    $("#total_price_add").val(((parseInt($('#_total').val()) - parseInt(_total)) + parseInt($('#value_ship').val())));
                    $("#code_sale_all_hidden").val(rs.item.price);
                }
            }
        })
    })
        .change(function () {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: '<?php echo base_url()?>' + 'shoppingcart/check_sale',
                data: {code: $(this).val()},
                success: function (rs) {
                    if (rs.check == false) {
                        var _total = parseInt($('#_total').val()) * parseInt(rs.item.price_sale) / 100;
                        $('#new_total').html(formatNumber(parseInt($('#_total').val() - parseInt(_total)) + parseInt($('#value_ship').val())) + 'đ');
                        $('#isset_code').html('<i class="fa fa-times"></i>').fadeIn('show').css('color', 'red');
                        $('#price_sale').html(rs.item.price_sale);
                    }
                }
            })
        });
    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
    }
    function update_shipping(price_sale) {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '<?php echo base_url()?>' + 'shoppingcart/update_shipping',
            data: {price_sale: price_sale},
            success: function (ketqua) {
                $('#new_total').html('<b class="red" >' + formatNumber(parseInt($('#_total').val()) + (-parseInt($('#value_code').val()) +
                    parseInt(ketqua.shipp))) + 'đ</b>');
                $('#value_ship').val(ketqua.shipp);
                $('.shipprice').html('<input type="text" style="float: left; padding-left: 32px !important;" name="price_ship"  class="input_fomart" value="' + (ketqua.shipp) + '">' + '<b style="float: left;color: red;">đ</b>');
                $('.total_price').html(formatNumber(ketqua.total));
                /* total bao kim*/
                $("#total_amount").val((parseInt($('#_total').val()) + (-parseInt($('#value_code').val()) + parseInt(ketqua.shipp))));
                $("#total_price_add").val((parseInt($('#_total').val()) + (-parseInt($('#value_code').val()) + parseInt(ketqua.shipp))));
                $("#price_ship_hidden").val(ketqua.shipp);
            }
        })
    }
    function update_cart(id, qty) {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: '<?php echo base_url()?>' + 'shoppingcart/update_cart',
            data: {id: id, qty: qty},
            success: function (ketqua) {
                $('#count_cart').html(ketqua.count);
                $('#new_total').html('<input type="text" class="input_fomart" style=""  name="total_price" value="' + formatNumber(ketqua.total) + 'đ' + '">');
//                        $('#total_cart').html(formatNumber(ketqua.total));
                $('#item_total' + id).html(formatNumber(ketqua.item_total));
                $('.number_item').html(ketqua.count);
                $('.total_price').html(formatNumber(ketqua.total));
            }
        })
    }
</script>
<script>
    function payment_note1(temp_value) {
        $('.payment-note').hide();
        $('#payment-note' + temp_value).show();
    }
</script>
<script type="text/javascript" src="<?= base_url('assets/js/site/pro_detail.js') ?>"></script>



</div>

</article>