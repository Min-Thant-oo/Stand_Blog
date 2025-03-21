@props(['blogs', 'categories', 'tags'])
<x-adminlayout.layout>

  <x-adminform.flashnoti :success="session('success')" />

  <div class="m-4 p-4">
    <div class="d-flex flex-col gap-2 gap-sm-0 flex-sm-row justify-content-between sm:align-items-center mb-4">
        <h1 class="text-center card-title"><strong class="text-xl">Blogs</strong></h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-primary text-white">Create New Item</a>
    </div>
    
    <form action="/admin/blogs" class="d-flex flex-col flex-sm-row gap-sm-3" method="GET">
        <div class="d-flex flex-col flex-1 col-md- form-group">
            <label for="search">Search</label>
            <input type="text" id="search" name="search" value="{{request('search')}}" class="form-control rounded-md border-dark" placeholder="Please enter to search">
        </div>

        <div class="d-flex flex-col flex-1 col-md- form-group">
          <label for="category">Category</label>
          <select name="category" id="category" class="form-select border border-dark">
            <option value="">All</option>
            @foreach ($categories as $category)
              <option value="{{$category->slug}}" {{ request('category') == $category->slug ? 'selected' : '' }}>{{$category->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="d-flex flex-col flex-1 col-md- form-group">
            <label for="tag">Tag</label>
            <select name="tag" id="tag" class="form-select border border-dark">
              <option value="">All</option>
              @foreach ($tags as $tag)
                <option value="{{$tag->slug}}" {{ request('tag') == $tag->slug ? 'selected' : '' }}>{{$tag->name}}</option>
              @endforeach
            </select>
        </div>
        
        <div class="d-flex flex-col flex-0 justify-content-center col-md- ">
            <button type="submit" class="btn btn-primary px-2 py-2 text-white text-base bg-primary">Filter</button>
        </div>
    </form>

    <table class="table table-hover border-t">
        <thead>
          <tr>
            <th scope="col"><strong>#</strong></th>
            <th scope="col"><strong>Title</strong></th>
            <th style="width: 150px;" scope="col"><strong>Image</strong></th>
            <th scope="col"><strong>Category</strong></th>
            <th scope="col"><strong>Tag</strong></th>
            <th scope="col"><strong>Comments</strong></th>
            <th scope="col"><strong>Actions</strong></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($blogs->reverse() as $index => $blog)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td><a class="text-primary" href="{{ route('blog.show', $blog->slug) }}" target="_blank">{{$blog->title}}</a></td>
              <td>
                <a href="#" data-bs-toggle="modal" data-bs-target="#productModal{{ $blog->id }}">
                  <img 
                    src='{{ asset($blog->thumbnail ? "/storage/$blog->thumbnail" : "https://picsum.photos/520/450?random=" . $blog->id) }}' 
                    alt=""
                    style="object-fit: cover"
                  >  
                </a>
              </td>
              <td>{{$blog->category->name}}</td>
              <td>{{$blog->tag_count}}</td>
              <td>{{$blog->comment_count}}</td>
              <td class="d-flex gap-2">
                <a href="{{ route('blogs.edit', $blog->slug) }}" class="btn btn-primary text-white">Edit</a>
                <form 
                  action="{{ route('blogs.destroy', $blog->slug) }}" 
                  method="post" 
                  onsubmit="return confirm('Are you sure you want to delete this blog?');"
                >
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger bg-danger text-white">Delete</button>
                </form>
                
              </td>
            </tr>

            @foreach ($blogs->reverse() as $index => $blog)
              <div class="modal fade" id="productModal{{ $blog->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $blog->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="productModalLabel{{ $blog->id }}">{{ $blog->title }}</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: red; font-size: 1.5rem;"></button>
                          </div>
                          <div class="modal-body">
                            <img 
                              src='{{ asset($blog->thumbnail ? "/storage/$blog->thumbnail" : "https://picsum.photos/520/450?random=" . $blog->id) }}' 
                              alt=""
                            > 
                          </div>
                      </div>
                  </div>
              </div>
            @endforeach


            @empty
              <tr>
                  <td colspan="7" class="border border-white ">
                      <h1 class="text-center text-xl">No Blogs Found</h1>
                  </td>
              </tr>
          @endforelse
        </tbody>
      
    </table>

    {{$blogs->links()}}
  </div>
</x-adminlayout.layout>