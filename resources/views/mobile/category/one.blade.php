@extends('mobile.global.base')

@section('title', $title)

@section('keywords', $keywords)

@section('description', $description)

@section('top')
	@include('mobile.global.top', ['position_name' => '', 'position' => 'category'])
@endsection
	@section('content')
			<div class="bg-white" style="height:100vh">
        			<div class="wrapper" style="height:65vh">
        				<div style="min-height:100vh">
            				@include('mobile.global.hot', ['position' => 'category'])
                        	<div class="home-module px-2 pt-3">
                    			<h5 class="module-title mb-3">{{ $category->name }}</h5>
                    			<ul class="list-unstyled content-box">
                        		</ul>
                        		<div class="text-center text-969 loading-box" style="">上拉加载更多</div>
                            </div>
                    	</div>
                    </div>
            </div>
            <script type="text/javascript" src="/static/js/better-scroll-1.15.2.min.js"></script>
            <script type="text/javascript">
            	var page = 1;
                var oScroll = new BScroll(".wrapper", {
                    probeType: 2,
                    //下拉刷新：可以配置顶部下拉的距离（threshold） 来决定刷新时机以及回弹停留的距离（stop）
                    //这个配置用于做上拉加载功能，默认为 false。当设置为 true 或者是一个 Object 的时候，可以开启上拉加载
                    pullUpLoad: {
                        threshold: 10
                    },
                    mouseWheel: {    // pc端同样能滑动
                        speed: 20,
                        invert: false
                    },
                    click:true,
                    useTransition:false  // 防止iphone微信滑动卡顿
                });
                function setContent(content){
					$('.content-box').append(content);
                }
                function setMsg(msg){
                	$('.loading-box').text(msg);
					$('.loading-box').show();
                }
				function loadList(){
					DoAjax.getResponse({
            			'url' : "{{ route('m_actionGetBooksByCategory') }}",
            			'method' : 'get',
            			'params' : {
            				'category_idcode' : {{$category->id}},
            				'page' : page
            			},
            			'loading': function(){
                			setMsg('loading...')
            			},
                		'success':function(data){
                    		if( data == 'empty' ){
                    			this.disAbled()
                    			setMsg('没有更多了')
                            } else {
                            	this.enAbled()
                            	setContent(data)
                            	setMsg('上拉加载更多')
                        	    page++
                            }
                    	}
                   	});		
				}
				loadList();
                oScroll.on("pullingUp",function(){
                    loadList();
                    oScroll.finishPullUp();//可以多次执行上拉刷新
                });
                oScroll.refresh();
            </script>
       
	@endsection
