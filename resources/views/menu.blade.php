<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">       
      <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="Alfa Tour & Travel admin logo" src="{{ asset('theme-assets/images/logo/logo.jpeg') }}"/>
          <h3 class="brand-text">Alfa Tour & Travel</h3></a></li>
      <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
    </ul>
  </div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main menu" id="main-menu-navigation" data-menu="menu-navigation">
      <li class="active"><a href="{{ URL('home') }}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('lokasi') }}"><i class="ft-map-pin"></i><span class="menu-title" data-i18n="">Lokasi</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('trip') }}"><i class="ft-map"></i><span class="menu-title" data-i18n="">Trip</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('kategori/fasilitas') }}"><i class="ft-copy"></i><span class="menu-title" data-i18n="">Kategori Fasilitas</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('wisata') }}"><i class="ft-clipboard"></i><span class="menu-title" data-i18n="">Paket Wisata</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('tanggal/wisata') }}"><i class="ft-calendar"></i><span class="menu-title" data-i18n="">Tanggal Wisata</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('itenerary') }}"><i class="ft-book"></i><span class="menu-title" data-i18n="">Itenerary</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('syarat') }}"><i class="ft-file-text"></i><span class="menu-title" data-i18n="">Syarat & Ketentuan</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('pemesanan') }}"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Transaksi</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('reschedule') }}"><i class="ft-refresh-ccw"></i><span class="menu-title" data-i18n="">Reschedule</span></a>
      </li>
      <li class="nav-item"><a href="{{ URL('refund') }}"><i class="ft-align-justify"></i><span class="menu-title" data-i18n="">Refund</span></a>
      </li>
    </ul>
  </div>
  <div class="navigation-background"></div>
</div>