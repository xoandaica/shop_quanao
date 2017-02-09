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
    <div class="content-page">
        <div class="kk-new-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 cart-info">
                        <div class="row headding-page">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="new-headding cart-headding"><span>Đặt hàng</span></div>
                            </div>
                            <div class="woocommerce">
                                <form id="checkoutform" action="<?= base_url('dat-hang') ?>" class="validate form-horizontal" method="post" role="form">
                                    <div class="row shopping-address">
                                        <div class="row headding-page">
                                            <div class="col-md-12">
                                                <div class="order-headding"><span>Địa chỉ giao hàng</span></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xs-12">

                                            <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
                                                <label for="billing_first_name" class="">Họ Tên <abbr class="required" title="bắt buộc">*</abbr>
                                                </label>
                                                <input type="text" class="validate[required] form-control input-sm " id="fullname" name="fullname"
                                                       value="<?= @$user_item->fullname; ?>" placeholder="Tên đầy đủ..." onkeyup="change_name()"/>
                                                <input type="hidden" class="validate[required] form-control input-sm " name="user_id"
                                                       value="<?= @$user_item->id; ?>" placeholder="Tên đầy đủ..."/>
                                            </p>

                                            <p class="form-row form-row form-row-first validate-required validate-email" id="billing_email_field">
                                                <label for="billing_email" class="">Địa chỉ email <abbr class="required" title="bắt buộc">*</abbr></label>
                                                <input type="email" class="validate[required] form-control input-sm " id="email" name="email"
                                                       value="<?= @$user_item->email; ?>" placeholder="Email..." onkeyup="change_name()"/>
                                            </p>

                                            <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                                <label for="billing_phone" class="">Số điện thoại <abbr class="required" title="bắt buộc">*</abbr></label>
                                                <input type="text" class="validate[required] form-control input-sm " id="phone" name="phone"
                                                       value="<?= @$user_item->phone; ?>" placeholder="Điện thoại..." onkeyup="change_name()"/>
                                            </p>
                                            <div class="clear"></div>

                                            <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                                <label for="billing_address_1" class="">Địa chỉ <abbr class="required" title="bắt buộc">*</abbr></label>
                                                <input type="text" class="validate[required] form-control input-sm " id="address" name="address"
                                                       value="<?= @$user_item->address; ?>" placeholder="Số, Nhà, Thôn, Xóm.."
                                                       onkeyup="change_name()"/>
                                            </p>

                                            <p class="form-row form-row form-row-wide address-field validate-required" id="billing_city_field">
                                                <label for="billing_city" class="">Tỉnh / Thành phố <abbr class="required" title="bắt buộc">*</abbr></label>
                                                <input type="text" class="validate[required] form-control input-sm " id="province" name="province"
                                                       value="<?= @$user_item->province; ?>" placeholder="Tỉnh / Thành phố.."
                                                       onkeyup="change_name()"/>
                                            </p>
                                            <p class="form-row form-row notes" id="order_comments_field">
                                                <label for="order_comments" class="">Ghi chú đơn hàng</label>
                                                <textarea name="note" class="input-text " id="order_comments" placeholder="Ghi chú về đơn hàng, ví dụ: lưu ý khi giao hàng." rows="2" cols="5"></textarea>

                                            </p>

                                        </div>
                                        <div class="row headding-page">
                                            <div class="col-md-12">
                                                <div class="order-headding"><span>Đơn đặt hàng của bạn</span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered orderinfo-table  itemInfo-table">
                                                    <tbody>
                                                        <tr  style="padding: 10px 2px;height: 31px; margin-bottom: 10px !important; ">
                                                            <th class="th-title hidden-xs" width='25%' ><?= lang('picture') ?></th>
                                                            <th class="th-title" width='25%'><?= lang('name') ?> <?= lang('product') ?></th>
                                                            <th class="th-title" width='15%'><?= lang('number') ?></th>
                                                            <th class="th-title" width='20%'><?= lang('price') ?></th>
                                                            <th class="th-title" width='20%'><?= lang('total') ?></th>
                                                        </tr>
                                                        <?php
                                                        if (!empty($cart)) {
                                                            //    print_r($cart); die(); $v['lang' == @$this->language
                                                            foreach ($cart as $key => $v) {
                                                                ?>
                                                                <tr style="padding: 10px 2px;height: 31px; margin-bottom: 10px !important; ">
                                                                    <td class="hidden-xs">
                                                                        <a href="#"  title="">
                                                                            <?= isset($v['image']) ? '<img  style="width: 250px; height:200px;"
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
                <!--                                                    <td class="text-center" style="text-align: center">
                                                                        <a title="xóa sản phẩm khỏi giỏ hàng" href="<?= base_url('xoa-gio-hang/' . $key) ?>" class="btn btn-danger btn-xs">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </td>-->
                                                                </tr>
                                                                <?php
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
                                        <div class="clearfix-10"></div>
                                        <div class="col-sm-7 controls text-right">
                                            <div class="row btn-sent-cart" style="margin-bottom: 10px;">
                                                <button name="sendcart_dathang" class="checkout-button button alt wc-forward" style="background-color: black">Gửi đơn hàng</button>
                                            </div>
                                        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="p-relative" style="min-height: 450px;">
                    <!--                    <div class="box_title_x  w_100">
                                            <a href="<?= base_url() ?>" class="back_link" title="">TRANG CHỦ </a>
                                            <i class="fa fa-angle-right" style="color: #17100a"></i>
                                            <a  class="back_link" href="">Thanh toán đặt hàng</a>
                                        </div>-->

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
                                url: '<?php echo base_url() ?>' + 'shoppingcart/check_sale',
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
                                        url: '<?php echo base_url() ?>' + 'shoppingcart/check_sale',
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
                                url: '<?php echo base_url() ?>' + 'shoppingcart/update_shipping',
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
                                url: '<?php echo base_url() ?>' + 'shoppingcart/update_cart',
                                data: {id: id, qty: qty},
                                success: function (ketqua) {
                                    $('#count_cart').html(ketqua.count);
                                    $('#new_total').html('<input type="text" class="input_fomart" style=""  name="total_price" value="' + formatNumber(ketqua.total) + 'đ' + '">');
                                    $('#total_cart').html(formatNumber(ketqua.total));
                                    $('#item_total' + id).html(formatNumber(ketqua.item_total));
                                    $('.number_item').html(ketqua.count);
                                    $('.total_price').html(formatNumber(ketqua.total));
                                }
                            })
                        }
  </script>
                    <script>
                            function payment_note1(temp_value) {                             $('.payment-note').hide();
                            $('#payment-note' + temp_value).show();
                        }
  </script>
                    <script type="text/javascript" src="<?= base_url('assets/js/site/pro_detail.js') ?>"></script>



                </div></div>
        </div></div>

</article>