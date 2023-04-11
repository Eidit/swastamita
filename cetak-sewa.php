<?php
include 'assets/php/koneksi.php';
$no_transaksi = $_GET['no_transaksi'];
$qq = mysqli_query($koneksi,"SELECT * FROM tb_transaksi WHERE no_transaksi='$no_transaksi'") or die(mysqli_error());
while ($rr = mysqli_fetch_array($qq)) {
	$nama_pemesan = $rr['nama_pemesan'];
	$no_telp = $rr['no_telp'];
	$email = $rr['email'];
	$lama_sewa = $rr['lama_sewa'];
	$tgl_pesan = $rr['tgl_pesan'];
	$tgl_kembali = $rr['tgl_kembali'];
	
}
?>
<!DOCTYPE html>
	<html>
	<head>
		<title>BOOKING PESANAN</title>
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
				<span style="font-family: Verdana; font-size: x-small;"><img src="assets/img/logo3.png" width="100px"><b><h1>SWASTAMITA OUTDOOR</h1></b></span></div>
				<div align="right"></div>
                <span style="font-family: Verdana; font-size: x-small;"><h3>BUKTI BOOKING ONLINE</h3></span>
                <span> 0821-1544-4405</span></br>
                <span> Jl. Pangkalan RT/02 RW/09 Kec. Tanjungsari Desa. Margajaya Sumedang </span>
				<hr color="black"></td>
				</tr>
			</tbody>
		</table><br>
		<table>
			<tr>
				<td>NOMOR TRANSAKSI</td><td width="40px" align="center">:</td><td><?=$no_transaksi?></td>
			</tr>
			<tr>
				<td>NAMA PEMESAN</td><td width="40px" align="center">:</td><td><?=strtoupper($nama_pemesan)?></td>
			</tr>
			<tr>
				<td>NOMOR TELP</td><td width="40px" align="center">:</td><td><?=$no_telp?></td>
			</tr>
			<tr>
				<td>ALAMAT EMAIL</td><td width="40px" align="center">:</td><td><?=$email?></td>
			</tr>
			<tr>
				<td>TANGGAL PEMESANAN</td><td width="40px" align="center">:</td><td><?=$tgl_pesan?></td>
			</tr>
			<tr>
				<td>TANGGAL KEMBALI</td><td width="40px" align="center">:</td><td><?=$tgl_kembali?></td>
			</tr>
			<tr>
				<td>LAMA SEWA</td><td width="40px" align="center">:</td><td><?=$lama_sewa." Hari"?></td>
			</tr>
		</table>
		<?php
		$q3 = mysqli_query($koneksi,"SELECT * FROM tb_transaksi_detail JOIN tb_barang ON tb_transaksi_detail.id_barang=tb_barang.id_barang JOIN tb_transaksi ON tb_transaksi_detail.no_transaksi=tb_transaksi.no_transaksi WHERE tb_transaksi_detail.no_transaksi='$no_transaksi'") or die(mysqli_error());
		$num2 = mysqli_num_rows($q3);
		$no = 0;
		$rowspan = true;
		$q4 = mysqli_query($koneksi,"SELECT * FROM tb_transaksi_detail JOIN tb_transaksi ON tb_transaksi_detail.no_transaksi=tb_transaksi.no_transaksi WHERE tb_transaksi_detail.no_transaksi='$no_transaksi'") or die(mysqli_error());
		while ($resultt = mysqli_fetch_array($q4)) {
			$tb = $resultt['total_bayar'];
		}
		?><br><br>
		<table border="1" width="100%" align="center">
			<tr>
				<th>NO</th>
				<th>NAMA BARANG</th>
				<th>HARGA SEWA</th>
				<th>Qty</th>
				<th>LAMA SEWA</th>
				<th>TOTAL</th>
			</tr>

        
			<?php
			date_default_timezone_set('Asia/Jakarta');
        function rupiah($angka){    
          $hasil_rupiah = "Rp. " . number_format($angka);
          $rupiah=str_replace(',', '.', $hasil_rupiah);
          return $rupiah;     
        }
			while ($result = mysqli_fetch_array($q3)) {
				$no++;
			 	echo "<tr>";
			 	echo "<td align='center'>".$no."</td>";
			 	echo "<td>".$result['nama_barang']."</td>";
			 	echo "<th>"."Rp. ".number_format($result['harga_sewa'])." / Hari"."</th>";
			 	echo "<td align='center'>".$result['qty_sewa']."</td>";
			 	if ($rowspan) {
			 		echo "<td align='center' rowspan='$num2'>".$lama_sewa." Hari"."</td>";
			 		$rowspan = false;
			 	}
			 	echo "<th>"."Rp. ".number_format(($result['harga_sewa']*$result['qty_sewa'])*$lama_sewa)."</th>";
			 	echo "</tr>";
			 }
			 echo "<tr>";
			 echo "<td align='center' colspan='5'>"."TOTAL BAYAR"."</td>";
			 echo "<th>"."Rp. ".number_format($tb)."</th>";
			 echo "</tr>";
			?>
		</table>
		<br>
		<table>
			<tr>
				<td><i>*Harap Perlihatkan Bukti Booking Saat Mengambil Peralatan</i></td>
			</tr>
			<tr>
				<td><i>*Harga Sewa Dihitung Perhari (24 Jam)</i></td>
			</tr>
			<tr>
				<td><i>*Harap Membawa Jaminan Saat Mengambil Pesanan (KTP, SIM, Kartu Pelajar, dll)</i></td>
			</tr>
			<tr>
				<td><i>*Peralatan Yang Sudah Dipesan Tidak Dapat Dikurangi Saat Pengambilan</i></td>
			</tr>
			<tr>
				<td><i>*Pembayaran Dilakukan Saat Pengambilan Barang</i></td>
			</tr>
			<tr>
				<td><i>*Kerusakan dan Kehilangan Menjadi Tanggung Jawab Penyewa</i></td>
			</tr>
		</table>
	</body>
	<script>
		 window.load = print_d();
		 function print_d(){
		 window.print();
		 }
	 </script>
	</html>