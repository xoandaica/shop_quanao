
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery('#woocommerce-order-items').on("keyup", ".commission_percent", function () {
    // console.log('hehe');
    percent = jQuery(this).val();

    ele = jQuery(this).parent().parent().parent();

    cost = ele.find('.item_cost > .view > del > .amount').text();
    if (cost === '') {
        cost = ele.find('.item_cost > .view > .amount').text();
    }
    cost = cost.replace(",", "");

    quantity = ele.find('.edit').find('.quantity').val();

    price = parseInt(cost) * quantity;

    new_price = price * percent / 100;

    ele.find('.commission_price').val(new_price);

    final_price = price - new_price;

    ele.find('.line_total').val(final_price);

    // console.log(final_price);

});

jQuery('#woocommerce-order-items').on("keyup", ".commission_price", function () {

    new_price = jQuery(this).val();
    // console.log(new_price);

    ele = jQuery(this).parent().parent().parent();

    cost = ele.find('.item_cost > .view > del > .amount').text();
    if (cost === '') {
        cost = ele.find('.item_cost > .view > .amount').text();
    }
    cost = cost.replace(",", "");

    quantity = ele.find('.edit').find('.quantity').val();

    price = parseInt(cost) * quantity;

    percent = new_price * 100 / price;

    ele.find('.commission_percent').val(percent.toFixed(2));

    final_price = price - new_price;

    ele.find('.line_total').val(final_price);

    // console.log(percent);

});

jQuery('#woocommerce-order-items').on('click', '.edit-order-item', function () {
    // console.log('fap');
    ele = jQuery(this).parent().parent().parent();
    ele.find('.commission_price').removeAttr("disabled");
    ele.find('.commission_percent').removeAttr("disabled");
});

jQuery('.woocommerce_order_items').on("change", '.edit .quantity', function () {
    ele = jQuery(this).parent().parent().parent();
    ele.find('.commission_price').val('');
    ele.find('.commission_percent').val('');
});

jQuery('#woocommerce-order-items').on('click', '.cremove', function () {
    
	itemid = jQuery(this).attr('itemid');
    curr_item = jQuery(this).parent().find('.wc-order-edit-line-item-actions').find('.delete-order-item');
    xpro_id = jQuery('#xpro_id').val();
    xorder_id = jQuery('#xorder_id').val(); 
	xquality = jQuery('#block_' + itemid).find('.quantity').find('.view').text();
    xcommiss = jQuery('#block_' + itemid).find('.commission_price').attr('value');
    xprice = jQuery('#block_' + itemid).find('.line_cost .line_total').attr('value');
    xsubprice = jQuery('#block_' + itemid).find('.line_cost .line_subtotal').attr('value');
    block_html = jQuery('#block_' + itemid).html(); 
    sure = confirm('Bạn có chắc là đang muốn đổi sản phẩm này ? nút cancel kế tiếp sẽ ko cứu vãn được quyết định này !');
	
	if (sure == true) {
		curr_item.click();
		
		jQuery.blockUI({css: {
				border: 'none',
				padding: '15px',
				backgroundColor: '#000',
				'-webkit-border-radius': '10px',
				'-moz-border-radius': '10px',
				opacity: .5,
				color: '#fff'
			}});

		jQuery.post(jQuery('#hidden_url').val(), {
			html: block_html,
			order_id: xorder_id,
			product_id: xpro_id,
			xquality: parseInt(xquality),
            xcommiss: parseInt(xcommiss),
            xprice: parseInt(xprice),
            xsubprice: parseInt(xsubprice),
			action: 'update_order_remove'
		}, function () {
			jQuery('#removedlist').append('<tr>' + block_html + '</tr>');
			
			jQuery.unblockUI();
		});
	} 
    

});

// totals 
jQuery(document).ready(function () {

    jQuery('#woocommerce-order-items').on("keyup", ".wc-order-totals .percent", function () {
        var commission_percent = jQuery(this).val().replace(/,/g,'');
        percent = jQuery(this).val();
        for (var i = 0; i < jQuery('#woocommerce-order-items table.woocommerce_order_items tbody#order_line_items tr').length; i++) {
            var item = jQuery('#woocommerce-order-items table.woocommerce_order_items tbody#order_line_items tr')[i];
            jQuery(item).find('.commission_percent').val(commission_percent).trigger('keyup');
        }
        commission_price = jQuery('#woocommerce-order-items table.woocommerce_order_items tbody#order_line_items input[name=commission_price_view]');
        total_commission_price = 0;
        for (var i = 0; i < commission_price.length; i++) {
            total_commission_price += parseInt(jQuery(commission_price[i]).val());
        };
        jQuery('.wc-order-totals .commission').val(total_commission_price);
        jQuery('.wc-order-totals .total .amount').text(total_commission_price);


        // price = jQuery('#_order_total_inial').attr('value');
        // new_price = price * percent / 100;
        // jQuery('.wc-order-totals .commission').attr('value', new_price);
        // final_price = price - new_price;
        // jQuery('.wc-order-totals .total .amount').text(final_price);
    });

    jQuery('#woocommerce-order-items').on("keyup", ".wc-order-totals .commission", function () {

        var total_price = 0;
        allprice = jQuery('#woocommerce-order-items table.woocommerce_order_items tbody#order_line_items tr');
        for (var i = 0; i < allprice.length; i++) {
            total_price += parseInt(jQuery(allprice[i]).find('.item_cost').attr('data-sort-value')) * parseInt(jQuery(allprice[i]).find('.edit .quantity').val());
        };
        var commission_price = jQuery(this).val().replace(/,/g,'');

        var price_follow_price = Math.round((commission_price/total_price)*100* 100)/100;

        // $('.calculate_sale input[name=commission_price]').val(commission_price);
        $('.wc-order-totals .percent').val(price_follow_price);
        // autoCompleteCommistionList(price_follow_price);
        
        for (var i = 0; i < jQuery('#woocommerce-order-items table.woocommerce_order_items tbody#order_line_items tr').length; i++) {
            var item = jQuery('#woocommerce-order-items table.woocommerce_order_items tbody#order_line_items tr')[i];
            jQuery(item).find('.commission_percent').val(price_follow_price).trigger('keyup');
        }



        // new_price = jQuery(this).val();
        // price = jQuery('#_order_total_inial').attr('value');
        // percent = new_price * 100 / price;
        // jQuery('.wc-order-totals .percent').attr('value', percent.toFixed(2));
        // final_price = price - new_price;
        // jQuery('.wc-order-totals .total .view .amount').text(final_price);
    });

});


    Number.prototype.formatMoney = function(c, d, t){
    var n = this, 
        c = isNaN(c = Math.abs(c)) ? 2 : c, 
        d = d == undefined ? "." : d, 
        t = t == undefined ? "," : t, 
        s = n < 0 ? "-" : "", 
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
        j = (j = i.length) > 3 ? j % 3 : 0;
       return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
     };