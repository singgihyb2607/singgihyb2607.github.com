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

// Hapus Ganggrep
if ($module=='gangrep' AND $act=='hapus'){
  mysql_query("DELETE FROM gangrep WHERE id_gangrep='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input Ganggrep
elseif ($module=='gangrep' AND $act=='input'){
  mysql_query("INSERT INTO gangrep(keluhan,tekanandarah,tekanannadi,respirasi, suhu,bidan,id_pasien) VALUES('$_POST[keluhan]','$_POST[tekanandarah]','$_POST[tekanannadi]','$_POST[respirasi]','$_POST[suhu]','$_POST[bidan]','$_POST[nama]')");
  header('location:../../media.php?module='.$module);
}

// Update Ganggrep
elseif ($module=='gangrep' AND $act=='update'){
 mysql_query("UPDATE gangrep SET keluhan = '$_POST[keluhan]',tekanandarah = '$_POST[tekanandarah]',tekanannadi = '$_POST[tekanannadi]',respirasi = '$_POST[respirasi]',suhu = '$_POST[suhu]' WHERE  id_gangrep =$_POST[id]");
  header('location:../../media.php?module='.$module);
}
}
?>
