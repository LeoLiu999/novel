<!DOCTYPE html>
<html>
    <head>
            <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
            <title>@yield('title')</title>
            <meta name="keywords" content="@yield('keywords')">
    		<meta name="description" content="@yield('description')">
            <link rel="stylesheet" href="/static/www/css/common.css?v=3" type="text/css" />
            <script type="text/javascript" src="/common/home/js/jquery.js"></script>
        	<script type="text/javascript" src="/static/www/css/common.js?v=3"></script>
        	<script type="text/javascript">
        		
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
        			
        		})
        	</script>
    </head>
    <body>	
    <!--index_top_h1开始-->
    <div class="index_top_h1">
        <div class="top_h1_content" id="top_h1_content" style="text-align:center">
        您好，欢迎来到小说网
        </div>
    </div>
    <!--index_top_h2开始-->
    <div class="index_top_h2">
        <div class="index_logo">
                <a href="/"><img src="/static/www/images/logo.gif" alt="小说网" title="小说网"/></a>
            </div>
            <div class="index_search for_search_suggest">
            	<form action="#" method="get">
                	<input type="text" name="search" value="可通过影视、导演、演员名称进行查找" class="search_input1" autocomplete="off" />
                	<input type="image" id="searchOn" src="/static/www/images/search.jpg" class="search_input2"/>
            		
            	</form>
            	<!--div class="position_ab search_hot">热门搜索：<volist name="hot" id="ho"><a href="{:U('Index/search','search='.$ho)}">{$ho}</a></volist></div-->
            	 <div class="position_ab search_suggest" style="display:none">
            		<ul>
            	
            		</ul>
            	</div>
            </div>
           
            <div class="left index_gouwuche" >
                <div class="bdsharebuttonbox">
                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                    <a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                    <a href="#" class="bds_more" data-cmd="more"></a>
                    <a class="bds_count" data-cmd="count"></a>
                </div>
                <script>
                    window._bd_share_config={
                        "common":{"bdSnsKey":{},"bdText":"{$share}","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"32"},
                        "share":{}
                    };
                    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                </script>
            </div>
    </div>
    
    <div class="both height10"></div>
	<div class="both height10"></div>
	<div class="both height10"></div>
    <!--index_top_nav开始-->
    <div class="index_top_nav">
        <div class="nav">
            <div class="nav_right">
                <ul id="nav">
                     <li class="cur"><a href="/">首页</a></li>
                     @foreach($categories as $category)
                     <li><a href="/">{{ $category->name }}</a></li>
                     @endforeach
                     <li><a href="/">排行榜</a></li>
                     <li><a href="/">全本</a></li>
                     <li><a href="/">书架</a></li>
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
    
    	<div class="both height20"></div>
        <div class="gongsi radius" style="text-align:left">
        		<a href="#" target="_blank">111</a>
        		<a href="#" target="_blank">222</a>
        		<a href="#" target="_blank">3444</a>
        		<a href="#" target="_blank">5555</a>
        </div>
        <div class="both height10"></div>
        
        <!--index_help开始-->
 		<a class="toTop topPosition45" title="返回顶部" alt="返回顶部" href="javascript:void(0)" style="display:none"></a>
        <div class="index_state">
            申明：本站基于互联网自由分享，
        </div>
        <!--index_help结束-->
        <div class="both height10"></div>
        <div class="gongsi radius" style="text-align:center">
            <a href="" target="_blank">联系我们</a><a href=""  target="_blank">广告服务</a>
        </div>
        <div class="both height20"></div>
    </body>
    
</html>
<script type="text/javascript">
 //当前位置
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
</script>
    
    