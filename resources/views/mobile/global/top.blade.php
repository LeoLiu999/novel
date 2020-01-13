<div class="fixed-top">
    <nav class="navbar navbar-light bg-white border-bottom">
    	<!-- div   @if($position == 'catalog')  onclick="window.location.href = '{{ route('m_book', ['idcode' => $book_idcode])  }}'" @else onclick="history.back()" @endif >
        	< 
        </div -->
        
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