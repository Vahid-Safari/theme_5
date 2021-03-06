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
	<span class='contents_list_img'>
		<a href='{$value.link}' class='content_image col-ms-12' itemscope itemtype="http://schema.org/ImageObject">
			<img itemprop="contentURL" alt='{$value.title}' src='{$value.image_url}thumb/{$value.post_image}' />
		</a>
  </span>
	{/if}
		<div class='content_excerpt col-ms-12'>
			<a href='{$value.link}' itemprop="name"><h3>{$value.title}</h3></a>
			<time class='content_date'><span class='contents_data'>{$value.date_day} {$value.date_month} {$value.date_year}</span><span class='contents_details'> {$value.comments} ديدگاه ، توسط {$value.user.user_nickname}</span></time>
			<p itemprop="description">{$value.text}</p>
			<a class='btn btn-custom more_content' href='{$value.link}'>ادامه مطلب</a>
		</div>
	</div>
</li>
{/loop}
</ul>
{if="$paging"}{$paging}{/if}
{else}
	{$not_found}
{/if}
