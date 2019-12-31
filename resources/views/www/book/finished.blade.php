@extends('www.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('content')
	  <div class="index_box1">
            <div class="index_box1_left">
                <div class="border-bottom2"><a class="block-a" href="javascript:void(0)">完本</a></div>
                	@forelse( $books  as $book)
	                <div class="box1_left_div left" onclick="location.href='{{ route('book', ['idcode' => $book->id  ] ) }}'">
	                    <div class="box1_left_div_img left">
	                    	<a href="{{ route('book', ['idcode' => $book->id  ] ) }}">
	                       	<img src="/storage{{ $book->cover }}"  alt="{{ $book->name }}" title="{{ $book->name }}" />
	                    	</a>
	                    </div>
	                    <div class="box1_left_div_content left">
	                        <div class="box1_left_div_content_div" >
	                        	<span><a href="{{ route('book', ['idcode' => $book->id  ] ) }}">{{ $book->name }}</a></span>
	                        </div>
	                        <div style="font-size:12px;" class="description overhide height120 lineheight20" title="{{ $book->name }}">
	                        	<a style="font-size:12px;" href="{{ route('book', ['idcode' => $book->id  ] ) }}">{{ $book->description }}</a>
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
            <div style="margin-left:350px">{{ $books->links() }}</div> 
       </div>      
@endsection

@section('newBookAndArticle')
 <div class="index_box1">
        	@include('www.global.book_lately_update')
        	@include('www.global.newbook')
 </div>
@endsection

