<?php
include"config/koneksi.php";
mysql_query("insert into memo(isi,nama,alamat,tanggal,email,pelayanan,nomor_telepon,kode_pos,nik,pekerjaan,jk)
 values ('$_POST[isi]','$_POST[nama]','$_POST[alamat]/$_POST[rt]/$_POST[rw]/$_POST[kac]/$_POST[kab]','$_POST[tanggal]','$_POST[email]','$_POST[pelayanan]','$_POST[nomor_telepon]','$_POST[kode_pos]','$_POST[nik]','$_POST[pekerjaan]','$_POST[jk]')");
echo "<script>alert('pesan sudah terkirim');javascript:history.go(-1);</script>"

?>