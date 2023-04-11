<?php include 'assets/php/koneksi.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>logout</title>
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
	$id = $_GET['id'];
	$hapus=mysqli_query($koneksi,"DELETE FROM tb_barang WHERE id_barang='$id'") or die(mysqli_error());
	if ($hapus) { ?>
		<script language="JavaScript">
			alertify.confirm('Data barang berhasil dihapus!', function(){window.location.href="barang-sewa.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
		</script>
	<?php
	}else{ ?>
		<script language="JavaScript">
			alertify.confirm('Data barang gagal dihapus!', function(){window.location.href="barang-sewa.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
		</script>
	<?php		
	}
?>
</body>
</html>