@props(['blog', 'category', 'tag', 'comment'])
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>

  <link rel="stylesheet" href= "{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href= "{{ asset('admin/vendors/base/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href= "{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href= "{{ asset('admin/css/style.css')}}">
  <link rel="shortcut icon" href= "{{ asset('admin/images/favicon.png')}}" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyWp9o7BuoBMVA+PQ9SsB+q7UHEI9I0JjD" crossorigin="anonymous">

  <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>

</head>


<body>
  <div class="container-scroller">

    <x-adminlayout.navbar />

    


    <div class="container-fluid page-body-wrapper">
      

      <x-adminlayout.sidebar />

      <div class="main-panel">

        {{$slot}}

        <x-adminlayout.footer />
        
      </div>
    </div>
  </div>

  {{-- "{{ asset(  )}}" --}}


  <script src="{{ asset( 'admin/vendors/base/vendor.bundle.base.js' )}}"></script>
  
  <script src="{{ asset( 'admin/vendors/chart.js/Chart.min.js' )}}"></script>
  <script src="{{ asset( 'admin/vendors/datatables.net/jquery.dataTables.js' )}}"></script>
  <script src="{{ asset( 'admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js' )}}"></script>

  <script src="{{ asset( 'admin/js/off-canvas.js' )}}"></script>
  <script src="{{ asset( 'admin/js/hoverable-collapse.js' )}}"></script>
  <script src="{{ asset( 'admin/js/template.js' )}}"></script>

  <script src="{{ asset( 'admin/js/dashboard.js' )}}"></script>
  <script src="{{ asset( 'admin/js/data-table.js' )}}"></script>
  <script src="{{ asset( 'admin/js/jquery.dataTables.js' )}}"></script>
  <script src="{{ asset( 'admin/js/dataTables.bootstrap4.js' )}}"></script>

  <script src="{{ asset( 'admin/js/jquery.cookie.js' )}}"  type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  <script type="text/javascript" src="{{ asset( 'js/jquery.min.js' )}}"></script>
  <script type="text/javascript" src="{{ asset( 'js/jquery.min.js' )}}"></script>
  <script type="text/javascript" src="{{ asset( 'js/bootstrap-multiselect.js' )}}"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

  {{-- ckeditor --}}
  <script src="/ckeditor/ckeditor.js"></script>
	<script src="/ckeditor/script.js"></script>

</body>

</html>
