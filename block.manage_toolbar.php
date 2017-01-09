<?php
if ( ! defined('KCMS_ON')) exit('No direct script access allowed');


$block_module_code = 1992;

function block_manage_toolbar($side='side_right')
{
	global $_, $_db, $lang;

	if(!IS_MEMBER)
		return true; 
	$user_menu = "";
	$modules_num = 1;
	$extra = "";
	$manage_extra = array();
	$extras = 0;
	
	if(isset($_['extra']))
		foreach($_['extra'] as $par)
			if($par[4])
			{
				$par[2] = str_replace("icon-","",$par[2]);
				$option = make_option($par[0],$par[1],$par[2],$par[3],$par[4]);
				$extra .= "<li>$option</li>";
				$manage_extra[]= $option;
				$extras++;
			}
	$extra_menu = "";
$manage_toolbar = get_cache("manage_toolbarfa" , SITE_ID, USER_LEVEL);

if(!$manage_toolbar)
{
	$admin_mode =  $_['admin_mode'];
	$_['admin_mode'] = true;
	$menu = "";

	if(IS_EDITOR)
	{
		$pages = "";
		$settings = "";
		$settings .= "<li>".make_option(url('setting','home'), lang('home_setting'), "home", true, IS_EDITOR)."</li>";
		
		$add = $manage = "";
		$_['add'] = $_['manage'] = array();//$_['extra'] =
		$result = $_db->sql_query("SELECT * FROM " . MODULE_TABLE . " LEFT JOIN " . SITEMODULE_TABLE . " ON (sm_module_code = module_code) WHERE sm_site_id IN(0,$_[site_id])  ORDER BY module_order ASC ");
		while ($row = $_db->sql_fetchrow($result))
		{
				if($row['module_page']== 1 AND $row['module_page_access']<=USER_LEVEL)
				{
					$title = (isset($lang["page_".$row['module_code']])) ? $lang["page_".$row['module_code']]: lang($row['module_name']);
					
					$pages .= "<li>".make_option(url('page_manage','',"new=".$row['module_code']), $title, "$row[module_icon]", true, $row['module_page_access'])."</li>";
				}
				//p("$pages");
				if($row['module_setting']== 1 AND $row['module_setting_access']<=USER_LEVEL)
					$settings .= "<li>".make_option(url('setting',$row['module_name']), lang($row['module_name'].'_setting'), "$row[module_icon]", true, $row['module_setting_access'])."</li>";
			
			$_['options'] =array();
			
			$module_name = $row['module_name'];
			if(module_init($module_name))//!isset($_['inited'][$module_name])
			{
				//p("+ $module_name");
				//module_init($module_name);
				$options = "";
				foreach($_['options'] as $par)
					if($par[4])
						$options .= "<li>".make_option($par[0],$par[1],$par[2],$par[3],$par[4])."</li>";
				
				if ($options != "")
				{
					$modules_num++;
					$current = "";
					$menu .="<span class='btn-group $lang[align]'><a class='btn dropdown-toggle' data-toggle='dropdown' href='#'>".lang("module_$row[module_code]")." <span class='caret'></span></a><ul id='module_$row[module_code]' class='dropdown-menu'>$options</ul></span>";
				}
				
				if(isset($_['add']))
					foreach($_['add'] as $par)
						if($par[4])
						{$par[2] = str_replace("icon-","",$par[2]);
							//p($par[2]);
							$add .= "<li>".make_option($par[0],$par[1],$par[2],$par[3],$par[4])."</li>";
						}
				
				$have_item = false;
				if(isset($_['manage']) and count($_['manage']))
					foreach($_['manage'] as $par)
						if($par[4])
						{
							$par[2] = str_replace("icon-","",$par[2]);
							$have_item = true;
							$manage .= "<li>".make_option($par[0],$par[1],$par[2],$par[3],$par[4])."</li>";
						}
					
				if($have_item)
				{
					$manage .= "<li class='divider'></li>";
					//$manage = "<li class='dropdown-header'>".lang($module_name)."</li>$manage<li class='divider'></li>";
				}
				$_['add'] = $_['manage'] = array();
			}
		}
	//p($settings);
		unset($_['options']);


		if($add)
			$menu .="<li class='dropdown' id='menu-entries'><a href='#' data-toggle='dropdown' data-target='#menu-entries' ><i class='fa fa-plus'></i> <span class='text hidden-sm'>$lang[add_item]</span>  <b class='caret'></b></a><ul id='new_entries' class='dropdown-menu'>$add</ul></li>";
		
		if($pages)
			$menu .="<li class='dropdown' id='menu-pages'><a href='#' data-toggle='dropdown' data-target='#menu-pages' ><i class='fa fa-plus-circle'></i> <span class='text hidden-sm'>$lang[add_page]</span>  <b class='caret'></b></a><ul id='new_pages' class='dropdown-menu'>$pages</ul></li>";
					
		if($manage)
			$menu .="<li class='dropdown' id='menu-manage'><a href='#' data-toggle='dropdown' data-target='#menu-manage' ><i class='fa fa-edit'></i> <span class='text hidden-sm'>$lang[manage]</span>  <b class='caret'></b></a><ul id='manage_entries' class='dropdown-menu'>$manage</ul></li>";
					
		if($settings)
			$menu .="<li class='dropdown' id='menu-settings'><a href='#' data-toggle='dropdown' data-target='#menu-settings' ><i class='fa fa-wrench'></i> <span class='text hidden-sm'>$lang[site_setting]</span>  <b class='caret'></b></a><ul id='settings' class='dropdown-menu'>$settings</ul></li>";

		
							// pull-$lang[alignx]
		$user_menu ="
	<ul class='nav navbar-nav navbar-$lang[alignx]'>
		{upgrade}
		<li class='dropdown' id='menu-user'><a href='#'  data-toggle='dropdown'><i class='fa fa-user'></i> <span class='text hidden-sm'>$lang[user] ({user_nickname})</span>  <b class='caret'></b></a>
			<ul id='module_user' class='dropdown-menu'>
				<li ><a href='".url('desktop')."'><i class='fa fa-home'></i> $lang[desktop]</a></li>
				<li><a href='".url('profile')."'><i class='fa fa-user'></i> $lang[profile]</a></li>
				<li><a ".((IS_ROOT)? "":"target='_blank'")." href='".murl('help')."'><i class='fa fa-question-sign'></i> راهنما</a></li>
				<li><a ".((IS_ROOT)? "":"target='_blank'")." href='".murl('support')."'><i class='fa fa-question-sign'></i> پشتیبانی</a></li>
				<li><a href='".url('signout')."'><i class='fa fa-off'></i> $lang[signout]</a></li>
			</ul>
		</li>
		{config}

	</ul>";

	}// $lang[dir]

	$_['manage_toolbar'] = "
<div class='navbar navbar-default navbar-fixed-top'>
	<div class='container'>
        <div class='navbar-header'>
          <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
          </button>
         <!--<a class='navbar-brand navbar-$_[project_name]' title='SmartTry $_[version]'></a>-->
        </div>
        <div class='navbar-collapse collapse'>
          <ul class='nav navbar-nav'>
         		<!--<li><a href='".url()."' title='$lang[home]' ><span class='fa fa-home'></span> <span class='text hidden-sm'>$lang[home]</span></a></li>
         		<li class='toolbar_desktop'><a href='".url('desktop')."' title='$lang[desktop]' ><span class='fa fa-desktop'></span> <span class='text hidden-sm'>$lang[desktop]</span></a></li>-->
            $menu
            {extra}
          </ul>
          $user_menu
        </div>
      </div>
    </div>
";
	//$_['manage_toolbar'] = str_replace("'icon-","'glyphicon glyphicon-",$_['manage_toolbar']);
	//$_['manage_toolbar'] = str_replace("glyphicon","fa",$_['manage_toolbar']);
	$_['manage_toolbar'] = str_replace("<i ","<span ",$_['manage_toolbar']);
	$_['manage_toolbar'] = str_replace("</i>","</span>",$_['manage_toolbar']);
	if($extra)
	{
		//$extra = str_replace("glyphicon","fa",$extra);
		//$extra = str_replace("'icon-","'glyphicon glyphicon-",$extra);
		$extra = str_replace("<i ","<span ",$extra);
		$extra = str_replace("</i>","</span>",$extra);
/*		if($_['admin_mode'])
		{
			$_['manage_extra'] = str_replace("<a","<a class='btn btn-success btn-lg'",$extra);
			$_['manage_extra'] = str_replace("<li>","",$_['manage_extra']);
			$_['manage_extra'] = str_replace("</li>","",$_['manage_extra']);
			$extra ="";
		}*/
		
	}


	set_cache("manage_toolbarfa" , $_['manage_toolbar'], YEAR, SITE_ID, USER_LEVEL);
	$_['admin_mode'] = $admin_mode;
}
else
{
	$_['manage_toolbar'] = $manage_toolbar;
}

	$upgrade = ($_['site_plan']<3 and IS_EDITOR)?"<li class='toolbar_upgrade' style='background:red;'><a data-toggle='tooltip' data-placement='bottom' title='فروشگاه خود را مستقل و قدرتمند کنید' href='".surl('fa',"account/upgrade?site_id=$_[site_id]")."' target='_blank' style='color:#fff;' ><i class='fa fa-fire fa-white'></i> ارتقاء</a></li>":"";

	$_['manage_toolbar'] = str_replace('{user_nickname}',"$_[user_nickname]",$_['manage_toolbar']);
	if($extra)
			$extra ="<li class='dropdown' id='menu-extra'><a href='#' data-toggle='dropdown' data-target='#menu-extra' ><i class='fa fa-asterisk'></i> <span class='text hidden-sm'>دسترسی سریع <span class='label label-success' style='float: none;margin: auto;'>$extras</span></span>  <b class='caret'></b></a><ul id='extra' class='dropdown-menu'>$extra</ul></li>";
			//$extra ="<li class='dropdown' id='menu-extra'><a href='#' data-toggle='dropdown' data-target='#menu-extra' ><i class='fa fa-asterisk icon-white'></i> <span style='color: #fff;text-shadow: 0 1px 0 #000;' class='text hidden-sm'>دسترسی سریع</span>  <b class='caret'></b></a><ul id='extra' class='dropdown-menu'>$extra</ul></li>";
	
	$_['manage_toolbar'] = str_replace('{extra}',"$extra",$_['manage_toolbar']);
	//$_['manage_toolbar'] = str_replace('{extra_menu}',"$extra_menu",$_['manage_toolbar']);
	$_['manage_toolbar'] = str_replace('{upgrade}',"$upgrade",$_['manage_toolbar']);
	$_['site_classes'][]= "toolbar_on"; 
	$config = "";
	if($_['site_recache'] == 1 )//AND $_['site_plan'] > 3
	{
		$config .= "<li class=' hidden-sm site-recache recache-red'><a title='$lang[update] Cache' href='".url("nano","recache")."'><i class=' fa fa-refresh'></i></a></li>";//<sup class='sup-label sup-recache'></sup>
$_['jquery_code'] .= <<<printext

$('.site-recache a').on('click', function(event) {
	if($(this).hasClass('disabled'))
	return false;
	event.preventDefault();
	$('.site-recache a i').addClass('fa-spin');
	$.post($(this).attr('href'), function(data, status){
		$('.site-recache').removeClass('recache-red').addClass('recache-green').find('a').addClass('disabled').removeAttr('href').find('i').removeClass('fa-refresh fa-spin').addClass('fa-check');
	});
});

printext;

	}
	
	if((IS_ADMINISTRATOR or (IS_EDITOR and $_['access_config_theme'])) and !$_['admin_mode'] )
	{
		if(IS_DEVELOPER)
		{
			$config .= "<li class='site-retheme hidden-xs'><a id='refresh_theme' href='".url("theme_manage","reload","mini")."'><i class='fa fa-refresh'></i></a></li>";
	$link = url("theme_manage","","reload");
	$_['jquery_code'] .= <<<printext
$('.site-retheme a').on('click', function() {
	loading(1);
	$('.site-retheme a i').addClass('fa-spin');
	$.ajax({
		type: "post",
		url: '$link',
		data: {reload_theme:'$_[site_theme]'} ,
		success: function(data){
			eval(data);
			$('.site-retheme a i').removeClass('fa-spin');
			loading(0);
		}
	});
	return false;
});


Mousetrap.bind(['command+f6', 'ctrl+f6'], function(e) {
 	$('.site-retheme a').trigger('click');
    return false;
});

printext;
	
		}
		$config .= "
		<li class='dropdown hidden-xs' id='menu-theme'><a data-toggle='dropdown' class='open_config' href='".url("theme_manage","config")."'><i class='fa fa-leaf'></i> <span class='text hidden-sm '>طرح</span>  <b class='caret'></b></a>
			<div class='dropdown-menu pull-$lang[alignx]' id='edit_config_theme' style='padding:0;border-top:0;border-radius:0'> 
			</div>
		</li>
";

	load_javascript("jquery.manage");
		//load_function("theme");
		//"<iframe src='".url("theme_manage","config","mini=1")."' frameborder='0' scrolling='yes' allowtransparency='true' style='width: 780px; height:620px;'></iframe>"
		$_['jquery_code'] .= <<<printext
var config_loaded = false;
var js_url = '$_[root_url]global/js/';

$('.open_config').click(function() {
	if(config_loaded)
		return true;
	var width = 800;
	var height = $(window).height()-50;
	$('#edit_config_theme').html("<div id='config_area' style='display:block;'><iframe id='config_frame' src='"+$(this).attr('href')+"?mini=1' frameborder='0' scrolling='yes' allowtransparency='true' style='width: "+(width-5)+"px; height:"+(height-10)+"px;'></iframe></div></div>");//
	config_loaded = true;
	//return false;
});
$(window).resize(function () {
	height = $(window).height()-50;
	//$('#config_area').height(height);
	$('#config_frame').height(height-10);
});

$('#edit_config_theme').click(function(e) {
	e.stopPropagation();
});

printext;

$_['css'] .= "#edit_config_theme{width: 800px;padding-right: 0px;overflow-x: hidden;position: fixed;left: 0px;right:auto;bottom: 0px;top: 50px}";

		
	}

	$_['manage_toolbar'] = str_replace('{config}',"$config",$_['manage_toolbar']);
	
	load_javascript("jquery.bootstrap".$_['bootstrap_version']);
	unset($_['add'],$_['manage'],$_['extra']);
	//p($_,1);
}



?>