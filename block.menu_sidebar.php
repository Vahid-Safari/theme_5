<?php
if ( ! defined('KCMS_ON')) exit('No direct script access allowed');

$block_module_code = 1992;

function block_menu_sidebar($side='side_left')
{
	global $_, $_db, $lang;
	
	if(!isset($_['menu_3']))
		make_all_menu();
	
	if($_['sidebar_menu_type']=='advanced')
	{
		$tmp = explode("|",str_replace("align",$lang['alignx'], $_['menu_opener_style']));
		$menu_opener_style_open = $tmp[0];
		$menu_opener_style_close = $tmp[1];
		
		add_code("jquery_code", <<<printext

function oB(je,na){
	if(na)
	je.parent().find('ul:first').show();
	else
	{
		je.parent().find('ul:first').parents().each(function(){
			if($(this).is('ul'))
			$(this).css({height: 'auto'});
		});
		var el = je.parent().find('ul:first');
		height = el.stop(true).css({height: 'auto'}).show().height();
		el.hide().css({height: 0});
		el.show().animate({height: height}, {duration: 250});
	}
	je.parent().addClass('opened');
	je.parent().find('span.grower:first').addClass('open-menu fa-$menu_opener_style_close').removeClass('close-menu fa-$menu_opener_style_open');
}
function cB(je,na){
	je.parent().removeClass('opened');
	je.parent().find('span.grower:first').addClass('close-menu fa-$menu_opener_style_open').removeClass('open-menu fa-$menu_opener_style_close');
	if(na)
	je.parent().find('ul:first').hide();
	else
	{

		je.parent().find('ul:first').stop(true).css({height: 'auto'}).slideUp(250);
		je.parent().find('ul:first').parents().each(function(){
			if($(this).is('ul'))
			$(this).css({height: 'auto'});
		});
	}
}
function tB(je,na){
	if(je.parent().find('span.grower:first').hasClass('open-menu'))
	cB(je,na);
	else
	oB(je,na);
}
$('.sf-vertical.sf-arrows').addClass('dhtml');
if(!$('.sf-vertical.sf-arrows.dhtml').hasClass('dynamized')){
	$('.sf-vertical.sf-arrows.dhtml li ul').prev().before("<span class='grower fa open-menu'> </span>");
	$('.sf-vertical.sf-arrows.dhtml ul li:last-child, .sf-vertical.sf-arrows.dhtml li:last-child').addClass('last');
	$('.sf-vertical.sf-arrows.dhtml span.grower.open-menu').addClass('close-menu fa-$menu_opener_style_open').removeClass('open-menu').parent().find('ul:first').hide();
	var activeel = $('.sf-vertical.sf-arrows.dhtml .active');
	activeel.parents().each(function(){
		if(($(this).is('ul'))&&(!$(this).hasClass('dhtml')))
		oB($(this),true);
	});
	if(activeel.next().is('ul'))
	oB(activeel,true);
	$('.sf-vertical.sf-arrows.dhtml span.grower').click(function(event){
		tB($(this).parent().find('a:first'), false);
	});
	$('.sf-vertical.sf-arrows.dhtml').addClass('dynamized');
	$('.sf-vertical.sf-arrows.dhtml').removeClass('dhtml');
}
				
printext
);
	}
	
	if(isset($_['sidebar_menu_title']))
	{
		if(($_['sidebar_menu_title_link']))
		{
			$title = "<a href='".$_['sidebar_menu_title_link']."'>".stripinput($_['sidebar_menu_title'])."</a>";
		}
		else
		{
			$title = stripinput($_['sidebar_menu_title']);
		}
	}
	else
	{
		$title = "<a href=\"$_[home_link]\">$lang[home]</a>";
	}
	
  add_theme_box($side, "block", "box_block_menu", array(
		"title"=> $title,
		"text"=> $_['menu_3'],
	));
	
	if($_['sidebar_menu_type']=='dropdown')
	{
		load_javascript("jquery.superfish");
		$_["jquery_code"] .="$('.menu_3').superfish({autoArrows: true});";
		
		if($_['menu_3_arrow'] != 'none')
		{
			$_["jquery_code"] .="$('.menu_3 > li .sf-with-ul').append(\"<span class='sf-arrow fa fa-$_[menu_3_arrow]-$lang[alignx]'></span>\");";				
		}
		
		if($_['sidebar_menu_type']!='advanced' and isset($_['enable_responsive']) and $_['enable_responsive']  )
		{
			load_javascript("jquery.mobilemenu");
			$_["jquery_code"] .=<<<printext
$('.menu_3').mobileMenu({
	defaultText: '$lang[menu]...',
	className: 'select-menu',
	subMenuClass: 'sub-menu',
	subMenuDash: '&ndash; &ndash; &ndash; &ndash;'
});

printext;
		}
			
	}
	
	return true;
	
	$_['menu_arrow'] = "<span class='fa fa-chevron-$lang[alignx]'></span> ";
	$tree = make_menu_tree(0);
  $tree = str_replace("<li><ul></ul></li>","",$tree);
	$tree = str_replace("<ul></ul>","",$tree);
  if (!$tree)
		return true;
		
  add_theme_box($side, "block", "box_block_menu", array(
		"title"=> "<a href=\"$_[home_link]\">$lang[home]</a>",
		"text"=> $tree,
	));
}


function make_menu_tree($page_parent = 0,  $tree = "")
{
	global $_, $_db, $lang;
	$result = $_db->sql_query("SELECT * FROM ".PAGE_TABLE." WHERE page_site_id=$_[site_id] AND page_parent=$page_parent AND page_access<=".USER_LEVEL." ".((IS_MEMBER) ?  "AND page_access<>-1" : "")." ORDER BY page_order ASC");
	if ($_db->sql_numrows() == 0)
		return "";
	$tree =($page_parent != 0) ? "<ul>":(($_['sidebar_menu_type']=='advanced') ? "<ul class='sf-vertical sf-advanced' id='verticalmenu'>":"<ul class='sf-menu sf-js-enabled sf-shadow sf-vertical sf-simple' id='verticalmenu'>");
	while ($row = $_db->sql_fetchrow($result)) 
	{
		$show_link = sprintf("%'05s",decbin($row['page_view']));
		if($show_link[3]==1 )
		{
/*			if($row['page_module_code'] == SYSTEM_CODE and $row['page_title']!="")
			{
				$page_setting = get_setting($_['site_id'],$row['page_id'],SYSTEM_CODE, 'page_setting');
				$link =  $page_setting['link'];
				$target = ($page_setting['open_in_new_page'] == 1) ? " target='_blank'":"";
			}
			else
			{
				$link =  id_url($row['page_id']);
				$target = "";
			}*/
			$link = ($row['page_title']) ? ($row['page_module_code'] == SYSTEM_CODE) ? $row['page_link']:id_url($row['page_id']):url($row['page_slug']);
			$target = "";
			
			
      $page_title = stripinput(($row['page_menu_title']=="") ? (($row['page_title']=="") ? lang($row['page_slug']): $row['page_title']):$row['page_menu_title']);
			$active = ( $row['page_id'] == $_['page_id']) ? " class='active'":"";
			$tree .= "<li><a href=\"$link\"$target$active>$_[menu_arrow]$page_title</a>".make_menu_tree ($row['page_id'],  $tree)."</li>\n";
		}
	}
	$tree .= "</ul>";
	return  ($tree == "<ul></ul>") ? "":$tree;
}

/*
function _make_menu_tree($page_parent = 0,  $tree = array())
{
	global $_, $_db, $lang;
	$result = $_db->sql_query("SELECT * FROM ".PAGE_TABLE." WHERE page_site_id=$_[site_id] AND page_parent=$page_parent AND page_access<=".USER_LEVEL." ".((IS_MEMBER) ?  "AND page_access<>-1" : "")." ORDER BY page_order ASC");
	if (!$_db->sql_numrows())
		return "";
	$tree[1] = $tree[2] = $tree[3] = $tree[4] = "<ul>"; //($page_parent != 0) ? "<ul>":(($_['sidebar_menu_type']=='advanced') ? "<ul class='sf-vertical sf-advanced' id='verticalmenu'>":"<ul class='sf-menu sf-js-enabled sf-shadow sf-vertical sf-simple' id='verticalmenu'>");
	while ($row = $_db->sql_fetchrow($result)) 
	{
		$show_link = sprintf("%'05s",decbin($row['page_view']));
		if($show_link > 1)
		{
			for($i=1;$i<=4;$i++)
			{
				if($show_link[$i])
					$tree[$i] .= "<li><a href='".(($row['page_title']) ? ($row['page_module_code'] == SYSTEM_CODE) ? $row['page_link']:id_url($row['page_id']):url($row['page_slug'])).(( $row['page_id'] == $_['page_id']) ? " class='active'":"").">$_[menu_arrow]".(stripinput(($row['page_menu_title']=="") ? (($row['page_title']=="") ? lang($row['page_slug']): $row['page_title']):$row['page_menu_title']))."</a>"._make_menu_tree ($row['page_id'],  $tree)."</li>\n";
			}
			
		}
		p($show_link);
	}
	$tree[1] = $tree[2] = $tree[3] = $tree[4] .= "</ul>";
	return  ($tree == "<ul></ul>") ? "":$tree;
}
*/
?>