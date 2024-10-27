
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="generator" content="Hugo 0.101.0">
    <title>@section('title') - Портал новостей | @show</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{asset('assets/css/dashboard.css')}}" rel="stylesheet" >

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<x-admin.header></x-admin.header>

<div class="container-fluid">
  <div class="row">
    <x-admin.sidebar></x-admin.sidebar>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        @yield('content')
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="{{asset('assets/js/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>  
    
    @stack('js')
    
  </body>
</html>
