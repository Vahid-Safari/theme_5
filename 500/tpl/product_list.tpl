{if="$page_text"}<div class='page_text'>{$page_text}</div>{/if}
{if="$list"}
	<ul class='products clearfix'>
		{loop="list"}
			<li id='product_{$value.id}' class='product_thumb {if="isset($value.home)"}col-lg-2 col-md-2{else}col-lg-3 col-md-4{/if} col-sm-6 col-xs-6 col-ms-12'>
				<div class='thumb_body'>
					<a href='{$value.link}' class='product_thumb_image'>
						<img class='' alt='{$value.title}' src='{$value.image}' />
					</a>
					<div class='product_details'>
					<a class='product_title' title='{$value.title}' href='{$value.link}' ><h3>{$value.title}</h3></a>
					
					<div class='product_thumb_subtitle'>{$value.subtitle}</div>
					</div>
					<div class='product_rate'>
						{if="$value.allow_rate"}
							<div class='rate'>
								<input data-id="{$value.id}" id="rate_{$value.id}" value="{$value.rate}" type="hidden" class="rating"  min="1" max="5" step="1" data-size="xs" >
							</div>
						{/if}
					</div>
					<!--
					<div class='thumb_subtitle'>{$value.subtitle}</div>
					
				    <div class='product_thumb_price price'>
						{if="$value.price"}
							{if="$value.old_price"}
								<span class='old_price'>{$value.old_price}</span> 
							{/if}
							<span>{$value.price} {$value.currency}</span>
						{/if}
						</div>
						<form class='product_basket'>
						{if="$value.price_status and !$value.variants"}
							<input type='hidden' name='id' value='{$value.id}' >
							<input type='hidden' name='data' value='add_product' >
							<a id='add_{$value.id}' class='btn btn-product add_to_basket btn-custom'  data-id='{$value.id}'><i class='glyphicon glyphicon-shopping-cart '></i> <span>{$value.add_to_basket}</span></a>
						{else}
							<a class='btn btn-product btn-custom' href='{$value.link}'><i class='glyphicon glyphicon-list '></i> <span>{$value.more_info}</span></a>	
						{/if}
						</form>
				    {if="$value.badges"}
						<div class='product_thumb_badges'>
						{loop="value.badges"}
							<div class='thumb_badge badge_{$value}'> </div>
						{/loop}
						</div>
						{/if}
						-->
				</div>
			</li>
		{/loop}
	</ul>
	{if="$paging"}{$paging}{/if}
{else}
	{$not_found}
{/if}