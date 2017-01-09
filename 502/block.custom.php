<?php
$block_module_code = 1995;

function block_custom()
{
	global $_, $_db, $lang;

//////////////   popup btn-quick-view  ///////
load_javascript("jquery.colorbox");
$_['jquery_code'].= "
   $('.product-quick-view').colorbox({width:'80%', height:'80%',iframe:true,opacity:0.5,overlayClose:true,current:'{current} از {total}'});
";

/***************  login ********************/	
	$_['loginout']="";
	if (!IS_MEMBER)
	{
		load_javascript("jquery.bootstrap".$_['bootstrap_version']);
		$loginout="
		  <span class='key'><a href='".url('signin')."' title='test'>ورود</a> / </span>			
		  <span class='user_1'><a href='".url('signup')."' title='test' >ثبت نام</a></span>		
	  ";
	}
	else
	{
		$loginout ="
			<span class='user' ><a href='".url('profile')."' class='profile-button' >پروفايل</a> / </span>
			<span class='lock'><a href='".url('signout')."'>خروج</a></span>
		 ";
	}	
	$_['extra_code'][1] ="<div class='login_top'>".$loginout."</div>";	

//////////////////////// left slider
$left_slider="";
for($i=1;$i<=2;$i++)
{
	if($_['slider_left_img_'.$i])
	{
		$left_slider .="
		 <div class='left_slider_$i'>
		   <a href='".$_['slider_left_link_'.$i]."' title='test'>
		    <img src='".$_['slider_left_img_'.$i]."' alt='test'>
       </a>
		 </div>
		";
	}
}
	$_['extra_code'][2]="<div class='left_slider_box clearfix'>$left_slider</div>";  

	if($_['task']=='home')
	{	
		$_['side_left'] = $_['side_right'];
		$_['side_right'] = "";	
	}
	
/////////////////  footer
$_['extra_code'][4] .= "	
<div class='row'>	
 <div class='footer_custom_bottom clearfix'>
	  <div class='footer-boxes col-lg-4 col-md-4 col-sm-6 col-xs-12'>
			$_[menu_4]
    </div>
  
	  <div class='footer-boxes col-lg-4 col-md-4 col-sm-6 col-xs-12'>
	   $_[footer_custom_code]
	  </div>	
	  
	  <div class='footer-boxes col-lg-4 col-md-4 col-sm-6 col-xs-12'>
	  
	  </div>	    
  </div>
 </div>	  
  ";
  
$_['menu_4'] =""; 	  

/************* owl product.tpl  ************************/
	if(isset($_['other_product']))
	{
		load_javascript('jquery.owlcarousel2');
		load_css('jquery.owlcarousel2');
		add_code("jquery_code", <<<printext
$('.home_products.product_owl_home,.product_thumbs').owlCarousel({
	  loop:true,
	  items:3,
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
	        items:3
	    }
	   }
});
	
printext
);
	
	}
	
////////////////////// fix menu
add_code("jquery_code", <<<printext

$(".icon-print").click( function(){
	window.print();
});

printext
);		


}

?>