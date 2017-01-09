{if="$page_text"}<div class='page_text'>{$page_text}</div>{/if}
{if="$list"}
<ul class='pages page_thumb'>
		{loop="list"}
			<li id ='page_{$value.id}' class='page_thumb  {$value.class} col-lg-4 col-md-4 col-sm-6 col-xs-6 col-ms-12'>
				<div class='thumb_body'>
					<a href='{$value.link}' class='page_thumb_image'><img  alt='{$value.title}' src='{$value.image}' /></a>
					<a title='{$value.title}' href='{$value.link}' class='page_thumb_link'><h3>{$value.title}</h3></a>
				</div>
			</li>
		{/loop}
</ul>
{else}
	{$not_found}
{/if}