
<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_memo/aksi_memo.php";
switch($_GET[act]){
  // Tampil Memo
  default:
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
      $tampil = mysql_query("SELECT * FROM memo");
      echo "<h2>Daftar Memo</h2>
          <input type=button value='Tambah Daftar Memo' onclick=\"window.location.href='?module=memo&act=tambahmemo';\">";
    }
    else{
      $tampil=mysql_query("SELECT * memo");
      echo "<h2>Daftar Memo</h2>";
    }
    
    echo "<table class='list'><thead>
          <tr>
          <td class='left'>No</td>
		  <td class='left'>Nama</td>
		  
		  <td class='left'>Tanggal</td>
          <td class='center'>Memo</td>
		  
		  <td class='center'>Aksi</td>
          </tr></thead> "; 
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td class='left' width='25'>$no</td>
	         <td class='left'> <a href=?module=memo&act=detail&id=$r[id_memo]>$r[nama]</a></td>
			
			 <td class='left'>$r[tanggal]</td>
             <td class='left'><h2>$r[isi]</h2></td>
			 
             <td class='center' width='50'><a href=?module=memo&act=editmemo&id=$r[id_memo]><img src='images/edit.png' border='0' title='edit' /></a><a href=$aksi?module=memo&act=hapus&id=$r[id_memo]><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
	   
    }
    echo "</table>";
    break;
  
  
  case "detail":
    $edit=mysql_query("SELECT * FROM memo WHERE id_memo='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>DETAIL</h2>
          <form method=POST action='$aksi?module=memo&act=update'>
		  <input type=hidden name='id' value='$r[id_memo]'>
          <table class='list'>
          <form method=POST action='$aksi?module=memo&act=input'>
          <table class='list'><tbody>
		 <tr height='35'><td>Nama   </td>           <td> : $r[nama]</td heigh='20'></tr>
		 <tr height='35'><td>Alamat </td>           <td> : $r[alamat]</td></tr>
		 <tr height='35'><td>Tanggal </td>          <td> : $r[tanggal]</td></tr>
		 <tr height='35'><td>Email  </td>           <td> : $r[email]</td heigh='20'></tr>
		 <tr height='35'><td>Pelayanan </td>        <td> : $r[pelayanan]</td></tr>
		 <tr height='35'><td>NO Telepon</td>        <td> : $r[nomor_telepon]</td></tr>
		 <tr height='35'><td>Kode POS</td>          <td> : $r[kode_pos]</td heigh='20'></tr>
		 <tr height='35'><td>NIK </td>              <td> : $r[nik]</td></tr>
		 <tr height='35'><td>Pekerjaan </td>        <td> : $r[pekerjaan]</td></tr>
		 <tr height='35'><td>Jenis Kelamin </td>    <td> : $r[jk]</td></tr>
		 <tr height='35'><td class='left' width='100'>Pesan</td><td class='left'> :
<h2>$r[isi]</h2></td></tr> </form>";
		  
	echo"</select></td></tr>
           <tr><td class='left' colspan=2>
                            <input type=button value=Kembali onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
  
  
  
  
  
   
  case "tambahmemo":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Tambah Memo</h2>
          <form method=POST action='$aksi?module=memo&act=input'>
          <table class='list'><form method=POST action='$aksi?module=memo&act=input'>
          <table class='list'><tbody>
		  <tr>
		  
		 <tr><td>Nama </td>           <td> : <input type=text name='nama'></td></tr>
		 <tr><td>Alamat </td>           <td> : <input type=text name='alamat'></td></tr>
		 <tr><td>Tanggal </td>           <td> : <input type=text name='tanggal' id='input'></td></tr>
		  <td class='left' width='100'>Pesan</td> <td class='left'> <textarea align='center' style='border-radius: 7px 7px 7px 7px; border: 1px solid                rgb(204, 204, 204); height: 150px; width: 500px;' name='isi'>
                Silahkan Tulis Pesan Disini
                </textarea></td></tr> </form>";
		  
	echo"</select></td></tr>
          <tr><td class='left' colspan=2><input type=submit name=submit value=Kirim>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editmemo":
    $edit=mysql_query("SELECT * FROM memo WHERE id_memo='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Edit Memo</h2>
          <form method=POST action='$aksi?module=memo&act=update'>
		  <input type=hidden name='id' value='$r[id_memo]'>
          <table class='list'>
          <form method=POST action='$aksi?module=memo&act=input'>
          <table class='list'><tbody>
		  <tr><td>Nama </td>            <td> : <input type=text name='nama' value='$r[nama]'></td></tr>
		 <tr><td>Alamat </td>           <td> : <input type=text name='alamat' value='$r[alamat]' id='input'></td></tr>
		 <tr><td>Tanggal </td>           <td> : <input type=text name='tanggal' value='$r[tanggal]'></td></tr>
		  <tr><td class='left' width='100'>Pesan</td><td class='left'> <textarea align='center' style='border-radius: 7px 7px 7px 7px; border: 1px solid rgb(204, 204, 204); height: 150px; width: 500px;' name='isi'>
$r[isi]</textarea></td></tr> </form>";
		  
	echo"</select></td></tr>
          <tr><td class='left' colspan=2><input type=submit name=submit value=Kirim>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
}

}

?>
