@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('top')
	@include('mobile.global.top', ['position_name' => '', 'position' => 'catalog',  'book_idcode' => $book->id ])
@endsection


@section('content')
	<div class="py-2 px-3 bg-white border-bottom">
    		<strong style="font-size:1.4rem" class="text-dark">目录</strong>
    		<button type="button"  id="sort" attr-data="desc"  class="float-right btn btn-link text-dark" style="font-size:1.1rem">倒序</button>
	</div>
	<div class="home-module px-3 pt-3" id="asc-div">
		<h5 class="module-title mb-3">{{ $book->name }}<small class="ml-1">共{{ $articles->count() }}章</small></h5>
		@forelse($articles as $article)
        	<a href="{{ route('m_article', ['idcode' => $article->id, 'book_idcode' => $book->id]) }}" class="d-block text-dark">
            	<div class="row ml-3 p-3 border-top">
                    <div class="col-12 mt-2">
                    @if ( $article->id == $already_read->id ) <button type="button" class="btn btn-info btn-sm mr-2">已读</button>@endif {{ $article->title }}
                    </div>
              	</div>
          	</a>
		@empty
			赞无数据
		@endforelse
	</div>
	<div class="home-module px-3 pt-3 d-none" id="desc-div">
		<h5 class="module-title mb-3">{{ $book->name }}<small class="ml-1">共{{ $articles->count() }}章</small></h5>
		@forelse( array_reverse($articles->toArray()) as $article)
        	<a href="{{ route('m_article', ['idcode' => $article['id'], 'book_idcode' => $book->id]) }}" class="d-block text-dark">
            	<div class="row ml-3 p-3 border-top">
                    <div class="col-12 mt-2">
                    @if ( $article['id'] == $already_read->id ) <button type="button" class="btn btn-info btn-sm mr-2">已读</button>@endif {{ $article['title'] }}
                    </div>
              	</div>
          	</a>
		@empty
			赞无数据
		@endforelse
	</div>
	<script>
		$('#sort').click(function(){
			let sort = $(this).attr('attr-data')
			if( sort == 'desc' ){
				$('#desc-div').removeClass('d-none')
				$('#asc-div').addClass('d-none')
				$(this).attr('attr-data', 'asc')
				$(this).text('正序')
			} else {
				$('#asc-div').removeClass('d-none')
				$('#desc-div').addClass('d-none')
				$(this).attr('attr-data', 'desc')
				$(this).text('倒序')
			}
		})
	</script>
@endsection