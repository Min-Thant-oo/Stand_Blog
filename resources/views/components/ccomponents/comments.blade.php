@props(['comments'])
<div class="col-lg-12">
    <div class="sidebar-item comments">
      <div class="sidebar-heading">
        <h2>{{$comments->count()}} comments</h2>
      </div>
      @foreach ($comments as $comment)
        <x-ccomponents.single-comment :comment="$comment" />
      @endforeach
      {{$comments->links('vendor.pagination.custom-pagination')}}
      <x-ccomponents.comment-form />
    </div>
  </div>