<div class="col-lg-12">
    <div class="sidebar-item search">
      <form id="search_form" name="gs" method="GET" action="/">

        @if (request('username'))
            <input name="username" type="hidden" value="{{request('username')}}">
        @endif
        @if (request('category'))
            <input name="category" type="hidden" value="{{request('category')}}">
        @endif
        @if (request('tag'))
            <input name="tag" type="hidden" value="{{request('tag')}}">
        @endif
        
        <input type="text" name="search" value="{{request('search')}}" class="{{ request('search') ?  'search' : 'searchText' }}" placeholder="Type to search..." autocomplete="on">
      
      </form>
    </div>
</div>