<div class="row py-3 bg-white">
	@if($position != 'home')
		<div class="col text-center">
			<a href="{{ route('mobile') }}" class="icon-a">
				<i class="icon icon-home"></i>
				<b class="icon-b">首页</b>
			</a>
		</div>
	@endif
	@if($position != 'categories')
		<div class="col text-center">
			<a href="{{ route('m_categories') }}" class="icon-a">
				<i class="icon icon-category"></i>
				<b class="icon-b">分类</b>
			</a>
		</div>
	@endif
	@if($position != 'rankingList')
		<div class="col text-center">
			<a href="{{ route('m_rankingList') }}" class="icon-a">
				<i class="icon icon-rank"></i>
				<b class="icon-b">排行</b>
			</a>
		</div>
	@endif
	@if($position != 'finished')
		<div class="col text-center">
			<a href="{{ route('m_finished') }}" class="icon-a">
				<i class="icon icon-finish"></i>
				<b class="icon-b">完本</b>
			</a>
		</div>
	@endif
	@if($position != 'bookrack' and $position != 'home')
	<div class="col text-center">
		<a href="{{ route('m_bookrack') }}" class="icon-a">
			<i class="icon icon-account"></i>
			<b class="icon-b">书架</b>
		</a>
	</div>
	@endif
</div>