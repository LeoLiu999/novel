@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('content')
	<div class="article-top fixed-top px-3 py-2"><small style="color:rgba(0,0,0,.4);font-size:1rem">{{$article->title}}</small></div>
			
		<div class="article-bg px-3" style="padding-top:3.2rem">
			<h4>{{$article->title}}</h4>
			
			<div style="font-size:1.3rem">{!! $article->content !!}</div>
		</div>
			
@endsection

