@props(['blog', 'siteconfig'])
<x-ccomponents.layout  :blog="$blog" >

  


    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              {{-- <div class="text-content">
                <h4>Post Details</h4>
                <h2>Single blog post</h2>
              </div> --}}
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->
    <x-adminform.flashnoti :success="session('success')" />
      <section class="blog-posts grid-system">
        <div class="container">
          <div class="row">

            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        <img src='{{ asset($blog->thumbnail ? "/storage/$blog->thumbnail" : "/blog/assets/images/blog-post-02.jpg") }}'  alt="" width="600px" height="350px"  style="object-fit: cover;"
                        >

                        {{-- <img src='{{ asset($blog->thumbnail ? "/storage/$blog->thumbnail" : "https://picsum.photos/250/170?random=" . $blog->id) }}' width="520" height="350" alt=""> --}}


                      </div>
                      <div class="down-content">
                        <div class="subscribe">
                          <a href="/?category={{$blog->category->slug}}"><span>{{$blog->category->name}}</span></a>
                        </div>
                        <h4>{{$blog->title}}</h4>
                        <ul class="post-info">
                          <li>{{$blog->user->name}}</li>
                          <li>{{$blog->created_at->format('Y-m-d')}}</li>
                          <li>{{$blog->comment->count()}} comments</li>
                        </ul>
                        <div class="shitty-body">{!!$blog->body!!}</div>
                        <div class="post-options">
                          <div class="row">
                            <div class="col-6">
                              <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                @foreach ($blog->tag as $index=>$tag)
                                  <li>
                                    <a href="#">{{ucwords($tag->name)}}</a>{{$index < $blog->tag->count()-1 ? ',' : ''}}
                                  </li>
                                @endforeach
                              </ul>
                            </div>
                            <div class="col-6">
                              <ul class="post-share">
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><a href="{{$siteconfig->facebook}}" target="_blank">Facebook</a>,</li>
                                <li><a href="{{$siteconfig->twitter}}" target="_blank"> Twitter</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- comment section --}}
                  <x-ccomponents.comments :comments="$blog->comment()->latest()->paginate(3)" />


                  {{-- comment form --}}
                    <div class="col-lg-12">
                      <div class="sidebar-item submit-comment">
                        <div class="sidebar-heading">
                          <h2>LEAVE A COMMENT<br /><br /> Your email address will not be published.</h2>
                          
                        </div>
                        <div class="content">
                          <form id="comment" action="/blogs/{{$blog->slug}}/comments" method="post">
                            @csrf
                            <div class="row">
                              <div class="col-md-6 col-sm-12">
                                
                                  <input required name="name" type="text" value="{{old('name')}}" id="name" placeholder="YOUR NAME" >
                                  <x-ccomponents.error name='name' />
                                
                              </div>
                              <div class="col-md-6 col-sm-12">
                                
                                  <input required name="email" type="text" value="{{old('email')}}" id="email" placeholder="YOUR EMAIL" >
                                  <x-ccomponents.error name='email' />
                                
                              </div>
                              <div class="col-lg-12 ">
                                
                                  <textarea required name="body" rows="6" id="message" placeholder="TYPE YOUR COMMENT" >{{old('body')}}</textarea>
                                  <x-ccomponents.error name='body' />
                                
                              </div>
                              <div class="col-lg-12">
                                
                                  <button type="submit" id="form-submit" class="main-button">Submit</button>
                                
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>


            {{-- side bar --}}
            <div class="col-lg-4">
              <div class="sidebar">
                <div class="row">

                  {{-- search --}}
                  <x-ccomponents.search />


                  {{-- most read --}}
                  <x-ccomponents.most-read :mostRead_blogs="$mostRead_blogs" />


                  {{-- category-list --}}
                  <x-ccomponents.category-list />

                  {{-- tag-list --}}
                  <x-ccomponents.tag-list />


                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



</x-ccomponents.layout>