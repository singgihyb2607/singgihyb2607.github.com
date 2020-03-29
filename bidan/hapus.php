<?php
include"config/koneksi.php";
$id_pesan = $_GET['id_pesan'];
mysql_query("delete from pesan where id_pesan=$id_pesan");
header("location:user.php");
?>