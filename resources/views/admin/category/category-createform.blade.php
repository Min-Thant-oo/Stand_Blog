<x-adminlayout.layout>
<div class=" d-flex justify-center mt-10 ml-10">
    <div class="col-7 grid-margin stretch-card ">
      <div class="card custom-card border border-white">
        <div class="card-body custom-card">
          <h4 class="card-title">Create New Category</h4>
            <form class="forms-sample" method="POST" action="/admin/categories/store" >
                @csrf

                <x-adminform.input name='name' />
                <x-adminform.input name='slug' />

                <div class="d-flex justify-content-end">
                    <a href="/admin/categories" class="btn btn-light me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                </div>
            </form>
        </div>
      </div>
  </div>
</div>
</x-adminlayout.layout>