@props(['categories'])
<x-adminlayout.layout>
  
    <x-adminform.flashnoti :success="session('success')" />

<div class="m-4 p-4  ">
    <div class="d-flex flex-col gap-2 gap-sm-0 flex-sm-row justify-content-between sm:align-items-center mb-4">
        {{-- <h1 class="text-center">Categories</h1> --}}
        <h1 class="text-center card-title"><strong class="text-xl">Categories</strong></h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary text-white">Create New Item</a>
    </div>
    <form action="" class="d-flex flex-col flex-sm-row gap-sm-3 ">
        <div class="d-flex flex-col flex-1 form-group">
            <label for="search">Search</label>
            <input type="text" value="{{request('search')}}" name="search" class="form-control rounded-md" placeholder="Please enter to search">
        </div>
        <div class="d-flex flex-col justify-content-center col-md-1 ">
            <button class="btn btn-primary px-2 py-2 text-white text-base">Filter</button>
        </div>
    </form>

    <table class="table table-hover border-t">
        <thead>
          <tr>
            <th scope="col"><strong>#</strong></th>
            <th scope="col"><strong>Name</strong></th>
            <th scope="col"><strong>Slug</strong></th>
            <th scope="col"><strong># of Blogs</strong></th>
            {{-- <th scope="col"><strong>Created at</strong></th> --}}
            <th scope="col"><strong>Actions</strong></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($categories->reverse() as $index => $category)
            <tr>
              <th scope="row">{{$index + 1}}</th>
              <td>{{ucwords($category->name)}}</td>
              <td>{{$category->slug}}</td>
              <td>{{$category->blog_count}}</td>
              {{-- <td>{{$category->created_at->format('Y-m-d')}}</td> --}}
              <td class="d-flex gap-2">
                  <a href="{{ route('categories.edit', $category->slug) }}" class="btn btn-primary text-white">Edit</a>
                  <form 
                    action="{{ route('categories.destroy', $category->slug) }}" 
                    method="post" 
                    onsubmit="return confirm('Are you sure you want to delete the category {{$category->name}}?');"
                  >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger bg-danger text-white">Delete</button>
                  </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="border border-white ">
                  <h1 class="text-center text-xl">No Category Found</h1>
              </td>
            </tr> 
          @endforelse
        </tbody>
    </table>
    {{$categories->links()}}
  </div>
</x-adminlayout.layout>