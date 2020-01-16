@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('content')
		<div class="article-top fixed-top px-3 py-2"><a href="{{ route('m_bookCatalog', ['book_idcode' => $article->book_id]) }}" style="color:rgba(0,0,0,.4);" class="mr-2">< 目录 </a><small style="color:rgba(0,0,0,.4);font-size:1rem" class="top-title">{{$article->title}}</small></div>
		<div class="article-bg" style="height:100vh;">
    		<div class="wrapper" style="height:98vh;">
        		<div class="px-3" style="padding-top:3.2rem;min-height:100vh;">
        			<div class="top-msg-div text-center" style="font-size:1rem;color:rgba(0,0,0,.4);display:none">
						下拉加载上一章
					</div>
        			<div style="font-size:1.3rem" class="content-div">{!! $article->content !!}</div>
          			<div class="msg-div text-center" style="font-size:1rem;color:rgba(0,0,0,.4);display:none">
						上拉加载下一章
					</div>
        		</div>
    		</div>
    		
		</div>
		
	<script type="text/javascript" src="/static/js/better-scroll-1.15.2.min.js"></script>
	<script>
	var book_idcode = {{ $article->book_id }}
	var next_article_idcode;
	var prev_article_idcode;
    var oScroll = new BScroll(".wrapper", {
        probeType: 2,
        //下拉刷新：可以配置顶部下拉的距离（threshold） 来决定刷新时机以及回弹停留的距离（stop）
        //这个配置用于做上拉加载功能，默认为 false。当设置为 true 或者是一个 Object 的时候，可以开启上拉加载
        pullUpLoad: {
            threshold: 10
        },
        pullDownRefresh: {
            threshold: 10,
            stop: 20
        },
        mouseWheel: {    // pc端同样能滑动
            speed: 20,
            invert: false
        },
        useTransition:false  // 防止iphone微信滑动卡顿
    });

	function setMsg(msg){
		$('.msg-div').text(msg);
		$('.msg-div').show();
	}

	function setTopMsg(msg)
	{
		$('.top-msg-div').text(msg);
		$('.top-msg-div').show();
	}
	
	function appendContent(content)
	{
		$('.content-div').append(content)
	}

	function prependContent(content){
		$('.content-div').prepend(content)
	}
	
	function setTitle(title)
	{
		$('.top-title').text(title);
	}
    
 	@if ( $next_article )
 	next_article_idcode= {{ $next_article->id }}
 	setMsg('上拉加载下一章');
    oScroll.on("pullingUp",function(){
        if( next_article_idcode == 'empty' ) {
        	setMsg('已阅读完所有章节');
			return;
        }
        
        DoAjax.getResponse({
			'url' : "{{ route('m_actionGetArticle') }}",
			'method' : 'get',
			'params' : {
				'book_idcode' : book_idcode,
				'idcode' :next_article_idcode
			},
			'loading': function(){
				setMsg('loading...')
    		},
    		'success':function(data){
        		this.enAbled()
        		if( data.code == 200 ){
					setMsg('上拉加载下一章');
					appendContent(data.data.article.content)
					setTitle(data.data.article.title)
					next_article_idcode = data.data.next.id
            	}else{
            		setMsg('已阅读完所有章节');
                }
        	}
       	});		
        
        oScroll.finishPullUp();//可以多次执行上拉刷新
    });
    @else
    	setMsg('已阅读完所有章节');
	@endif

	@if ( $prev_article )
		prev_article_idcode= {{ $prev_article->id }}
		setTopMsg('下拉加载上一章')
        oScroll.on("pullingDown",function(){
        	if( prev_article_idcode == 'empty' ) {
            	setTopMsg('没有上一章了');
    			return;
            }
    		
         	DoAjax.getResponse({
    			'url' : "{{ route('m_actionGetArticle') }}",
    			'method' : 'get',
    			'params' : {
    				'book_idcode' : book_idcode,
    				'idcode' :prev_article_idcode
    			},
    			'loading': function(){
    				setTopMsg('loading...')
        		},
        		'success':function(data){
            		this.enAbled()
            		if( data.code == 200 ){
    					setTopMsg('下拉加载上一章');
    					prependContent(data.data.article.content)
    					setTitle(data.data.article.title)
    					prev_article_idcode = data.data.prev.id
                	}else{
                		setTopMsg('没有上一章了');
                    }
            	}
           	});		
            oScroll.finishPullDown();//可以多次执行上拉刷新
        });
 	@endif
    oScroll.refresh();
    
</script>
@endsection