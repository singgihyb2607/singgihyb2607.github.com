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

// Input pasien
if ($module=='pasien' AND $act=='input'){
	$tahun=date("Y");
	$angka1=$tahun;
	$angka2=$_POST['tahun_lahir'];
	$hasil=$angka1-$angka2;
  mysql_query("INSERT INTO pasien (nama,jk,alamat,no_telp,bidan,kelurahan,rt,rw,kecamatan,kota,umur,agama)
VALUES ('$_POST[nama]','$_POST[jk]', '$_POST[alamat]', '$_POST[no_telp]', '$_POST[bidan]','$_POST[kelurahan]','$_POST[rt]','$_POST[rw]','$_POST[kecamatan]','$_POST[kota]','$hasil','$_POST[agama]')");
  header('location:../../media.php?module='.$module);
}

// Update user
elseif ($module=='pasien' AND $act=='update'){
	$tahun=date("Y");
	$angka1=$tahun;
	$angka2=$_POST['tahun'];
	$hasil=$angka1-$angka2;
	
	
  mysql_query("UPDATE pasien SET nama = '$_POST[nama]',jk = '$_POST[jk]',alamat = '$_POST[alamat]',no_telp ='$_POST[no_telp]',kelurahan='$_POST[kelurahan]',rt='$_POST[rt]',rw='$_POST[rw]',kecamatan ='$_POST[kecamatan]',kota='$_POST[kota]',umur='$hasil',agama='$_POST[agama]' WHERE id_pasien =$_POST[id]");
  }
  
  // Hapus Pasien
if ($module=='pasien' AND $act=='hapus'){
  mysql_query("DELETE FROM pasien WHERE id_pasien='$_GET[id]'");
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
