{if="$page_text"}<div class='page_text'>{$page_text}</div>{/if}
{if="$list"}
	<ul class='products home_products {$ulclass} owl-theme clearfix'>
		{loop="list"}
			<li id='product_{$value.id}' class='product product_thumb {$value.class}'>
				<div class='thumb_body item_body'>
					<div class='home_product_img'>
						<a href='{$value.link}' class='thumb_image_link'>
								<img class='product_image product_thumb_image' alt='{$value.title}' src='{$value.image}' />
						</a>
						<a class='product-quick-view' href='{$value.link}?mini=1'><span class='quick_view'>نمايش سريع</span></a>
						<a title='{$value.title}' href='{$value.link}' ><h3>{$value.title}</h3></a>
				  </div>

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
							<a id='add_{$value.id}' class='btn btn-product add_to_basket btn-custom'  data-id='{$value.id}'><i class='fa fa-shopping-cart '></i> <span>اضافه به سبد</span></a>
						{else}
							<a class='btn btn-product btn-custom' href='{$value.link}'><i class='fa fa-list '></i> <span>{$value.more_info}</span></a>
						{/if}
						</form>
					 {if="$value.enable_wishlist"} <div class='product_wishlist' >
						<a data-id='{$value.id}' class='btn-wishlist btn-wishlist-{$value.id}' ><i class='fa {if="$value.wished"}fa-heart{else}fa-heart-o{/if}'></i></a>
					  </div>
		       {/if}

					<div class='thumb_subtitle'>{$value.subtitle}</div>
				    {if="$value.badges"}
						<div class='product_thumb_badges'>
						{loop="value.badges"}
							<div class='thumb_badge badge_{$value}'> </div>
						{/loop}
						</div>
						{/if}
				</div>
			</li>
		{/loop}
	</ul>
	{if="$paging"}{$paging}{/if}
{else}
	{$not_found}
{/if}