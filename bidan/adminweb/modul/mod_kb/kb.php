<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_kb/aksi_kb.php";
switch($_GET[act]){
  // Tampil kb
  default:
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
		
		
      $p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);
      $tampil = mysql_query("SELECT * FROM  pasien inner join kb on pasien.id_pasien = kb.id_pasien ORDER BY id_kb DESC LIMIT $posisi,$batas");
	  $y=mysql_num_rows($tampil);
	  $no = $posisi+1;
	  
	  
	  
      echo "<h2>Keluarga Berencana</h2>
	   <form action='' method='post'>
          <input type=button value='Tambah Keluarga Berencana' onclick=\"window.location.href='?module=kb&act=tambahkb';\">
		  <input type=text value='' class='kanan2' name='cari'>
		  <input type='submit' name'submit' value='Cari' class='button cyan' />
		 </form>
		  
		  ";
    }
    else{
      $tampil=mysql_query("SELECT * FROM kb");
      echo "<h2>lama_pengguna</h2>";
    }
    
    echo "<table class='list'><thead>
          <tr>
          <td class='left'>no</td>
		  <td class='left'>Nama</td>
          <td class='left'>lama_pengguna</td>
          <td class='left'>keluhan</td>
          <td class='left'>tanggal_pemasangan</td>
          <td class='left'>tanggal_kontrol</td>
          <td class='center'>tanggal_penggantian</td>
		  <td class='center'>Jenis KB</td>
          <td class='center'>bidan </td>
    
		   <td class='center'>aksi</td>
          </tr></thead> "; 
    
	
	 $cari  = $_POST['cari'];
    $query = mysql_query("SELECT * FROM pasien inner join kb on pasien.id_pasien = kb.id_pasien  WHERE nama LIKE '%$cari%' order BY Id_kb DESC LIMIT $posisi,$batas");
	  $no = $posisi+1;
    while ($r = mysql_fetch_array($query)){
       echo "
	
	
	
	<tr><td class='left' width='25'>$no</td>
	         <td class='left'>$r[nama]</td>
             <td class='left'>$r[lama_pengguna]</td>
             <td class='left'>$r[keluhan]</td>
		         <td class='left'>$r[tanggal_pemasangan]</td>
		         <td class='left'>$r[tanggal_kontrol]</td>
		         <td class='center'>$r[tanggal_penggantian]</td>
		         <td class='center'>$r[jenis_kb]</td>
				 <td class='center'>$r[bidan]</td>
				 
             <td class='center' width='50'><a href=?module=kb&act=editkb&id_kb=$r[id_kb]><img src='images/edit.png' border='0' title='edit' /></a><a href=$aksi?module=kb&act=hapus&id=$r[id_kb] onclick = 'return confirm (\"anda yakin ingin menghapus data dengan nama = $r[nama]\");'><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
    echo "</table>";
		//=============PAGING ========================
			 
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM pasien inner join kb on pasien.id_pasien = kb.id_pasien "));
	
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman<div class='kanan'>$jmldata</div></div><br>";
	
	
	
	
	
	
	
    break;
  
  case "tambahkb":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Tambah daftar keluarga berencana</h2>
          <form method=POST action='$aksi?module=kb&act=input'>
          <table class='list'>
		  
		  <tr><td>Nama</td>           <td> : 
		  <select name='nama'>
  <option value=0 selected>-pilih nama-</option>";
  $perintah = mysql_query ("select * from pasien order by nama asc");
  
  while ($r = mysql_fetch_array($perintah)){
	echo "<option value=$r[id_pasien]> $r[nama] </option>";
 }
    echo "</select>  </td></tr>
		  
		  
		   
		  
		  
		  
          <tr><td>lama_pengguna </td>           <td> : <input type=text name='lama_pengguna'></td></tr>
          <tr><td>keluhan</td>                  <td> : <input type=text name='keluhan'></td></tr>
          <tr><td>tanggal_pemasangan</td>       <td> : <input type=text name='tanggal_pemasangan' size=30 id=\"input\"></td></tr>  
          <tr><td>tanggal_kontrol</td>          <td> : <input type=text name='tanggal_kontrol' size=30  id=\"in\"></td></tr>
          <tr><td>tanggal_penggantian</td>      <td> : <input type=text name='tanggal_penggantian' size=20 id=\"inp\"></td></tr>
		  <tr><td>Jenis KB</td>                 <td> : 
		  <select name='jenis_kb'>
		  <option value='IUD'>IUD</option>
		  <option value='MOW'>MOW</option>
		  <option value='IMPLET'>IMPLET</option>
		  <option value='SUNTIK'>SUNTIK</option>
		  <option value='lainnya'>lainnya</option>
		  
		  </select>
		  </td></tr>
		  <tr><td>bidan</td>                    <td> : <input type=text name='bidan' size=20 value='$_SESSION[namalengkap]'readonly ></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
	
	
	
	
	
	
	
  case "tambahkb":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Tambah daftar keluarga berencana</h2>
          <form method=POST action='$aksi?module=kb&act=input'>
          <table class='list'>
		  
		  <tr><td>Nama</td>           <td> : 
		  <select name='nama'>
  <option value=0 selected>-pilih nama-</option>";
  $perintah = mysql_query ("select * from pasien order by nama asc");
  
  while ($r = mysql_fetch_array($perintah)){
	echo "<option value=$r[id_pasien]> $r[nama] </option>";
 }
    echo "</select>  </td></tr>
		  
		  
		   
		  
		  
		  
          <tr><td>lama_pengguna </td>           <td> : <input type=text name='lama_pengguna' required></td></tr>
          <tr><td>keluhan</td>                  <td> : <input type=text name='keluhan' required></td></tr>
          <tr><td>tanggal_pemasangan</td>       <td> : <input type=text name='tanggal_pemasangan' size=30 id=\"input\" required></td></tr>  
          <tr><td>tanggal_kontrol</td>          <td> : <input type=text name='tanggal_kontrol' size=30  id=\"in\" required></td></tr>
          <tr><td>tanggal_penggantian</td>      <td> : <input type=text name='tanggal_penggantian' size=20 id=\"inp\" required></td></tr>
		  <tr><td>Jenis KB</td>                 <td> : 
		  <select name='jenis_kb'>
		  <option value='IUD'>IUD</option>
		  <option value='MOW'>MOW</option>
		  <option value='IMPLET'>IMPLET</option>
		  <option value='SUNTIK'>SUNTIK</option>
		  <option value='lainnya'>lainnya</option>
		  
		  </select>
		  </td></tr>
		  <tr><td>bidan</td>                    <td> : <input type=text name='bidan' size=20 value='$_SESSION[namalengkap]'readonly ></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editkb":
    $edit=mysql_query("SELECT * FROM kb WHERE id_kb='$_GET[id_kb]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Edit daftar kb</h2>
          <form method=POST action=$aksi?module=kb&act=update>
          <input type=hidden name=id value='$r[id_kb]'>
          <table class='list'>
		  
		  
		  ";
		  
		  $edit=mysql_query("SELECT * FROM kb WHERE id_kb='$_GET[id_kb]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
		  
		  
          <tr><td>lama_pengguna</td>                            <td> : <input type=text name='lama_pengguna' value='$r[lama_pengguna]'></td></tr>
          <tr><td>keluhan</td>                                  <td> : <input type=text name='keluhan'value='$r[keluhan]'></td></tr>
          <tr><td>tanggal_pemasangan</td>                       <td> : <input type=text name='tanggal_pemasangan' size=30  value='$r[tanggal_pemasangan]' id=\"input\">                                                                </td></tr>  
          <tr><td>tanggal_kontrol</td>                          <td> : <input type=text name='tanggal_kontrol' size=30    value='$r[tanggal_kontrol]' id=\"in\"></td>                                                                </tr>
          <tr><td>tanggal_penggantian</td>                      <td> : <input type=text name='tanggal_penggantian' size=20         value='$r[tanggal_penggantian]' id=\"inp\"></td></tr>
		  <tr><td>Jenis KB</td>                                 <td> : 
		  
		   <select name='jenis_kb'>
		  <option value='IUD'>IUD</option>
		  <option value='MOW'>MOW</option>
		  <option value='IMPLET'>IMPLET</option>
		  <option value='SUNTIK'>SUNTIK</option>
		  <option value='lainnya'>lainnya</option>
		  
		  </select>
		  
		  
		  </td></tr>
		  <tr><td>bidan</td>                                    <td> : <input type=text name='bidan' size=20 value='$r[bidan]' disabled></td></tr>

";
    
    
    echo "<tr></tr>
          <tr><td class='left' colspan=2><input type=submit value=Updatkb>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }}
    break; 
}
}
?>


