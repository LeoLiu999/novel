@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('top')
	@include('mobile.global.top', ['position_name' => '', 'position' => 'category'])
@endsection

@section('content')
	<div class="px-3 pt-3 bg-white">
		<ul class="list-unstyled mb-0">
    		<li class="media">
                <img class="mr-3 book-cover rounded" src="/storage{{ $book->cover }}" alt="{{ $book->name }}">
                <div class="media-body">
                  <h6 class="my-0 text-dark ">{{ $book->name }}</h5>
                  <p class="mt-1 mb-0"><small>{{ $book->author }}</small></p>
                  <p class="mt-1 mb-0"><small>{{ $book->category }}</small></p>
                  <p class="mt-1 mb-0"><small class="mr-3">{{ formatWords($book->words) }}字</small><small>{{ formatState($book->state) }}</small></p>
                </div>
            </li>
       </ul>
	</div>
	<div class="p-3 bg-white">
    	<div class="row">
    		<div class="col">
				@if (!$articles->isEmpty())
				<a href="{{  route('m_article', ['idcode' => $articles->first()->id, 'book_idcode' => $book->id]) }}">
				@else 
				<a href="javascript:void(0)"> 
				@endif
				<button type="button" class="btn btn-danger btn-sm">开始阅读</button></a>
			</div>
    		<div class="col"><button type="button" class="btn btn-outline-success btn-sm" onclick="joinBookrack('{{ $book->id }}')">加入书架</button></div>
    		<div class="col"><button type="button" class="btn btn-outline-success btn-sm" onclick="recommend('{{ $book->id }}')">推荐本书</button></div>
    	</div>
	</div>
	@if ( $already_read )
	<div class="py-2 px-3 bg-white border-top">
		<a href="{{ route('m_article', ['idcode' => $already_read->id, 'book_idcode' => $book->id]) }}" class="text-info"><button type="button" class="btn btn-info btn-sm mr-2">已读</button>{{ $already_read->title }}</a>
	</div>
	@endif
	<div class="p-3 bg-white border-top border-bottom">
		{{ $book->description }}
	</div>
	<div class="py-2 px-3 bg-white border-bottom">
		<a href="{{ route('m_bookCatalog', ['book_idcode' => $book->id]) }}" class="d-block">
    		<strong style="font-size:1.4rem" class="text-dark">目录</strong>
    		<div class="float-right text-nowrap text-truncate text-right text-969ba3 mt-1" style="width:18rem">
    			@if (!$articles->isEmpty()) {{ substr($articles->last()->create_time, 5,11) }} · {{ $articles->last()->title }} @endif
    		</div>
		</a>
	</div>
	
	<div class="home-module px-3 pt-3 mt-3">
		<h5 class="module-title mb-3">最新章节</h5>
		@forelse(array_reverse(array_slice($articles->toArray(), -5)) as $article)
        	<a href="{{ route('m_article', ['idcode' => $article['id'], 'book_idcode' => $book->id]) }}" class="d-block text-dark">
            	<div class="row ml-3 p-3 border-top">
                    <div class="col-12 mt-2">
                    {{ $article['title'] }}
                    </div>
              	</div>
          	</a>
		@empty
			赞无数据
		@endforelse
	</div>
@endsection







