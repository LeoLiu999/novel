@extends('www.global.base')

@section('title', '小说网')

@section('content')
<!--index_box1开始-->
        <div class="index_box1">
        	@foreach($books_by_category as $b_c)
            <div class="index_box1_left left">
                <h2><a  class="inblock" href="#">{{ $b_c['category']->name }}</a></h2>
                	@forelse( $b_c['books']  as $book)
	                <div class="box1_left_div left">
	                    <div class="box1_left_div_img left">
	                       	<img src="/storage{{ $book->cover }}"  alt="{{ $book->name }}" title="{{ $book->name }}" />
	                    </div>
	                    <div class="box1_left_div_content left">
	                        <div class="box1_left_div_content_div" >
	                        	<span><b>{{ $book->name }}</b></span>
	                        </div>
	                        <div style="color:#666;font-size:12px" class="box1_left_div_content_div overhide height120 lineheight20" title="{{ $book->name }}">
	                        	{{ $book->description }}
	                        </div>
	                        <div class="box1_left_div_content_div" >
	                   			<span style="font-size:12px;color:#a6a6a6;font-weight:normal;">{{ $book->author }}</span>
	                        </div>
	                    </div>
	                </div>
	                @empty
	                	赞无推荐
	               	@endforelse 
            </div>
            @endforeach
       </div>      

@endsection


@section('newBookAndArticle')
 <div class="index_box1">
        	@include('www.global.newarticle')
        	@include('www.global.newbook')
 </div>
@endsection
