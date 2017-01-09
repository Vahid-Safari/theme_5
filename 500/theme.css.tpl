/*ی*/

@green = #8ec44e;
@green2 = #7dc855;

{include="css/font.less"}
{include="css/global.less"}
{include="css/body.less"}
header{
	background:#fff;
	min-height:120px;
	>div{
		padding-top: 16px;
		padding-bottom: 16px;
	}
	.page_home &{
		min-height:90px;
	}
}

.home_silder{
	background:#f3f7fa;
	height:550px;
	overflow: hidden;
}


.home_4boxes{
	background:#f9fafc;
	padding:40px 0 45px;
}
.boxes4{
	h3{
		font:bold 18px/30px Font1, Arial;
		color:#222025;
		text-align:right;
	}
	span{
		font:normal 11px/20px Font1, Arial;
		color:#7f7f7f;
		text-align:right;
	}
	.box4_icon{
		float:left;
		background: transparent no-repeat center ;
		margin:20px;
		padding:20px;
		background-size: cover;
/*    width: 40px;
    height: 40px;*/
    &.box4_icon_1{background-image:url({$box4_icon_1});}
    &.box4_icon_2{background-image:url({$box4_icon_2});}
    &.box4_icon_3{background-image:url({$box4_icon_3});}
    &.box4_icon_4{background-image:url({$box4_icon_4});}
	}
}


.home_3boxes{
	background:#ffffff;
	height:470px;
	padding:70px 0 ;
}

.col-3box{
	position: relative;
	.text-content {
    background: @green;
    color: white;
    cursor: pointer;
    display: table;
    height: 100%;
    left: 15px;
    position: absolute;
    top: 0;
    opacity: 0;
    right: 15px;
    bottom: 0;
    vertical-align: middle;
    transition: opacity 100ms;
    height: 291px;
    border-radius: 5px;
    width: 90%;
	}

	&.col-3box-2 .text-content{
		width: 95%;
	}
	.text-content div {
		display: table-cell;
		text-align: center;
		vertical-align: middle;
	}

	a{
		display:block;
		height:291px;
		img{
			width:100%;
			height:291px;
		}
		&:hover .text-content {
			opacity: 0.9;
		}
	}
}

.home_topsales{
	background:#f9fafc;
/*	height:765px;*/
	padding:60px 0 45px;
}

.topsales{
	.topsale{
		text-align:center;
		.product_image{
			overflow:hidden;
			padding: 10px;
			img{
				width:100%;
				background:#d8d8d8;
				box-shadow:0 0 4px 0 rgba(0,0,0,0.50), 0 0 21px 0 rgba(0,0,0,0.50);
				border-radius:6px;
				opacity: 0.5;
			}
		}
			.btn{
				margin-top:0;
				margin-bottom:30px;
				padding-right:30px;
				padding-left:30px;
				opacity:0;
			}
		&:hover{
			.btn{
				margin-top:30px;
				margin-bottom:0;

				opacity:1;
				}
		}

	}
	.owl-item.active .product_image img{
		opacity:1;
	}
}

.home_bookslist{
	background:#ffffff;
	/*height:765px;*/
	padding:70px 0 ;
	.box_bookslist_title{
		border-bottom:2px solid #e6eaed;
		padding: 0 0 40px;
		margin: 0 0 20px;
		h3{
			font:bold 25px/40px Font1, Arial;
			color:#2e2c33;
			float: right;
			&::after{
				content: "";
				border-bottom: solid 2px @green2;
				clear: both;
				display: block;
				padding-bottom: 15px;
				width: 120px;
				margin: 0 20px -42px;
			}
		}
		ul{
			float:left;
			    margin: 10px 0 -17px 0;
			li{
				display:inline-block;
				a{
					font: bold 18px/20px Font1, Arial;
					color: #857d91;
					text-align: center;
					padding: 20px 20px;
					&:hover,&.active{
						color:#2e2c33;
						border-bottom: solid 2px  @green2;
					/*	&::after{
							content: "";
							border-bottom: solid 2px @green2;
							clear: both;
							display: block;
							padding-bottom: 15px;
							width: 120px;
							margin: 0 20px -42px;
						}*/
					}
				}
			}
		}
	}
}


.home_timer{
	background:#f9fafc;
	height:560px;
	padding:65px 0 ;
}



.footer_articles{
	background:#ffffff;
	/*height:560px;*/
	padding:65px 0 ;
}

.box_title{
	font:bold 40px/40px Font1, Arial;
	color:#2e2c33;
	text-align:center;
&::after{
    content: "";
    border-bottom: solid 2px @green2;
    clear: both;
    display: block;
    padding-bottom: 35px;
    width: 150px;
    margin: 0 auto 70px;

	}
}

/*{_include="css/btn.less"}*/

.btn-custom {
	filter: none;
	outline: 0!important;
	text-shadow: none;
	font-family:Font1,Arial;
	background:@green;
	color:#fff;
	&:hover{

	}
	&:active, &.active, &.disabled, &[disabled], &:focus {


	}
}

.btn-lg{font-family:Font1,Arial;}
/*{_include="css/search.less"}*/
.search_area{
	float: none;
	width: 100%;
	position:relative;
	border-bottom:2px solid #dcdfe1;

	.search-box{
		border: none;
		width: 400px;
		padding: 10px;
		font-size: 16px;
		outline: none;
	}
	.btn-search	{
		float: left;
		background: transparent url(img/search.svg) no-repeat center;
		background-size: cover;
		border: none;
		margin: 8px;
		padding: 12px;
		outline: none;
	}
	.search_line{
		border-bottom:2px solid #94d274;
		margin:0 80px -2px;

	}
	&.active{
		.btn-search	{
			margin: 5px;
			padding: 15px;
		}
		.search_line{
			margin:0 0 -2px;
		}
	}
}

#live_result{
	display: none;
    width: 100%;
    position: absolute;
    top: 44px;
    background-color: @green;
    z-index: 110;
    /* box-shadow: 1px 1px 3px 0px rgba(157,159,161,0.7); */
    max-height: 300px;
    /* overflow-y: scroll; */

	li a {
		display: block;
		padding: 5px 10px;
		line-height:30px;
		border-bottom: 1px solid darken(@green, 3%);
		color: #fff;
		img{
    max-height: 30px;
    margin-right: 5px;
    float: left;
		}
		&:hover {
			/*color: #fff;*/
			cursor: pointer;
			 background-color:darken(@green, 3%);

		}
/*		&:last-child {
			border-bottom: 0px;
		}*/
	}
}


/*{_include="css/header.less"}*/

.header_logo{
	background:transparent url(img/logo.png) no-repeat center;
	width:210px;
	height:50px;
	display:block;
	float:left;
	h1,h2{
		display:none;
	}
}
.hamburger_menu{
	background:transparent url(img/bars.svg) no-repeat center;
	width:50px;
	height:50px;
	display:block;
	float:left;
}
/*{_include="css/slider.less"}*/
{include="css/menu.less"}

.slider_menu{
	float:right;
	width:300px;
	background:#ffffff;
	border:1px solid #dde0e3;
	border-radius:6px;
	margin-top:60px;

}
.slider_menu_header, #box_block_menu .block_header h3{
	background:@green;
	border:1px solid #dde0e3;
	border-radius:6px 6px 0 0;
	color:#fff;
	font:bold 20px/60px Font1;
	text-align:center;
	a{
		color:#fff;
	}
}
.slider_menu_body,#box_block_menu .block_body{
	background:#fff;
	border:1px solid #dde0e3;
	border-radius:0 0 6px 6px ;
	font:normal 20px/60px Font1;
}


.sf-vertical li:first-child a  {
	border-top:0;

}
.sf-vertical .sf-arrow {
    left: 15px;
    font-size: 0.8em;
    line-height: 1.7em;
    color: @green;
}

{include="css/block.less"}
{include="css/breadcrumb.less"}
{include="css/footer.less"}

footer{
	background:#ffffff;
	.footer_top{
		padding:50px 0;
	}
	.footer_bottom{
		border-top:solid 1px #c1c1c1;
		padding:50px 0;
	}
}
.footer_boxes{
	h3{
		font:bold 18px/25px Font1, Arial;
		color:#43484d;
		line-height:25px;
		text-align:right;
		margin-bottom: 30px;
	}
}


.footer_menu{
	ul{
		margin:0 !important;
		text-align:right  !important;
		li{
			display: inherit !important;
			a{
				display: block;
				font:normal 16px/40px Font1, Arial;
				color:#86939e;
				text-align:right;
				/*margin-top: 15px;*/
				&:hover{
					color:#43484d;
				}
			}
		}
	}
}
.social{
   text-align: right;
  margin-top: 10px;
	{$social_style[css]}
	li{
		display: inline-block;
		a{
			display: block;
			width: {$social_item_size}px;
			font-size: {$social_item_size}px;
			box-sizing: content-box;
			line-height: 1;
			text-align: center;
			&.icon-social{
				{$social_item_style[css]}
				&:hover{
					opacity: 0.7;
					{$social_item_hover_style[css]}
				}
			}

		}
	}
}

/*
Footer style
Footer inner style
 */
footer{
	#copyright{float: {$xalign};}
}

/*{_include="css/social.less"}*/

{include="css/thumb.less"}
{include="css/datetime.less"}
{include="css/content.less"}
{include="css/comment.less"}

{if="$gotop_position!='0'"}{include="css/gotop.less"}{/if}
{if="$module_content"}
/*{_include="css/article.less"}*/

.contents_list{}
.content_thumb{
	background:#ffffff;
	box-shadow:0 0 40px 0 rgba(0,0,0,0.05), 1px 2px 3px 0 rgba(0,0,0,0.10);
	border-radius:6px;
	overflow: hidden;
	display:block;
	margin-bottom:30px;
	._owl-item &{
		margin:15px;
	}
	img{
		width:100%;
		height:auto;
		border-radius:6px 6px 0 0;
	}
	.content_info{
		display:block;
		background:#f8fbff;
		text-align:center;
		overflow: hidden;
    height: 45px;
		li{
			font:normal 15px/25px Font1, Arial;
			color:#524d59;
	    text-align: center;
	    display: inline-block;
	    margin: 10px 0;
			padding: 0 6px 0 8px;
	    border-left:2px solid #ededed;
			.content_date{
				color:@green;
			}
			&:last-child{
				 border-left:none;
				}
		}
	}
	.content_excerpt{
		display:block;
		padding: 20px;
		a h3{
			font:bold 20px/40px Font1, Arial;
			color:#2e2c33;
			text-align:right;
		}
		p{
			font:normal 16px/32px Font1, Arial;
			color:#7f7f7f;
			text-align:right;
	    height: 96px;
	    margin: 0;
	    overflow:hidden;
		}
	}

}

{/if}
{if="$module_forum"}{include="css/forum.less"}{/if}
{if="$module_classifieds"}{include="css/classifieds.less"}{/if}
{if="$module_gallery"}{include="css/gallery.less"}{/if}
{if="$module_media"}{include="css/media.less"}{/if}
{if="$module_links"}{include="css/links.less"}{/if}
/* {if="$module_product || $module_shop"}{_include="css/product.less"}{/if} */



@nav_color = @green;
{include="css/basket.less"}


.product_thumb{
	.thumb_body{
		margin: 10px -7px;
	}
	.product_thumb_image{
		display:block;
		img {
			background:#d8d8d8;
			border-radius:6px;
			    width: 100%;
		}
	}
	.product_details{
    height: 85px;
    overflow: hidden;
    margin: 10px 0 0px
	}
	.product_title h3{
		font:normal 18px/25px Font1, Arial;
		/*height:40px;*/
		color:#2e2c33;
		text-align:right;
		display: block;
	}

	.product_thumb_subtitle{
		font:normal 14px/20px Font1, Arial;
		/*height:42px;*/
		color:#7f7f7f;
	}

.product_rate{
	height:28px;
	margin: 10px 0;
	.rate {
	  direction: ltr;
	  text-align: right;
	  cursor: pointer;
	      float: right;
	  .rating-container .rating-stars{
	  	color:@green2;
	  }
	  .rating-gly-star{
	  		font-size: 13px;
	  }
	}
}
}




/* Basket */
#basketbox {
	width: auto;
	float: right;
	position: relative;
	cursor: pointer;
	{$basket_style[css]}
	.basket-icon{
		background: transparent url(img/basket.png) no-repeat center;
		width:40px;
		height:40px;
		display:block;
		float:right;
		position:relative;
		#basket_items{
			position:absolute;
background:#7dc855;
border:2px solid #ffffff;
width:26px;
height:26px;
border-radius:100%;
color:#fff;
    text-align: center;
    line-height: 26px;
    top: -1px;
    right: -2px;
		}
	}
	.basket-title{
		padding-right:10px;
		display:inline-block;
		font:normal 21px/40px Font1, Arial;
		color:#595959;
	}


	#basket_info{
		.glyphicon{
			top: 4px;
		}
		#basket_items_box{
			display: block;
			float: left;

			span.glyphicon{
			}
		}
		>span.glyphicon{
		}
	}
	#floatbasket{
		display: none;
		position: absolute;
		z-index: 101;
		right: 0px;
		cursor: auto;
		width: 300px;
		top: 100%;
		{$basket_dropdown_style[css]}
	}
}

#basket{

	#basket_free{
		text-align: center;
	}
	>ul{
		 li{
		 	position:relative;
		 	{$float_list_style[css]}
		 		padding: 5px ;
		 	.delete-item-box{
		 		position:absolute;
		 		top:5px;
		 		left:5px;
		 		display:none;
				padding: 0px 1px;
					font-size: 12px;
					line-height: 1;
		 	}
		 	.basket_item_right{
		 		padding: 0;
		 		max-width:100px;
		 	}
		 	.basket_item_left{
		 		padding: 0 10px;
		 		text-align: right;
		 		span{
		 			display: block;
		 			font-weight: bold;
		 		}
		 	}
			&:hover .delete-item-box{
				display:block;
			}
		 }
	}
	.icon-remove{
	}
	#checkout{
		font: bold 11px/22px Font1;
		text-align: center;
		.sum_basket_title{
			text-align: center;
			font: bold 15px/40px Font1;
		}
		#checkout_link{
			i{
				top: 3px;
				margin-left: 5px;
				font-size: 13px;
				font-weight: normal;
			}
		}
	}
}
#basket_box{

.block_body{
	padding: 10px 0;
	#basket{
		#checkout{
			text-align: center;
			#checkout_link{
				display: block;
				width: 90px;
				margin: 10px auto 0;
			}
		}
	}
}}

.product_down_side{
	clear:both;
}

/* Product Page  */
.product_accessories h3{padding: 10px 0px;}
.product_accessories .thumb_body h3{padding-bottom:0px;}

/* Product   */

.pdiv{clear:both;display:block;}
.product_title{display:block;}
.product{
	.product_body {
		padding: 10px 0;
		h3{
			font:{$font_weight} 14px/22px Font1,Arial;
			padding: 10px 0;
			border-bottom: 1px solid {$border_color};
		}
	}
	h2{
		font:{$font_weight} 20px/36px Font1,Arial;
		border-bottom: 1px solid {$border_color};
		padding: 10px 0;
	}
	.product_details {clear: both;}
	.product_text {font: normal 13px/20px Font1;word-wrap: break-word;}
	.product_image {
		border: 1px solid {$border_color};
		display: block;
		margin-bottom: 5px;
		img {
			/*cursor:url('{$global_url}images/magnify.cur'), pointer ;*/
			cursor: -webkit-zoom-in;
			cursor: -moz-zoom-in;
			width: 100%;
			height: auto;
		}
		&:hover {
		}
	}
	.product_attachment {clear: both;}
	.product_video {
		clear: both;
		display: block;
		.video-js{
			margin: auto;
			margin: 0 auto 10px;
			.vjs-big-play-button {
				left: 35% !important;
				top: 45% !important;
				width: 30%;
				height: 15%;
			}
		}
	}
	.product_order_info{}
	.product_price{
		.product_status{
			text-align: {$align};
			font:{$font_weight} 14px/30px Font1,Arial;
			border-bottom: 1px solid {$border_color};
			padding: 10px 0;
		}
		span{
			margin-right: 5px;
		}
		.old_price{
			margin-right: 5px;
			text-decoration: line-through;
			color: {$product_price_off_color};
		}
	}
	.product_status{border-bottom: 0;}
	.product_basket {padding-top: 10px;}
	.product_attributes{
		margin-top: 10px;
		.table{
			margin:0;
			tr td:first-child{width: 200px;}
		}
	}
	.attr_list {
		padding-{$align}: 10px;
		li{
			list-style-type:square;
			margin-{$align}:10px;
		}
	}
	.product_options .options{margin:0}
	.products_index li a{
		display:block;color:#000;font:{$font_weight} 17px/20px Font1,Arial;
		span{float:{$xalign}}
	}
	.btn-alertme{
		float:{$xalign};
	}
	.form-quantity select,.form-quantity input
	{
		max-width:200px;
	}
}



.product_thumbs {
	display: block;
	clear: both;
	margin-bottom: 5px;

	a {

		padding: 5px;
		img{
			cursor: -webkit-zoom-in;
			cursor: -moz-zoom-in;
			border: 1px solid {$border_color};
			width: 100%;
			height: auto;
			&:hover{
			}
		}
		&:hover{
		}
	}
	&:nth-child(3n+1) {margin-{$align}:0;}
	&:nth-child(3n+3) {margin-{$xalign}:0;}
}



.product_status{
	.ps3{color:#BD362F}
	.ps0{color:#F89406}
	.ps1{color:#5BB75B}
	.ps2{color:#006DCC}
}

#box_alert{
	padding-top: 70px;
}




{if="$page_frame_custom"}{$page_frame_custom}{/if}
{if="!$enable_responsive"}{include="css/unresponsive.less"}
{else}
@media (min-width: 992px) and (max-width: 1199px) {}
@media (max-width: 991px) {}
@media (max-width: 991px) and (min-width: 768px) {}
@media (max-width: 767px) {}
@media  (max-width: 480px) {}
{/if}

/**
 * Owl Carousel v2.2.0
 * Copyright 2013-2016 David Deutsch
 * Licensed under MIT (https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE)
 */
/*
 *  Owl Carousel - Core
 */
.owl-carousel {
  display: none;
  width: 100%;
  -webkit-tap-highlight-color: transparent;
  /* position relative and z-index fix webkit rendering fonts issue */
  position: relative;
  z-index: 1; }
  .owl-carousel .owl-stage {
    position: relative;
    -ms-touch-action: pan-Y; }
  .owl-carousel .owl-stage:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0; }
  .owl-carousel .owl-stage-outer {
    position: relative;
    overflow: hidden;
    /* fix for flashing background */
    -webkit-transform: translate3d(0px, 0px, 0px); }
  .owl-carousel .owl-item {
    position: relative;
    min-height: 1px;
    float: left;
    -webkit-backface-visibility: hidden;
    -webkit-tap-highlight-color: transparent;
    -webkit-touch-callout: none; }
  .owl-carousel .owl-item img {
    display: block;
    width: 100%;
    -webkit-transform-style: preserve-3d; }
  .owl-carousel .owl-nav.disabled,
  .owl-carousel .owl-dots.disabled {
    display: none; }
  .owl-carousel .owl-nav .owl-prev,
  .owl-carousel .owl-nav .owl-next,
  .owl-carousel .owl-dot {
    cursor: pointer;
    cursor: hand;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none; }
  .owl-carousel.owl-loaded {
    display: block; }
  .owl-carousel.owl-loading {
    opacity: 0;
    display: block; }
  .owl-carousel.owl-hidden {
    opacity: 0; }
  .owl-carousel.owl-refresh .owl-item {
    visibility: hidden; }
  .owl-carousel.owl-drag .owl-item {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none; }
  .owl-carousel.owl-grab {
    cursor: move;
    cursor: grab; }
  .owl-carousel.owl-rtl {
    direction: rtl; }
  .owl-carousel.owl-rtl .owl-item {
    float: right; }

/* No Js */
.no-js .owl-carousel {
  display: block; }

/*
 *  Owl Carousel - Animate Plugin
 */
.owl-carousel .animated {
  -webkit-animation-duration: 1000ms;
          animation-duration: 1000ms;
  -webkit-animation-fill-mode: both;
          animation-fill-mode: both; }

.owl-carousel .owl-animated-in {
  z-index: 0; }

.owl-carousel .owl-animated-out {
  z-index: 1; }

.owl-carousel .fadeOut {
  -webkit-animation-name: fadeOut;
          animation-name: fadeOut; }

@-webkit-keyframes fadeOut {
  0% {
    opacity: 1; }
  100% {
    opacity: 0; } }

@keyframes fadeOut {
  0% {
    opacity: 1; }
  100% {
    opacity: 0; } }

/*
 * 	Owl Carousel - Auto Height Plugin
 */
.owl-height {
  transition: height 500ms ease-in-out; }

/*
 * 	Owl Carousel - Lazy Load Plugin
 */
.owl-carousel .owl-item .owl-lazy {
  opacity: 0;
  transition: opacity 400ms ease; }

.owl-carousel .owl-item img.owl-lazy {
  -webkit-transform-style: preserve-3d;
          transform-style: preserve-3d; }

/*
 * 	Owl Carousel - Video Plugin
 */
.owl-carousel .owl-video-wrapper {
  position: relative;
  height: 100%;
  background: #000; }

.owl-carousel .owl-video-play-icon {
  position: absolute;
  height: 80px;
  width: 80px;
  left: 50%;
  top: 50%;
  margin-left: -40px;
  margin-top: -40px;
  background: url("owl.video.play.png") no-repeat;
  cursor: pointer;
  z-index: 1;
  -webkit-backface-visibility: hidden;
  transition: -webkit-transform 100ms ease;
  transition: transform 100ms ease; }

.owl-carousel .owl-video-play-icon:hover {
  -webkit-transform: scale(1.3, 1.3);
      -ms-transform: scale(1.3, 1.3);
          transform: scale(1.3, 1.3); }

.owl-carousel .owl-video-playing .owl-video-tn,
.owl-carousel .owl-video-playing .owl-video-play-icon {
  display: none; }

.owl-carousel .owl-video-tn {
  opacity: 0;
  height: 100%;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: contain;
  transition: opacity 400ms ease; }

.owl-carousel .owl-video-frame {
  position: relative;
  z-index: 1;
  height: 100%;
  width: 100%; }


/**
 * Owl Carousel v2.2.0
 * Copyright 2013-2016 David Deutsch
 * Licensed under MIT (https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE)
 */
/*
 * 	Default theme - Owl Carousel CSS File

.owl-theme .owl-nav {
  margin-top: 10px;
  text-align: center;
  -webkit-tap-highlight-color: transparent; }
  .owl-theme .owl-nav [class*='owl-'] {
    color: #FFF;
    font-size: 14px;
    margin: 5px;
    padding: 4px 7px;
    background: #D6D6D6;
    display: inline-block;
    cursor: pointer;
    border-radius: 3px; }
    .owl-theme .owl-nav [class*='owl-']:hover {
      background: #869791;
      color: #FFF;
      text-decoration: none; }
  .owl-theme .owl-nav .disabled {
    opacity: 0.5;
    cursor: default; }

.owl-theme .owl-nav.disabled + .owl-dots {
  margin-top: 10px; }

.owl-theme .owl-dots {
  text-align: center;
  -webkit-tap-highlight-color: transparent; }
  .owl-theme .owl-dots .owl-dot {
    display: inline-block;
    zoom: 1;
    *display: inline; }
    .owl-theme .owl-dots .owl-dot span {
      width: 10px;
      height: 10px;
      margin: 5px 7px;
      background: #D6D6D6;
      display: block;
      -webkit-backface-visibility: visible;
      transition: opacity 200ms ease;
      border-radius: 30px; }
    .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
      background: #869791; }
 */

/**
 * Owl Carousel v2.2.0
 * Copyright 2013-2016 David Deutsch
 * Licensed under MIT (https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE)
 */
/*
 * 	Green theme - Owl Carousel CSS File
 */
.owl-theme .owl-nav {
  margin-top: 10px;
  text-align: center;
  -webkit-tap-highlight-color: transparent; }
  .owl-theme .owl-nav [class*='owl-'] {
    color: #FFF;
    font-size: 14px;
    margin: 5px;
    padding: 4px 7px;
    background: #D6D6D6;
    display: inline-block;
    cursor: pointer;
    border-radius: 3px; }
    .owl-theme .owl-nav [class*='owl-']:hover {
      background: #4DC7A0;
      color: #FFF;
      text-decoration: none; }
  .owl-theme .owl-nav .disabled {
    opacity: 0.5;
    cursor: default; }

.owl-theme .owl-nav.disabled + .owl-dots {
  margin-top: 10px; }

.owl-theme .owl-dots {
  text-align: center;
  -webkit-tap-highlight-color: transparent; }
  .owl-theme .owl-dots .owl-dot {
    display: inline-block;
    zoom: 1;
    *display: inline; }
    .owl-theme .owl-dots .owl-dot span {
      width: 10px;
      height: 10px;
      margin: 5px 7px;
      background: #D6D6D6;
      display: block;
      -webkit-backface-visibility: visible;
      transition: opacity 200ms ease;
      border-radius: 30px; }
    .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
      background: #4DC7A0; }


.owl-nav{
/*    position: absolute;
    top: 5px;*/
    /*height: 30px;*/
    margin: auto !important;
    width: 100%;
    font-size: 44px;
color:#000000;
text-shadow:0 0 20px rgba(0,0,0,0.50);
overflow:hidden,
	.owl-prev ,.owl-next {
		position: absolute;
	}
	.owl-prev {
		float: right;
		right:15px;
		left:auto;
		position: absolute;

	}
	.owl-next {
		float: left;
		left:15px;
		right:auto;
		position: absolute;
	}
}
