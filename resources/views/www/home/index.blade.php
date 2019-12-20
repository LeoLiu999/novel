@extends('www.global.base')

@section('title', '小说网')

@section('recommend')
	<div class="index_class">
			<div class="index_anniu">
			    <span><b style="font-size:16px;">强力推荐</b></span>
			    <span style="float:right;margin-right:15px;">
			        <span style="float:left;margin-right:10px;"><span id="ry_page">1</span><span style="margin:0 3px;font-size:14px;color:#555">/</span>3</span>
					<a class="btn-prev" href="javascript:void(0)" id="btn-prev"></a>
					<a class="btn-next" href="javascript:void(0)" id="btn-next"></a>
				</span>
			</div>
			
			<div class="index_screening">
				<ul style="left:-980px;">
						<li>
							<p><a href="#" target="_blank"><img src="222" width="150" height="180" alt="22" title="22" /></a></p>
							<div><a href="#" target="_blank" title="111">111</a></div>
							<p><span class="reting-star allstar4"></span><span style="color:#ff2f17;font-size:16px;font-weight:bold;">222</span></p>
						</li>
						<li>
							<p><a href="#" target="_blank"><img src="222" width="150" height="180" alt="22" title="22" /></a></p>
							<div><a href="#" target="_blank" title="111">111</a></div>
							<p><span class="reting-star allstar4"></span><span style="color:#ff2f17;font-size:16px;font-weight:bold;">222</span></p>
						</li>
						<li>
							<p><a href="#" target="_blank"><img src="222" width="150" height="180" alt="22" title="22" /></a></p>
							<div><a href="#" target="_blank" title="111">111</a></div>
							<p><span class="reting-star allstar4"></span><span style="color:#ff2f17;font-size:16px;font-weight:bold;">222</span></p>
						</li>
						<li>
							<p><a href="#" target="_blank"><img src="222" width="150" height="180" alt="22" title="22" /></a></p>
							<div><a href="#" target="_blank" title="111">111</a></div>
							<p><span class="reting-star allstar4"></span><span style="color:#ff2f17;font-size:16px;font-weight:bold;">222</span></p>
						</li>
				</ul>
			</div>
		</div>
@endsection


@section('content')
<!--index_box1开始-->
        <div class="index_box1">
        	@foreach($books_by_category as $b_c)
            <div class="index_box1_left left">
                <h2><a  class="inblock" href="{{ route('category', ['idcode' => $b_c['category']->id ]) }}">{{ $b_c['category']->name }}</a></h2>
                	@forelse( $b_c['books']  as $book)
	                <div class="box1_left_div left" onclick="location.href='{{ route('book', ['idcode' => $book->id  ] ) }}'">
	                    <div class="box1_left_div_img left">
	                    	<a href="{{ route('book', ['idcode' => $book->id  ] ) }}">
	                       	<img src="/storage{{ $book->cover }}"  alt="{{ $book->name }}" title="{{ $book->name }}" />
	                    	</a>
	                    </div>
	                    <div class="box1_left_div_content left">
	                        <div class="box1_left_div_content_div" >
	                        	<span><b><a href="{{ route('book', ['idcode' => $book->id  ] ) }}">{{ $book->name }}</a></b></span>
	                        </div>
	                        <div style="color:#666;font-size:12px" class="box1_left_div_content_div overhide height120 lineheight20" title="{{ $book->name }}">
	                        	<a style="font-size:12px" href="{{ route('book', ['idcode' => $book->id  ] ) }}">{{ $book->description }}</a>
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
