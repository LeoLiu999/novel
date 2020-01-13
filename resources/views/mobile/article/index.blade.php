@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('content')
	<div class="article-top fixed-top px-3 py-2"><small style="color:rgba(0,0,0,.4);font-size:1rem">{{$article->title}}</small></div>
			
		<div class="article-bg px-3" style="padding-top:3.2rem;min-height: 100vh">
			<h4>{{$article->title}}</h4>
			
			<div style="font-size:1.3rem">{!! $article->content !!}</div>
			<div class="m-auto text-center">
			
					@if( $prev_article )
						<a href="{{ route('m_article', ['idcode' => $prev_article->id, 'book_idcode' => $article->book_id]) }}"><button type="button" class="btn btn-outline-dark btn-sm mr-3" >上一章</button></a>
					@else
						<a href="{{ route('m_book', ['idcode' => $article->book_id])  }}"><button type="button" class="btn btn-outline-dark btn-sm mr-3" >上一章</button></a>
					@endif
						<a href="{{ route('m_bookCatalog', ['book_idcode' => $article->book_id]) }}"><button type="button" class="btn btn-outline-dark btn-sm mr-3" >目录</button></a>
					@if( $next_article )
						<a href="{{ route('m_article', ['idcode' => $next_article->id, 'book_idcode' => $article->book_id]) }}"><button type="button" class="btn btn-outline-dark btn-sm" >下一章</button></a>
					@else
						<a href="{{ route('m_book', ['idcode' => $article->book_id]) }}"><button type="button" class="btn btn-outline-dark btn-sm" >下一章</button></a>
					@endif
  			</div>
  			<div style="mt-2">
  			&nbsp;
  			</div>
		</div>
	
@endsection

