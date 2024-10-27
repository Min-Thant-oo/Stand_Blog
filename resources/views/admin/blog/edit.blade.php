@props(['blog', 'categories', 'tags'])
<x-adminlayout.layout>
<div class=" d-flex justify-center mt-10 ml-10">
    <div class="col-7 grid-margin stretch-card ">
      <div class="card custom-card border border-white">
        <div class="card-body custom-card">
          <h4 class="card-title">Edit Blog</h4>
            <form class="forms-sample" method="POST" action="{{ route('blogs.update', $blog->slug)}}" enctype="multipart/form-data" >
                @csrf
                @method('patch')

                <img src='{{ asset($blog->thumbnail ? "/storage/$blog->thumbnail" : "/blog/assets/images/blog-post-02.jpg" ) }}' width="100px" height="100px" alt="">  
                
                <x-adminform.input 
                    name='thumbnail' 
                    type='file'  
                    class="border border-black p-2"
                />

                <x-adminform.input 
                    name='title' 
                    value="{{$blog->title}}" 
                />

                <x-adminform.input 
                    name='slug' 
                    value="{{$blog->slug}}" 
                />

                <x-adminform.textarea 
                    name='body'
                    value="{{$blog->body}}"  
                />
                
                <div class="form-group">
                    <label for="category">Category</label>
                    <select required name="category" id="category" class="form-select border border-dark mb-1">
                        
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option 
                                value="{{$category->slug}}" 
                                @selected(old('category', $blog->category->slug) == $category->name)
                                {{-- {{$cat->slug == old('category->slug', $blog->category) ? 'selectd' : ''}} --}}
                            >{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                    <a href="/createCategory" class="text-primary">Create New Category</a>
                    <x-ccomponents.error name='category' />
                </div>

                <div class="form-group">
                    <label for="tag">Tags (Press CTRL to select multiple tags up to 3)</label>
                    <select required name="tag[]" value="{{old('tag.0', '')}}" id="tag" multiple class="form-select border border-dark rounded-start mb-1">
                        @foreach ($tags as $tag)
                            {{-- <option value="{{$t->slug}}" {{in_array($t->slug, old('tag', []))? "selected": ""}}>       
                                {{ucwords($t->name)}}
                            </option> --}}
                            <option value="{{$tag->slug}}" 
                                {{in_array($tag->slug, old('tag', [])) || in_array($tag->slug, $blog->tag->pluck('slug')->toArray()) ? "selected": ""}}>
                                {{ucwords($tag->name)}}
                            </option>
                        @endforeach
                    </select>
                    <a href="/createTag" class="text-primary">Create New Tag</a>
                    <x-ccomponents.error name='tag' />
                </div>
                
                <div class="d-flex justify-content-end">
                    <a href="{{ route('blogs.index') }}" class="btn btn-light me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                </div>
            </form>
        </div>
      </div>
  </div>
</div>
</x-adminlayout.layout>