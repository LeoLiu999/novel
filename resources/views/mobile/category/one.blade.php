@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('top')
	@include('mobile.global.top', ['position_name' => '', 'position' => 'category'])
@endsection

@section('hot')
	@include('mobile.global.hot', ['position' => 'home'])
@endsection

@section('content')
	<div class="home-module px-2 pt-3">
		<h5 class="module-title mb-3">{{ $category->name }}</h5>
    	<ul class="list-unstyled">
    	@forelse( $books  as $book)
    		<a href="{{ route('m_book', ['idcode' => $book->id]) }}">
                  <li class="media mb-3">
                        <img class="mr-3 book-cover rounded" src="/storage{{ $book->cover }}" alt="{{ $book->name }}">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1 text-dark ">{{ $book->name }}</h5>
                          <p class="book-desc">{{ $book->description }}</p>
                          <p><small class="float-left text-969">{{ $book->author }}</small><small class="float-right text-969">{{ $book->category }}</small></p>
                        </div>
                  </li>
             </a>
          @empty
    	      赞无数据
    	  @endforelse
    	</ul>
    </div>
@endsection