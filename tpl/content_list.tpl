{if="$page_text"}<div class='page_text'>{$page_text}</div>{/if}
{if="$list"}
<ul class='contents_list'>
{loop="list"}
<li id='content_{$value.id}' class='content_list' itemscope itemtype="http://schema.org/Article">
	<meta itemprop="volumeNumber" content="{$value.id}" />
	<meta itemprop="interactionCount" content="UserComments:{$value.comments}"/>
	<meta itemprop="datePublished" content="{$value.seo_date}"/>
	<div class='content_content clearfix'>
	{if="$value.post_image"}
		<a href='{$value.link}' class='content_image col-ms-12' itemscope itemtype="http://schema.org/ImageObject">
			<img itemprop="contentURL" alt='{$value.title}' src='{$value.image_url}thumb/{$value.post_image}' />
		</a>
	{/if}
		<div class='content_excerpt col-ms-12'>
			<a href='{$value.link}' itemprop="name"><h3>{$value.title}</h3></a>
			<time class='content_date'><i class='fa fa-calendar'></i> {$value.date}</time>
			<p itemprop="description">{$value.text}</p>
			<a class='btn btn-custom more_content' href='{$value.link}'>{$value.more}</a>
		</div>
	</div>
</li>
{/loop}
</ul>
{if="$paging"}{$paging}{/if}
{else}
	{$not_found}
{/if}
