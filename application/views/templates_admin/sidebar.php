 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <div class="sidebar-brand-icon rotate-n-15">

  </div>
  <img src="<?= base_url().'assets/images/icons/icon.png' ?>" class="img-responsive" width="40px">
  <div class="sidebar-brand-text mx-3">I'dadiyah<sup>NJ</sup></div>
</a>


 <div class="sidebar-heading mt-2">
        <span class="font-weight-bold">Admin</span>
  </div>

<!-- Divider -->
<hr class="mt-2 sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin') ?>">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span class="font-weight-bold">Dashboard</span></a>
</li>
<hr class="sidebar-divider my-0">

<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/pengguna') ?>">
    <i class="fas fa-fw fa-user"></i>
    <span class="font-weight-bold">Pengguna</span>
  </a>
</li>
<hr class="sidebar-divider my-0">
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/data_santri') ?>">
    <i class="fas fa-fw fa-database"></i>
    <span class="font-weight-bold">Data Santri</span>
  </a>
</li>

<hr class="sidebar-divider my-0">
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/input_nilai') ?>">
    <i class="fas fa-fw fa-keyboard"></i>
    <span class="font-weight-bold">Input Nilai</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/hasil_nilai') ?>">
    <i class="fas fa-fw fa-file-signature"></i>
    <span class="font-weight-bold">Hasil Nilai</span>
  </a>
</li>
<hr class="sidebar-divider my-0">
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('admin/laporan') ?>">
    <i class="fas fa-fw fa-file-alt"></i>
    <span class="font-weight-bold">Laporan</span>
  </a>
</li>
<hr class="sidebar-divider my-0">
<li class="nav-item">
  <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
    <i class="fas fa-fw fa-sign-out-alt"></i>
    <span class="font-weight-bold">Keluar</span>
  </a>
</li>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
