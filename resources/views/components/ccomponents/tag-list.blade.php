<div class="col-lg-12">
    <div class="sidebar-item tags">
      <div class="sidebar-heading">
        <h2>Tag Clouds</h2>
      </div>
      <div class="content">
        <ul>
          @foreach ($tags as $tag)
            <li>
                <a 
                  class="{{ request('tag') == $tag->slug ? 'selected-tag-active' : 'selected-tag' }}"
                  href="/?tag={{$tag->slug}}{{request('search') ? '&search='.request('search') : '' }}{{request('username') ? '&username='.request('username') : '' }}{{request('category') ? '&category='.request('category') : '' }}">{{ucwords($tag->name)}}</a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
</div>