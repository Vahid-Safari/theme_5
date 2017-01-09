<?php


$block_module_code = 2102;
function block_related_products($side='side_bottom')
{
	global $_, $_db, $lang;
	if(!isset($_['other_product']))
	return true;
	
	$post_id=$_['other_product'][0];
  $post_page_id = $_['other_product'][1];
  $sql = query("SELECT * FROM ".PRODUCT_TABLE." WHERE post_site_id=$_[site_id] AND post_module_code=2102 AND post_id=$post_id AND post_page_id=$post_page_id LIMIT 1");
  $post_date=$sql['post_date'];
//////////////////////////////// 
 	$block_page_code =get_cache("near_product_$post_id");
	if(!$block_page_code || $block_page_code=="-")
	{
		$block_page_code="-";
	  $row_left = query("SELECT * FROM ".PRODUCT_TABLE." WHERE post_site_id=$_[site_id] AND post_module_code=2102 AND post_date <= $_[now] AND post_date < $post_date  AND post_status=1 ORDER BY post_date DESC LIMIT 1");	
	  $prev_content="";
	  $next_content="";
		if ($row_left['post_id']!="")
		{
			$content_link = id_url($row_left['post_page_id'],$row_left['post_id'],$row_left['post_slug']);
			$content_title = stripinput($row_left['post_title']);
			$next_content="
		    <div class='product_page_inner content_page_left'>
		     <a href='$content_link' title='test'>
		      <h3>محصول بعدی</h3>	
		      <i class='fa fa-chevron-left' aria-hidden='true'></i>		      		      
		     </a>
		     <h3 class='title_next_prev'>$content_title</h3>
		    </div>
		  ";		
		}
	  $row_right = query("SELECT * FROM ".PRODUCT_TABLE." WHERE post_site_id=$_[site_id] AND post_module_code=2102 AND post_date <= $_[now] AND post_date > $post_date  AND post_status=1 ORDER BY post_date ASC LIMIT 1");
		if ($row_right['post_id']!="") 
		{
			$content_link = id_url($row_right['post_page_id'],$row_right['post_id'],$row_right['post_slug']);
			$content_title = stripinput($row_right['post_title']);
			$prev_content="
		    <div class='product_page_inner content_page_right'>
		     <a href='$content_link' title='test'>
		      <i class='fa fa-chevron-right' aria-hidden='true'></i> 
		      <h3>محصول قبلی</h3>	      
		     </a>
		      <h3 class='title_next_prev'>$content_title</h3>		     
		    </div>
		  ";		
		}
		if($prev_content || $next_content)
		{
			$content_prev_next ="
			<div class='other_product_page clearfix'>
			 <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";
			  if($prev_content)
			  	$content_prev_next .=$prev_content;
			 $content_prev_next .="
			 </div>
			 <div class='col-lg-6 col-md-6 col-sm-6 col-xs-6'>";	
			  if($next_content)
			  	$content_prev_next .=$next_content;
			 $content_prev_next .="
			 </div>
			</div>";
			$block_page_code=	$content_prev_next;
		}
		set_cache("near_product_$post_id" ,$block_page_code, YEAR);
  }
  if($block_page_code !="-")
      $_['side_center'] .= $block_page_code ;

////////////////////////////////	
	$related_products = get_cache("related_products_$post_id" , SITE_ID,0);
	if(!$related_products)
{
	$num = 12;
	$post_page_id = $_['other_product'][1];
	load_function('form');
	$result = query_array("
SELECT *, COUNT(*) AS tag_count
FROM $_[dbprefix]linkage T1
  JOIN $_[dbprefix]linkage T2
    ON T1.linkage_taxonomy_id = T2.linkage_taxonomy_id
      AND T1.linkage_entry_id != T2.linkage_entry_id
  JOIN kcms_post
    ON T2.linkage_entry_id = post_id
WHERE T1.linkage_entry_id = $post_id
    AND post_page_id = $post_page_id 
    AND post_date<=$_[now]
    AND post_site_id = $_[site_id] 
    AND post_module_code=2102  
    AND post_status=1
    AND T1.linkage_taxonomy = 2
   	AND T1.linkage_module_code = 2102
GROUP BY T2.linkage_entry_id
ORDER BY COUNT( * ) DESC
LIMIT $num
");

	
	$related = $list = array();
	$related[] = $post_id;
	foreach ($result as $row) 
	{
		$related[] = $row['post_id'];
		$list[$row['post_id']]= product_thumb($row);
		$count_links++;
	}
	if(count($list) < $num)
	{
		$count = $num - count($list); 
		$relateds = implode(",",$related);
		$result = query_array("
	  SELECT * FROM kcms_post WHERE post_site_id = $_[site_id] 
		AND post_page_id=$post_page_id 
		AND post_id NOT IN($relateds)
		AND post_date<=$_[now] AND post_id<>$post_id
		AND post_status=1 ORDER BY RAND() LIMIT $count
    ");
		foreach ($result as $row)  
		{
			$list[$row['post_id']]= product_thumb($row);
		}
	}
	$related_products = "-";
	if ($list)
	{
		$related_products = get_theme_box("home_product_list", array(
				"list"=> $list,
				"page_text" => "",
				"paging" => "",
				"ulclass"=>"product_owl_home",
				"not_found" => lang('products_not_found'),
		));
	}
	
	set_cache("related_products_$post_id" , $related_products,YEAR, SITE_ID,0);
}
	
	if ($related_products!="-")
	{
		$related_products="
		  <div class='product_home_box'>
		    <span class='product_home_box_title'>
		      <h3>".lang("related_products")."</h3>
		    </span>
		    <div class='product_home_box_body'>
		      $related_products
		    </div>
		  </div>
		";		
		$_['side_center'] .="<div class='box related_products_box'>$related_products</div>";
	}

}

?>