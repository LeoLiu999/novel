<div class="right width30 new-book">
	<h3 class="wrap-title">新书上架</h3>
	<div>
		<ul>
			@foreach($books_new as $b_n)
    			<li>
    				<a href="{{ route('category', ['idcode' => $b_n->category_id]) }}"><span class="width20">「{{ $b_n->category }}」</span></a>
    				<a href="{{ route('book', ['idcode' => $b_n->id]) }} "><span class="width50">{{ $b_n->name }}</span>
    				<span class="width20">{{ $b_n->author }}</span>
    			</li>
			@endforeach
		</ul>
	</div>
</div>
