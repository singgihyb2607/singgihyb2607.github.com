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

// Hapus Bayilahir
if ($module=='bayilahir' AND $act=='hapus'){
  mysql_query("DELETE FROM anak WHERE id_bayi_baru_lahir2='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input bayilahir
elseif ($module=='bayilahir' AND $act=='input'){
	$bln = date("m-y");
	$tahun=date("Y");
	$angka1=$tahun;
	$angka2=$_POST['tahun'];
	$hasil=$angka1-$angka2;
  mysql_query("INSERT INTO anak(Jenis_kelamin,tanggal_lahir,panjang,berat,denyut_nadi,lingkar_kepala,lingkar_dada,lingkar_lengan,respirasi,suhu,umur,bidan,keadaan_bayi,bln,id_pasien) 
	                     VALUES(
                                '$_POST[Jenis_kelamin]',
                                '$_POST[tanggal_lahir]',
                                '$_POST[panjang]',
                                '$_POST[berat]',
								'$_POST[denyut_nadi]',
								'$_POST[lingkar_kepala]',
								'$_POST[lingkar_dada]',
								'$_POST[lingkar_lengan]',
								'$_POST[respirasi]',
                                '$_POST[suhu]',
								'$hasil',
								'$_POST[bidan]',
								'$_POST[keadaan_bayi]',
								'$bln',
								'$_POST[Nama]')");
  header('location:../../media.php?module='.$module);
}

// Update bayilahir
elseif ($module=='bayilahir' AND $act=='update'){
	
	$tahun=date("Y");
	$angka1=$tahun;
	$angka2=$_POST['tahun'];
	$hasil=$angka1-$angka2;
  mysql_query("UPDATE anak SET Jenis_kelamin = '$_POST[Jenis_kelamin]',tanggal_lahir = '$_POST[tanggal_lahir]',panjang = '$_POST[panjang]',berat = '$_POST[berat]',denyut_nadi = '$_POST[denyut_nadi]',lingkar_kepala = '$_POST[lingkar_kepala]',lingkar_dada = '$_POST[lingkar_dada]',lingkar_lengan = '$_POST[lingkar_lengan]',respirasi = '$_POST[respirasi]',suhu = '$_POST[suhu]',umur='$hasil',keadaan_bayi='$_POST[keadaan_bayi]' WHERE id_bayi_baru_lahir2 =$_POST[id]");
  header('location:../../media.php?module='.$module);
}
}
?>
