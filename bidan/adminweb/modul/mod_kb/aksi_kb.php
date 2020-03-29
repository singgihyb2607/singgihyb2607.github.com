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

// Hapus Kb
if ($module=='kb' AND $act=='hapus'){
  mysql_query("DELETE FROM kb WHERE id_kb='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input kb
elseif ($module=='kb' AND $act=='input'){
	$bln=date("m");
mysql_query("INSERT INTO kb(lama_pengguna,keluhan,tanggal_pemasangan,tanggal_kontrol, tanggal_penggantian ,bidan,jenis_kb,bln,id_pasien)VALUES('$_POST[lama_pengguna]','$_POST[keluhan]','$_POST[tanggal_pemasangan]','$_POST[tanggal_kontrol]','$_POST[tanggal_penggantian]','
  $_POST[bidan]','$_POST[jenis_kb]','
  $bln','$_POST[nama]')");
  header('location:../../media.php?module='.$module);
}

// Update kb
elseif ($module=='kb' AND $act=='update'){
   mysql_query("UPDATE kb SET lama_pengguna = '$_POST[lama_pengguna]',keluhan= '$_POST[keluhan]',tanggal_pemasangan = '$_POST[tanggal_pemasangan]',tanggal_kontrol = '$_POST[tanggal_kontrol]',tanggal_penggantian  = '$_POST[tanggal_penggantian]',
  jenis_kb = '$_POST[jenis_kb]'  WHERE  id_kb =$_POST[id]");
header('location:../../media.php?module='.$module);
}
}
?>
