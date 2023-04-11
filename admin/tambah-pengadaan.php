<?php include 'assets/php/koneksi.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>proses</title>
	<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="assets/css/alertify.min.css" rel="stylesheet" type='text/css' />
    <script src="assets/js/alertify.min.js"></script>
    <style type="text/css">
    	.ajs-cancel {
		  display: none;
		}
    </style>
</head>
<body>
<?php
$koneksi = mysqli_connect('localhost','swastami_root','t.d6!kEI0{Qf','swastami_db_swastamita');
	if (isset($_POST['buatPesanan'])) {
		$pengadaanRow=mysqli_query($koneksi,"SELECT * FROM tb_pengadaan");
		$urut=mysqli_num_rows($pengadaanRow)+1;
		if ($urut<10) {
	        $row='0'.$urut;
	    }else{
	        $row=$urut;
	    }
		$noPengadaan='PB/'.date('dmy').'/'.$row;
		$supplier=$_POST['supplier'];
	    $barang=$_POST['barang'];
	    $jmlPesan=$_POST['jmlPesan'];
	    $jmlBarang=count($barang);
	    $tanggal=date('Y-m-d');
	    $cek=0;
	    //masuk tb pengadaan
	    $pengadaan=mysqli_query($koneksi,"INSERT INTO `tb_pengadaan` (`no_pengadaan`, `tanggal`, `status`, `id_supplier`) VALUES ('$noPengadaan', '$tanggal', '0', '$supplier');") or die(mysqli_error());
	    if ($pengadaan) {
	    	for ($i=0; $i <$jmlBarang ; $i++) { 
				$detailPengadaan=mysqli_query($koneksi,"INSERT INTO `tb_detail_pengadaan` (`no_pengadaan`, `id_barang`, `qty`) VALUES ('$noPengadaan', '$barang[$i]', '$jmlPesan[$i]');");
				if ($detailPengadaan) {	$cek=1;	}else{ $cek=0; }
			}
			if ($cek=1) { ?>
				<script language="JavaScript">
					alertify.confirm('Pengadaan Berhasil', function(){window.location.href="daftar-notaPengadaan.php?menu=notaPengadaan"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
				</script>
			<?php }
	    }else{ ?>
				<script language="JavaScript">
					alertify.confirm('Pengadaan Gagal', function(){window.location.href="daftar-Pengadaan.php?menu=Pengadaan"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
				</script>
		<?php }
	 }
?>
</body>
</html>