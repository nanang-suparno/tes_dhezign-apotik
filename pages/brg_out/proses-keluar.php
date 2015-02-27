<?php
//include('../cek-login.php');
include('top.php');
$id = $_POST[ 'kode' ];
include('../db/config.php');
 $sql  = "select * from barang where no_urut='$id'";
  $aksi = mysql_query($sql);
  $numrows = mysql_num_rows($aksi);
if ($numrows=="0") {
echo "Data Tidak ditemukan";
}else{
while($data = mysql_fetch_array($aksi)) {
		$a=$data[0];
		$b=$data[1];
		$c=$data[2];
		$d=$data[3];
		$e=$data[4];
		$f=$data[5];
		$g=$data[6];
		$h=$data[7];
}
?>
<pre>
<form action="proses-keluar.php" method="post">
<input type='hidden' name='kode' value= <?php echo $id ;?> >
<input type='hidden' name='nama' value= <?php echo $b ?> >
<input type='hidden' name='stok' value=<?php echo $g ?> >
Kode Barang   <input type='button' name='kode' value=<?php echo $a ?> disabled>
Nama Barang   <input type='button' name='nama' value=<?php echo $b ?> disabled>
Stok          <input type='button' name='stok' value=<?php echo $g ?> disabled>
Masuk sebanyak<input type='text' name='masuk'>
<input type='submit' name='proses' value='proses'>
</pre>

<?php
if (isset($_POST['proses'])) {
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$stok = $_POST['stok'];
$keluar = $_POST['masuk'];
$tanggal=date("Y-m-d");

$query1 = mysql_query("select * from barang where no_urut='$kode'");
$data1 = mysql_num_rows($query);
while($baris1 = mysql_fetch_array($query1)) {
if ($baris1[6] < $keluar) {
		echo "Stok tidak mencukupi, jumlah stok sebanyak ".$baris1[6]."";
	}else{
		$stok = $baris1[6]-$keluar;
		$query1="update barang set qty='$stok' where no_urut='$kode'";
		$run = mysql_query($query1) or die (mysql_error());

		$sql1="INSERT INTO barang_keluar VALUES(null,'$tanggal','$kode','$nama','$keluar')";
		
$aksi2 = mysql_query($sql1);
	if (!$aksi2) {
	echo "Maaf, gagal memasukan data.";
  	}else{
  		echo '<script language="javascript">
	alert("Data telah tersimpan di database");
	window.location="index.php";
	</script>';
	exit();

}

  	}
  }
}
}

?>
<?php include('buttom.php');?>