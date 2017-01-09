		<li class="comment" id="comment_{$id}">
			<div class='col-lg-2 col-md-2 col-sm-2 col-xs-12'>
				<div class='comment_avatar'>{$avatar}</div>
			</div>
			<div class='col-lg-10 col-md-10 col-sm-10 col-xs-12'>
				<div class='comment_title clearfix {$class}'>
					<a class='comment_date' href='#comment_{$id}' title="{$full_date}">{$date} - </a>				
					<div class='comment_name'>{$name}</div>
					<div class='comment_vote'>{$vote}</div> 
			  </div>	

				<div class='comment_message'>{$attribute}{$text}
					<div class='comment_options'>
						<div class='btn-group left'>{$reply}{$report}</div>
						<div class='btn-group left'>{$options}</div>
						<span class='author hidden'>{$author}</span>
					</div>
				</div>			  		
			</div>			
		</li>