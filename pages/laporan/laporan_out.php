<?php
//untuk koneksi database
//include('../cek-login.php');
include('top.php');
	include('../db/config.php');
//untuk menantukan tanggal awal dan tanggal akhir data di database
$min_tanggal=mysql_fetch_array(mysql_query("select min(tanggal) as min_tanggal from barang_keluar"));
$max_tanggal=mysql_fetch_array(mysql_query("select max(tanggal) as max_tanggal from barang_keluar"));
?>
</head>
<body>
    <div class="container">
      <div class="hero-unit">
<form action="laporan_out.php" method="post" name="postform">
<table width="435" border="0">
<tr>
    <td>Tanggal Awal</td>
    <td colspan="2"><input type="text" name="tanggal_awal" size="15" value="<?php echo $min_tanggal['min_tanggal'];?>"/>
    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
    </td>
</tr>
<tr>
    <td>Tanggal Akhir</td>
    <td colspan="2"><input type="text" name="tanggal_akhir" size="15" value="<?php echo $max_tanggal['max_tanggal'];?>"/>
    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
    </td>
</tr>
<tr>
    <td><input type="submit" value="Tampilkan Data" name="cari"></td>
    <td colspan="2">&nbsp;</td>
</tr>
</table>
</form>
<br><br><br>
<p>

<?php
//di proses jika sudah klik tombol cari
if(isset($_POST['cari'])){
	
	//menangkap nilai form

	$tanggal_awal=$_POST['tanggal_awal'];
	$tanggal_akhir=$_POST['tanggal_akhir'];
	
	if(empty($nasabah) and empty($tanggal_awal) and empty($tanggal_akhir)){
		//jika tidak menginput apa2
		$query=mysql_query("select * from tabel_nasabah");
		$jumlah=mysql_fetch_array(mysql_query("select sum(uang) as total from tabel_nasabah"));
		
	}else{
		
		?><i><b>Informasi : </b> Laporan daftar pemohon</b> dari tanggal <b><?php echo $_POST['tanggal_awal']?></b> sampai dengan tanggal <b><?php echo $_POST['tanggal_akhir']?></b></i><?php
		
		$query=mysql_query("select * from barang_keluar where tanggal between '$tanggal_awal' and '$tanggal_akhir'");
		$jumlah=mysql_fetch_array(mysql_query("select sum(total_bayar) as total from barang_keluar where tanggal between '$tanggal_awal' and '$tanggal_akhir'"));
	}
	
	?>
</p>

<table class="datatable">
	<tr>
    	<td width="131">Kode Transaksi</td>
    	<td width="131">Tanggal</td>
    	<td width="131">Kode barang</td>
    	<td width="250">Nama Barang</td>
    	<td width="104">Harga Beli</td>
    	<td width="104">Harga Jual</td>
    	<td width="50">Jumlah Keluar</td>
    	<td align="right" width="104">Uang (Rp)</td>
    </tr>
	<?php
	//untuk penomoran data
	//$no=0;
	
	//menampilkan data
	while($row=mysql_fetch_array($query)){
	?>
    <tr>
    	<!--<td><?php echo $no=$no+1; ?></td>-->
   		<td><?php echo $row[0]; ?></td>
    	<td><?php echo $row[1];?></td>
    	<td><?php echo $row[2]; ?></td>
    	<td><?php echo $row[3];?></td>
    	<td><?php echo $row[2]; ?></td>
    	<td><?php echo $row[1];?></td>
    	<td><?php echo $row[4]; ?></td>
   
    	<td align="right"><?php //echo number_format($row['total_bayar'],2,',','.');?></td>
    </tr>
    <?php
	}
	?>
 <!--   <tr>
    	<td colspan="5" align="right"><strong>TOTAL</strong></td><td align="right"><?php echo number_format($jumlah['total'],2,',','.');?></td>
    </tr>
   --> 
    <tr>
    	<td colspan="6" align="center"> 
		<?php
		//jika data tidak ditemukan
		if(mysql_num_rows($query)==0){
			echo "<font color=red><blink>Tidak ada data yang dicari!</blink></font>";
		}
		?>
        </td>
    </tr>
     
</table>


<?php
}else{
	unset($_POST['cari']);
}
?>

<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<?php include('buttom.php');?>