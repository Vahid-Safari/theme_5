<div class='content article' itemscope itemtype="http://schema.org/Article">
	<div class='content_body article_body clearfix'>
		<a class='article_image' href='{$original_image}' itemscope itemtype="http://schema.org/ImageObject">
			<img itemprop="contentURL" alt='{$title}' src='{$image}' />
		</a>
		<div class='content_header article_header clearfix'>
			<h2 class='article_title' itemprop="name">{$title}</h2>
		</div>
		<time class='content_date'><span class='contents_data'>{$date_day} {$date_month} {$date_year}</span><span class='contents_details'> {$comments} ديدگاه ، توسط {$user.user_nickname}</span></time>		
		<h3 class='article_subtitle' itemprop="description">{$subtitle}</h3>
		<div class='article_text' itemprop="articleBody">{$text}</div>
		
	 <div class='sharing_products col-md-12 col-sm-12 col-xs-12 clearfix'>		
			<h3>این را به اشتراک بگذاری : </h3>
			<div class='sharing_products_social_icons'>
		       <a class="icon-social icon-telegram" href="https://telegram.me/share/url?url={$link}" rel="nofollow" target="_blank"><i class="fa fa-paper-plane"></i></a>   			
		 		 	 <a class="icon-social icon-twitter" href="http://twitter.com/home?status={$title} {$link}" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
		 			 <a class="icon-social icon-google_plus" href="https://plusone.google.com/_/+1/confirm?hl=en&url={$link}&title={$title}" rel="nofollow" target="_blank"><i class="fa fa-google-plus"></i></a> 
	 			   <a class="icon-print" href="" ><i class="fa fa fa-print"></i></a>
			</div>
	 </div>	
	<!--next-prev-->
	</div>
	<meta itemprop="datePublished" content="{$seo_date}"/>
</div>