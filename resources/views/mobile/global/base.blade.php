<!DOCTYPE html>
<html lang="zh-CN">
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
   		<meta name="renderer" content="webkit">
        <title>@yield('title')</title>
        <meta name="keywords" content="@yield('keywords')">
		<meta name="description" content="@yield('description')">
        <link rel="stylesheet" href="/static/bootstrap-4.4.1/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="/static/mobile/css/common.css?v=7" type="text/css" />
        <link rel="shortcut icon" type="image/x-icon" href="/favicon_48x48.ico">
        <script type="text/javascript" src="/static/js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="/static/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="/static/js/DoAjax.js?v=2"></script>
    	<script>
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
    <body class="bgf6f7f9">	
    	
    	<div class="container-fluid" style="padding-right:0;padding-left:0;"> 
    		@yield('header')
    		@yield('top')
    		@yield('carousel')
			@yield('search')
			@yield('nav')
			@yield('hot')
			@yield('ranking')
			@yield('category')
			@yield('content')
    		@yield('footer')
		</div>
	</body>
    
</html>