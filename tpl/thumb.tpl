{if="$page_text"}<div class='page_text'>{$page_text}</div>{/if}
{if="$list"}
	<ul class='gallery'>
		{loop="list"}
			<li id='image_{$value.id}' class='{$value.class} col-lg-4 col-md-4 col-sm-6 col-xs-6 col-ms-12'>
				<div class='item_body' title='{$value.subtitle}'>
					<a href='{$value.link}' title='{$value.subtitle}'>
						<img alt='{$value.title}' src='{$value.image}' />
						<h3>{$value.title}</h3>
					</a>
					<span>{$value.subtitle}</span>
					{if="$value.new"}<div class='new_cutoff'></div>{/if}
				</div>
			</li>
		{/loop}
	</ul>
	<br class='clear' />
	{if="$paging"}{$paging}{/if}
	{else}
		{$not_found}
{/if}
