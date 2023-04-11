<?php 
include 'assets/php/koneksi.php';
if($_POST['tambah']) {
        $id = $_POST['tambah'];
        $kategori=mysqli_query($koneksi,"SELECT * FROM tb_supplier") or die(mysqli_error());
        ?>
        
              <form method="POST" name="tambahSuplier" action="tambah-suplier" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Nama Suplier</label>
                      <input type="text" name="nama" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Telepon</label>
                      <input type="text" name="no_hp" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control">
                  
                </div>
                <center>
                  <button type="submit" name="simpanSuplier" class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
        <?php
    }
?>

