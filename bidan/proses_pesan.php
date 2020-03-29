<?php
include"config/koneksi.php";
mysql_query("insert into pesan (nama,alamat,tanggal,isi)values('$_POST[nama]','$_POST[alamat]','$_POST[tanggal]','$_POST[isi]')");
echo "<script>alert('Data sudah disimpan');javascript:history.go(-1);</script>"
?>