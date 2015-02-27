<?php 
//include('../cek-login.php');
include ('top.php');
// menggunakan class phpExcelReader
include "excel_reader2.php";

// koneksi ke mysql
include('../db/config.php');

// membaca file excel yang diupload
$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

// membaca jumlah baris dari data excel
$baris = $data->rowcount($sheet_index=0);

// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
$sukses = 0;
$gagal = 0;

// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
for ($i=2; $i<=$baris; $i++)
{
  // memrbaca data nim (kolom ke-1)
  $no_urut= $data->val($i, 1);
  // membaca data nama (kolom ke-2)
  $kode_brg = $data->val($i, 2);
  // membaca data alamat (kolom ke-3)
  $kode_lokasi = $data->val($i, 3);
  // membaca data nim (kolom ke-4)
  $nama_brg = $data->val($i, 4);
  // membaca data nama (kolom ke-5)
  $hrg_beli = $data->val($i, 5);
  // membaca data alamat (kolom ke-6)
  $hrg_jual = $data->val($i, 6);

// membaca data nim (kolom ke-7)
  $qty = $data->val($i, 7);
  // membaca data nama (kolom ke-8)
  $jns_brg = $data->val($i, 8);



  // setelah data dibaca, sisipkan ke dalam tabel mhs
  $query = "INSERT INTO barang VALUES ('$no_urut', '$kode_brg','$kode_lokasi','$nama_brg', '$hrg_beli', '$hrg_jual','$qty','$jns_brg')";
  $hasil = mysql_query($query);

  // jika proses insert data sukses, maka counter $sukses bertambah
  // jika gagal, maka counter $gagal yang bertambah
  if ($hasil) $sukses++;
  else $gagal++;
}

// tampilan status sukses dan gagal
echo "<h3>Proses import data selesai.</h3>";
echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
echo "Jumlah data yang gagal diimport : ".$gagal."</p>";
?>
<?php include('buttom.php');?>