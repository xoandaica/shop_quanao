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
    <!--<div class="container">
    <div class="p-relative" style="min-height: 450px;">
    <div class="box_title_x  w_100">
        <a href="<?= base_url() ?>" class="back_link" title="">TRANG CHỦ </a>
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
    <?php
    if (!empty($cart)) {
        $stt = 1;
        foreach ($cart as $key => $v) {
            ?>
                                                                                <div style="padding-bottom: 5px; border-bottom: 1px solid #ddd; margin-bottom: 10px">
                                                                                    <aside class="col-md-3 col-sm-3 col-xs-3">
                                                                                        <a href="#" title="">
            <?= isset($v['image']) ? '<img  style="padding: 9px;" class="w_100" src="' . base_url($v['image']) . '" alt="' . $v['name'] . '" />' : ''; ?>
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
     Button 
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
    
    
    
    </div></div>-->
    <div class="content-page">
        <div class="kk-new-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 cart-info">
                        <div class="row headding-page">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="new-headding cart-headding"><span>Đặt hàng</span></div>
                            </div>
                        </div>
                        <div class="woocommerce">
                            <form name="checkout" method="post" class="checkout woocommerce-checkout" id="checkoutform" action="<?= base_url('dat-hang') ?>" enctype="multipart/form-data">

                                <div class="row shopping-address">
                                    <div class="col-md-12 col-xs-12">


                                        <h3>Địa chỉ giao hàng</h3>




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
                                </div>
                                <div class="row headding-page">
                                    <div class="col-md-12">
                                        <div class="order-headding"><span>Đơn đặt hàng của bạn</span></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="cart-table">
                                            <table class="shop_table woocommerce-checkout-review-order-table">
                                                <thead>
                                                    <tr>
                                                        <th class="product-thumbnail"><div>Hình ảnh</div></th>
                                                        <th class="product-name">Sản phẩm</th>
                                                        <th class="product-total">Tổng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="cart_item">
                                                        <!-- The thumbnail -->
                                                        <td class="product-thumbnail">

                                                            <a href="http://kkfashion.vn/shop/dam-cong-so-kk63-39/"><img width="146" height="168" alt="" class="attachment-shop_thumbnail wp-post-image" src="http://kkfashion.vn/wp-content/uploads/images/146_168/KK63/dam-cong-so-kk63-39.jpg"></a>

                                                        </td>						
                                                        <td class="product-name">
                                                            Đầm công sở KK63-39&nbsp;							 <strong class="product-quantity">× 1</strong>							<dl class="variation">
                                                                <dt class="variation-Size">Size:</dt>
                                                                <dd class="variation-Size"><p>XL</p>
                                                                </dd>
                                                            </dl>
                                                        </td>
                                                        <td class="product-total">
                                                            <span class="amount">410,000</span>						</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>

                                                    <tr class="cart-subtotal">
                                                        <th colspan="2" style="text-transform: uppercase;">Giá trị đơn hàng</th>
                                                        <td><span class="amount">410,000</span></td>
                                                    </tr>






                                                    <tr class="order-total">
                                                        <th colspan="2" style="text-transform: uppercase; font-weight: bold;">Tổng</th>
                                                        <td><strong><span class="amount">410,000</span></strong> </td>
                                                    </tr>


                                                </tfoot>
                                            </table>



                                            <div id="payment" class="woocommerce-checkout-payment">
                                                <ul class="payment_methods methods">
                                                    <li class="payment_method_cod">
                                                        <input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" data-order_button_text="" checked="checked">

                                                        <label for="payment_method_cod">
                                                            Cash on Delivery 	</label>
                                                        <div class="payment_box payment_method_cod" style="display:none;">
                                                            <p>Pay with cash upon delivery.</p>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <div class="form-row place-order">

                                                    <noscript>Trình duyệt của bạn không hỗ trợ JavaScript, hoặc nó bị vô hiệu hóa, hãy đảm bảo bạn nhấp vào &lt;em&gt; Cập nhật giỏ hàng &lt;/ em&gt; trước khi bạn thanh toán. Bạn có thể phải trả nhiều hơn số tiền đã nói ở trên, nếu bạn không làm như vậy.&lt;br/&gt;&lt;input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Cập nhật tổng" /&gt;</noscript>

                                                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="6543e077c6"><input type="hidden" name="_wp_http_referer" value="/checkout/?wc-ajax=update_order_review">

                                                    <input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Đặt hàng" data-value="Đặt hàng">


                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>




                            </form>




                            <script type="text/javascript">

                                jQuery('#xcsearch').click(function () {
                                    $.blockUI({css: {
                                            border: 'none',
                                            padding: '15px',
                                            backgroundColor: '#000',
                                            '-webkit-border-radius': '10px',
                                            '-moz-border-radius': '10px',
                                            opacity: .5,
                                            color: '#fff'
                                        }});
                                    jQuery.post('http://kkfashion.vn/client-billing', {key_value: jQuery('#xcfilter').val()}, function ($data) {
                                        if ($data) {
                                            jQuery('#billing_first_name').val($data.billing_first_name);
                                            jQuery('#billing_address_1').val($data.billing_address_1);
                                            jQuery('#billing_city').val($data.billing_city);
                                            jQuery('#billing_email').val($data.billing_email);
                                            jQuery('#billing_phone').val($data.billing_phone);
                                        } else {
                                            alert("Chưa có trong hệ thống, bạn vui lòng điền thông tin phía dưới  ");
                                            jQuery('#billing_first_name').focus();
                                        }
                                        $.unblockUI();
                                    }, 'json');
                                });
                            </script>




                            <!-- Google Code for K&amp;K Fashion Conversion Conversion Page kokonols@-->
                            <script type="text/javascript">
                                /* <![CDATA[ */
                                var google_conversion_id = 965184839;
                                var google_conversion_language = "en";
                                var google_conversion_format = "3";
                                var google_conversion_color = "ffffff";
                                var google_conversion_label = "igimCPGVhVgQx5qezAM";
                                var google_remarketing_only = false;
                                /* ]]&gt; */
                            </script>
                            <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
                            </script><img height="1" width="1" border="0" alt="" src="https://www.googleadservices.com/pagead/conversion/965184839/?random=1486569276193&amp;cv=8&amp;fst=1486569276136&amp;num=2&amp;fmt=3&amp;label=igimCPGVhVgQx5qezAM&amp;bg=ffffff&amp;hl=en&amp;guid=ON&amp;u_h=768&amp;u_w=1366&amp;u_ah=728&amp;u_aw=1366&amp;u_cd=24&amp;u_his=6&amp;u_tz=420&amp;u_java=false&amp;u_nplug=5&amp;u_nmime=7&amp;frm=0&amp;url=http%3A%2F%2Fkkfashion.vn%2Fcheckout%2F&amp;ref=http%3A%2F%2Fkkfashion.vn%2Fcart%2F&amp;tiba=%C4%90%E1%BA%B7t%20h%C3%A0ng%20%7C%20Th%E1%BB%9Di%20trang%20c%C3%B4ng%20s%E1%BB%9F%20K%26K%20Fashion%202016" style="display:none">
                            <noscript>
                            &lt;div style="display:inline;"&gt;
                            &lt;img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/965184839/?label=igimCPGVhVgQx5qezAM&amp;amp;guid=ON&amp;amp;script=0"/&gt;
                            &lt;/div&gt;
                            </noscript>
                            <!-- End of Google Code for K&amp;K Fashion Conversion Conversion Page kokonols@ -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</article>