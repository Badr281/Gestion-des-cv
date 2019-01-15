<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" >  -->
    <link rel="stylesheet" href="{{asset('css/themes.css')}}" type="text/css">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" ></script>
  <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    
</head>
<body>
    <div id="app">
      
       @include('partial.main')
       <br>
       @include('partial.message')
      
     
            @yield('content')
            
    </div>

    
 
    

    <!-- <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.js')}}" >  -->
    
   
    @yield('javascripts')
    

</body>
</html>
