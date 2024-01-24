@props(['blog'])
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="TemplateMo">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <title>{{ isset($blog->title) ? ucwords($blog->title) : 'Stand Blog by Min Thant Oo' }}</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('blog/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="{{ asset('blog/assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/assets/css/templatemo-stand-blog.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/assets/css/owl.css') }}">

    </head>

  <body>

    <x-ccomponents.preloader /> 

    <x-ccomponents.navbar />

          {{$slot}}

    <x-ccomponents.footer />

      <!-- Bootstrap core JavaScript -->
      <script src="{{ asset('blog/vendor/jquery/jquery.min.js') }}"></script>
      {{-- <script src="{{ asset('blog/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}

      <!-- Additional Scripts -->
      <script src="{{ asset('blog/assets/js/custom.js') }}"></script>
      <script src="{{ asset('blog/assets/js/owl.js') }}"></script>
      <script src="{{ asset('blog/assets/js/slick.js') }}"></script>
      <script src="{{ asset('blog/assets/js/isotope.js') }}"></script>
      <script src="{{ asset('blog/assets/js/accordions.js') }}"></script>

  
      <script language = "text/Javascript"> 
        cleared[0] = cleared[1] = cleared[2] = 0; 
        function clearField(t){                   
        if(! cleared[t.id]){                      
            cleared[t.id] = 1;  
            t.value='';         
            t.style.color='#fff';
            }
        }
      </script>
    </body>
</html>
