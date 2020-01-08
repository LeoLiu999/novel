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
        <link rel="stylesheet" href="/static/mobile/css/common.css?v=3" type="text/css" />
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
    		<div class="row px-3 py-2">
				<div class="col-5">
					<a href="/"><img class="img-fluid" src="/static/mobile/images/logo_1.png"></a>
				</div>
				<div class="col-3">
				</div>
				<div class="col-4 text-right">
					<a href="#" class="btn  btn-outline-danger btn-sm " role="button">我的书架</a>
				</div>
			</div>
			<div id="carouselExampleIndicators" class="carousel slide px-2" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                    	<a href="#">
                      		<img class="d-block w-100" src="/storage/banner/banner_1.jpg" alt="First slide">
                      	</a>
                    </div>
                    <div class="carousel-item">
                    	<a href="#">
                      		<img class="d-block w-100" src="/storage/banner/banner_2.jpg" alt="Second slide">
                   		</a>
                    </div>
                    <div class="carousel-item">
                    	<a href="#">
                      		<img class="d-block w-100" src="/storage/banner/banner_3.jpg" alt="Third slide">
                    	</a>
                    </div>
                  </div>
			</div>
			<form class="p-4" method="post" action="/a">		
                <div class="input-group">
                      <input type="text" style="border:1px solid #fff" placeholder="作者、书名" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-danger" type="submit">搜索</button>
                      </div>
                </div>
			</form>
			
			<div class="row p-3" style="background:#fff">
				<div class="col-4 text-center">
					<a href="#" class="icon-a">
						<i class="icon icon-category"></i>
						<b class="icon-b">分类</b>
					</a>
				</div>
				<div class="col-4 text-center">
					<a href="#" class="icon-a">
						<i class="icon icon-rank"></i>
						<b class="icon-b">排行</b>
					</a>
				</div>
				<div class="col-4 text-center">
					<a href="" class="icon-a">
						<i class="icon icon-finish"></i>
						<b class="icon-b">完本</b>
					</a>
				</div>
			</div>
			
			
    		<div class="home-module px-3 pt-3 mt-3">
    			<h5 class="module-title mb-3">热门推荐</h5>
				<ul class="list-inline  text-nowrap"  style="overflow-y: hidden;">
  					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/0081df4c-1b37-11ea-973c-acde48001122.jpg" class="figure-img img-fluid" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00098960-1b42-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/002489ea-1b38-11ea-973c-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/0079d87c-1b39-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/007bcfe8-1b3d-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
  					<li class="list-inline-item" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
  					</li>
  					<li class="list-inline-item" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
  					</li>
				</ul>
			</div>
    			
    		<div class="home-module px-3 pt-3 mt-3">
    			<h5 class="module-title mb-3">排行榜</h5>
    			<div class="mb-3">
    				<div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                      <label class="btn btn-outline-danger btn-sm active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked>点击榜
                      </label>
                      <label class="btn btn-outline-danger btn-sm">
                        <input type="radio" name="options" id="option2" autocomplete="off">推荐榜
                      </label>
                      <label class="btn btn-outline-danger btn-sm">
                        <input type="radio" name="options" id="option3" autocomplete="off">收藏榜
                      </label>
					</div>
				</div>
				<ul class="list-inline  text-nowrap"  style="overflow-y: hidden;">
  					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/0081df4c-1b37-11ea-973c-acde48001122.jpg" class="figure-img img-fluid" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00098960-1b42-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/002489ea-1b38-11ea-973c-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/0079d87c-1b39-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/007bcfe8-1b3d-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
  					<li class="list-inline-item" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
  					</li>
  					<li class="list-inline-item" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
  					</li>
				</ul>
			</div>
			<div class="home-module px-3 pt-3 mt-3">
    			<h5 class="module-title mb-3">分类推荐<a href="#" class="float-right" style="color:#969ba3">更多 ></a></h5>
    			<div>
    				<div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                      <label class="btn btn-outline-danger btn-sm active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked>玄幻奇幻
                      </label>
                      <label class="btn btn-outline-danger btn-sm">
                        <input type="radio" name="options" id="option2" autocomplete="off">武侠修真
                      </label>
                      <label class="btn btn-outline-danger btn-sm">
                        <input type="radio" name="options" id="option3" autocomplete="off">历史军事
                      </label>
					</div>
				</div>
				<ul class="list-inline mt-3 mb-0 text-nowrap"  style="overflow-y: hidden;">
  					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/0081df4c-1b37-11ea-973c-acde48001122.jpg" class="figure-img img-fluid" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00098960-1b42-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/002489ea-1b38-11ea-973c-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/0079d87c-1b39-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/007bcfe8-1b3d-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
  					<li class="list-inline-item" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
  					</li>
  					<li class="list-inline-item" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
  					</li>
				</ul>
				
				<div class="pt-3 border-top">
    				<div class="btn-group btn-group-toggle w-100" data-toggle="buttons">
                      <label class="btn btn-outline-danger btn-sm active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked>都市言情
                      </label>
                      <label class="btn btn-outline-danger btn-sm">
                        <input type="radio" name="options" id="option2" autocomplete="off">科幻灵异
                      </label>
                      <label class="btn btn-outline-danger btn-sm">
                        <input type="radio" name="options" id="option3" autocomplete="off">恐怖悬疑
                      </label>
					</div>
				</div>
				<ul class="list-inline mt-3  text-nowrap"  style="overflow-y: hidden;">
  					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/0081df4c-1b37-11ea-973c-acde48001122.jpg" class="figure-img img-fluid" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00098960-1b42-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/002489ea-1b38-11ea-973c-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/0079d87c-1b39-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/007bcfe8-1b3d-11ea-9baa-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
					<li class="list-inline-item align-top" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
					</li>
  					<li class="list-inline-item" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
  					</li>
  					<li class="list-inline-item" style="width:5.25rem">
  						<figure class="figure">
  							<img src="/storage/cover/00053490-1bca-11ea-97f8-acde48001122.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  							<figcaption class="figure-caption text-wrap text-dark">飞剑问道</figcaption>
  							<figcaption class="text-secondary text-wrap small">我吃西红柿</figcaption>
						</figure>
  					</li>
				</ul>
				
			</div>
			
			<div class="mt-3">
						
			</div>
			
			
		</div>
	</body>
    
</html>