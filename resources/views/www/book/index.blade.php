@extends('www.global.base')


@section('content')
	<div class="index_box1" >
			<div>
    				首页>科幻奇幻>标题
    			</div>
    			<div class="height10 both"></div>
            <div>
                <div class="detail_box width95" style="margin:0 auto">
                    <div class="detail_left left">
                            <img src="/storage/cover/77c3c12a-1b36-11ea-973c-acde48001122.jpg" title="" alt=""/>
                    </div>
					<div class="detail_info left">
						<div>
							<h3 class="left">{{ $book->name }}</h3>
                        	<span class="right color6a">{{ $book->author }} 著</span>
						</div>
                        <p>类<span></span>型：{{ $book->category }}</p>
                        <p>状<span></span>态：{{ formatState($book->state) }}</p>
                        <p>字<span></span>数：{{ formatWords($book->words) }}</p>
                        <p>更新时间：@if (!$articles->isEmpty()) <a href="{{ route('article', ['idcode' => $articles->last()->id]) }}">{{ $articles->last()->create_time }}</a>@endif</p>
                        <p>最新章节：@if (!$articles->isEmpty()) <a href="{{ route('article', ['idcode' => $articles->last()->id]) }}">{{ $articles->last()->title }}</a>@endif</p>
					</div>
					<div class="detail_about left">{{ $book->description }}</div>
                </div>
                <div class="height30 both"></div>
                <div class="goods_select_right both">
                    <div class="goods_nav" id="goods_nav">
                        <p><span style="font-size:16px;font-weight:bold;margin:0 20px;">目录</span>({{ $articles->count() }}章)</p>
                    </div>
                    <div class="goods_jianjie">
                    	<ul>
                    		@forelse($articles as $article)
                    		<li>
                    			<a href="{{ route('article', ['idcode' => $article->id]) }}">{{ $article->title }}</a>
                    		</li>
                    		@empty
                    			赞无数据
                    		@endforelse
                    	</ul>
                    </div>
                </div>
                
              


            </div>
	</div>
        <!--index_box1结束-->
@endsection


