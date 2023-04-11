<?php include 'assets/php/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/swastamita.ico">
  <title>SWASTAMITA | Online</title>

  <!-- Font Awesome Icons -->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="assets/css/creative.css" rel="stylesheet">

  <style type="text/css">
   .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:20px;
        color:#FFF;
        border-radius:50px;
        text-align:center;
        z-index: 99;
    }
    .my-float{
        margin-top:1px;
        margin-left: -1px;
    }
  </style>
</head>

<body id="page-top">

  <?php 
    include 'assets/menu/navbar.php';
    $halaman = 12; //batasan halaman
    $page = isset($_GET['p'])? (int)$_GET["p"]:1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $query = "SELECT * FROM tb_barang";
    $result = mysqli_query($koneksi, $query);
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);
    $category=$_GET['k'];
    $path='admin/assets/img/barang/';
    $qKategori = mysqli_query($koneksi,"SELECT * FROM tb_kategori");
    switch ($category) {
      case 'all':
        $query = mysqli_query($koneksi,"SELECT * FROM tb_barang LIMIT $mulai, $halaman") or die(mysqli_error());
        break;      
      default:
        $query = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE id_kategori='$category' LIMIT $mulai, $halaman") or die(mysqli_error());
        break;
    }
    
    if (isset($_GET['search'])){        
        $cari=$_GET['search'];
        switch ($category) {
          case 'all':
            $query = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE nama_barang LIKE '%$cari%' LIMIT $mulai, $halaman") or die(mysqli_error());
            break;      
          default:
            $query = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE id_kategori='$category' AND nama_barang LIKE '%$cari%' LIMIT $mulai, $halaman") or die(mysqli_error());
            break;
        }
    }else{
      
    }
  ?>
  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">

    <button class="btn btn-primary float text-center" onclick="window.location.assign('index.php#online')">
      <span class="fas fa-2x fa-shopping-basket my-float"></span>
    </button>

      <h2 class="text-center">Barang Sewa</h2>
      <hr class="divider-primary my-4">

      
      <div class="d-sm-flex align-items-center justify-content-between">
        <div class="form-inline">
          <div class="form-group">
            <label class="p-1">Kategori</label>
            <select name="kg" class="form-control" onchange="pageKategori(<?=$page;?>,this.value)">
              <option value="all">Semua</option>
              <?php
                while ($tmp=mysqli_fetch_array($qKategori)) {
                if ($tmp['id_kategori']==$category) {
                  $selected='selected';
                }else{
                  $selected='';
                }
                ?>
                  <option value="<?=$tmp['id_kategori'];?>" <?=$selected;?>><?=$tmp['nama_kategori'];?></option>            
                <?php
                }
              ?>
            </select>
          </div>
        </div>
        
        <div class="form-inline">
          <div class="form-group">
            <input type="text" id="search" placeholder="Cari Barang..." class="form-control mr-1">
            <button class="btn btn-light" onclick="cari(<?=$page?>,'<?=$category;?>',document.getElementById('search').value)"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>

      <div class="row">
      <?php        
        while ($hasil=mysqli_fetch_array($query)) {
          if (strlen($hasil['nama_barang'])>16) {
              $namaBarang=str_pad(substr($hasil['nama_barang'],0,18),22,".");
          }else{
              $namaBarang=$hasil['nama_barang'];
          }

          if ($hasil['qty']>0 && $hasil['qty']<=5) {
            $status='<span class="badge badge-warning">Hampir Habis</span>';
          }else if ($hasil['qty']>5){
            $status='<span class="badge badge-success">Tersedia</span>';
          }else{
            $status='<span class="badge badge-secondary">Tidak Tersedia</span>';
          }
        ?>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-4">
            <div class="card" style="width:270px">
              <img class="card-img-top" src="<?=$path.$hasil['img'];?>" alt="Card image">
              <div class="card-body">
                <h5 class="card-title" data-toggle="tooltip" data-placement="top" title="<?=$hasil['detail'];?>"><?=$namaBarang;?></h5>
                <p class="card-text"><?=rupiah($hasil['harga_sewa']);?> / Hari</p>
                <?=$status;?>
              </div>
            </div>
          </div>
        </div>
        <?php
        }
      ?>
      </div>
    </div>    
  </section>
  <div class="row mb-4" style="margin-top: -50px;">
    <div class="col-lg-3">
      &nbsp;
    </div>
    <div class="col-lg-6">                        
        <div class="m-b-20">
            <center>
                <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="pageBaru(1,'<?=$category;?>')"><<</button>
                <?php for ($i=1; $i<=$pages ; $i++){ ?>
                    <button type="button" class="btn btn-sm btn-secondary waves-effect" onclick="pageBaru(<?=$i;?>,'<?=$category;?>')"><?=$i;?></button> 
                <?php } ?>
                <button type="button" class="btn btn-sm btn-dark waves-effect" onclick="pageBaru(<?=$pages;?>,'<?=$category;?>')">>></button>
            </center>
        </div>
    </div>
    <div class="col-lg-3">
      &nbsp;
    </div>
    </div>
  <!-- Contact Section -->
  <section class="page-section bg-dark text-white" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Hubungi Kami Melalui</h2>
          <hr class="divider-light my-4">
        </div>
      </div>
      <div class="row ">
        <div class="col-lg-4 ml-auto text-center">
          <i class="fab fa-whatsapp fa-4x mb-3 text-white"></i>
          <a class="d-block text-muted decoration-none" href="https://api.whatsapp.com/send?phone=6282115444405" target="blank">+6282115444405</a>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fab fa-instagram fa-4x mb-3 text-white"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block text-muted decoration-none" href="https://www.instagram.com/swastamita_rent/" target="blank">@swastamita_rent</a>
        </div>
      </div>
    </div>
  </section>


  <!-- Bootstrap core JavaScript -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
    });

    function pageBaru(page, kategori){
        window.location.assign('?p='+page+'&k='+kategori);
    }
    function pageKategori(p,k){
        window.location.assign('?p='+p+'&k='+k);
    }
    function cari(page, kategori, cari){
        window.location.assign('?p='+page+'&k='+kategori+'&search='+cari);
    }
  </script>
</body>

</html>
