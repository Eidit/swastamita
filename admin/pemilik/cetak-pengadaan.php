
<!DOCTYPE html>
	<html>
	<head>
    <link rel="shortcut icon" href="assets/img/swastamita.ico">
		<title>Laporan</title>
		<style type="text/css">
			table {
			  border-collapse: collapse;
			}
		</style>
	</head>
	<body>

		<table align="center" border="0" cellpadding="1" style="width: 700px;">
			<tbody>
        <tr><td colspan="3"><div align="center">
        <span style="font-family: Verdana; font-size: x-small;"><img src="../../assets/img/logo3.png" width="100px"><b><h1>SWASTAMITA OUTDOOR</h1></b></span></div>
        <div align="right"></div>
        <span style="font-family: Verdana; font-size: x-small;"><h3>LAPORAN PENGAJUAN BARANG</h3></span>
        <span> 0821-1544-4405</span></br>
        <span> Jl. Pangkalan RT/02 RW/09 Kec. Tanjungsari Desa. Margajaya Sumedang </span>
        <hr color="black"></td>
        </tr>
      </tbody>
		</table>
      <table align="center" border="0" cellpadding="1" style="width: 700px;">
			<tbody>
				<tr><td colspan="3"><div align="center">
				</div></td>
				</tr>
			</tbody>
		</table>
		<table border="1" width="100%" align="center">

			<thead>
        <tr>
          <th>No</th>
          <th>No Pengajuan</th>
          <th>Tanggal</th>
          <th>Supplier</th>
          <th>No Hp Supplier</th>
          <th>Status</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
          <?php
            // Load file koneksi.php
            include 'assets/php/koneksi.php';

            $i = 1;

            if(isset($_POST["tampilkan"])){
              $dt1 = $_POST['tgl1']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
              $dt2 = $_POST['tgl2']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
            
            // Buat query untuk menampilkan data transaksi sesuai periode tanggal
            $qy ="SELECT * FROM tb_pengadaan JOIN tb_supplier ON tb_pengadaan.id_supplier=tb_supplier.id_supplier WHERE tanggal BETWEEN '$dt1' AND '$dt2' ORDER BY no_pengadaan DESC, status";
            $query = mysqli_query($koneksi,$qy) or die (mysqli_error()); 
              

            while($res = mysqli_fetch_array($query)){
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
                          <td><?=$res['tanggal'];?></td>
                          <td><?=$res['nama_supplier'];?></td>
                          <td><?=$res['no_hp'];?></td>
                          <td><?=$status;?></td>
                          <td><?=$res['ket']?></td>
                        </tr>

                <?php $i++;  ?>
              <?php }
            }
              ?>

          </tbody>
        </table>
	</body>
	<script>
		 window.load = print_d();
		 function print_d(){
		 window.print();
		 }
	 </script>
	</html>