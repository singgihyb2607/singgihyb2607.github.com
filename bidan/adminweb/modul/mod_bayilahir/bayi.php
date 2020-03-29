<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_bayilahir/aksi_bayi.php";
switch($_GET[act]){
  // Tampil User
  default:
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
		
     $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);
    $tampil = mysql_query("SELECT * FROM pasien inner join anak on pasien.id_pasien = anak.id_pasien ORDER BY id_pasien DESC LIMIT $posisi,$batas");
	$y=mysql_num_rows($tampil);
    $no = $posisi+1;
	  
	  
	  
      echo "<h2>Daftar Bayi Lahir</h2>
	  <form action='' method='post'>
          <input type=button value='Tambah Bayi Lahir' onclick=\"window.location.href='?module=bayilahir&act=tambahbayilahir';\">
		  <input type=text value='' class='kanan2' name='cari'>
		  <input type='submit' name'submit' value='Cari' class='button cyan' />
		 </form>
		  
		  ";
    }
    else{
      $tampil=mysql_query("SELECT * anak");
      echo "<h2>Daftar Bayi Lahir</h2>";
    }
    
    echo "<table class='list'><thead>
          <tr>
          <td class='center'>No</td>
          <td class='left'>Nama</td>
          <td class='left'>Jenis Kelamin</td>
          <td class='left'>Panjang</td>
          <td class='center'>Berat</td>
          <td class='center'>Denyut Nadi</td>
          <td class='center'>Lingkar Kepala</td>
		  <td class='center'>Lingar Dada</td>
		  <td class='left'>Lingkar Lengan</td>
		  <td class='left'>Lingar Respirasi</td>
		  <td class='left'>suhu</td>
		  <td class='left'>keadaan Bayi</td>
		  <td class='left'>Bidan</td>
		  <td class='center'>Aksi</td>
          </tr></thead> "; 
   
   
   $cari  = $_POST['cari'];
   $query = mysql_query("SELECT * FROM pasien inner join anak on pasien.id_pasien=anak.id_pasien where nama LIKE '%$cari%'");
   $no = $posisi+1;
   while ($r = mysql_fetch_array($query)){
	       echo "
   
   
   <tr><td class='left' width='25'>$no</td>
             <td class='left'>$r[nama]</td>
             <td class='left'>$r[Jenis_kelamin]</td>
		       
				 
				 </td>
		         <td class='center'> $r[panjang] cm</td>
				  <td class='center'>$r[berat] gram</td>
				  <td class='center'>$r[denyut_nadi] / menit</td>
				  <td class='center'> $r[lingkar_kepala] cm</td>
				  <td class='center'>$r[lingkar_dada] cm</td>
				  <td class='left'> $r[lingkar_lengan] cm</td>
				  <td class='left'>$r[respirasi] / menit</td>
				  <td class='left'>$r[suhu] &deg;C</td>
				  <td class='left'>$r[keadaan_bayi] </td>
				  <td class='left'>$r[bidan] </td> 
             <td class='center' width='50'><a href=?module=bayilahir&act=editbayilahir&id=$r[id_bayi_baru_lahir2]><img src='images/edit.png' border='0' title='edit' /></a><a href=$aksi?module=bayilahir&act=hapus&id=$r[id_bayi_baru_lahir2] onclick = 'return confirm (\"anda yakin ingin menghapus data dengan nama = $r[nama]\");'><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
    echo "</table>";
		//=============PAGING ========================
			 
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM pasien inner join anak on pasien.id_pasien = anak.id_pasien"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman<div class='kanan'>$jmldata</div></div><br>";
	
	
	
    break;
  
  case "tambahbayilahir":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Tambah Bayi Lahir</h2>
          <form method=POST action='$aksi?module=bayilahir&act=input'>
          <table class='list'>
          <tr><td>Nama</td>              <td> : 
		  
		  <select name='Nama'>
  <option value=0 selected>-pilih nama-</option>";
  $perintah = mysql_query ("select * from pasien order by nama asc");
  
  while ($r = mysql_fetch_array($perintah)){
	echo "<option value=$r[id_pasien]> $r[nama] </option>";
 }
    echo "</select>  </td></tr>
	
	
	
	
		  
		  
          <tr><td>Jenis Kelamin</td>     <td> : 
		  <select name='Jenis_kelamin'>
            <option value=laki-laki   selected>laki - laki</option>
			<option value=perempuan   selected>Perempuan</option>
		  </select></td></tr>
		  <tr><td>Panjang</td>           <td> : <input type=text name='panjang' size=30></td></tr>
		  <tr><td>Berat</td>             <td> : <input type=text name='berat' size=30></td></tr>       
          <tr><td>Denyut</td>            <td> : <input type=text name='denyut_nadi' size=30></td></tr>
		  <tr><td>Linkar Kepala</td>     <td> : <input type=text name='lingkar_kepala' size=30></td></tr>
		  <tr><td>Lingkar Dada</td>      <td> : <input type=text name='lingkar_dada' size=30></td></tr>
		  <tr><td>Lingkar Lengan</td>    <td> : <input type=text name='lingkar_lengan' size=30></td></tr>
		  <tr><td>Respirasi</td>         <td> : <input type=text name='respirasi' size=30></td></tr>
		  <tr><td>suhu</td>              <td> : <input type=text name='suhu' size=30></td></tr>
		  <tr><td>keadaan Bayi</td>      <td> : 
		  <select name=keadaan_bayi>
		  <option value=Normal>Normal</option>
		  <option value=Meninggal>Meninggal</option>
		  </select>
		  </td></tr>
		  <tr><td>bidan</td>        <td> : <input type=text name='bidan' size=20 value='$_SESSION[namalengkap]' readonly></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
 case "editbayilahir":
    $edit=mysql_query("SELECT * FROM anak WHERE id_bayi_baru_lahir2='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Edit Bayi Lahir</h2>
          <form method=POST action='$aksi?module=bayilahir&act=update'>
		  <input type=hidden name=id value='$r[id_bayi_baru_lahir2]'>
		  <table class='list'>
           
		  
		  
		  
		  </td></tr>";
		  $edit=mysql_query("SELECT * FROM anak WHERE id_bayi_baru_lahir2='$_GET[id]'");
    $r=mysql_fetch_array($edit);

		  echo "<tr><td>Jenis Kelamin</td>     <td> : 
		  <select name='Jenis_kelamin'>
            <option value=laki-laki   selected>laki - laki</option>
			<option value=perempuan selected>Perempuan</option>
			</select></td></tr> 
		  <tr><td>Panjang</td>            <td> : <input type=text name='panjang' size=30 value='$r[panjang]'></td></tr>
		  <tr><td>Berat</td>              <td> : <input type=text name='berat' size=30 value='$r[berat]'></td></tr>       
          <tr><td>Denyut</td>             <td> : <input type=text name='denyut_nadi' size=30 value='$r[denyut_nadi]'></td></tr>
		  <tr><td>Linkar Kepala</td>      <td> : <input type=text name='lingkar_kepala' size=30 value='$r[lingkar_kepala]'></td></tr>
		  <tr><td>Lingkar Dada</td>       <td> : <input type=text name='lingkar_dada' size=30 value='$r[lingkar_dada]'></td></tr>
		  <tr><td>Lingkar Lengan</td>     <td> : <input type=text name='lingkar_lengan' size=30 value='$r[lingkar_lengan]'></td></tr>
		  <tr><td>Respirasi</td>          <td> : <input type=text name='respirasi' size=30 value='$r[respirasi]'></td></tr>
		  <tr><td>suhu</td>               <td> : <input type=text name='suhu' size=30 value='$r[suhu]'></td></tr>
		  <tr><td>keadaan Bayi</td>               <td> : 
		  
		  <select name=keadaan_bayi>
		  <option value=Normal>Normal</option>
		  <option value=Meninggal>Meninggal</option>
		  </select>
		  
		  </td></tr>
		   <tr><td class='left'>bidan</td>        <td> : <input type=text name='bidan' size=30 value='$r[bidan]'  disabled> </td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
}
}
?>
