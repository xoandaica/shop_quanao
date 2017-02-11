<div class="content-page">
    <div class="kk-detail-page">
        <div class="container">
            <div class="hidden-md hidden-sm hidden-lg">
                <div class="row hidden-lg hidden-md hidden-sm">
                    <div class="col-xs-12 content-menu">
                        <ul>
                            <li><a href="../index.html">Shop Online</a></li>
                            <li><a href="../../huong-dan-mua/index.html">Hướng dẫn mua hàng</a></li>
                            <li><a href="../../lien-he/index.html">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row woocommerce">
                <div class="col-md-12 ">
                </div>
            </div>
        </div>
        <div class="container hidden-xs">   
            <div class="row">
                <div class="col-md-4 col-sm-5 detail-img">
                    <div id="carousel-example-big-sm" data-interval="false" class="carousel slide visible-sm">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <a class="fancybox" rel="group" href="#"><img alt="" src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-43.jpg" class="img-thumbnail"></a>
                            </div>
                            <div class="item ">
                                <a class="fancybox" rel="group" href="#"><img alt="" src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-43-1.jpg" class="img-thumbnail"></a>
                            </div>
                            <div class="item ">
                                <a class="fancybox" rel="group" href="#"><img alt="" src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-43-2.jpg" class="img-thumbnail"></a>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control sm-thumb" href="#carousel-example-big-sm" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control sm-thumb" href="#carousel-example-big-sm" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div> 
                    <div class="item">
                        <img id="mainfutured" src="<?= base_url($pro_first->image) ?>"  class="img-thumbnail" />
                    </div>
                </div>
                <div class="col-md-8 col-sm-7">
                    <div class="kk-product-detail">
                        <h1 class="name"><?= $pro_first->name ?></h1>
                        <div class="detail">
                            <div itemprop="description">
                                <p><?= $pro_first->description ?></p>
                            </div>                            <p>
                                <!--<span class="tags pull-left">Tags:  Đầm công sở</span>-->

                            <div class="cart pull-right">
                                <a href="<?= base_url('gio-hang') ?>"><i class="fa fa-cart-plus"></i> Giỏ hàng <span class="number-cart"><?php
                                        if (isset($_SESSION['totalProduct'])) {
                                            echo $_SESSION['totalProduct'];
                                        } else {
                                            echo '0';
                                        }
                                        ?></span></a> 
                            </div>
                            </p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="price-code">
                            <span class="price pull-left"> <?= $pro_first->price_sale > 0 ? 'Giá: ' . number_format($pro_first->price_sale) . 'VNĐ' : 'Giá: ' . lang('contact') ?></span>
                            <span class="code pull-right"><?= $pro_first->code ?></span>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row color-size">
                            <div class="col-md-6 col-sm-6">
                                <span class="color"> 
                                    <p><span class="bold">Màu sắc: </span><?= $pro_first->color ?></p>
                                    <p><span class="bold">Chất liệu: </span> <?= $pro_first->origin ?></p>

                                    <!--<p><span class="bold">Đánh giá:</span> <img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/rato.png"></p>-->
                                </span>
                            </div>
                            <!--                            <div class="col-md-6 col-sm-6">
                                                            <span class="detail-size pull-right sdesktop">
                                                                <ul>
                                                                    <li id="dsize_s"  onclick="xaddcart('s')" itemid="s">S</li>
                                                                    <li id="dsize_m"  onclick="xaddcart('m')" itemid="m" >M</li>
                                                                    <li id="dsize_l"  onclick="xaddcart('l')" itemid="l" >L</li>
                                                                    <li id="dsize_xl"  onclick="xaddcart('xl')" itemid="xl" >XL</li>
                                                                </ul> 
                                                            </span>
                                                        </div>-->
                            <div class="clearfix"></div>
                        </div>
                        <div class="btn-control">
                            <div class="row" id="bdesktop">

                                <!--<form class="variations_form cart" method="post"  enctype='multipart/form-data' >-->
                                <table class="variations" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td class="label"></td>
                                            <td class="value">
                                                <select id="pa_size" class="" name="attribute_pa_size" data-attribute_name="attribute_pa_size"><option value="">Chọn một tùy chọn</option><option value="s"  selected='selected'>S</option><option value="m" >M</option><option value="l" >L</option><option value="xl" >XL</option></select>						</td>
                                        </tr>
                                    </tbody>
                                </table>


                                <div class="single_variation_wrap" style="display:none;">
                                    <div class="single_variation"></div>		<div class="variations_button">
                                        <div class="quantity"><input type="number" step="1"   name="quantity" value="1" title="SL" class="input-text qty text" size="4" /></div>
                                        <button type="submit" class="single_add_to_cart_button button alt">Thêm vào giỏ</button>
                                        <input type="hidden" name="add-to-cart" value="99485" />
                                        <input type="hidden" name="product_id" value="99485" />
                                        <input type="hidden" name="variation_id" class="variation_id" value="" />
                                    </div>
                                </div>

                                <input type="hidden" name="variation_id" value="" />
                                <input type="hidden" class="input-text qty text" title="Qty" value="1" name="quantity" step="1">
                                <button class="single_add_to_cart_button btn-addcart" onclick="add_cart(<?= $pro_first->id; ?>)">Cho vào giỏ hàng</button>
                                <div><input type="hidden" name="product_id" value="99485" /></div>

                                <!--                                </form>-->
                                <script type="text/javascript">
                                    function checkadd() {
                                        flag = false;
                                        $('.detail-size li').each(function() {
                                            if ($(this).hasClass('active')) {
                                                flag = true;
                                            }
                                        });
                                        if (flag == false) {
                                            alert("Bạn hãy chọn size sản phẩm");
                                        }
                                        return flag;
                                    }
                                </script>
                                <!--<a href="../dam-cong-so-kk63-41/index.html" rel="prev"><button class="btn-continue">Xem tiếp</button></a>-->     
                            </div>
                        </div>
                        <div class="share-btn">
                            <ul>
                                <li><span>Chia sẻ bạn bè:</span></li>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fkkfashion.vn%2Fshop%2Fdam-cong-so-kk63-43%2F"><img alt="FB Share" title="FB Share" src="http://kkfashion.vn/wp-content/themes/kkfashion/img/fb_share.png"></a>
                                <a href="https://twitter.com/share?url=http%3A%2F%2Fkkfashion.vn%2Fshop%2Fdam-cong-so-kk63-43%2F" target="_blank"><img alt="Twitter Share" title="Twitter Share" src="http://kkfashion.vn/wp-content/themes/kkfashion/img/tw_share.png"></a>
                                <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fkkfashion.vn%2Fshop%2Fdam-cong-so-kk63-43%2F&amp;media=http%3A%2F%2Fkkfashion.vn%2Fwp-content%2Fuploads%2Fimages%2F356_520%2Fno_image.jpg&amp;description=%c4%90%e1%ba%a7m%20c%c3%b4ng%20s%e1%bb%9f%20KK63-43" class="pin-it-button" count-layout="horizontal">
                                    <img alt=" Pinterest Share" title=" Pinterest Share" src="http://kkfashion.vn/wp-content/themes/kkfashion/img/pr_share.png">
                                </a>
                                <a href="javascript:void(0);" onclick="window.print()" ><img alt="In"   src="http://kkfashion.vn/wp-content/themes/kkfashion/img/printer.png"></a>
                            </ul>
                        </div>
                        <div class="thumbnail-slide">
                            <?= $pro_first->content; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row content-detail abc">
                <div class="col-md-9 step-item step-detail">
                    <div align="center" class="head-tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#step-1">
                                    <p class="step-title">Thông tin sản phẩm</p>
                                </a></li>
                            <li>
                                <a data-toggle="tab" href="#step-2">
                                    <p class="step-title">Đánh giá của khách hàng</p>
                                </a></li><!--
                            <li>
                                <a data-toggle="tab" href="#step-3">
                                    <p class="step-title">Đánh giá của khách hàng</p>
                                </a></li>-->
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div align="center" id="step-1" class="tab-pane fade in active">
                            <?php foreach ($product_image as $img) { ?>
                                <img class="img-thumbnail" src="<?= base_url($img->link) ?>" alt="<?= $pro_first->name ?>" title="<?= $pro_first->name ?>" />
                            <?php } ?>
                            <!--                            <div class="multi-size cart-table">
                                                            <table width="600" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Size</th>
                                                                        <th>Vòng 1</th>
                                                                        <th>Vòng 2</th>
                                                                        <th class="end">Vòng 3</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>S</td>
                                                                        <td>83</td>
                                                                        <td>67</td>
                                                                        <td>90</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>M</td>
                                                                        <td>86</td>
                                                                        <td>70</td>
                                                                        <td>95</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>L</td>
                                                                        <td>90</td>
                                                                        <td>76</td>
                                                                        <td>97</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>XL</td>
                                                                        <td>96</td>
                                                                        <td>82</td>
                                                                        <td>104</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                            
                            
                                                        <div class="delivery cart-table">
                                                            <h2>Hướng dẫn giao hàng:</h2>
                                                            <table width="600" cellpadding="10" cellspacing="10">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="25%">Khu vực giao hàng</th>
                                                                        <th width="25%">Phương thức thanh toán</th>
                                                                        <th width="25%">Thời gian giao hàng</th>
                                                                        <th width="25%" class="end">Phí vận chuyển</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Nội thành  TP.HCM
                                                                            ( Q.1, Q3, Q.4, Q.5, Q10, Q. Bình Thạnh, Q. Phú Nhuận, Q, Gò Vấp, Q. Tân Bình)
                                                                            Ngoại thành  TP.HCM 
                                                                            ( Q.2, Q.6, Q.7, Q.8, Q.11, Q. Tân Phú, Q. Bình Tân)</td>
                                                                        <td>Chuyển khoản, COD, thanh toán trực tiếp( không áp dụng với các quận: Nhà Bè, Hóc Môn, Bình Chánh, Q.12)</td>
                                                                        <td width="25%">Nhận hàng trong vòng từ 1~3 ngày sau khi hoàn thành đặt hàng</td>
                                                                        <td width="20%" class="end">Nội thành:
                                                                            Miễn phí
                                                                            ( Nếu trường hợp không lấy SP phí vận chuyển 30.000 VNĐ)
                                                                            Ngoại thành:
                                                                            Phí vận chuyển 30.000 VNĐ ( Trên 3 SP miễn phí vận chuyển, trường hợp không lấy SP phí vận chuyển 60.000 VNĐ)</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="abchr"  >
                                                            <table width="600" cellpadding="10" cellspacing="10">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="25%">Toàn bộ tỉnh, thành phố khác</td>
                                                                        <td width="25%">Chuyển khoản và COD</td>
                                                                        <td width="25%">Với khách hàng chuyển khoản trước: 3-4 ngày kể từ ngày chuyển khoản. Đối với COD: nhận hàng sau 4-6 ngày</td>
                                                                        <td width="25%" class="end">Mua 1 sp phí là 35.000 VNĐ. Trên 2 sản phẩm được miễn phí vận chuyển</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="abchr" >
                                                        </div>
                                                        <div class="delivery cart-table">
                                                            <h2>Điều kiện đổi hàng:</h2>
                                                            <table width="600" cellpadding="10" cellspacing="10">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="25%">Khu vực</th>
                                                                        <th width="25%">Quy định chung</th>
                                                                        <th width="25%">Cách thức đổi hàng</th>
                                                                        <th width="25%" class="end">Phí đổi hàng</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>TP.HCM</td>
                                                                        <td>Hàng còn nguyên tem, mạc, hóa đơn, 
                                                                            không bị dơ bẩn, hư hỏng, chưa qua sử dụng hoặc  giặt tẩy.  
                                                                            Liên hệ đổi hàng sau 13:30</td>
                                                                        <td width="25%">Ghé bất kỳ cửa hàng để đổi trong vòng 3 ngày.</td>
                                                                        <td width="20%" class="end">Miễn phí</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="abchr"  >
                                                            <table width="600" cellpadding="10" cellspacing="10">
                                                                <tbody>
                                                                    <tr>
                                                                        <td width="25%">Toàn bộ tỉnh, thành phố khác</td>
                                                                        <td width="25%">Hàng còn nguyên tem, mạc, hóa đơn, 
                                                                            không bị dơ bẩn, hư hỏng, chưa qua sử dụng hoặc  giặt tẩy.  
                                                                            Liên hệ đổi hàng sau 13:30</td>
                                                                        <td width="25%">Gửi lại  sản phẩm đổi đến địa chỉ: Nguyễn Thị Kim Duyên.40 Lê Văn Sỹ, phường 11, quận Phú Nhuận. Trong vòng 3 ngày kể từ ngày nhận hàng.</td>
                                                                        <td width="25%" class="end">35.000 (nếu không mua thêm sản phẩm mới)</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <hr class="abchr" >
                                                        </div>-->

                        </div>
                        <div id="step-2" class="tab-pane fade">
                            <div class="fb-comments" data-href="http://localhost/nuhoangquanjean/quan-au-chan-vay/quan-au-chan-vay-2-c26p23.html" data-num-posts="10" data-order-by="reverse_time" data-width="100%" data-colorscheme="dark">
                                <div class="hidden" style="position: relative">
                                    <textarea onfocus="check_login()" id="comment" name="comment" placeholder="Viết bình luận..." style="padding-right: 50px" class="form-control"></textarea>
                                    <button class="btn btn-default btn-xs" data-items="941" data-reply="0" data-content="comment" data-toggle="modal" data-target=".bs-example-modal-sm" id="btn_sent" style="position: absolute; top: 20px; right: 10px">Gửi
                                    </button>
                                </div>
                                <div class="" style="padding-left: 15px; color: #333; font-size: 14px; line-height: 20px">Chưa có bình luận nào.</div>
                                <div class="clearfix"></div>
                                <div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-href="https://www.facebook.com/FacebookVietnam/photos/pb.278992552121199.-2207520000.1464146751./983061755047605/?type=3&amp;theater" data-width="100%" data-numposts="5" fb-xfbml-state="rendered"><span style="height: 470px;"><iframe id="f2b4edfbc7c80b4" name="f2397ff73cb384" scrolling="no" title="Facebook Social Plugin" class="fb_ltr fb_iframe_widget_lift" src="https://www.facebook.com/plugins/comments.php?api_key=&amp;channel_url=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F0eWevUAMuoH.js%3Fversion%3D42%23cb%3Df2c48e98fccc428%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%252Ff357d7235ee5e0c%26relation%3Dparent.parent&amp;href=https%3A%2F%2Fwww.facebook.com%2FFacebookVietnam%2Fphotos%2Fpb.278992552121199.-2207520000.1464146751.%2F983061755047605%2F%3Ftype%3D3%26theater&amp;locale=vi_VN&amp;numposts=5&amp;sdk=joey&amp;version=v2.6&amp;width=100%25" style="border: none; overflow: hidden; height: 470px; width: 100%;"></iframe></span></div>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <div id="step-3" class="tab-pane fade">
                            <div class="fb-comments" width="700" data-href="http://kkfashion.vn/shop/dam-cong-so-kk63-43/" data-numposts="5"></div>
                        </div>
                    </div>
                </div>
                <?= $product_lienquan ?>
            </div>
        </div>
    </div>
</div>
