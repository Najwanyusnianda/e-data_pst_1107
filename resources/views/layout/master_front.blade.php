<!DOCTYPE html>
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
</head>
<style>
    html {
    height: 100%;
    }

    img.bg {
  /* Set rules to fill background */
  min-height: 100%;
  min-width: 1024px;
	
  /* Set up proportionate scaling */
  width: 100%;
  height: auto;
	
  /* Set up positioning */
  position: fixed;
  top: 0;
  left: 0;
}

@media screen and (max-width: 1024px) { /* Specific to this particular image */
  img.bg {
    left: 50%;
    margin-left: -512px;   /* 50% */
  }
}


}

</style>
@yield('style')
<body class="layout-3">
  <img src="{{ asset('img/background/temp.jpg') }}" alt="" srcset="" class="bg">
  
    <div id="app">
        <div class="main-wrapper container">
          <div class="navbar-bg"></div>
          <nav class="navbar navbar-expand-lg main-navbar">
            <a href="index.html" class="navbar-brand sidebar-gone-hide">E-Data</a>
            <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
            <div class="nav-collapse">
              <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                <i class="fas fa-ellipsis-v"></i>
              </a>
              <ul class="navbar-nav">
                <li class="nav-item active"><a href="#" class="nav-link">Pusat Data BPS Kab Aceh Barat</a></li>

              </ul>
            </div>

            <ul class="navbar-nav navbar-right">

            </ul>
          </nav>
    
          <nav class="navbar navbar-secondary navbar-expand-lg">
            <div class="container">
              <ul class="navbar-nav">
                <!--<li class="nav-item dropdown">
                  <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                  <ul class="dropdown-menu" style="display: none;">
                    <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                    <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
                  </ul>
                </li>-->

 
                <!--<li class="nav-item dropdown">
                  <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
                  <ul class="dropdown-menu" style="display: none;">
                    <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                      <ul class="dropdown-menu" style="display: none;">
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                          <ul class="dropdown-menu" style="display: none;">
                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                          </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>-->
              </ul>
            </div>
          </nav>
    
          <!-- Main Content -->
          <div class="main-content" style="min-height: 636px;">
            <section class="section">
              <!--<div class="section-header">
                <h1>Top Navigation</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                  <div class="breadcrumb-item"><a href="#">Layout</a></div>
                  <div class="breadcrumb-item">Top Navigation</div>
                </div>
              </div>-->

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
              Copyright © 2020 <div class="bullet"></div> <a href="#">Temp</a>
            </div>
            <div class="footer-right">
              
            </div>
          </footer>
        </div>
      </div>



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
    @yield('script')
</body>

</html>