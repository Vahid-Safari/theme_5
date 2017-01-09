{if="$slider_mode=='slider'"}
	{if="$count ==1"}
		<div class="">
			<div id='slider' class='slider'>
				{loop="list"}
					<a {if="$value.link"}href='{$value.link}'{/if} {if="$value.blank"}target='_blank'{/if} class='fill'>
						<img src='{$value.image}' alt='{$value.title}' />
					</a>
				{/loop}
			</div>
		</div>
	{else}
		<div class="slider-wrapper theme-light">
			<div id='slider' class='nivoSlider'>
				{loop="list"}
					<a {if="$value.link"}href='{$value.link}'{/if} {if="$value.blank"}target='_blank'{/if} class='fill'>
						<img src='{$value.image}' alt='{$value.title}' />
					</a>
				{/loop}
			</div>
		</div>
	{/if}
{else}
	{loop="list"}
		<div class='item clearfix'>
			<a class='product-slider-image col-lg-4 col-md-4 col-sm-4 col-xs-4 col-ms-12' href='{$value.product_link}' title='{$value.title}'>
			   <img alt=''  src='{$value.image}'/>
			</a>
			<div class='product-slider-caption  col-lg-8 col-md-8 col-sm-8 col-xs-8 col-ms-12'>
				<a href='{$value.product_link}' class='slidehead'><h2>{$value.title}</h2></a>
				<h3 class='slide-subtitle'>{$value.subtitle}</h3>
				<!--<div class='slide-price'>{$value.price}</div>-->
				<div class='product-price' itemprop="price">
					{if="$value.price"}
						{if="$value.old_price"}
							<span class='old_price'>{$value.old_price}</span> 
						{/if}
						<span itemprop="price">{$value.price} {$value.currency}</span>
					{/if}				
				</div>
				<!--<div class='slide-btn'>{$value.product_button}</div> -->
				{if="$value.price_status"}
					<a id='add_{$value.id}' class='btn btn-product add_to_basket btn-custom' href='#add'><i class='fa fa-shopping-cart '></i> <span>{$value.add_to_basket}</span></a>
				{else}
					<a class='btn btn-product btn-custom' href='{$value.link}'><span>{if="$value.price"}{$value.status_title}{else}{$value.more_info}{/if}</span></a>
				{/if}				
			</div>
		</div>	
	{/loop}
{/if}
