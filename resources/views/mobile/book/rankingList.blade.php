@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)


@section('top')
	@include('mobile.global.top', ['position_name' => '', 'position' => 'rankingList'])
@endsection

@section('content')
	  <div class="home-module px-2 pt-3">
		<h5 class="module-title mb-3">排行榜</h5>
    	<div class="mb-3">
			<div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
              <label class="btn btn-outline-danger btn-sm active">
                <input type="radio" name="ranking" value="0" id="ranking1" autocomplete="off" checked>点击榜
              </label>
              <label class="btn btn-outline-danger btn-sm">
                <input type="radio" name="ranking" value="1" id="ranking2" autocomplete="off">推荐榜
              </label>
              <label class="btn btn-outline-danger btn-sm">
                <input type="radio" name="ranking" value="2"  id="ranking3" autocomplete="off">收藏榜
              </label>
			</div>
			
			<script>
				$('input[name=ranking]').click(function(){
					$(this).parents('.mb-3').nextAll('ul').eq( $(this).val() ).show().siblings('ul').hide();
				})
			</script>
		</div>
		<ul class="list-unstyled">
    	@forelse($ranking_click as $click)
    		<a href="{{ route('m_book', ['idcode' => $click->id]) }}">
                  <li class="media mb-3">
                        <img class="mr-3 book-cover rounded" src="/storage{{ $click->cover }}" alt="{{ $click->name }}">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1 text-dark ">@if ( $click->rank == 1 ) <span class="badge badge-danger">No. @elseif($click->rank == 2) <span class="badge badge-warning"> @elseif($click->rank == 3) <span class="badge badge-info"> @else <span class="badge badge-secondary"> @endif {{ $click->rank }}</span> {{ $click->name }}</h5>
                          <p class="book-desc">{{ $click->description }}</p>
                          <p><small class="float-left text-969">{{ $click->author }}</small><small class="float-right text-969">{{ $click->category }}</small></p>
                        </div>
                  </li>
             </a>
          @empty
    	      赞无数据
    	  @endforelse
    	</ul>	
    	
    	<ul class="list-unstyled" style="display:none">
    		@forelse($ranking_recommend as $recommend)
    		<a href="{{ route('m_book', ['idcode' => $recommend->id]) }}">
                  <li class="media mb-3">
                        <img class="mr-3 book-cover rounded" src="/storage{{ $recommend->cover }}" alt="{{ $recommend->name }}">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1 text-dark ">@if ( $recommend->rank == 1 ) <span class="badge badge-danger">No. @elseif($recommend->rank == 2) <span class="badge badge-warning"> @elseif($recommend->rank == 3) <span class="badge badge-info"> @else <span class="badge badge-secondary"> @endif {{ $recommend->rank }}</span> {{ $recommend->name }}</h5>
                          <p class="book-desc">{{ $recommend->description }}</p>
                          <p><small class="float-left text-969">{{ $recommend->author }}</small><small class="float-right text-969">{{ $recommend->category }}</small></p>
                        </div>
                  </li>
             </a>
    		@empty
    	      赞无数据
    	  @endforelse
    	 </ul>	
    	 <ul class="list-unstyled" style="display:none">
    		@forelse($ranking_collect as $collect)	
    			<a href="{{ route('m_book', ['idcode' => $collect->id]) }}">
                  <li class="media mb-3">
                        <img class="mr-3 book-cover rounded" src="/storage{{ $collect->cover }}" alt="{{ $collect->name }}">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1 text-dark ">@if ( $collect->rank == 1 ) <span class="badge badge-danger">No. @elseif($collect->rank == 2) <span class="badge badge-warning"> @elseif($collect->rank == 3) <span class="badge badge-info"> @else <span class="badge badge-secondary"> @endif {{ $collect->rank }}</span> {{ $collect->name }}</h5>
                          <p class="book-desc">{{ $collect->description }}</p>
                          <p><small class="float-left text-969">{{ $collect->author }}</small><small class="float-right text-969">{{ $collect->category }}</small></p>
                        </div>
                  </li>
             </a>
    		@empty
    	      赞无数据
    	  @endforelse
    	 </ul>	
    </div>     
@endsection