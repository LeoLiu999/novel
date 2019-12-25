<div class="right width30 new-book">
	<h3 class="wrap-title">新书上架</h3>
	<div>
		<ul>
			@foreach($books_new as $b_n)
    			<li>
    				<span class="width20"><a href="{{ route('category', ['idcode' => $b_n->category_id]) }}">「{{ $b_n->category }}」</a></span>
    				<span class="width50"><a href="{{ route('book', ['idcode' => $b_n->id]) }} ">{{ $b_n->name }}</a></span>
    				<span class="width20 color999">{{ $b_n->author }}</span>
    			</li>
			@endforeach
		</ul>
	</div>
</div>
