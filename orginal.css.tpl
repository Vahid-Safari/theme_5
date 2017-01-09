/*ی*/

{include="css/font.less"}
{include="css/global.less"}
{include="css/body.less"}
{include="css/btn.less"}
{include="css/slider.less"}
{include="css/search.less"}
{include="css/header.less"}
{include="css/menu.less"}
{include="css/block.less"}
{include="css/breadcrumb.less"}
{include="css/footer.less"}
{include="css/thumb.less"}
{include="css/datetime.less"}
{include="css/content.less"}
{include="css/comment.less"}
{include="css/social.less"}
{if="$gotop_position!='0'"}{include="css/gotop.less"}{/if}
{if="$module_content"}{include="css/article.less"}{/if}
{if="$module_forum"}{include="css/forum.less"}{/if}
{if="$module_classifieds"}{include="css/classifieds.less"}{/if}
{if="$module_gallery"}{include="css/gallery.less"}{/if}
{if="$module_media"}{include="css/media.less"}{/if}
{if="$module_links"}{include="css/links.less"}{/if}
{if="$module_product || $module_shop"}{include="css/product.less"}{/if}
{if="$page_frame_custom"}{$page_frame_custom}{/if}
{if="!$enable_responsive"}{include="css/unresponsive.less"}
{else}
@media (min-width: 992px) and (max-width: 1199px) {}
@media (max-width: 991px) {}
@media (max-width: 991px) and (min-width: 768px) {}
@media (max-width: 767px) {}
@media  (max-width: 480px) {}
{/if}



{$custom_code}
