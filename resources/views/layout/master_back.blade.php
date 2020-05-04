<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>(Backend) E-Data 1107</title>
    <!-- General CSS Files -->

    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->

    <link rel="stylesheet" href="{{asset('vendor/stisla/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/stisla/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.min.css')}}">
    @yield('style')
</head>

<body class="sidebar-gone">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('layout._navbar')
            @include('layout._sidebar')

            <!-- Main Content -->
            <div class="main-content" style="min-height: 530px;">
                <section class="section">
                    <div class="section-header">
                        @yield('section_header')
                    </div>

                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright © 2020 <div class="bullet"></div> Design By <a href="#">Temp</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    @yield('modals')

    <!-- General JS Scripts -->
    <script src="{{asset('vendor/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('vendor/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

 

    <script src="{{asset('vendor/stisla/js/stisla.js')}}"></script>
  

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->

    <script src="{{asset('vendor/stisla/js/scripts.js')}}"></script>
    <script src="{{asset('vendor/stisla/js/custom.js')}}"></script>
    
    <script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>

    <div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr"
        style="width: 8px; z-index: 892; cursor: default; position: fixed; top: 0px; left: -8px; height: 576px; opacity: 0; display: block;">
        <div class="nicescroll-cursors"
            style="position: relative; top: 186px; float: right; width: 6px; height: 391px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;">
        </div>
    </div>
    <div id="ascrail2000-hr" class="nicescroll-rails nicescroll-rails-hr"
        style="height: 8px; z-index: 892; top: 568px; left: -250px; position: fixed; cursor: default; display: none; width: 242px; opacity: 0;">
        <div class="nicescroll-cursors"
            style="position: absolute; top: 0px; height: 6px; width: 250px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;">
        </div>
    </div>

    <script>

               
    </script>

    @yield('script')

</body>

</html>