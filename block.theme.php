<?php //ی
if ( ! defined('KCMS_ON')) exit('No direct script access allowed');

$block_module_code = 1992;

function block_theme($side='side_right')
{
	global $_, $_db, $lang;
		
	
	if(!isset($_['sides_width']))
		$_['sides_width'] = "0,9,3";
	$sides = explode(",", $_['sides_width']);
	sides($sides[0], $sides[1], $sides[2]);	
 	
	//p($_['mini_mode']);
	//Slider
	$_['header_slide'] = "";
 	if($_['enable_header_slide'] and !$_['mini_mode'])
	{
		if(!isset($_['slideshow_mode']))
		{
			$_['slideshow_mode'] ='slider';
			$_['slideshow_arrow'] = 1;
			$_['slideshow_bullets'] = 0;
			$_['slideshow_interval'] = 5000;
			$_['slideshow_effect'] = 'fade';
		}
	
		$directionNav = ($_['slideshow_arrow']=='0') ? "false":"true";
		$interval = $_['slideshow_interval'];
		if($_['slideshow_arrow']!='0')
		{
			$prev_icon = "<i class='fa fa-".str_replace("{dir}",$lang['align'],$_['slideshow_arrow'])."'></i>";
			$next_icon = "<i class='fa fa-".str_replace("{dir}",$lang['alignx'],$_['slideshow_arrow'])."'></i>";
		}
		else
		{
			$prev_icon =$next_icon ="";
		}
		
		
		$controlNav = $_['slideshow_bullets']==1 ? "true":"false";
		if($_['slideshow_mode'] == "slider")
		{
			$limit = ($_['enable_slideshow'] == 1) ? "":"LIMIT 1";
			$rows = query_array("SELECT * FROM $_[dbprefix]header WHERE header_site_id=$_[site_id] AND header_page_id=$_[page_id] and header_status=1 ORDER BY RAND() $limit");
			if(!$rows)
				$rows = query_array("SELECT * FROM $_[dbprefix]header WHERE header_site_id=$_[site_id] AND header_page_id=-1 and header_status=1 ORDER BY RAND() $limit");
			if($rows)
			{
				$list = array();
				$n = 0;
				foreach ($rows as $row) 
				{
					if(!file_exists("$_[static_dir]headers/$row[header_file]"))
						continue;
					$list[++$n]= array(
						"title" => stripinput($row['header_title']),
						"link" =>	($row['header_link'] and $row['header_link']!='#') ? $row['header_link']:"",
						"blank" => ($row['header_blank']) ? true:false,
						"image" => "$_[static_url]headers/$row[header_file]",
						"counter" => $n,
						"slider_mode" => $_['slideshow_mode']
					);
				}
				
				if($n)
				{
					if(!$_['enable_slideshow'] or $n==1)
					{
						$tmp = $list[rand(1,$n)];
						unset($list);
						$n = 1;
						$list[$n] = $tmp;
					}
					else
					{
						load_javascript("jquery.nivo_slider");
						$effect = $_['slideshow_effect'];
						add_code("jquery_code", <<<printext
$('#slider').nivoSlider({
	effect: '$effect',
	slices: 15,
	boxCols: 8,
	boxRows: 4,
	animSpeed: 500,
	pauseTime: $interval,
	startSlide: 0,
	directionNav: $directionNav,
	controlNav: $controlNav,
	controlNavThumbs: false,
	pauseOnHover: false,
	manualAdvance: false,
	prevText: "$prev_icon",
	nextText: "$next_icon",
	randomStart: false,
	beforeChange: function(){},
	afterChange: function(){},
	slideshowEnd: function(){},
	lastSlide: function(){},
	afterLoad: function(){}
});
		
printext
		);
					}
					$_['header_slide'] = get_theme_box("slide", array(
						"list" => $list,
						"count" => $n,
						"slider_mode" => $_['slideshow_mode']
					));
				}
			}
		}	
		elseif(in_array($_['slideshow_mode'], array("new_product","off_product","special_product")))
		{
			module_init('shop');
			load_function('shop');
			$shop_setting = $_['shop_setting'];
			
			$slides = "";
			$nav="";
			$product_group="AND post_special=1";
			if($_['slideshow_mode']=="new_product"){
				$product_group="";
			}
			else if($_['slideshow_mode']=="off_product"){
				$product_group="AND product_old_price>0";
			}
			$rows = query_array("SELECT * FROM kcms_post 
				WHERE post_site_id = $_[site_id]
				AND post_module_code = 2102
				AND post_date<=$_[now] 
				AND post_date>0
				AND post_status=1 
				$product_group
				GROUP BY post_slug
				ORDER BY post_date DESC LIMIT 10");
				
			$n = 0;
			$list = array();
			foreach($rows as $row)
			{
				$n++;
				$list[]=product_thumb($row);
			}
			if(!$list)
				return true;
				
			$slides = get_theme_box("slide", array(
				"list" => $list,
				"count" => $n,
				"slider_mode" => $_['slideshow_mode']
			));	
			
			if($_['enable_slideshow'] == 1 and $n > 1 )
			{
				load_javascript('jquery.new_carousel');
				load_css('jquery.owl_carousel');				
				$_['header_slide'] ="<div class='product-slider'>".$slides."</div>";
				add_code("jquery_code", <<<printext
$(".product-slider").owlCarousel({
	items: 1,
	autoPlay : $interval,
	responsive: true,
	navigation: $directionNav,
	pagination: $controlNav,
	navigationText:["$prev_icon","$next_icon"	],
	direction: 'rtl',
	slideSpeed: 1500,
	mouseDrag: true,
	touchDrag: true,
	lazyLoad: false,
	rewindNav: true,
	scrollPerPage: true,
	itemsDesktop : [1199,1],
	itemsDesktopSmall : [980,1],
	itemsTablet: [768,1],
	itemsTabletSmall: false,
	itemsMobile : [479,1]
});
printext
);
			}
			else
			{
				$_['header_slide'] ="<div class='product-slider'>".$slides."</div>";
			}
		}
	} 
	$_['site_classes'][] = ($_['header_slide']) ? "slider_on":"slider_off";
	

}

?>