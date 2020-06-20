<div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper" class="" style="">
        <div class="sidebar-brand ">
            <a href="index.html">E-Data BPS Aceh Barat</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">E-D</a>
          </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Beranda</li>

            <li class="{{Request::is('/')  ? 'active' : ''}}"><a class="nav-link" href="{{route('home.home')}}">
                <i class="fas fa-fire"></i>
                    <span>Beranda</span>
                   </a>
            </li>   
            <li class="menu-header">Pencarian</li>

        <li class="{{Request::is('search_data')  ? 'active' : (Request::is('search_data/*')  ? 'active' : '')}}"><a class="nav-link" href="{{route('home.home.data')}}">
            <i class="fas fa-list"></i>
                <span>Pencarian Data</span>
               </a>
        </li>    
        <li  class="{{Request::is('search_pub')  ? 'active' : (Request::is('search_pub/*')  ? 'active' : '')}}"><a class="nav-link" href="{{route('home.pub.search_index')}}"><i class="fas fa-newspaper"></i>
             <span>Pencarian Publikasi</span>
            </a>
        </li>
           <!-- <li class="menu-header">Subject</li>
            <li class="dropdown ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-circle fa-sm"></i>
                            <span><small>Sosial & Kependudukan</small></span>
                    </a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>2])}}">Geografi</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>6])}}">Iklim</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>7])}}">IPM</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>10])}}">Kemiskinan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>11])}}">Kesehatan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>12])}}">Ketenagakerjaan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>16])}}">Kriminalitas</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>18])}}">Pemerintahan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>19])}}">Pendidikan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>20])}}">Kependudukan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>25])}}">Potensi Desa</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>28])}}">Sosial Budaya</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-circle fa-sm"></i>
                    <span><small>Ekonomi & Perdagangan</small></span>
                  </a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>1])}}">Energi</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>3])}}">Harga Eceran</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>5])}}">Hotel</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>8])}}">Industri</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>9])}}">Inflasi</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>13])}}">Keuangan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>14])}}">Komunikasi</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>15])}}">Konsumsi & Pengeluaran</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>17])}}">Pariwisata</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>21])}}">Perdagangan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>26])}}">PDRB (Lapangan Usaha)</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>27])}}">PDRB (Pengeluaran)</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>30])}}">Transportasi</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-circle fa-sm"></i>
                    <span><small>Pertanian & Kehutanan</small>
                    </span>
                </a> 
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>4])}}">Holtikultura</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>22])}}">Perikanan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>23])}}">Perkebunan</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>24])}}">Peternakani</a></li>
                    <li><a class="nav-link" href="{{route('home.subject_detail',['subject_id' =>29])}}">Tanaman Pangan</a></li>
                </ul>
            </li>-->


      

            <li class="menu-header">Sosial Media </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-comments"></i><span>Sosial Media</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li class="#">
            
                        <a href="https://www.facebook.com/BPS-Kabupaten-Aceh-Barat-794846153959538/"  target="_blank"><i class="fab fa-facebook-f fa-2x" style="color:#54a0ff"></i> Facebook</a>
       
                </li> 
                <li class="#">
                    <a href="https://twitter.com/bpskabacehbarat"  target="_blank"><i class="fab fa-twitter fa-2x" style="color: #48dbfb"></i> Twitter</a>
                </li> 
                <li class="#">
                    <a href="https://www.instagram.com/bps.kab.acehbarat/"  target="_blank"><i class="fab fa-instagram fa-2x" style="color: #f368e0"></i> Instagram</a>
                </li> 
                <li class="#">
                    <a href="https://www.youtube.com/channel/UCp856i__QgzWrpzIOgoaGHw" target="_blank"><i class="fab fa-youtube" style="color: #ee5253"></i> Youtube</a>
                </li> 
                </ul>
              </li>
            <!--<li>
                <a class="nav-link" href="index-0.html"><i class="fab fa-facebook-f"></i>Facebook</a>
        
            </li>
            
            <li><a class="nav-link" href="index.html"><i class="fab fa-twitter"></i>Twitter</a></li>
            <li><a class="nav-link" href="index.html"><i class="fab fa-instagram"></i>Instagram</a></li>
            <li><a class="nav-link" href="index.html"><i class="fab fa-youtube"></i>youtube</a></li>-->

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> FAQ
            </a>
        </div>
    </aside>
</div>