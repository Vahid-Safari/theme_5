<?php

$block_module_code = 2102;
function block_new_products($side='side_right')
{
	global $_, $_db, $lang;

	if($_['task']!= 'home')
	  return true;
$block =  get_cache("new_products" ,  SITE_ID,0);
if(!$block)
{
  $block="-";
	load_function('shop');
	module_init('shop');
		$sql =query_array("SELECT * FROM kcms_post 
		WHERE 
		post_site_id = $_[site_id] AND
		post_module_code = ".SHOP_CODE." AND
		post_date<=$_[now] AND
		post_date>0 AND
		post_status=1 AND
		product_status=1 
		ORDER BY post_date DESC LIMIT 6");
		$list = array();
		foreach($sql as $row)
			$list[]=product_thumb($row);

	if ($list)
	{
		$block = get_theme_box("home_product_list", array(
			"list"=> $list,
		  "page_text"=>"",
			"paging"=>"",
			"ulclass"=>"product_owl_side",
			"not_found" => lang('products_not_found'),				
		));
		
  }
	set_cache("new_products" ,$block, YEAR,  SITE_ID,0);
}
if($block != "-")
{
  add_theme_box($side, "block", "box_new_product", array(
		"title"=>" محصولات جدید ",
		"text"=>$block ,
	));
}
	
}

?>