<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus Ibuhamil
if ($module=='ibuhamil' AND $act=='hapus'){
  mysql_query("DELETE FROM hamil WHERE id_hamil='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input ibuhamil
elseif ($module=='ibuhamil' AND $act=='input'){
	$bln2=date("m-y");
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$siklus = $_POST['siklus'];
$date = date("d F Y",mktime(0,0,0,date("m"),date("d"),date("y")));
$angka=date("m");
$sekarang =$_POST['$tgl-$bln-$thn'];
if (checkdate($bln, $tgl, $thn))
{
if (checkdate($bln, $tgl, $thn))
{

// jika siklus haid normal 28 - 30 hari
$hpl = mktime(0, 0, 0, $bln + 9, $tgl + 7, $thn);
}
$hpl = date("d-m-Y",$hpl);
$umur = $angka - $bln ;
}
  mysql_query("INSERT INTO hamil (tanggalperiksa,HPHT,HPL,hamil_ke,bidan,umur_kehamilan,bln,id_pasien,tekanan)
VALUES('$_POST[tanggalperiksa]', '$tgl/$bln/$thn', '$hpl','$_POST[hamil_ke]', '$_POST[bidan]', '$umur','$bln2','$_POST[nama]','$_POST[tekanan]')");
  header('location:../../media.php?module='.$module);
}

// Update Ibuhamil
elseif ($module=='ibuhamil' AND $act=='update'){
$tgl = $_POST['tgl'];
$bln = $_POST['bln'];
$thn = $_POST['thn'];
$siklus = $_POST['siklus'];
$angka=date("m");
if (checkdate($bln, $tgl, $thn))
{
if (checkdate($bln, $tgl, $thn))
{
// jika siklus haid normal 28 - 30 hari
$hpl = mktime(0, 0, 0, $bln + 9, $tgl + 7, $thn);
}
$hpl = date("d-m-Y",$hpl); 
$umur = $angka - $bln ;
}

 mysql_query("UPDATE hamil SET tanggalperiksa = '$_POST[tanggalperiksa]',HPHT = '$tgl/$bln/$thn',HPL = '$hpl',hamil_ke = '$_POST[hamil_ke]',umur_kehamilan = '$umur',tekanan = '$_POST[tekanan]' WHERE id_hamil =$_POST[id]");
  header('location:../../media.php?module='.$module);
}
}
?>
