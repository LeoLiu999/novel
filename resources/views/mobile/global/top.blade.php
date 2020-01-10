<div class="fixed-top">
    <nav class="navbar navbar-light bg-white border-bottom">
    	<div onclick="history.back()">
        	< 
        </div>
        <div>
        @include('mobile.global.searchform', ['position' => 'top'])
        </div>
    </nav>
     @include('mobile.global.nav', ['position' => $position])
</div>
<div style="height:10rem">
</div>