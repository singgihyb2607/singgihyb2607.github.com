<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_kunjungan/aksi_kunjungan.php";
switch($_GET[act]){
  // Tampil Kunjungan
  default:
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
      $tampil = mysql_query("SELECT * FROM  kunjungan WHERE id_hamil='$_GET[id]' order by id_kunjungan");
	   
	   	
  echo "<br />"; 
	  
	  
      echo "<h2>Kunjungan Semua Kunjungan Ibu Hamil</h2>
          <input type=button value='Tambah Data Kunjungan' onclick=\"window.location.href='?module=kunjungan&act=tambahkunjungan&id=$_GET[id]';\">";
    }
    else{
      $tampil=mysql_query("SELECT * FROM kunjungan WHERE id_hamil='$_GET[id]' order by tanggal ");
      echo "<h2>Daftar Kunjungan Seluruhnya</h2>";
    }
    
    echo "<table class='list'><thead>
          <tr>
          <td class='left'>no</td>
          <td class='left'>Kunjungan</td>
          <td class='left'>Tanggal</td>
         <td class='left'>Keluhan</td>
          <td class='left'>Kondisi Pasien</td>
          <td class='center'>aksi</td>
          </tr></thead> "; 
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'><a href=?module=kunjungan&act=detailkunjungan&id=$r[id_kunjungan]>$no</a></td>
             <td class='left'>$r[tanggal]</td>
			 <td class='left'>$r[keluhan]</td>
		     <td class='left'><a href=?module=kunjungan&act=detail_catatan&id=$r[id_kunjungan]>$r[kondisi]</a></td>
		     
		     <td class='center' width='50'><a href=?module=kunjungan&act=editkunjungan&id=$r[id_kunjungan]&id_hamil=$_GET[id]><img src='images/edit.png' border='0' title='edit' /></a> 
			 <a href=$aksi?module=kunjungan&act=hapus&id=$r[id_kunjungan]&id_hamil=$_GET[id] onclick = 'return confirm (\"anda yakin ingin menghapus data dengan data kunjungan no = $no\");'><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
    echo "</table>";
    break;
	
	
	
	
	
	
	
	
	case "detail_catatan":
    $edit=mysql_query("SELECT * FROM kunjungan WHERE id_kunjungan = '$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Catatan</h2>
          <form method=POST action=$aksi?module=kunjungan&act=update>
          <input type=hidden name=id value='$r[id_kunjungan]'>
		  
          <table class='list'><tbody>
		  
	      <tr height='35'> <td>  $r[catatan] </td></tr>
		  
		 
		
		";
		  
	  }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	case "kunjunganibuhamil":
   $tampil=mysql_query("SELECT * FROM kunjungan WHERE id_hamil='$_GET[id]' order by tanggal");
    

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Daftar Kunjungan</h2>
	<input type=button value='Tambah Data Kunjungan' onclick=\"window.location.href='?module=kunjungan&act=tambahkunjungan';\">";
    }
    
    echo "<table class='list'><thead>
          <tr>
          <td class='left'>no</td>
          <td class='left'>Kunjungan</td>
          <td class='left'>Tanggal</td>
         <td class='left'>Keluhan</td>
          
          <td class='center'>aksi</td>
          </tr></thead> "; 
    $no=1;
    while ($z=mysql_fetch_array($tampil)){
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'><a href=?module=kunjungan&act=detailkunjungan&id=$z[id_kunjungan]>$no</a></td>
             <td class='left'>$z[tanggal]</td>
			 <td class='left'>$z[keluhan]</td>
		     
		     
		     <td class='center' width='50'><a href=?module=kunjungan&act=editkunjungan&id=$r[id_kunjungan]><img src='images/edit.png' border='0' title='edit' /></a>
			 <a href=$aksi?module=kunjungan&act=hapus&id=$r[id_kunjungan]><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
    echo "</table>";
    break;
	
	
	
	
	
	
	
	
	
	 case "detailkunjungan":
    $edit=mysql_query("SELECT * FROM kunjungan WHERE id_kunjungan = '$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Detail Kunjungan</h2>
          <form method=POST action=$aksi?module=kunjungan&act=update>
          <input type=hidden name=id value='$r[id_kunjungan]'>
		  
          <table class='list'><tbody>
		  
	      <tr height='35'><td>Tanggal</td> <td> : $r[tanggal] </td></tr>
		  <tr height='35'><td>Jam</td> <td> : $r[jam] </td></tr>
		  <tr height='35'><td>Umur</td> <td> : $r[umur]</td></tr>
		  <tr height='35'><td>keluhan</td> <td> : $r[keluhan]</td></tr>

		  <tr height='35'><td>tekanan_darah</td> <td> : $r[tekanan_darah] mmHg</td></tr>
	      <tr height='35'><td>tekanan_nadi</td> <td> : $r[tekanan_nadi] /menit</td></tr>
		  <tr height='35'><td>respirasi</td> <td> : $r[respirasi] /menit</td></tr>
		  <tr height='35'><td>suhu</td> <td> : $r[suhu] &deg; C</td></tr>
		  <tr height='35'><td>pergerakan janin</td> <td> : $r[pergerakan] (kali)</td></tr>
		  <tr height='35'><td>Leopold I</td> <td> : $r[leoI] </td></tr>
		  <tr height='35'><td>Leopold II</td> <td> : $r[leoII] </td></tr>
		  <tr height='35'><td>Leopold III</td> <td> : $r[leoIII] </td></tr>
		  <tr height='35'><td>tekanan HB</td> <td> : $r[tekanan_hb] gr%</td></tr>
		  <tr height='35'><td>berat</td> <td> : $r[berat] kg</td></tr>
	      <tr height='35'><td>tinggi</td> <td> : $r[tinggi] cm</td></tr>
		  <tr height='35'><td>LILA</td> <td> : $r[LILA] cm</td></tr>
		 <tr height='35'><td>kepala</td> <td> : $r[kepala]</td></tr>
		 <tr height='35'><td>muka</td> <td> : $r[muka] </td></tr>
		 <tr height='35'><td>mata</td> <td> : $r[mata]</td></tr>
		 <tr height='35'><td>mulut </td> <td> : $r[mulut] </td></tr>
		 <tr height='35'><td>hidung </td> <td> : $r[hidung] </td></tr>
		 <tr height='35'><td>telinga </td> <td> : $r[telinga] </td></tr>
		  <tr height='35'><td>leher</td> <td> : $r[leher] </td></tr>
		 <tr height='35'><td>payudara</td> <td> : $r[payudara] </td></tr>
		 <tr height='35'><td>abdoman</td> <td> : $r[abdoman]</td></tr>
		 <tr height='35'><td>Kondisi Pasien</td> <td> : $r[kondisi] </td></tr>
		 <tr height='35'><td>Catatan</td> <td> : $r[catatan]</td></tr>
		 
		
		";
		  
	echo"</select></td></tr>
           <tr><td class='left' colspan=2>
                            <input type=button value=Kembali onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  
  case "tambahkunjungan":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Tambah Kunjungan</h2>
          <form method=POST action='$aksi?module=kunjungan&act=input&id_hamil=$_GET[id]'>
          <table class='list'>
		  
		  <tr><td>Nama</td>  <td> :
		";
  $perintah = mysql_query ("select * from pasien inner join hamil on pasien.id_pasien=hamil.id_pasien WHERE id_hamil = $_GET[id] order by nama asc");
 $r = mysql_fetch_array($perintah);
 $id = $r['id_pasien'];
  $query = mysql_query("SELECT * from pasien where id_pasien = $id ");
  $age = mysql_fetch_array($query);
    $YNow = date('Y');
		   $Y = date('Y',strtotime($age['tanggallahir']));
		   $fix = $YNow - $Y;
	echo "<input value=$r[nama] disabled>";
	echo '<input  type="hidden" name="id_hamil" value="'.$r[id_hamil].'">';
 
    echo "</td></tr>
	
	
		  <tr><td>Umur</td>         <td> : 
		  <input type='hidden' name='umur' value=".$fix.">
		   
		 
		   <input type='text' value=".$fix." disabled>
		  </td></tr>
	     
		   
		  <tr><td>keluhan</td>             <td> : <select name='keluhan'>
		  <option value='Mual'>Mual</option>
		  <option value='Muntah'>Muntah</option>
		  <option value='Perut Kencang-Kencang'>Perut Kencang-Kencang</option>
		  <option value='Kaki Bengkak'>Kaki Bengkak</option>
		  <option value='Morning Sickness'>Morning Sickness</option>
		  <option value='Keputihan'>Keputihan</option>
		  <option value='Buang Air Terus Menerus'>Buang Air Terus Menerus</option>
		  </select></td></tr>
		  
		  <tr><td>tekanan_darah</td>        <td> : <input type=number name='tekanan_darah' size=20 > mm Hg</td> </tr>
	      <tr><td>tekanan_nadi</td>         <td> : <input type=number name='tekanan_nadi' size=20 > / menit</td> </tr>
		  <tr><td>respirasi</td>            <td> : <input type=number name='respirasi' size=20 > / menit</td></tr>
		  <tr><td>suhu</td>                 <td> : <input type=number name='suhu' size=20 > &deg; C</td></tr>
		  <tr><td>Pergerakan Janin</td>           <td> : <input type=number name='pergerakan' size=20 > ( kali )</td></tr>
		  <tr><td>Leopold I</td>            <td> : <select name='leoI'>
		  <option value='1 Jari Bawah Pusat'>1 Jari Bawah Pusat</option>
		  <option value='1 Jari Atas Pusat'>1 Jari Atas Pusat</option>
		  <option value='2 Jari Bawah Pusat'>2 Jari Bawah Pusat</option>
		  <option value='2 Jari Atas Pusat'>2 Jari Atas Pusat</option>
		  <option value='3 Jari Bawah Pusat'>3 Jari Bawah Pusat</option>
		  <option value='3 Jari Atas Pusat'>3 Jari Atas Pusat</option>
		  </select></td></tr>
		  <tr><td>Leopold II</td>            <td> : <select name='leoII'>
		  <option value='Punggung Kanan'>Punggung Kanan</option>
		  <option value='Punggung Kiri'>Punggung Kiri</option>
		  </select></td></tr>
		  <tr><td>Leopold III</td>            <td> : <select name='leoIII'>
		  <option value='Presentasi Kepala'>Presentasi Kepala</option>
		  <option value='Presentasi Bokong'>Presentasi Bokong</option>
		  </select></td></tr>
		  <tr><td>tekanan HB</td>        <td> : <input type=text name='tekanan_hb' size=20 > gr %</td></tr>
		  
		  <tr><td>berat</td>                <td> : <input type=text name='berat' size=20 > kg</td></tr>
	      <tr><td>tinggi</td>               <td> : <input type=text name='tinggi' size=20 > cm</td></tr>
		  <tr><td>LILA</td>                 <td> : <input type=text name='LILA' size=20 > cm</td></tr>
		  <tr><td>kepala</td>               <td> : 
		  <select name='kepala'>
		  <option value='Mesochepal'>Mesochepal</option>
		  <option value='Tidak_ada_benjolan'>Tidak_ada_benjolan</option>
		  <option value='Rambut_bersih'>Rambut_bersih</option>
		  <option value='Tidak_rontok'>Tidak_rontok</option>
		  </select>
		  </td></tr>
		  <tr><td>muka</td>                 <td> :
		  
		  <select name='muka'>
		  <option value='Simetris'>Simetris</option>
		  <option value='Tidak_pucat'>Tidak_pucat</option>
		  <option value='Tidak_Oedem'>Tidak_Oedem</option>
		  <option value='Tidak_cloasmagavidarum'>Tidak_cloasmagavidarum</option>
		  </select>
		   
		   </td></tr>
	      <tr><td>mata</td>                 <td> : 
		  <select name='mata'>
		  <option value='Simetris'>Simetris</option>
		  <option value='Sklera_Putih'>Sklera_Putih</option>
		  <option value='Konjungtiva_merah_muda'>Konjungtiva_merah_muda</option>
		  </select>
		  
		  </td></tr>
		  <tr><td>mulut</td>                <td> : 
		  
		   <select name='mulut'>
		  <option value='Bersih'>Bersih</option>
		  <option value='Bibir_tidak_pucat'>Bibir_tidak_pucat</option>
		  <option value='Stomatitis'>Stomatitis</option>
		  </select>
		  
		  </td></tr>
		  <tr><td>hidung</td>               <td> : 
		  
		  <select name='hidung'>
		  <option value='Simetris'>Simetris</option>
		  <option value='Berlubang'>Berlubang</option>
		  <option value='Polip'>Polip</option>
		  </select>
		  
		  </td></tr>
		  <tr><td>telinga</td>              <td> : 
		  
		  <select name='telinga'>
		  <option value='Simetris'>Simetris</option>
		  <option value='Bersih'>Bersih</option>
		  <option value='Serumen'>Serumen</option>
		  </select>
		  
		  </td></tr>
		  <tr><td>leher</td>              <td> : 
		  
		  <select name='leher'>
		  <option value='Tidak_ada_benjolan'>Tidak_ada_benjolan</option>
		  
		  </select>
		  
		  </td></tr>
		  <tr><td>payudara</td>           <td> : 
		  
		  <select name='payudara'>
		  <option value='Simetris'>Simetris</option>
		  
		  </select>
		  
		  </td></tr>
		   <tr><td>abdoman</td>           <td> : 
		   
		   <select name='abdoman'>
		  <option value='Lineanigra'>Lineanigra</option>
		  
		  </select>
		   
		   </td></tr>
		   
		   <tr><td>Kondisi Pasien</td>        <td> : <input type=radio name='kondisi' value='Normal' size=20 >  Normal
		   
		                                             <input type=radio name='kondisi' value='Waspada' size=20 > Waspada</td></tr>
													 
													 			
			 <tr><td>Kondisi Pasien</td>        <td> : <textarea align='center' style='border-radius: 7px 7px 7px 7px; border: 1px solid                rgb(204, 204, 204); height: 150px; width: 500px;' name='catatan'>
                Silahkan Tulis Pesan Disini
                </textarea></td></tr>
		  
		  
		  <br />

          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editkunjungan":
    $edit=mysql_query("SELECT * FROM kunjungan WHERE id_kunjungan = '$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Edit pasien</h2>
          <form method=POST action=$aksi?module=kunjungan&act=update&id_hamil=$_GET[id_hamil]>
          <input type=hidden name=id value='$r[id_kunjungan]'>
		  
          <table class='list'>
           
	      
		  <tr><td>keluhan</td>              <td> : <input type=text name='keluhan' size=20 value=$r[keluhan] required></td></tr>
		  <tr><td>pergerakan</td>           <td> : <input type=text name='pergerakan' size=20 value=$r[pergerakan] required> ( kali )</td></tr>
		  <tr><td>tekanan_darah</td>        <td> : <input type=text name='tekanan_darah' size=20 value=$r[tekanan_darah] required> mm Hg</td></tr>
	      <tr><td>tekanan_nadi</td>         <td> : <input type=text name='tekanan_nadi' size=20 value=$r[tekanan_nadi] required> / menit</td></tr>
		  <tr><td>respirasi</td>            <td> : <input type=text name='respirasi' size=20 value=$r[respirasi] required> / menit</td></tr>
		  <tr><td>suhu</td>                 <td> : <input type=text name='suhu' size=20 value=$r[suhu] required> &deg; C</td></tr>
		  <tr><td>Leopold I</td>            <td> : <select name='leoI'>
		  <option value='1 Jari Bawah Pusat'>1 Jari Bawah Pusat</option>
		  <option value='1 Jari Atas Pusat'>1 Jari Atas Pusat</option>
		  <option value='2 Jari Bawah Pusat'>2 Jari Bawah Pusat</option>
		  <option value='2 Jari Atas Pusat'>2 Jari Atas Pusat</option>
		  <option value='3 Jari Bawah Pusat'>3 Jari Bawah Pusat</option>
		  <option value='3 Jari Atas Pusat'>3 Jari Atas Pusat</option>
		  </select></td></tr>
		  <tr><td>Leopold II</td>            <td> : <select name='leoII'>
		  <option value='Punggung Kanan'>Punggung Kanan</option>
		  <option value='Punggung Kiri'>Punggung Kiri</option>
		  </select></td></tr>
		  <tr><td>Leopold III</td>            <td> : <select name='leoIII'>
		  <option value='Presentasi Kepala'>Presentasi Kepala</option>
		  <option value='Presentasi Bokong'>Presentasi Bokong</option>
		  </select></td></tr>
		  <tr><td>tekanan HB</td>         <td> : <input type=text name='tekanan_hb' size=20 value=$r[tekanan_nadi] required> / menit</td></tr
		  <tr><td>berat</td>                <td> : <input type=text name='berat' size=20 value=$r[berat] required> kg</td></tr>
	      <tr><td>tinggi</td>               <td> : <input type=text name='tinggi' size=20 value=$r[tinggi] required> cm</td></tr>
		  <tr><td>LILA</td>                 <td> : <input type=text name='LILA' size=20 value=$r[LILA] required> cm</td></tr>
		  <tr><td>kepala</td>               <td> : 
		  <select name='kepala'>
		  <option value='Mesocnepal'>Mesocnepal</option>
		  <option value='Tidak_ada_benjolan'>Tidak_ada_benjolan</option>
		  <option value='Rambut_bersih'>Rambut_bersih</option>
		  <option value='Tidak_rontok'>Tidak_rontok</option>
		  </select>
		  </td></tr>
		  <tr><td>muka</td>                 <td> :
		  
		  <select name='muka'>
		  <option value='Simetris'>Simetris</option>
		  <option value='Tidak_pucat'>Tidak_pucat</option>
		  <option value='Tidak_Oedem'>Tidak_Oedem</option>
		  <option value='Tidak_cloasmagavidarum'>Tidak_cloasmagavidarum</option>
		  </select>
		   
		   </td></tr>
	      <tr><td>mata</td>                 <td> : 
		  <select name='mata'>
		  <option value='Simetris'>Simetris</option>
		  <option value='Sklera_Putih'>Sklera_Putih</option>
		  <option value='Konjungtiva_merah_muda'>Konjungtiva_merah_muda</option>
		  </select>
		  
		  </td></tr>
		  <tr><td>mulut</td>                <td> : 
		  
		   <select name='mulut'>
		  <option value='Bersih'>Bersih</option>
		  <option value='Bibir_tidak_pucat'>Bibir_tidak_pucat</option>
		  <option value='Stomatitis'>Stomatitis</option>
		  </select>
		  
		  </td></tr>
		  <tr><td>hidung</td>               <td> : 
		  
		  <select name='hidung'>
		  <option value='Simetris'>Simetris</option>
		  <option value='Berlubang'>Berlubang</option>
		  <option value='Polip'>Polip</option>
		  </select>
		  
		  </td></tr>
		  <tr><td>telinga</td>              <td> : 
		  
		  <select name='telinga'>
		  <option value='Simetris'>Simetris</option>
		  <option value='Bersih'>Bersih</option>
		  <option value='Serumen'>Serumen</option>
		  </select>
		  
		  </td></tr>
		  <tr><td>leher</td>              <td> : 
		  
		  <select name='leher'>
		  <option value='Tidak_ada_benjolan'>Tidak_ada_benjolan</option>
		  
		  </select>
		  
		  </td></tr>
		  <tr><td>payudara</td>           <td> : 
		  
		  <select name='payudara'>
		  <option value='Simetris'>Simetris</option>
		  
		  </select>
		  
		  </td></tr>
		   <tr><td>abdoman</td>           <td> : 
		   
		   <select name='abdoman'>
		  <option value='Lineanigra'>Lineanigra</option>
		  
		  </select>
		   
		   </td></tr>
		    <tr><td>Kondisi Pasien</td>        <td> : <input type=radio name='kondisi' value='Normal' size=20 >  Normal
		   
		                                             <input type=radio name='kondisi' value='Waspada' size=20 > Waspada</td></tr>
		   
			
			 <tr><td>Kondisi Pasien</td>        <td> : <textarea align='center' style='border-radius: 7px 7px 7px 7px; border: 1px solid                rgb(204, 204, 204); height: 150px; width: 500px;' name='catatan'>
                $r[catatan]
                </textarea></td></tr>
		   
		   
		   
		   ";

    if ($r[blokir]=='N'){
      echo "<tr></tr>";
    }
    else{
      echo "<tr></tr>";
    }
    
    echo "<tr></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    else{
    echo "<h2>Edit Pasien</h2>
          <form method=POST action=$aksi?module=pasien&act=update>
          <input type=hidden name=id value='$r[id_pasien]'>
          <input type=hidden name=editpasien value='$r[editpasien]'>
          <table>
          <tr><td class='left'>nama</td>         <td> : <input type=text name='nama' value='$r[nama]' disabled></td></tr>
          <tr><td class='left'>jk</td>           <td> : <input type=text name='jk' value='$r[jk]'>  </td></tr>
          <tr><td class='left'>alamat</td>       <td> : <input type=text name='alamat' size=30  value='$r[alamat]'></td></tr>
          
          <tr><td class='left'>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=30 value='$r[no_telp]'></td></tr>
		  <tr><td class='left'>bidan</td>        <td> : <input type=text name='bidan' size=30 value='$r[bidan]' disabled></td></tr>";    
    echo "<tr></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";     
    }
    break;  
}
}
?>
