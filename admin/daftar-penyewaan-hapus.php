<?php
include 'assets/php/koneksi.php';

$id= $_GET['id'];
$query = mysqli_query($koneksi,"DELETE FROM tb_barang WHERE id='$id'") or die(mysql_error());
if ($query) {
		echo "<script>alert('Data berhasil dihapus')</script>";
		header("location:daftar-penyewaan.php");
	} else {
		echo "Data anda gagal dihapus. Ulangi sekali lagi";
		header("location:daftar-penyewaan.php");
	}

?>