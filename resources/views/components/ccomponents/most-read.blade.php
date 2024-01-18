@props(['mostRead_blogs'])
<div class="col-lg-12">
    <div class="sidebar-item recent-posts">
      <div class="sidebar-heading">
        <h2>Most Read</h2>
      </div>
      <div class="content">
        <ul>
          @foreach ($mostRead_blogs as $blog)
            <li>
              <a href="/blogs/{{$blog->slug}}">
                <h5>{{ucwords($blog->title)}}</h5>
                <span>{{$blog->created_at->format('Y-m-d')}}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>