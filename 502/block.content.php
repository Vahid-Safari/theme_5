<?php


$block_module_code = 2101;
function block_content($side='side_right')
{
	global $_, $_db, $lang;
	
	if(!isset($_['other_content']))
		return true;
	$post_id=$_['other_content'][0];
	$post_page_id = $_['other_content'][1];
	
 	$block_page_code =get_cache("next_prev_content_$post_id");
	if(!$block_page_code || $block_page_code =="-")
	{
		$block_page_code="-";
		$array = array();
	  $post_date=$_['other_content'][2];
	  $row = query("SELECT * FROM ".CONTENT_TABLE." WHERE post_site_id=$_[site_id] AND post_module_code=2101 AND post_date <= $_[now] AND post_date < $post_date  AND post_status=1 ORDER BY post_date DESC LIMIT 1");	
	  $prev_content="";
	  $next_content="";
		if ($row['post_id']!="")
		{
			$content_link = id_url($row['post_page_id'],$row['post_id'],$row['post_slug']);
			$content_title = stripinput($row['post_title']);
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
	  $row = query("SELECT * FROM ".CONTENT_TABLE." WHERE post_site_id=$_[site_id] AND post_module_code=2101 AND post_date <= $_[now] AND post_date > $post_date  AND post_status=1 ORDER BY post_date ASC LIMIT 1");
		if ($row['post_id']!="") 
		{
			$content_link = id_url($row['post_page_id'],$row['post_id'],$row['post_slug']);
			$content_title = stripinput($row['post_title']);
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
			<div class='row'>
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
			 </div>
			</div>";
			$block_page_code=	$content_prev_next;
		}
		set_cache("next_prev_content_$post_id" ,$block_page_code, YEAR);
  }
  if($block_page_code !="-")
    $_['side_center'] = str_replace("<!--next-prev-->",$block_page_code,$_['side_center']);

}

?>