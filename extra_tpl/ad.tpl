
<div class='ad content' id='ad_{$id}'>
	<!--<h2>{$category}</h2>-->
	<h2 class='ad_title' >{$title}</h2>
	<div class='ad_body'>
	<div class='ad_left_side'>
	{if="$normal_image"}
		<a class='ad_image' href='{$large_image}' target='_blank'><img  src='{$normal_image}' alt='{$title}' /></a>
	{/if}
	{if="$thumbs"}
		<div class='ad_thumbs'>
		{loop="thumbs"}
			<a class='{$value.class}' title='{$value.title}' target='_blank' href='{$value.image}'><img alt='' src='{$value.thumb}' /></a>
		{/loop}
		</div>
	{/if}
	{if="$map"}
		<div class='ad_map'>{$map}</div>
	{/if}
	{if="$attributes"}
		<div class='ad_attributes'>{$attributes}</div>
	{/if}	
	</div>
	<div class='ad_right_side '>
		<h3 class='ad_subtitle' >{$subtitle}</h3>
	{if="$text"}
		<div class='ad_text' >{$text}</div>
	{/if}
	{if="$show_contact_form"}
		<div class='ad_contact'>
			<!--<h3>فرم تماس با این آگهی</h3>-->
			{$contact_form}
		</div>
	{/if}
	</div>
	</div>
</div>