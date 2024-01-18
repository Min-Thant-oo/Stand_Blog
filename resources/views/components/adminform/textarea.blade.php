@props(['name', 'value'=>''])
<div class="form-group">
    <label for="{{$name}}">{{ucwords($name)}}</label>
    <textarea
        name="{{$name}}" 
        class="form-control rounded-md border border-dark editor" 
        id="{{$name}}" 
        rows="4" 
        placeholder="Please Enter {{ucwords($name)}}">{!!old($name, $value)!!}</textarea>
    <x-ccomponents.error :name='$name' />
</div>