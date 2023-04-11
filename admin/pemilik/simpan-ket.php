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
	if (isset($_POST['simpanKet'])) {
		
		$idPengadaan=$_POST['idPengadaan'];
		$Ket=$_POST['Ket'];

			$update=mysqli_query($koneksi,"UPDATE tb_pengadaan SET `ket`='$Ket' WHERE no_pengadaan='$idPengadaan'");
			if ($update) { ?>
		        <script language="JavaScript">
					alertify.confirm('Keterangan berhasil ditambah!', function(){window.location.href="daftar-notaPengadaan1.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
				</script>
		    <?php } else { ?>
		    	<script language="JavaScript">
					alertify.confirm('Keterangan gagal ditambah!', function(){window.location.href="daftar-notaPengadaan1.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
				</script>
		    <?php }
		}
?>
</body>
</html>