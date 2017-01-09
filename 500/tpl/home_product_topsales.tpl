{if="$list"}
	<ul class='topsales owl-carousel'>
		{loop="list"}
			<li id='product_{$value.id}' class='col-product'>
				<div class='topsale'>
					<a href='{$value.link}' class='product_image' title='{$value.title}'>
						<img class='trans' alt='{$value.title}' src='{$value.image}' />
					</a>
					<a class='btn btn-lg btn-custom trans'  href='{$value.link}' >خرید کتاب</a>
				</div>
			</li>
		{/loop}
	</ul>
{/if}
