<!DOCTYPE html>
<html lang="{$lang_code}" class="{$site_classes}"> 
	<head>
		<title>{$page_title}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		{if="$enable_responsive"}<meta name="viewport" content="width=device-width, initial-scale=1">{/if}
		<link type="text/css" rel="stylesheet" href="{$root_url}global/css/bootstrap.{$bootstrap_version}.css?{$version}" />
		{if="$dir=='rtl'"}<link type="text/css" rel="stylesheet" href="{$root_url}global/css/bootstrap.rtl.{$bootstrap_version}.css?{$version}" />{/if}
		<link type="text/css" rel="stylesheet" href="{$style}?{$theme_update}" media="screen,print" id="theme_style" />
		{if="$css"}<style type="text/css" media="screen">{$css}</style>{/if}
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
{if="!$mini_mode"}
		{if="$description"}<meta name="Description" content="{$description}" />{/if}
		{if="$keywords"}<meta name="Keywords" content="{$keywords}" />{/if}
		{if="$feed_link"}<link rel="alternate" href="{$feed_link}" title="{$site_name}" type="application/rss+xml" />{/if}
		<link rel="shortcut icon" href="{if="$favicon"}{$favicon}{else}/favicon.ico{/if}" type="image/x-icon" />
{/if}
{$head_code}
	</head>
	<body>
		<div id="loading">Loading...</div>
		<noscript>{$javascript_disabled_message}</noscript>
{if="$mini_mode"}
	{$side_center}
{else}
	{$browser_support}
	<div class="page">
			<div class='wrapper clearfix'>



<header>
	<div class="container">
		<div class='col-lg-3 col-md-3 col-sm-12 col-xs-12'> {$float_basket} </div>
		<div class='col-lg-5 col-md-5 col-sm-12 col-xs-12 '> 
			<div class="search_area ">
				<form method="get" action="{$search_link}" >
						<input class='live_search search-box' type="text" name="q" autocomplete="off" class="q" value="{$q}" placeholder="عبارت خود را برای جستجو در این کادر وارد نمایید…" />
						<button type="submit" class=" btn-search trans" ></button>
				</form>
				<div class='search_line trans'></div>	
			</div>
		</div>
		<div class='col-lg-4 col-md-4 col-sm-6 col-xs-6'> 
			<a class='hamburger_menu' href="#"></a>
			<a class='header_logo' href="{$home_link}">
	     <h1>{$site_name}</h1>
	     <h2>{$site_description}</h2>
			</a>
		</div>
	</div>
</header>

{if="$task=='home'"}
{$side_center}
{$side_bottom}
{else}
<div class="container">
					<div id="side_top" >
						{$side_top}
					</div>
					<div id="side_center" class="col-md-{$center_cols} col-sm-{$center_cols} col-xs-12 col-md-push-{$right_cols} col-sm-push-{$right_cols} col-ms-push-0">
						{$side_center}
					</div>
					{if="$right_cols"}
						<div id="side_right" class="col-md-{$right_cols} col-sm-{$right_cols} col-xs-12 col-md-pull-{$center_cols} col-sm-pull-{$center_cols} col-ms-pull-0">{$side_right}</div>
					{/if}
					{if="$left_cols"}
						<div id="side_left" class="col-md-{$left_cols} col-sm-{$left_cols} col-xs-12">{$side_left}</div>
					{/if}
					<div id="side_bottom">
						{$side_bottom}
					</div>
	</div>
{/if}

<footer>
	<div class="footer_top">
		<div class="container footer_boxes">
			<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 footer_menu'>
				<h3>ما کی هستیم؟</h3>
				{$menu_1}
			</div>
			<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 footer_menu'>
				<h3>ما کی هستیم؟</h3>
				{$menu_4}
			</div>
			<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 '>
				<h3>ارتباط با ما</h3>
				</div>
			<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 '>
				<h3>ما را دنبال نمایید</h3>
				{$social_icons}
				<h4>همه جا هستیم!</h4>
			</div>
		</div>
	</div>
	<div class="footer_bottom">
		<div class="container">
			<div class='col-lg-8 col-md-8 col-sm-12 col-xs-12 '> {$menu_4} </div>
			<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12 '> <div id='copyright'>{$copyright}</div> </div>
		</div>
	</div>
</footer>



			</div>
	</div>
	{$manage_toolbar}
{/if}

	{$bottom_code}
	{$under_code}
	</body>
<!-- 

Cooked by SmartTry v{$version} | {$query_count} Query in {$end_time} Secound | {$last_update}

 -->
</html>