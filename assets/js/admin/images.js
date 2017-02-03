
/*product add*/

/*Chon anh dai dien san pham*/
$(document).ready(function () {

    $("#btnSelectImg").click(function () {
        var finder = new CKFinder();
        finder.selectActionFunction = function (fileUrl) {
            var  baseurl=$("#baseurl").val();
            var img_url=fileUrl.replace(baseurl, "");

            $('#ImageUrl').val(img_url);
            var img='<img src="'+fileUrl+'" style="max-width: 100%;"/>';
            $('#img_view').html(img);
        };
        finder.popup();
    });


    $('#remove_img').click(function(){
        var  baseurl=$("#baseurl").val();
        var img='<img style="max-width: 100%:" src="'+baseurl+'img/no_image.jpg" />';
        $('#img_view').html(img);
        $('#ImageUrl').val('');
    });
});


/*Chon anh san pham*/
$(document).on('click','.select_image',function () {
    var item=$(this).attr('data-item');
    var id_url=$(this).attr('data-url');
    var finder = new CKFinder();

    finder.selectActionFunction = function (fileUrl) {
        var  baseurl=$("#baseurl").val();
        var img_url=fileUrl.replace(baseurl, "");

        $('#'+id_url).val(img_url);
        var img='<img src="'+fileUrl+'" style="max-width: 100%;"/>';
        $('#'+item).html(img);

    };
    finder.popup();
});

/*Huy bo anh san pham*/
$(document).on('click','.remove_image',function () {
    var  baseurl=$("#baseurl").val();
    var item=$(this).attr('data-item');
    var id_url=$(this).attr('data-url');
    var img='<img src="'+baseurl+'img/no_image.jpg" style="max-width: 100%;"/>';
    $('#'+item).html(img);
    $('#'+id_url).val('');
});

/*Huy bo anh san pham*/
$(document).on('click','.remove_image_item',function () {
    $(this).parent().remove();
});

/*Them 1 phan tu anh san pham*/
function add_more_image(){
    var id_item=makeid();
    var baseurl=$('#baseurl').val();
    var str='<div class="img_group col-md-6">\
                    <div class="remove_image_item pull-right" >×</div>\
                    <div class="clearfix"></div>\
                    <input name="more_file[]" type="hidden" id="'+id_item+'_url" class="input-sm form-control">\
                    <div id="'+id_item+'" class="img_div">\
                    <img style="max-width: 100% !important;" src="'+baseurl+'img/no_image.jpg" alt=""/>\
                    </div>\
                    <div class="text-center">\
                    <a class="select_image" data-item="'+id_item+'" data-url="'+id_item+'_url">Chọn</a> |\
                    <a class="remove_image" data-item="'+id_item+'" data-url="'+id_item+'_url">Hủy</a>\
                        </div>\
                    </div>';
    $('#list_image').prepend(str);
}

function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
/* /product add*/
