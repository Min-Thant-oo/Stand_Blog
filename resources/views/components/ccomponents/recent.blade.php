@props(['blogs'])
{{-- @dd($blogs) --}}
<div class="col-lg-12">
    <div class="sidebar-item recent-posts">
      <div class="sidebar-heading">
        <h2>Recent Posts</h2>
      </div>
      <div class="content">
        <ul>
          @foreach ($blogs as $blog)
            <li>
              <a href="/blogs/{{$blog->slug}}">
                <h5>{{ucwords($blog->title)}}</h5>
                <span>{{$blog->created_at->format("F j, Y")}}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>