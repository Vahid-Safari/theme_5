{if="$page_text"}<div class='page_text'>{$page_text}</div>{/if}
{if="$show_forums"}
	<ul class='forums '>
		{loop="forum_list"}
			<li id='forum_{$value.id}' class='forum_list'>
				<div class='forum_head'>
					{if="$value.allow_add_topic"}<a href='{$value.link}' ><h1>{$value.title}</h1></a>{else}<h1>{$value.title}</h1>{/if}
					{if="$value.subtitle"}<div class='forum_subtitle'>{$value.subtitle}</div>{/if}
				</div>
				{if="$value.subforum_list"}
						<ul class='subforums'>
							{loop="value.subforum_list"}
								<li id='forum_{$value.id}' class='subforum_list row'>
									<div class='subforum_title col-lg-10 col-md-10 col-sm-10 col-xs-12 '>
										<div class='subforum_details'>
											<span class='subforum_icon'><i {if="$value.icon"}style="background-image:url('{$value.icon}');" class='custom_icon'{else}class='glyphicon glyphicon-comment'{/if}></i></span>
											{if="$value.link"}<a href='{$value.link}' ><h2>{$value.title}</h2></a>{else}<h2>{$value.title}</h2>{/if}
											<div class='subforum_subtitle'>{$value.subtitle}</div>
										</div>
									</div>
									<div class='subforum_info col-lg-2 col-md-2 col-sm-2 hidden-xs'>{$value.topics} تاپیک<!--{$value.topics} تاپیک<br/>{$value.replies} پاسخ--></div>
								</li>
							{/loop}
						</ul>
				{/if}
			</li>
		{/loop}
	</ul>
{/if}
{if="$show_topics"}

	{if="$topic_list"}
		<ul class='topics_list'>
			<li class='topic_list topic_head row'>
				<div class='topic_head_title col-lg-7 col-md-7 col-sm-7 col-xs-10'>عنوان</div> 
				<div class='topic_info col-lg-1 col-md-1 col-sm-1 col-xs-1'>پاسخ ها</div>
				<div class='topic_info col-lg-1 col-md-1 col-sm-1 col-xs-1'>بازدید</div>
				<div class='topic_last col-lg-3 col-md-3 col-sm-3 hidden-xs'>آخرین پست</div>
			</li>
			{loop="topic_list"}
				<li id='topic_{$value.id}' class='topic_list{if="$value.important"} topic_important{/if} row'>
							<div class='topic_title col-lg-7 col-md-7 col-sm-7 col-xs-10'>
								<span class='topic_icon'><i class='glyphicon glyphicon-file'></i></span>
								<div class='topic_details'>
									<a title='{$value.title}' href='{$value.link}' ><h4>{$value.title}</h4></a>
									<div class='topic_subtitle'>توسط {$value.user} در {$value.date}</div>
								</div>
							</div>
							<div class='topic_info col-lg-1 col-md-1 col-sm-1 col-xs-1'>{$value.replies}</div>
							<div class='topic_info col-lg-1 col-md-1 col-sm-1 col-xs-1'>{$value.hit}</div>
							<div class='topic_last col-lg-3 col-md-3 col-sm-3 hidden-xs'>
									{if="$value.last_user"}توسط {$value.last_user} <a href='{$value.last_link}' ><i class='glyphicon glyphicon-circle-arrow-left'></i></a><br/>{$value.last_date}{else}<div class='topic_no_answer'>بدون پاسخ</div>{/if}
							</div>
				</li>
			{/loop}
		</ul>
		{$paging} 
		
		{if="$new_topic_link"}<a class='btn btn-custom btn-lg btn-new-topic' href='{$new_topic_link}'><span class='icon glyphicon-plus icon-plus'></span> موضوع جدید</a>{/if}
	{else}
			{if="$new_topic_link"}
				<div class='content_btn' >
					<p>هیچ موضوعی در این بخش مطرح نشده است</p>
					<a class='btn btn-custom btn-lg' href='{$new_topic_link}'><span class='icon glyphicon-plus icon-plus'></span> موضوع جدید</a>
				</div>
			{/if}
	{/if}
{/if}
