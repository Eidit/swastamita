
        <?php include 'assets/php/koneksi.php';
        
          
        ?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Transaksi</title>
		<style type="text/css">
			table {
			  border-collapse: collapse;
			}
		</style>
	</head>
  <?php
                  $koneksi = mysqli_connect('localhost', 'root', '', 'db_swastamita');
                    if (isset($_POST['cetak'])) {
                     $no_transaksi=$_POST['no_transaksi'];
                     $namaPelanggan=$_POST['namaPelanggan'];
                     $noTelp=$_POST['noTelp'];
                     $tglPesan=$_POST['tglPesan'];
                     $tglKembali=$_POST['tglKembali'];
                     $lamaSewa=$_POST['lamaSewa'];
                     $totalBayar=$_POST['totalBayar'];
                     $denda=$_POST['denda'];
                     $ket=$_POST['ket'];
                      $jenisJaminan=$_POST['jenisJaminan'];
                      $idBarang=$_POST['idBarang'];
                      $namaBarang=$_POST['namaBarang'];
                      $sewaBarang=$_POST['sewaBarang'];
                      $jmlBarang=count($idBarang);
                      
                    }
                  ?>
	<body>

		<table align="center" border="0" cellpadding="1" style="width: 700px;">
			<tbody>
        <tr><td colspan="3"><div align="center">
        <span style="font-family: Verdana; font-size: x-small;"><img src="assets/img/logo3.png" width="100px"><b><h1>SWASTAMITA OUTDOOR</h1></b></span></div>
        <div align="right"></div>
        <span style="font-family: Verdana; font-size: x-small;"><h3>NOTA PENYEWAAN</h3></span>
        <span> 0821-1544-4405</span></br>
        <span> Jl. Pangkalan RT/02 RW/09 Kec. Tanjungsari Desa. Margajaya Sumedang </span>
        <hr color="black"></td>
        </tr>
      </tbody>
		</table><br>
		<div class="row">
                    <div class="col-lg-6 col-sm-12">
                      <table>
                        <tr>
                          <td>Nama Pelanggan</td>
                          <td width="15" style="text-align: center;">:</td>
                          <td><?=$namaPelanggan;?></td>
                        </tr>
                        <tr>
                          <td>No Telp</td>
                          <td style="text-align: center;">:</td>
                          <td><?=$noTelp;?></td
                        </tr>
                        <tr>
                          <td>Jaminan</td>
                          <td style="text-align: center;">:</td>
                          <td><?=$jenisJaminan;?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <table>
                        <tr>
                          <td>Tanggal Sewa</td>
                          <td width="15" style="text-align: center;">:</td>
                          <td><?=$tglPesan;?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Kembali</td>
                          <td style="text-align: center;">:</td>
                          <td><?=$tglKembali;?></td>
                        </tr>
                        <tr>
                          <td>Lama Sewa</td>
                          <td style="text-align: center;">:</td>
                          <td><?=$lamaSewa;?> Hari</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <table align="center" border="0" cellpadding="1" style="width: 700px;">
			<tbody>
				<tr><td colspan="3"><div align="center">
				<span style="font-family: Verdana; font-size: x-small;"><h3>List Barang Yang Disewa</h3></span>
				</div></td>
				</tr>
			</tbody>
		</table>
		<table border="1" width="100%" align="center">

			<tr>
				<th>NO</th>
				<th>ID BARANG</th>
				<th>NAMA BARANG</th>
				<th>JUMLAH DISEWA (Unit)</th>
			</tr>
		

<?php
                      $no=1;
                        for ($i=0; $i<$jmlBarang; $i++)  { 
                        ?>
                        
                        <input type="hidden" name="barang[]" value="<?=$idBarang[$i];?>" class="form-control" required>
                        <tr>
                          <td><?=$no;?></td>
                          <td><?=$idBarang[$i];?></td>
                          <td><?=$namaBarang[$i];?></td>
                          <td><?=$sewaBarang[$i];?></td>
                      
                        </tr>
                        <?php
                        $no++;
                        }
                      ?>
                     
		</table>
		<br>
			<table width="100%" align="center">
            	<th align="left" width="25%">Total</th>
            	<th align="left" width="25%">Keterangan</th>
            	<th align="left" >Denda</th>
              <th align="left" >Total Bayar</th>
            	<tr>
            		<td align="left">Rp. <?=number_format($totalBayar);?></td>
            		<td align="left"><?=$ket;?></td>
            		<td align="left">Rp. <?=number_format($denda);?></td>
                <td align="left"><b>Rp. <?=number_format($totalBayar+$denda);?></b></td>
            	</tr>       
            </table>
	</body>
	<script>
		 window.load = print_d();
		 function print_d(){
		 window.print();
		 }
	 </script>
    
	</html>