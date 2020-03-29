<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- General CSS Files -->

    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->

    <link rel="stylesheet" href="{{asset('vendor/stisla/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/stisla/css/components.css')}}">
</head>
<style>
    html {
    height: 100%;
    }




</style>
<body class="layout-3">

  
    <div id="app">
        <section class="section">
@yield('content')
        </section>
      </div>



    <!-- General JS Scripts -->
    <script src="{{asset('vendor/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('vendor/popper.js')}}"></script>

    <script src="{{asset('vendor/stisla/js/stisla.js')}}"></script>


    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->

    <script src="{{asset('vendor/stisla/js/scripts.js')}}"></script>
    <script src="{{asset('vendor/stisla/js/custom.js')}}"></script>

</body>

</html>