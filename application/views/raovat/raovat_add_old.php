

<div class="clearfix-10"></div>
<div class="header_raovat">
    <div class="raovat_title col-md-19 col-md-4 margin-right-1">Mẫu gửi thông báo rao vặt</div>
    <div class="col-md-80 col-md-8">

    </div>
</div>
<div class="clearfix-10"></div>

<div class="container_raovat">
    <div class="head_rv">Nội dung đăng tin rao vặt</div>
    <form   class="validate form-horizontal"   method="post" action="" role="form" enctype="multipart/form-data" >

        <div class="form-group">
            <label class="col-sm-2 control-label text-left lalbe_rv">Chọn danh mục tin đăng:</label>
            <div class="col-sm-3">
                <select name="category_id" class="form-control input-sm input_blue">
                    <option value="" class="validate[required] form-control input-sm">Chọn danh mục</option>
                    <?php foreach($category_product as $cate){?>
                        <option value="<?= $cate->id; ?>"
                            <?= $cate->id == @$edit->category_id?'selected':''; ?>><?= $cate->name; ?></option>

                            <?php foreach($category_product as $sub){
                            if($cate->id==$sub->parent_id){?>
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
            <div class="col-sm-4">
                    <input name="product_image"  type="hidden" id="ImageUrl" class="input-sm form-control"
                           value="<?= @$edit->product_image;?>">

                    <div id="img_view" style="text-align: center">
                        <img src="<?=file_exists(@$edit->product_image)?base_url($edit->product_image):base_url('img/ic_brower.png');?>"
                             style="max-width: 100%;"/>
                    </div>
                    <div class="text-center">
                        <a id="btnSelectImg" style="cursor: pointer">Chọn ảnh</a> |
                        <a id="remove_img" style="cursor: pointer">Hủy bỏ</a>
                    </div>
            </div>
        </div>
   </form>
</div>


<script src="<?= base_url('assets/ckfinder/ckfinder.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/site/image_site_add.js')?>" type="text/javascript"></script>
<link href="<?= base_url('assets/css/site/custom-file-input.css') ?>" rel="stylesheet" media="all"/>