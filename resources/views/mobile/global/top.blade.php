<div class="fixed-top">
    <nav class="navbar navbar-light bg-white border-bottom">
    	<div onclick="history.back()">
        	< 
        </div>
        <div class="">{{ $position_name }}</div>
        @include('mobile.global.searchform', ['position' => 'top'])
    </nav>
     @include('mobile.global.nav', ['position' => $position])
</div>
<div style="height:10rem">
</div>