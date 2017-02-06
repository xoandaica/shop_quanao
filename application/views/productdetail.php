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
                        <img id="mainfutured" src="<?= base_url($pro_first->image)?>"  class="img-thumbnail" />
                    </div>
                </div>
                <div class="col-md-8 col-sm-7">
                    <div class="kk-product-detail">
                        <h1 class="name"><?= $pro_first->name ?></h1>
                        <div class="detail">
                            <div itemprop="description">
                                <p>Ao 250k Vay 270k</p>
                                <p>Áo trắng và chân váy bút chì ren đỏ</p>
                            </div>                            <p>
                                <span class="tags pull-left">Tags:  Đầm công sở</span>

                            <div class="cart pull-right">
                                <a href="http://kkfashion.vn/cart/"><i class="fa fa-cart-plus"></i> Giỏ hàng <span class="number-cart">0</span></a> 
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
                                    <p><span class="bold">Màu sắc:</span> ........</p>
                                    <p><span class="bold">Chất liệu:</span> ........</p>

                                    <!--<p><span class="bold">Đánh giá:</span> <img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/rato.png"></p>-->
                                </span>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <span class="detail-size pull-right sdesktop">
                                    <ul>
                                        <li id="dsize_s"  onclick="xaddcart('s')" itemid="s">S</li>
                                        <li id="dsize_m"  onclick="xaddcart('m')" itemid="m" >M</li>
                                        <li id="dsize_l"  onclick="xaddcart('l')" itemid="l" >L</li>
                                        <li id="dsize_xl"  onclick="xaddcart('xl')" itemid="xl" >XL</li>
                                    </ul> 
                                </span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="btn-control">
                            <div class="row" id="bdesktop">

                                <form class="variations_form cart" method="post"  enctype='multipart/form-data' >
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
                                    <button type="submit" class="single_add_to_cart_button btn-addcart">Cho vào giỏ hàng</button>

                                    <div><input type="hidden" name="product_id" value="99485" /></div>

                                </form>
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
                                <a href="../dam-cong-so-kk63-41/index.html" rel="prev"><button class="btn-continue">Xem tiếp</button></a>                            </div>
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
                            <script type="text/javascript">


                                jQuery(document).ready(function($) {

                                    jQuery("#owl-demo").owlCarousel({
                                        items: 3,
                                        pagination: false,
                                        autoPlay: false,
                                        navigation: true,
                                        navigationText: ["<img src='http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/btn-prev-2.png'>", "<img src='http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/btn-next-2.png'>"],
                                        itemsTablet: [768, 3],
                                        afterInit: function(el) {
                                            el.find(".owl-item").eq(0).addClass("synced");
                                        }
                                    });


                                });


                            </script>

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
                            <li><a data-toggle="tab" href="#step-2">
                                    <p class="step-title">Các bước mua hàng</p>
                                </a></li>
                            <li><a data-toggle="tab" href="#step-3">
                                    <p class="step-title">Đánh giá của khách hàng</p>
                                </a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div align="center" id="step-1" class="tab-pane fade in active">
                            <?php foreach ($product_image as $img) { ?>
                                <img class="img-thumbnail" src="<?= base_url($img->link) ?>" alt="<?= $pro_first->name ?>" title="<?= $pro_first->name?>" />
                            <?php } ?>
                            <div class="multi-size cart-table">
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
                            </div>

                        </div>
                        <div id="step-2" class="tab-pane fade">
                            <p><b>Bước 1:</b> Chọn sản phẩm cần mua trên menu SHOP ONLINE</p>
                            <img src="http://kkfashion.vn/wp-content/themes/kkfashion/img/huongdan-1.jpg">
                            <p><b>Bước 2:</b> Xem thông tin sản phẩm và chọn sản phẩm cần mua. Sau khi xem xong khách hàng chọn nút giỏ hàng để xem những thông tin sản phẩm đã mua và tiếp tục thanh toán.</p>
                            <img src="http://kkfashion.vn/wp-content/themes/kkfashion/img/huongdan-2.jpg">
                            <p><b>Bước 3:</b> Nếu khách hàng muốn thay đổi số lượng hoặc không muốn mua sản phẩm thì có thể thao tác như hình dưới. Sau khi chọn sản phẩm, khách hàng điền thông tin cần mua rồi nhấn nút đặt hàng để gửi đến bộ phận kinh doanh, K&amp;K Fashion sẽ liên hệ đến quí khách trong thời gian sớm nhất.</p>
                            <img src="http://kkfashion.vn/wp-content/themes/kkfashion/img/huongdan-3.jpg">
                            <br /> <!-- thong tin bank --> 
                            <br /> 
                            <br /> 
                            <div>
                                <p>Sau khi khách hàng mua sản phẩm qua 1 trong 3 hình thức trên.<br>Bộ phận kinh doanh K&amp;K Fashion sẽ liên hệ đến quý khách và hướng dẫn quý khách các thức thanh toán và nhận hàng.</p>
                                <p>Quý khách có thể chuyển khoản qua 1 trong những tài khoản sau:</p>

                                <div class="col-md-12 col-xs-12 content-step-3">
                                    <div class="row content-step-bank">
                                        <div align="center" class="col-md-5 col-xs-5 col-sm-5">
                                            <a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/bank-info-1.png" alt=""></a>
                                        </div>
                                        <div class="col-md-7 col-xs-7 col-sm-7">
                                            <p class="bold">Ngân hàng Xuất Nhập khẩu Việt Nam - EXIMBANK:</p><br>
                                            <p>Tên chủ tài khoản: Công ty TNHH Khang Khôi</p>
                                            <p>Số tài khoản: 100714851015505</p> 
                                            <p>Chi nhánh Hòa Bình</p>
                                        </div>
                                    </div>
                                    <div class="row content-step-bank">
                                        <div align="center" class="col-md-5 col-xs-5 col-sm-5">
                                            <a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/bank-info-2.png" alt=""></a>
                                        </div>
                                        <div class="col-md-7 col-xs-7 col-sm-7">
                                            <p class="bold">Ngân hàng TMCP Ngoại thương Việt Nam  - VIETCOMBANK</p><br>
                                            <p>Tên chủ tài khoản: Lê Viết Thanh</p>
                                            <p>Số tài khoản: 0071000629193</p> 
                                            <p>Chi nhánh Hồ Chí Minh</p>
                                        </div>
                                    </div>
                                    <div class="row content-step-bank">
                                        <div align="center" class="col-md-5 col-xs-5 col-sm-5">
                                            <a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/bank-info-3.png" alt=""></a>
                                        </div>
                                        <div class="col-md-7 col-xs-7 col-sm-7">
                                            <p class="bold">Ngân hàng Nông nghiệp & Phát triển  Nông thôn - AGRIBANK</p><br>
                                            <p>Tên chủ tài khoản: Lê Viết Thanh</p>
                                            <p>Số tài khoản: 1700206222669</p> 
                                            <p>Chi nhánh Hòa Bình</p>
                                        </div>
                                    </div>
                                    <div class="row content-step-bank">
                                        <div align="center" class="col-md-5 col-xs-5 col-sm-5">
                                            <a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/bank-info-4.png" alt=""></a>
                                        </div>
                                        <div class="col-md-7 col-xs-7 col-sm-7">
                                            <p class="bold">Ngân hàng Đông Á - DONGABANK</p><br>
                                            <p>Tên chủ tài khoản: Lê Viết Thanh</p>
                                            <p>Số tài khoản: 0107583678</p> 
                                            <p>Phòng giao dịch: Tô Hiến Thành</p>
                                        </div>
                                    </div>
                                    <div class="row content-step-bank">
                                        <div align="center" class="col-md-5 col-xs-5 col-sm-5">
                                            <a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/bank-info-5.png" alt=""></a>
                                        </div>
                                        <div class="col-md-7 col-xs-7 col-sm-7">
                                            <p class="bold">Ngân hàng TMCP Công thương Việt Nam  - VIETTINBANK</p><br>
                                            <p>Tên chủ tài khoản: Lê Viết Thanh</p>
                                            <p>Số tài khoản: 711A54466884</p> 
                                            <p>Chi nhánh 10 - Phòng giao dịch Tô Hiến Thành</p>
                                        </div>
                                    </div>
                                    <div class="row content-step-bank">
                                        <div align="center" class="col-md-5 col-xs-5 col-sm-5">
                                            <a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/bank-info-6.png" alt=""></a>
                                        </div>
                                        <div class="col-md-7 col-xs-7 col-sm-7">
                                            <p class="bold">Ngân hàng TMCP Kỹ Thương Việt Nam -  TECHCOMBANK</p><br>
                                            <p>Tên chủ tài khoản: Lê Viết Thanh</p>
                                            <p>Số tài khoản: 12524646971017</p> 
                                            <p>Chi nhánh 10 - Techcombank Trần Quang Diệu</p>
                                        </div>
                                    </div>
                                    <div class="row content-step-bank">
                                        <div align="center" class="col-md-5 col-xs-5 col-sm-5">
                                            <a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/bank-info-7.png" alt=""></a>
                                        </div>
                                        <div class="col-md-7 col-xs-7 col-sm-7">
                                            <p class="bold">Ngân hàng Đầu tư & Phát triển Việt Nam  - BIDV</p><br>
                                            <p>Tên chủ tài khoản: Lê Viết Thanh</p>
                                            <p>Số tài khoản: 31310000426369</p> 
                                            <p>Phòng giao dịch: Lê Thị Riêng</p>
                                        </div>
                                    </div>
                                </div>								

                                <div style="clear:both;"></div>
                            </div>
                            <div class="well direction">
                                <p><b>K&amp;K Fashion giải quyết đổi hàng trong thời gian 3 ngày với những điều kiện sau:</b><br>
                                    - Sản phẩm còn nguyên tem mạc.<br>
                                    - Sản phẩm chưa được giặt và sử dụng qua.<br>
                                    - Còn nguyên hóa đơn mua hàng.<br>
                                    - Chỉ giải quyết 1 lần/ sản phẩm.<br>
                                    <b>Lưu ý: Khách hàng vui lòng đổi hàng vào buổi chiều (14.00h - 17.00h)</b><br>
                                </p>
                                <p><b>Hiện tại K&amp;K Fashion có nhận giao hàng tận nơi trên địa bàn Thành phố Hồ Chí Minh với hình thức như sau:</b><br>
                                    - Đối với những quận nội thành (Q.1, Q3, Q.4, Q.5, Q10, Q. Bình Thạnh, Q. Phú Nhuận, Q, Gò Vấp, Q. Tân Bình). K&amp;K Fashion sẽ miễn phí chuyển hàng<br>
                                    - Đối với những quận ngoại thành ( Q.2, Q.6, Q.7, Q.8, Q.11, Q. Tân Phú, Q. Bình Tân) thì phí chuyển hàng là 30.000/ lần chuyển hàng đối với đơn hàng dưới 3 SP</p>
                            </div>
                        </div>
                        <div id="step-3" class="tab-pane fade">
                            <div class="fb-comments" width="700" data-href="http://kkfashion.vn/shop/dam-cong-so-kk63-43/" data-numposts="5"></div>
                        </div>
                    </div>
                </div>
                <div class="hidden-sm">
                    <div class="col-lg-3 col-md-3 col-xs-12 static-product-sidebar">

                        <div class="row headding-page">
                            <div class="col-md-12 col-xs-12">
                                <div class="special-headding-2"><span>Sản phẩm hot nhất</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="kk-special mCustomScrollbar">
                                    <div class="woocommerce">


                                        <ul class="products">
                                            <ul>





                                                <li>
                                                    <div class="prothumb" ele="99485">

                                                        <a href="index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-43.jpg" class="img-thumbnail shop-imgs" data="index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="index.html">Đầm công sở<br />KK63-43</a></p>
                                                    <p ><b>520.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99483">

                                                        <a href="../dam-cong-so-kk63-42/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-42.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-42/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-42/index.html">Đầm công sở<br />KK63-42</a></p>
                                                    <p ><b>440.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99481">

                                                        <a href="../dam-cong-so-kk63-41/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-41.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-41/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-41/index.html">Đầm công sở<br />KK63-41</a></p>
                                                    <p ><b>410.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99479">

                                                        <a href="../dam-cong-so-kk63-40/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-40.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-40/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-40/index.html">Đầm công sở<br />KK63-40</a></p>
                                                    <p ><b>440.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99477">

                                                        <a href="../dam-cong-so-kk63-39/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-39.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-39/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-39/index.html">Đầm công sở<br />KK63-39</a></p>
                                                    <p ><b>410.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99475">

                                                        <a href="../dam-cong-so-kk63-38/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-38.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-38/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-38/index.html">Đầm công sở<br />KK63-38</a></p>
                                                    <p ><b>500.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99473">

                                                        <a href="../dam-cong-so-kk63-37/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-37.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-37/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-37/index.html">Đầm công sở<br />KK63-37</a></p>
                                                    <p ><b>400.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99471">

                                                        <a href="../dam-cong-so-kk63-36/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-36.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-36/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-36/index.html">Đầm công sở<br />KK63-36</a></p>
                                                    <p ><b>490.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99469">

                                                        <a href="../dam-cong-so-kk63-35/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-35.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-35/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-35/index.html">Đầm công sở<br />KK63-35</a></p>
                                                    <p ><b>410.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99467">

                                                        <a href="../dam-cong-so-kk63-34/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-34.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-34/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-34/index.html">Đầm công sở<br />KK63-34</a></p>
                                                    <p ><b>400.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99465">

                                                        <a href="../dam-cong-so-kk63-33/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-33.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-33/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-33/index.html">Đầm công sở<br />KK63-33</a></p>
                                                    <p ><b>400.000 VNĐ</b></p>
                                                </li>







                                                <li>
                                                    <div class="prothumb" ele="99463">

                                                        <a href="../dam-cong-so-kk63-32/index.html"> 
                                                            <img src="http://kkfashion.vn/wp-content/uploads/images/356_520/KK63/dam-cong-so-kk63-32.jpg" class="img-thumbnail shop-imgs" data="../dam-cong-so-kk63-32/index.html"/>
                                                        </a>
                                                    </div>
                                                    <p> <a href="../dam-cong-so-kk63-32/index.html">Đầm công sở<br />KK63-32</a></p>
                                                    <p ><b>520.000 VNĐ</b></p>
                                                </li>



                                            </ul>


                                        </ul>


                                    </div>			</div>
                            </div>
                        </div>
                    </div>                </div>
            </div>
        </div>
    </div>
</div>
