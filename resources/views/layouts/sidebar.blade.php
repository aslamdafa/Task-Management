<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-store"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Ramadhan Mart</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-chart-line"></i>
      <span>Dashboard</span>
    </a>
  </li>

  @if (auth()->user()->level === 'Admin')
    <!-- Rute Admin -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('products') }}">
        <i class="fas fa-fw fa-box"></i>
        <span>Produk</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('categories') }}">
        <i class="fas fa-fw fa-layer-group"></i>
        <span>Kategori</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('verifications.index') }}">
        <i class="fas fa-fw fa-check"></i>
        <span>Verifikasi</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('trello.index') }}">
        <i class="fas fa-fw fa-users"></i>
        <span>Pegawai</span>
      </a>
    </li>
  @endif

  <!-- Rute untuk Semua Pengguna -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('orders.index') }}">
      <i class="fas fa-fw fa-layer-group"></i>
      <span>Pesanan</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('profile') }}">
      <i class="fas fa-fw fa-user-alt"></i>
      <span>Profil</span>
    </a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
</ul>