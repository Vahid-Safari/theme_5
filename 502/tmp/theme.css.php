 ?>/*ی*/


<?php echo $custom_code;?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/font.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/font.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/global.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/global.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/body.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/body.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/btn.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/btn.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/slider.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/slider.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/search.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/search.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/header.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/header.less */\r\n$compiled;" ?>
/********************************/
.main_menu{
	<?php echo $main_menu_outer_style["css"];?>
	.main_menu_inner{
		<?php echo $main_menu_style["css"];?>
	}
}

.sf-menu{

<?php if( $enable_responsive ){ ?>
	&.select-menu {
	  display: none;
	}
<?php } ?>
	margin: 0;
	padding: 0;
	list-style: none;
	font:@font_weight 16px/25px Font1,Arial;
	text-align:<?php echo $main_menu_align;?>;
	* {
		margin: 0;
		padding: 0;
		list-style: none;
	}
	a {
		display: block;
		position: relative;
		 transition: background .2s;
	}
	li {
		 position: relative;
		 white-space: nowrap;
	}
}

<?php if( $sidebar_menu_type=='simple' ){ ?>
<?php }else{ ?>
.sf-vertical{
	<?php if( $enable_responsive ){ ?>
		&.select-menu {
		  display: none;
		}
	<?php } ?>

	<?php echo $side_menu_style["css"];?>
	list-style: none;
	font:@font_weight 15px/20px Font1,Arial;
	.sf-arrow{
		position: absolute;
		<?php echo $xalign;?>: 0.4em;
		font-size: 0.8em;
		line-height: 1.7em;
		width: 1em;
	}
	a {
		display: block;
		position: relative;
		 transition: background .2s;
	}
	li {
		 position: relative;
		 &:hover > ul, &.sfHover > ul {
		 	display: block;
		 }
		 &.sfHover{
		 	transition: none;
		 	> a{
		 		<?php echo $side_menu_link_hover_style["css"];?>
		 	}
		 }
	}
	> li {
		> a{
				<?php echo $side_menu_link_style["css"];?>
				&:hover{
					outline:0;
					<?php echo $side_menu_link_hover_style["css"];?>
				}
				&:focus,&:active,&.active{
					outline:0;
					<?php echo $side_menu_link_active_style["css"];?>
				}
		}
	}
	ul {
		<?php echo $side_menu_dropdown_style["css"];?>
		a:hover, li.sfHover >a{
			<?php echo $side_menu_dropdown_link_hover_style["css"];?>
		}
		li a{
			<?php echo $side_menu_dropdown_link_style["css"];?>
			&:focus,&:active,&.active{
				<?php echo $side_menu_dropdown_link_active_style["css"];?>
			}
		}
	}

}
<?php if( $sidebar_menu_type=='dropdown' ){ ?>

<?php }else{ ?>
.sf-vertical{
	li{
		a{
				position: static;
				display: block;
				width: auto;
			 span{
			 	font-size: 10px;
			 }
			 &.sf-with-ul:after{
				 	content: "";
				 	width: 10px;
				 	height: 10px;
				 	display: block;
				 	border-color: transparent <?php echo $side_menu_dropdown_link_style["text"]["color"];?> transparent transparent;
				 	border-width: 5px;
				 	border-style: solid;
				 	position: absolute;
				 	top: 12px;
				 	<?php echo $xalign;?>: 10px;
				 	display: none;
			 }
		}

		ul{
				box-shadow: none;
				position: static;
				width: auto;
				border-radius: 0;
				box-sizing: content-box;
		}
	}
	>li{
		&:first-child a{
		}
	}
	.opened > .grower{

	}
	.grower{
		cursor: pointer;
		position: absolute;
		<?php echo $xalign;?>: 0px;
		top: 0px;
		font-size: 16px;
		padding: 8px;
		&:hover,&.open-menu{

		}
	}
}
<?php } ?>

<?php } ?>

<?php if( $enable_responsive ){ ?>
@media (max-width: 767px) {

.sf-menu,.sf-vertical{
	display:none;
	&.dynamized{
		display:block;
	}
	&.select-menu {
	  display:block;
	  width: 100%;
	  direction: rtl;
		text-align: right;
	}
}
}
<?php } ?>


/************** menu mega ***********/
.menu_2{
  position:relative;
}

.menu_2.sf-menu{
	>li{
		>a.sf-with-ul{
			padding-left:10px;
		}
		>ul{
			display:none;
			/*visibility:hidden;*/
		 >li{
			>a{
				padding:0;
				margin:0;
				&:focus{
					outline:none;
				}
			}
			a.sf-with-ul{
				padding:0;
			}
		 }
		}
	}
}
///////////// main menu ////
.sf-menu > li{
   > a {
    color: #fff;
    margin: 0px 0px 0px 2px;
    font-size: 14px;
    padding: 17px 10px;
    transition: background-color 1s;
    transition: color 1s ease, background-color 1s ease, box-shadow 1s ease;
    .fa{
	    margin-right:5px;
	  }
	  &:hover,:active{
	  	background-color:@red_color;
	  }
  }
}
/// ESSENTIAL STYLES
.sf-menu{
	border-radius:0;
	width: 100%;
	>li{
    text-align: right;
    z-index: 10;
    float: right;
		>ul{
	    right:0;
	    top:50px;
	    overflow: hidden;
	    padding: 10px;
	    width: 100%;
	    background-color:@background_color;
	    border:1px solid #ddd;
	    border-radius:4px;
	    z-index: 15;
	    position: absolute!important;
	    text-align:right;
	    float:right;
	    /*transition:all 0.4s ease-in-out;*/
   	  >li{
	     padding: 5px;
	     float:right;
	     margin-right:15px;
	    	>a{
	    	 font: normal 14px/25px Font1, Arial;
	    	 color:#000;
	    	}
	    	>ul{
	    		display:block !important;
	    	 >li{
		   		>a{
		   	 	 font-size:12px;
		   		 color:#666;
		   		}
		   		ul{
		   	 	 display:block !important;
		   		}
		   	 }
	    	}
    	}
    	li{
    		z-index: 100;
    		right:0;
    		width:200px;
    	}
		}
	}
	ul{
		opacity: 1;
		min-width: auto;
		margin: 0;
		background: transparent;
	}
	li{
		white-space: normal;
		ul{
			li{
				a{
					margin:0;
					display: block;
					padding: 5px 0;
					display: inline-block;
					border-bottom:2px solid transparent;
					&:hover{
						color: #000;
						border-bottom:2px solid @red_color;
					}
				}
				ul{
					position: static;
					box-shadow: none!important;
					display: block !important;
					li{
						a{
							line-height: 22px;
							font-size:12px;
						}
					}
				}
			}
		}
	}
}

.sf-menu > li:hover > ul{
    position: absolute;
    opacity: 1;
    height:auto;
   /* visibility: visible;*/
    transform: translate3d(0px, 0px, 0px);
    /*transition-delay: 0.4s;*/
}

.sf-menu li a{
	font-family:Font1;
}

.sf-menu > li > ul > li > ul  li ul{
	padding-right:10px;
	a{
		font-size: 12px;
	}
}

.sf-menu > li > ul > li > ul{
	padding-right:0;
}

.menu_2_home{
   padding-right:8px;
   padding-left: 0;
}

.sf-menu li {
    position: initial!important;
}
/////////////////////////////
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/block.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/block.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/breadcrumb.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/breadcrumb.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/footer.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/footer.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/thumb.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/thumb.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/datetime.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/datetime.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/content.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/content.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/comment.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/comment.less */\r\n$compiled;" ?>
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/social.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/social.less */\r\n$compiled;" ?>
<?php if( $gotop_position!='0' ){ ?><?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/gotop.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/gotop.less */\r\n$compiled;" ?><?php } ?>
<?php if( $module_content ){ ?><?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/article.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/article.less */\r\n$compiled;" ?><?php } ?>
<?php if( $module_forum ){ ?><?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/forum.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/forum.less */\r\n$compiled;" ?><?php } ?>
<?php if( $module_classifieds ){ ?><?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/classifieds.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/classifieds.less */\r\n$compiled;" ?><?php } ?>
<?php if( $module_gallery ){ ?><?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/gallery.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/gallery.less */\r\n$compiled;" ?><?php } ?>
<?php if( $module_media ){ ?><?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/media.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/media.less */\r\n$compiled;" ?><?php } ?>
<?php if( $module_links ){ ?><?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/links.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/links.less */\r\n$compiled;" ?><?php } ?>
<?php if( $module_product || $module_shop ){ ?><?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/product.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/product.less */\r\n$compiled;" ?><?php } ?>
<?php if( $page_frame_custom ){ ?><?php echo $page_frame_custom;?><?php } ?>
<?php if( !$enable_responsive ){ ?><?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/unresponsive.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/unresponsive.less */\r\n$compiled;" ?>
<?php }else{ ?>
@media (min-width: 992px) and (max-width: 1199px) {}
@media (max-width: 991px) {}
@media (max-width: 991px) and (min-width: 768px) {}
@media (max-width: 767px) {}
@media  (max-width: 480px) {}
<?php } ?>


@background_color:<?php echo $background_color;?>;
@red_color:<?php echo $red_color;?>;
@black_color:<?php echo $black_color;?>;

body{
	background-color:@background_color;
}

.btn.btn-custom{
 background-color:@black_color;
 transition: all .3s ease;
 &:hover{
  background-color:@red_color;
 }
}

header .header_top .menu_1 li:last-child a{
	border-left:0;
}

.menu_1 {
	padding-top:5px;
	padding-bottom:5px;
}

header .header_top{
	border-bottom:1px solid #e2e6e7;
	border-top:3px solid @red_color;
	.menu_1 li a{
		font-size:11px;
		font-weight:bold;
		line-height: 10px;
	}
  .login_top{
    display: inline-block;
    float: left;
    a{
	   font-size:11px;
	   font-weight:bold;
	   color:#292f38;
    }
  }
  a{
   &:hover{
  	color:@red_color;
   }
  }
}

.header_title{
  float: left;
  margin-left: 20px;
  margin-top:28px;
}

.search_area.pos_2{
	input{
		border:0;
		box-shadow:none;
		color:#696e6e;
		height: 38px;
	}
	.form-control:focus{
		border:0;
		box-shadow: none;
		outline: 0;
	}
	.btn.btn-custom.btn-search.search_button{
		i{
		  font-size: 20px;
      font-weight: bold;
      color: #bdc3c7;
      line-height: 23px;
		}
		background:transparent;
	}
}

.search_area.pos_2 input.form-control::-webkit-input-placeholder{
	color:#696e6e;
}

.breadcrumb{
	a{
		font-size:13px;
		font-weight:bold;
		&:hover{
			color:@red_color;
		}
	}
	.fa.fa-home{
		color:@red_color;
	}
}

.mine_menu_right{
	padding-left: 12px;
	padding-right:12px;
	#basketbox{
		background-color:@red_color;
		margin-top:11px;
		margin-bottom: 10px;
		.fa{
	    margin-right: 0;
	    margin-left: 15px;
	    color:#fff;
	    font-size:28px;
	    float:right;
	    #basket_items{
				position: absolute;
				    background-color: #323a45;
				    right: 3px;
				    top: 17px;
				    width: 19px;
				    height: 18px;
				    color: #fff;
				    font-size: 10px;
				    text-align: center;
				    border-radius: 50%;
				    transition: color 1s ease, background-color 1s ease;
				    font: bold 12px/20px Font1, Arial;
	   }
	  }
	  #basket_items_box{
	  	margin-top:3px;
	  	h4{
	  		color:#fff;
	  	}
	  }
	}
}

.main_menu_inner{
	background-color:@black_color;
  padding-left: 15px;
  padding-right: 15px;
}

#side_center{
 #box_brands{
	#brands_list{
	 padding: 5px 15px;
	 li{
     display: inline-block;
     padding:5px 10px;
   }
	}
 }
}


.header_slider_left{
	 text-align: center;
	.left_slider_box{
		.left_slider_1,.left_slider_2{
			margin-bottom:27px;
		}
		a{
			display:block;
			img{
				max-width:100%;
			}
		}
	}
}

.two_box{
   display: block;
   clear: both;
   margin-bottom: 15px;
   a{
		margin-bottom:20px;
		display:block;
		img{
			max-width:100%;
		}
	}
}

.products{
	li.product{
		.thumb_body.item_body{
      transition: all 1.1s ease;
      box-shadow: 0 1px 1px rgba(0,0,0,.10);
			h3{
	      font-weight: bold;
	      text-align: center;
	      height: 20px;
	      line-height:20px;
			}
			.product_thumb_price.price{
				min-height: 20px;
				color:@red_color;
			}
			.thumb_subtitle{
		    font-size: 11px;
		    line-height: 18px;
		    height: 34px;
		    font-weight: bold;
		    color:#7a7f7f;
		    margin-top: 10px;
		    text-align: center;
			}
			.product_basket{
				 display: inline-block;
				.btn.btn-product.btn-custom{
					background-color:@red_color;
					color:#fff;
          transition: all .4s ease;
          box-shadow: inset 0 -2px 0 rgba(0,0,0, .17);
			    &:hover{
			   	  background-color:@black_color;
			    }
				}
			}
			.product_thumb_badges{
		    border-radius:0;
		    right:10px;
		    top:-4px;
		    transform: rotate(0deg);
				.thumb_badge.badge_new,.thumb_badge.badge_off{
					display:none;
				}
				.thumb_badge.badge_special{
				    background-image: url(img/special.png);
				    background-repeat: no-repeat;
				    display: block;
				    width: 82px;
				    height:82px;
				    height: 112px;
				    background-color: transparent;
				    background-position: center;
				    border-radius:0;
				    transform: rotate(0deg);
				    margin-left:0;
				    float:right;
          &:after{
          	content="";
          }
				}
			}
		.home_product_img{
			position:relative;
			.product-quick-view{
		    position: absolute;
		    z-index: 50;
        top: 30%;
        left: 30%;
		    display: block;
		    padding: 8px 12px 9px;
		    background-color: rgba(41,47,56,0.5);
		    opacity: 0;
		    color: #fff;
		    cursor: pointer;
		    border-radius: 4px;
		    transition: all 0.4s ease 0s;
		    transform: translate(-50%,-50%) scale(.1);
		  }
	  }
		 &:hover{
       box-shadow: 0 0 17px rgba(0,0,0,0.12);
       .product-quick-view{
  		  opacity:1;
		 	  top:35%;
		 	  transform: translate(0%,0%) scale(1);
		 	  visibility:visible;
		 	  &:hover{
		 	  	background-color: rgba(41,47,56,1);
		 	  }
       }
		 }
		}
	}
}

.product_rate{
	height: 32px;
 .rate{
 	.rating-xs{
 		font-size: 25px;
 	}
  .rating-gly-star{
		font-size: 15px;
  }
  .rating-container .rating-stars {
    color:#ffcc00;
  }
 }
}

#box_products .product_rate .rate {
  padding-top:5px;
}

.product_home_box{
	margin-bottom: 25px;
	position:relative;
 .product_home_box_title{
 	display:block;
 	margin-bottom:20px;
 	h3{
 		font: normal 20px/25px Font1,Arial;
 		color:#292f38;
 		font-weight: bold;
 	}
 }
}

.home_products li.product .thumb_body.item_body h3 {
  margin-bottom:5px;
}

.owl-stage-outer{
  position: relative;
  overflow: hidden;
	.owl-stage{
	  .owl-item{
	  	float: right;
	  }
	}
}

.home_products.owl-theme,.brand_home_list.owl-theme{
	.owl-nav{
    position: absolute;
    top: 0;
    left: 10px;
    margin-top:0;
 		div{
	    display: inline-block;
	    border-width: 1px;
	    border-style: solid;
	    border-color: transparent;
	    background-color:#ecf0f1;
	    cursor: pointer;
	    width: 30px;
	    height: 30px;
	    text-align: center;
	    font-size: 0;
	    border-radius: 4px;
	    transition: all .3s ease;
	    opacity:1;
	    .fa{
		    line-height: 20px;
		    font-size: 18px;
		    -webkit-transition: color .3s ease;
		    transition: color .3s ease;
		    color:#000;
	    }
	    &:hover{
	    	background-color:@red_color;
	    	.fa{
	    		color:#fff;
	    	}
	    }
 		}
	}
}

#box_special_product,#box_new_product{
 .block{
   position:relative;
   .owl-theme{
  	.owl-item{
  		.thumb_body.item_body{
  			a{
  				text-align:center;
  				display:block;
  			}
  		}
  	}
  }
	.product_owl_side.owl-theme{
		.owl-nav{
			top:5px;
			left: 5px;
			div{
				background-color: transparent;
				.fa{
					color:#fff;
				}
				&:hover{
					background-color:@red_color;
				}
			}
		}
	}
 }
}

@nav_color = #e74c3c;
<?php ob_start();eval(" ?".">".$tpl->compileTemplate( php_clean(file_get_contents("/Applications/MAMP/htdocs/kcms5/code/themes/theme_5/css/basket.less")), null)."<?"."php ");$compiled = ob_get_contents();ob_end_clean(); echo "/* css/basket.less */\r\n$compiled;" ?>


.block{
 .block_header{
 	background-color:@black_color;
 	h3{
 		line-height:20px;
    font-weight: bold;
    font-size: 15px;
 	}
 }
}

#box_block_menu .block{
 border:1px solid transparent;
 border-color: transparent;
 box-shadow: 0 1px 1px rgba(0,0,0,.10);
 .block_body{
  padding: 23px 20px 25px;
  .menu_3.submenu.sf-vertical{
  	> li{
  		> a{
  			font-weight:bold;
  			font-size:14px;
  			&:hover{
  				color:@red_color;
  			}
  		}
  		&:last-child{
  			a{
  				border-bottom:0;
  			}
  		}
  		li{
  			a{
  				font-size:13px;
  				font-weight:bold;
	  			&:hover{
	  				color:@red_color;
	  			}
  			}
  		}
  	}
  	.grower{
	    font-size: 16px;
	    padding: 6px;
	    color:#d6e0e2;
	    &:hover{
	    	color:@red_color;
	    }
  	}
  	li{
  		ul{
  			padding:0;
  			li{
  				a{
  					padding:5px 15px;
  				}
  				ul{
  					li{
  						a{
  							padding:5px 30px;
  						}
  					}
  				}
  			}
  		}
  	}
  }
 }
}

#header_slide{
 .slider-wrapper.theme-light{
 	#slider{
	 	.nivo-directionNav{
		 	.nivo-prevNav{
		 		right:-50px;
		 	}
		 	.nivo-nextNav{
		 		left:-50px;
		 	}
		 	.nivo-prevNav,.nivo-nextNav{
		   bottom: auto;
		   top: 45%;
       transition: all .2s ease;
		 	}
	 	}
	  &:hover{
		 	.nivo-directionNav{
		 		.nivo-prevNav{
		 			right:20px;
		 		}
		 		.nivo-nextNav{
		 			left:20px;
		 		}
		 		.nivo-prevNav:hover,.nivo-nextNav:hover{
		 			background:@red_color;
		 		}
		 	 }
	   }
   }
 }
}

footer{
	background-color:@black_color;
	.menu_4.menu_footer{
	 li{
	  display:block;
	  ul{
	  	display:none;
	  }
	  a{
	   text-align:right;
	   font-size: 15px;
	   &:hover{
	    color:@red_color;
	   }
	  }
	 }
	}
  .footer-boxes{
  	margin-top:10px;
  }
}

.copyright_area{
 text-align:center;
 padding: 15px 0;
 background-color:#292f38;
 #copyright{
  display:inline-block;
  float:right;
  color:#fff;
 }
 #smarttry_logo{
   float: left;
 }
 .social{
   float:none;
   text-align:center;
   display:inline-block;
   li{
   	float:none;
   	display: inline-block;
     a{
     	display:inline;
     	background:transparent;
    }
   }
 }
}

.product_wishlist{
  display: inline-block;
  cursor: pointer;
	a.btn-wishlist{
		display: block;
    width: 38px;
    height: 34px;
    background-color: #ecf0f1;
    margin: 0 1px 0 1px;
    transition: background-color .4s ease, box-shadow .4s ease;
    box-shadow: inset 0 -2px 0 rgba(0,0,0, .17);
    border-radius: 4px;
	 i{
	   top:7px;
     color: #292f38;
     font-size: 20px;
	 }
	 &:hover{
	   background-color:@black_color;
	   i{
	    color:#fff;
	   }
	 }
	}
}

.pages.product_pages{
 li{
  .thumb_body{
    transition: all 1.1s ease;
    box-shadow: 0 1px 1px rgba(0,0,0,.10);
    background:transparent;
    h3{
     line-height:35px;
     color:#000;
     text-align:center;
     font-weight:bold;
    }
    &:hover{
     box-shadow: 0 0 17px rgba(0,0,0,0.12);
    }
  }
 }
}

.product_right_side{
    position: relative;
    border-width: 1px;
    border-style: solid;
    border-color: #fff;
    padding: 10px;
    background-color: #fff;
    font-size: 14px;
    box-shadow: 0 1px 1px rgba(0,0,0,.10);
    border-radius: 4px;
  .product_thumbs.owl-theme{
   position: relative;
   .owl-stage-outer{
    .owl-stage{
			.owl-item{
				a{
					display: block;
					padding: 0 3px;
					img{
						width: 100%;
				    border: 1px solid #d7d7d7;
					}
				}
			}
		 }
		}
		.owl-nav{
			margin-top: 0;
			div{
				position: absolute;
				color: #000;
				background-color:transparent;
				&:hover{
					color:#f00;
				}
				i{
					font-size: 20px;
				}
				&.owl-prev{
					top: 50%;
					right: -30px;
					left: auto;
					margin-top: -14px;
				}
				&.owl-next{
					top: 50%;
					left: -30px;
					right: auto;
					margin-top: -14px;
				}
			}
		}
  }
}

#box_product_details{
	.product_right_side{
		background-color:#fff;
		.product_right_side_inner{
			padding: 15px 0 0;
			a.product_image{
				padding: 30px;
				border:0;
				background-color:#f6f6f6;
			}
			.product_thumbs_img{
			  padding: 10px 20px;
			  .owl-theme{
			  	.owl-item{
			  		.product_thumb{
			  			padding: 10px;
			  			background-color:#f6f6f6;
			  			margin: 0 5px;
			  		}
			  	}
			  }
			}
		}
	}
	.product_left_side{
		.product_title{
			border:0;
	    padding:0;
	    color: #000;
		}
		.product_rate{
			.product_rate_text{
				display: inline-block;
			}
			.star-rating.rating-xs{
				display: inline-block;
		    float: right;
		    margin-left: 7px;
			}
		}
		.product_price.product-single__prices{
			border:0;
			color:@red_color;
		}
		.btn.btn-product.btn-custom.add_to_basket{
			background-color:@red_color;
			&:hover{
			 background-color:@black_color;
			}
		}
		.product_wishlist{
			a{
		    width: 44px;
		    height: 48px;
				i{
				  font-size: 31px;
				  right:6px;
				  top:8px;
				}
			}
		}
	}
}

.sharing_products{
	margin-top:20px;
	h3{
		display:inline-block;
		border-bottom:0 !important;
	}
	.sharing_products_social_icons{
		display:inline-block;
		a{
    width: 32px;
    height: 32px;
    padding: 1px 5px;
    font-size: 20px;
    display:inline-block;
      .fa{
      	color:#fff;
      }
		}
		a.icon-social.icon-telegram{
			background:rgb(29, 161, 242);
			padding: 5px 8px;
		}
		a.icon-social.icon-twitter{
			background:rgb(29, 161, 242);
			padding: 5px 8px;
		}
		a.icon-social.icon-google_plus{
			background:#d34836;
			padding: 5px;
		}
		a.icon-print{
			background-color: rgb(115, 138, 141);
      padding: 5px 7px;
		}
	}
}

.product_down_side{
	clear:both;
	padding-top:15px;
	ul#product_tabs{
		border:0;
		li.active{
			a{
				color:#fff;
				background-color:@black_color;
			}
		}
		li{
			margin-left:5px;
			a{
				font-size: 20px;
				background-color:#ecf0f1;
				border-radius: 4px 4px 0 0;
				color:#000;
				transition: background-color .35s ease, color .35s ease;
			}
		}
	}
	#product_tab_content{
    background: #fff;
    padding: 25px 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.10);
    border-radius: 4px;
    margin-bottom: 45px;
    #description{
    	word-wrap: break-word;
    }
	}
}

.other_product_page{
   margin-bottom: 50px;
   padding-top: 15px;
   border-top: 1px solid #e2e6e7;
   margin-top: 50px;
	.product_page_inner{
		display:inline-block;
	 a{
	 	 display:inline-block;
	 	 position:relative;
		 margin-bottom: 10px;
		 padding: 9px 20px 11px;
		 background-color: #e2e6e7;
		 border-radius: 4px;
		 box-shadow: inset 0 -2px 0 rgba(0,0,0, .17);
		 transition: all .4s ease;
	 	 h3{
	 	   display: inline;
	 	   color: #292f38;
	 	   font-size: 14px;
	 	   font-weight: 300;
	 	 }
	 	 i{
	 	  color:#292f38;
	    position: absolute;
	    top: 30%;
	    padding: 0 2px;
	    color: #292f38;
	    font-size: 14px;
	    transition: color .4s ease;
	   }
	   &:hover{
	     background:@black_color;
	     h3,i{
	      color:#fff;
	     }
	   }
	  }
	  h3.title_next_prev{
	  	font-size:14px;
	  	color:#292f38;
	  	display:block;
	  }
	}
  .content_page_left{
     float:left;
   a{
     padding-left:40px;
     i{
      left:20px;
     }
   }
  }
  .content_page_right{
  	float:right;
  	a{
     padding-right:40px;
     i{
      right: 20px;
     }
    }
  }
}

#content_page{
.content_body{
	.sharing_products{
		padding-right:0;
	}
	.other_product_page{
		.product_page_inner{
		 a{
		 	h3{
		 		color:#292f38;
		 	}
		   &:hover{
		   	h3{
		   		color:#fff;
		   	}
		   }
		 }
	  }
		margin-bottom: 0px;
		margin-top: 0;
		clear: both;
		h3.title_next_prev{
			margin-top:0;
			color:#292f38;
		}
	}
}
}

#box_comment_form{
	#comment_title{
    display: inline-block;
    padding: 10px 15px;
    background: @black_color;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
    transition: all .3s ease;
    &:hover{
    	background:@red_color;
    }
	}
	#comment_area{
    background: #fff;
    padding: 15px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 4px;
	}
}

.product_options{
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    a{
    	color:@black_color;
    	&:hover{
    		color:@red_color;
    	}
    }
}

.content_list{
	.contents_list_img{
    display: block;
    padding: 12px 12px;
    background-color:#fff;
	  margin-bottom: 25px;
	  border-width: 1px;
	  border-style: solid;
	  border-color: transparent;
	  box-shadow: 0 1px 1px rgba(0,0,0,.10);
	  border-radius: 4px;
	 .content_image{
	 	  float:none;
	 	  text-align: center;
	    z-index: 1;
	    padding-left:0;
	    padding-right:0;
	    display:block;
	    overflow:hidden;
	    img{
	      transition: all 1.1s ease 0s;
	      overflow:hidden;
	    }
	    &:hover{
	    	img{
	    		transform: scale(1.08);
	    	}
	    }
	 }
	}
	 .content_excerpt{
	 	h3{
	 		line-height: 10px;
	 		&:hover{
	 			color:@red_color;
	 		}
	 	}
	 	p{
     font-size: 13px;
     line-height: 22px;
     color:#696e6e;
     height: 55px;
	 	}
	 	.more_content{
	 		float:right;
	 		background:transparent;
	 		font-weight:bold;
	 		color:@red_color;
	 		padding:0;
	 		&:hover{
	 			color:@black_color;
	 		}
	 	}
	 }
}

.content_date{
  font-size: 13px;
  font-weight:bold;
  color: #292f38;
  .contents_data{
  	color:#696e6e;
  }
}

.contents_list li:first-child{
		margin-top:0;
		padding-top:0;
		border:0;
}

#side_top{
 margin-top:30px;
}

#content_page{
 .content.article{
 	.content_body {
 	  padding: 10px 10px;
 		a.article_image{
 			float:none;
 			margin:0;
 			text-align: center;
 		}
 	}
 	.content_header{
 		margin:30px 0 0;
	 	h2{
	 		color:#292f38;
	 		min-height: 30px;
	 		font-size:22px;
	 		&:hover{
	 			color:@red_color;
	 		}
	 	}
 	}
	 	h3{
	 	 margin-top:25px;
     font-size: 13px;
     line-height: 22px;
     color:#696e6e;
     height: 55px;
	 	}
 }
}

#box_comments{
 .content_body{
	ul#comments{
		ul{

		}
	 li{
		.comment_avatar{
			display: block;
			height:auto;
	    overflow: hidden;
	    border-radius: 50%;
	    margin-top: 15px;
			img{
				width:auto;
			}
		}
		.comment_title {
			background: transparent;
		  display:block;
		  .comment_date{
		  	padding-right: 0;
		  	color:#666;
		  	font-size: 13px;
		  }
		  .comment_name{
		  	padding-right: 5px;
		  	font-size:15px;
		  	color:#292f38;
		  }
		  .comment_vote {
		    height: 40px;
		  }
		}
		.comment_message{
			display: block;
			clear:none;
	    position: relative;
	    padding: 15px 20px;
	    background-color: #fff;
	    box-shadow: 0 1px 1px rgba(0,0,0,.10);
	    border-radius: 4px;
	    font-size: 13px;
	    color:#666;
	    &:before{
        position: absolute;
		    width: 0;
		    height: 0;
		    right: -30px;
		    border-left: 15px solid #fff;
		    border-right: 15px solid transparent;
		    border-bottom: 15px solid transparent;
		    border-top: 15px solid transparent;
		    content: "";
	    }
		}
	 }
	}
 }
}

#box_media_thumbs{
	.thumb_body{
    transition: all 1.1s ease;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    &:hover{
      box-shadow: 0 0 17px rgba(0,0,0,0.12);
      h3{
    	  color:@red_color;
      }
    }
    .media_info{
    	a{
	    	color:#292f38;
	    	&:hover{
	    		color:@red_color;
	    	}
	    }
    }
	}
}

/* fix_menu  */
/*.fix-menu {
  position: fixed;
  top: 50px;
  z-index: 12;
  width: 100%;
  -moz-transition: 0.4s all ease;
  -o-transition: 0.4s all ease;
  -webkit-transition: 0.4s all ease;
  transition: 0.2s all ease;
}*/

#side_center{
 #box_brands{
	#brands_list{
	 padding: 5px 15px;
	 li{
     display: inline-block;
     padding:5px 10px;
   }
	}
 }
}

.mine_menu_right{
	a.mm-menu-link{
	 color: #fff;
	 margin-top: 18px;
	 font-size: 18px;
	 display:block;
	 float: right;
	 h3{
    display: inline-block;
    margin-right: 10px;
	 }
	 .fa{
	  line-height: 20px;
	 }
	}
}
/************************/
@media print {
  header,footer{display:none;}
  a[href]:after {
    content:'' !important;
  }
  .side_top_ads,.breadcrumb,.content_page,#side_right,.pull-left.social-icons,#box_comment_form,#box_comments,#header_slide,.product_thumbs_img,.sharing_products,#box_comment_form,.product_page,.box.related_products_box,.copyright_area{
  	display:none;
  }
  iframe{
  	display:none !important;
  }

}

@media (max-width:991px) {
  .sf-menu >li >ul {
  	width:97%;
  }
}

@media (max-width:767px) {
	#basketbox{
		float:left;
	}
  .sf-menu.select-menu{
  	margin-top:10px;
  }
	.mine_menu_right a.mm-menu-link .fa {
	    line-height: 26px;
	}
}
<?php 