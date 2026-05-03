 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">LMHT<sup>Shop</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Chức năng
</div>

<!-- Nav Item - Pages Collapse Menu -->
<?php if($_SESSION['maquyen'] == 2){?>
  <li class="nav-item">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Trang chủ</span></a>
  </li>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="?mod=quanlitaikhoan">
      <i class="fas fa-fw fa-table"></i>
      <span>Quản lý Tài khoản</span></a>
  </li>
<?php } ?>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="?mod=quanlidanhmuc">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý danh mục Sản phẩm</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?mod=quanlisanpham">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý sản phẩm</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?mod=quanlituong">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý tướng</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?mod=quanlitrangphuc">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý trang phục</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?mod=quanlilinhthu">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý linh thú</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?mod=quanlikhuyenmai">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý khuyến mãi</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?mod=quanlibanner">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý banner</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="?mod=quanlithongtinshop">
    <i class="fas fa-fw fa-table"></i>
    <span>Quản lý thông tin shop</span></a>
</li>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->