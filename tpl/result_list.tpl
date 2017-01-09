{if="$list"}
<ul class='result_list'>
{loop="list"}
<li>
	<h3><a href='{$value.link}'>{$value.title}</a><span>{$value.module}</span></h3>
	<p>{$value.text}</p>
</li>
{/loop}
</ul>
{if="$paging"}{$paging}{/if}
{else}
	{$not_found}
{/if}