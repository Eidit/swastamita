
<!DOCTYPE html>
	<html>
	<head>
    <link rel="shortcut icon" href="assets/img/swastamita.ico">
		<title>Transaksi</title>
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
        <span style="font-family: Verdana; font-size: x-small;"><h3>LAPORAN TRANSAKSI</h3></span>
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
          <th>No Transaksi</th>
          <th>Nama Penyewa</th>
          <th>Lama Sewa</th>
          <th>Tanggal Sewa</th>
          <th>Tanggal Kembali</th>
          <th>Total Bayar</th>
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
            $qy ="SELECT * FROM tb_transaksi WHERE tanggal BETWEEN '$dt1' AND '$dt2' ";
            $query = mysqli_query($koneksi,$qy) or die (mysqli_error()); 
              

            while($res = mysqli_fetch_array($query)){

            ?>
            <tr>
                          <td><?=$i;?></td>
                          <td><?=$res['no_transaksi'];?></td>
                          <td><?=$res['nama_pemesan'];?></td>
                          <td><?=$res['lama_sewa'];?> Hari</td>
                          <td><?=$res['tgl_pesan'];?></td>
                          <td><?=$res['tgl_kembali'];?></td>
                          <td>Rp. <?=number_format($res['total_bayar']);?></td>
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