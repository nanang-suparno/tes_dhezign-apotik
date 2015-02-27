<?php 
//include('../cek-login.php');

include('top.php');
// koneksi ke mysql
include('../db/config.php');?>
<table class="datatable table-striped">
        <thead>
        <tr>
          <th>No Urut </th>
          <th>Kode Spare Parts</th>
          <th>Location Kode</th>
          <th>Nama Barang</th>
          <th>Jenis Barang</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Stok </th>
          </tr>
        </thead>
<?php
  $query=mysql_query("select * from barang");
	while($stok=mysql_fetch_array($query)){
		?>
    <tr bgcolor="#CCFFCC">
      <td><?php echo $stok[0];?></td>
      <td><?php echo $stok[1];?></td>

      <td><?php echo $stok[2];?></td>
      <td><?php echo $stok[3];?></td>
      <td><?php echo $stok[7];?></td>
      <td><?php echo $stok[4];?></td>
      <td><?php echo $stok[5];?></td>
      <td><?php echo $stok[6];?></td>
         
    </tr>
    <?php } ?>
 
  </table>
  <?php include('buttom.php');?>