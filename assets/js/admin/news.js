// select all
$(document).on('click change','input[name="check_all"]',function() {
    var checkboxes = $('.idRow');
    if($(this).is(':checked')) {
    checkboxes.each(function(){
    this.checked = true;
    });
} else {
    checkboxes.each(function(){
        this.checked = false;
    });
}
});
// end  select all


$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$('.view_color').click(function () {
    var color = $(this).css("border-color");
    var background = $(this).css("background-color");

    var baseurl = $("#baseurl").val();
    var form_data = {
        id: $(this).attr('data-value'), view: $(this).attr('data-view')
    };
    $.ajax({
        url: baseurl + "admin/news/update_view",
        type: 'POST',
        dataType: 'json',
        data: form_data,
        success: function (rs) {

        }
    });
    if (color != background) {
        $(this).css("background-color", color);
    } else {
        $(this).css("background-color", '#fff');
    }
})
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
});