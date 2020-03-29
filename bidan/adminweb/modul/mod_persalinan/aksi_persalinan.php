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

// Hapus persalinan
if ($module=='persalinan' AND $act=='hapus'){
  mysql_query("delete from persalinan where id_persalinan ='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input persalinan
elseif ($module=='persalinan' AND $act=='input'){
	$bln = date("m-y");
  mysql_query("INSERT INTO persalinan (tanggalkontraksi ,tanggalpersalinan ,keluhan ,bidan,jam,jenis_persalinan,keadaan_ibu,bln,id_pasien)
  VALUES 
  ('$_POST[tanggalkontraksi]', '$_POST[tanggalpersalinan]','$_POST[keluhan]','$_POST[bidan]','$_POST[jam]','$_POST[jenis_persalinan]','$_POST[keadaan_ibu]','$bln','$_POST[nama]')");
  header('location:../../media.php?module='.$module);
}

// Update persalinan
elseif ($module=='persalinan' AND $act=='update'){
  mysql_query("UPDATE persalinan  SET tanggalkontraksi    = '$_POST[tanggalkontraksi]',
                                  tanggalpersalinan       = '$_POST[tanggalpersalinan]',
                                  keluhan                 = '$_POST[keluhan]',  
								  jenis_persalinan        = '$_POST[jenis_persalinan]', 
								  jam                     = '$_POST[jam]',
								  keadaan_ibu             = '$_POST[keadaan_ibu]'
								  
                           WHERE  id_persalinan           = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
