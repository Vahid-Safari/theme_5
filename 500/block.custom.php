<?php //ی
if ( ! defined('KCMS_ON')) exit('No direct script access allowed');

$block_module_code = 1992;

function block_custom($side='side_right')
{
	global $_, $_db, $lang;

	$_["jquery_code"] .= <<<printext

$('.search-box,.btn-search').bind('blur', function(){ $('.search_area').removeClass("active"); });
$('.search-box,.btn-search').bind('focus', function(){ $('.search_area').addClass('active'); });

printext;







	module_init("content");
	load_function("content");
	$list = array();
	$counter = 0;
	$articles = query_array("SELECT 
  * 
FROM
  kcms_post 
WHERE post_site_id = $_[site_id] 
  AND post_module_code = 2101 
  AND post_date <= $_[now] 
  AND post_date > 0 
  AND post_status = 1 
ORDER BY post_date DESC 
LIMIT 12 ");
	foreach($articles as $article)
	{
		$article['counter'] = ++$counter;
		$list[$article['counter']]=content_thumb($article);
		$list[$article['counter']]['date']= showdate("Y/m/d",$article['post_update']);
		$list[$article['counter']]['footer']= 1;
	}
//p($list);
		$footer_content_list = get_theme_box("content_list", array(
			"list"=> $list,
		  "page_text"=>"",
			"paging"=>"",
			"not_found" => lang('content_not_found'),				
		));	

$_["side_bottom"] .= "<div class='footer_articles'>
	<h3 class='box_title'>آخرین مطالب</h3>
	<div class='container'>
		$footer_content_list
	</div>
</div>";

  load_javascript('jquery.owlcarousel2');
	$_["jquery_code"] .= <<<printext

$(".footer_articles .col-article").removeClass('col-lg-4 col-md-4 col-sm-6 col-xs-12').closest('.contents_list').addClass('owl-carousel').owlCarousel({
	items: 3,
	//lazyLoad: true,
	rtl:true,
	loop:true,
	margin:30,
	nav:true,
	navText:["<i class='fa fa-angle-right'></i>","<i class='fa fa-angle-left'></i>"],
 	//autoplay:true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	responsiveClass:true,
	stagePadding: 10,
	responsive:{
		0:{
			items:1,
			//nav:false
		},
		480:{
			items:2,
			//nav:false
		},
		980:{
			items:3,
			//nav:true,
			//loop:false
		}
	}
});

		
printext;

/*







<div class='home_timer'>
	<div class="container">
		d
	</div>
</div>

*/
}

?>