{if="$page_text"}<div class='page_text'>{$page_text}</div>{/if}
{if="$list"}
<ul class='contents_list '>
{loop="list"}
<li id='content_{$value.id}' class='{if="isset($value.footer)"}col-lg-4 col-md-4{else}col-lg-6 col-md-6{/if} col-sm-6 col-xs-12 col-article'>
		<div class='content_thumb ' >
			<a href='{$value.link}' title='{$value.title}'>
			<picture>
			  <source srcset="{if="$value.post_image"}{$value.image_url}normal/{$value.post_image}{else}http://shopfa.com/pix/640x480.png{/if}" media="(min-width: 400px)">
			  <source srcset="{if="$value.post_image"}{$value.image_url}thumb/{$value.post_image}{else}http://shopfa.com/pix/400x300.png{/if}">
			  <img src="{if="$value.post_image"}{$value.image_url}thumb/{$value.post_image}{else}http://shopfa.com/pix/400x300.png{/if}" alt='{$value.title}'>
			</picture>
			</a>
			<ul class='content_info'>
				<li>{$value.pages}</li>
				<li>تاریخ: <time class='content_date'> {$value.date_day} {$value.date_month} {$value.date_year}</time></li>
				<li>{if="$value.comments"}{$value.comments}{else}بدون{/if} دیدگاه</li>
			</ul>
			<div class='content_excerpt'>
				<a href='{$value.link}' title='{$value.title}'><h3>{$value.title}</h3></a>
				<p>{$value.text}</p>
			</div>
		</div>
</li>
{/loop}
</ul>
{if="$paging"}{$paging}{/if}
{else}
	{$not_found}
{/if}
