@extends('www.global.base')

@section('breadcrumbs')
	<div class="breadcrumbs-nav">
		<ul>
			<li><a href="/">首页</a>></li>
			<li><a href="{{ route('category', ['idcode' => $article->category_id]) }}">{{ $article->category }}</a>></li>
			<li><a href="{{ route('book', ['idcode' => $article->book_id]) }}">{{ $article->book_name }}</a>></li>
			<li style="margin-left:10px">{{ $article->title }}</li>
		</ul>
	</div>
@endsection

@section('content')
		<div class="height10"></div>
		<div class="article center">
			<div class="article-setting">
				<ul>
					<li><a href="javascript:void(0)" onclick="joinBookrack('{{ $article->book_id }}')">加入书架</a></li>
					<li><a href="javascript:void(0)" onclick="recommend('{{ $article->book_id }}')">推荐本书</a></li>
				</ul>
				<div class="right" style="margin-top:8px;padding-right:10px;">
    				<select style="height:22px" id="changeSize">
    					<option value="">字号</option>
    					<option value="14">14</option>
    					<option value="16">16</option>
    					<option value="18">18</option>
    					<option value="20">20</option>
    					<option value="22">22</option>
    					<option value="24">24</option>
    					<option value="26">26</option>
    					<option value="28">28</option>
    					<option value="30">30</option>
    				</select>
    				<script>
    					$('#changeSize').change(function(){
							var size = $(this).val();
							if( size ){
								$('.article-title h3').css('font-size', size+'px');
								$('.article-content p').css('font-size', size+'px');
							}
        				})
    				</script>
				</div>
			</div>
			<div class="article-footer">
				<ul>	
					<li>
					@if( $prev_article )
						<a href="{{ route('article', ['idcode' => $prev_article->id]) }}">上一章</a>
					@else
						<a href="{{ route('book', ['idcode' => $article->book_id])  }}">上一章</a>
					@endif
					</li>
					<li>
						<a href="{{ route('book', ['idcode' => $article->book_id]) }}">目录</a>
					</li>
					<li>
					@if( $next_article )
						<a href="{{ route('article', ['idcode' => $next_article->id]) }}">下一章</a>
					@else
						<a href="{{ route('book', ['idcode' => $article->book_id]) }}">下一章</a>
					@endif
					</li>
					
				</ul>
			</div>
			<div class="article-title">
					<h3>{{ $article->title }}</h3>
			</div>
			<div class="article-content-box">
				<div class="article-content">
					{!! $article->content !!}
				</div>
			</div>
			<div class="article-footer">
				<ul>	
					<li>
					@if( $prev_article )
						<a href="{{ route('article', ['idcode' => $prev_article->id]) }}">上一章</a>
					@else
						<a href="{{ route('book', ['idcode' => $article->book_id])  }}">上一章</a>
					@endif
					</li>
					<li>
						<a href="{{ route('book', ['idcode' => $article->book_id]) }}">目录</a>
					</li>
					<li>
					@if( $next_article )
						<a href="{{ route('article', ['idcode' => $next_article->id]) }}">下一章</a>
					@else
						<a href="{{ route('book', ['idcode' => $article->book_id]) }}">下一章</a>
					@endif
					</li>
					
				</ul>
			</div>
		</div>
        <!--index_box1结束
     18911325682 杨 -->
@endsection

