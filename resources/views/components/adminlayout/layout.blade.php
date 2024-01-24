@props(['blog', 'category', 'tag', 'comment'])
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>

  <link rel="stylesheet" href= "{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href= "{{ asset('admin/css/style.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>


<body>
  <div class="container-scroller">

    <x-adminlayout.navbar />

    


    <div class="container-fluid page-body-wrapper">
      

      <x-adminlayout.sidebar />

      <div class="main-panel">

        {{$slot}}

        {{-- <x-adminlayout.footer /> --}}
        
      </div>
    </div>
  </div>

  <script src="{{ asset( 'admin/vendors/base/vendor.bundle.base.js' )}}"></script>
  <script src="{{ asset( 'admin/js/template.js' )}}"></script>
  <script src="{{ asset( 'admin/js/jquery.cookie.js' )}}"  type="text/javascript"></script>

  {{-- ckeditor --}}
  <script src="/ckeditor/ckeditor.js"></script>
	<script src="/ckeditor/script.js"></script>

</body>

</html>
