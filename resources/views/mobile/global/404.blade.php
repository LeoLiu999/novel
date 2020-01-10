@extends('mobile.global.base')

@section('title', '666看书-最新最全热门小说')

@section('keywords', '666看书、笔趣阁、书趣阁、最热最全小说、无广告无弹窗小说网、免费小说、VIP小说免费')

@section('description', '666看书，全网最新最全热门小说，VIP小说免费阅读，无广告无弹窗绿色免费')

@section('top')
	@include('mobile.global.top', ['position_name' => '', 'position' => '404'])
@endsection

@section('content')
	<div class="home-module px-2 pt-3">
		<div class="py-5 text-center" style="height:34.5rem">
			出错啦，找不到您要访问的页面
		</div>
	</div>
@endsection