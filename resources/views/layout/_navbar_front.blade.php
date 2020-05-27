<nav class="navbar navbar-expand-lg main-navbar">
   
    <div class="">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                class="fas fa-bars"></i></a></li>
            <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
                <a href="{{route('home.home').'/'}}" class="nav-link "><span>Beranda</span></a>
            </li>
        </ul>
    </div>


</nav>