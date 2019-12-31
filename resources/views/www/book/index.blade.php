@extends('www.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('breadcrumbs')
	<div class="breadcrumbs-nav">
		<ul>
			<li><a href="/">首页</a>></li>
			<li><a href="{{ route('category', ['idcode' => $book->category_id]) }}">{{ $book->category }}</a>></li>
			<li style="margin-left:10px">{{ $book->name }}</li>
		</ul>
	</div>
@endsection		

@section('content')
	<div class="height10"></div>
	<div class="index_box1" >
            <div>
                <div class="detail_box width95" style="margin:0 auto">
                    <div class="detail_left left">
                            <img src="/storage{{ $book->cover }}" title="{{ $book->name }}" alt="{{ $book->name }}"/>
                    </div>
					<div class="detail_info left">
						<div>
							<h3 class="left">{{ $book->name }}</h3>
                        	<span class="right color6a">{{ $book->author }} 著</span>
						</div>
                        <p>类<span></span>型：{{ $book->category }}</p>
                        <p>状<span></span>态：{{ formatState($book->state) }}</p>
                        <p>字<span></span>数：{{ formatWords($book->words) }}</p>
                        <p>更新时间：@if (!$articles->isEmpty()) <a href="{{ route('article', ['idcode' => $articles->last()->id, 'book_idcode' => $book->id]) }}">{{ $articles->last()->create_time }}</a>@endif</p>
                        <p>最新章节：@if (!$articles->isEmpty()) <a href="{{ route('article', ['idcode' => $articles->last()->id, 'book_idcode' => $book->id]) }}">{{ $articles->last()->title }}</a>@endif</p>
					</div>
					<div class="detail_about left">
						<p id="description">
							{{ $book->description }}
						</p>
						<div >
							<span style="float:right;color:#bbb;cursor:pointer;display:none" id="showAll" is-show='yes'>展开</span>
						</div>
						<script>

							if( $('#description').height() > 145  ){
								$('#description').css('height', '145px');
								$('#showAll').show()
							} else{
								$('#description').css('height', '145px');
								$('#showAll').hide()
							}
							
							$('#showAll').click(function(){
								if ( $(this).prop('is-show') == 'no' ){
									
									$('#description').css('height', '145px');
									$(this).text('展开');
									$(this).prop('is-show', 'yes')
								}else{
									$('#description').css('height', 'auto');
									$(this).text('收起');
									$(this).prop('is-show', 'no')
								}
							})
						</script>
						<div class="both">
							<a href="javascript:void(0)" onclick="joinBookrack('{{ $book->id }}')">加入书架</a>
							<a href="javascript:void(0)" onclick="recommend('{{ $book->id }}')">推荐本书</a>
							<a href="#bottom">直达底部</a>
						</div>
					</div>
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
                    			<a href="{{ route('article', ['idcode' => $article->id, 'book_idcode' => $book->id]) }}">{{ $article->title }}</a>
                    		</li>
                    		@empty
                    			赞无数据
                    		@endforelse
                    	</ul>
                    </div>
                </div>
                <div id="bottom">
                </div>
              


            </div>
	</div>
        <!--index_box1结束-->
@endsection


