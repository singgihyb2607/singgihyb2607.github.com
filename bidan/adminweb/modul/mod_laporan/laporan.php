<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_pasien/aksi_pasien.php";
switch($_GET[act]){
  // Tamil Laporan
  default:
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
      $tampil = mysql_query("SELECT * FROM  pasien ORDER BY nama");
	  
	  $jam=date("H:i:s");
$tgl=tgl_indo(date("Y m d")); 	
  echo "<br /><p align=center>Hai <b>$_SESSION[namauser]</b>, selamat datang di halaman Administrator. 
          Silahkan klik menu pilihan yang berada di bagian header untuk mengelola content website. <br /> <b>$hari_ini, $tgl, $jam </b>WIB</p><br />"; 
	  
	  
      echo "<h2></h2>
          <input type=button value='Laporan Ibu Hamil                  ' onclick=\"window.location.href='?module=laporan&act=laporan_ibu_hamil';\"><br>
		  <input type=button value='Laporan Persalinan                ' onclick=\"window.location.href='?module=laporan&act=laporan_persalinan';\"><br>
		  <input type=button value='Laporan Bayi baru Lahir         ' onclick=\"window.location.href='?module=laporan&act=laporan_bayi_baru_lahir';\"><br>
		  
		  <input type=button value='Laporan Keluarga Berencana' onclick=\"window.location.href='?module=laporan&act=laporan_keluarga_berencana';\"><br><br><br>";
    }
    else{
      $tampil=mysql_query("SELECT * FROM  pasien WHERE nama='$_SESSION[nama]'");
      echo "<h2></h2>";
    }
    
   
    echo "</table>";
    break;
  
   
  case "laporan_ibu_hamil":
   $date = date("m-y");
  
    $edit=mysql_query("SELECT * FROM hamil where bln ='$date' ");
	$y=mysql_num_rows($edit);
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Laporan Ibu Hamil</h2>
          <form method=POST action=$aksi?module=pasien&act=update>
          <input type=hidden name=id value='$r[id_pasien]'>
		  
          <table class='list'>
         <tr>
    <th width='33' rowspan='3' scope='col'>No</th>
    <th width='265' rowspan='3' scope='col'>Uraian Kegiatan 2</th>
    <th colspan='3' scope='col'>Puskesmas</th>
    <th width='190' rowspan='3' scope='col'>SWASTA DW 6</th>
    <th width='258' rowspan='3' scope='col'>PWS (3 + 6)</th>
  </tr>
  <tr>
    <td width='55'>DW</td>
    <td width='56'>LW</td>
    <td width='57'>JML</td>
  </tr>
  <tr>
    <td>3</td>
    <td>4</td>
    <td>5</td>
  </tr>
  <tr>
    <td>1. </td>
    <td>Jumlah kunjungan ibu hamil bulan ini</td>
    <td>$y</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</ td>
  </tr>
  <tr>
    <td>2.</td>
    <td>Jumlah ibu hamil yang ditemukan bulan ini</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
    $date = date("m-y");
  
    $edit=mysql_query("SELECT * FROM hamil where bln ='$date' and tekanan < '11' ");
	$y=mysql_num_rows($edit);
    $r=mysql_fetch_array($edit);

    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
	
   <tr>
    <td>&nbsp;</td>
    <td>HB &lt; II gr%</td>
    <td>$y </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
    $date = date("m-y");
  
    $edit=mysql_query("SELECT * FROM hamil where bln ='$date' and tekanan > '11' ");
	$y=mysql_num_rows($edit);
    $r=mysql_fetch_array($edit);

    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
  <tr>
    <td>&nbsp;</td>
    <td>HB &gt; II gr%</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>3.</td>
    <td>Ibu Hamil dengan resiko</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  ";
    $date = date("m-y");
  
    $edit=mysql_query("SELECT * FROM hamil where bln ='$date' and hamil_ke <= '5' ");
	$y=mysql_num_rows($edit);
    $r=mysql_fetch_array($edit);

    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
  
  <tr>
    <td>&nbsp;</td>
    <td>Usia &lt; 20 tahun</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  ";
    $date = date("m-y");
  
    $edit=mysql_query("SELECT * FROM hamil where bln ='$date' and hamil_ke >= '5' ");
	$y=mysql_num_rows($edit);
    $r=mysql_fetch_array($edit);

    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
  <tr>
    <td>&nbsp;</td>
    <td>Usia &gt; 20 tahun</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='7'>&nbsp;</td>
  </tr>";

    if ($r[blokir]=='N'){
      echo "<tr></tr>";
    }
    else{
      echo "<tr></tr>";
    }
    
    echo "<tr></tr>
          <tr><td class='left' colspan=2>  <input type=button value=print onclick=window.print();return false>
                            <input type=button value=Kembali onclick=self.history.back()></td></tr>
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
    }}}}}
    break;
	
	
	
	
	
	
	
	
	case "laporan_persalinan":
	$date = date("m-y");
    $edit=mysql_query("SELECT * FROM persalinan where bln = '$date'");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Laporan Persalinan</h2>
          <form method=POST action=$aksi?module=pasien&act=update>
          <input type=hidden name=id value='$r[id_pasien]'>
		  
          <table class='list'>
          <tr>
    <th width='33' rowspan='3' scope='col'>No</th>
    <th width='265' rowspan='3' scope='col'>Uraian Kegiatan 2</th>
    <th colspan='3' scope='col'>Puskesmas</th>
    <th width='190' rowspan='3' scope='col'>SWASTA DW 6</th>
    <th width='258' rowspan='3' scope='col'>PWS (3 + 6)</th>
  </tr>
  <tr>
    <td width='55'>DW</td>
    <td width='56'>LW</td>
    <td width='57'>JML</td>
  </tr>
  <tr>
    <td>3</td>
    <td>4</td>
    <td>5</td>
  </tr>
  <tr>
    <td>1. </td>
    <td>Jumlah kunjungan ibu bersalinbulan ini</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>2.</td>
    <td>Jumlah ibu bersalin / meninggal</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  
    $date = date("m-y");
    $edit=mysql_query("SELECT * FROM persalinan where bln = '$date' and keadaan_ibu = 'Normal' ");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
  <tr>
    <td>&nbsp;</td>
    <td>Normal</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  
    $date = date("m-y");
    $edit=mysql_query("SELECT * FROM persalinan where bln = '$date' and keadaan_ibu = 'Meninggal' ");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
  
  <tr>
    <td>&nbsp;</td>
    <td>Meninggal</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  
    $date = date("m-y");
    $edit=mysql_query("SELECT * FROM persalinan where bln = '$date' and keadaan_ibu = 'Otopsi_Verbal' ");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
  
  <tr>
    <td>&nbsp;</td>
    <td>Otopsi verbal</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan='7'>&nbsp;</td>
  </tr>";

    if ($r[blokir]=='N'){
      echo "<tr></tr>";
    }
    else{
      echo "<tr></tr>";
    }
    
    echo "<tr></tr>
          <tr><td class='left' colspan=2><input type=button value=print onclick=window.print();return false>
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
    }}}}
    break;
	
	
	
	
	
	
	
	
	
	
	
	case "laporan_bayi_baru_lahir":
	$date = date("m-y");
    $edit=mysql_query("SELECT * FROM anak where bln ='$date'");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);
	

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Laporan Bayi Baru Lahir</h2>
          <form method=POST action=$aksi?module=pasien&act=update>
          <input type=hidden name=id value='$r[id_pasien]'>
		  
          <table class='list'>
          <tr>
    <th width='33' rowspan='3' scope='col'>No</th>
    <th width='265' rowspan='3' scope='col'>Uraian Kegiatan 2</th>
    <th colspan='3' scope='col'>Puskesmas</th>
    <th width='190' rowspan='3' scope='col'>SWASTA DW 6</th>
    <th width='258' rowspan='3' scope='col'>PWS (3 + 6)</th>
  </tr>
  <tr>
    <td width='55'>DW</td>
    <td width='56'>LW</td>
    <td width='57'>JML</td>
  </tr>
  <tr>
    <td>3</td>
    <td>4</td>
    <td>5</td>
  </tr>
  <tr>
    <td>1. </td>
    <td>Jumlah Bayi Lahir Hidup bulan ini</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  ";
  
    $date = date("m-y");
    $edit=mysql_query("SELECT * FROM anak where bln = '$date' and berat > '2500' ");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "

  <tr>
    <td></td>
    <td>BBL > 2500 gr</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  ";
  
    $date = date("m-y");
    $edit=mysql_query("SELECT * FROM anak where bln = '$date' and berat < '2500' ");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "

  <tr>
    <td>&nbsp;</td>
    <td>BBL < 2500 gr</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  ";

  
    $date = date("m-y");
    $edit=mysql_query("SELECT * FROM anak where bln = '$date' and  keadaan_bayi = 'Normal'");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "

  <tr>
    <td>2. </td>
    <td>Jumlah Keadaan Bayi Lahir</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  ";

    if ($r[blokir]=='N'){
      echo "<tr></tr>";
    }
    else{
      echo "<tr></tr>";
    }
    
    echo "<tr></tr>
          <tr><td class='left' colspan=2><input type=button value=print onclick=window.print();return false>
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
    }}}}
    break;
	
	
	
	
	
	
	
	
	
	
	
	
	case "laporan_keluarga_berencana":
	$date = date("m");
    $edit=mysql_query("SELECT * FROM kb where bln=$date");
    $r=mysql_fetch_array($edit);
	$z=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Laporan Keluarga berencana</h2>
          <form method=POST action=$aksi?module=pasien&act=update>
          <input type=hidden name=id value='$r[id_pasien]'>
		  
          <table class='list'>
          <tr>
    <th width='33' rowspan='3' scope='col'>No</th>
    <th width='265' rowspan='3' scope='col'>Uraian Kegiatan 2</th>
    <th colspan='3' scope='col'>Puskesmas</th>
    <th width='190' rowspan='3' scope='col'>SWASTA DW 6</th>
    <th width='258' rowspan='3' scope='col'>PWS (3 + 6)</th>
  </tr>
  <tr>
    <td width='55'>DW</td>
    <td width='56'>LW</td>
    <td width='57'>JML</td>
  </tr>
  <tr>
    <td>3</td>
    <td>4</td>
    <td>5</td>
  </tr>
  <tr>
    <td>1. </td>
    <td>Jumlah Ibu akseptor KB bulan ini</td>
    <td>$z</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  $date = date("m");
    $edit=mysql_query("SELECT * FROM kb where bln=$date and jenis_kb='IUD'");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
  <tr>
    <td></td>
    <td>IUD</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  $date = date("m");
    $edit=mysql_query("SELECT * FROM kb where bln=$date and jenis_kb='MOW' ");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
  <tr>
    <td>&nbsp;</td>
    <td>MOW</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  ";
  $date = date("m");
    $edit=mysql_query("SELECT * FROM kb where bln=$date and jenis_kb='Implant'");
    $r=mysql_fetch_array($edit);
	$y=mysql_num_rows($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "
  <tr>
    <td>&nbsp;</td>
    <td>Implant</td>
    <td>$y</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  ";

    if ($r[blokir]=='N'){
      echo "<tr></tr>";
    }
    else{
      echo "<tr></tr>";
    }
    
    echo "<tr></tr>
          <tr><td class='left' colspan=2><input type=button value=print onclick=window.print();return false>
                            <input type=button value=Kembali onclick=self.history.back()></td></tr>
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
    }}}}
    break;
	
	
	
	
	
	
	
	  
}
}
?>
