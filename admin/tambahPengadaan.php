<?php include 'assets/php/koneksi.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Daftar Pengadaan</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- DataTables -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <!-- Alertify -->
  <link href="assets/css/alertify.min.css" rel="stylesheet" type='text/css' />
  <!-- Responsive datatable examples -->
  <link href="assets/vendor/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'assets/layout/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include 'assets/layout/topbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <form action="tambah-pengadaan.php" method="POST">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Nota Pemesanan</h1>
            <h1 class="h5 mb-0 text-gray-800"><button type="button" class="btn btn-sm btn-primary" onclick="window.location.assign('daftar-pengadaan.php?menu=Pengadaan')">Kembali</button></h1>
          </div>
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                  <?php
                    if (isset($_POST['pengadaanBarang'])) {
                      $tgl=date('Y-m-d');
                      $idBarang=$_POST['idBarang'];
                      $namaBarang=$_POST['namaBarang'];
                      $hargaBarang=$_POST['hargaBarang'];
                      $sisaBarang=$_POST['sisaBarang'];
                      $jmlBarang=count($idBarang);
                      $sup=mysqli_query($koneksi,"SELECT * FROM tb_supplier");
                    }
                  ?>
                  <form action="tambah-pengadaan.php" method="POST">
                  <div class="row mb-2">
                    <div class="col-lg-4 col-sm-12">
                      <h1 class="h4 mb-0 text-gray-800 text-left mb-2"><?=tanggal(date('Y-m-d'));?></h1>
                    </div>
                    <div class="col-lg-8 col-sm-12 form-inline">
                      <select name="supplier" class="form-control mr-2">
                        <option hidden>-Pilih Supplier-</option>
                        <?php while ($supplier=mysqli_fetch_array($sup)) { ?>
                          <option value="<?=$supplier['id_supplier'];?>"><?=$supplier['nama_supplier'];?></option>
                        <?php } ?>
                      </select>
                      <button type="submit" name="buatPesanan" class="btn btn-sm btn-success">Buat Pesanan</button>
                    </div>
                  </div>                  
                  <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <tr>
                      <th>No</th>
                      <th>Id Barang</th>
                      <th>Nama Barang</th>
                      <th>Harga Barang</th>
                      <th>Sisa Barang (Unit)</th>
                      <th>Jumlah Pemesanan (Unit)</th>
                    </tr>
                    <tbody>
                      <?php
                      $no=1;
                        for ($i=0; $i<$jmlBarang; $i++) { 
                        ?>
                        <input type="hidden" name="barang[]" value="<?=$idBarang[$i];?>" class="form-control" required>
                        <tr>
                          <td><?=$no;?></td>
                          <td><?=$idBarang[$i];?></td>
                          <td><?=$namaBarang[$i];?></td>
                          <td><?=rupiah($hargaBarang[$i]);?></td>
                          <td><?=$sisaBarang[$i];?></td>
                          <td><input type="number" name="jmlPesan[]" class="form-control" required></td>
                        </tr>
                        <?php
                        $no++;
                        }
                      ?>
                    </tbody>
                  </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          </form>

        </div>

      </div>  
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <!-- Page level vendor -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="assets/vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="assets/vendor/datatables/buttons.bootstrap4.min.js"></script>
  <script src="assets/vendor/datatables/jszip.min.js"></script>
  <script src="assets/vendor/datatables/pdfmake.min.js"></script>
  <script src="assets/vendor/datatables/vfs_fonts.js"></script>
  <script src="assets/vendor/datatables/buttons.html5.min.js"></script>
  <script src="assets/vendor/datatables/buttons.print.min.js"></script>
  <script src="assets/vendor/datatables/buttons.colVis.min.js"></script>
  <!-- Responsive examples -->
  <script src="assets/vendor/datatables/dataTables.responsive.min.js"></script>
  <script src="assets/vendor/datatables/responsive.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>
  <script src="assets/js/alertify.min.js"></script>
  <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();
                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: true,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
  </script>
</body>

</html>
