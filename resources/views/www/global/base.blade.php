<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
            <title>@yield('title')</title>
            <meta name="keywords" content="@yield('keywords')">
    		<meta name="description" content="@yield('description')">
            <link rel="stylesheet" href="/static/bootstrap-4.4.1/css/bootstrap.css" type="text/css" />
            <link rel="stylesheet" href="/static/www/css/common.css?v=23" type="text/css" />
            <link rel="shortcut icon" type="image/x-icon" href="/favicon_48x48.ico">
            <script type="text/javascript" src="/static/js/jquery-3.4.1.min.js"></script>
        	<script type="text/javascript" src="/static/www/js/common.js?v=11"></script>
        	<script type="text/javascript" src="/static/js/DoAjax.js?v=2"></script>
        	<script type="text/javascript">
        		/*
        		$(function(){
        			
        			var data = $('img');
        			var imgSrc = new Array();
        			var hei = $(window).height();
        			
            		$.each(data, function(i, n){
            			imgSrc[i] = data.eq(i).attr('src');
            			if( data.eq(i).offset().top > ( hei + $(window).scrollTop() ) ){
            				data.eq(i).attr('src', '');
            			}
            		})
            		
        			$(window).scroll(function(){
        			   var sTop = $(window).scrollTop();
        			   $.each(data, function(i, n){
        				   	if( (hei+sTop) > data.eq(i).offset().top )
        				   	{
        				   		data.eq(i).attr('src',imgSrc[i]);
        				   	}
               				
               			})
        			})
        			
        		})*/
            if ((navigator.userAgent.match(/(MicroMessenger|iPhone|iPod|ios|iPad|Android)/i))) {
                var url = document.location.toString();
                var arrUrl = url.split("//");
                var start = arrUrl[1].indexOf("/");
                var relUrl = arrUrl[1].substring(start);

				var mobileSite = 'http://m.666kanshu.com';
				
                @if ( App::environment('local') )
                	mobileSite = 'http://m.novel.local';
                @endif
                window.location.href = mobileSite+relUrl;
            }

			function joinBookrack(bookid)
			{
				DoAjax.getResponse({
					'url' : "{{ route('setBookrack') }}",
					'method' : 'post',
					'headers' : {
						'X-CSRF-TOKEN' : '{{ csrf_token() }}'
					},
					'params' : {
						'book_idcode' : bookid
					},
					
               	});
			}
        	function recommend(bookid){
        		DoAjax.getResponse({
					'url' : "{{ route('recommend') }}",
					'method' : 'post',
					'headers' : {
						'X-CSRF-TOKEN' : '{{ csrf_token() }}'
					},
					'params' : {
						'book_idcode' : bookid
					},
					
               	});
            }
        </script>
    </head>
    <body>	
    <!--index_top_h1开始-->
    <div class="index_top_h1">
        <div class="top_h1_content" id="top_h1_content" style="text-align:center">
        您好，欢迎来到666看书免费小说网
        </div>
    </div>
    <!--index_top_h2开始-->
    <div class="index_top_h2">
        	<div class="index_logo">
                <a href="/"><img src="/static/www/images/logo_1.png" class="logo" alt="小说网" title="小说网"/></a>
            </div>
            <div class="index_search for_search_suggest">
            	<form action="{{ route('search') }}" method="get">
                	<input type="text" name="keyword" placeholder="可通过作者、书名进行查找" class="search_input1" autocomplete="off" />
                	<input type="button" id="search-submit"  class="search_input2"/>
            		<label id="search-btn" class="search-btn" for="search-submit" onclick="check_search()"><em class="iconfont">搜索</em></label>
            	</form>
            	<script>
            		function check_search(){
                		if( !$('input[name=keyword]').val() ) {
							return false;
                    	}

                    	$('form').eq(0).submit()
                	}	
            	</script>
            	<!--div class="position_ab search_hot">热门搜索：<volist name="hot" id="ho"><a href="{:U('Index/search','search='.$ho)}">{$ho}</a></volist></div-->
            	 <div class="position_ab search_suggest" style="display:none">
            		<ul>
            		</ul>
            	</div>
            </div>
            <div class="top-mybookrack">
            	<a href="{{ route('bookrack') }}">我的书架</a>
            </div>
           
    </div>
    <!--index_top_nav开始-->
    <div class="index_top_nav">
        <div class="top-nav">
            <div class="nav_right">
                <ul id="nav">
                     <li @if ( isset($position) && $position== "home" ) class="cur" @endif><a href="/">首页</a></li>
                     @foreach($categories as $category)
                     <li @if ( isset($position) && $position== "category_{$category->id}" ) class="cur" @endif ><a href="{{ route('category', ['idcode' => $category->id]) }}">{{ $category->name }}</a></li>
                     @endforeach
                     <li @if ( isset($position) && $position== 'rankingList' ) class="cur" @endif><a href="{{ route('rankingList') }}">排行榜</a></li>
                     <li @if ( isset($position) && $position== 'finish' ) class="cur" @endif><a href="{{ route('finished') }}">完本</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!--index_top_nav结束-->
    
    <!-- 广告位 第一到第四个广告位-->
		<!-- div class="index_advert">
			<div class="index_advert_position">
				<div class="index_advert_a0 div_fixed">
					<div class="div_relative">
						222
						<a class="close" href="javascript:void(0)"></a>
					</div>
				</div>
			</div>
		</div -->
	<!-- 广告位 第一到第四个广告位-->
	
		<div class="both height10"></div>
		@yield('breadcrumbs')
		@yield('recommend')
        <div class="both height10"></div>
        @yield('content')
        
        @yield('newBookAndArticle')
        
        <!--index_box1结束-->
        <div class="both height20"></div>
        <!-- 广告位 第6 7 位-->
        <!--script src="http://www.9lianmeng.com/page/?s=199332"></script-->
        <!-- div class="index_box1" style="text-align:center">
			66666
        </div -->
        <!--div class="index_box1" style="text-align:center">
			77777
        </div -->    
    
        <!-- div class="gongsi radius" style="text-align:left">
        		<a href="#" target="_blank">111</a>
        		<a href="#" target="_blank">222</a>
        		<a href="#" target="_blank">3444</a>
        		<a href="#" target="_blank">5555</a>
        </div -->
        <div class="both height10"></div>
        
        <!--index_help开始-->
 		<a class="toTop topPosition45" title="返回顶部" alt="返回顶部" href="javascript:void(0)" style="display:none"></a>
        <!--  div class="index_state">
            申明：本站基于互联网自由分享，
        </div-->
        <!--index_help结束-->
        <!-- div class="gongsi radius" style="text-align:center">
            <a href="" target="_blank">联系我们</a><a href=""  target="_blank">广告服务</a>
        </div-->
    </body>
    
</html>
<script type="text/javascript">
 //当前位置


/*
var nowPosition = -1;
$(':input[name=search]').keyup(function(event){
	var val = $.trim($(this).val());
	if(val == ''){
		$('.search_suggest').hide();
		$('.search_suggest ul').html('');
		return;
	}
	 
	 if( 
			 (event.keyCode >= 48 && event.keyCode <=57) || (event.keyCode >= 96 && event.keyCode <= 105) ||   
             (event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode == 8)
     ){
		 	
			
				var url = '{:U("Index/searchSuggest")}';
				var data = {name:val};
				$.getJSON(url,data,function(data){
					if(data.status == 1){
						var str = '';
						for(i=0;i<data.data.length;i++){
							//alert(data.data[i]);
							str += '<li><a href="__GROUP__/Index/search/search/'+data.data[i]+'.html">'+data.data[i]+'</a></li>';
						}
						$('.search_suggest ul').html(str);
						$('.search_suggest').show();
						nowPosition = -1;
						$('.search_suggest ul li').mouseover(function(){
							$(this).css('background', '#ccc').siblings().css('background', '#fff');
							nowPosition = $(this).index();
						})
						$('.search_suggest ul').mouseout(function(){
							$(this).find('li').css('background', '#fff');
							nowPosition = -1;
						})
					}else{
						nowPosition = -1;
						$('.search_suggest ul').html('');
						$('.search_suggest').hide();
					}
				})
			
			
		//向上
	 }else if(event.keyCode == 38){
		 $(this).focus();
		 $(this).val('');
		 $(this).val(val);
		 if(nowPosition == -1)
		 {
			 nowPosition = $('.search_suggest ul li').length - 1;
		 }else{
			 nowPosition --;
			 if(nowPosition < 0)
			 {
				 nowPosition = $('.search_suggest ul li').length - 1;
			 }
		 }
		 $('.search_suggest ul li').eq(nowPosition).siblings().css('background','#fff').end().css('background', '#ccc');
	 }else if(event.keyCode == 40){
		 //向下
		 if(nowPosition >= $('.search_suggest ul li').length-1)
		 {
			 nowPosition = -1;
		 }
		 nowPosition++;
		 $('.search_suggest ul li').eq(nowPosition).siblings().css('background','#fff').end().css('background', '#ccc');
	 }else if(event.keyCode == 13){
		 if(nowPosition != -1){
			 $(':input[name=search]').val($('.search_suggest ul li').eq(nowPosition).text());
		 }
	 	 $('#searchOn').click();
	 }
	
	
	
})
*/
</script>
    
    