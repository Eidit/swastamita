<?php 
include 'assets/php/koneksi.php';
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql=mysqli_query($koneksi,"SELECT * FROM tb_pengadaan JOIN tb_supplier ON tb_pengadaan.id_supplier=tb_supplier.id_supplier   ORDER BY no_pengadaan DESC, status");
        $hasil=mysqli_fetch_array($sql);
        ?>
        
              <form method="POST" action="simpan-ket.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label>No Pengadaan</label>
                  <input type="hidden" name="id_supplier" class="form-control" readonly>
                  <input type="hidden" name="status" class="form-control" readonly>
                  <input type="text" name="idPengadaan" value="<?=$hasil['no_pengadaan'];?>" class="form-control" readonly>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="text" name="tanggal" value="<?=$hasil['tanggal'];?>" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Nama Suplier</label>
                      <input type="text" name="namaSup" value="<?=$hasil['nama_supplier'];?>" class="form-control" readonly>
                      <input type="hidden" name="noHp" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                    <textarea name="Ket" class="form-control" value="<?=$hasil['ket'];?>"></textarea>
                </div>
                <center>
                  <button name="simpanKet" class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
        <?php
    }
?>