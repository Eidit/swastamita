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
if(isset($_POST['username'])){
$passasli=$_POST['password'];
$password=md5($passasli);
$username		= $_POST['username'];
$nama		= $_POST['nama'];
$nik		= $_POST['nik'];
$telp		= $_POST['telp'];
$jk		= $_POST['jk'];
$level		= $_POST['level'];
$alamat		= $_POST['alamat'];
$cekuser = mysqli_query($koneksi,"SELECT * FROM tb_pengguna WHERE username = '$username'");  
  if(mysqli_num_rows($cekuser) <> 0) {
 echo "ERROR : Username sudah terdaftar";
  }else{
	
	$input = mysqli_query($koneksi,"INSERT INTO tb_pengguna VALUES(NULL, '$nama','$username', '$password', '$level', '$nik', '$alamat', '$telp', '$jk')") or die(mysqli_error());
	if($input){
		
		 ?>
	    <script language="JavaScript">
		alertify.confirm('Data pengguna berhasil Ditambah!', function(){window.location.href="pengguna.php"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
		</script>
		<?php
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="pengguna.php?menu=admin">Kembali</a>';	
		
	}
  }
}
?>
</body>
</html>