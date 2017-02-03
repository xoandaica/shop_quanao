<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?=base_url('vnadmin')?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i>
                        <a href="<?=base_url('vnadmin/news/newslist')?>">Danh sách Tin tức <?= @$name_lang; ?> </a>
                    </li>
                    <li>
                        <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a>
                    </li>
                    <?= @$images_lang; ?>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="row" style="padding-bottom: 15px">
                    <div class="col-md-3" style="padding-bottom: 10px">
                        <a href="<?= base_url('vnadmin/news/add') ?>">
                            <div class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Thêm</div>
                        </a>
                    </div>
                    <div class="col-md-9" >
                        <form action="" method="get" class="row">
                            <div class="col-sm-2 pull-right text-right">
                                <button type="submit" class="btn btn-sm btn-default">
                                    <i class="fa fa-search"></i>  Tìm kiếm
                                </button>
                            </div>
                            <div class="col-sm-2 pull-right hidden">
                                <select name="view" class="input-sm form-control" >
                                    <option value="">Hiển thị</option>
                                    <option value="home" <?=$this->input->get('view')=='home'?'selected':'';?> ><?= _title_news_home ?></option>
<!--                                    <option value="hot" --><?//=$this->input->get('view')=='hot'?'selected':'';?><!-->--><?//= _title_news_hot ?><!--</option>-->
<!--                                    <option value="focus" --><?//=$this->input->get('view')=='focus'?'selected':'';?><!-->--><?//= _title_news_focus ?><!--</option>-->
<!--                                    <option value="coupon" --><?//=$this->input->get('view')=='coupon'?'selected':'';?><!-->--><?//= _title_news_coupon ?><!--</option>-->
                                </select>
                            </div>
                            <div class="col-sm-3 pull-right">
                                <select name="cate" class="input-sm form-control">
                                    <option value="">Danh mục</option>
                                    <?php view_news_cate_select2($cate,0,'',@$this->input->get('cate'));?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3 pull-right">
                                    <input name="name" type="search" value="<?=$this->input->get('name');?>"
                                           placeholder="Tiêu đề..." class="form-control input-sm">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="">
                    <div class="clear"></div>
                    <table class="table table-hover table-bordered">
                        <form action="<?= base_url('vnadmin/news/delete_check')?>" method="post" class="row">
                            <div class="col-md-3 display_none" style="padding: 0px; margin-bottom: 10px">
                                <button type="submit" class="btn btn-danger btn-xs" name="addnews">
                                    <i class="fa fa-times"></i> Xóa những tin được chọn
                                </button>
                            </div>
                            <tr>
                                <th class="text-center display_none">
                                    <input type="checkbox" name="check_all">
                                </th>
                                <th class="text-center">STT</th>
                                <th>Ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
<!--                                <th class="text-center">Trạng thái</th>-->
                                <th class="hidden">Hiển thị</th>
                                <th class="text-center">Action</th>
                            </tr>
                            <?php if (isset($newslist)) {
                                $stt=1; foreach ($newslist as $v) { ?>
                                    <tr>
                                        <td width="2%" class="text-center display_none">
                                            <input name="news_check[]" type="checkbox" class="idRow" value="<?=@$v->id;?>">
                                        </td>
                                        <td width="4%" class="text-center"><?= $stt++; ?></td>
                                        <td width="10%"><?php if (file_exists(@$v->image)) { ?>
                                                <img src="<?= base_url(@$v->image) ?>" style="height: 35px">
                                            <?php } else echo "No image" ?>
                                        </td>
                                        <td>  <?= @$v->title ?>  </td>
                                        <td width="20%">
                                            <?=$v->cat_name;?>
                                        </td>
                                        <td width="10%" class="text-center display_none">
                                            <label class="checkbox-inline" onclick="show_news(<?=$v->id;?>)">
                                                <input type="checkbox" <?=$v->show==1?'checked':''?>  data-toggle="toggle"  id="toggle" data-size="mini"
                                                       data-on="Hiển thị" data-off="Tắt">
                                            </label>
                                        </td>
                                        <td class="hidden" width="6%">
                                            <div data-toggle="tooltip" data-placement="top" title="<?= _title_news_home ?>"
                                                 data-value="<?=$v->id;?>" data-view="home"
                                                 class='view_color' style='border: 1px solid #000088;margin-right: 10px;
                                                 <?=($v->home == 1)?'background:#000088':'';?>'></div>

                                            <div data-toggle="tooltip" data-placement="top" title="<?= _title_news_hot ?>"
                                                 data-value="<?=$v->id;?>" data-view="hot"
                                                 class='view_color hidden' style='border: 1px solid #ff0000;margin-right: 10px;
                                                 <?=($v->hot == 1)?'background:#ff0000':'';?>'></div>

                                            <div data-toggle="tooltip" data-placement="top" title="<?= _title_news_focus ?>"
                                                 data-value="<?=$v->id;?>" data-view="focus"
                                                 class='view_color hidden' style='border: 1px solid #008855;margin-right: 10px;
                                                 <?=($v->focus == 1)?'background:#008855':'';?>'></div>

                                            <div data-toggle="tooltip" data-placement="top" title="<?= _title_news_coupon ?>"
                                                 data-value="<?=$v->id;?>" data-view="coupon"
                                                 class='hidden view_color display_none' style='border: 1px solid #B5027E;margin-right: 10px;
                                                 <?=($v->coupon == 1)?'background:#B5027E':'';?>'></div>
                                        </td>

                                        <td width='6%' class="text-center">
                                            <a href="<?= base_url('vnadmin/news/edit/' . $v->id) ?>" class="btn btn-xs btn-default"
                                               title="Sửa"><i class="fa fa-pencil"></i></a>

                                            <a href="<?= base_url('vnadmin/news/images/' . $v->id) ?>"
                                               class="btn btn-xs btn-default display_none" title="Ảnh Tin Tức"  ><i class="fa fa-image"></i></a>

                                            <a href="<?= base_url('vnadmin/news/delete/' . $v->id) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                               class="btn btn-xs btn-danger" title="Xóa" style="color: #fff"><i class="fa fa-times"></i> </a>


                                            <a href="<?= base_url('vnadmin/news/recycle_an/' . $v->id) ?>"
                                               onclick="return confirm('Bạn có chắc chắn muốn cho tin vào thùng rác ?')"
                                               class="btn btn-xs btn-primary display_none" title="Xóa" style="color: #fff"><i class="fa fa-recycle"></i> </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } ?>
                        </form>
                    </table>
                </div>
                <div class="pagination">
                    <?php
                    echo $this->pagination->create_links(); // tạo link phân trang
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<script type="text/javascript">
    function show_news(id){
        var baseurl = '<?php echo base_url();?>';
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: baseurl + 'admin/news/show_news',
            data: {id:id},
            success: function (ketqua) {

            }
        })
    }

</script>
<script src="<?=base_url('assets/js/admin/news.js')?>"></script>