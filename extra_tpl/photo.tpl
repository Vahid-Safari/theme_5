<div class='content content_photo'>
	<div class='content_header grad clearfix'>
		<h2>{$title}</h2>
		{if="$subtitle"}
		<h3>{$subtitle}</h3>
		{/if}
	</div>
	<div class='content_body'>
		<a class='photo_link' href='{$link}' title='{$title}'><img src='{$image}' alt='{$title}' /></a>
		{if="$text"}
		<br class='clear' />
		{$text}
		{/if}
	</div>
{if="$options"}
	<div class='content_options'>
		{$options}
	</div>
{/if}

{if="$list"}
<div class='content_body'>
<ul class='thumbs'>
{loop="list"}
	<li id ='image_{$value.id}' class='thumb {$value.class}'>
	<a href='{$value.link}' rel='thumb_box' title='{$value.subtitle}' class='trans' >
		<img alt='{$value.title}' src='{$value.image}' />
		<h3 class='caption '>{$value.title}</h3>
	</a>
	{if="$value.new"}<div class='new_cutoff'></div>{/if}
</li>
{/loop}
</ul>
<br class='clear' />
</div>
{/if}
</div>