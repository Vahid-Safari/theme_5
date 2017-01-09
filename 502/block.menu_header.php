<?php
if ( ! defined('KCMS_ON')) exit('No direct script access allowed');

$block_module_code = 1992;

function block_menu_header($side='side_right')
{
	global $_, $_db, $lang,$i;
	
	if(isset($_['enable_responsive']) and is_mobile())
	{
		$tree = "";
		$tree = get_cache("mmenu_header" , SITE_ID, USER_LEVEL);
		if(!$tree){
			$tree = make_mmenu();
			set_cache("mmenu_header" ,$tree, YEAR, SITE_ID, USER_LEVEL);
		}
		$_['sf_mega'] ="<a href='#mm-menu' class='mm-menu-link'><i class='fa fa-list'></i><h3>$lang[main_menu]</h3></a><nav id='mm-menu' class='hidden'>$tree</nav>";
		
		load_javascript("jquery.mmenu");
		load_css("jquery.mmenu");
		$_['jquery_code'] .= <<<printext

$('#mm-menu').mmenu({
	"extensions": [
	"pagedim-black",
	"shadow-page"
	],
	"offCanvas": {
		"position": "right",
	},
	"rtl": {
		use: true
	},
}).removeClass('hidden');
printext;
	}
	else
	{
		$menu = get_cache("menu_header" , SITE_ID, USER_LEVEL);
		if($menu)
		{
			$_['sf_mega'] = $menu;
		}
		else{
			$tree = make_menu(0, "", 1, 2);
			if (!$tree)
				return true;
			$_['sf_mega'] = $tree;
			set_cache("menu_header" ,$tree, YEAR, SITE_ID, USER_LEVEL);
		}

		  $_["jquery_code"] .=<<<printext

	$(window).scroll(function(event){ 
		($(this).scrollTop() >= 50) ? $(".main_menu").addClass("fix-menu"):$(".main_menu").removeClass("fix-menu");
	});
	
var menu_speed = 100;
$('.sf-menu > li.with_ul_inner').hoverIntent(function () {
	$(this).find(">ul").stop().slideDown(menu_speed);
	},
	function () {
	 $(this).find(">ul").stop().slideUp(menu_speed);
});	

printext
; 
}

}


function make_mmenu($page_parent = 0,  $tree = "")
{
	global $_, $_db, $lang;
	$result = $_db->sql_query("SELECT * FROM ".PAGE_TABLE." WHERE page_site_id=$_[site_id] AND page_parent=$page_parent AND page_access<=".USER_LEVEL." ".((IS_MEMBER) ?  "AND page_access<>-1" : "")." ORDER BY page_order ASC");
	if ($_db->sql_numrows() == 0)
		return "";
	$tree = "<ul>";
	while ($row = $_db->sql_fetchrow($result)) 
	{	
		if(($row['page_view'] & 9) != 9)
			continue;
		$link = ($row['page_title']) ? ($row['page_module_code'] == SYSTEM_CODE) ? $row['page_link']:id_url($row['page_id']):url($row['page_slug']);
    $page_title = stripinput(($row['page_menu_title']=="") ? (($row['page_title']=="") ? lang($row['page_slug']): $row['page_title']):$row['page_menu_title']);
    $tree .= "<li><a href=\"$link\">$page_title</a>".make_mmenu ($row['page_id'],  $tree)."</li>";
	}
	$tree .= "</ul>";
	return $tree;
}


function make_menu($page_parent = 0,  $tree = "", $menu_level, $menu_type=2)
{
	global $_, $_db, $lang;
	$top_icon = 0;
	$rows= query_array("SELECT * FROM ".PAGE_TABLE." WHERE page_site_id=$_[site_id] AND page_parent=$page_parent AND page_view & 5=5 AND page_access<=".USER_LEVEL." ".((IS_MEMBER) ?  "AND page_access<>-1" : "")." ORDER BY page_order ASC");
	if(count($rows)==0)
		return "";
	if ($menu_level == 2){
		$tree = "<ul class='sub-menu sub_menu_".$menu_level."'>";
	}
	else
		$tree = ($page_parent == 0)? ($menu_type==2 ? "<ul class='menu_2 sf-menu clearfix'>":"<ul class='menu_3 sf-vertical sf-menu clearfix'>"): "<ul class='sub_menu_".$menu_level."'>";
	
	if($menu_type == 2){
		$menu_bits = 5;
		$arrow = "down";
	}
	else{
		$menu_bits = 9;
		$arrow = "left";	
	}

	foreach($rows as $row)
	{	
		if(($row['page_view'] & $menu_bits) == $menu_bits)
		{
			$link = ($row['page_title']) ? ($row['page_module_code'] == SYSTEM_CODE) ? $row['page_link']:id_url($row['page_id']):url($row['page_slug']);
			$target = "";
      $page_title = stripinput(($row['page_menu_title']=="") ? (($row['page_title']=="") ? lang($row['page_slug']): $row['page_title']):$row['page_menu_title']);
			$active = ( $row['page_id'] == $_['page_id']) ? " class='active'":"";
			if ($menu_level == 1){
				$inner_ul = make_menu ($row['page_id'],  $tree, $menu_level+1);
				$tree .= "<li id='__$row[page_id]' class='".($inner_ul ? "with_ul_inner":"")."'><a  href=\"$link\"$target$active>$page_title".($inner_ul ? "<i class='fa fa-angle-$arrow'></i>":"")."</a>$inner_ul</li>\n";
			}
			else if ($menu_level != 2){
			  $tree .="</ul><ul class='sub_menu_3' style='display:block;'>";
				$tree .= "<li class=''><a href=\"$link\"$target$active>$page_title</a>".make_menu ($row['page_id'],  $tree, $menu_level+1)."</li>\n";
			}
			else{
				$tree .= "<li class=''><a href=\"$link\"$target$active>$page_title</a>".make_menu ($row['page_id'],  $tree, $menu_level+1)."</li>\n";	
			}
		}
	}
	$tree .= "</ul>";
	return $tree;
}
?>
