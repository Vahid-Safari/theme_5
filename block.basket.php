<?php


$block_module_code = 2102;
function block_basket($side='side_right')
{
	global $_, $_db, $lang;
	
	if(!isset($_['session_id']))
		$_['session_id']= 'null';
	//return true;
	if( $_['task']=='basket' or $_['task']=='checkout')
		return true;
	load_function('shop');
	module_init('shop');
/*	if(isset($_['product_for_sale']) and !$_['product_for_sale'])
		return true;*/

	$items = 0;
	$block ="";
	$sum_prices = 0;		
	$basket = url('cart');

	$list = array();
	if(!isset($_['basket_position']))
		$_['basket_position']=0;
	
	if ($_['session_id'] != 'null')
	{
		$basket_id = query_var("basket_id","SELECT basket_id FROM kcms_basket WHERE basket_session = '$_[session_id]' and basket_user_id=$_[user_id] ");
		$rows = query_array("SELECT post_id,item_count, item_price, post_title, post_image FROM $_[dbprefix]basket_item  INNER JOIN $_[dbprefix]post ON item_product_id = post_id WHERE item_basket_id=$basket_id ");
		foreach ($rows as $row) 
		{
			$items++;
			$product_price = ($row['item_price'] * $row['item_count'] );
			$sum_prices=($sum_prices +$product_price);
			$post_image= ($row['post_image']!= "" and file_exists($_['static_dir']."files/thumb/".$row['post_image']))? $_['static_url']."files/thumb/".$row['post_image']:$_['image_url']."null.png";
			$list[] = array(
				"id" => $row['post_id'],
				"image" => $post_image,
				"title" => stripinput($row['post_title']),
				"count" => $row['item_count'],
				"price" => number_format($product_price)
			);
		}
	}

	if($_['basket_position']==0)
	{
		$block = get_theme_box("basket", array(
			"mode" => 'basket',
			"list" => $list,
			"currency" => $_['currency'],
			"items" => $items,
			"sum_prices" => number_format($sum_prices),
			"basket_link" => url('cart'),
			"sidebar_basket" =>"1"
		));
		add_theme_box($side, "block", "basket_box", array(
					"title"=> lang("your_basket"),
					"text"=> "$block"
				));
	}
	else
	{
		$_['float_basket'] = get_theme_box("basket", array(
			"mode" => 'basket',
			"list" => $list,
			"currency" => $_['currency'],
			"items" => $items,
			"sum_prices" => number_format($sum_prices),
			"basket_link" => url('cart'),
			"sidebar_basket" =>"0"
		));
		
		$_['jquery_code'] .= <<<printext

$(document).on("click",'#basketbox',function (event) {
	if(!$('#basketbox').hasClass('active')){
		$('#floatbasket').stop(true,true).fadeToggle('Slow');
		$(this).addClass('active');
	}else	{
		$('#floatbasket').stop(true,true).fadeToggle('Slow');
		$(this).removeClass('active');
	}
	event.stopPropagation();

}).on("click",'#floatbasket',function () {
	event.stopPropagation();

}).on("click",'html',function (event) {
	if($('#basketbox').hasClass('active')){
		$('#floatbasket').stop(true,true).fadeToggle('Slow');
		$('#basketbox').removeClass('active');
	}
});

printext;


	}

	$_['jquery_code'] .= <<<printext

var items = $items;
$(document).on("click",'.add_to_basket',function () {
	if($(this).attr('disabled')=='disabled' )
	return false;
	var basket_data = $(this).closest(".product_basket").serialize();

	var item = $(this).data('id');
	//response = '';
	$("#add_"+item).attr('disabled','disabled');
	loading(1);
	$.ajax({
		type: "POST",
		url: "$basket",
		data: basket_data,//{ data: "add_product", id: item},//data: { data: "add_product", id: item},
		timeout: (60 * 1000),
		success: function(responses){
			eval (responses);
			if( $("#post_id_" + item).length > 0){
				$("#post_id_" + item).animate({ opacity: 0 }, 500, function() {
					$("#post_id_" + item).before(response).remove();
				});
				$("#post_id_" + item).animate({ opacity: 0 }, 500);
				$("#post_id_" + item).animate({ opacity: 1 }, 500);

			}
			else
			{
				$("#basket li:first").before(response);
				$("#basket li:first").hide();
				$("#basket li:first").show("slow");
			}
			//if(response)
			//	flyToElement($("#add_"+item).closest(".product").find('.product_image'),  $("#basket").find("#post_id_"+item+' img'));//
			loading(0);
			//delete_item();
			$("#add_"+item).removeAttr('disabled');
		},
		error: function( objAJAXRequest, strError  ){
			alert(strError);
		}
	});
	return false;
});

$('body, #floatbasket').on('click', 'a.delete_item', function() {
	var item = $(this).data('delete');
	loading(1);
	$.ajax({
		type: "POST",
		url: "$basket",
		data: { data: "delete_product", id: item},
		success: function(responses) {
			eval (responses);
			$("#post_id_" + item).slideUp("slow",  function() { $(this).remove();});
			loading(0);
		}
	});
});


function flyToElement(flyer, flyingTo) {
	var func = $(this);
	var divider = 4;
	var flyerClone = $(flyer).clone();
	//console.log(flyerClone);
	$(flyerClone).css({position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000});
	$('body').append($(flyerClone));
	var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width()/divider)/2;
	var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height()/divider)/2;

	$(flyerClone).animate({
		opacity: 0.4,
		left: gotoX,
		top: gotoY,
		width: $(flyer).width()/divider,
		height: $(flyer).height()/divider
	}, 700,
	function () {
		$(flyingTo).fadeOut('fast', function () {
			$(flyingTo).fadeIn('fast', function () {
				$(flyerClone).fadeOut('fast', function () {
					$(flyerClone).remove();
				});
			});
		});
	});
}

printext;

}

?>