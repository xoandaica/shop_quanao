<footer>
    <div class="container">
        <div class="row hidden-sm hidden-xs">
            <?php
            foreach ($menus as $menu) {
                if ($menu->parent_id == 0) {
                    ?>
                    <div class="col-md-15 kk-shop-columns">
                        <p><?= $menu->name; ?></p>
        <!--                        <a target="<?= $menu->target ?>" <?php if ($menu->url != 'null') echo 'href="' . site_url($menu->url) . '"' ?>
                             class="<?php check_hassub1($menu->id_menu, $menu_sub); ?>" title="<?= $menu->name; ?>"><?= $menu->name; ?></a>-->
                        <ul >
                            <?php
                            foreach ($menu_sub as $sub) {
                                if ($menu->id_menu == $sub->parent_id) {
                                    ?>
                                    <li>
                                        <a target="<?= $sub->target ?>"  <?php if ($sub->url != 'null') echo 'href="' . site_url($sub->url) . '"' ?>
                                           title="<?= $sub->name; ?>">
                                               <?= $sub->name; ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="row hidden-sm hidden-xs company-info">
            <div class="col-md-6 company">
               <p class="special-register"><?= $this->site_name?></p>
<!--                <div class="subscribe">

                    <div class="form-group">


                        <script type="text/javascript">
                            //<![CDATA[
                            if (typeof newsletter_check !== "function") {
                                window.newsletter_check = function (f) {
                                    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
                                    if (!re.test(f.elements["ne"].value)) {
                                        alert("The email is not correct");
                                        return false;
                                    }
                                    for (var i = 1; i < 20; i++) {
                                        if (f.elements["np" + i] && f.elements["np" + i].required && f.elements["np" + i].value == "") {
                                            alert("");
                                            return false;
                                        }
                                    }
                                    if (f.elements["ny"] && !f.elements["ny"].checked) {
                                        alert("You must accept the privacy statement");
                                        return false;
                                    }
                                    return true;
                                }
                            }
                            //]]>
                        </script>

                        <div class="newsletter newsletter-subscription">
                            <form method="post" action="http://kkfashion.vn/?na=s" onsubmit="return newsletter_check(this)">

                                <table cellspacing="0" cellpadding="3" border="0">

                                     email 
                                    <tbody><tr>
                                            <th>Email</th>
                                            <td align="left"><input class="newsletter-email" type="email" name="ne" size="30" required=""></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="newsletter-td-submit">
                                                <input class="newsletter-submit" type="submit" value="Subscribe">
                                            </td>
                                        </tr>

                                    </tbody></table>
                            </form>
                        </div>                        </div>
                </div>-->
                <div class="policy">
                    <p> <?= $this->show_room?></p>
                </div>
            </div>
            <div class="col-md-6 company">
                <p>
                </p><div class="phone">
                    <i class="fa fa-phone fa-2x"></i>
                </div>
                <div class="phone-number"><?= $this->hotline1 ?></div>
                <p></p> 
                <div class="support-online">
                    <ul>
                        <li class="text-suport-ol"><span>Hỗ trợ Online: </span></li>
                        <li><a  href="<?= $this->site_facebook?>"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/facebook.png" alt="Facebook Fanpage K&amp;K Fashion"></a></li>
                        <li><a href="https://instagram.com/kkfashion.vn"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/instagram.png" alt="Instgram K&amp;K Fashion"></a></li>
                        <li><a href="skype:kk.fashion?call"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/skype.png" alt="Skype K&amp;K Fashion"></a></li>
                        <li><a href="https://www.youtube.com/user/kkfashionchannel"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/youtobe.png" alt="Youtube Channel K&amp;K Fashion"></a></li>
                        <li><a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/zalo.png" alt="Zalo Page K&amp;K Fashion"></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="showroom">
                    <p> <?= $this->address?></p>
                   
                </div>
            </div>
        </div>

        <!-- mobile -->
        <div class="row hidden-lg hidden-md hidden-sm company-info">
            <div class="col-sm-12 company">
                <div class="support-online">
                    <ul>
                        <li class="text-suport-ol"><span>Hỗ trợ Online: </span></li>
                        <li><a href="https://facebook.com/kkfashion.vn"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/facebook.png" alt="Facebook Fanpage K&amp;K Fashion"></a></li>
                        <li><a href="https://instagram.com/kkfashion.vn"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/instagram.png" alt="Instgram K&amp;K Fashion"></a></li>
                        <li><a href="skype:kk.fashion?call"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/skype.png" alt="Skype K&amp;K Fashion"></a></li>
                        <li><a href="https://www.youtube.com/user/kkfashionchannel"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/youtobe.png" alt="Youtube Channel K&amp;K Fashion"></a></li>
                        <li><a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/zalo.png" alt="Zalo Page K&amp;K Fashion"></a></li>
                    </ul>
                </div>
                <div class="subscribe">
                    <p>ĐĂNG KÝ ĐỂ NHẬN SPECIAL OFFERS TỪ K&amp;K FASHION</p>
                    <div class="form-group">


                        <script type="text/javascript">
                            //<![CDATA[
                            if (typeof newsletter_check !== "function") {
                                window.newsletter_check = function (f) {
                                    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
                                    if (!re.test(f.elements["ne"].value)) {
                                        alert("The email is not correct");
                                        return false;
                                    }
                                    for (var i = 1; i < 20; i++) {
                                        if (f.elements["np" + i] && f.elements["np" + i].required && f.elements["np" + i].value == "") {
                                            alert("");
                                            return false;
                                        }
                                    }
                                    if (f.elements["ny"] && !f.elements["ny"].checked) {
                                        alert("You must accept the privacy statement");
                                        return false;
                                    }
                                    return true;
                                }
                            }
                            //]]>
                        </script>

                        <div class="newsletter newsletter-subscription">
                            <form method="post" action="http://kkfashion.vn/?na=s" onsubmit="return newsletter_check(this)">

                                <table cellspacing="0" cellpadding="3" border="0">

                                    <!-- email -->
                                    <tbody><tr>
                                            <th>Email</th>
                                            <td align="left"><input class="newsletter-email" type="email" name="ne" size="30" required=""></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="newsletter-td-submit">
                                                <input class="newsletter-submit" type="submit" value="Subscribe">
                                            </td>
                                        </tr>

                                    </tbody></table>
                            </form>
                        </div>                        </div>
                </div>
            </div>
            <div class="col-sm-12 company">

                <div class="showroom">
                    <p>Showroom 1: 268 Tô Hiến Thành, P.15, Q.10, TP.HCM. <br>ĐT: (08) 38 62 57 91</p>
                    <p>Showroom 2: 40 Lê Văn Sỹ, P.11, Q.Phú Nhuận, TP.HCM. <br>ĐT: (08) 62 53 73 93</p>
                    <p>Showroom 3: 248B Phan Đình Phùng, P.1, Q. Phú Nhuận. <br>ĐT: (08) 62 53 87 87</p><p></p>
                    <p>Showroom 4: 259 Nguyễn Trãi, P.NCTrinh, Q.1, TP.HCM. <br>ĐT: (08) 62 913 241</p>
                    <p>Showroom 5: 664 Quang Trung, P.11, Q. Gò Vấp, TP.HCM. <br>ĐT: (08) 62 99 22 33</p>
                    <p>Showroom 6: F21,Tầng 1 TTTM Aeon Mall, P.Sơn kỳ,Q.Tân Phú. <br>ĐT: (08) 35 592 541</p>
                    <p>Showroom 7: 132A Cách Mạng Tháng 8, P.10, Q.3 TP.HCM. <br>ĐT: (08) 62 66 77 33</p>
                    <p>Showroom 8: 119 Đinh Tiên Hoàng, P.3, Q.Bình Thạnh. <br>ĐT: (08) 35 512 939</p>
                    <p>Showroom 9: 319 Huỳnh Tấn Phát, P.Tân Thuận Đông, Q.7. <br>ĐT: (08) 62 69 77 33</p>
                    <p>Shop Online: 40 Lê Văn Sỹ, P.11, Q.Phú Nhuận, TP.HCM. <br>ĐT: (08) 62 66 22 33</p>
                </div>
                <div class="phone-support">
                    <div class="phone">
                        <i class="fa fa-phone fa-2x"></i>
                    </div>
                    <div class="phone-number"><a href="tel:0862662233"><span>08.</span> 62 66 22 33</a></div>
                </div>
                <!-- <div class="phone-support chat">
                    <a href="">
                        <div class="phone-2">
                            <img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/icon-chat.png" alt="">
                        </div>
                        <div class="phone-number">Trò chuyện</div>
                    </a>
                </div> -->
            </div>
        </div>
        <!-- /mobile -->

        <!-- footer ipad -->
        <div class="row hidden-lg hidden-md hidden-xs">
            <div class="col-sm-3 kk-shop-columns">
                <p>Shop Online</p>
                <ul>
                    <li><a href="http://kkfashion.vn/danh-muc/dam-cong-so-kk">Đầm công sở</a></li>
                    <li><a href="http://kkfashion.vn/danh-muc/vay-dam-da-hoi">Đầm dạ hội</a></li>
                    <li><a href="http://kkfashion.vn/danh-muc/phu-kien">Phụ kiện</a></li>
                    <li><a href="http://kkfashion.vn/danh-muc/vay-chong-nang-kk/">Váy chống nắng</a></li>
                    <li><a href="http://kkfashion.vn/danh-muc/ao-nu/">Áo sơ mi nữ</a></li>
                    <li><a href="http://girly.vn/tag/nhung-cau-noi-hay-ve-tinh-yeu/">Tình yêu</a></li>
                    <li><a href="http://kkfashion.vn/chinh-sach-bao-mat-van-chuyen-giao-nhan-va-doi-hang">Chính sách bảo mật</a></li>
                </ul>
            </div>
            <div class="col-sm-3 kk-shop-columns">
                <p>Bộ sưu tập</p>
                <ul>
                    <ul>
                        <li><a href="http://kkfashion.vn/impressive-dresses-2/">Impressive Dresses</a></li>
                        <li><a href="http://kkfashion.vn/summer-is-awesome-2/">Summer is awesome</a></li>
                        <li><a href="http://kkfashion.vn/lets-dress-up/">Let’s dress up</a></li>
                        <li><a href="http://kkfashion.vn/time-for-myself-2/">Time for myself</a></li>
                    </ul>
                </ul>
            </div>
            <div class="col-sm-3 kk-shop-columns">
                <p>Tin tức</p>
                <ul>
                    <li><a href="http://kkfashion.vn/khoi-dong-tuan-dau-nam-that-phong-cach/">Khởi động tuần đầu năm thật phong cách</a></li>
                    <li><a href="http://kkfashion.vn/cam-nang-lam-dep-don-tet-cho-nang-cong-so-ban-ron/">Cẩm nang làm đẹp đón tết cho nàng công sở bận rộn</a></li>
                </ul>
            </div>
            <div class="col-sm-3 kk-shop-columns">
                <p>Lookbook</p>
                <ul>
                    <li><a href="http://kkfashion.vn/enjoying-tet/">Enjoying Tết</a></li>
                    <li><a href="http://kkfashion.vn/wonderful-tet/">Wonderful Tết</a></li>
                    <li><a href="http://kkfashion.vn/warm-my-heart/">Warm My Heart</a></li>
                </ul>
            </div>
            <div class="col-sm-3 kk-shop-columns">
                <p>Khuyến mại</p>
                <ul>
                    <li><a href="http://kkfashion.vn/tung-bung-qua-tang-ngay-83-cung-kk-fashion/">Tưng bừng quà tặng ngày 8/3 cùng K&amp;K Fashion</a></li>
                    <li><a href="http://kkfashion.vn/chuong-trinh-mung-xuan-ron-rang-nhan-ngan-qua-tang/">Chương trình “Mừng Xuân rộn ràng – Nhận ngàn quà tặng”</a></li>
                </ul>
            </div>
        </div>
        <div class="row company-info hidden-lg hidden-md hidden-xs">
            <div class="col-sm-12 company">
                <p>
                </p><div class="phone">
                    <i class="fa fa-phone fa-2x"></i>
                </div>
                <div class="phone-number"><span>08.</span> 62 66 22 33</div>
                <p></p>
                <div class="support-online">
                    <ul>   
                        <li class="text-suport-ol"><span>Hỗ trợ Online: </span></li>
                        <li><a href="https://facebook.com/kkfashion.vn"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/facebook.png" alt="Facebook Fanpage K&amp;K Fashion"></a></li>
                        <li><a href="https://instagram.com/kkfashion.vn"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/instagram.png" alt="Instgram K&amp;K Fashion"></a></li>
                        <li><a href="skype:kk.fashion?call"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/skype.png" alt="Skype K&amp;K Fashion"></a></li>
                        <li><a href="https://www.youtube.com/user/kkfashionchannel"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/youtobe.png" alt="Youtube Channel K&amp;K Fashion"></a></li>
                        <li><a href="#"><img src="http://kkfashion.vn/wp-content/themes/kkfashion/asset/img/zalo.png" alt="Zalo Page K&amp;K Fashion"></a></li>
                    </ul>
                </div>
                <p class="special-register">ĐĂNG KÝ ĐỂ NHẬN SPECIAL OFFERS TỪ K&amp;K FASHION</p>
                <div class="subscribe">
                    <div class="form-group">


                        <script type="text/javascript">
                            //<![CDATA[
                            if (typeof newsletter_check !== "function") {
                                window.newsletter_check = function (f) {
                                    var re = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;
                                    if (!re.test(f.elements["ne"].value)) {
                                        alert("The email is not correct");
                                        return false;
                                    }
                                    for (var i = 1; i < 20; i++) {
                                        if (f.elements["np" + i] && f.elements["np" + i].required && f.elements["np" + i].value == "") {
                                            alert("");
                                            return false;
                                        }
                                    }
                                    if (f.elements["ny"] && !f.elements["ny"].checked) {
                                        alert("You must accept the privacy statement");
                                        return false;
                                    }
                                    return true;
                                }
                            }
                            //]]>
                        </script>

                        <div class="newsletter newsletter-subscription">
                            <form method="post" action="http://kkfashion.vn/?na=s" onsubmit="return newsletter_check(this)">

                                <table cellspacing="0" cellpadding="3" border="0">

                                    <!-- email -->
                                    <tbody><tr>
                                            <th>Email</th>
                                            <td align="left"><input class="newsletter-email" type="email" name="ne" size="30" required=""></td>
                                        </tr>

                                        <tr>
                                            <td colspan="2" class="newsletter-td-submit">
                                                <input class="newsletter-submit" type="submit" value="Subscribe">
                                            </td>
                                        </tr>

                                    </tbody></table>
                            </form>
                        </div>                        </div>
                </div>
                <div class="policy">
                    <p><a href="#">Chính sách bảo mật của K&amp;K Fashion</a></p>
                    <p>Thời trang nữ - Thời trang công sở K&amp;K Fashion 2016</p>
                    <p>® Bản quyền thuộc thời trang K&amp;K Fashion</p>
                    <p>Tag: <a href="http://kkfashion.vn/san-pham/thoi-trang-cong-so/">Thời trang công sở</a>, <a href="http://kkfashion.vn/danh-muc/vay-chong-nang-kk/">Váy chống nắng</a>, <a href="http://kkfashion.vn/san-pham/vay-dam-cong-so/">Váy công sở</a>, <a href="http://kkfashion.vn/danh-muc/dam-cong-so-kk/">Đầm công sở</a></p>
                </div>
            </div>
            <div class="col-sm-12 company">
                <div class="showroom">
                    <p>Showroom 1: 268 Tô Hiến Thành, P.15, Q.10, TP.HCM. <br>ĐT: (08) 38 62 57 91</p>
                    <p>Showroom 2: 40 Lê Văn Sỹ, P.11, Q.Phú Nhuận, TP.HCM. <br>ĐT: (08) 62 53 73 93</p>
                    <p>Showroom 3: 248B Phan Đình Phùng, P.1, Q. Phú Nhuận. <br>ĐT: (08) 62 53 87 87</p><p></p>
                    <p>Showroom 4: 259 Nguyễn Trãi, P.NCTrinh, Q.1, TP.HCM. <br>ĐT: (08) 62 913 241</p>
                    <p>Showroom 5: 664 Quang Trung, P.11, Q. Gò Vấp, TP.HCM. <br>ĐT: (08) 62 99 22 33</p>
                    <p>Showroom 6: F21,Tầng 1 TTTM Aeon Mall, P.Sơn kỳ,Q.Tân Phú. <br>ĐT: (08) 35 592 541</p>
                    <p>Showroom 7: 132A Cách Mạng Tháng 8, P.10, Q.3 TP.HCM. <br>ĐT: (08) 62 66 77 33</p>
                    <p>Showroom 8: 119 Đinh Tiên Hoàng, P.3, Q.Bình Thạnh. <br>ĐT: (08) 35 512 939</p>
                    <p>Showroom 9: 319 Huỳnh Tấn Phát, P.Tân Thuận Đông, Q.7. <br>ĐT: (08) 62 69 77 33</p>
                    <p>Shop Online: 40 Lê Văn Sỹ, P.11, Q.Phú Nhuận, TP.HCM. <br>ĐT: (08) 62 66 22 33</p>
                </div>
            </div>
        </div>
        <!-- /footer ipad -->

    </div>
    <div id="show_added" style="position: fixed; top: 20px; right: 20px;z-index: 9999"></div>
    <div id="show_success_mss" style="position: fixed; top: 20px; right: 20px; z-index: 9999">
        <?php if (isset($_SESSION['mss_success'])) { ?>
            <div class="alert-ml col-xs-12 alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                    <?= $_SESSION['mss_success']; ?>
            </div>
            <?php
            unset($_SESSION['mss_success']);
        }
        ?>
    </div>
    <script>
        setTimeout(function () {
            $('#show_success_mss').fadeOut().empty();
        }, 5000)
    </script>
    <script type="text/javascript">
        function base_url() {
            return '<?php echo base_url(); ?>';
        }
        $(document).ready(function () {
            $(".validate").validationEngine();
        });
    </script>
    <script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugin/ValidationEngine/js/jquery.validationEngine-en.js') ?>"></script>
    <link href="<?= base_url('assets/plugin/ValidationEngine/style/validationEngine.jquery.css') ?>" rel="stylesheet"
          media="all"/>
</footer>