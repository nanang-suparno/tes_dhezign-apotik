<?php 
//include('../cek-login.php');
include('top.php');?>
<pre>
<form method="post" action="index.php" >
kode barang 	:<input type="text" name="kode" class="input" placeholder="kode barang" required>
kode lokasi 	:<input type="text" name="lokasi" class="input"placeholder="kode lokasi" required>
Nama Barang 	:<input type="text" name="nama" class="input"placeholder="nama barang" required>
Jenis Barang 	:<select type="text" name="jenis" class="input" >
				<option>PILIH JENIS Obat..</option>
				<option>Obat generic</option>
				<option>Obat Mahal</option>
			</select>
harga beli 	:<input type="text" name="beli" class="input"placeholder="harga beli" required>
harga jual 	:<input type="text" name="jual" class="input"placeholder="harga jual" required>
stok 		:<input type="text" name="stok" class="input"placeholder="stok" required>

<input type="submit" name="simpan" value="simpan">
</form>
<?php
if (isset($_POST['simpan'])) {
$kode = $_POST['kode'];
$lokasi = $_POST['lokasi'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$beli = $_POST['beli'];
$jual = $_POST['jual'];
$stok = $_POST['stok'];

mysql_connect("localhost","root","password");
mysql_select_db("db_dkmotor");

$sql="INSERT INTO barang VALUES('','$kode','$lokasi','$nama','$beli','$jual','$stok','$jenis')";
$aksi = mysql_query($sql);
	if (!$aksi) {
	echo "Maaf, gagal memasukan data.";
  	}else{
		echo '<script language="javascript">
	alert("Data telah tersimpan di database");
	window.location="index.php";
	</script>';
	exit();
  	}
  }
?>
<?php include('buttom.php');?>

