<?php
include"config/koneksi.php";
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);


$username  = mysql_real_escape_string ($username);
$password  = mysql_real_escape_string ($password);

$chek = mysql_num_rows(mysql_query("SELECT * FROM  users WHERE username ='$username' and password = '$password'"));
if($chek==1)
{
$_SESSION['username'] = $username;
header("location:user.php");
	
}
else{

	echo"<script>alert('data yang anda masukkan salah'); javascript:history.go(-1);  </script>";
	}



?>