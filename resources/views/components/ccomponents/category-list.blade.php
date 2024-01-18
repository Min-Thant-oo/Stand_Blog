  <div class="col-lg-12">
    <div class="sidebar-item categories">
      <div class="sidebar-heading">
        <h2>Categories</h2>
      </div>
      <div class="content">
        <ul>
          @foreach ($categories as $category)
            <li>
              <a 
                class="{{ request('category') == $category->slug ? 'selected-category-active' : 'selected-category' }}" 
                href="/?category={{$category->slug}}{{request('search') ? '&search='.request('search') : '' }}{{request('username') ? '&username='.request('username') : '' }}{{request('tag') ? '&tag='.request('tag') : '' }}"> - {{ucwords($category->name)}}
              </a>

            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>


  {{-- {{request('search') ? '&search='.request('search') : '' }}{{request('username') ? '&username='.request('username') : '' }}{{request('tag') ? '&tag='.request('tag') : '' }} --}}