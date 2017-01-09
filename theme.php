<?php //ی
if ( ! defined('KCMS_ON')) exit('No direct script access allowed');

if(!function_exists("install_theme_5")){
function install_theme_5()
{
	global $_, $_db, $lang;

}}

if(!function_exists("uninstall_theme_5")){
function uninstall_theme_5()
{
	global $_, $_db, $lang;

}}

if(!function_exists("config_theme_5")){
function config_theme_5()
{
	global $_, $_db, $lang;
	$_['theme_version'] = "3";
//	$_['jquery_version'] = "";
//	$_['bootstrap_version']='3';

	$_['jquery_version']='3.1.1';
	$_['bootstrap_version']='3.3.4';

	$_['float_basket'] = '';
	$_['ads'] = "";
	$_['breadcrumb']= "";
	$_['header_slide']= "";
	$_['footer_code']= "";
	if(!isset($_['basket_position']))
		$_['basket_position']= 0;
	$_['extra_code']= array(0=>"",1=>"",2=>"",3=>"",4=>"",5=>"",6=>"");
	$_['communication']="";
	if(!isset($_['social_position']))
		$_['social_position'] = 0;
	if(!isset($_['menu_2_arrow']))
		$_['menu_2_arrow'] = $_['menu_3_arrow'] = "caret";

}}

if(!function_exists("start_theme_5")){
function start_theme_5()
{
	global $_, $_db, $lang;


}}

if(!function_exists("end_theme_5")){
function end_theme_5()
{
	global $_, $_db, $lang;
//p($_['mini_mode']);


	make_all_menu();
	$_['path_array'][0]="<a href='$_[home_link]'><span class='fa fa-home'></span></a>";
	$breadcrumb_arrow = (isset($_['breadcrumb_arrow'])) ? "fa fa-".str_replace("{dir}","$lang[alignx]",$_['breadcrumb_arrow']):"fa fa-chevron-$lang[alignx]";
	$_['breadcrumb'] = implode(" <span class='nav-arrow $breadcrumb_arrow'></span> ", $_['path_array']);
	$_['outer_container'] = ($_['page_enable_frame']) ? "container":"not_container";
	$_['inner_container'] = ($_['page_enable_frame']) ? "not_container":"container";
	if(!$_['enable_responsive'])
		$_['site_classes'][]="unresponsive";


	$_['browser_support'] = "<div id='browser_support'>
شما از نسخه قدیمی این مرورگر استفاده میکنید. این نسخه دارای مشکلات امنیتی بسیاری است و نمی تواند تمامی ویژگی های این وبسایت و دیگر وبسایت ها را به خوبی نمایش دهد.
<br/>
<a href='https://browser-update.org/fa/update.html'><b>جهت دریافت اطلاعات بیشتر در زمینه به روز رسانی مرورگر اینجا کلیک کنید.</b></a>
</div>";

	if(isset($_['enable_google_analytics']) and $_['google_analytics_track_id'])
	{
		$_['javascript'] .="
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '$_[google_analytics_track_id]']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
";
	}

/*	if(!$_['mini_mode'])
	{
		return true;
	}*/
	$socials = array(
		"telegram" => "paper-plane",
		"instagram" => "instagram",
		"facebook" => "facebook",
		"google_plus" => "google-plus",
		"twitter" => "twitter",
		"youtube" => "youtube",
		"linkedin" => "linkedin",
		"rss" => "rss",
		"email" => "envelope"
	);

	$icons="";
	foreach($socials as $key => $value)
	{
		if(isset($_["$key"."_icon"]) and $_["$key"."_icon"])
			$icons .="<li><a target='_blank' href='".$_[$key."_icon"]."' class='icon-social icon-$key'><i class='fa fa-$value'></i></a></li>";
	}

	$_['social_icons'] = ($icons) ? "<ul class='social'>$icons</ul>":"";
	load_css('fontawesome');
	//load_javascript("jquery.migrate3.0.0");
	load_javascript("jquery.bootstrap".$_['bootstrap_version']);
	load_javascript("bootstrap.dialog");
	load_css("bootstrap.dialog");
	load_block('custom');


	//** SMOOTHSCROLL
	if(isset($_['enable_smoothscroll']) and $_['enable_smoothscroll'])
	{
		load_javascript("jquery.mousewheel");
		load_javascript("jquery.smoothscroll");
		add_code("jquery_code", <<<printext
$.srSmoothscroll();
printext
);
	}


	//** WOW
	if(isset($_['enable_wow']) and $_['enable_wow'])
	{
		load_css('animate');
		load_javascript("jquery.wow");
		add_code("jquery_code", <<<printext
new WOW().init();
printext
);
	}

	//** LIVE SEARCH
	if(isset($_['enable_live_search']) and $_['enable_live_search'])
	{

$nano = url('search');
add_code("jquery_code", <<<printext

var MIN_LENGTH = 2;
$(".live_search").after("<ul id='live_result'></ul>");
$(".live_search").keyup(function() {
	var keyword = $(".live_search").val();
	if (keyword.length >= MIN_LENGTH) {
 		$.ajax({
		   type: "get",
		   url: '$nano',
		   cache:true,
		   data: {q: keyword,ajax:1} ,
		  	success: function(data){
					$('#live_result').html('');
					var results = jQuery.parseJSON(data);
					$(results).each(function(key, value) {
						img = (value.image) ? "<img src='"+value.image+"' alt='' />":"";
						$('#live_result').append('<li><a href="'+ value.link +'">'+img+'<span>'+value.title +'</span></a></li>');
					})
					$('#live_result li a').click(function() {
						if($(this).attr('href') != '#'){
							loading(1);
							$('.live_search').val($(this).text());
						}
					})
		   }
		 });
	} else {
		$('#live_result').html('');
	}
});

$(".live_search").blur(function(){
	$("#live_result").fadeOut(500);
}).focus(function() {
	$("#live_result").show();
});

printext
);
	}


	//** GOTOP ICON
	if(isset($_['gotop_position']) and $_['gotop_position']!='0')
	{
		$_['jquery_code'] .= <<<printext

$("#gotop").click(function() {
	$("html,body").stop().animate({ scrollTop: "0" }, 1000);
});

var n = $(window).width();
$(window).scroll(function() {
	var t = 800 > n && $(window).scrollTop() + $(window).height() >= $(document).height() - 90;
	$(window).scrollTop() >= 600 && !t ? $("#gotop").fadeIn(500) : $("#gotop").fadeOut(500)
});

printext;
	}
	$_['gotop_icon'] = (isset($_['gotop_icon'])) ? "fa fa-$_[gotop_icon]":"fa fa-chevron-up";

	if(isset($_['enable_enamad']) and $_['enable_enamad']==1 AND isset($_['enamad_code']) AND $_['enamad_code'])
	{
		$side = (isset($_['enamad_position'])) ? $_['enamad_position']:'left';
		$_['under_code'] .="<div style=\"position:fixed;width:150px;height:150px;bottom: 20px;$side: -20px;\" class=\"enamad_box\">$_[enamad_code]</div>";//<iframe src=\"/eNamadLogo.htm\" frameborder=\"0\" scrolling=\"no\" allowtransparency=\"true\" style=\"width: 150px; height:150px;\"></iframe>1
	}




	if(isset($_['enable_hover_effect']) and $_['enable_hover_effect'])
	{
		load_css('hover');
	}




}}


if(!function_exists("add_widget"))
{
function add_widget($title ="",$text,$data=array())
{
	global $_, $_db, $lang;

	add_content(
				(isset($data['id'])) ? $data['id']:"",
				$title,
				"",
				$text
	);
}

}

?>