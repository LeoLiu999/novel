@extends('www.global.base')

@section('title', '小说网')

@section('recommend')
	<div class="index_class">
			<div class="index_anniu">
			    <span><b style="font-size:16px;">强力推荐</b></span>
			</div>
			
			<div class="index_screening">
				<ul style="">
						@forelse($books_recommend as $b_re)
						<li>
							<p><a href="{{ route('book', ['idcode' => $b_re->id  ] ) }}" target="_blank"><img src="/storage{{ $b_re->cover }}" width="150" height="180" alt="{{ $b_re->name }}" title="{{ $b_re->name }}" /></a></p>
							<div><a href="{{ route('book', ['idcode' => $b_re->id  ] ) }}" target="_blank" style="font-weight:bold">{{ $b_re->name }}</a></div>
							<p><span style="color:#6a6a6a;font-size:12px;">{{ $b_re->author }}</span></p>
						</li>
						@empty
						@endforelse
				</ul>		
			</div>
		</div>
@endsection

@section('content')
<!--index_box1开始-->
        <div class="index_box1">
        	@foreach($books_by_category as $b_c)
            <div class="index_box1_left">
                <div class="border-bottom2"><a class="block-a" href="{{ route('category', ['idcode' => $b_c['category']->id ]) }}">{{ $b_c['category']->name }}</a><a class="marginTopRight10 all right" href="{{ route('category', ['idcode' => $b_c['category']->id ]) }}" class="right">全部 >></a></div>
                	@forelse( $b_c['books']  as $book)
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
            @endforeach
       </div>      

@endsection


@section('newBookAndArticle')
 <div class="index_box1">
        	@include('www.global.newarticle')
        	@include('www.global.newbook')
 </div>
@endsection
