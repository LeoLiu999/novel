@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('content')
	<ul class="list-unstyled">
	@forelse( $books  as $book)
          <li class="media">
          	<a href="{{ route('m_book', ['idcode' => $book->id  ] ) }}">
                <img class="mr-3" src="/storage{{ $book->cover }}" alt="{{ $book->name }}">
                <div class="media-body">
                  <h5 class="mt-0 mb-1">{{ $book->name }}</h5>
                  {{ $book->description }}
                </div>
            </a>
          </li>
      @empty
	      赞无数据
	  @endforelse
	</ul>
@endsection


