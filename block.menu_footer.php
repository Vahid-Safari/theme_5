<?php
if ( ! defined('KCMS_ON')) exit('No direct script access allowed');

$block_module_code = 1992;

function block_menu_footer($side='side_right')
{
	global $_, $_db, $lang;
	if(!isset($_['menu_4']))
		make_all_menu();
}

?>