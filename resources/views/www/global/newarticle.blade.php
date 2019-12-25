<div class="left width65 new-article">
	<h3 class="wrap-title">最近更新</h3>
	<div>
		<ul class="width100">
			@forelse($articles_new as $a_n)
			<li>
				<span class="width15"><a href="{{ route('category', ['idcode'=> $a_n->category_id]) }}">「{{ $a_n->category }}」</a></span>
				<span class="width20"><a href="{{ route('book', ['idcode'=> $a_n->book_id]) }}">{{$a_n->book_name}}</a></span>
				<span class="width50"><a href="{{ route('article', ['idcode'=> $a_n->id]) }}">{{$a_n->title}}</a></span>
				<span class="width15 color999">{{$a_n->author}}</span>
				<span class="right color999">12-18</span>
			</li>
			@empty
			
			@endforelse
			
		</ul>
	</div>
</div>