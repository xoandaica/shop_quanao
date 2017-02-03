<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog  modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header " style="background: #DFF0D8;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center;font-size: 17px; color: #017824;">
                   <?= lang('inforegitvoucher')?></h4>
            </div>
            <form action="<?= base_url('send_contact')?>" method="post" class="validate" role="form">
            <div class="col-md-12" style="background: #ffffff; border: solid #ccc 1px;">
                <div class="col-md-7">
                    <div class="abc">
                        <div class="title_post_up"
                             style="border-bottom: 1px solid #cccccc;color: #017824;margin-bottom: 15px; margin-top:15px;font-size: 17px;">
                           <?= lang('info')?> <?= lang('contact')?>
                        </div>
                        <div class="col-md-3">
                            <div class="name " style="font-weight:bold;">
                                <?= lang('fullname')?> (*)
                            </div>
                        </div>
                        <input class="hidden" name="dk" value="1" type=""/>
                        <div class="col-md-9">
                            <input type="text" name="full_name" class="validate[required]"
                                   style="width: 100%;border: 1px solid #cccccc;padding:3px 15px;margin-bottom: 15px;"
                                   placeholder="  <?= lang('fullname')?>"/>
                        </div>
                        <div class="col-md-3">
                            <div class="name" style="font-weight:bold;">
                                <?= lang('mobile')?> (*)
                            </div>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="phone" class="validate[required,custom[phone]]"
                                   style="width: 100%;border: 1px solid #cccccc; padding:3px 15px;margin-bottom: 15px;"
                                   placeholder="   <?= lang('mobile')?>"/>
                        </div>
                        <div class="col-md-3">
                            <div class="name" style=" font-weight:bold;">
                                Email (*)
                            </div>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="email" class="validate[required,custom[email]]"
                                   style="width: 100%;border: 1px solid #cccccc;padding:3px 15px;margin-bottom: 15px;"
                                   placeholder="Email"/>
                        </div>
                    </div>
                    <div class="abc">
                        <div class="title_post_up"
                             style="border-bottom: 1px solid #cccccc;color: #017824;margin-bottom: 15px;font-size: 17px;">
                            <?= lang('address')?>
                        </div>
                        <div class="col-md-3">
                            <div class="name" style="font-weight:bold;">
                               <?= lang('city')?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <select name="country" style="margin-bottom: 15px;border: 1px solid #cccccc;padding:3px 15px;height: 34px;">
                                <option value="0">--  <?= lang('city')?>--</option>
                              <?php foreach ($province as $p) { ?>
                                <option ><?= $p->name ?></option>
                              <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="name" style="font-weight:bold;">
                                <?= lang('address')?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="address"
                                   style="width: 100%;border: 1px solid #cccccc;padding:3px 15px;margin-bottom: 15px;"
                                   placeholder=" <?= lang('address')?>"/>
                        </div>
                        <div class="col-md-3">
                            <div class="name" style="font-weight:bold;">
                               <?= lang('note')?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <input type="text" name="note"
                                   style="width: 100%;border: 1px solid #cccccc;padding:3px 15px;margin-bottom: 15px;"
                                   placeholder=" <?= lang('note')?>"/>
                        </div>
                        <div class="col-md-12 " style="text-align: right;margin-bottom: 15px;">
<!--                            <button name="" id="btn-login" class="btn btn-success "-->
<!--                                    style="border-radius: 0px!important;">    --><?//= lang('register')?>
<!--                            </button>-->
                            <div class="pull-right" >
                                <input type="submit"  name="sendcontact2" id="signupuser"
                                       class="btn btn-primary btn-lienhe" style="width: 160px; height: 40px;
                                           background: rgb(1, 120, 36) none repeat scroll 0% 0%; border-radius: 1px; text-align: center; padding: 8px 0px" value="<?= lang('register')?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 " style="margin-bottom: 30px;">
                    <div class="title_post_up"
                         style="border-bottom: 1px solid #cccccc;color: #017824;margin-bottom: 15px;margin-top:15px; font-size: 17px;">
                        <?= lang('payments')?>
                    </div>
                    <div class="col-md-12">
                        <input type="radio"  name="check"  value="1" checked>
                        <strong>
                            <?= lang('paymentsbank')?> <br>
                        </strong>

                        <input type="radio" name="check"  value="Thanh toán tại cửa hàng">
                        <strong>
                            <?= lang('paymentsinshop')?><br>
                        </strong>

                        <input type="radio"name="check"  value="Thanh toán khi nhận được hàng">
                        <strong>
                            <?= lang('paymentsreceiptofgoods')?>
                        </strong>
                    </div>
                    <div class="clearfix"></div>
                    <div style="background:#DAEEF3; clear: both; padding:15px 15px;overflow: hidden;margin-top: 15px;border: solid  1px #ccc;">
                        <div class="col-md-4">
                            <div class="name">
                                <strong>
                                    <?= lang('cardtype')?>
                                </strong>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <select name="bank" style="margin-bottom: 15px;border: 1px solid #cccccc;padding:3px 15px;">
                                <option value="Visa">Visa</option>
                                <option value="Vietcombank">Vietcombank</option>
                                <option value="Techcombank">Techcombank</option>
                                <option value="DongA Bank">DongA Bank</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="name">
                                <strong>   <?= lang('cardnumber')?>  </strong>
                            </div>
                        </div>
                        <div class="col-md-8" style="margin-bottom: 15px;">
                            <input name="cardnumber" type="text" style="width: 100%;margin-bottom: 15px;padding:3px 15px;"
                                   placeholder="<?= lang('cardnumber')?> "/>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="name">
                                <strong>   <?= lang('expirationdate')?> </strong>
                            </div>
                        </div>
                        <div class="col-md-8" style="margin-bottom: 15px;">
                            <input name="expirationdate" type="date" class="validate[custom[date]]  input-sm  form-control" id="datetimepicker8" name="date_end"
                                   placeholder="yyyy-mm-dd"    value="">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="name">
                                <strong>  <?= lang('cardholdersname')?> </strong>
                            </div>
                        </div>
                        <div class="col-md-8" style="margin-bottom: 15px;">
                            <input name="cardholdersname" type="text" style="width: 100%;padding:3px 15px;" placeholder="<?= lang('cardholdersname')?>">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <div class="name">
                                <strong> CVV/CVC2</strong>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <input name="ccvccv2" type="text" placeholder="CVV/CVC2" style="width: 100%;padding:3px 15px;">
                        </div>
                        <div class="clearfix"></div>
                        <div class="dongy" style="padding-top: 15px;">
                        <div class="form-group">
                            <p class="col-md-10 col-md-offset-1" style="overflow: auto; height: 100px;">
                                <b>Điều khoản và Điều kiện chung</b> <br>
                                - Nếu tiền gửi là cần thiết, xin vui lòng giải quyết trong vòng 5 ngày kể từ ngày receival. Nếu đặt phòng được hủy 30 ngày trước khi nhận phòng, hoàn lại tiền đầy đủ sẽ được phát hành. Nếu đặt phòng được hủy bỏ 2 tuần trước khi đến, 50% tiền gửi của bạn sẽ được trả lại. Nếu đặt phòng được hủy 1 tuần trước khi đến, các khoản tiền gửi sẽ bị hủy bỏ.
                                - Đối với hủy bỏ, xin vui lòng liên hệ với chúng tôi ít nhất 48 giờ trước khi hoặc bạn sẽ phải trả một đêm ở lại.
                                - Tỷ giá trên được trích dẫn trong Dollar Mỹ. Tỷ lệ là bao gồm tất cả các loại thuế, phí dịch vụ, ăn sáng tự chọn hàng ngày, Giỏ trái cây tươi, nước uống chào,truy cập internet wi-fi miễn phí khắp các cơ sở khách sạn và trong phòng, máy pha trà / cà phê miễn phítrong phòng và cung cấp hàng ngày 2 chai nước khoáng, dịch vụ đánh giày, máy sấy tóc / cây giày, an toàn trong phòng, áo choàng tắm và dép đi trong nhà.                                                </p>
                            <div class="clearfix" style="height: 10px; width: 100%"></div>
                            <div class="col-md-10">
                                <label style="font-size: 12px">
                                    <input  type="checkbox" name="" value="">&nbsp;&nbsp;&nbsp;&nbsp;<?= lang('agreetoterms')?></label>
                            </div>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
           </form>
        </div>

    </div>
</div >
<div style=""></div>
