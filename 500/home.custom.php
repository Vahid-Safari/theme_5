<?php

function run_home_custom()
{
	global $_, $_db, $lang;
	no_entry_check();



	if(!isset($_['menu_3']))
		make_all_menu();
		
	module_init("shop");
	load_function("shop");

	 $_['side_center'] .= "
<div class='home_silder'>
	<div class='container'>
			<div class='slider_menu'>
				<div class='slider_menu_header'>لیست کتاب ها</div>
				<div class='slider_menu_body'>$_[menu_3]</div>
			</div>
	</div>
</div>
";

/////////// four box
	$four_box="";
	for($i=1;$i<=4;$i++)
	{
		if($_['four_box_title_'.$i])
		{
			$four_box .="
			 <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12 boxes4 boxes4$i'>
				<div class='box4_icon box4_icon_$i'></div>
				<h3>".$_['four_box_title_'.$i]."</h3>
				<span>".$_['four_box_text_'.$i]."</span>
			 </div>
			";
		}
	}
	if($four_box)
	{
	 $_['side_center'] .= "
	 <div class='home_4boxes clearfix'>
		<div class='container'>
				$four_box
		</div>
	</div>";
	}


$boxes = "";
for ($i = 1; $i <= 3; $i++) {
	if(isset($_["box3_image_$i"]) and $_["box3_image_$i"])
	{
		$img = $_["box3_image_$i"];
		$img = str_replace("{theme_url}",$_['theme_url'].$_['site_theme_config_id']."/",$img);
		$boxes .= "<div class='".$_["box3_cols_$i"]." col-3box col-3box-$i'> 
			<a href='".$_["box3_link_$i"]."'>
     	 <img alt='' src='$img' />
      	<div class='text-content'><div>".$_["box3_text_$i"]."</div></div>
   	 </a>
		 </div>";
	}
}
if($boxes)
{
	 $_['side_center'] .= "
<div class='home_3boxes'>
	<div class='container'>
$boxes
	</div>
</div>
";



}





	$list = array();
	$counter = 0;
	$products = query_array("SELECT * FROM kcms_post JOIN kcms_product ON (post_id = product_post_id)
        WHERE   post_module_code = 2102
        AND post_date<=$_[now] 
        AND post_site_id=$_[site_id]
        AND post_date>0
        AND post_status=1
        AND post_image<>''
       ORDER BY FIELD(kcms_product.product_status,1,2,3,0),post_hit DESC LIMIT 12 ");
	foreach($products as $product)
	{
		$product['counter'] = ++$counter;
		$list[$product['counter']]=product_thumb($product);
		$list[$product['counter']]['date']= showdate("Y/m/d",$product['post_update']);
	}
//p($list);
		$home_topsales = get_theme_box("home_product_topsales", array(
			"list"=> $list,
		  "page_text"=>"",
			"paging"=>"",
			"not_found" => lang('هیچ آیتمی یافت نشد'),				
		));	

$_["side_center"] .= "
<div class='home_topsales'>
<h3 class='box_title'>پرفروش ترین کتاب ها</h3>
$home_topsales
</div>
";

  load_javascript('jquery.owlcarousel2');
	$_["jquery_code"] .= <<<printext

$(".home_topsales .topsales").owlCarousel({
	items: 4,
	//lazyLoad: true,
	rtl:true,
	loop:true,
	margin:30,
	//nav:true,
	//navText:["<i class='fa fa-angle-right'></i>","<i class='fa fa-angle-left'></i>"],
 	//autoplay:true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	responsiveClass:true,
	stagePadding: 100,
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
			items:4,
			//nav:true,
			//loop:false
		}
	}
});
		
printext;

/*		*/


//////////////
	$page_list = array();
	$page_list[]="<a class='active' data-id='0' href='#'>تمام موضوعات</a>";
	$pages = query_array("SELECT * FROM kcms_page
	WHERE page_module_code = 2102
	AND page_site_id=$_[site_id]
	AND page_view>1
	ORDER BY page_order ASC LIMIT 5 ");
	foreach($pages as $page)
	{
		$page_list[]="<a data-id='$page[page_id]' href='".id_url($page["page_id"])."'>".stripinput($page["page_title"])."</a>";
	}
	$pages_list = make_link_list($page_list,"li", " class='bookslist_pages'");
	$list = array();
	$counter = 0;
	$products = query_array("SELECT * FROM kcms_post JOIN kcms_product ON (post_id = product_post_id)
        WHERE post_module_code = 2102
        AND post_date<=$_[now] 
        AND post_site_id=$_[site_id]
        AND post_date>0
        AND post_status=1
        AND post_image<>''
		ORDER BY FIELD(kcms_product.product_status,1,2,3,0),post_date DESC LIMIT 12 ");
	foreach($products as $product)
	{
		$product['counter'] = ++$counter;
		$list[$product['counter']]=product_thumb($product);
		$list[$product['counter']]['home']= 1;
	}
//p($list);
		$home_topsales = get_theme_box("product_list", array(
			"list"=> $list,
		  "page_text"=>"",
			"paging"=>"",
			"not_found" => lang('هیچ آیتمی یافت نشد'),				
		));	
//<h3 class='box_title'>پرفروش ترین کتاب ها</h3>

$_["side_center"] .= "
<div class='home_bookslist'>

	<div class='container'>

<div class='box_bookslist_title clearfix'>
<h3>مشاهده کتاب ها</h3>
$pages_list
</div>

$home_topsales
	</div>
</div>

";
}
?>