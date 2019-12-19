<!DOCTYPE html>
<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    @yield('header')
    <body>
    	@yield('top')
    	
    
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>






		
		
		
		
        <!-- 广告位 第6 7 位-->
<include file="Public:flink" />   
<include file="Public:footer" />