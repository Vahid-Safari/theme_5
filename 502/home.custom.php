<?php

function run_home_custom()
{
	global $_, $_db, $lang;
	no_entry_check();

	load_function('shop');
	module_init('shop');	
  $two_box="";
	for($i=1;$i<=2;$i++)
	{
		if($_['two_box_img_'.$i])
		{
			$two_box .="
			 <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
			   <a href='".$_['two_box_link_'.$i]."' title='test'>
			    <img src='".$_['two_box_img_'.$i]."' alt='test'>
	       </a>
			 </div>
			";
		}
	}
	$_['side_top']="<div class='two_box clearfix'>$two_box</div>";

//////////////////////////////// product
  $cache_home_product =get_cache("cache_home_product", SITE_ID,0,'home');
  if(!$cache_home_product)
  {
		 $cache_home_product ="";
		 $rows = query_array("SELECT * FROM kcms_page 
		 WHERE page_site_id=$_[site_id] 
		 AND page_module_code = 2102
		 AND page_view > 1 
		 AND page_parent= 0
		 AND page_access <= ".USER_LEVEL."  
		 ORDER BY page_order");
    foreach($rows as $row) 
		{
			$home_product="";
			$title = stripinput($row['page_title']);
			$link=id_url($row['page_id']);
			$post_page_id=$row['page_id'];
		  $list = array();
			$sub_rows=query_array("SELECT * FROM kcms_post JOIN kcms_product ON (post_id = product_post_id)
      JOIN kcms_linkage ON linkage_taxonomy_id IN (".make_subpage_list($post_page_id,2102).")
      WHERE linkage_entry_id = post_id 
      AND linkage_taxonomy = 1
      AND post_module_code = 2102
			AND post_date<=$_[now] 
			AND post_date>0
			AND post_status=1
      GROUP BY post_id ORDER BY FIELD(kcms_product.product_status,1,2,3,0),post_date DESC LIMIT 6");
		  foreach($sub_rows as $sub_row)
 		   $list[$sub_row['post_id']]= product_thumb($sub_row);
 		  
 		  if($list)
 		  {
 		  	$i++;
				$home_product = get_theme_box("home_product_list", array(
					"list"=> $list,
				  "page_text"=>"",
					"paging"=>"",	
					"ulclass"=>"product_owl_home",
					"not_found" => lang('products_not_found'),			
				));
				$home_product="
				  <div class='product_home_box'>
				    <span class='product_home_box_title'>
				      <a href='$link' title='test'><h3>$title</h3></a>
				    </span>
				    <div class='product_home_box_body'>
				      $home_product
				    </div>
				  </div>
				";
 		   $cache_home_product .=$home_product;
			}
		}
  ////////////////////////// two box home center
	$two_box_center="";
	for($i=1;$i<=2;$i++)
	{
		if($_['two_box_home_center_img_'.$i])
		{
			$two_box_center .="
			 <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
			   <a href='".$_['two_box_home_center_link_'.$i]."' title='test'>
			    <img src='".$_['two_box_home_center_img_'.$i]."' alt='test'>
	       </a>
			 </div>
			";
		}
	}
	$cache_home_product .="<div class='two_box clearfix'>$two_box_center</div>";	
  /////////////////// brands
  $sql = "SELECT * FROM `kcms_post` 
    INNER JOIN `kcms_brand` ON (`kcms_brand`.`brand_id` = `kcms_post`.`product_brand_id`)
    WHERE ( `kcms_post`.`post_site_id` =$_[site_id] AND product_brand_id>0)
    GROUP BY brand_id ORDER BY brand_name;";
	$result = $_db->sql_query($sql);
	$list = array();
	while($row = $_db->sql_fetchrow($result))
	{
		$title = ($row['brand_logo']) ? "<img src='$_[main_static_url]brand/thumb/$row[brand_logo]' alt='test' />":"<h3>".stripinput($row['brand_name'])."</h3>";
		$list[]= "<a title='".stripinput($row['brand_name'])."' href='".url('brands',urldecode($row['brand_slug']))."'>$title</a>"; 
	}
	if ($list)
	{
		$block_brands = "<div class='clearfix'>".make_link_list($list,"li", " id='brands_list'  class='brand_home_list owl-theme' ")."<br class='clear' /></div>";
		$home_product="
		  <div class='product_home_box'>
		    <span class='product_home_box_title'>
		      <a class='brand_link' href='".url('brands')."' title='test'><h3>برند شرکتها</h3></a>
		    </span>
		    <div class='product_home_box_body'>
		      $block_brands
		    </div>
		  </div>
		";
		$cache_home_product .=$home_product;
	}			
	  set_cache("home_rating" ,implode(",",$_['rating']), YEAR, SITE_ID);
		set_cache("cache_home_product" ,$cache_home_product, YEAR,  SITE_ID,0,'home');
 }
	else
	{
		$_['rating'] = explode(",", get_cache("home_rating" , SITE_ID));
	} 
  
 if($cache_home_product)
 {
	  $_['side_center']=$cache_home_product;

/////////////////////////////
	load_javascript('jquery.owlcarousel2');
	load_css('jquery.owlcarousel2');
	add_code("jquery_code", <<<printext
  $('.product_owl_home').owlCarousel({
    margin:10,
    loop:true,
    items:3,
    rtl:true,
		nav:true,
		dots:false,
		navText:["<i class='fa fa-angle-right' aria-hidden='true'></i>","<i class='fa fa-angle-left' aria-hidden='true'></i>"],
	 	autoplay:true,
		autoplayTimeout:50000,
		autoplayHoverPause:true,    
    responsive:{
        0:{
            items:1
        },
        480:{
            items:2
        },
        1000:{
            items:3
        }
    }
});

$('.brand_home_list').owlCarousel({
    margin:10,
    loop:true,
    items:4,
    rtl:true,
		nav:true,
		dots:false,
		navText:["<i class='fa fa-angle-right' aria-hidden='true'></i>","<i class='fa fa-angle-left' aria-hidden='true'></i>"],
	 	autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,    
    responsive:{
        0:{
            items:1
        },
        480:{
            items:2
        },
        1000:{
            items:4
        }
    }
});

  $('.product_owl_side').owlCarousel({
    loop:true,
    items:1,
    rtl:true,
		nav:true,
		dots:false,
		navText:["<i class='fa fa-angle-right' aria-hidden='true'></i>","<i class='fa fa-angle-left' aria-hidden='true'></i>"],
	 	autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,    
    responsive:{
        0:{
            items:1
        },
        480:{
            items:2
        },
        1000:{
            items:1
        }
    }
 });

printext
);

 }

  
}

?>