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
$koneksi = mysqli_connect('localhost', 'root', '', 'db_swastamita');
  if (isset($_POST['simpanSuplier'])) {
    $suplierRow=mysqli_query($koneksi,"SELECT * FROM tb_supplier");
    $urut=mysqli_num_rows($suplierRow)+1;
    if ($urut<10) {
          $row='0'.$urut;
      }else{
          $row=$urut;
      }
    $idsupplier='SP'.date('dmy').$row;
      $nama=$_POST['nama_supplier'];
      $alamat=$_POST['alamat'];
      $no_hp=$_POST['no_hp'];
      $cek=0;
      //masuk tb pengadaan
      $pengadaan=mysqli_query($koneksi,"INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_hp`) VALUES 
        ('$idsupplier', '$nama', '$alamat', '$no_hp');") or die(mysqli_error());

      if ($cek=1) { ?>
        <script language="JavaScript">
          alertify.confirm('Tambah Suplier Berhasil', function(){window.location.href="daftar-suplier.php?menu=Suplier"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
        </script>
      <?php }
      else{ ?>
        <script language="JavaScript">
          alertify.confirm('Tambah Suplier Gagal', function(){window.location.href="daftar-suplier.php?menu=Suplier"}).setHeader(' ').set({closable:false,transition:'fade'}).autoOk(3); 
        </script>
    <?php }
   }
?>
</body>
</html>