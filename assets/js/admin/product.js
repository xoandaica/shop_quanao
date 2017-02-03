/* ==================products add js ===============*/
    // tags
    elt = $('#tagsinput');
    elt.tagsinput({
        //        itemValue: 'id',
        //        itemText: 'name',
        typeaheadjs: {
            name: 'rs',
            displayKey: 'tagname',
            valueKey: 'tagname',
            source: function(query,process){
                $.ajax({
                    url: base_url()+"admin/product/get_tags",
                    type: 'GET',
                    dataType: 'json',
                    data: {term:query},
                    success: function (rs) {
                        return process(rs);
                    }
                });
            }
        }
    });

    // color
    $(document).ready(function () {
        $('.color_picker').each(function () {
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom left',
                change: function (hex, opacity) {
                    if (!hex) return;
                    if (opacity) hex += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(hex);
                    }
                },
                theme: 'bootstrap'
                });

            });
    });
    function random_str() {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 0; i < 5; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
        }
    function add_corlor() {
        var str_ran = random_str();
        var str = '<div class="input-group " id="color_' + str_ran + '">\
                    <input type="text"  name="color[]" class="form-control color_picker minicolors-input input-sm"\
                    data-control="hue" value="" size="7"  aria-describedby="basic-addon2">\
                    <span class="input-group-addon color_22" id="basic-addon2" onclick="remove_color($(this))" data-items="color_' + str_ran + '" >\
                    <i class="fa fa-times"></i>\
                    </span>\
                </div>\
            ';
        $(str).appendTo($('#color_input'));
        $('.color_picker').each(function () {

        $(this).minicolors({
        control: $(this).attr('data-control') || 'hue',
        defaultValue: $(this).attr('data-defaultValue') || '',
        inline: $(this).attr('data-inline') === 'true',
        letterCase: $(this).attr('data-letterCase') || 'lowercase',
        opacity: $(this).attr('data-opacity'),
        position: $(this).attr('data-position') || 'bottom left',
        change: function (hex, opacity) {
        if (!hex) return;
        if (opacity) hex += ', ' + opacity;
        if (typeof console === 'object') {
        console.log(hex);
        }
    },
    theme: 'bootstrap'
    });

    });
    }
    function remove_color(sender) {
        $('#' + sender.attr('data-items')).empty();
        }
    $('.color_22').live(eventName, function () {
        alert('sfsf');
        var id = $(this).attr('data-items');
        $('#' + id).empty();
        });


/* ==================end products add js ===============*/


function get_product_data(sender){

    var baseurl=$('#baseurl').val();
    $.ajax({
        type: "POST",
        dataType: "json",
        url: baseurl + 'admin/product/get_product_data',
        data: {id:sender.attr('data-item')},
        success: function (rs) {
            var str='';
            str+='<form id="pro_img_frm" action="'+baseurl+'admin/product/update_counter" method="post"\
                        accept-charset="utf-8" enctype="multipart/form-data">\
                        <input name="id"  type="hidden" value="'+rs.id+'"/>\
                        <div class="col-xs-12" style="margin-bottom: 10px">\
                        <div>'+rs.name+'</div>\
                        </div>\
                        <div class="col-md-6">\
                        <input name="counter"  id="userfile" type="number" min="1" class="form-control input-sm"/>\
                        </div>\
                        </form>\
                        <div class="clearfix"></div> \
                        ';
            $("#getmodal").empty();
            $("#getmodal").html(str);

        }
    })
}

function update_order_status(sender){
    var baseurl=$('#baseurl').val();
    if(sender.attr('data-value')==1){
        var action='Xác nhận hoàn thành đơn hàng?';
    }
    if(sender.attr('data-value')==2){
        var action='Bạn có chắc chắn muốn hủy đơn hàng?';
    }


    var check=confirm(action);

    if(check==true){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: baseurl + 'admin/order/update_order_status',
            data: {item:sender.attr('data-item'),value:sender.attr('data-value')},
            success: function (rs) {

                if(rs.check==true){
                    var str=' <span class="label label-'+rs.color+'">'+rs.status+'\
                </span>';
                    $("#"+sender.attr('data-id')).html(str);
                }

            }
        })
    }

}