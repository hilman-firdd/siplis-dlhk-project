<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">DLHK SIPLIS</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">DS</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('dashboard.index')}}">Dashboard Pengunjung</a></li>
            <li><a class="nav-link" href="#">Dashboard Data IPAL</a></li>
          </ul>
        </li>
        <li class="menu-header">Menu App</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Artikel</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('artikel.index')}}">Kumpulan Artikel</a></li>
            <li><a class="nav-link" href="{{ route('tambah.artikel')}}">Tambah Artikel</a></li>
            <li><a class="nav-link" href="{{ route('kartikel.index')}}">Kategori Artikel</a></li>
          </ul>
        </li>
        <li class=""><a class="nav-link" href="{{ route('profiltpk.index')}}"><i class="far fa-file"></i> <span>Profil TPK</span></a></li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Data</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('dataharian.index')}}">Data Harian IPAL</a></li>
            <li><a class="nav-link" href="{{ route('datakondisi.index')}}">Data Kondisi IPAL</a></li>
          </ul>
        </li>
        <li class=""><a class="nav-link" href="{{ route('grafik.index')}}"><i class="fas fa-chart-line"></i> <span>Grafik</span></a></li>
        <li class=""><a class="nav-link" href="{{ route('galeri.index')}}"><i class="fas fa-image"></i> <span>Gallery</span></a></li>
        <li class=""><a class="nav-link" href="{{ route('sarankeluhan.index')}}"><i class="fas fa-box"></i> <span>Saran & Keluhan</span></a></li>
        <li class=""><a class="nav-link" href="{{ route('agenda.index')}}"><i class="fas fa-calendar-alt"></i> <span>Agenda</span></a></li>
        <li class=""><a class="nav-link" href="{{ route('peraturan.index')}}"><i class="fas fa-unlink"></i> <span>Peraturan Terkait</span></a></li>
        <li class="menu-header">Starter</li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i> <span>Pengaturan</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">User Manajemen</a></li>
            <li><a class="nav-link" href="#">Pengaturan Tampilan</a></li>
          </ul>
        </li>
      </ul>

      <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
          <i class="fas fa-rocket"></i> Documentation
        </a>
      </div>
  </aside>
</div>