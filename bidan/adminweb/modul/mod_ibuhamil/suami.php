<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_users/aksi_users.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM users ORDER BY username");
      echo "<h2>Masukkan data Suami pada pelayanan Ibu Hamil di bawah ini :</h2>";
          
    }echo "<form method=POST action='$aksi?module=submenu&act=input'>
          <table class='list'><tbody>
          <tr><td class='left' width='100'>Nama</td>     <td class='left'> : <input type=text name='nama_sub' size='40'></td></tr>
		  <tr><td class='left' width='100'>Umur</td>     <td class='left'> : <input type=text name='nama_sub' size='40'></td></tr>
		  <tr><td class='left' width='100'>Suku/Bangsa</td>     <td class='left'> : <input type=text name='nama_sub' size='40'></td></tr>
		  <tr><td class='left' width='100'>Pendidikan Terakhir</td>     <td class='left'> : <input type=text name='nama_sub' size='40'></td></tr>
          <tr><td class='left' width='100'>Pekerjaan</td>  <td class='left'> : <input type=text name='nama_sub' size='40'></td></tr>";
		  
     echo "<tr><td class='left'>Agama</td>  <td> : 
          <select name='agama'>
            <option value=0 selected>Islam</option>
			<option value=0 selected>Kristen</option>
			<option value=0 selected>Katolik</option>
			<option value=0 selected>Hindu</option>
			<option value=0 selected>Budha</option>
			<tr><td class='left' width='100'>Alamat</td>     <td class='left'> : <input type=text name='nama_sub' size='40'></td></tr>
			<tr><td class='left' width='100'>No.Telp</td>     <td class='left'> : <input type=text name='nama_sub' size='40'></td></tr>";
            
    echo "</select></td></tr>
          <tr><td class='left' colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
    
  case "editsubmenu":
    $edit = mysql_query("SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Sub Menu</h2>
          <form method=POST action=$aksi?module=submenu&act=update>
          <input type=hidden name=id value=$r[id_sub]>
          <table class='list'><tbody>
          <tr><td class='left' width=100>Sub Menu</td>     <td> : <input type=text name='nama_sub' value='$r[nama_sub]'></td></tr>
          <tr><td class='left'>Menu Utama</td>  <td> : <select name='menu_utama'>";
 
          $tampil=mysql_query("SELECT * FROM mainmenu WHERE aktif='N' ORDER BY nama_menu");
          if ($r[id_main]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   
          while($w=mysql_fetch_array($tampil)){
            if ($r[id_main]==0 || ($r[id_main]!=0 && $r[id_submain]!=0)){
              echo "<option value=$w[id_main] selected>$w[nama_menu]</option>";
            }
            else{
              echo "<option value=$w[id_main]>$w[nama_menu]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td class='left'>Pilih Sub Menu</td>  <td> : <select name='sub_menu'>";
 
      		$tampil2=mysql_query("SELECT * FROM submenu WHERE id_submain=0 AND aktif='N' ORDER BY nama_sub");
          if ($r[id_submain]==0){
            echo "<option value=0 selected>- Pilih Sub Menu -</option>";
          }   
          while($s=mysql_fetch_array($tampil2)){
            if ($r[id_submain]==$s[id_sub]){
              echo "<option value=$s[id_sub] selected>$s[nama_sub]</option>";
            }
            else{
              echo "<option value=$s[id_sub]>$s[nama_sub]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td class='left'>Link Sub Menu</td><td> : <input type=text name='link_sub' value='$r[link_sub]'></td></tr>";
    if ($r[aktif]=='Y'){
      echo "<tr><td class='left'>Aktif</td> <td> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td class='left'>Aktif</td> <td> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }
          
    if ($r[adminsubmenu]=='Y'){
      echo "<tr><td class='left'>Admin Sub Menu</td> <td> : <input type=radio name='adminsubmenu' value='Y' checked>Y  
                                      <input type=radio name='adminsubmenu' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td class='left'>Admin Sub Menu</td> <td> : <input type=radio name='adminsubmenu' value='Y'>Y  
                                      <input type=radio name='adminsubmenu' value='N' checked>N</td></tr>";
    }

    echo "<tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>
          <div id=paging>*) Apabila Aktif = Y dan Admin Sub Menu = N, maka Sub Menu akan ditampilkan di halaman pengunjung. <br />
 	                      **) Apabila Aktif = N dan Admin Sub Menu = Y, maka Sub Menu akan ditampilkan di halaman administrator. <br /><br />
                        ***) Pilih <b>Menu Utama</b> jika ingin membuat Sub Menu dari Menu Utama <br />
	                      ****) Pilih <b>Sub Menu</b> jika ingin membuat Sub Menu dari Sub Menu (hanya berlaku untuk halaman pengunjung)
         </div><br>";
    break;  
}
}
?>
