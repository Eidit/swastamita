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

  <title>Nota Pengajuan Barang</title>

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

    <?php include 'assets/layout/sidebar1.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include 'assets/layout/topbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Nota Pengajuan Barang</h1>
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
                          <th>No Nota</th>
                          <th>Tanggal Pemesanan</th>
                          <th>Supplier</th>
                          <th>No Hp Supplier</th>
                          <th>Status</th>
                          <th>Keterangan</th>
                          <th>Detail</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql=mysqli_query($koneksi,"SELECT * FROM tb_pengadaan JOIN tb_supplier ON tb_pengadaan.id_supplier=tb_supplier.id_supplier ORDER BY no_pengadaan DESC, status");
                        $i=1;
                        while ($res=mysqli_fetch_array($sql)) {
                          switch ($res['status']) {
                            case '2':
                              $status='<span class="badge badge-danger">Tidak Setuju</span>';
                              break;
                            case '1':
                              $status='<span class="badge badge-success">Dipesan</span>';
                              break;
                            default:
                              $status='<span class="badge badge-secondary">Menunggu Persetujuan</span>';
                              break;
                          }
                        ?>
                        <tr>
                          <td><?=$i;?></td>
                          <td><?=$res['no_pengadaan'];?></td>
                          <td><?=tanggal($res['tanggal']);?></td>
                          <td><?=$res['nama_supplier'];?></td>
                          <td><?=$res['no_hp'];?></td>
                          <td><?=$status;?></td>
                          <td><?=$res['ket'];?></td>
                          <td> <a href="notaPengadaan.php?menu=notaPengadaan&id=<?=$res['no_pengadaan'];?>"> <button type="button" class="btn btn-sm btn-primary">Detail</button></a></td>
                          <td>
                          <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalKet" data-id="<?=$res['no_pengadaan'];?>">Keterangan</button></br></br>
                          <a class="btn btn-sm btn-success" href="pesan.php?no_pengadaan=<?php echo $res['no_pengadaan']; ?>" >Setuju</a></br></br>
                          <a class="btn btn-sm btn-danger" href="batal.php?no_pengadaan=<?php echo $res['no_pengadaan']; ?>" >Tidak Setuju</a></td>
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
          
        </div>

      </div>  
      <!-- End of Main Content -->
      <div class="modal fade" id="modalKet" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Keterangan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="fetched-data"></div>
            </div>            
          </div>
        </div>
      </div>
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

                $(document).ready(
                function(){
                $('#modalKet').on('show.bs.modal', function (e) {
                    var rowid = $(e.relatedTarget).data('id');
                    $.ajax({
                        type : 'post',
                        url : 'keterangan.php',
                        data :  'rowid='+ rowid,
                        success : function(data){
                        $('.fetched-data').html(data);
                        }
                    });
                 });
            });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
  </script>
</body>

</html>
