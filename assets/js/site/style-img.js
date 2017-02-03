
$( window ).load(function() {
    render_size();
    var url = window.location.href;
    $('.menu-item  a[href="' + url + '"]').parent().addClass('active');
});

$( window ).resize(function() {
    render_size();
});



function render_size(){


    var h_15 = $('.h_15 img').width();
    $('.h_15 img').height( 1.5 * parseInt(h_15))

}


