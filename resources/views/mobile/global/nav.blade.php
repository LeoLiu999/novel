<div class="row py-3 bg-white m-auto">
	@if($position == 'home')
		<div class="col-4 text-center">
			<a href="{{ route('m_categories') }}" class="icon-a">
				<i class="icon icon-category"></i>
				<b class="icon-b">分类</b>
			</a>
		</div>
		<div class="col-4 text-center">
			<a href="{{ route('m_rankingList') }}" class="icon-a">
				<i class="icon icon-rank"></i>
				<b class="icon-b">排行</b>
			</a>
		</div>
		<div class="col-4 text-center">
			<a href="{{ route('m_finished') }}" class="icon-a">
				<i class="icon icon-finish"></i>
				<b class="icon-b">完本</b>
			</a>
		</div>
	@elseif($position == 'categories')
		<div class="col-3 text-center">
			<a href="{{ route('mobile') }}" class="icon-a">
				<i class="icon icon-home"></i>
				<b class="icon-b">首页</b>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('m_rankingList') }}" class="icon-a">
				<i class="icon icon-rank"></i>
				<b class="icon-b">排行</b>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('m_finished') }}" class="icon-a">
				<i class="icon icon-finish"></i>
				<b class="icon-b">完本</b>
			</a>
		</div>
		<div class="col-3 text-center">
    		<a href="{{ route('m_bookrack') }}" class="icon-a">
    			<i class="icon icon-account"></i>
    			<b class="icon-b">书架</b>
    		</a>
		</div>
	@elseif($position == 'rankingList')
		<div class="col-3 text-center">
			<a href="{{ route('mobile') }}" class="icon-a">
				<i class="icon icon-home"></i>
				<b class="icon-b">首页</b>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('m_categories') }}" class="icon-a">
				<i class="icon icon-category"></i>
				<b class="icon-b">分类</b>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('m_finished') }}" class="icon-a">
				<i class="icon icon-finish"></i>
				<b class="icon-b">完本</b>
			</a>
		</div>
		<div class="col-3 text-center">
    		<a href="{{ route('m_bookrack') }}" class="icon-a">
    			<i class="icon icon-account"></i>
    			<b class="icon-b">书架</b>
    		</a>
		</div>
	@elseif($position == 'finished')
		<div class="col-3 text-center">
			<a href="{{ route('mobile') }}" class="icon-a">
				<i class="icon icon-home"></i>
				<b class="icon-b">首页</b>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('m_categories') }}" class="icon-a">
				<i class="icon icon-category"></i>
				<b class="icon-b">分类</b>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('m_rankingList') }}" class="icon-a">
				<i class="icon icon-rank"></i>
				<b class="icon-b">排行</b>
			</a>
		</div>
		<div class="col-3 text-center">
    		<a href="{{ route('m_bookrack') }}" class="icon-a">
    			<i class="icon icon-account"></i>
    			<b class="icon-b">书架</b>
    		</a>
		</div>
	@elseif($position == 'bookrack')
		<div class="col-3 text-center">
			<a href="{{ route('mobile') }}" class="icon-a">
				<i class="icon icon-home"></i>
				<b class="icon-b">首页</b>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('m_categories') }}" class="icon-a">
				<i class="icon icon-category"></i>
				<b class="icon-b">分类</b>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('m_rankingList') }}" class="icon-a">
				<i class="icon icon-rank"></i>
				<b class="icon-b">排行</b>
			</a>
		</div>
		<div class="col-3 text-center">
			<a href="{{ route('m_finished') }}" class="icon-a">
				<i class="icon icon-finish"></i>
				<b class="icon-b">完本</b>
			</a>
		</div>
	
	@else
		<div class="col-2 text-center">
			<a href="{{ route('mobile') }}" class="icon-a">
				<i class="icon icon-home"></i>
				<b class="icon-b">首页</b>
			</a>
		</div>
		<div class="col-2 text-center">
			<a href="{{ route('m_categories') }}" class="icon-a">
				<i class="icon icon-category"></i>
				<b class="icon-b">分类</b>
			</a>
		</div>
		<div class="col-2 text-center">
			<a href="{{ route('m_rankingList') }}" class="icon-a">
				<i class="icon icon-rank"></i>
				<b class="icon-b">排行</b>
			</a>
		</div>
		<div class="col-2 text-center">
			<a href="{{ route('m_finished') }}" class="icon-a">
				<i class="icon icon-finish"></i>
				<b class="icon-b">完本</b>
			</a>
		</div>
		<div class="col text-center">
    		<a href="{{ route('m_bookrack') }}" class="icon-a">
    			<i class="icon icon-account"></i>
    			<b class="icon-b">书架</b>
    		</a>
		</div>
	@endif
</div>