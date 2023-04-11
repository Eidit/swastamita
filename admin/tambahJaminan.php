<?php 
include 'assets/php/koneksi.php';
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql=mysqli_query($koneksi,"SELECT * FROM tb_transaksi WHERE no_transaksi = '$id'");
        $hasil=mysqli_fetch_array($sql);
        ?>
        
              <form method="POST" action="edit-jaminan.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label>No Transaksi</label>
                  <input type="text" name="idTransaksi" value="<?=$hasil['no_transaksi'];?>" class="form-control" readonly>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Nama Pelanggan</label>
                      <input type="text" name="namaPelanggan" value="<?=$hasil['nama_pemesan'];?>" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>No Telp</label>
                      <input type="number" name="noTelp" value="<?=$hasil['no_telp'];?>" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Sewa</label>
                      <input type="text" name="tglSewa" value="<?=$hasil['tgl_pesan'];?>" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>Tanggal Kembali</label>
                      <input type="text" name="tglKembali" value="<?=$hasil['tgl_kembali'];?>" class="form-control"readonly>
                      <input type="hidden" name="totalBayar" value="<?=$hasil['total_bayar'];?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Pilih Jenis Identitas</label>
                  <select name="jenisJaminan" class="form-control">
	                        <option value="<?=$hasil['jenis_jaminan'];?>">--- Pilih Jaminan ---</option>
	                        <option value="KTP">KTP</option>
	                        <option value="SIM">SIM</option>
	                        <option value="Kartu Pelajar">Kartu Pelajar</option>
                          <option value="KTA">KTA</option>
                          <option value="DLL">DLL</option>
                  </select>
                  
                </div>
                <div class="form-group">
                  <label>No Identitas</label>
                  <input type="text" name="nojaminan" value="<?=$hasil['no_jaminan'];?>" class="form-control" required>
                </div>
                <center>
                  <button name="simpanJaminan" class="btn btn-success btn-sm">Simpan</button>
                </center>
              </form>
        <?php
    }
?>