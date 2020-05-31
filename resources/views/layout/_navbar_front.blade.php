<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto"  class="SeachForm" action="{{route('home.seach_post_new')}}" method="GET">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
      <div class="search-element ">
        {{ csrf_field() }}
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" id="search" data-width="500" style="height: 30px;">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        
      </div>
    </form>
    <ul class="navbar-nav navbar-right">

    </ul>
  </nav>