{if="$top_text"}<div class='page_text'>{$top_text}</div>{/if}
{if="$list"}
<div class="panel-group" id="accordion">
{loop="list"}
	<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{$value.counter}">
          {$value.title}
        </a>
      </h4>
    </div>
    <div id="collapse{$value.counter}" class="panel-collapse collapse{if="$value.counter==1"} in{/if}">
      <div class="panel-body">
        {$value.text}
      </div>
    </div>
  </div>
{/loop}
</div>
{else}
	{$not_found}
{/if}
{if="$buttom_text"}<br /><br /><div class='buttom_text'>{$buttom_text}</div>{/if}
