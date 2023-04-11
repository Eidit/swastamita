<?php 
include 'assets/php/koneksi.php';
$koneksi = mysqli_connect('localhost','swastami_root','t.d6!kEI0{Qf','swastami_db_swastamita');
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql=mysqli_query($koneksi,"SELECT * FROM tb_pengguna WHERE id_pengguna = '$id'");
        $hasil=mysqli_fetch_array($sql);
        ?>
        
              <form method="POST" action="edit-pengguna.php" enctype="multipart/form-data">
                  

                 <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                  <label>ID Pengguna</label>
                  <input type="hidden" name="idPengguna" value="<?=$hasil['id_pengguna'];?>" class="hide" readonly>
                  <input type="hidden" name="username" value="<?=$hasil['username'];?>" class="hide" readonly>
                  <input type="hidden" name="password" value="<?=$hasil['password'];?>" class="hide" readonly>
                  <input type="hidden" name="level" value="<?=$hasil['level'];?>" class="hide" readonly>
                  <input type="text" name="nik" value="<?=$hasil['nik'];?>" class="form-control" readonly>
                </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="namaPengguna" value="<?=$hasil['nama_pengguna'];?>" class="form-control" >
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Jenis Kelamin </label>
                      <input type="text" name="jk" value="<?=$hasil['jk'];?>" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>No Telp</label>
                      <input type="number" name="telp" value="<?=$hasil['telp'];?>" class="form-control" >
                    </div>
                  </div>
                </div>
                <div class="form-group">
                      <label>Alamat</label>
                        <input type="text" name="alamat" value="<?=$hasil['alamat'];?>" class="form-control" >
                    </div>
                <center>
                  <button name="simpanPengguna" class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
        <?php
    }
?>