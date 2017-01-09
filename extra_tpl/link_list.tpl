{if="$page_text"}<div class='page_text'>{$page_text}</div>{/if}
{if="$list"}
<ul class='links'>
{loop="list"}
	<li id='link_{$value.id}' class='link'>
		<a href='{$value.link}' {if="$value.description"}title='{$value.description}'{/if} target='_blank'>{$value.title} <span class='link_click'>{$value.click} کلیک</span></a> 
	</li>
{/loop}
</ul>
{else}
	{$not_found}
{/if}