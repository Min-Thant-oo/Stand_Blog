@props(['blog', 'siteconfig'])
    <div class="col-lg-12">
      <div class="blog-post">
        <div class="blog-thumb">

          <img 
            src='{{ asset($blog->thumbnail ? "/storage/$blog->thumbnail" : "https://picsum.photos/520/450?random=" . $blog->id) }}' 
            width="600" 
            height="350" 
            alt="" 
            style="object-fit: cover"
          >

        </div>
        <div class="down-content">
          <a href="/?category={{$blog->category->slug}}">
            <span>{{$blog->category->name}}</span>
          </a>
          <a href="/blogs/{{$blog->slug}}"><h4>{{$blog->title}}</h4></a>
          <ul class="post-info">
            <li>{{$blog->user->name}}</li>
            <li>{{$blog->created_at->format('Y-m-d')}}</li>
            <li>{{$blog->comment->count()}} comments</li>
          </ul>
          <div class="shitty-body">{{$blog->intro}}</div>

          <div class="post-options">
            <div class="row">
              <div class="col-6">
                <ul class="post-tags">
                  <li><i class="fa fa-tags"></i></li>
                  <li>
                    @foreach ($blog->tag as $index => $tag)
                        <a href="/?tag={{$tag->slug}}">{{ ucwords($tag->name) }}</a>{{ $index < $blog->tag->count() - 1 ? ',' : '' }}
                    @endforeach
                  </li>
                </ul>
              </div>
              <div class="col-6">
                <ul class="post-share">
                  <li><i class="fa fa-share-alt"></i></li>
                  <li><a href="{{$siteconfig->facebook}}" target='_blank'>Facebook</a>,</li>
                  <li><a href="{{$siteconfig->twitter}}" target='_blank'> Twitter</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 