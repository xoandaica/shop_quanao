<article>
    <div class="container">
        <div class="row_pc">
            <div class="col-md-3 col-sm-3 col-left hidden-xs">
                <?= $right ?>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="box_title_x  w_100 back_link">
                    <a href="<?= base_url()?>" class="" title="">TRANG CHỦ </a>
                    <i class="fa fa-angle-right" style="color: #17100a"></i>
                    <a href="">Liên hệ</a>

                </div>
                <div class="clearfix"></div>
                <div class="list_prod_home" style="padding-top: 5px;">
                    <div class="content_cate_pro">
                        <div class="content-lienhe">
                            <div class="col-md-7">
                                <form action="" method="post" class="validate form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="control-label"><?= lang('fullname') ?></label>

                                        <div class="controls">
                                            <div class="input-group">
                                        <span class="input-group-addon input-sm">
                                            <i style="font-size:15px;" class="fa fa-user"></i>
                                        </span>
                                                <input type="text" name="full_name" class="validate[required] form-control input-sm"
                                                       placeholder="<?= lang('fullname') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"><?= lang('mobile') ?></label>

                                        <div class="controls">
                                            <div class="input-group">
                                        <span class="input-group-addon input-sm"><i style="font-size:20px;"
                                                                                    class="fa fa-mobile"></i></span>
                                                <input name="phone" class="validate[required,custom[phone]] form-control  input-sm"
                                                       placeholder="<?= lang('mobile') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <div class="controls">
                                            <div class="input-group">
                                        <span class="input-group-addon input-sm">
                                            <i style="font-size:10px;" class="fa fa-envelope-o"></i>
                                        </span>
                                                <input type="text" placeholder="Email"
                                                       name="email" class="validate[required,custom[email]] form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"><?= lang('address') ?></label>
                                        <div class="controls">
                                            <div class="input-group">
                                        <span class="input-group-addon input-sm"><i style="font-size:10px;"
                                                                                    class="fa fa-home"></i></span>
                                                <input type="text" placeholder="<?= lang('address') ?>"
                                                       name="address" class="validate[required] form-control placeholder input-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label class="control-label"><?= lang('comment') ?></label>

                                        <div class="controls">
                                            <div class="input-group">
                                                <span class="input-group-addon input-sm"><i class="fa fa-pencil"></i></span>
                                                <textarea name="comment" class="form-control placeholder input-sm"
                                                          rows="4" cols="78" placeholder="<?= lang('comment') ?>"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls" style="margin-left: 40%;">
                                        <input type="submit" name="sendcontact" id="signupuser"
                                               class="btn btn-primary" value="Gửi"/>
                                        <input type="reset" id="mybtn" class="btn btn-primary" value="Gửi lại">
                                    </div>
                                    <!--end form-contact-->
                                    <div class="clearfix contact-btt" style="margin-bottom: 15px;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="visible-xs" style="margin-top: 15px;">

                        </div>
                        <div class="content-address col-md-5">
                            <?= $this->address?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="list_prod_cate page-content">
                            <div class="map">
                                <div class="map_group">
                                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
                                    <script type="text/javascript">
                                        var map;
                                        var infowindow;
                                        var marker = new Array();
                                        var old_id = 0;
                                        var infoWindowArray = new Array();
                                        var infowindow_array = new Array();
                                        function initialize() {
                                            var defaultLatLng = new google.maps.LatLng(21.037863, 105.786089);
                                            var myOptions = {zoom: 15, center: defaultLatLng, scrollwheel: false, mapTypeId: google.maps.MapTypeId.ROADMAP };
                                            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                            map.setCenter(defaultLatLng);
                                            var arrLatLng = new google.maps.LatLng(21.037863, 105.786089);
                                            infoWindowArray[10349] = '<div class="map_description"><b> <?= @$this->site_name;?></b></br><strong>Địa chỉ: </strong> 33B, phố Phan Văn Trường, Cầu Giấy, Hà  </br><strong>Điện thoại: </strong><?= $this->hotline1?></div>';
                                            loadMarker(arrLatLng, infoWindowArray[10349], 10349);
                                            moveToMaker(10349);
                                        }
                                        function loadMarker(myLocation, myInfoWindow, id) {
                                            marker[id] = new google.maps.Marker({position: myLocation, map: map, visible: true});
                                            var popup = myInfoWindow;
                                            infowindow_array[id] = new google.maps.InfoWindow({ content: popup});
                                            google.maps.event.addListener(marker[id], 'mouseover', function () {
                                                if (id == old_id) return;
                                                if (old_id > 0) infowindow_array[old_id].close();
                                                infowindow_array[id].open(map, marker[id]);
                                                old_id = id;
                                            });
                                            google.maps.event.addListener(infowindow_array[id], 'closeclick', function () {
                                                old_id = 0;
                                            });
                                        }
                                        function moveToMaker(id) {
                                            var location = marker[id].position;
                                            map.setCenter(location);
                                            if (old_id > 0) infowindow_array[old_id].close();
                                            infowindow_array[id].open(map, marker[id]);
                                            old_id = id;
                                        }
                                    </script>
                                    <style type="text/css">
                                        body {
                                            margin: 0;
                                            padding: 0;
                                        }
                                    </style>
                                    <body onload="initialize()" onunload="GUnload()">
                                    <div id="map_canvas" style="width:100%; height: 400px"></div>
                                </div>
                                <!-----End Goole Maps---->
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="clearfix contact-btt" style="margin-bottom: 15px;"></div>
        </div>
    </div>
</article>

<div class="clearfix"></div>