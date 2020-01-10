@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('top')
	@include('mobile.global.top', ['position_name' => '', 'position' => 'categories'])
@endsection

@section('content')
<div class="home-module px-3 pt-3">
	<h5 class="module-title mb-3">分类</h5>
	@foreach($categories as $category)
		<a href="{{ route('m_category', ['idcode' => $category->id]) }}" class="d-block">
        	<div class="row ml-3 p-3 border-top">
                <div class="col-4 text-dark">
                  <strong>{{ $category->name }}</strong>
                </div>
                <div class="col-6 text-secondary">
                  共{{ $category->book_nums }}本作品
                </div>
                <div class="col-2 text-muted">
                  >
                </div>
                <div class="col-12 mt-2">
                	@forelse($category->tags as $tag)
                  		<button type="button" class="mb-1 btn btn-outline-secondary btn-sm">{{ $tag }}</button>
                  	@empty
                  	@endforelse
                </div>
          </div>
      </a>
   @endforeach
</div>
@endsection

