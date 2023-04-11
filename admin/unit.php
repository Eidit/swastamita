<?php 
include 'assets/php/koneksi.php';
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql=mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE id_barang = '$id'");
        $kategori=mysqli_query($koneksi,"SELECT * FROM tb_kategori") or die(mysqli_error());
        $hasil=mysqli_fetch_array($sql);
        ?>
        
              <form method="POST" action="edit-barang.php" enctype="multipart/form-data">
                <div class="form-group">
                  <select class="form-control" name="kategori" onchange="idBarang(this.value)" hidden>
                    <option hidden value="0">Pilih Kategori</option>
                    <?php while ($hasilKategori=mysqli_fetch_array($kategori)) { 
                        if ($hasilKategori['id_kategori']==$hasil['id_kategori']) {
                          $selected='selected';
                        }else{
                          $selected='';
                        }
                      ?>
                      <option value="<?=$hasilKategori['id_kategori'];?>" <?=$selected;?> ><?=$hasilKategori['nama_kategori'];?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="row">
                      <input type="hidden" name="idBarang" value="<?=$hasil['id_barang'];?>" class="form-control"hidden>
                      <input type="text" name="namaBarang" value="<?=$hasil['nama_barang'];?>" class="form-control"hidden>
                  <div class="col-lg-3 col-sm-12">
                    <div class="form-group">
                      <label>Unit</label>
                      <input type="number" name="qty" value="<?=$hasil['qty'];?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <input type="number" name="hargaBarang" value="<?=$hasil['harga_barang'];?>" class="form-control"hidden>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <input type="number" name="hargaSewa" value="<?=$hasil['harga_sewa'];?>" class="form-control"hidden>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="file" name="gambarBarang" class="form-control"hidden>
                </div>
                <center>
                  <button name="simpanBarang" class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
        <?php
    }
?>