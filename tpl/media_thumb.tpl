{if="$is_ajax"}
{loop="list"}
	<div id='media_{$value.id}' class='media_thumb media_{$value.id} {if="!$value.tile_mode"}col-lg-4 col-md-4 col-sm-6 col-xs-6 col-ms-12{/if}'>
		<div class='thumb_body'>
	{if="$value.new"}<div class='new_cutoff'></div>{/if}
	{if="$value.show_media_type && $value.icon"}<div class='media_icon'><span class='fa glyph{$value.icon}'></span></div>{/if}
	<a href='{$value.link}' rel='thumb_box' title='{$value.subtitle}' class='trans media_image' >
		<img alt='{$value.title}' src='{$value.image}'{if="$value.tile_mode"} width='{$value.width}' height='{$value.height}' style='width:{$value.width}px;height:{$value.height}px;'{/if} />
	</a>
	<a href='{$value.link}'><h3 class='caption'>{$value.title}</h3></a>
	{if="$value.show_hit || $value.show_like || $value.show_comments"}
	<div class='media_info clearfix'>
		{if="$value.show_hit"}<a class='media_hit' href='{$value.link}'><span class='fa fa-eye-open'></span><strong>{$value.hit}</strong></a>{/if}
		{if="$value.show_like"}<a class='media_like' href='{$value.link}' data-like='{$value.id}'><span class='fa fa-heart'></span><strong>{$value.like}</strong></a>{/if}
		{if="$value.show_comments"}<a class='media_comment' href='{$value.link}#box_comments'><span class='fa fa-comment'></span><strong>{$value.comments}</strong></a>{/if}
	</div>
	{/if}
	</div>
</div>
{/loop}
{else}

{if="$page_text"}<div class='page_text'>{$page_text}</div>{/if}
{if="$list"}
<div class='media_thumbs clearfix'>
{loop="list"}
	<div id='media_{$value.id}' class='media_thumb media_{$value.id} {if="!$value.tile_mode"}col-lg-4 col-md-4 col-sm-6 col-xs-6 col-ms-12{/if}'>
		<div class='thumb_body'>
	{if="$value.new"}<div class='new_cutoff'></div>{/if}
	{if="$value.show_media_type && $value.icon"}<div class='media_icon'><span class='fa glyph{$value.icon}'></span></div>{/if}
	<a href='{$value.link}' rel='thumb_box' title='{$value.subtitle}' class='trans media_image' >
		<img alt='{$value.title}' src='{$value.image}'{if="$value.tile_mode"} width='{$value.width}' height='{$value.height}' style='width:{$value.width}px;height:{$value.height}px;'{/if} />
	</a>
	<a href='{$value.link}'><h3 class='caption'>{$value.title}</h3></a>
	{if="$value.show_hit || $value.show_like || $value.show_comments"}
	<div class='media_info clearfix'>
		{if="$value.show_hit"}<a class='media_hit' href='{$value.link}'><span class='fa fa-eye-open'></span><strong>{$value.hit}</strong></a>{/if}
		{if="$value.show_like"}<a class='media_like' href='{$value.link}' data-like='{$value.id}'><span class='fa fa-heart'></span><strong>{$value.like}</strong></a>{/if}
		{if="$value.show_comments"}<a class='media_comment' href='{$value.link}#box_comments'><span class='fa fa-comment'></span><strong>{$value.comments}</strong></a>{/if}
	</div>
	{/if}
	</div>
</div>
{/loop}
</div>
<br class='clearfix' />
<!--<a class='btn btn-default btn-block btn-lg btn-more'><span class='fa fa-chevron-down'></span> بیشتر <span class='fa fa-chevron-down'></span></a>-->
{if="$paging"}{$paging}{/if}
{else}
	{$not_found}
{/if}
{/if}
