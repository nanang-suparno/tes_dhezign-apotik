<?php
require_once "Excel.class.php";

#koneksi ke mysql
$mysqli = new mysqli("localhost","root","password","db_dkmotor");
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_error . ') ');
}
#akhir koneksi
#include('../db/config.php');
#ambil data
$query = "SELECT id_masuk, tanggal, id_brg, nm_brg, jml FROM barang_masuk";
$sql = $mysqli->query($query);
$arrmhs = array();
while ($row = $sql->fetch_assoc()) {
	array_push($arrmhs, $row);
}
#akhir data

$excel = new Excel();
#Send Header
$excel->setHeader('laporan barang_masuk.xls');
$excel->BOF();

#header tabel
$excel->writeLabel(0, 0, "Kode Masuk");
$excel->writeLabel(0, 1, "TANGGAL");
$excel->writeLabel(0, 2, "KODE BARANG");
$excel->writeLabel(0, 3, "NAMA BARANG");
$excel->writeLabel(0, 4, "JUMLAH");


#isi data
$i = 1;
foreach ($arrmhs as $baris) {
	$j = 0;
	foreach ($baris as $value) {
		$excel->writeLabel($i, $j, $value);
		$j++;
	}
	$i++;
}

$excel->EOF();

exit();
?>
