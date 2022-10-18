<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','ONLINE FOOD ORDERING MANAGEMENT')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="shortcut icon" href="{{asset('images/icon1.png')}}">
  <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <!-- Font Awesome -->
   <script src="https://kit.fontawesome.com/7d545a313a.js" crossorigin="anonymous"></script>
    @include('partials.stylesheet')
</head>
<body>
    <div class="wrapper">
    <!--navbar start-->
    
    @include('partials.nav')
    
 


@yield('content')
    <!--footer-->
@include('partials.footer')
    </div>

@include('partials.scrept')
@yield('script')


</body>
</html>



