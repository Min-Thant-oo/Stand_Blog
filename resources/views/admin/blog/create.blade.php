@props(['categories', 'tags'])
<x-adminlayout.layout>
<div class=" d-flex justify-center mt-10 ml-10">
    <div class="col-7 grid-margin stretch-card">
      <div class="card custom-card border border-grey">
        <div class="card-body custom-card">
          <h4 class="card-title">Create New Blog</h4>
            <form class="forms-sample" method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data" >
                @csrf
                @method('post')
                <x-adminform.input name='thumbnail' type='file' class="border border-black p-2"/>
                <x-adminform.input name='title' />
                <x-adminform.input name='slug' />
                <x-adminform.textarea name='body' />

                <div class="form-group">
                    <label for="category">Category</label>
                    <select required name="category" id="category" class="form-select border border-dark mb-1">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->slug}}" @selected(old('category') == $category->name)>{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                    <a href="{{ route('categories.create') }}" class="text-primary">Create New Category</a>
                    <x-ccomponents.error name="category" />
                </div>

                <div class="form-group">
                    <label for="tag">Tags (Press CTRL to select multiple tags up to 3)</label>
                    <select required name="tag[]" value="{{old('tag.0', '')}}" id="tag" multiple class="form-select border border-dark rounded-start mb-1">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->slug}}" {{in_array($tag->slug, old('tag', []))? "selected": ""}}>       
                                {{ucwords($tag->name)}}</option>
                        @endforeach
                    </select>
                    <a href="{{ route('tags.create') }}" class="text-primary">Create New Tag</a>
                    <x-ccomponents.error name="tag" />
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