jQuery(document).ready(function() {
	if(jQuery('#ksoft_return').length){

		// for (var i = 0; i < jQuery('.woocommerce_order_items #order_line_items > tr').length; i++) {
		// 	var item = jQuery(jQuery('.woocommerce_order_items #order_line_items > tr')[i]);
			

	 //        var html = '<tr>' + jQuery('#ksoft_return .template tr').html() + '</tr>';


	 //        var name = item.find('.name').attr('data-sort-value');
	 //        var product_id = item.find('.name .order_item_id').val();

	 //        var quantity = item.find('input.quantity').val();

	 //        var total_price = item.find('.item_cost').attr('data-sort-value');

	 //        var commission_price = item.find('.commission_price').val();
	 //        var commission_percent = item.find('.commission_percent').val();

	 //        var line_total = item.find('.line_cost input.line_total').val();
  //       	var price = total_price - commission_price/quantity;


	 //        var row = jQuery(html).clone();

	 //        row.find('#template_name').html(name);

  //           find_product_id(row, total_price); // tim product_id

	 //        row.find('.quantity').val(quantity); 
        	
  //       	row.find('input[name=total_price_view]').val(parseInt(total_price).formatMoney(0));
        	
  //       	row.find('input[name=total_price]').val(total_price);
        	
  //       	row.find('input[name=commission_percent]').val(commission_percent);
        	
  //       	row.find('input[name=commission_price]').val(commission_price);
        	
  //       	row.find('input[name=commission_price_view]').val(parseInt(commission_price).formatMoney(0));
        	
  //       	row.find('.price').html(parseInt(line_total).formatMoney(0)).attr('data-price',price);
        	
  //       	row.find('input[name=paid]').val(line_total);
        	
  //       	row.find('input[name=paid_view]').val(parseInt(line_total).formatMoney(0));

  //           if(jQuery('#ksoft_product tbody tr td').length>1){
  //               jQuery('#ksoft_product tbody').append(row);
  //           }else{
  //               jQuery('#ksoft_product tbody').html(row);
  //           }
		// }


	    jQuery('#ksoft_return #method_payment').on('change', function(event) {
	        if(jQuery(this).val() == 1){
	            jQuery('#ksoft_return #paid_cash_view').show();
	            jQuery('#ksoft_return #paid_card_view').hide();
	            jQuery('#ksoft_return #paid_cod_view').hide();
	        }
	        if(jQuery(this).val() == 2){
	            jQuery('#ksoft_return #paid_cash_view').hide();
	            jQuery('#ksoft_return #paid_card_view').show();
	            jQuery('#ksoft_return #paid_cod_view').hide();
	        }
	        if(jQuery(this).val() == 3){
	            jQuery('#ksoft_return #paid_cash_view').hide();
	            jQuery('#ksoft_return #paid_card_view').hide();
	            jQuery('#ksoft_return #paid_cod_view').show();
	        }
	    });
	    jQuery('#ksoft_return #method_payment').trigger('change');

	    calculate_return_total();

        jQuery('#ksoft_return .method_payment input[name=ship_price_view]').keyup(function(event) {
            var ship_price = jQuery(this).val().replace(/,/g,'');
            if(ship_price == '') ship_price = 0;
            jQuery('#ksoft_return .method_payment input[name=ship_price]').val(ship_price);
            jQuery(this).val(parseInt(ship_price).formatMoney(0));
            calculate_return_total();
        });
        jQuery('#ksoft_return .calculate_sale input[name=ship_price_view]').trigger('keyup');
	}

});

function calculate_return_total(){
    table_list = jQuery('#ksoft_product tbody tr');
    sum_price = 0;
    total_price = 0;
    ship_price = jQuery('#ksoft_return .calculate_sale input[name=ship_price]').val();
    for (var i = 0; i < table_list.length; i++) {
        item = table_list[i];
        sum_price += parseInt(jQuery(item).find('input[name=total_price]').val()) * parseInt(jQuery(item).find('input[name=quantity]').val());
        total_price += parseInt(jQuery(item).find('span.price').attr('data-price')) * parseInt(jQuery(item).find('input[name=quantity]').val());
    };
    sum_price += parseInt(ship_price);
    total_price += parseInt(ship_price);
    jQuery('#ksoft_return .calculate_sale input[name=sum_price]').val(sum_price);
    jQuery('#ksoft_return .calculate_sale input[name=sum_price_view]').val(sum_price.formatMoney(0));
    jQuery('#ksoft_return .calculate_sale input[name=total_price]').val(total_price);
    jQuery('#ksoft_return .calculate_sale input[name=total_price_view]').val(total_price.formatMoney(0));
    var paid = jQuery('#ksoft_product input[name=paid]');
    var total_return = 0;
    for(var i=0;i<paid.length;i++){
        total_return+= parseInt(jQuery(paid[i]).val());
    }
    total_return += parseInt(ship_price);
    jQuery('#ksoft_return input[name=total_return_view]').val(total_return.formatMoney(0));
    jQuery('#ksoft_return input[name=total_return]').val(total_return);
    jQuery('#ksoft_return input[name=paid_cash_view]').val(total_return.formatMoney(0));
    jQuery('#ksoft_return input[name=paid_cash]').val(total_return);
    jQuery('#ksoft_return input[name=paid_card_view]').val(total_return.formatMoney(0));
    jQuery('#ksoft_return input[name=paid_card]').val(total_return);
    jQuery('#ksoft_return input[name=paid_cod_view]').val(total_return.formatMoney(0));
    jQuery('#ksoft_return input[name=paid_cod]').val(total_return);
}

// function find_product_id(element, total_price){

//     jQuery.ajax({
//         type: "POST",
//         url: jQuery('#hidden_url').val(),
//         data: {
//             price: total_price,
//             action: 'searchProductKsoft',
//         },
//         success: function (data) {
//             element.find('.quantity').attr('data', data.product_id);
//         }
//     });
// }


function save_return_add(){
    var quantity = '';
    var key = '';
    var order_detail_id = '';
    var id_textbox = jQuery('form#ksoft_return .quantity');
    var unit_id = '';
    for(var i=0; i<id_textbox.length; i++){
        if(i!=id_textbox.length-1) quantity += jQuery(id_textbox[i]).val()+',';
        else quantity += jQuery(id_textbox[i]).val();

        if(i!=id_textbox.length-1) key += jQuery(id_textbox[i]).attr('data')+',';
        else key += jQuery(id_textbox[i]).attr('data');

        if(i!=id_textbox.length-1) order_detail_id += jQuery(id_textbox[i]).attr('data-order-detail')+',';
        else order_detail_id += jQuery(id_textbox[i]).attr('data-order-detail');

        if(i!=id_textbox.length-1) unit_id += '4,';
        else unit_id += '4';
    }

    var paid = '';
    var id_textbox = jQuery('form#ksoft_return input[name=paid].paid');
    for(var i=0; i<id_textbox.length; i++){
        if(i!=id_textbox.length-1) paid += jQuery(id_textbox[i]).val()+',';
        else paid += jQuery(id_textbox[i]).val();
    }

    var store_id = '';
    var id_textbox = jQuery('form#ksoft_return select.store_id');
    for(var i=0; i<id_textbox.length; i++){
        if(i!=id_textbox.length-1) store_id += jQuery(id_textbox[i]).val()+',';
        else store_id += jQuery(id_textbox[i]).val();
    }

    var price = '';
    var id_textbox = jQuery('form#ksoft_return .price');
    for(var i=0; i<id_textbox.length; i++){
        if(i!=id_textbox.length-1) price += jQuery(id_textbox[i]).attr('data-price')+',';
        else price += jQuery(id_textbox[i]).attr('data-price');
    }

    var commission_price = [];
    var id_textbox = jQuery('form#ksoft_return input[name=commission_price].commission_price');
    for(var i=0; i<id_textbox.length; i++){
        commission_price[i] = jQuery(id_textbox[i]).val();
    }

    var commission_percent = [];
    var id_textbox = jQuery('form#ksoft_return .commission_percent');
    for(var i=0; i<id_textbox.length; i++){
        commission_percent[i] = jQuery(id_textbox[i]).val();
    }

    var commission = '';
    for(var i=0; i<commission_price.length; i++){
        if(i!=commission_price.length-1) commission += commission_price[i]+'|'+commission_percent[i]+',';
        else commission += commission_price[i]+'|'+commission_percent[i];
    }

    jQuery('#key').val(key);
    jQuery('#order_detail_id').val(order_detail_id);
    jQuery('#quantity').val(quantity);
    jQuery('#unit_id').val(unit_id);
    jQuery('#product_paid').val(paid);
    jQuery('#store_id').val(store_id);
    jQuery('#product_price').val(price);
    jQuery('#commission').val(commission);

         jQuery.ajax({
           type:'POST',
           url: jQuery('#hidden_url').val(),
           data: jQuery('#ksoft_return').serialize(),
           beforeSend: function(xhr) {
                jQuery('.wc-backbone-modal-content').css('z-index', '10000');
            },
            success:function(resp){
                if(resp && resp.id != 0) alert('Add thông tin qua ksoft thành công!');
                document.location.href = document.location.href;
            }
        });   
}