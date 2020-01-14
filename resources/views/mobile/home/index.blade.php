@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('header')
	<div class="row px-3 py-2">
		<div class="col-5">
			<a href="/"><img class="img-fluid" src="/static/mobile/images/logo_1.png"></a>
		</div>
		<div class="col-3">
		</div>
		<div class="col-4 text-right">
			<a href="{{ route('m_bookrack') }}" class="btn  btn-outline-danger btn-sm " role="button">我的书架</a>
		</div>
	</div>
@endsection
@section('carousel')
    <div id="carouselExampleIndicators" class="carousel slide px-2" data-ride="carousel" data-interval="3000">
          <ol class="carousel-indicators">
          	@forelse($banners as $banner)
            	<li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" @if ( $loop->index === 0 ) class="active" @endif ></li>
             @empty
            @endforelse
          </ol>
          <div class="carousel-inner">
          	@forelse($banners as $banner)
            <div class="carousel-item @if ( $loop->index === 0 ) active @endif ">
            	<a href="{{ $banner['url'] }}">
              		<img class="d-block w-100" src="{{ $banner['pic'] }}" alt="{{ $banner['title'] }}">
              	</a>
            </div>
            @empty
            @endforelse
          </div>
    </div>
@endsection
@section('search')
    @include('mobile.global.searchform', ['position' => 'home'])
@endsection
@section('nav')	
	@include('mobile.global.nav', ['position' => 'home'])
@endsection
@section('hot')
	<div class="mt-3">
	</div>
	@include('mobile.global.hot', ['position' => 'home'])
@endsection

@section('ranking')
	<div class="home-module px-3 pt-3 mt-3">
    			<h5 class="module-title mb-3">排行榜<a href="{{ route('m_rankingList') }}" class="float-right" style="color:#969ba3">更多 ></a></h5>
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
				
				<ul class="list-inline  text-nowrap"  style="overflow-y: hidden;">
					@forelse($ranking_click as $click)
    					<li class="list-inline-item align-top" style="width:5.25rem">
      						<a href="{{ route('m_book', ['idcode' => $click->id]) }}">
          						<figure class="figure">
          							<img src="/storage/{{$click->cover}}" class="figure-img img-fluid rounded book-cover" alt="{{$click->name}}">
          							<figcaption class="figure-caption text-wrap text-dark">{{$click->name}}</figcaption>
          							<figcaption class="text-secondary text-wrap small">{{$click->author}}</figcaption>
        						</figure>
    						</a>
    					</li>
					@empty
					@endforelse
				</ul>
				<ul class="list-inline  text-nowrap"  style="overflow-y: hidden;display:none">
					@forelse($ranking_recommend as $recommend)
      					<li class="list-inline-item align-top" style="width:5.25rem">
      						<a href="{{ route('m_book', ['idcode' => $recommend->id]) }}">
          						<figure class="figure">
          							<img src="/storage/{{$recommend->cover}}" class="figure-img img-fluid rounded book-cover" alt="{{$recommend->name}}">
          							<figcaption class="figure-caption text-wrap text-dark">{{$recommend->name}}</figcaption>
          							<figcaption class="text-secondary text-wrap small">{{$recommend->author}}</figcaption>
        						</figure>
    						</a>
    					</li>
					@empty
					@endforelse
				</ul>
				<ul class="list-inline  text-nowrap"  style="overflow-y: hidden;display:none">
					@forelse($ranking_collect as $collect)
      					<li class="list-inline-item align-top" style="width:5.25rem">
      						<a href="{{ route('m_book', ['idcode' => $collect->id]) }}">
          						<figure class="figure">
          							<img src="/storage/{{$collect->cover}}" class="figure-img img-fluid rounded book-cover" alt="{{$collect->name}}">
          							<figcaption class="figure-caption text-wrap text-dark">{{$collect->name}}</figcaption>
          							<figcaption class="text-secondary text-wrap small">{{$collect->author}}</figcaption>
        						</figure>
    						</a>
    					</li>
					@empty
					@endforelse
				</ul>
				
				
			</div>
@endsection
@section('category')
    <div class="home-module px-3 pt-3 mt-3">
    	<h5 class="module-title mb-3">分类推荐<a href="{{ route('m_categories') }}" class="float-right" style="color:#969ba3">更多 ></a></h5>
    	<div class="category-div">
    		<div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
    		  @foreach(array_slice($books_by_category, 0, 3) as $b_c)
                  <label class="btn btn-sm btn-outline-danger @if( $loop->index === 0) active @endif">
                    <input type="radio" name="category_1" value="{{ $loop->index }}" id="category-1-{{ $loop->index }}" autocomplete="off" @if($loop->index === 0) checked @endif >{{ $b_c['category']->name }}
                  </label>
              @endforeach
    		</div>
    		<script>
    			$('input[name=category_1]').click(function(){
					 $(this).parents('.category-div').next('.category-ul-div').find('ul').eq($(this).val()).show().siblings('ul').hide() 
        		})
    		</script>
    	</div>
    	<div class="category-ul-div">
        	@foreach(array_slice($books_by_category, 0, 3) as $b_c)
        	
        		<ul class="list-inline mt-3 mb-0 text-nowrap"  style="overflow-y: hidden; @if( $loop->index !== 0) display:none @endif ">
        			@forelse( $b_c['books']  as $book)
        				<li class="list-inline-item align-top" style="width:5.25rem">
        					<a href="{{ route('m_book', ['idcode' => $book->id  ] ) }}">
          						<figure class="figure">
          							<img src="/storage{{ $book->cover }}" class="figure-img img-fluid rounded book-cover" alt="{{ $book->name }}">
          							<figcaption class="figure-caption text-wrap text-dark">{{ $book->name }}</figcaption>
          							<figcaption class="text-secondary text-wrap small">{{ $book->author }}</figcaption>
        						</figure>
        					</a>
        				</li>
        			@empty
                		赞无推荐
               		@endforelse
        				
        		</ul>
        	@endforeach
    	</div>
		<div class="pt-3 border-top category-div-2">
			<div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
				@foreach(array_slice($books_by_category, 3, 3) as $b_c)
                	<label class="btn btn-sm btn-outline-danger @if( $loop->index === 0) active @endif">
                    	<input type="radio" name="category_2" value="{{ $loop->index }}" id="option{{ $loop->index }}" autocomplete="off" @if($loop->index === 0) checked @endif >{{ $b_c['category']->name }}
                  	</label>
          		@endforeach
			</div>
			<script>
    			$('input[name=category_2]').click(function(){
					 $(this).parents('.category-div-2').next('.category-ul-div').find('ul').eq($(this).val()).show().siblings('ul').hide()
        		})
    		</script>
		</div>
		<div class="category-ul-div">
    		@foreach(array_slice($books_by_category, 3, 3) as $b_c)
        		<ul class="list-inline mt-3 mb-0 text-nowrap"  style="overflow-y: hidden; @if( $loop->index !== 0) display:none  @endif">
        			@forelse( $b_c['books']  as $book)
        				<li class="list-inline-item align-top" style="width:5.25rem">
        					<a href="{{ route('m_book', ['idcode' => $book->id  ] ) }}">
          						<figure class="figure">
          							<img src="/storage{{ $book->cover }}" class="figure-img img-fluid rounded book-cover" alt="{{ $book->name }}">
          							<figcaption class="figure-caption text-wrap text-dark">{{ $book->name }}</figcaption>
          							<figcaption class="text-secondary text-wrap small">{{ $book->author }}</figcaption>
        						</figure>
        					</a>
        				</li>
        			@empty
                		赞无推荐
               		@endforelse
        				
        		</ul>
        	@endforeach
    	</div>
	</div>
@endsection
