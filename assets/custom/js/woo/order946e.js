jQuery(document).ready(function() {
	if(jQuery('#ksoft_order').length){
        calculate_sale_total_commission();

        jQuery('.calculate_sale input[name=ship_price_view]').keyup(function(event) {
            var ship_price = jQuery(this).val().replace(/,/g,'');
            if(ship_price == '') ship_price = 0;
            jQuery('.calculate_sale input[name=ship_price]').val(ship_price);
            jQuery(this).val(parseInt(ship_price).formatMoney(0));
            calculate_sale_total();
        });

        jQuery('.calculate_sale input[name=ship_price_view]').trigger('keyup');
        calculate_paid();
        calculate_voucher();

	}
});




function calculate_sale_total_commission(){
    jQuery('.calculate_sale input[name=commission_percent]').keyup(function() {
        handleFormat(this);
        var commission_percent = jQuery('.calculate_sale input[name=commission_percent]').val().replace(/,/g,'');
        
        autoCompleteCommistionList(commission_percent);
        commission_price = jQuery('#order_detail_list input[name=commission_price]');
        total_commission_price = 0;
        for (var i = 0; i < commission_price.length; i++) {
            total_commission_price += parseInt(jQuery(commission_price[i]).val());
        };
        jQuery('.calculate_sale input[name=commission_price]').val(total_commission_price);
        jQuery('.calculate_sale input[name=commission_price_view]').val(total_commission_price.formatMoney(0));
    });
    
    jQuery('.calculate_sale input[name=commission_price_view]').keyup(function() {
        handleFormat(this);
        var total_price = 0;
        allprice = jQuery('#order_detail_list tbody tr');
        for (var i = 0; i < allprice.length; i++) {
            total_price += parseInt(jQuery(allprice[i]).find('input[name=total_price]').val()) * parseInt(jQuery(allprice[i]).find('input[name=quantity]').val());
        };
        var commission_price = jQuery('.calculate_sale input[name=commission_price_view]').val().replace(/,/g,'');
        var price_follow_price = Math.round((commission_price/total_price)*100* 100)/100;
        jQuery('.calculate_sale input[name=commission_price]').val(commission_price);
        jQuery('.calculate_sale input[name=commission_percent]').val(price_follow_price);
        autoCompleteCommistionList(price_follow_price);
    });
}





function calculate_sale_total(){
    handleFormat(jQuery('.calculate_sale input[name=commission_price_view]'));
    handleFormat(jQuery('.calculate_sale input[name=commission_percent]'));
    table_list = jQuery('#order_detail_list tbody tr');
    sum_price = 0;
    total_price = 0;
    ship_price = jQuery('.calculate_sale input[name=ship_price]').val();
    for (var i = 0; i < table_list.length; i++) {
        item = table_list[i];
        sum_price += parseInt(jQuery(item).find('input[name=total_price]').val()) * parseInt(jQuery(item).find('input[name=quantity]').val());
        total_price += parseInt(jQuery(item).find('span.price').attr('data-price')) * parseInt(jQuery(item).find('input[name=quantity]').val());
    };
    sum_price += parseInt(ship_price);
    total_price += parseInt(ship_price);
    jQuery('.calculate_sale input[name=sum_price]').val(sum_price);
    jQuery('.calculate_sale input[name=sum_price_view]').val(sum_price.formatMoney(0));
    jQuery('.calculate_sale input[name=total_price]').val(total_price);
    jQuery('.calculate_sale input[name=total_price_view]').val(total_price.formatMoney(0));
    var paid = jQuery('#order_detail_list tr input[name=paid]');
    var total_paid = 0;
    for(var i=0;i<paid.length;i++){
        total_paid+= parseInt(jQuery(paid[i]).val());
    }
    
    total_paid += parseInt(ship_price);
    jQuery('#ksoft_order input[name=total_paid_view]').val(total_paid.formatMoney(0));
    jQuery('#ksoft_order input[name=total_paid]').val(total_paid);
    var remain_paid = total_price-total_paid;
    if(remain_paid<0) {
        jQuery('#ksoft_order input[name=remain_paid]').val('0').attr('data', remain_paid);
        jQuery('#ksoft_order input[name=remain_paid_view]').val(0);
    }else {
        jQuery('#ksoft_order input[name=remain_paid]').val(remain_paid).attr('data', remain_paid);
        jQuery('#ksoft_order input[name=remain_paid_view]').val(remain_paid.formatMoney(0));
    }
    calculate_paid_return();
}


function calculate_paid(){

    jQuery('.calculate_sale .postbox.order_o input[name=paid_cash_view]').on('keyup', function(){
        handleFormat(this);
        var paid_cash = jQuery(this).val().replace(/,/g,'');
        jQuery('.calculate_sale .postbox.order_o input[name=paid_cash]').val(paid_cash);
        calculate_paid_return();
    });

    jQuery('.calculate_sale .postbox.order_o input[name=paid_cod_view]').on('keyup', function(){
        handleFormat(this);
        var paid_cod = jQuery(this).val().replace(/,/g,'');
        jQuery('.calculate_sale .postbox.order_o input[name=paid_cod]').val(paid_cod);
        calculate_paid_return();
    });

    jQuery('.calculate_sale .postbox.order_o input[name=paid_card_view]').on('keyup', function(){
        handleFormat(this);
        var paid_card = jQuery(this).val().replace(/,/g,'');
        jQuery('.calculate_sale .postbox.order_o input[name=paid_card]').val(paid_card);
        calculate_paid_return();
    });

}

function calculate_voucher(){
    parent_ksoft = jQuery('#ksoft_order .calculate_sale .voucher .voucher_div > div:last-child');
    // var parent_ksoft = jQuery('#ksoft_order .calculate_sale .voucher .voucher_div');
    parent_ksoft.find('select[name=voucher_price]').on('change', function() {
        calculate_paid_return();
    });
    parent_ksoft.find('input[name=voucher_quantity]').on('keyup', function() {
        calculate_paid_return();
    });
}

function calculate_voucher_game(){
    parent = jQuery('.calculate_sale .voucher_game .voucher_game_div > div:last-child');
    parent.find('select[name=voucher_game_price]').on('change', function() {
        calculate_paid_return();
    });
    parent.find('input[name=voucher_game_quantity]').on('keyup', function() {
        calculate_paid_return();
    });
}

function calculate_paid_return(){

    // jQuery('label.error').remove();
    // jQuery('.error').removeClass('error');

    var paid_card_list = jQuery('.calculate_sale input[name=paid_card]');
    var paid_card = 0;
    for (var i = 0; i < paid_card_list.length; i++) {
        paid_card += parseInt(jQuery(paid_card_list[i]).val());
    };

    // var paid_card = jQuery('.calculate_sale input[name=paid_card]').val();
    var paid_cash_list = jQuery('.calculate_sale input[name=paid_cash]');
    var paid_cash = 0;
    for (var i = 0; i < paid_cash_list.length; i++) {
        paid_cash += parseInt(jQuery(paid_cash_list[i]).val());
    };

    var paid_cod_list = jQuery('.calculate_sale input[name=paid_cod]');
    var paid_cod = 0;
    for (var i = 0; i < paid_cod_list.length; i++) {
        paid_cod += parseInt(jQuery(paid_cod_list[i]).val());
    };

    var voucher_price = jQuery('.calculate_sale select[name=voucher_price]');
    var total_voucher_price = 0;
    for(var i=0;i<voucher_price.length;i++){
        total_voucher_price+= parseInt(jQuery(voucher_price[i]).val())*jQuery(voucher_price[i]).parent().find('input').val();
    }
    var voucher_game_price = jQuery('.calculate_sale select[name=voucher_game_price]');
    var total_voucher_game_price = 0;
    for(var i=0;i<voucher_game_price.length;i++){
        total_voucher_game_price+= parseInt(jQuery(voucher_game_price[i]).val())*jQuery(voucher_game_price[i]).parent().find('input').val();
    }

    var paid_get = parseInt(paid_card)+parseInt(paid_cash) + parseInt(paid_cod);

    var paid_return = total_voucher_price + total_voucher_game_price + paid_get - jQuery('.calculate_sale input[name=total_paid]').val();

    if(jQuery('.calculate_sale input[name="paid_cash[]"]').length){
        var paid_card_list = jQuery('.calculate_sale input[name="paid_card[]"]');
        paid_card = 0;
        for (var i = 0; i < paid_card_list.length; i++) {
            paid_card += parseInt(jQuery(paid_card_list[i]).val());
        };
        var paid_cash_list = jQuery('.calculate_sale input[name="paid_cash[]"]');
        paid_cash = 0;
        for (var i = 0; i < paid_cash_list.length; i++) {
            paid_cash += parseInt(jQuery(paid_cash_list[i]).val());
        };
        var paid_code_list = jQuery('.calculate_sale input[name="paid_code[]"]');
        paid_code = 0;
        for (var i = 0; i < paid_code_list.length; i++) {
            paid_code += parseInt(jQuery(paid_code_list[i]).val());
        };

        paid_get = parseInt(paid_card)+parseInt(paid_cash)+parseInt(paid_cod);
        paid_return = total_voucher_price+total_voucher_game_price+paid_get - jQuery('.calculate_sale input[name=total_paid]').val();
    }

    jQuery('.calculate_sale input[name=paid_get]').val(paid_get + total_voucher_price + total_voucher_game_price);
    jQuery('.calculate_sale input[name=paid_get_view]').val(parseInt(paid_get + total_voucher_price + total_voucher_game_price).formatMoney(0));

    var remain_paid = parseInt(jQuery('#ksoft_order input[name=remain_paid]').attr('data'));

    if(remain_paid<0) paid_return = paid_return - remain_paid;
    if(paid_return<0){
        jQuery('.calculate_sale input[name=paid_return]').val('Chưa đủ tiền!'); 
        jQuery('.calculate_sale input[name=paid_return_view]').val('Chưa đủ tiền!'); 
    }else{
        if(paid_cash == 0 && paid_card == 0){
            jQuery('.calculate_sale input[name=paid_return]').val(0);
            jQuery('.calculate_sale input[name=paid_return_view]').val(0);
        }else{
            jQuery('.calculate_sale input[name=paid_return]').val(paid_return);
            jQuery('.calculate_sale input[name=paid_return_view]').val(paid_return.formatMoney(0));
        }
    } 
}

var handleFormat = function (element){
    temp = jQuery(element).val().replace(/,/g,'');
    jQuery(element).val(parseInt(temp).formatMoney(0));
}

function save_order_add(){
    var payment_customer = jQuery('#payment_customer input[name="paid_return"]').val();
    if(payment_customer == 0){
        var quantity = '';
        var key = '';
        var order_type = '';
        var unit_id = '';
        var id_textbox = jQuery('form#ksoft_order .quantity');
        for(var i=0; i<id_textbox.length; i++){
            if(i!=id_textbox.length-1) quantity += jQuery(id_textbox[i]).val()+',';
            else quantity += jQuery(id_textbox[i]).val();

            if(i!=id_textbox.length-1) key += jQuery(id_textbox[i]).attr('data')+',';
            else key += jQuery(id_textbox[i]).attr('data');

            if(i!=id_textbox.length-1) order_type += jQuery(id_textbox[i]).attr('data-type')+',';
            else order_type += jQuery(id_textbox[i]).attr('data-type');

            if(i!=id_textbox.length-1) unit_id += '4,';
            else unit_id += '4';
        }

        var paid = '';
        var id_textbox = jQuery('form#ksoft_order input[name=paid].paid');
        for(var i=0; i<id_textbox.length; i++){
            if(i!=id_textbox.length-1) paid += jQuery(id_textbox[i]).val()+',';
            else paid += jQuery(id_textbox[i]).val();
        }

        var unpaid = '';
        var id_textbox = jQuery('form#ksoft_order input[name=unpaid].unpaid');
        for(var i=0; i<id_textbox.length; i++){
            if(i!=id_textbox.length-1) unpaid += jQuery(id_textbox[i]).val()+',';
            else unpaid += jQuery(id_textbox[i]).val();
        }
       
        var price = '';
        var id_textbox = jQuery('form#ksoft_order .price');
        for(var i=0; i<id_textbox.length; i++){
            if(i!=id_textbox.length-1) price += jQuery(id_textbox[i]).attr('data-price')+',';
            else price += jQuery(id_textbox[i]).attr('data-price');
        }

        var commission_price = [];
        var id_textbox = jQuery('form input[name=commission_price].commission_price');
        for(var i=0; i<id_textbox.length; i++){
            commission_price[i] = jQuery(id_textbox[i]).val();
        }

        var commission_percent = [];
        var id_textbox = jQuery('form#ksoft_order .commission_percent');
        for(var i=0; i<id_textbox.length; i++){
            commission_percent[i] = jQuery(id_textbox[i]).val();
        }

        var commission = '';
        for(var i=0; i<commission_price.length; i++){
            if(i!=commission_price.length-1) commission += commission_price[i]+'|'+commission_percent[i]+',';
            else commission += commission_price[i]+'|'+commission_percent[i];
        }

        var voucher_price = '';
        var id_textbox = jQuery('form#ksoft_order .voucher_price');
        for(var i=0; i<id_textbox.length; i++){
            if(i!=id_textbox.length-1) voucher_price += jQuery(id_textbox[i]).val()+',';
            else voucher_price += jQuery(id_textbox[i]).val();
        }

        var voucher_quantity = '';
        var id_textbox = jQuery('form#ksoft_order .voucher_quantity');
        for(var i=0; i<id_textbox.length; i++){
            if(i!=id_textbox.length-1) voucher_quantity += jQuery(id_textbox[i]).val()+',';
            else voucher_quantity += jQuery(id_textbox[i]).val();
        }

        var voucher_game_price = '';
        var id_textbox = jQuery('form#ksoft_order .voucher_game_price');
        for(var i=0; i<id_textbox.length; i++){
            if(i!=id_textbox.length-1) voucher_game_price += jQuery(id_textbox[i]).val()+',';
            else voucher_game_price += jQuery(id_textbox[i]).val();
        }

        var voucher_game_quantity = '';
        var id_textbox = jQuery('form#ksoft_order .voucher_game_quantity');
        for(var i=0; i<id_textbox.length; i++){
            if(i!=id_textbox.length-1) voucher_game_quantity += jQuery(id_textbox[i]).val()+',';
            else voucher_game_quantity += jQuery(id_textbox[i]).val();
        }

        jQuery('#key').val(key);
        // jQuery('#order_type').val(order_type);
        jQuery('#quantity').val(quantity);
        jQuery('#unit_id').val(unit_id);
        jQuery('#product_paid').val(paid);
        jQuery('#product_unpaid').val(unpaid);
        jQuery('#product_price').val(price);
        jQuery('#commission').val(commission);
        jQuery('#order_voucher_price').val(voucher_price);
        jQuery('#order_voucher_quantity').val(voucher_quantity);
        jQuery('#order_voucher_game_price').val(voucher_game_price);
        jQuery('#order_voucher_game_quantity').val(voucher_game_quantity);


        
        jQuery.ajax({
           type:'POST',
           url:jQuery('#hidden_url').val(),
           data:jQuery('#ksoft_order').serialize(),
           beforeSend: function(xhr) {
                jQuery('.wc-backbone-modal-content').css('z-index', '10000');
            },
            success:function(resp){
                if(resp && resp.id != 0) alert('Add thông tin qua ksoft thành công!');
                document.location.href = document.location.href;
            }
        });   
    }else{
        alert('Chưa đủ tiền!');
    }
}