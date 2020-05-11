<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Data BPS Kab. Aceh Barat</title>
    <!-- General CSS Files -->

    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->

    <link rel="stylesheet" href="{{asset('vendor/stisla/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/stisla/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.min.css')}}">
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
      
        gtag('config', 'UA-94034622-3');
      </script>
</head>

<body class="layout-2" style="position: relative;">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('layout._navbar_front')
            @include('layout._sidebar_front')

            <!-- Main Content -->
            <div class="main-content" style="min-height: 481px;">
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
                <div class="text-center">
                    <p style="margin-bottom: 0px;">Badan Pusat Statistik Kabupaten Aceh Barat (Statistics Aceh Barat)</p>
                    <p style="margin-bottom: 0px;">Jl. Sisingamangaraja No. 2 Meulaboh 23617 Aceh Barat, Telp/Faks (62-655) 7553330, Mailbox : pst1107@bps.go.id</p>
                    <p style="margin-bottom: 0px;">Hak Cipta © 2020 Badan Pusat Statistik</p>
                    <p style="margin-bottom: 0px;">Semua Hak Dilindungi</p>
                </div>
                <!--<div class="footer-left">

                </div>
                <div class="footer-right">

                </div>-->
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <!-- General JS Scripts -->
    <script src="{{asset('vendor/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('vendor/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('vendor/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

 

    <script src="{{asset('vendor/stisla/js/stisla.js')}}"></script>
    <script src="{{asset('vendor/sticky-kit.min.js')}}"></script>
        <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->

    <script src="{{asset('vendor/stisla/js/scripts.js')}}"></script>
    <script src="{{asset('vendor/stisla/js/custom.js')}}"></script>

    <script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>
    @yield('script')
    <div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr"
        style="width: 8px; z-index: 892; cursor: default; position: absolute; top: 148.656px; left: 147.875px; height: 489px; display: none; opacity: 0;">
        <div class="nicescroll-cursors"
            style="position: relative; top: 0px; float: right; width: 6px; height: 0px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;">
        </div>
    </div>
    <div id="ascrail2000-hr" class="nicescroll-rails nicescroll-rails-hr"
        style="height: 8px; z-index: 892; top: 629.656px; left: -55.1563px; position: absolute; cursor: default; display: none; opacity: 0; width: 203px;">
        <div class="nicescroll-cursors"
            style="position: absolute; top: 0px; height: 6px; width: 0px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;">
        </div>
    </div>

</body>

</html>