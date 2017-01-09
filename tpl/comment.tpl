		<li class="comment" id="comment_{$id}">
			<div class='comment_title clearfix {$class}'>
				<div class='comment_avatar'>{$avatar}</div>
				<div class='comment_name'>{$name}</div>
				<a class='comment_date' href='#comment_{$id}' title="{$full_date}">{$date}</a>
				<div class='comment_vote'>{$vote}</div> 
			</div>
			<div class='comment_message'>{$attribute}{$text}
				<div class='comment_options'>
					<div class='btn-group left'>{$reply}{$report}</div>
					<div class='btn-group left'>{$options}</div>
					<span class='author hidden'>{$author}</span>
				</div>
			</div>
		</li>