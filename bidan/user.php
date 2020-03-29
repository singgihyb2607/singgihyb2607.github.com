<?php
session_start();
if(! isset($_SESSION['username']))
{
	header("location:user.php");
	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FROM USER</title>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
</script>
<!-- /TinyMCE -->


<link href="style.css" rel="stylesheet" type="text/css" />
<?php
 	$date = date("d F Y",mktime(0,0,0,date("m"),date("d"),date("y")));
	
?>
</head>

<body class="background">
<script type="text/javascript">
if (document.location.protocol == 'file:') {
	alert("The examples might not work properly on the local file system due to security settings in your browser. Please use a real webserver.");
}
</script>
<table width="1180" border="0" align="center" cellpadding="0" cellspacing="0" id="table">
  <tr>
    <th height="174" colspan="2" scope="col"><img src="adminweb/images/header2.jpg" /></th>
  </tr>
  <tr>
    <td height="25" colspan="2" class="garis"></td>
  </tr>
  <tr>
    <td width="100" height="319" align="left" valign="top" bgcolor="#FFFFFF">
    
      <table width="100" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <th scope="col"><a href="logout.php">LOGOUT</a></th>
        </tr>
        <tr>
          <td>
         
          
          
          </td>
        </tr>
    </table></td>
    <td width="1080" align="left" valign="top" bgcolor="#FFFFFF">
    
     
      <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="memo.php">
        <table width="736" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <th width="82" scope="col">&nbsp;</th>
            <th width="10" scope="col">&nbsp;</th>
            <th width="650" scope="col">&nbsp;</th>
          </tr>
          <tr>
            <td>Nama </td>
            <td>:</td>
            <td><input name="nama" type="text" id="nama" size="35" /></td>
          </tr>
          <tr>
            <td>Jenis Kelamin </td>
            <td>:</td>
            <td>
            
             <select name="jk">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            
            </select>
            
            </td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
            <input name="alamat" type="text" id="alamat" size="35" /><br />
            <input name="rt" type="text" id="alamat" size="10" value="RT(   )" />
            <input name="rw" type="text" id="alamat" size="10" value="RW(   )" /><br />
            <input name="kac" type="text" id="alamat" size="35" value="kac." /><br />
            <input name="kab" type="text" id="alamat" size="35" value="KAB." /></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><input name="tanggal" type="text" id="tanggal" size="35" disabled="disabled" value="<?php echo $date ?>" />
             <input type ="hidden" name="tanggal" id="tanggal" value="<?php echo $date ?>"/></td>
          </tr>
          
          <tr>
            <td height="29">Email</td>
            <td>:</td>
            <td><input name="email" type="text" id="email" size="35" /></td>
          </tr>
          <tr>
            <td height="30">Pelayanan</td>
            <td>:</td>
            <td>
            
            <select name="pelayanan">
            <option value="persalinan">persalinan</option>
            <option value="Ibu_Hamil">Ibu_Hamil</option>
            <option value="Bayi_Lahir">Bayi Lahir</option>
            <option value="KB">Keluarga Berencana</option>
            <option value="Ganggrep">Gangguan reproduksi</option>
            </select>
            </td>
          </tr>
          <tr>
            <td height="31">Nomor Telp</td>
            <td>:</td>
            <td><input name="nomor_telepon" type="text" id="nomor_telepon" size="35" /></td>
          </tr>
          <tr>
            <td height="30">Kode POS</td>
            <td>:</td>
            <td><input name="kode_pos" type="text" id="kode_pos" size="35" /></td>
          </tr>
           <tr>
            <td height="30">NIK</td>
            <td>:</td>
            <td><input name="nik" type="text" id="nik" size="35" /></td>
          </tr>
          <tr>
            <td height="30">Pekerjaan</td>
            <td>:</td>
            <td><input name="pekerjaan" type="text" id="pekerjaan" size="35" /></td>
          </tr>
          <tr>
            <td height="81">Pesan</td>
            <td>:</td>
            <td><textarea name="isi" id="isi" cols="45" rows="5"></textarea></td>
          </tr>
          <tr>
            <td height="33">&nbsp;</td>
            <td>&nbsp;</td>
            <td><input type="submit" name="button" id="button" value="Kirim" />
            <input type="reset" name="button2" id="button2" value="Hapus" /></td>
          </tr>
        </table>
      </form>
    <p>
    
     <table width="895" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th width="51" scope="col" bgcolor="#02f8fb">NO</th>
          <th width="151" scope="col" bgcolor="#02f8fb">Nama</th>
          <th width="148" scope="col" bgcolor="#02f8fb">Tanggal</th>
          <th width="151" scope="col" bgcolor="#02f8fb">Alamat</th>
          <th width="263" scope="col" bgcolor="#02f8fb">Pesan</th>
          <th width="131" scope="col" bgcolor="#02f8fb">Aksi</th>
        </tr>
         <?php
		  include"config/koneksi.php";
		  $no = 1;
		  $query=mysql_query("select *from pesan");
		  while ($data=mysql_fetch_array($query))
		  {
			  $id_pesan  = $data ['id_pesan'];
			  $nama   = $data ['nama'];
			  $alamat = $data ['alamat'];
			  $tanggal = $data ['tanggal'];
			  $isi = $data ['isi'];
		  
           echo"<tr>";
          echo "<th align='center'>$no</th>";
          echo"<th>$nama</th>";
          echo "<th>$tanggal</th>";
		  echo "<th>$alamat</th>";
          echo "<th>$isi</th>";
		  echo "<th> <a href=\"hapus.php?id_pesan=$id_pesan\" onclick = 'return confirm (\"anda yakin ingin menghapus pesan dengan nama = $nama\");'>
		  <button>Hapus</button> </a></th>";
          echo"<th></th>";
          echo"</tr>";
		  $no++;
	
	}
          ?>
			
      </table>
    </p></td>
  </tr>
  <tr>
    <td height="40" colspan="2" bgcolor="#02f8fb">&nbsp;</td>
  </tr>
</table>
</body>
</html>
