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
$id=$_GET[id_hamil];

// Input kunjungan
if ($module=='kunjungan' AND $act=='input'){
	$tahun=date("Y");
	$angka1=$tahun;
	$angka2=$_POST['tahun_lahir'];
	$hasil=$angka1-$angka2;
	$yes = $_POST['umur'];
	
if (empty($_POST['tekanan_darah'])){
		echo "<script>alert('tekanan_darah Tidak Boleh kosong');history.go(-1)</script>";
	}
else if (empty($_POST['tekanan_nadi'])){
		echo "<script>alert('tekanan_nadi Tidak Boleh kosong');history.go(-1)</script>";
	}
else if (empty($_POST['respirasi'])){
		echo "<script>alert('respirasi Tidak Boleh kosong');history.go(-1)</script>";
	}
else if (empty($_POST['suhu'])){
		echo "<script>alert('suhu Tidak Boleh kosong');history.go(-1)</script>";
	}
else if (empty($_POST['tekanan_hb'])){
		echo "<script>alert('tekanan_hb Tidak Boleh kosong');history.go(-1)</script>";
	}
else if (empty($_POST['berat'])){
		echo "<script>alert('berat tidak oleh kosong');history.go(-1)</script>";
	}
else if (empty($_POST['tinggi'])){
		echo "<script>alert('tinggi tidak boleh kosong');history.go(-1)</script>";
	}
else if (empty($_POST['LILA'])){
		echo "<script>alert('LILA tidak boleh kosong');history.go(-1)</script>";
	}
else if (empty($_POST['kondisi'])){
		echo "<script>alert('pilih normal atau waspada');history.go(-1)</script>";
	}
else if (empty($_POST['catatan'])){
		echo "<script>alert('catatan tidak boleh kosong');history.go(-1)</script>";
	}
else {	

  mysql_query("INSERT INTO kunjungan (tanggal,keluhan,pergerakan,tekanan_darah,tekanan_nadi,respirasi,suhu,leoI,leoII,leoIII,tekanan_hb,berat,tinggi,LILA,kepala,muka,mata,mulut,hidung,id_hamil,ke,telinga,leher,payudara,abdoman,jam,umur,kondisi,catatan)
VALUES
 (NOW(),'$_POST[keluhan]
 ', '$_POST[pergerakan]
 ', '$_POST[tekanan_darah]
 ','$_POST[tekanan_nadi]','$_POST[respirasi]','$_POST[suhu]','$_POST[leoI]','$_POST[leoII]','$_POST[leoIII]','$_POST[tekanan_hb]','$_POST[berat]','$_POST[tinggi]
 ','$_POST[LILA]','$_POST[kepala]','$_POST[muka]','$_POST[mata]','$_POST[mulut]
 ','$_POST[hidung]','$_POST[id_hamil]','$_POST[ke]','$_POST[telinga]','$_POST[leher]','$_POST[payudara]','$_POST[abdoman]','NOW()','$yes','$_POST[kondisi]','$_POST[catatan]')");
  header('location:../../media.php?module=kunjungan&act=kunjungan&act=kunjungan&id='.$id);
}}

// Update kunjungan
elseif ($module=='kunjungan' AND $act=='update'){
	
	$tahun=date("Y");
	$angka1=$tahun;
	$angka2=$_POST['tahun_lahir'];
	$hasil=$angka1-$angka2;

	
mysql_query("UPDATE kunjungan SET tanggal = NOW(),keluhan = '$_POST[keluhan]',tekanan_darah = '$_POST[tekanan_darah]',tekanan_nadi ='$_POST[tekanan_nadi]',respirasi='$_POST[respirasi]',suhu='$_POST[suhu]',leoI='$_POST[leoI]',leoII='$_POST[leoII]',leoIII='$_POST[leoIII]',tekanan_hb='$_POST[tekanan_hb]',berat='$_POST[berat]',tinggi ='$_POST[tinggi]',LILA='$_POST[LILA]',kepala='$_POST[kepala]',muka='$_POST[muka]',mata='$_POST[mata]',mulut='$_POST[mulut]',hidung='$_POST[hidung]',ke='$_POST[ke]',telinga='$_POST[telinga]',leher='$_POST[leher]',payudara='$_POST[payudara]',abdoman='$_POST[abdoman]'
,jam= NOW(),kondisi='$_POST[kondisi]',catatan='$_POST[catatan]' WHERE id_kunjungan =$_POST[id]");
 header('location:../../media.php?module=kunjungan&act=kunjungan&act=kunjungan&act=kunjungan&id='.$id); 
  }

 

 
 
  // Hapus Kunjungan
if ($module=='kunjungan' AND $act=='hapus'){
  mysql_query("DELETE FROM kunjungan WHERE id_kunjungan='$_GET[id]'");
  header('location:../../media.php?module=kunjungan&act=kunjungan&act=kunjungan&id='.$id);
}
  
  
  

}

?>
