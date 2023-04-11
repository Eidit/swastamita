<?php
session_start();
if ( !isset($_SESSION['username']) ) {
    header('location:login.php'); 
}
else { 
    $usr = $_SESSION['username']; 
}
require_once('assets/php/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM tb_pengguna WHERE username = '$usr'");
$hasil = mysqli_fetch_array($query);
if (empty($hasil['username'])) {
    header('Location: ./login.php');
}
?>
<!-- Sidebar -->
<?php
  if (isset($_GET['menu'])) {
    $menu=$_GET['menu'];
  }else{
    $menu='';
  }

  switch ($menu) {
    case 'dashboard':
      $showAdmin='collapse';
      $showPenyewaan='collapse';
      $showPengembalian='collapse';      
      $showPengadaan='collapse';
      $showSuplier='collapse';  
      $statusDashboard='active';
      break; 

    case 'barang':
      $showAdmin='collapse';
      $showPenyewaan='collapse';
      $showPengembalian='collapse'; 
      $showPengadaan='collapse';
      $showSuplier='collapse'; 
      $statusBarang='active';
      break;

    case 'admin':
      $showAdmin='collapse show';
      $statusAdmin='active';
      $showPenyewaan='collapse';
      $showPengembalian='collapse';      
      $showPengadaan='collapse';
      $showSuplier='collapse';  
      
      break;

    case 'olahKaryawan':
      $showAdmin='collapse show';
      $showPenyewaan='collapse';
      $showPengembalian='collapse';      
      $showPengadaan='collapse';
      $showSuplier='collapse';  
      $statusolahKaryawan='active';
      break;    

    case 'penyewaan':
      $showPenyewaan='collapse show';      
      $statusPenyewaan='active';
      $statuslaporanPenyewaan='';
      $showAdmin='collapse';
      $showPengadaan='collapse';
      $showSuplier='collapse';
      $showPengembalian='collapse';
      break;

    case 'laporanPenyewaan':
      $showPenyewaan='collapse show'; 
      $showAdmin='collapse'; 
      $showPengadaan='collapse';
      $showSuplier='collapse';
      $showPengembalian='collapse';   
      $statuslaporanPenyewaan='active';
      break;

    case 'pengembalian':
      $showPenyewaan='collapse';
      $showAdmin='collapse';
      $showPengadaan='collapse';
      $showSuplier='collapse';
      $showPengembalian='collapse show';  
      $statusPengembalian='active';   
      $statuslaporanPengembalian='';
      break;
      
    case 'laporanPengembalian':
      $showAdmin='collapse';
      $showPenyewaan='collapse';
      $showPengadaan='collapse';
      $showSuplier='collapse';
      $showPengembalian='collapse show';  
      $statusPengembalian='';   
      $statuslaporanPengembalian='active';
      break;

    case 'Pengadaan':
      $showPenyewaan='collapse';
      $showAdmin='collapse';
      $showPengembalian='collapse';
      $showSuplier='collapse';
      $showPengadaan='collapse show';  
      $statusPengadaan='active';   
      $statuslaporanPengadaan='';
      break;
      
    case 'laporanPengadaan':
      $showPenyewaan='collapse';
      $showAdmin='collapse';
      $showPengembalian='collapse';
      $showSuplier='collapse';
      $showPengadaan='collapse show';  
      $statusPengadaan='';   
      $statuslaporanPengadaan='active';
      break;

    case 'notaPengadaan':
      $showPenyewaan='collapse';
      $showAdmin='collapse';
      $showPengembalian='collapse';
      $showSuplier='collapse';
      $showPengadaan='collapse show';  
      $statusPengadaan='';   
      $statuslaporanPengadaan='';
      $statusNotaPengadaan='active';
      break;

    case 'Suplier':
      $showPenyewaan='collapse';
      $showAdmin='collapse';
      $showPengembalian='collapse';
      $showPengadaan='collapse';
      $showSuplier='collapse show';  
      $statusSuplier='active';   
      $statusdaftarSuplier='';
      break;

      case 'daftarSuplier':
      $showPenyewaan='collapse';
      $showAdmin='collapse';
      $showPengembalian='collapse';
      $showPengadaan='collapse';
      $showSuplier='collapse show';  
      $statusSuplier='';   
      $statusdaftarSuplier='active';
      break;


    default:
        $statusPenyewaan='';
        $showAdmin='collapse';
        $showPenyewaan='collapse';
        $showPengembalian='collapse';
        $showPengadaan='collapse';
        $showSuplier='collapse';
      break;
  }
?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
        <div class="sidebar-brand-text mx-3">SWASTAMITA OUTDOOR</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->

      <li class="nav-item <?=$statusDashboard;?>">
        <a class="nav-link" href="index.php?menu=dashboard">
          <i class="fas fa-fw fa-tachometer-alt text-light"></i>
          <span class="text-light">Dashboard</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="daftar-laporanPengembalian.php">
          <i class="fas fa-fw fa-download text-light"></i>
          <span class="text-light">Buat Laporan Transaksi</span></a>
      </li>

      <li class="nav-item <?=$statusPenyewaan;?> <?=$statuslaporanPenyewaan;?>">
        <a class="nav-link collapsed" href="?menu=penyewaan" data-toggle="collapse" data-target="#collapsePenyewaan" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-clipboard-list text-light"></i>
          <span class="text-light">Penyewaan</span>
        </a>
        <div id="collapsePenyewaan" class="<?=$showPenyewaan;?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=$statusPenyewaan;?>" href="daftar-penyewaan.php?menu=penyewaan">Daftar Penyewaan</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?=$statusPengembalian;?> <?=$statuslaporanPengembalian;?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengembalian" aria-expanded="true" aria-controls="collapsePengembalian">
          <i class="fas fa-fw fa-dollar-sign text-light"></i>
          <span class="text-light">Transaksi</span>
        </a>
        <div id="collapsePengembalian" class="<?=$showPengembalian;?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=$statusPengembalian;?>" href="daftar-pengembalian.php?menu=pengembalian">Daftar Transaksi</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?=$statusPengadaan;?> <?=$statuslaporanPengadaan;?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengadaan" aria-expanded="true" aria-controls="collapsePengadaan">
          <i class="fas fa-fw fa-folder-plus text-light"></i>
          <span class="text-light">Pengadaan Barang</span>
        </a>
        <div id="collapsePengadaan" class="<?=$showPengadaan;?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=$statusPengadaan;?>" href="daftar-Pengadaan.php?menu=Pengadaan">Daftar Pengadaan</a>
            <a class="collapse-item <?=$statusNotaPengadaan;?>" href="daftar-notaPengadaan.php?menu=notaPengadaan">Daftar Nota Pengadaan</a>
          </div>
        </div>
      </li>

      
      <?php if ($hasil['level']!="Pemilik") { ?>
      <li class="nav-item <?=$statusBarang;?>">
        <a class="nav-link" href="barang-sewa.php?menu=barang">
          <i class="fas fa-fw fa-campground text-light"></i>
          <span class="text-light">Barang Sewa</span></a>
      </li>

      
      <li class="nav-item <?=$statusAdmin;?> <?=$statustambahKaryawan;?>">
        <a class="nav-link collapsed" href="?menu=admin" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
          <i class="fas fa-fw fa-user text-light"></i>
          <span class="text-light">Pengguna</span>
        </a>
        <div id="collapseAdmin" class="<?=$showAdmin;?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=$statusolahKaryawan;?>" href="pengguna.php?menu=admin">Data Pengguna</a>
          </div>
        </div>
      </li>
 
      

      <li class="nav-item <?=$statusSuplier;?> <?=$statusdaftarSuplier;?>">
        <a class="nav-link collapsed" href="?menu=suplier" data-toggle="collapse" data-target="#collapseSuplier" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-boxes text-light"></i>
          <span class="text-light">Suplier</span>
        </a>
        <div id="collapseSuplier" class="<?=$showSuplier;?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?=$statusdaftarSuplier;?>" href="daftar-suplier.php?menu=supiler">Daftar Suplier</a>
          </div>
        </div>
      </li>
      <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

  

    </ul>
    <!-- End of Sidebar -->