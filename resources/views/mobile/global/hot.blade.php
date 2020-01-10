<div class="home-module px-3 pt-3 mt-3">
		<h5 class="module-title mb-3">热门推荐</h5>
		<ul class="list-inline  text-nowrap"  style="overflow-y: hidden;">
			
			@forelse($books_recommend as $b_re)
    			<li class="list-inline-item align-top" style="width:5.25rem">
    				<a href="{{ route('m_book', ['idcode' => $b_re->id  ] ) }}">
        				<figure class="figure">
        					<img src="/storage{{ $b_re->cover }}" class="figure-img img-fluid rounded book-cover" alt="{{ $b_re->name }}">
        					<figcaption class="figure-caption text-wrap text-dark">{{ $b_re->name }}</figcaption>
        					<figcaption class="text-secondary text-wrap small">{{ $b_re->author }}</figcaption>
        				</figure>
    				</a>
    			</li>
			@empty
			@endforelse
		</ul>
</div>