<article>
    <div class="content-page">
        <div class="kk-new-page">
            <div class="container contact-page">
                <div class="row hidden-lg hidden-md hidden-sm">
                </div>
                <div class="row headding-page">
                    <div class="col-md-12 col-xs-12" style="padding-top: 5px;">
                        <div class="contact-headding"><span>Liên hệ</span></div>
                    </div>
                </div>
                <div class="row contact-page">

                    <div class="col-md-12 col-xs-12">
                        <p>Vui lòng điền các thông tin sau:</p>
                    </div>
                    <form action="" method="post" class="validate form-horizontal" role="form" >
                        <div class="col-md-6 col-xs-12">
                            <div class="form-contact">

                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-lg-3 col-sm-2 col-xs-4 control-label"><?= lang('fullname') ?> <span>(*)</span></label>
                                        <div class="col-lg-9 col-sm-8 col-xs-8">
                                            <input type="text" name="full_name" class="validate[required] form-control input-small required"
                                                   placeholder="<?= lang('fullname') ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-lg-3 col-sm-2 col-xs-4 control-label">Email <span>(*)</span></label>
                                        <div class="col-lg-9 col-sm-8 col-xs-8">
                                            <input type="text" placeholder="Email"
                                                   name="email" class="validate[required,custom[email]] form-control input-small required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPhone" class="col-lg-3 col-sm-2 col-xs-4 control-label"><?= lang('mobile') ?><span>(*)</span></label>
                                        <div class="col-lg-9 col-sm-8 col-xs-8">
                                            <input name="phone" class="validate[required,custom[phone]] form-control  input-small required"
                                                   placeholder="<?= lang('mobile') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputTitle" class="col-lg-3 col-sm-2 col-xs-4 control-label"><?= lang('address') ?><span>(*)</span></label>
                                        <div class="col-lg-9 col-sm-8 col-xs-8">
                                            <input type="text" placeholder="<?= lang('address') ?>"
                                                   name="address" class="validate[required] form-control placeholder input-small required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputMessage" class="col-lg-3 col-sm-2 col-xs-4 control-label"><?= lang('comment') ?></label>
                                        <div class="col-lg-9 col-sm-8 col-xs-8">
                                            <textarea name="comment" class="form-control placeholder input-small required"
                                                      rows="4" cols="78" placeholder="<?= lang('comment') ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-2 col-md-2"></div>
                                        <div class="col-sm-8 col-md-10">
                                            <input type="submit" name="sendcontact" id="signupuser"
                                                   class="kk-btn-send pull-right btn-contact" value="Gửi"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-6 form-contact">
    <!--                        <table width="100%">
                                <tbody><tr>
                                    <td>Mã xác thực</td>
                                </tr>
                                <tr>
                                    <td>
                                                                    <p>
                                <script type="text/javascript" src="http://www.google.com/recaptcha/api/challenge?k=6Lf14OcSAAAAAD2IEZNAv0PWyF6ifXoLh_araaY3"></script><script type="text/javascript" src="https://www.google.com/recaptcha/api/js/recaptcha.js"></script></p><div id="recaptcha_widget_div" class=" recaptcha_nothad_incorrect_sol recaptcha_isnot_showing_audio"><div id="recaptcha_area"><table id="recaptcha_table" class="recaptchatable recaptcha_theme_red"> <tbody><tr> <td colspan="6" class="recaptcha_r1_c1"></td> </tr> <tr> <td class="recaptcha_r2_c1"></td> <td colspan="4" class="recaptcha_image_cell"><center><div id="recaptcha_image" style="width: 300px; height: 57px;"><img id="recaptcha_challenge_image" alt="reCAPTCHA challenge image" height="57" width="300" src="https://www.google.com/recaptcha/api/image?c=03AHJ_Vuv2ZAEKpdmFydygeFqc0yFsJVQiuJ39XUCIshqE5lfplhE4AFOFylJRTC6c0JRSBHVG5ct5YTouCcPvU-70nDb_EEhmwZziv5PqsRftDOYoIGBL9OiO3ecm-AKpDlJIcA4HfyODfPZ8exdYtm2kYIhxNHjJsXDJY4Bq-SG593hAS24j6Uqixab6-8AsvqkJC0_JCkb40yjqVD6niyvgum-KLSTfLw&amp;th=,n25Xbk-wJ1UayKXZzYu2BR_MRa3-fujwAAAARqAAAACCawN8dREwHQk2dBYyEdBtATwlbEja3yp93IlLZG6e1qQVi1Hpk6856dwxUqeV6ZZX4NI3fEDrO4-o9VWsuyatlngiYQyCuEd3Fl9zleBTe5WCXVPwxPOe3Ziqpz_y56YOu1smNnXQFRIHCdxh1zGZgPtam5cEM_4KQ7tKfaJFUtlHZ15k9VCESoRFfSbL9KmSKpPH_XrBThPQ1HJk3UlCd2aIHY4mhW1WkoWfwKAB3Bc2x0Gk7OTAJc2N6UKozKdVjI6wWdVW-MbBhjE5axvchEX1XY0CkEZ4VNm_mcJFBUuCkTxTUPfX9GSLOQRSkWXO1NrZyotu82H5V4FKRf5-6PilgGxhLcgFjkl6IwyzEF9T9dwa3CrdFrWdpEqsMMSSiQWC1o8H821NQ1grw_pnAwikB1-0OQoVvJAU6XCD2_9j6yHhNpJdT1aNNkuZyEOvFqFGTFLKTEyWYuAqTBYCE7EjdrzndBPOzH8H-ub_qfKlM7A6FRtC4EF8fI3Hs1gc3kmk6mxYL4TT6VUtdx7eDzeOdawjTD2J3XstE5gy9NxpU-wbiGvvw5MSsP_1KdnCkOEaicNS8YFLmRoW6OdAekpKaCdfRpzb7UizbTSGUm9CkLtOkbMiF5b1sUdc63TlxWPBGcLX_BaGr5GaGOobof6-2glrRTnqUJsdkfBGcHctQt6CXP_L52vQkd1AykUaep7ds4HRctkxurklMtznG_DHDvv7C643_7pQ-pl5rsscP6SnvbPcWqfUhZjP223x-AhM7hwBzaa4eO4A63hdo33tk6HkAgn2smWs33neLD-Eb-FKYnBz64MAh_4KiWRGA7yLEcSftudl5PU5zDjd0DNK_yVJIJrPsAk2t3lFEU2o7aF-GAOedIvvNm7yjkdJKALpKMk-ubWQ8ybjvZBBty10SOP1reicm-Br_ZAWHQT5aUqMbLtz5j0eIDPKa9r64B0HD4Q_8yxa_Uh6zGXBKkxSpbR7cIDuEF4DM5wuqJuSMWOZUiknPgAFJa0PSgB4e1XCbYEnJaPp7VmiFypLHoiksraz1suceAsyunw-LrKdVk_xLW_Ds9RNYpx95WWplDl1Q7gRX-FxECYiO2A7q4RdhcPy1ru8KO6TjEPcO1-q08KP2TWGx7tU5MwZpwMKkDY096tDr9Vs_-Ok25Hy99NQsLDYGSg32Kd30ohqeg"></div></center></td> <td class="recaptcha_r2_c2"></td> </tr> <tr> <td rowspan="6" class="recaptcha_r3_c1"></td> <td colspan="4" class="recaptcha_r3_c2"></td> <td rowspan="6" class="recaptcha_r3_c3"></td> </tr> <tr> <td rowspan="3" class="recaptcha_r4_c1" height="49"> <div class="recaptcha_input_area"> <span id="recaptcha_challenge_field_holder" style="display: none;"><input type="hidden" name="recaptcha_challenge_field" id="recaptcha_challenge_field" value="03AHJ_Vuv2ZAEKpdmFydygeFqc0yFsJVQiuJ39XUCIshqE5lfplhE4AFOFylJRTC6c0JRSBHVG5ct5YTouCcPvU-70nDb_EEhmwZziv5PqsRftDOYoIGBL9OiO3ecm-AKpDlJIcA4HfyODfPZ8exdYtm2kYIhxNHjJsXDJY4Bq-SG593hAS24j6Uqixab6-8AsvqkJC0_JCkb40yjqVD6niyvgum-KLSTfLw"></span><input name="recaptcha_response_field" id="recaptcha_response_field" type="text" autocorrect="off" autocapitalize="off" placeholder="Type the text" autocomplete="off"> <span id="recaptcha_privacy" class="recaptcha_only_if_privacy"><a href="http://www.google.com/intl/en/policies/" target="_blank">Privacy &amp; Terms</a></span> </div> </td> <td rowspan="4" class="recaptcha_r4_c2"></td> <td><a id="recaptcha_reload_btn" title="Get a new challenge"><img id="recaptcha_reload" width="25" height="17" src="https://www.google.com/recaptcha/api/img/red/refresh.gif" alt="Get a new challenge"></a></td> <td rowspan="4" class="recaptcha_r4_c4"></td> </tr> <tr> <td><a id="recaptcha_switch_audio_btn" class="recaptcha_only_if_image" title="Get an audio challenge"><img id="recaptcha_switch_audio" width="25" height="16" alt="Get an audio challenge" src="https://www.google.com/recaptcha/api/img/red/audio.gif"></a><a id="recaptcha_switch_img_btn" class="recaptcha_only_if_audio" title="Get a visual challenge"><img id="recaptcha_switch_img" width="25" height="16" alt="Get a visual challenge" src="https://www.google.com/recaptcha/api/img/red/text.gif"></a></td> </tr> <tr> <td><a id="recaptcha_whatsthis_btn" title="Help"><img id="recaptcha_whatsthis" width="25" height="16" src="https://www.google.com/recaptcha/api/img/red/help.gif" alt="Help"></a></td> </tr> <tr> <td class="recaptcha_r7_c1"></td> <td class="recaptcha_r8_c1"></td> </tr> </tbody></table> </div></div>
    
            <noscript>
                    &lt;iframe src="http://www.google.com/recaptcha/api/noscript?k=6Lf14OcSAAAAAD2IEZNAv0PWyF6ifXoLh_araaY3" height="300" width="500" frameborder="0"&gt;&lt;/iframe&gt;&lt;br/&gt;
                    &lt;textarea name="recaptcha_challenge_field" rows="3" cols="40"&gt;&lt;/textarea&gt;
                    &lt;input type="hidden" name="recaptcha_response_field" value="manual_challenge"/&gt;
            </noscript>                          <p></p>
                                                                                   <script type="text/javascript">
                                    function checkform(){
                                        var required = $('#commentforms .required');
                                        for(var i=0;i<required.length;i++){
                                            var each = required[i];
                                             if($(each).val()==''){
                                                alert('Please fill '+$(each).attr('placeholder')+'!');
                                                $(each).focus();
                                                return false;
                                            }
                                        }
                                    }
                                </script>
                                                                    </td>
                                </tr>
                            </tbody></table>-->
                            <span class="bold" style="font-size: 20px;"><?= @$this->site_name; ?></span>
                            <div class="kk-info">
                                <p> <?= $this->address ?></p>
                            </div>
                        </div>
                    </form>
                </div>
<!--                <div class="row">
                    <div class="col-md-12">
                        <div class="head-lacate">
                            <span class="bold" style="font-size: 20px;"> Thông tin cửa hàng</span>
                        </div>
                    </div>
                </div>-->
<!--                <div class="row locate-item">
                    <div class="map_gg">
                        <div class="map" id="map" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; z-index: 0; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; position: absolute; left: 312px; top: 142px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 568px; top: 142px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 568px; top: -114px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 312px; top: -114px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 312px; top: 398px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 568px; top: 398px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 56px; top: 142px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 56px; top: 398px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 56px; top: -114px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -200px; top: 142px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -200px; top: 398px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -200px; top: -114px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 312px; top: 142px;"><canvas draggable="false" height="256" width="256" style="user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 568px; top: 142px;"><canvas draggable="false" height="256" width="256" style="user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 568px; top: -114px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 312px; top: -114px;"><canvas draggable="false" height="256" width="256" style="user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 312px; top: 398px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 568px; top: 398px;"><canvas draggable="false" height="256" width="256" style="user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 56px; top: 142px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 56px; top: 398px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 56px; top: -114px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -200px; top: 142px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -200px; top: 398px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -200px; top: -114px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="position: absolute; left: 312px; top: 142px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3261!3i1924!4i256!2m3!1e0!2sm!3i373056106!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=71257" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 568px; top: 398px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3262!3i1925!4i256!2m3!1e0!2sm!3i373056106!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=53735" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 56px; top: 142px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3260!3i1924!4i256!2m3!1e0!2sm!3i373056106!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=124800" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 312px; top: 398px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3261!3i1925!4i256!2m3!1e0!2sm!3i373056106!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=107278" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 312px; top: -114px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3261!3i1923!4i256!2m3!1e0!2sm!3i373056106!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=35236" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 56px; top: -114px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3260!3i1923!4i256!2m3!1e0!2sm!3i373056106!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=88779" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -200px; top: -114px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3259!3i1923!4i256!2m3!1e0!2sm!3i373056022!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=22588" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -200px; top: 142px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3259!3i1924!4i256!2m3!1e0!2sm!3i373056022!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=58609" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -200px; top: 398px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3259!3i1925!4i256!2m3!1e0!2sm!3i373055818!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=10109" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 56px; top: 398px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3260!3i1925!4i256!2m3!1e0!2sm!3i373056106!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=29750" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 568px; top: -114px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3262!3i1923!4i256!2m3!1e0!2sm!3i373056106!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=112764" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 568px; top: 142px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i12!2i3262!3i1924!4i256!2m3!1e0!2sm!3i373056106!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=17714" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 4; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div><iframe style="visibility: hidden; z-index: 0; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;"></iframe></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=10.788345,106.627889&amp;z=12&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 210px; top: 185px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2017 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 255px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span style="">Map data ©2017 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2017 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 95px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div style="cursor: pointer; width: 25px; height: 25px; overflow: hidden; display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/sv9.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 175px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@10.788345,106.6278892,12z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control" draggable="false" controlwidth="28" controlheight="55" style="margin: 10px; user-select: none; position: absolute; left: 0px; top: 0px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 0px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 28px; height: 55px;"><div title="Zoom in" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230); top: 0px;"></div><div title="Zoom out" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div></div></div></div><div class="gmnoprint gm-bundled-control" draggable="false" controlwidth="28" controlheight="28" style="margin: 10px; user-select: none; position: absolute; top: 75px; left: 0px;"><div class="gm-svpc" controlwidth="28" controlheight="28" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default; position: absolute; left: 0px; top: 0px;"><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Pegman is on top of the Map" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="0" controlheight="0" style="margin: 10px; user-select: none; position: absolute; display: none; bottom: 14px; right: 0px;"><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; cursor: pointer; background-color: rgb(255, 255, 255); display: none;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);"><img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div draggable="false" class="gm-style-cc" style="position: absolute; user-select: none; height: 14px; line-height: 14px; right: 166px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><span>2 km&nbsp;</span><div style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 53px;"><div style="width: 100%; height: 4px; position: absolute; left: 0px; top: 0px;"></div><div style="width: 4px; height: 8px; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"></div><div style="width: 4px; height: 8px; position: absolute; background-color: rgb(255, 255, 255); left: 0px; bottom: 0px;"></div><div style="position: absolute; background-color: rgb(102, 102, 102); height: 2px; left: 1px; bottom: 1px; right: 1px;"></div><div style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(102, 102, 102);"></div><div style="width: 2px; height: 6px; position: absolute; background-color: rgb(102, 102, 102); bottom: 1px; right: 1px;"></div></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 48px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show street map" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 22px; font-weight: 500;">Map</div><div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 29px; text-align: left; display: none;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Show satellite imagery" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-left: 0px; min-width: 40px;">Satellite</div><div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 29px; text-align: left; display: none;"><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></div>
                    </div>
                    <div class="col-xs-12 hidden-lg hidden-md hidden-sm">
                <p> <?= $this->address ?></p>
                    </div>


                </div>-->

            </div>
        </div>
    </div>

    <!--    <div class="container">
            <div class="row_pc">
                <div class="col-md-3 col-sm-3 col-left hidden-xs">
    <?= $right ?>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="box_title_x  w_100 back_link">
                        <a href="<?= base_url() ?>" class="" title="">TRANG CHỦ </a>
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
                                        end form-contact
                                        <div class="clearfix contact-btt" style="margin-bottom: 15px;"></div>
                                    </form>
                                </div>
                            </div>
                            <div class="visible-xs" style="margin-top: 15px;">
    
                            </div>
                            <div class="content-address col-md-5">
    <?= $this->address ?>
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
                                                infoWindowArray[10349] = '<div class="map_description"><b> <?= @$this->site_name; ?></b></br><strong>Địa chỉ: </strong> 33B, phố Phan Văn Trường, Cầu Giấy, Hà  </br><strong>Điện thoại: </strong><?= $this->hotline1 ?></div>';
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
                                    ---End Goole Maps--
                                </div>
                            </div>
    
                        </div>
    
                    </div>
                </div>
                <div class="clearfix contact-btt" style="margin-bottom: 15px;"></div>
            </div>
        </div>-->
</article>

<div class="clearfix"></div>