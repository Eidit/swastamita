<?php
  function ryRandom($muncul){

if($muncul == '1'){
 $ryRandom = rand(1111,9999);
  }else {
    $ryRandom = "";
  }
  return $ryRandom;
}
  $lihat = ryRandom(1);
  
?>
<?php 
include 'assets/php/koneksi.php';
if($_POST['tambah']) {
        $id = $_POST['tambah'];
        $pengguna=mysqli_query($koneksi,"SELECT * FROM tb_pengguna") or die(mysqli_error());
        ?>
        
              <form method="POST" name="tambahPengguna" action="tambah-pengguna.php" enctype="multipart/form-data">
                  <div class="row">   
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Sebagai</label>
                        <select class="form-control" name="level">
                          <option value="Admin">Admin</option>
                          <option value="Pemilik">Pemilik</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Id Pengguna</label>
                      <input class="form-control" type="text" name="nik" value="<?php echo $lihat;?>" readonly>
                    </div>
                  </div>
                </div>                 <div class="row">   
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" name="nama" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>No Telepon</label>
                      <input type="text" name="telp" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk">
                          <option value="Laki - Laki">Laki - Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                  </div>
                </div>
                <center>
                  <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
        <?php
    }
?>

