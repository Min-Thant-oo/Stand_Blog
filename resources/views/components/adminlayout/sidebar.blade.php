<nav class="sidebar sidebar-offcanvas me-5" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home.index') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Home</span>
        </a>
      </li>
      <li class="nav-item {{ request()->routeIs('blogs.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('blogs.index') }}">
          <i class="mdi mdi-blogger menu-icon"></i>
          <span class="menu-title">Blogs</span>
        </a>
      </li>
      <li class="nav-item {{ request()->routeIs('comments.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('comments.index') }}">
          <i class="mdi mdi-comment-text menu-icon"></i>
          <span class="menu-title">Comments</span>
        </a>
      </li>
      <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('categories.index') }}">
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
          <span class="menu-title">Category</span>
        </a>
      </li>
      <li class="nav-item {{ request()->routeIs('tags.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tags.index') }}">
          <i class="mdi mdi-tag menu-icon"></i>
          <span class="menu-title">Tags</span>
        </a>
      </li>
      <li class="nav-item {{ request()->routeIs('contactmessages.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contactmessages.index') }}">
          <i class="mdi mdi-email-outline menu-icon"></i>
          <span class="menu-title">Contact Messages</span>
        </a>
      </li>
      <li class="nav-item {{ request()->routeIs('siteconfig.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('siteconfig.edit') }}">
          <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Site Config</span>
        </a>
      </li>
      
    </ul>
  </nav>