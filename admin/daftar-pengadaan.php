<?php include 'assets/php/koneksi.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/swastamita.ico">

  <title>Daftar Pengajuan</title>

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
          <form action="tambahPengadaan.php?menu=Pengadaan" method="POST">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengajuan Barang</h1>
            <h1 class="h5 mb-0 text-gray-800"><i>Checklist</i> Barang Dibawah Lalu <button class="btn btn-sm btn-primary" name="pengadaanBarang" >Buat Pengajuan</button></h1>
          </div>
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="datatable-buttons" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Id Barang</th>
                          <th>Nama Barang</th>
                          <th>Harga Barang</th>
                          <th>Qty (unit)</th>
                          <th>Qty Sewa</th>
                          <th>Status</th>
                          <th>Pilih Barang</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql=mysqli_query($koneksi,"SELECT tb_transaksi_detail.id_barang, nama_barang, qty_sewa, qty, harga_barang FROM tb_transaksi_detail JOIN tb_barang ON tb_transaksi_detail.id_barang=tb_barang.id_barang WHERE qty<5 OR qty_sewa>=10 ORDER BY qty");
                        $i=1;
                        while ($res=mysqli_fetch_array($sql)) {
                          if ($res['qty']<=5) {
                            $status='<span class="badge badge-warning">Hampir Habis</span>';
                          }elseif($res['qty_sewa']>=10){
                            $status='<span class="badge badge-primary">Sering Disewa</span>';
                          }elseif($res['qty']<=0){
                            $status='<span class="badge badge-secondary">Tidak Tersedia</span>';
                          }else{
                            $status='';
                          }
                        ?>
                        
                        <tr>
                          <td><?=$i;?></td>
                          <td><?=$res['id_barang'];?></td>
                          <td><?=$res['nama_barang'];?> <input type="hidden" name="namaBarang[]" value="<?=$res['nama_barang'];?>"></td>
                          <td><?=rupiah($res['harga_barang']);?> <input type="hidden" name="hargaBarang[]" value="<?=$res['harga_barang'];?>"></td>
                          <td><?=$res['qty'];?> <input type="hidden" name="sisaBarang[]" value="<?=$res['qty'];?>"></td>
                          <td><?=$res['qty_sewa'];?> <input type="hidden" name="sewaBarang[]" value="<?=$res['qty_sewa'];?>"></td>
                          <td><?=$status;?></td>
                          <td><input type="checkbox" name="idBarang[]" value="<?=$res['id_barang'];?>"></td>
                        </tr>
                        <?php
                        $i++;
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          </form>

        </div>

      </div>  
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include'assets/layout/footer.php';?>
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
