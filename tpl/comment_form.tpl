<h2 id="comment_title">{$title}</h2>
<div class='clearfix' id='comment_area'{if="$hide_mode"} style='display:none;'{/if}>
	<div id='comment_form_area' class='{if="$note"}col-lg-8 col-md-8 {else}col-lg-12 col-md-12 {/if}col-sm-12 col-xs-12'>{$form}</div>
	{if="$note"}<div id='comment_note' class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>{$note}</div>{/if}
</div>