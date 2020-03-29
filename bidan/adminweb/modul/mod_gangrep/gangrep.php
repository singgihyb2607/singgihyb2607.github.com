<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_gangrep/aksi_gangrep.php";
switch($_GET[act]){
  // Tampil ganggrep
  default:
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
		
		
       $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
      $tampil = mysql_query("SELECT * FROM pasien inner join gangrep on pasien.id_pasien=gangrep.id_pasien ORDER BY id_gangrep DESC LIMIT $posisi,$batas");
	   $y=mysql_num_rows($tampil);
	   $no = $posisi+1; 
	  
	  
      echo "<h2>Gangrep</h2>
	   <form action='' method='post'>
          <input type=button value='Tambah Data ganggrep' onclick=\"window.location.href='?module=gangrep&act=tambahgangrep';\">
		  <input type=text value='' class='kanan2' name='cari'>
		  <input type='submit' name'submit' value='Cari' class='button cyan' />
		 </form>
		  ";
		  
		  
    }
    else{
      $tampil=mysql_query("SELECT * FROM gangrep");
      echo "<h2>keluhan</h2>";
    }
    
    echo "<table class='list'><thead>
          <tr>
          <td class='left'>no</td>
		  <td class='left'>Nama</td>
          <td class='left'>keluhan</td>
          <td class='left'>tekanandarah</td>
          <td class='left'>tekanannadi</td>
          <td class='left'>respirasi</td>
          <td class='left'>suhu</td>
          <td class='left'>bidan </td>
    
		   <td class='center'>aksi</td>
          </tr></thead> "; 
   
     $cari  = $_POST['cari'];
    $query = mysql_query("SELECT * FROM pasien inner join gangrep on pasien.id_pasien = gangrep.id_pasien  WHERE nama LIKE '%$cari%' order BY Id_gangrep DESC LIMIT $posisi,$batas");
	  $no = $posisi+1;
    while ($r = mysql_fetch_array($query)){
       echo "
   
   <tr><td class='left' width='25'>$no</td>
	          <td class='left'>$r[nama]</td>
             <td class='left'>$r[keluhan]</td>
             <td class='left'>$r[tekanandarah]</td>
		         <td class='left'>$r[tekanannadi]</td>
		         <td class='left'>$r[respirasi]</td>
		         <td class='left'>$r[suhu] &deg;C</td>
				 <td class='left'>$r[bidan]</td>
				 
             <td class='center' width='50'><a href=?module=gangrep&act=editgangrep&id=$r[id_gangrep]><img src='images/edit.png' border='0' title='edit' /></a><a href=$aksi?module=gangrep&act=hapus&id=$r[id_gangrep] onclick = 'return confirm (\"anda yakin ingin menghapus data dengan nama = $r[nama]\");'><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
    echo "</table>";
	//=============PAGING ========================
			 
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM pasien inner join gangrep on pasien.id_pasien = gangrep.id_pasien"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman<div class='kanan'>$jmldata</div></div><br>";
	
	
	
	
	
	
    break;
  
  case "tambahgangrep":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Tambah Data Ganggrep</h2>
          <form method=POST action='$aksi?module=gangrep&act=input'>
          <table class='list'>
		  
		  <tr><td>Nama</td>                           <td> : 
		  
		  
		  <select name='nama'>
  <option value=0 selected>-pilih nama-</option>";
  $perintah = mysql_query ("select * from pasien order by nama asc");
  
  while ($r = mysql_fetch_array($perintah)){
	echo "<option value=$r[id_pasien]> $r[nama] </option>";
 }
    echo "</select>  </td></tr>
	
	
	
		  
          <tr><td>keluhan</td>                           <td> : <input type=text name='keluhan'></td></tr>
          <tr><td>tekanandarah</td>                      <td> : <input type=text name='tekanandarah'></td></tr>
          <tr><td>tekanannadi</td>                       <td> : <input type=text name='tekanannadi' size=30></td></tr>  
          <tr><td>respirasi</td>                         <td> : <input type=text name='respirasi' size=30 ></td></tr>
          <tr><td>suhu</td>                              <td> : <input type=text name='suhu' size=20 ></td></tr>
		  <tr><td>bidan</td>                             <td> : <input type=text name='bidan' size=20 value='$_SESSION[namalengkap]'readonly></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
	 
	 
	 
	 
    
 case "editgangrep":
    $edit=mysql_query("SELECT * FROM gangrep WHERE id_gangrep='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Edit gangrep</h2>
          <form method=POST action=$aksi?module=gangrep&act=update>
          <input type=hidden name=id value='$r[id_gangrep]'>
          <table class='list'>
		  
		  
		   ";
		  
		  $edit=mysql_query("SELECT * FROM gangrep WHERE id_gangrep='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
		  
		  
          <tr><td>keluhan</td>                           <td> : <input type=text name='keluhan' value='$r[keluhan]'></td></tr>
          <tr><td>tekanandarah</td>                      <td> : <input type=text name='tekanandarah' value='$r[tekanandarah]'></td></tr>
          <tr><td>tekanannadi</td>                       <td> : <input type=text name='tekanannadi' size=30 value='$r[tekanannadi]'></td></tr>  
          <tr><td>respirasi</td>                         <td> : <input type=text name='respirasi' size=30 value='$r[respirasi]'></td></tr>
          <tr><td>suhu</td>                              <td> : <input type=text name='suhu' size=20 value='$r[suhu]'></td></tr>
		  <tr><td>bidan</td>                             <td> : <input type=text name='bidan' size=20 value='$r[bidan]' disabled></td></tr>

";
    
    
    echo "<tr></tr>
          <tr><td class='left' colspan=2><input type=submit value=Updatgangrep>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }}
    break;  
}
}
?>


