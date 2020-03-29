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
	
	$tgl = $_POST['tgl'];
	$bln = $_POST['bln'];
	$thn =$_POST['tahun_lahir']; 
	$tanggal = $tgl.'-'.$bln.'-'.$thn;
  mysql_query("INSERT INTO pasien (nama,jk,alamat,no_telp,bidan,kelurahan,rt,rw,kecamatan,kota,tanggallahir,pend_terakhir,agama,suami,no_telp_suami)
VALUES ('$_POST[nama]','$_POST[jk]', '$_POST[alamat]', '$_POST[no_telp]', '$_POST[bidan]','$_POST[kelurahan]','$_POST[rt]','$_POST[rw]','$_POST[kecamatan]','$_POST[kota]','$tanggal','$_POST[pend_terakhir]','$_POST[agama]','$_POST[suami]','$_POST[no_telp_suami]')");
  header('location:../../media.php?module=home');
}

// Update user
elseif ($module=='pasien' AND $act=='update'){
	$tahun=date("Y");
	$angka1=$tahun;
	$angka2=$_POST['tahun'];
	$hasil=$angka1-$angka2;
	
	
  mysql_query("UPDATE pasien SET nama = '$_POST[nama]',jk = '$_POST[jk]',alamat = '$_POST[alamat]',no_telp ='$_POST[no_telp]',kelurahan='$_POST[kelurahan]',rt='$_POST[rt]',rw='$_POST[rw]',kecamatan ='$_POST[kecamatan]',kota='$_POST[kota]',umur='$hasil',agama='$_POST[agama]',umur='$hasil',pend_terakhir='$_POST[pend_terakhir]'
  ,suami='$_POST[suami]',no_telp_suami='$_POST[no_telp_suami]' WHERE id_pasien =$_POST[id]");
  header('location:../../media.php?module=home');
  }
  
  // Hapus Pasien
if ($module=='pasien' AND $act=='hapus'){
  mysql_query("DELETE FROM pasien WHERE id_pasien='$_GET[id]'");
  mysql_query("DELETE FROM persalinan WHERE id_pasien='$_GET[id]'");
   mysql_query("DELETE FROM gangrep WHERE id_pasien='$_GET[id]'");
    mysql_query("DELETE FROM hamil WHERE id_pasien='$_GET[id]'");
	 mysql_query("DELETE FROM anak WHERE id_pasien='$_GET[id]'");
	  mysql_query("DELETE FROM kb WHERE id_pasien='$_GET[id]'");
  
  header('location:../../media.php?module=home');
}
  
  



}

?>
