@extends('www.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('content')
<div class="index_box1">
    <div class="left width30 new-book" style="margin-right:20px">
    	<h3 class="wrap-title">点击榜</h3>
    	<div>
    		<ul>
    			@forelse($ranking_click as $b_n)
        			<li>
        				@if($b_n->rank == 1)
        				<div class="both overhide" style="padding:10px 0">
        					<div class="left">
        						<p><span class="rankBlock danger">NO.1</span> <a href="{{ route('book', ['idcode' => $b_n->id]) }}">{{ $b_n->name }}</a></p>
        						<p><a href="{{ route('category', ['idcode' => $b_n->category_id]) }}">「{{ $b_n->category }}」</a><small class="color999">{{ $b_n->author }}</small></p>
            				</div>
            				<div class="right book-cover" >
            					<a href="{{ route('book', ['idcode' => $b_n->id]) }}" class="link">
            						<img src="/storage{{ $b_n->cover }}" />
            					</a>
            				</div>
        				</div>
        				@else
        					<span class="width50">if($b_n->rank == 2)<span class="rankBlock warning"> @elseif($b_n->rank == 3) <span class="rankBlock info">  @else <span class="rankBlock secondary"> @endif {{ $b_n->rank }}</span><a href="{{ route('book', ['idcode' => $b_n->id]) }}">{{ $b_n->name }}</a></span>
        					<span class="width20"><a href="{{ route('category', ['idcode' => $b_n->category_id]) }}">「{{ $b_n->category }}」</a></span>
        					<span class="width20 color999">{{ $b_n->author }}</span>
        				@endif
        			</li>
    			@empty
    	      		赞无数据
    	  		@endforelse
    		</ul>
    	</div>
    </div>
	<div class="left width30 new-book" style="margin-right:20px">
    	<h3 class="wrap-title">推荐榜</h3>
    	<div>
    		<ul>
    			@forelse($ranking_recommend as $b_n)
        			<li>
        				@if($b_n->rank == 1)
        				<div class="both overhide" style="padding:10px 0">
        					<div class="left">
        						<p><span class="rankBlock danger">NO.1</span> <a href="{{ route('book', ['idcode' => $b_n->id]) }}">{{ $b_n->name }}</a></p>
        						<p><a href="{{ route('category', ['idcode' => $b_n->category_id]) }}">「{{ $b_n->category }}」</a><small class="color999">{{ $b_n->author }}</small></p>
            				</div>
            				<div class="right book-cover" >
            					<a href="{{ route('book', ['idcode' => $b_n->id]) }}" class="link">
            						<img src="/storage{{ $b_n->cover }}" />
            					</a>
            				</div>
        				</div>
        				@else
        					<span class="width50">if($b_n->rank == 2)<span class="rankBlock warning"> @elseif($b_n->rank == 3) <span class="rankBlock info">  @else <span class="rankBlock secondary"> @endif {{ $b_n->rank }}</span><a href="{{ route('book', ['idcode' => $b_n->id]) }}">{{ $b_n->name }}</a></span>
        					<span class="width20"><a href="{{ route('category', ['idcode' => $b_n->category_id]) }}">「{{ $b_n->category }}」</a></span>
        					<span class="width20 color999">{{ $b_n->author }}</span>
        				@endif
        			</li>
    			@empty
    	      		赞无数据
    	  		@endforelse
    		</ul>
    	</div>
    </div>
	<div class="left width30 new-book">
    	<h3 class="wrap-title">收藏榜</h3>
    	<div>
    		<ul>
    			@forelse($ranking_collect as $b_n)
        			<li>
        				@if($b_n->rank == 1)
        				<div class="both overhide" style="padding:10px 0">
        					<div class="left">
        						<p><span class="rankBlock danger">NO.1</span> <a href="{{ route('book', ['idcode' => $b_n->id]) }}">{{ $b_n->name }}</a></p>
        						<p><a href="{{ route('category', ['idcode' => $b_n->category_id]) }}">「{{ $b_n->category }}」</a><small class="color999">{{ $b_n->author }}</small></p>
            				</div>
            				<div class="right book-cover" >
            					<a href="{{ route('book', ['idcode' => $b_n->id]) }}" class="link">
            						<img src="/storage{{ $b_n->cover }}" />
            					</a>
            				</div>
        				</div>
        				@else
        					<span class="width50">@if($b_n->rank == 2)<span class="rankBlock warning"> @elseif($b_n->rank == 3) <span class="rankBlock info">  @else <span class="rankBlock secondary"> @endif {{ $b_n->rank }}</span><a href="{{ route('book', ['idcode' => $b_n->id]) }}">{{ $b_n->name }}</a></span>
        					<span class="width20"><a href="{{ route('category', ['idcode' => $b_n->category_id]) }}">「{{ $b_n->category }}」</a></span>
        					<span class="width20 color999">{{ $b_n->author }}</span>
        				@endif
        			</li>
    			@empty
    	      		赞无数据
    	  		@endforelse
    		</ul>
    	</div>
    </div>
	
 </div>
@endsection