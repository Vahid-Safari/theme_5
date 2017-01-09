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
	<div class="{$outer_container}">
	<div class='wrapper clearfix'>
	<!-- header -->
	<header>
		{if="$header_top_enable"}
		<!-- nav -->
		<div class='header_top'>
			<div class="{$inner_container} header_top_container">
				<div class='header_top_inner clearfix'>
					{if="$social_position==1"}{$social_icons}{/if}
					{if="$time_position==1"}<div class="datetime pos_1">{$date_time}</div>{/if}
					{if="$seacrhbox_position==1"}<div class="search_area pos_1">
							<form method="get" action="{$search_link}" class="searchform clearfix">
								<span class="form-inline input-group">
									<input class='form-control live_search' type="text" name="q" autocomplete="off" class="q" maxlength="255" value="{$q}" placeholder="{$search}" />
									<span class="input-group-btn">
										<button type="submit" class="btn btn-custom btn-search search_button" >{$search}</button>
									</span>
								</span>
							</form>		
					</div>
					{/if}
					{if="$basket_position==2"}{$float_basket}{/if}
					{$extra_code[1]}
					{$menu_1}
				</div>
			</div>
		</div>
		<!-- /nav -->
		{/if}
		<!-- header primary -->
		<div class='header_primary clearfix'>
			<div class="{$inner_container} header_primary_container">
				<div class='header_primary_inner clearfix'>
					<a class='header_logo' href="{$home_link}">
	       		<h1>{$site_name}</h1>
	       		<h2>{$site_description}</h2>
					</a>
					{if="$time_position==2"}<div class="datetime pos_2">{$date_time}</div>{/if}
					{if="$social_position==2"}{$social_icons}{/if}
					{if="$seacrhbox_position==2"}
						<div class="search_area pos_2">
							<form method="get" action="{$search_link}" class="searchform clearfix ">
								<span class="form-inline input-group">
									<input class='form-control live_search' type="text" name="q" autocomplete="off" class="q" maxlength="255" value="{$q}" placeholder="{$search}" />
									<span class="input-group-btn">
										<button type="submit" class="btn btn-custom btn-search search_button" >{$search}</button>
									</span>
								</span>
							</form>
						</div>
					{/if}
					{if="$basket_position==1"}{$float_basket}{/if}
					{$extra_code[2]}
					{if="$main_menu_position=='3'"}
			    <!-- header menu -->
					<div class='main_menu '>
						<div class="main_menu_container">
							<div class='main_menu_inner clearfix'>
								{$menu_2}
							</div>
						</div>
					</div>
					<!-- /header menu -->
					{/if}
				</div>
			</div>
		</div>
		<!-- /header primary -->
		
    {if="$main_menu_position=='1'"}
    <!-- header menu -->
		<div class='main_menu clearfix'>
			<div class="{$inner_container} main_menu_container">
				<div class='main_menu_inner clearfix'>
					{$menu_2}
					{if="$time_position==3"}<div class="datetime pos_3">{$date_time}</div>{/if}
					{if="$seacrhbox_position==3"}
						<div class="search_area pos_3">
							<form method="get" action="{$search_link}" class="searchform clearfix ">
								<span class="form-inline input-group">
									<input class='form-control live_search' type="text" name="q" autocomplete="off" class="q" maxlength="255" value="{$q}" placeholder="{$search}" />
									<span class="input-group-btn">
										<button type="submit" class="btn btn-custom btn-search search_button" >{$search}</button>
									</span>
								</span>
							</form>	
						</div>
					{/if}
					{if="$basket_position==3"}{$float_basket}{/if}
					{$extra_code[3]}
					{if="$social_position==3"}{$social_icons}{/if}
				</div>
			</div>
		</div>
		<!-- /header menu -->
    {/if}
    
		{if="$slider_position=='3'"}{if="$header_slide"}<div class="{$inner_container}"><div id="header_slide" class="clearfix">{$header_slide}</div></div>{/if}{/if}
	
	</header>
	<!-- /header -->
	
	{$extra_code[5]}
	<!-- main -->
	<section class='main_content'>
		<div class="{$inner_container} ">
			<div class='main_content_container'>
				<div class="inner_main_content sides ">
					<div id="side_top" >
						{$side_top}
						{if="$slider_position=='1'"}{if="$header_slide"}<div id="header_slide" class="clearfix">{$header_slide}</div>{/if}{/if}
						{if="$breadcrumb_position=='1'"}<div class='breadcrumb clearfix' >{$breadcrumb}</div>{/if}
					</div>
					<div class='row'>
					<div id="side_center" class="col-md-{$center_cols} col-sm-{$center_cols} col-xs-12 col-md-push-{$right_cols} col-sm-push-{$right_cols} col-ms-push-0">
						{if="$main_menu_position=='2'"}
							<div class="clearfix" id="top_menu">
								{$menu_2}
								{if="$time_position==3"}<div class="datetime pos_3">{$date_time}</div>{/if}
								{if="$seacrhbox_position==3"}
								<div class="search_area pos_3">
									<form method="get" action="{$search_link}" class="searchform clearfix ">
										<span class="form-inline input-group">
											<input class='form-control live_search' type="text" name="q" autocomplete="off" class="q" maxlength="255" value="{$q}" placeholder="{$search}" />
											<span class="input-group-btn">
												<button type="submit" class="btn btn-custom btn-search search_button" >{$search}</button>
											</span>
										</span>
									</form>	
								</div>
								{/if}
								{$extra_code[3]}
							</div>
						{/if}
						{if="$slider_position=='2'"}
							{if="$header_slide"}
								<div id="header_slide" class="clearfix">{$header_slide}</div>
							{/if}
						{/if}
							{if="$breadcrumb_position=='2'"}<div class='breadcrumb clearfix'>{$breadcrumb}</div>{/if}
							{$side_center}
					</div>
					{if="$right_cols"}
						<div id="side_right" class="col-md-{$right_cols} col-sm-{$right_cols} col-xs-12 col-md-pull-{$center_cols} col-sm-pull-{$center_cols} col-ms-pull-0">{$side_right}</div>
					{/if}
					{if="$left_cols"}
						<div id="side_left" class="col-md-{$left_cols} col-sm-{$left_cols} col-xs-12">{$side_left}</div>
					{/if}
				</div>
					<div id="side_bottom">
						{$side_bottom}
						{if="$breadcrumb_position=='3'"}<div class='breadcrumb clearfix' >{$breadcrumb}</div>{/if}	
					</div>
	
				</div>
			</div>
		</div>
	</section>
	{$extra_code[6]}
	
	<!-- footer -->
	<footer class="clearfix">
		<div class="{$inner_container}">
			<div class="footer_inner clearfix">
			{$footer_code}
			{$extra_code[4]}
			{$menu_4}
			{if="$social_position==4"}{$social_icons}{/if}
			<div class='copyright_area clearfix'>
				<div id='copyright'>{$copyright}</div>
				{$license}
			</div>
			</div>
			
		</div>
	</footer>
{if="$gotop_position!='0'"}
<div id="gotop">
    <a href="#" title="Back to the top">
        <i class="{$gotop_icon}"></i>
    </a>
</div>
{/if}
	<!-- /footer -->
	</div>
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