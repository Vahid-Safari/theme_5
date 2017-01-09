<div class='content product clearfix' id='product_{$id}'>
	<div class='content_body product_body clearfix'>
		{if="$normal_image || $video || $attachment_file"}
			<div class='product_right_side col-md-6 col-sm-6 col-xs-12'>
				<a class='product_image' href='{$large_image}' target='_blank'><img  src='{$normal_image}' alt='{$title}' rel='product_thumb'/></a>
				{if="count($thumbs)>1"}
					<div class='product_thumbs clearfix'>
					{loop="thumbs"}
						<a class='{$value.class} col-md-4 col-sm-4 col-xs-6 col-ms-12 product_thumb' title='{$value.title}' rel='product_thumb' target='_blank' href='{$value.image}'><img alt='' src='{$value.thumb}' /></a>
					{/loop}
					</div>
				{/if}
				{if="$attachment_file"}
					<div class='product_attachment'><a class='btn btn-block' href='{$attachment_file}' target='_blank'>{$download_file}</a></div>
				{/if}
			</div>
		{/if}
		<div class='product_left_side clearfix {if="$normal_image"}col-md-6 col-sm-6 col-xs-12{else}col-md-12 col-sm-12 col-xs-12{/if}'>
			<h2 class='product_title' >{$title}</h2>
			<div class='product_tools clearfix'>
			{if="$allow_rate"}
			<div class='product_rate '>
					امتیاز <span class='ratingValue'>{$rate}</span> از <span class='bestRating'>5</span> توسط <span class='reviewCount'>{$likes}</span> کاربر
					<div class='rate' >
						<input data-id="{$id}" id="rate_{$id}" value="{$rate}" type="hidden" class="rating"  min="1" max="5" step="1" data-size="xs" >
					</div>
			</div>
			{/if}
			{if="$enable_wishlist"} <div class='product_wishlist' >
				<a data-id='{$id}' class='btn-wishlist btn-wishlist-{$id}' ><i class='fa {if="$wished"}fa-heart{else}fa-heart-o{/if}'></i></a>
			</div>
			{/if}
			</div>
			<h3 class='product_subtitle'>{$subtitle}</h3>
			{if="$price"}
				<h2 class='product_price product-single__prices'>
					{if="$old_price"}
						<span id='ComparePrice' class='product-single__sale-price old_price'>{$old_price}</span> 
					{/if}
					<span class='sell-price'>
						<span id='ProductPrice' class='sell-price-number product-single__price' data-price="{$price_original}">{$price}</span>{if="!$variants"}<span>{$currency}</span>{/if}
					</span>
					  <!--{$label_price}{if="$unit"} ({$unit}){/if}-->
				</h2>
			{/if}
			{if="$price_status"}
				{if="$check_basket"}	
				<div class='product_order_info'>		
					<form class='product_basket'>
						<input type='hidden' name='id' value='{$id}' >
						<input type='hidden' name='data' value='add_product' >
							<div class='form-quantity'>
								{if="$variants"}{$variants}{/if}
			            <div class='product-quantity quantity-selector form-group'>
			              <label for='quantity'>تعداد</label>
			              <input type='number' id='quantity' name='quantity' value='1' min='1' class='form-control'>
			              <br/>
			              <a id='add_{$id}' id='add_to_basket' class='btn btn-product btn-custom btn-lg add_to_basket' data-id='{$id}'><i class='fa fa-shopping-cart'></i> {$add_to_basket}</a>	
			            </div>
							</div>
					</form>	
					</div>				
				{/if}	
			{/if}	

		</div>
	<div class='product_down_side clearfix'>	
				{if="$video"}
					<div class='product_video'>{$video}</div>
				{/if}
		{if="$description || $attributes"}
		<ul id='product_tabs' class="nav nav-tabs" role="tablist">
		  {if="$description"}<li class="active"><a href="#description" role="tab" data-toggle="tab">توضیحات</a></li>{/if}
		  {if="$attributes"}<li {if="!$description"}class="active"{/if}><a href="#detail" role="tab" data-toggle="tab">جزئیات</a></li>{/if}
		</ul>
		<div id='product_tab_content' class="tab-content">
		  {if="$description"}<div class="tab-pane active" id="description">{$description}</div>{/if}
		  {if="$attributes"}<div class="tab-pane {if="!$description"}active{/if}" id="detail">{$attributes}</div>{/if}
		</div>
		{/if}
		<div class='product_options'>{$options}</div>
	{if="$accessories"}
		<div class='product_accessories'>{$accessories}</div>
	{/if}	
	</div>
	</div>

</div>