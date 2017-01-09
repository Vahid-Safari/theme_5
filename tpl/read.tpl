<div class='content article' itemscope itemtype="http://schema.org/Article">
	<div class='content_header article_header clearfix'>
		<h2 class='article_title' itemprop="name">{$title}</h2>
	</div>
	<div class='content_body article_body clearfix'>
		<a class='article_image' href='{$original_image}' itemscope itemtype="http://schema.org/ImageObject">
			<img itemprop="contentURL" alt='{$title}' src='{$image}' />
		</a>
		<h3 class='article_subtitle' itemprop="description">{$subtitle}</h3>
		<div class='article_text' itemprop="articleBody">{$text}</div>
		{$options}
	</div>
	<meta itemprop="datePublished" content="{$seo_date}"/>
</div>