<?php //ی
if ( ! defined('KCMS_ON')) exit('No direct script access allowed');

$block_module_code = 1992;

function block_menu_header($side='side_right')
{
	global $_, $_db, $lang;
	if(!isset($_['menu_2']))
		make_all_menu();
	load_javascript("jquery.superfish");

	if(!isset($_['main_menu_effect']))
		$_['main_menu_effect'] = "fade";
	$_["jquery_code"] .= "
$('.menu_2').superfish({
	autoArrows    : true,
	delay: 1000,
	animation: {
		opacity: 'show'".($_['main_menu_effect']=='dropdown' ? ",	height: 'show'":"").
	"},
	speed: 'slow',
	onShow: function(){
		$(this).css('overflow', 'visible');
	}
});

";
				//disableHI: true ,	
	if($_['menu_2_arrow'] != 'none'){
		$_["jquery_code"] .= "
$('.menu_2 > li > .sf-with-ul').append(\"<span class='sf-arrow fa fa-$_[menu_2_arrow]-down'></span>\");
$('.menu_2 li li .sf-with-ul').append(\"<span class='sf-arrow fa fa-$_[menu_2_arrow]-left'></span>\");

";	
	}
	//$(".sf-menu").superfish({pathClass:'current',autoArrows:true,animation:{opacity:'show',height:'show'},speed:'normal',delay:500});
	if(isset($_['enable_responsive']) and $_['enable_responsive'])
	{
		load_javascript("jquery.mobilemenu");
		$_["jquery_code"] .= <<<printext
$('.menu_2').mobileMenu({
	defaultText: '$lang[menu]...',
	className: 'select-menu',
	subMenuClass: 'sub-menu',
	subMenuDash: '&ndash; &ndash; &ndash; &ndash;'
});

printext;
	}
}




?>