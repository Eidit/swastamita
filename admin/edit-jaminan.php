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
	if (isset($_POST['simpanJaminan'])) {
		
		$idTransaksi=$_POST['idTransaksi'];
		$namaPelanggan=ucwords($_POST['namaPelanggan']);
		$noTelp=$_POST['noTelp'];
		$tglSewa=$_POST['tglSewa'];
		$tglKembali=$_POST['tglKembali'];
		$totalBayar=$_POST['totalBayar'];
		$jenisJaminan=$_POST['jenisJaminan'];
		$nojaminan=$_POST['nojaminan'];

			$update=mysqli_query($koneksi,"UPDATE tb_transaksi SET `nama_pemesan`='$namaPelanggan', `no_telp`='$noTelp', `tgl_pesan`='$tglSewa', `tgl_kembali`='$tglKembali', `total_bayar`='$totalBayar', `jenis_jaminan`='$jenisJaminan', `no_jaminan`='$nojaminan' WHERE no_transaksi='$idTransaksi'") or die(mysqli_error());
			if ($update) { ?>
		        <script language="JavaScript">
					alertify.confirm('Jaminan berhasil ditambah!', function(){window.location.href="daftar-pengembalian.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
				</script>
		    <?php } else { ?>
		    	<script language="JavaScript">
					alertify.confirm('Jaminan gagal ditambah!', function(){window.location.href="daftar-pengembalian.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
				</script>
		    <?php }
		}
?>
</body>
</html>