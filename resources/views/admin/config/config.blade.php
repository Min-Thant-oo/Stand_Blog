@props(['siteconfig'])

<x-adminlayout.layout :siteconfig="$siteconfig">
  
    <x-adminform.flashnoti :success="session('success')" />

<div class=" d-flex justify-center mt-10 ml-10">
  <div class="col-7 grid-margin stretch-card ">
    <div class="card custom-card border border-white">
      <div class="card-body custom-card">
        <h4 class="card-title">Site Config</h4>
        <form class="forms-sample" method="POST" action="/admin/Site-config/{{$siteconfig->id}}/update" >
          @csrf
          @method('patch')
          
          <x-adminform.input name='facebook' value='{{$siteconfig->facebook}}' />
          <x-adminform.input name='twitter' value='{{$siteconfig->twitter}}' />
          <x-adminform.input name='linkedIn' value='{{$siteconfig->linkedIn}}' />
          <x-adminform.textarea name='about' value='{{$siteconfig->about}}' />
          <x-adminform.input name='phonenumber' type='tel' value='{{$siteconfig->phonenumber}}' />
          <x-adminform.input name='email' type='email' value='{{$siteconfig->email}}' />
          <x-adminform.input name='address' value='{{$siteconfig->address}}' />
          
          <div class="d-flex justify-content-end gap-2">
            <a href="/adminSite-config/edit" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary bg-primary">Update</button>
          </div>

        </form>
      </div>
    </div>
</div>
</div>
</x-adminlayout.layout>