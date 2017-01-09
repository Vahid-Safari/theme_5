{if="$mode=='basket'"}
	{if="$sidebar_basket=='0'"}
	<div id='basketbox' class='clearfix'>
		<div id='basket_info' class='clearfix'>
			<span class='fa fa-shopping-cart'></span>
			<span id='basket_items_box'>
				سبد خرید : <span class='item_counter'>
					<span id='basket_items'>{$items}</span> محصول</span> <span class='fa fa-chevron-down'></span></span>
		</div>
		<div id='floatbasket'>
			<div id='floatbasket_body'>
	{/if}
				<div id='basket'>
					<div id='basket_free' {if="count($list)"}style='display:none'{/if}>سبد خالی است</div>
						{if="$list"}
						<ul class='list-group'>
						{loop="list"}
							<li id='post_id_{$value.id}' class="list-group-item clearfix">
								<img class='basket_item_right col-lg-3 col-md-3 col-sm-3 col-xs-3' src='{$value.image}' />
								<div class='basket_item_left col-lg-9 col-md-9 col-sm-9 col-xs-9'>
									<span>{$value.title}</span> <div>تعداد : {$value.count} × {$value.price} {$currency}</div>
								</div>
								<a class='btn btn-danger btn-xs delete-item-box delete_item' data-delete='{$value.id}'><i class='fa fa-remove'></i></a>
							</li>
						{/loop}
						</ul>
						{/if}
					<div id='checkout' class='clearfix {if="!$list"}hidden{/if}' >
						<h4 class='sum_basket_title'>مجموع: <span id='sum_basket'>{$sum_prices}</span> {$currency}</h4>
						<a class='btn btn-custom' id='checkout_link' href='{$basket_link}'><i class='fa fa-shopping-cart'></i> پرداخت</a>
					</div>
				</div>
	{if="$sidebar_basket=='0'"}
			</div>
		</div>
	</div>
	{/if}
{else}
	<li id='post_id_{$id}' class='list-group-item clearfix'>
		<img class='basket_item_right col-lg-3 col-md-3 col-sm-3 col-xs-3' src='{$image}' />
		<div class='basket_item_left col-lg-9 col-md-9 col-sm-9 col-xs-9'>
			<span>{$title}</span> <div>تعداد : {$count} × {$price} {$currency}</div>
		</div>
		<a class='btn btn-danger btn-xs delete-item-box delete_item' data-delete='{$id}'><i class='fa fa-remove'></i></a>
	</li>
{/if}


