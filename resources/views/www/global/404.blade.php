@extends('www.global.base')

@section('content')
	<div class="index_box1">
		<div style="font-size:18px;text-align:center;padding:100px 0">
			抱歉，页面无法访问，<span style="font-size:26px;" id="second">3</span>秒后返回
		</div>
	</div>
	<script>
		var second = $('#second').text();
		
		setInterval(function(){
			second--;
			if( second < 1){
				history.back();
			} 
			$('#second').text(second);
		}, 1000)
	</script>
	
@endsection