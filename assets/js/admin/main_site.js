

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
$('#image_review').click(function(){
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
$('#image_review2').click(function(){
    $('#input_img2').click();
})

/*<a href="base_url('vnadmin/product/delete/' . $v->id)"
 data-confirm="Bạn có chắc chắn muốn xóa?"  data-title="Xóa sản phẩm"
 class="btn btn-xs btn-danger"><i class="fa fa-times"></i> </a>*/

function myconfirm(s){
    event.preventDefault();
    var title= s.attr('data-title');
    var msg= s.attr('data-confirm');
    var url= s.attr('href');

    if($('#confirm_dialog').length<=0){
        var  modal='<div class="modal fade" id="confirm_dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >' +
            '<div class="modal-dialog modal-sm" role="document" >' +
            '<div class="modal-content" style="border-radius: 0">' +
            '<div class="modal-header" style="padding: 5px 15px">' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '<h4 class="modal-title">Modal title</h4>' +
            '</div>' +
            '<div class="modal-body">' +
            '<p></p>' +
            '</div>' +
            '<div class="modal-footer" style="padding: 5px 15px">' +
            '<a   class="confirm btn btn-primary btn-xs">Đồng ý</a>' +
            '<a   class="noconfirm btn btn-default btn-xs" data-dismiss="modal">Hủy</a>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('body').append(modal);
    }

    $('#confirm_dialog .modal-header h4').html(title);
    $('#confirm_dialog .modal-body p').html(msg);
    $('#confirm_dialog .confirm').attr('href',url);

    $('#confirm_dialog').modal();
}

$("a[data-confirm]").click(function(){
    myconfirm($(this));
});

