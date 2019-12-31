<div class="left width65 new-article">
	<h3 class="wrap-title">最近更新</h3>
	<div>
		<ul class="width100">
			@forelse($books_lately_update as $book)
			<li>
				<span class="width15"><a href="{{ route('category', ['idcode'=> $book->category_id]) }}">「{{ $book->category }}」</a></span>
				<span class="width20"><a href="{{ route('book', ['idcode'=> $book->id]) }}">{{ $book->name }}</a></span>
				<span class="width50">
				@if (isset($book->article->id ))
				<a href="{{ route( 'article' , ['idcode'=> $book->article->id, 'book_idcode' => $book->id]) }}">{{ $book->article->title ?? $book->name }}</a>
				@else
				<a href="{{ route( 'book' , ['idcode'=> $book->id]) }}">{{ $book->name }}</a>
				@endif
				</span>
				<span class="width15 color999">{{ $book->author }}</span>
				<span class="right color999">{{ date('m-d', $book->update_article_time) }}</span>
			</li>
			@empty
			
			@endforelse
			
		</ul>
	</div>
</div>