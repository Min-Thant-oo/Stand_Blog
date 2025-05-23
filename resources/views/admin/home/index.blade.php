@props(['blogs', 'comments', 'blogCount', 'tagCount', 'categoryCount', 'commentCount'])
{{-- @dd($blog) --}}
<x-adminlayout.layout>
  <div class="content-wrapper">
    <div class="row">

      {{-- Top --}}
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body dashboard-tabs p-0">
            <div class="tab-content py-0 px-0">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                <div class="d-flex flex-wrap justify-content-xl-between">
                  <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-2 text-muted">Total Blogs</small>
                      <h5 class="me-2 mb-0">{{$blogCount}}</h5>
                    </div>
                  </div>
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-clipboard-text
                    \f244 me-3 icon-lg text-danger"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-2 text-muted">Total Categories</small>
                      <h5 class="me-2 mb-0">{{$categoryCount}}</h5>
                    </div>
                  </div>
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-tag-multiple
                    \f5e9 me-3 icon-lg text-danger"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-2 text-muted">Total Tags</small>
                      <h5 class="me-2 mb-0">{{$tagCount}}</h5>
                    </div>
                  </div>
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-eye me-3 icon-lg text-success"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-2 text-muted">Unique Blog Viewed</small>
                      <h5 class="me-2 mb-0">200</h5>
                    </div>
                  </div>
                  <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                    <i class="mdi mdi-comment
                    \f270 me-3 icon-lg text-warning"></i>
                    <div class="d-flex flex-column justify-content-around">
                      <small class="mb-2 text-muted">Total Blog Comments</small>
                      <h5 class="me-2 mb-0">{{$commentCount}}</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- left side --}}
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="mb-4 card-title">Recent Posts</p>

            <div class="row mb-4" >
                @foreach ($blogs as $blog)
                  <a href="/blogs/{{$blog->slug}}" target="_blank" style="text-decoration: none; color: inherit">
                    {{-- <div class="row p-2 mb-4"> --}}
                    <div class="col sm:row mb-4 mt-1">
                      <div class="col-sm-4 col-md-12">
                        <img 
                        src='{{ asset($blog->thumbnail ? "/storage/$blog->thumbnail" : "https://picsum.photos/1000/680?random=" . $blog->id) }}' 
                          {{-- src='{{ asset($blog->thumbnail ? "/storage/$blog->thumbnail" : "https://source.unsplash.com/random/{$blog->id}") }}'  --}}
                          alt=""
                          style="width: 150px !important; height: 90px !important; object-fit: cover;"
                        >  
                      </div>
                      <div class="col-sm-8 col-md-12 ">
                        <p class="card-description mb-2">{{$blog->category->name}}</p>
                        <h4 class="card-title text-primary mb-2">{{$blog->title}}</h4>
                        <p class="mb-">{{$blog->intro}}</p>
                      </div>
                    </div>
                  </a>
                @endforeach
            </div>

          </div>
        </div>
      </div>

      {{-- right side --}}
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="mb-4 card-title">Recent Comments</p>

            @foreach ($comments as $comment)
              <a href="/blogs/{{$comment->blog->slug}}" target="_blank" style="text-decoration: none; color: inherit">
                <div class=" p-4 pb-2 mb-4 pt- border rounded cursor-pointer">
                  <div class="col-md-12">
                      <h4 class="card-title text-primary mb-2">{{$comment->blog->title}}</h4>
                      <p class="card-description mb-2">{{$comment->name}}</p>
                      <p class="mb-2">{{$comment->body}}</p>
                  </div>
                </div>
              </a>
            @endforeach

            

          </div>
        </div>
      </div>

    </div>
  </div>
  </x-adminlayout.layout>
