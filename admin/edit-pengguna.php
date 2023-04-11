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
	if (isset($_POST['simpanPengguna'])) {
		
		$idPengguna=$_POST['idPengguna'];
		$namaPengguna=ucwords($_POST['namaPengguna']);
		$username=$_POST['username'];
		$password=$_POST['password'];
		$level=$_POST['level'];
		$nik=$_POST['nik'];
		$alamat=$_POST['alamat'];
		$telp=$_POST['telp'];
		$jk=$_POST['jk'];

			$update=mysqli_query($koneksi,"UPDATE tb_pengguna SET `nama_pengguna`='$namaPengguna', `username`='$username', `password`='$password', `level`='$level', `nik`='$nik', `alamat`='$alamat', `telp`='$telp', `jk`='$jk' WHERE id_pengguna='$idPengguna'") or die(mysqli_error());
			if ($update) { ?>
		        <script language="JavaScript">
					alertify.confirm('Data berhasil diubah!', function(){window.location.href="pengguna.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
				</script>
		    <?php } else { ?>
		    	<script language="JavaScript">
					alertify.confirm('Data gagal diubah!', function(){window.location.href="pengguna.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
				</script>
		    <?php }
		}
?>
</body>
</html>