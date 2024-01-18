@if (session('success'))
    <div class="parent-div">
        <div class="alert alert-success text-center rounded-none" style="margin-right: -8px; margin-left: -49px">{{ session('success') }}</div>
    </div>
@endif