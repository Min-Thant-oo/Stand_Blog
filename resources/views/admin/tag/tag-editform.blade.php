@props(['tag'])
<x-adminlayout.layout>
    <div class=" d-flex justify-center mt-10 ml-10">
        <div class="col-7 grid-margin stretch-card ">
          <div class="card custom-card border border-white">
            <div class="card-body custom-card">
              <h4 class="card-title">Edit Tag</h4>
                <form class="forms-sample" method="POST" action="/admin/tags/{{$tag->slug}}/update" >
                    @csrf
                    @method('patch')

                    <x-adminform.input 
                      name='name' 
                      value="{{ucwords($tag->name)}}" 
                    />

                    <x-adminform.input 
                      name='slug' 
                      value="{{$tag->slug}}" 
                    />
    
                    <div class="d-flex justify-content-end">
                        <a href="/admin/tags" class="btn btn-light me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                    </div>
                </form>
            </div>
          </div>
      </div>
    </div>
    </x-adminlayout.layout>