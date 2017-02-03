

<div class="clearfix-10"></div>
<div class="header_raovat">
    <div class="raovat_title col-md-19 col-md-4 margin-right-1">Mẫu gửi thông tin rao vặt</div>
    <div class="col-md-80 col-md-8">

    </div>
</div>
<div class="clearfix-10"></div>

<div class="container_raovat">
    <div class="head_rv">Nội dung đăng tin rao vặt</div>
    <form   class="validate form-horizontal"   method="post" action="" role="form" enctype="multipart/form-data" >
        <input type="hidden" name="session" value="2"> <!-- check session products-->
        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Chọn danh mục tin đăng:</label>
            <div class="col-sm-3">
                <select name="category_id" class="form-control input-sm input_blue">
                    <option value="" class="validate[required] form-control input-sm">Chọn danh mục</option>
                    <?php foreach($cate as $cat){?>
                        <option value="<?= $cat->id; ?>"
                            <?= $cat->id == @$edit->category_id?'selected':''; ?>><?= $cat->name; ?></option>

                        <?php foreach($cate as $sub){
                            if($cat->id==$sub->parent_id){?>
                                <option value="<?= $sub->id; ?>"
                                    <?= $sub->id == @$edit->category_id?'selected':''; ?>>
                                    &nbsp;&nbsp;&nbsp;-&nbsp;<?= $sub->name; ?>
                                </option>
                            <?php }} ?>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Khu vực bán:</label>
            <div class="col-sm-3">
                <select name="provinceid" class="form-control input-sm input_blue">
                    <option value="" class="validate[required] form-control input-sm">Tỉnh/Thành</option>
                    <?php foreach($province as $provi){?>
                        <option value="<?= $provi->provinceid; ?>"
                            <?= $provi->provinceid == @$edit->provinceid?'selected':''; ?>><?= $provi->name; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Tiêu đề tin:</label>
            <div class="col-sm-3">
                <input type="text" class="validate[required] form-control input-sm input_blue" name="name"
                       placeholder="Dùng tiếng việt cấu dấu" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Nội dung tin:</label>
            <div class="col-sm-4">
                <textarea name="detail" style="height: 200px" class=" form-control placeholder input_blue" id="ckeditor"  ></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Ảnh đại diện:</label>
            <div class="col-sm-2 ">
                <div class="text-left">
                    <input name="product_image"  type="hidden" id="ImageUrl" class="input-sm form-control"
                           value="<?= @$edit->image;?>">
                    <div id="img_view" style="text-align: left">
                        <img src="<?=file_exists(@$edit->image)?base_url($edit->image):base_url('img/ic_brower.png');?>"
                             style="max-width: 100%;"/>
                    </div>
                    <div class="text-left">
                        <a id="btnSelectImg" style="cursor: pointer">Chọn ảnh</a> |
                        <a id="remove_img" style="cursor: pointer">Hủy bỏ</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">
                <a onclick="add_more_image();" style="cursor: pointer;margin-bottom: 15px; display: block">
                    <i class="fa fa-plus"></i> Thêm hình ảnh</a>
            </label>
            <div class="col-sm-6 ">
                <div id="list_image">
                    <?php if (!empty($images)) {
                        foreach ($images as $imgage) {
                            if (file_exists($imgage->link)) {
                                ?>
                                <div class="img_group col-md-4">
                                    <div class="remove_image_item pull-right">×</div>
                                    <div class="clearfix"></div>
                                    <input name="more_file[]" type="hidden" id="item_url<?= $imgage->id; ?>"
                                           class="input-sm form-control" value="<?= $imgage->link; ?>">

                                    <div id="id_item<?= $imgage->id; ?>" class="img_div">
                                        <img src="<?= base_url($imgage->link); ?>" alt=""
                                             style="max-width: 100%;"/>
                                    </div>
                                    <div class="text-center">
                                        <a class="select_image" style="cursor: pointer"
                                           data-item="id_item<?= $imgage->id; ?>"
                                           data-url="item_url<?= $imgage->id; ?>">Chọn</a> |
                                        <a class="remove_image" style="cursor: pointer"
                                           data-item="id_item<?= $imgage->id; ?>"
                                           data-url="item_url<?= $imgage->id; ?>">Hủy</a>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                    }?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Giá:</label>
            <div class="col-sm-3">
                <input type="text" class="validate[required] form-control input-sm input_blue " name="price_sale"
                    id="product_price_sale"  data-v-max="9999999999999" data-v-min="0"   placeholder="VND" value="" />

            </div>
            <div class="col-sm-2" style="padding: 0">/Đơn vị/Cái/Chiếc</div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Số Lượng:</label>
            <div class="col-sm-3">
                <input type="text" class=" form-control input-sm input_blue" name="counter"
                       placeholder="Số lượng sản phẩm" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Tình trạng:</label>
            <div class="col-sm-3">
                <label style="font-weight: normal">
                    <input class="check_branch" type="checkbox" value="1" name="tinhtrang" style="margin: 0px">
                    <span>Mới</span>
                 </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label style="font-weight: normal">
                    <input class="check_branch" type="checkbox" value="2" name="tinhtrang"  style="margin: 0px">
                    <span>Đã qua sử dụng</span>
                 </label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Các hình thức thanh toán:</label>
            <div class="col-sm-3">
                <label class="red control-label text-left lalbe_rv">Người mua và người bán tự thỏa thuận</label>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="head_rv">Thông tin liên hệ</div>
        <div class="clearfix"></div>

        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Họ tên người đăng ký:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control input-sm input_blue" name="name_rv" placeholder="" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Email:</label>
            <div class="col-sm-3">
                <input type="text" class="  form-control input-sm input_blue" name="email" placeholder="" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Điện thoại:</label>
            <div class="col-sm-3">
                <input type="text" class="  form-control input-sm input_blue" name="phone" placeholder="" value="" />
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Địa chỉ:</label>
            <div class="col-sm-3">
                <input type="text" class="  form-control input-sm input_blue" name="address" placeholder="" value="" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-50 text-center">
            <button type="submit" name="addnews"  class="btn btn-primary btn-sm btt_dangtin">Đăng tin </button>
            </div>
        </div>
    </form>
</div>
<script src="<?= base_url('assets/ckfinder/ckfinder.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/site/image_site_add.js')?>" type="text/javascript"></script>
<link href="<?= base_url('assets/css/site/custom-file-input.css') ?>" rel="stylesheet" media="all"/>
<script src="<?= base_url('assets/plugin/autonumber/autoNumeric.js') ?>"></script>
<script src="<?= base_url('assets/plugin/autonumber/jquery.number.js') ?>"></script>

<script type="text/javascript">
    $('#product_price,#product_price_sale').autoNumeric(0);
    $(function(){
        $(".check_branch").click(function(){
            $(".check_branch").prop("checked",false);
            $(this).prop("checked",true);

        });
    });
</script>
