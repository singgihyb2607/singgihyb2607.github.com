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

// Input Memo
if ($module=='memo' AND $act=='input'){
  $pass=md5($_POST[password]);
  mysql_query("INSERT INTO memo(nama,alamat,tanggal,isi) 
	                       VALUES('$_POST[nama]','$_POST[alamat]','$_POST[tanggal]','$_POST[isi]')");
  header('location:../../media.php?module='.$module);
}

// Update Memo
elseif ($module=='memo' AND $act=='update'){
  mysql_query("UPDATE memo SET isi = '$_POST[isi]', nama = '$_POST[nama]', alamat = '$_POST[alamat]', tanggal = '$_POST[tanggal]'  WHERE id_memo =$_POST[id]");
  header('location:../../media.php?module='.$module);
}


// Hapus Ibuhamil
if ($module=='memo' AND $act=='hapus'){
  mysql_query("DELETE FROM memo WHERE id_memo='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE users SET password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_telp         = '$_POST[no_telp]'  
                           WHERE id_session      = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}

?>
