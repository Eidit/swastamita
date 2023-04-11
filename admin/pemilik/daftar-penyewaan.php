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

  <title>Penyewaan</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- DataTables -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Barang Disewa</h1>
            <form action="#tampil" method="post">
              <div class="row">
                <div class="col-md-6 col-sm-5">
                  <div class="form-grup">
                    <input type="date" name="tgl1" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 col-sm-5">
                  <div class="form-grup">
                    <input type="date" name="tgl2" class="form-control"><br>
                    <button type="submit" name="tampilkan" class="btn btn-primary">Tampil</button>
                  </div>
                </div>
              </div>
            </form>
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
                          <th>No Transaksi</th>
                          <th>Nama Barang</th>
                          <th>Lama Sewa</th>
                          <th>Tanggal Sewa</th>
                          <th>Tanggal Kembali</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql=mysqli_query($koneksi,"SELECT * FROM tb_transaksi_detail INNER JOIN tb_barang ON tb_transaksi_detail.id_barang = tb_barang.id_barang INNER JOIN tb_transaksi ON tb_transaksi_detail.no_transaksi = tb_transaksi.no_transaksi");
                        $i=1;
                        while ($res=mysqli_fetch_array($sql)) {
                        $status=rand(0,1);
                          if ($status=='1') {
                            $st='<span class="badge badge-success">Dikembalikan</span>';
                          }else{
                            $st='<span class="badge badge-danger">Dipinjam</span>';
                          }
                        ?>
                        <tr>
                          <td><?=$i;?></td>
                          <td><?=$res['no_transaksi'];?></td>
                          <td><?=$res['nama_barang'];?></td>
                          <td><?=$res['lama_sewa'];?> Hari</td>
                          <td><?=$res['tgl_pesan'];?></td>
                          <td><?=$res['tgl_kembali'];?></td>
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

          <section class="page-section" id="tampil">
            <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                  <div class="table-responsive">
                    <h5 class="m-0 font-weight-bold text-primary">Hasil Pencarian Tanggal</h5>
                    <table class="table table-bordered table-hover" id="datatable-buttons" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>No Transaksi</th>
                          <th>Nama Barang</th>
                          <th>Lama Sewa</th>
                          <th>Tanggal Sewa</th>
                          <th>Tanggal Kembali</th>
                        </tr>
                      </thead>
                      <tbody>
          <?php
          $koneksi = mysqli_connect('localhost', 'root', '', 'db_swastamita');
            if(isset($_POST["tampilkan"])){
            $dt1 = $_POST["tgl1"];
            $dt2 = $_POST["tgl2"];

            $i = 1;

            $sql = "SELECT * FROM tb_transaksi_detail INNER JOIN tb_barang ON tb_transaksi_detail.id_barang = tb_barang.id_barang INNER JOIN tb_transaksi ON tb_transaksi_detail.no_transaksi = tb_transaksi.no_transaksi WHERE tanggal BETWEEN '$dt1' AND '$dt2'";
            $query = mysqli_query($koneksi,$sql);

            while($res = mysqli_fetch_array($query)){?>
            
              <tr>
                          <td><?=$i;?></td>
                          <td><?=$res['no_transaksi'];?></td>
                          <td><?=$res['nama_barang'];?></td>
                          <td><?=$res['lama_sewa'];?> Hari</td>
                          <td><?=$res['tgl_pesan'];?></td>
                          <td><?=$res['tgl_kembali'];?></td>
                        </tr>

                <?php $i++; ?>

              <?php }

            }
      
          ?>
          </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </section>
          

        </div>
        <!-- /.container-fluid -->
      <!--Modal Hapus-->
      <div class="modal fade" id="myHapus">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-lg-9 col-sm-12">
                    <div class="form-group">
                      <label>Anda Yakin akan menghapus data ini ?</label>
                    </div>
                  </div>
                </div>
                <center>
                  <button class="btn btn-danger btn-sm">Hapus</button>
                </center>
              </form>
            </div>
            
          </div>
        </div>
      </div>

      <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->

            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <form>
                <div class="row">
                  <div class="col-lg-9 col-sm-12">
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="namaBarang" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-12">
                    <div class="form-group">
                      <label>Qty</label>
                      <input type="number" name="qty" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="number" name="hargaBarang" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Harga Sewa (hari)</label>
                      <input type="number" name="hargaSewa" class="form-control">
                    </div>
                  </div>
                </div>
                <center>
                  <button class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
            </div>
            
          </div>
        </div>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>
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
