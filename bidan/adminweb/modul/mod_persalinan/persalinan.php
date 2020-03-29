<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_persalinan/aksi_persalinan.php";
switch($_GET[act]){
  // Tampil Persalinan
  default:
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
		
		
		
      $p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);
      $tampil = mysql_query("SELECT * FROM  pasien inner join persalinan on pasien.id_pasien = persalinan.id_pasien ORDER BY id_persalinan DESC LIMIT $posisi,$batas");
	  $y=mysql_num_rows($tampil);
	  $no = $posisi+1;
	
	  
	  
	  
      echo "<h2>Daftar Persalinan</h2>
	  
	   <form action='' method='post'>
          <input type=button value='Tambah Data persalinan' onclick=\"window.location.href='?module=persalinan&act=tambahpersalinan';\">
		  <input type=text value='' class='kanan2' name='cari'>
		  <input type='submit' name'submit' value='Cari' class='button cyan' />
		 </form>";
    }
    else{
     $p      = new Paging;
    $batas  = 2;
    $posisi = $p->cariPosisi($batas);
      echo "<h2>Daftar Persalinan</h2>";
    }
    
    echo "<table class='list'><thead>
          <tr>
		  <td class='left'>No</td>
          <td class='left'>Nama</td>
          <td class='left'>Tgl Kontaksi</td>
          <td class='left'>Tgl Persalinan</td>
          <td class='left'>Keluhan</td>
		  <td class='left'>Jam</td>
		  <td class='left'>Jenis_Persalinan</td>
		  <td class='left'>keadaan Ibu</td>
          <td class='left'>Bidan</td>
		  
          <td class='center'>Aksi</td>
          </thead> "; 
    
	
	$cari  = $_POST['cari'];
    $query = mysql_query("SELECT * FROM pasien inner join persalinan on pasien.id_pasien = persalinan.id_pasien  WHERE nama LIKE '%$cari%' order BY Id_persalinan DESC LIMIT $posisi,$batas");
	  $no = $posisi+1;
    while ($r = mysql_fetch_array($query)){
       echo "
	
	
      <tr><td class='left' width='25'>$no</td>
	   		 <td class='left'>$r[nama]</td>
             <td class='left'>$r[tanggalkontraksi]</td>
             <td class='left'>$r[tanggalpersalinan]</td>
		     <td class='left'>$r[keluhan]</td>
			 <td class='left'>$r[jam]</td>
			 <td class='left'>$r[jenis_persalinan]</td>
			 <td class='left'>$r[keadaan_ibu]</td>
		     <td class='left'>$r[bidan]</td>
			 	   
             <td class='center' width='50'><a href=?module=persalinan&act=editpersalinan&id=$r[id_persalinan]><img src='images/edit.png' border='0' title='edit' /></a><a href=$aksi?module=persalinan&act=hapus&id=$r[id_persalinan] onclick = 'return confirm (\"anda yakin ingin menghapus data dengan nama = $r[nama]\");'><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
    echo "</table>";
	
	
	//=============PAGING ========================
			 
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM pasien inner join persalinan on pasien.id_pasien = persalinan.id_pasien"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman<div class='kanan'>$jmldata</div></div><br>";
	
	
    break;
  
  case "tambahpersalinan":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Tambah Persalinan</h2>
          <form method=POST action='$aksi?module=persalinan&act=input'>
          <table class='list'>
		  <tr><td>Nama</td>     <td> : 
		  
		  <select name='nama'>
  <option value=0 selected>-pilih nama-</option>";
  $perintah = mysql_query ("select * from pasien order by nama asc");
  
  while ($r = mysql_fetch_array($perintah)){
	echo "<option value=$r[id_pasien]> $r[nama] </option>";
 }
    echo "</select></td></tr>
	
	
	
	
	
          <tr><td>Tgl Kontraksi</td>     <td> : <input type=text name='tanggalkontraksi' id='input'></td></tr>
          <tr><td>Tgl Persainan</td>     <td> : <input type=text name='tanggalpersalinan' id='in'></td></tr>  
		  <tr><td>Keluhan</td>           <td> : <input type=text name='keluhan'></td></tr>
		  <tr><td>Jam</td>               <td> : <input type=text name='jam' id='datetimepicker1'></td></tr>
		  <tr><td>Jenis Persalinan </td> <td> : 
		  
		  <select name='jenis_persalinan'>
            <option value=Persalinan_Spontan  selected>Persalinan Spontan</option>
			<option value=Persalinan_Buatan   selected>Persalinan Buatan</option>
			<option value=Persalinan_Anjuran  selected>Persalinan Anjuran</option>
			<option value=Persalinan_Imaturus selected>Persalinan_Imaturus</option>
			<option value=Persalinan_Prematuritas selected>Persalinan_Prematuritas</option>
			<option value=Persalinan_Aterm    selected>Persalinan_Aterm</option>
			<option value=Persalinan_Serotinus selected>Persalinan_Serotinus</option>
			<option value=Persalinan_Presipitatus selected>Persalinan_Presipitatus</option>
			</select>
		  
		  </td></tr>  
		  <tr><td>keadaan Ibu</td>           <td> : 
		  
		   <select name='keadaan_ibu'>
            <option value=Normal  selected>Normal</option>
			<option value=Meninggal   selected>Meninggal</option>
			<option value=Otopsi_Verbal  selected>Otopsi_Verbal</option>
			
			</select>
		  
		  
		  
		  </td></tr>
		  <tr><td>Bidan</td>             <td> : <input type=text name='bidan' value='$_SESSION[namalengkap]' readonly></td></tr>
		  
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
   case "editpersalinan":
    $edit=mysql_query("SELECT * FROM persalinan WHERE  id_persalinan='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Edit Persalinan</h2>
          <form method=POST action='$aksi?module=persalinan&act=update'>
		  <input type=hidden name='id' value='$r[id_persalinan]'>
          <table class='list'>
		  
		  ";
		  $edit=mysql_query("SELECT * FROM persalinan WHERE  id_persalinan='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
		  
          <tr><td>Tgl Kontraksi</td>     <td> : <input type=text name='tanggalkontraksi' value='$r[tanggalkontraksi]' id=\"input\"></td></tr>
          <tr><td>Tgl Persainan</td>     <td> : <input type=text name='tanggalpersalinan' value='$r[tanggalpersalinan]' id=\"in\"></td></tr>  
		  <tr><td>Keluhan</td>           <td> : <input type=text name='keluhan' value='$r[keluhan]'></td></tr> 
		  <tr><td>jam</td>               <td> : <input type=text name='jam' value='$r[jam]'></td></tr>
		  <tr><td>jenis Persalinan</td>  <td> : 
		  
		   <select name='jenis_persalinan' value='$r[jenis_persalinan]'>
            <option value=Persalinan_Spontan  selected>Persalinan Spontan</option>
			<option value=Persalinan_Buatan   selected>Persalinan Buatan</option>
			<option value=Persalinan_Anjuran  selected>Persalinan Anjuran</option>
			<option value=Persalinan_Imaturus selected>Persalinan_Imaturus</option>
			<option value=Persalinan_Prematuritas selected>Persalinan_Prematuritas</option>
			<option value=Persalinan_Aterm    selected>Persalinan_Aterm</option>
			<option value=Persalinan_Serotinus selected>Persalinan_Serotinus</option>
			<option value=Persalinan_Presipitatus selected>Persalinan_Presipitatus</option>
			</select>
		  
		  </td></tr> 
		  <tr><td>keadaan Ibu</td>           <td> : 
		  
		  
		  <select name='keadaan_ibu'>
            <option value=Normal  selected>Normal</option>
			<option value=Meninggal   selected>Meninggal</option>
			<option value=Otopsi_Verbal  selected>Otopsi_Verbal</option>
			
			</select>
		  
		  
		  </td></tr>
		  <tr><td>Bidan</td>             <td> : <input type=text name='bidan' value='$r[bidan]'disabled></td></tr>
		   
          <tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }}
     break;
}
}
?>
