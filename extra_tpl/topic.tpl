{if="$topics"}
	<ul class='topics '>
{loop="topics"}
	<li id='topic_{$value.id}' class='topic {$value.class}'>
		<div class="topic_like">{$value.like}</div>
		{if="$value.title"}<div class="topic_title">{$value.title}</div>{/if}
		<div class="topic_user">
			<a href='{$value.user_link}'>
				<div class='topic_avatar'><img src='{$value.user_image}' alt='{$value.user_nickname}' /></div>
				<h3>{$value.user_nickname}</h3>
			</a>
			<div class="right clear rtl small user_info">{$value.user_info}</div>
		</div>
		<div class="topic_area">
			<div class='topic_text'>{$value.text}</div>
			{$value.tags}
			<div class='topic_status_message' >{$value.user_about}</div>
			<div class='topic_options '>{$value.options}</div>
		</div>
	</li>
{/loop}
</ul>
{$paging}
{/if}
