<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_ibuhamil/aksi_hamil.php";
switch($_GET[act]){
  // Tampil Ibu Hamil
  
 
  
  default:
    if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
     
	 
	   $p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);
      $tampil = mysql_query("SELECT * FROM  pasien inner join hamil on pasien.id_pasien = hamil.id_pasien ORDER BY id_hamil DESC LIMIT $posisi,$batas");
	  $y=mysql_num_rows($tampil);
	  $no = $posisi+1;
	  
	 
	  

          echo "<h2>Daftar Ibu hamil</h2>
		  <form action='' method='post'>
          <input type=button value='Tambah Daftar Ibu Hamil' onclick=\"window.location.href='?module=ibuhamil&act=tambahhamil';\">
		  
		  <input type=text value='' class='kanan2' name='cari'>
		  <input type='submit' name'submit' value='Cari' class='button cyan' />
		 </form>
		  
		  ";
    }
    else{
      $tampil=mysql_query("SELECT * hamil ORDER BY id_hamil");
      echo "<h2>Daftar Ibu Hamil</h2>";
    }
    
    echo "<table class='list'><thead>
          <tr>
          <td class='left'>No</td>
          <td class='left'>Nama</td>
          <td class='left'>Tanggal Pendaftaran</td>
          <td class='center'>HPHT</td>
          <td class='center'>HPL</td>
          
          <td class='center'>hamil_ke</td>
		  <td class='center'>umur_kehamilan</td>
		  <td class='center'>Tekanan hb</td>
		  <td class='center'>bidan</td>
		  <td class='center'>Aksi</td>
          </tr></thead> "; 
   
   
   $cari  = $_POST['cari'];
    $query = mysql_query("SELECT * FROM pasien inner join hamil on pasien.id_pasien = hamil.id_pasien  WHERE nama LIKE '%$cari%' order BY Id_hamil DESC LIMIT $posisi,$batas");
	  $no = $posisi+1;
    while ($r = mysql_fetch_array($query)){
       echo "
   
   
   
   <tr><td class='left' width='25'>$no</td>
             <td class='left'><a href=?module=kunjungan&act=kunjungan&id=$r[id_hamil]>$r[nama]</a></td>
             <td class='left'>$r[tanggalperiksa]</td>
		         <td class='center'>$r[HPHT]</td>
		         <td class='center'>$r[HPL]</td>
				  <td class='center' >$r[hamil_ke]</td>
				  <td class='center'>$r[umur_kehamilan] bulan</td>
				   <td class='center'>$r[tekanan]</td> 
				  <td class='center'>$r[bidan]</td>
             <td class='center' width='50'><a href=?module=ibuhamil&act=editibu&id=$r[id_hamil]><img src='images/edit.png' border='0' title='edit' /></a>
			 <a href=$aksi?module=ibuhamil&act=hapus&id=$r[id_hamil] onclick = 'return confirm (\"anda yakin ingin menghapus data dengan nama = $r[nama]\");'><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
    echo "</table>";
	
	//=============PAGING ========================
			 
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM pasien inner join hamil on pasien.id_pasien = hamil.id_pasien"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman<div class='kanan'>$jmldata</div></div><br>";
	
	
	
	
    break;
  
  case "tambahhamil":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
		
    echo "<h2>Tambah Ibu Hamil</h2>
          <form method=POST action='$aksi?module=ibuhamil&act=input'>
          <table class='list'>
          <tr><td>Nama</td>                  <td> : 
		  <select name='nama'>
  <option value=0 selected>-pilih nama-</option>";
  $perintah = mysql_query ("select * from pasien order by Nama asc");
  
  while ($r = mysql_fetch_array($perintah)){
	echo "<option value=$r[id_pasien]> $r[nama] </option>";
 }
    echo "</select>  </td></tr>
	
	
	
	
	
          <tr><td>Tanggal Pendaftaran</td>           <td> : <input type=text name='tanggalperiksa' id='input'></td></tr>  
		  <tr><td>HPHT</td>                     <td> : 
		 <select name='tgl'>
            <option value=01   selected>01</option>
			<option value=02   selected>02</option>
			<option value=03   selected>03</option>
			<option value=04   selected>04</option>
			<option value=05   selected>05</option>
			<option value=06   selected>06</option>
			<option value=07   selected>07</option>
			<option value=08   selected>08</option>
			<option value=09   selected>09</option>
			<option value=10   selected>10</option>
			<option value=11   selected>11</option>
			<option value=12   selected>12</option>
			<option value=13   selected>13</option>
			<option value=14   selected>14</option>
			<option value=15   selected>15</option>
			<option value=16   selected>16</option>
			<option value=17   selected>17</option>
			<option value=18   selected>18</option>
			<option value=19   selected>19</option>
			<option value=20   selected>20</option>
			<option value=21   selected>21</option>
			<option value=22   selected>22</option>
			<option value=23   selected>23</option>
			<option value=24   selected>24</option>
			<option value=25   selected>25</option>
			<option value=26   selected>26</option>
			<option value=27   selected>27</option>
			<option value=28   selected>28</option>
			<option value=29   selected>29</option>
			<option value=30   selected>30</option>
			<option value=31   selected>31</option>
			
</select>
<select name='bln'>
            <option value=01   selected>01</option>
			<option value=02   selected>02</option>
			<option value=03   selected>03</option>
			<option value=04   selected>04</option>
			<option value=05   selected>05</option>
			<option value=06   selected>06</option>
			<option value=07   selected>07</option>
			<option value=08   selected>08</option>
			<option value=09   selected>09</option>
			<option value=10   selected>10</option>
			<option value=11   selected>11</option>
			<option value=12   selected>12</option>
</select>
<select name='thn'>
            <option value=2004   selected>2004</option>
			<option value=2015   selected>2005</option>
			<option value=2016   selected>2006</option>
			<option value=2017   selected>2007</option>
			<option value=2018   selected>2008</option>
            <option value=2009   selected>2009</option>
			<option value=2010   selected>2010</option>
			<option value=2011   selected>2011</option>
			<option value=2012   selected>2012</option>
			<option value=2013   selected>2013</option>
			<option value=2014   selected>2014</option>
			<option value=2015   selected>2015</option>
			<option value=2016   selected>2016</option>
</select>
		  </td></tr> 
		  
		  
		        
          <tr><td>hamil_ke</td>                 <td> : 
		  
		  <select name='hamil_ke'>
            <option value=1   selected>1</option>
			<option value=2   selected>2</option>
			<option value=3   selected>3</option>
			<option value=4   selected>4</option>
			<option value=5   selected>5</option>
			<option value=6   selected>6</option>
			<option value=7   selected>7</option>
			<option value=8   selected>8</option>
			<option value=9   selected>9</option>
			<option value=10   selected>10</option>
		 </select></td></tr>
		 <tr><td>Tekanan HB</td>                         <td> : <input type=text name='tekanan' size=30 ></td></tr>
		  <tr><td>bidan</td>                         <td> : <input type=text name='bidan' size=30 value='$_SESSION[namalengkap]' readonly></td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
	
	
	
	
	
	
	
  case "editibu":
    $edit=mysql_query("SELECT * FROM hamil WHERE id_hamil='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Tambah ibu Hamil</h2>
          <form method=POST action='$aksi?module=ibuhamil&act=update'>
		  <input type=hidden name='id' value='$r[id_hamil]'>
          <table class='list'>
          ";
	
	
$edit=mysql_query("SELECT * FROM hamil WHERE id_hamil='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "	
	
          <tr><td>Tanggal Pendaftaran</td>      <td> : <input type=text name='tanggalperiksa' value='$r[tanggalperiksa]' id='input'></td></tr>  
		  <tr><td>HPHT</td>                <td> :
		  
		  
		   <select name='tgl'>
            <option value=01   selected>01</option>
			<option value=02   selected>02</option>
			<option value=03   selected>03</option>
			<option value=04   selected>04</option>
			<option value=05   selected>05</option>
			<option value=06   selected>06</option>
			<option value=07   selected>07</option>
			<option value=08   selected>08</option>
			<option value=09   selected>09</option>
			<option value=10   selected>10</option>
			<option value=11   selected>11</option>
			<option value=12   selected>12</option>
			<option value=13   selected>13</option>
			<option value=14   selected>14</option>
			<option value=15   selected>15</option>
			<option value=16   selected>16</option>
			<option value=17   selected>17</option>
			<option value=18   selected>18</option>
			<option value=19   selected>19</option>
			<option value=20   selected>20</option>
			<option value=21   selected>21</option>
			<option value=22   selected>22</option>
			<option value=23   selected>23</option>
			<option value=24   selected>24</option>
			<option value=25   selected>25</option>
			<option value=26   selected>26</option>
			<option value=27   selected>27</option>
			<option value=28   selected>28</option>
			<option value=29   selected>29</option>
			<option value=30   selected>30</option>
			<option value=31   selected>31</option>
			
</select>
<select name='bln'>
            <option value=0l   selected>01</option>
			<option value=02   selected>02</option>
			<option value=03   selected>03</option>
			<option value=04   selected>04</option>
			<option value=05   selected>05</option>
			<option value=06   selected>06</option>
			<option value=07   selected>07</option>
			<option value=08   selected>08</option>
			<option value=09   selected>09</option>
			<option value=10   selected>10</option>
			<option value=11   selected>11</option>
			<option value=12   selected>12</option>
</select>
<select name='thn'>
            <option value=2004   selected>2004</option>
			<option value=2015   selected>2005</option>
			<option value=2016   selected>2006</option>
			<option value=2017   selected>2007</option>
			<option value=2018   selected>2008</option>
            <option value=2009   selected>2009</option>
			<option value=2010   selected>2010</option>
			<option value=2011   selected>2011</option>
			<option value=2012   selected>2012</option>
			<option value=2013   selected>2013</option>
			<option value=2014   selected>2014</option>
			<option value=2015   selected>2015</option>
			<option value=2016   selected>2016</option>
</select>
		 
		  
		  
		  
		  
		  
		  </td></tr>  
		  
		        
          <tr><td>hamil_ke</td>               <td> :
		  
		  <select name='hamil_ke'>
            <option value=1   selected>1</option>
			<option value=2   selected>2</option>
			<option value=3   selected>3</option>
			<option value=4   selected>4</option>
			<option value=5   selected>5</option>
			<option value=6   selected>6</option>
			<option value=7   selected>7</option>
			<option value=8   selected>8</option>
			<option value=9   selected>9</option>
			<option value=10   selected>10</option>
		 </select></td></tr>
		   
		   
		   
		  
		 <tr><td>Tekanan hb</td>                <td> : <input type=text name='tekanan' size=30 value='$r[tekanan]' ></td></tr>
		  <tr><td>bidan</td>                <td> : <input type=text name='bidan' size=30 value='$r[bidan]' disabled></td></tr>
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
