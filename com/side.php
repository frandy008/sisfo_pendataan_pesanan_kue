<?php  
session_start();
if (!isset($_SESSION['sisfo_kue'])) {
  header('location:login.php');
}
?>
<nav class="side-navbar z-index-40">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center py-4 px-3"><img class="avatar shadow-0 img-fluid rounded-circle" src="img/avatar-1.jpg" alt="...">
    <div class="ms-3 title">
      <h1 class="h4 mb-2"><?php echo $_SESSION['username'] ?></h1>
    </div>
  </div>
  <!-- Sidebar Navidation Menus-->
  <span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading" hidden="">Master Data</span>
  <ul class="list-unstyled py-4">
    <li class="sidebar-item"><a class="sidebar-link" href="index.php"> 
      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
        <use xlink:href="#real-estate-1"> </use>
      </svg>Home </a>
    </li>
    <li class="sidebar-item"><a class="sidebar-link" href="#kue" data-bs-toggle="collapse"> 
      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
        <use xlink:href="#browser-window-1"> </use>
      </svg>Kue Kering </a>
      <ul class="collapse list-unstyled " id="kue">
        <li><a class="sidebar-link" href="data-kue.php">Data</a></li>
        <li><a class="sidebar-link" href="input-kue.php">Tambah</a></li>
      </ul>
    </li>
    <li class="sidebar-item"><a class="sidebar-link" href="#bb" data-bs-toggle="collapse"> 
      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
        <use xlink:href="#browser-window-1"> </use>
      </svg>Bahan Baku </a>
      <ul class="collapse list-unstyled " id="bb">
        <li><a class="sidebar-link" href="data-bahan-baku.php">Data</a></li>
        <li><a class="sidebar-link" href="input-bahan-baku.php">Tambah</a></li>
      </ul>
    </li>
    <li class="sidebar-item" hidden><a class="sidebar-link" href="login.html"> 
      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
        <use xlink:href="#disable-1"> </use>
      </svg>Login page </a>
    </li>
  </ul>
  <span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Transaksi</span>
  <ul class="list-unstyled py-4">
    <li class="sidebar-item"><a class="sidebar-link" href="#pesanan" data-bs-toggle="collapse"> 
      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
        <use xlink:href="#browser-window-1"> </use>
      </svg>Pesanan </a>
      <ul class="collapse list-unstyled " id="pesanan">
        <li><a class="sidebar-link" href="data-pesanan.php">Data</a></li>
        <li><a class="sidebar-link" href="input-pesanan.php">Tambah</a></li>
      </ul>
    </li>
    <li class="sidebar-item"><a class="sidebar-link" href="#penggunaan" data-bs-toggle="collapse"> 
      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
        <use xlink:href="#browser-window-1"> </use>
      </svg>Penggunaan </a>
      <ul class="collapse list-unstyled " id="penggunaan">
        <li><a class="sidebar-link" href="data-penggunaan.php">Data</a></li>
        <li><a class="sidebar-link" href="input-penggunaan.php">Tambah</a></li>
      </ul>
    </li>
    <li class="sidebar-item"><a class="sidebar-link" href="#pembelian" data-bs-toggle="collapse"> 
      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
        <use xlink:href="#browser-window-1"> </use>
      </svg>Pembelian Bahan </a>
      <ul class="collapse list-unstyled " id="pembelian">
        <li><a class="sidebar-link" href="data-pembelian.php">Data</a></li>
        <li><a class="sidebar-link" href="input-pembelian.php">Tambah</a></li>
      </ul>
    </li>
  </ul>
  <span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Cetak</span>
  <ul class="list-unstyled py-4">
    <li class="sidebar-item"> <a class="sidebar-link" href="lap-pesanan.php"> 
      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
        <use xlink:href="#imac-screen-1"> </use>
      </svg>Laporan Pesanan </a>
    </li>
    <li class="sidebar-item"> <a class="sidebar-link" href="lap-pembelian.php"> 
      <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
        <use xlink:href="#chart-1"> </use>
      </svg>Pembelian Bahan </a>
    </li>
  </ul>
</nav>