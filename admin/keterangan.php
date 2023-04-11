<?php 
include 'assets/php/koneksi.php';
$koneksi = mysqli_connect('localhost', 'root', '', 'db_swastamita');
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql=mysqli_query($koneksi,"SELECT * FROM tb_pengadaan WHERE id_pengadaan = '$id'");
        $suplier=mysqli_query($koneksi,"SELECT * FROM tb_supplier") or die(mysqli_error());
        $hasil=mysqli_fetch_array($sql);
        ?>
        
              <form method="POST" action="edit-barang.php" enctype="multipart/form-data">
                <div class="form-group">
                      <label>No Pengadaan</label>
                      <input type="text" name="id_pengadaan" value="<?=$hasil['id_pengadaan'];?>" class="form-control" readonly>
                    </div>
                <div class="row">
                  <div class="col-lg-9 col-sm-12">
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="hidden" name="idBarang" value="<?=$hasil['id_barang'];?>" class="form-control">
                      <input type="text" name="namaBarang" value="<?=$hasil['nama_barang'];?>" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-12">
                    <div class="form-group">
                      <label>Qty</label>
                      <input type="number" name="qty" value="<?=$hasil['qty'];?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="number" name="hargaBarang" value="<?=$hasil['harga_barang'];?>" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Harga Sewa (hari)</label>
                      <input type="number" name="hargaSewa" value="<?=$hasil['harga_sewa'];?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Gambar Barang ( max 1mb | PNG, JPG, dan JPEG )</label>
                  <input type="file" name="gambarBarang" class="form-control">
                </div>
                <center>
                  <button name="simpanBarang" class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
        <?php
    }
?>