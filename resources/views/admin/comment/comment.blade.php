@props(['blogs', 'comments'])
<x-adminlayout.layout>
  
    <x-adminform.flashnoti :success="session('success')" />

<div class="m-4 p-4 ">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="text-center card-title"><strong class="text-xl">Comments</strong></h1>
    </div>
    <form action="/admin/comments" class="d-flex flex-col flex-sm-row gap-sm-3" method="GET">
        <div class="d-flex flex-col flex-1 col-md- form-group">
            <label for="search">Search</label>
            <input type="text" name="search" value="{{request('search')}}" class="form-control rounded-md" placeholder="Please enter to search">
        </div>

        <div class="d-flex flex-col flex-1 col-md- form-group">
          <label for="title">Blog</label>
          <select name="title" id="title" class="form-select border border-dark cursor-pointer">
            <option value="">All</option>
              @foreach ($blogs as $blogItem)
                  <option value="{{ $blogItem->slug }}" {{ request('title') == $blogItem->slug ? 'selected' : '' }}>{{ $blogItem->title }}</option>
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
            <th scope="col"><strong>Name</strong></th>
            <th scope="col"><strong>Email</strong></th>
            <th scope="col"><strong>Blog</strong></th>
            <th scope="col"><strong>Comment</strong></th>
            <th scope="col"><strong>Commented at</strong></th>
            <th scope="col"><strong>Actions</strong></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($comments->reverse() as $index => $comment)
            <tr>
              <td style="width: 50px;" scope="row">{{$index + 1}}</td>
              <td>{{$comment->name}}</td>
              <td>
                <a class="text-primary" href="mailto:{{$comment->email}}">{{$comment->email}}</a>
              </td>
              <td>
                <a class="text-primary" href="/blogs/{{$comment->blog->slug}}" target="_blank">{{$comment->blog->title}}</a>
              </td>
              <td>{{\Illuminate\Support\Str::limit($comment->body, 30)}}</td>
              <td>{{$comment->created_at->format('Y-m-d')}}</td>
              <td class="d-flex gap-2">
                <form action="/admin/comments/{{$comment->id}}/delete" method="post" onsubmit="return confirm('Are you sure you want to delete?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger bg-danger text-white">Delete</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="border border-white ">
                    <h1 class="text-center text-xl">No Comments Found</h1>
                </td>
            </tr>
          @endforelse
        </tbody>
    </table>
    {{-- {{$comments->links()}} --}}

</div>
</x-adminlayout.layout>
