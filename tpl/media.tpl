<div class='content content_media media_{$id}' id='media_{$id}'>
	<div class='content_header clearfix'>
		<h2 class='content_title'>{$title}</h2>
		<div class='media_info clearfix'>
			<!--<a class='media_hit' href='#' ><span class='fa fa-eye-open'></span><strong>{$hit}</strong></a>
			<a class='media_like' href='#' data-like='{$id}'><span class='fa fa-heart'></span><strong>{$like}</strong></a>
			<a class='media_comment' href='#box_comments'><span class='fa fa-comment'></span><strong>{$comments}</strong></a>-->
		</div>
	</div>
	<div class='content_body'>
		<div class='media_area'>
		{if="$type=='photo'"}
			<a class='media_file media_photo' href='{$preview}' title='{$title}'><img src='{$media}' alt='{$title}' width="{$width}" height="{$height}" style='width:{$width}px;height:{$height}px;' /></a>
		{elseif="$type=='video'"}
			<div id='jwplayer'></div>
<!--			 <video id="video_{$id}" class="media_file media_video video-js vjs-default-skin" poster="{$preview}" data-setup="{}" controls preload="none" width="{$width}" height="{$height}">
			    <source src="{$media}" type='{$media_type}' />
			    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
			 </video>-->
		{elseif="$type=='audio'"}
			 <audio id="audio_{$id}" class="media_file media_audio video-js vjs-default-skin" poster="{$preview}" data-setup="{}" controls preload="none" width="{$width}" height="{$height}">
			    <source src="{$media}" type='{$media_type}' />
			    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
			 </audio>
		{elseif="$type=='flash'"}
			 <object class='media_file media_flash' id="flash_{$id}" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0"  width="{$width}" height="{$height}">
				<param name="movie" value="{$media}" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#ffffff" />
				<embed src="{$media}" quality="high" bgcolor="#ffffff" width="{$width}" height="{$height}" name="flash_{$id}" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer"> </embed>
			</object>
		{/if}
		{if="$text"}
		<br class='clear' />
		{$text}
		{/if}
		</div>
	</div>
{if="$options"}
	<div class='content_options'>
		{$options}
	</div>
{/if}
</div>