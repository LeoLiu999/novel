@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('content')
	<div class="article-top fixed-top px-3 py-2"><small style="color:rgba(0,0,0,.4);">{{$article->title}}</small></div>
			
		<div class="article-bg px-3" style="padding-top:3.2rem">
			<h5>{{$article->title}}</h5>
			
			<div>{!! $article->content !!}</div>
		</div>
			
@endsection

