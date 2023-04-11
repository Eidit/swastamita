<?php 

include 'assets/php/koneksi.php';
// menangkap data id yang di kirim dari url
$id = $_GET['no_pengadaan'];
$status=2;

 

// mengupdate data dari database
mysqli_query($koneksi,"UPDATE tb_pengadaan SET `status`='$status' WHERE no_pengadaan='$id'");
if ($query) {
		echo "<script>alert('Barang Di ACC')</script>";
		header("location:daftar-notaPengadaan1.php");
	} else {
		echo "Barang Gagal Di ACC";
		header("location:daftar-notaPengadaan1.php");
	}
 
?>