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
  mysql_query("DELETE FROM ibu WHERE id_ibu='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input ibuhamil
elseif ($module=='ibuhamil' AND $act=='input'){
  mysql_query("INSERT INTO ibu (Nama,Umur,Suku_Bangsa,Pendidikan_terakhir,Pekerjaan,Agama,Alamat,No_Telp,ayah)
VALUES ('$_POST[Nama]', '$_POST[Umur]', '$_POST[Suku_Bangsa]', '$_POST[Pendidikan_terakhir]', '$_POST[Pekerjaan]', '$_POST[Agama]', '$_POST[Alamat]', '$_POST[No_Telp]','$_POST[ayah]')");
  header('location:../../media.php?module='.$module);
}

// Update Ibuhamil
elseif ($module=='ibuhamil' AND $act=='update'){
  mysql_query("UPDATE ibu SET Nama = '$_POST[Nama]',Umur = '$_POST[Umur]',Suku_Bangsa = '$_POST[Suku_Bangsa]',Pendidikan_terakhir ='$_POST[Pendidikan_terakhir]',Pekerjaan = '$_POST[Pekerjaan]',Agama = '$_POST[Agama]',Alamat = '$_POST[Alamat]',No_Telp = '$_POST[No_Telp]',ayah = '$_POST[ayah]' WHERE id_ibu =$_POST[id]");
  header('location:../../media.php?module='.$module);
}
}
?>
