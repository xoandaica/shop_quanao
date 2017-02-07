function add_cart(id) {
    console.log(id);
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'shoppingcart/add_cart',
//        data: {id:id , quantity:$('#quantity_pro').val()},
        data: {id: id},
        success: function (result) {
            if (result.status == true) {
//                $('.bs-example-modal-sm').modal();
                var t = '<div class="alert alert-success alert-dismissible alert-ml" role="alert"\
                    style="position: absolute;right: 40px;top:250px;padding: 5px; ">\
                          Sản phẩm bạn chọn đã thêm vào giỏ hàng!\
                    </div>';
                var t2 = '<div class=" alert-ml col-xs-12 alert alert-info alert-dismissible" role="alert">\
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                        + result.mess +
                        '<br>' + 'Giỏ hàng: &nbsp;' + result.count + '&nbsp;sản phẩm&nbsp;&nbsp;&nbsp;<a style="float: right" href="' + base_url() + 'gio-hang' + '">Chi tiết <i class="fa fa-angle-double-right"></i></a>' +
                        '</div>';
                $('#show_added').html(t2);
                $('.number_item').html('' + result.count + '');
                $('.number-cart').text('' + result.count + '');


                $('.totalPrice').html('' + result.totalPrice + ' đ');
                $('.totalPrice').html(result.totalPrice + ' đ');
                setTimeout(function () {
                    $('#show_added').empty();
                }, 5000)
            }
        }
    })
}
function add_liked(id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'shoppingcart/add_liked',
//        data: {id:id , quantity:$('#quantity_pro').val()},
        data: {id: id},
//        data: {alias:alias},
        success: function (result) {
            if (result.status == true) {
//                $('.bs-example-modal-sm').modal();
                var t = '<div class="alert alert-success alert-dismissible alert-ml" role="alert"\
                    style="position: absolute;right: 40px;top:250px;padding: 5px; ">\
                            +result.mess\
                    </div>';
                var t2 = '<div class=" alert-ml col-xs-12 alert alert-info alert-dismissible" role="alert">\
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                        + result.mess +
//                    '<br>'+'Giỏ hàng: '+result.count+'sản phẩm&nbsp;&nbsp;&nbsp;<a style="float: right" href="'+ base_url()+'gio-hang'+'">Chi tiết <i class="fa fa-angle-double-right"></i></a>' +
                        '</div>';

                $('#show_added').html(t2);
                $('.like').html('' + result.like + '');
                $('.number_item_like').html('' + result.count + '');
                $('.name_item').html('' + result.name + '');
                $('.totalPrice_like').html('' + result.totalPrice + ' đ');
                $('.totalPrice_like').html(number_format(result.totalPrice) + ' đ');
                setTimeout(function () {
                    $('#show_added').empty();
                }, 5000)
            }
        }
    })
}
function add_cart_pro(id) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'shoppingcart/add_cart_pro',
        data: {id: id, quantity: $('#quantity_pro').val()},
        success: function (result) {
            if (result.status == true) {
//                $('.bs-example-modal-sm').modal();
                var t = '<div class="alert alert-success alert-dismissible alert-ml" role="alert"\
                    style="position: absolute;right: 40px;top:250px;padding: 5px; ">\
                        Sản phẩm bạn chọn đã thêm vào giỏ hàng!\
                    </div>';
                var t2 = '<div class=" alert-ml col-xs-12 alert alert-info alert-dismissible" role="alert">\
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                        + result.mess +
                        '<br>' + 'Giỏ hàng: ' + result.count + '&nbsp; sản phẩm&nbsp;&nbsp;&nbsp;<a style="float: right" href="' + base_url() + 'gio-hang' + '">Chi tiết <i class="fa fa-angle-double-right"></i></a>' +
                        '</div>';
                $('#show_added').html(t2);
                $('.number_item').html('' + result.count + '');
                $('.totalPrice').html('' + result.totalPrice + ' đ');
//                $('.totalPrice').html(formatNumber(result.totalPrice));
                setTimeout(function () {
                    $('#show_added').empty();
                }, 5000)
            }
        }

    })
}
function handleFiles() {
    var filesToUpload = document.getElementById('input_img').files;
    var file = filesToUpload[0];

    // Create an image
    var img = document.createElement("img");
    // Create a file reader
    var reader = new FileReader();
    // Set the image once loaded into file reader
    reader.onload = function (e) {
        img.src = e.target.result;

        var canvas = document.createElement("canvas");
        //var canvas = $("<canvas>", {"id":"testing"})[0];
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        var MAX_WIDTH = 4000;
        var MAX_HEIGHT = 4000;
        var width = img.width;
        var height = img.height;

        if (width > height) {
            if (width > MAX_WIDTH) {
                height *= MAX_WIDTH / width;
                width = MAX_WIDTH;
            }
        } else {
            if (height > MAX_HEIGHT) {
                width *= MAX_HEIGHT / height;
                height = MAX_HEIGHT;
            }
        }
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);

        var dataurl = canvas.toDataURL("image/png");
        document.getElementById('image_review').src = dataurl;
    }
    // Load files into file reader
    reader.readAsDataURL(file);


    // Post the data
    /*
     var fd = new FormData();
     fd.append("name", "some_filename.jpg");
     fd.append("image", dataurl);
     fd.append("info", "lah_de_dah");
     */
}
$('#image_review').click(function () {
    $('#input_img').click();
})
function handleFiles2() {
    var filesToUpload = document.getElementById('input_img2').files;
    var file = filesToUpload[0];

    // Create an image
    var img = document.createElement("img");
    // Create a file reader
    var reader = new FileReader();
    // Set the image once loaded into file reader
    reader.onload = function (e) {
        img.src = e.target.result;

        var canvas = document.createElement("canvas");
        //var canvas = $("<canvas>", {"id":"testing"})[0];
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);

        var MAX_WIDTH = 4000;
        var MAX_HEIGHT = 4000;
        var width = img.width;
        var height = img.height;

        if (width > height) {
            if (width > MAX_WIDTH) {
                height *= MAX_WIDTH / width;
                width = MAX_WIDTH;
            }
        } else {
            if (height > MAX_HEIGHT) {
                width *= MAX_HEIGHT / height;
                height = MAX_HEIGHT;
            }
        }
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, width, height);

        var dataurl = canvas.toDataURL("image/png2");
        document.getElementById('image_review2').src = dataurl;
    }
    // Load files into file reader
    reader.readAsDataURL(file);


    // Post the data
    /*
     var fd = new FormData();
     fd.append("name", "some_filename.jpg");
     fd.append("image", dataurl);
     fd.append("info", "lah_de_dah");
     */
}
$('#image_review2').click(function () {
    $('#input_img2').click();
})
/*
 jQuery(document).ready(function() {
 jQuery("img.lazy").lazy({
 effect: "fadeIn",
 effectTime: 3500  //In milliseconds
 });
 });
 */
function likep(s) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'products/like',
        data: {id: s.attr('data-item')},
        success: function (result) {
            s.attr('onclick', 'unlikep($(this))');
            s.find('i').attr('class', 'fa fa-heart');
        }
    })
}
function unlikep(s) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'products/un_like',
        data: {id: s.attr('data-item')},
        success: function (result) {
//            s.find('i').attr('onlclick','likep($(this))').attr('class','fa fa-heart-o');
            s.attr('onclick', 'likep($(this))');
            s.find('i').attr('class', 'fa fa-heart-o');
        }
    })
}
$('.araSubmenu>a').click(function (e) {
    e.preventDefault();
    if ($(window).innerWidth() > 1024) {
        var hr = ($(this).attr('href'));
        window.location.href = hr;
    } else {
        return false
    }

});
/*++++++++++++++++++++++++++++++++++ Users +++++++++++++++++++++++++++++++++++=*/
function check_mail(val) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'users/check-email',
        data: {email: val},
        success: function (result) {

            if (result.check == false) {
                var ms = '<div class="form-validation-field-1formError parentFormloginform formError"\
                        style="opacity: 0.87; position: absolute; top: 0px; left: 376px; margin-top: -31px;">\
                            <div class="formErrorContent">* ' + result.mss + '<br></div>\
                            <div class="formErrorArrow">\
                            <div class="line10"> </div><div class="line9"></div><div class="line8">\
                            </div><div class="line7"></div><div class="line6"></div><div class="line5">\
                            </div><div class="line4"></div><div class="line3"></div><div class="line2"></div>\
                            <div class="line1"></div></div>\
                            </div>';

                $('#show_error').html(ms);
                $('#show_error2').html(ms);
                $('#btn-signup').attr('disabled', 'disabled');
                $('#status_check').attr('value', '2');
            } else if (result.check == true) {
                $('#btn-signup').removeAttr("disabled");
                $('#show_error').empty();
                $('#status_check').attr('value', '1');
            }
        }
    });
}
function check_emails_code(val) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'users/check_email_code',
        data: {code: val},
        success: function (result) {
            if (result.check == false) {
                var ms = '<div class="form-validation-field-1formError parentFormloginform formError"\
                        style="opacity: 0.87; position: absolute; top: 0px; left: 376px; margin-top: -31px;">\
                            <div class="formErrorContent">* ' + result.mss + '<br></div>\
                            <div class="formErrorArrow">\
                            <div class="line10"> </div><div class="line9"></div><div class="line8">\
                            </div><div class="line7"></div><div class="line6"></div><div class="line5">\
                            </div><div class="line4"></div><div class="line3"></div><div class="line2"></div>\
                            <div class="line1"></div></div>\
                            </div>';

                $('#show_error').html(ms);
                $('#show_error2').html(ms);
                $('#btn-signup').attr('disabled', 'disabled');
                $('#status_check').attr('value', '2');
            } else if (result.check == true) {
                $('#btn-signup').removeAttr("disabled");
                $('#show_error').empty();
                $('#status_check').attr('value', '1');
            }
        }
    });
}

function check_capcha() {
    $('#singup_form').submit();
//    $.ajax({
//        type: "POST",
//        dataType: "json",
//        url: base_url() + 'users_frontend/check_capcha',
//        data: {capcha: $('#captcha_input').val(), challenge: $('#captcha_check').val()},
//        success: function (result) {
//            if (result.check == true) {
//                $('#singup_form').submit();
//            } else {
//                $('#error_capcha').html('MĂ£ xĂ¡c nháº­n khĂ´ng chĂ­nh xĂ¡c!');
//                setTimeout(function () {
//                    $('#error_capcha').empty();
//                }, 5000);
//            }
//        }
//    });
}

function refresh_capcha() {

    $.ajax({
        type: "POST",
        dataType: "json",
        url: base_url() + 'users_frontend/refresh_capcha',
        data: {capcha: $('#captcha_input').val(), captcha_check: $('#captcha_check').val()},
        success: function (result) {
            $('#captcha_check').val(result.word);
            $('#captcha_img').html(result.image);
        }
    });
}


$('.cate-title').click(function () {
    if ($('.catemenuBaza').hasClass('nav-for-page')) {
        $('.catemenuBaza').removeClass('nav-for-page').css({'display': 'block'});
    } else {
        $('.catemenuBaza').addClass('nav-for-page').css({'display': 'none'});
    }
});

$('#srollto').click(function () {
//    alert(1);
    var catTopPosition = jQuery('#similar_products').offset().top;
    // Scroll down to 'catTopPosition'
    jQuery('html, body').animate({scrollTop: parseInt(catTopPosition) - 80}, 'slow');
});