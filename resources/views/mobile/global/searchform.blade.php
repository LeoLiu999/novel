<form @if($position == 'home') class="p-4" @endif method="get" action="{{ route('m_search') }}">		
    	<div class="input-group">
          <input type="text" name="keyword" placeholder="作者、书名" @if($position == 'home')  class="form-control border border-white" @elseif($position=='top') class="form-control  form-control-sm bg-light border border-light"  @endif aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button @if($position == 'home')  class="btn btn-danger" @elseif($position=='top') class="btn btn-danger btn-sm" @endif type="submit">搜索</button>
              </div>
        </div>
</form>