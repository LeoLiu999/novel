<div class="left width65 new-article">
	<h3 class="wrap-title">最近更新</h3>
	<div>
		<ul class="width100">
			@forelse($articles_new as $a_n)
			<li>
				<span class="width15"><a>「{{ $a_n->category }}」</a></span>
				<span class="width20">{{$a_n->book_name}}</span>
				<span class="width50">{{$a_n->title}}</span>
				<span class="width15">{{$a_n->author}}</span>
				<span class="right">12-18</span>
			</li>
			@empty
			
			@endforelse
			
		</ul>
	</div>
</div>