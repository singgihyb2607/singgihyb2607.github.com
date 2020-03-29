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
  // Tampil Pasien
  default:
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
      
	  
	   $p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);
      $tampil = mysql_query("SELECT * FROM  pasien ORDER BY id_pasien DESC LIMIT $posisi,$batas");
	  $y=mysql_num_rows($tampil);
	  $no = $posisi+1;
	  
	  $jam=date("H:i:s");
$tgl=tgl_indo(date("Y m d")); 	
  echo "<br /><p align=center>Hai <b>$_SESSION[namauser]</b>, selamat datang di halaman Administrator. 
          Silahkan klik menu pilihan yang berada di bagian header untuk mengelola content website. <br /> <b>$hari_ini, $tgl, $jam </b>WIB</p><br />"; 
	  
	  
      echo "<h2>Pasien</h2>
	   <form action='' method='post'>
          <input type=button value='Tambah Data Pasien' onclick=\"window.location.href='?module=pasien&act=tambahpasien';\">
		  <input type=text value='' class='kanan2' name='cari'>
		  <input type='submit' name'submit' value='Cari' class='button cyan' />
		 </form>";
		  
    }
    else{
       $p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);
      echo "<h2>Pasien</h2>";
    }
    
    echo "<table class='list'><thead>
          <tr>
          <td class='left'>no</td>
          <td class='left'>nama</td>
          
          <td class='left'>alamat</td>
          <td class='left'>no_telp</td>
          
		  <td class='left'>Agama</td>
		  <td class='left'>Suami</td>
		   <td class='center'>bidan</td>
          <td class='center'>aksi</td>
          </tr></thead> "; 
    
	
	$cari  = $_POST['cari'];
    $query = mysql_query("SELECT * FROM pasien WHERE nama LIKE '%$cari%' order BY Id_pasien DESC LIMIT $posisi,$batas");
	  $no = $posisi+1;
    while ($r = mysql_fetch_array($query)){
       echo "  
	
	<tr><td class='left'>$no</td>
             <td class='left'><a href=?module=pasien&act=detail&id=$r[id_pasien]>$r[nama]</a></td>
             
		     <td class='left'>$r[alamat]/$r[kelurahan]/$r[rt]/$r[rw]/$r[kecamatan]/$r[kota]</td>
		     <td class='left'>$r[no_telp]</td>
		     
			 <td class='left'>$r[agama]</td>
			 <td class='left'>$r[suami]</td>
		     <td class='center'>$r[bidan]</td>
             <td class='center' width='50'><a href=?module=pasien&act=editpasien&id=$r[id_pasien]><img src='images/edit.png' border='0' title='edit' /></a> 
			 <a href=$aksi?module=pasien&act=hapus&id=$r[id_pasien]  onclick = 'return confirm (\"anda yakin ingin menghapus data dengan nama = $r[nama]\");'><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
    echo "</table>";
	
	//=============PAGING ========================
			 
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM pasien"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
    
    echo "<div class=pagination>$linkHalaman  <div class='kanan'>$jmldata</div></div>  <br>"; 
	
	
    break;
	
	
	
	
	
	
	
	
	
	 case "detail":
    $edit=mysql_query("SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
    $r=mysql_fetch_array($edit);
	 $YNow = date('Y');
		   $Y = date('Y',strtotime($r['tanggallahir']));
		   $fix = $YNow - $Y;
		   
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Detail pasien</h2>
          <form method=POST action=$aksi?module=pasien&act=update>
          <input type=hidden name=id value='$r[id_pasien]'>
		  
          <table class='list'><tbody>
		 <tr height='35'><td>Nama</td> <td> : $r[nama] </td></tr>
		 
		 <tr height='35'><td>Alamat </td> <td> : $r[alamat] </td></tr>
		 <tr height='35'><td>RT </td> <td> : $r[rt] </td></tr>
		 <tr height='35'><td>RW </td> <td> : $r[rw] </td></tr>
		 <tr height='35'><td>Kota</td> <td> : $r[kota] </td></tr>
		 <tr height='35'><td>Kecamatan</td> <td> : $r[kecamatan] </td></tr>
		 <tr height='35'><td>Umur</td> <td> : $fix </td></tr>
		 <tr height='35'><td>Pendidikan Terakhir</td> <td> : $r[pend_terakhir] </td></tr>
		 <tr height='35'><td>Agama</td> <td> : $r[agama]</td></tr>
		 <tr height='35'><td>No Telepon </td> <td> : $r[no_telp] </td></tr>
		
		 <tr height='35'><td>suami </td> <td> : $r[suami] </td></tr>
		 <tr height='35'><td>No telp suami </td> <td> : $r[no_telp_suami] </td></tr>
		 <tr height='35'><td>Bidan </td> <td> : $r[bidan] </td></tr>
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  
  case "tambahpasien":
    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
		
    echo "<h2>Tambah pasien</h2>
          <form method=POST action='$aksi?module=pasien&act=input'>
          <table class='list'>
		  <tr><td>Nama</td>         <td> : 
    <input type=text name='nama' size=20  required></td></tr>
	 
		 <tr valign='top'><td>Alamat</td>       <td> : <input type=text name='alamat' id='cari' size=20 required><br>: <input type=text name='kelurahan' size=20 value='kel.'><br>  
                                         :  <input type=text name='rt' size=7 value='RT()'><input type=text name='rw' size=8 value='RW()'><br>
										    : <input type=text name='kecamatan' size=15 value='kec.'> : <input type=text name='kota' size=15 value='kota.'></td></tr>
          <tr><td>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=20></td></tr>
		 
		  <tr><td>Tgl Lahir</td>         <td> : 
		  
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
		  
		  
		  
		   <select name='tahun_lahir'>
		    <option value=1970   selected>1970</option>
			<option value=1971   selected>1971</option>
			<option value=1972   selected>1972</option>
            <option value=1973   selected>1973</option>
			<option value=1974   selected>1974</option>
			<option value=1975   selected>1975</option>
			<option value=1976   selected>1976</option>
			<option value=1977   selected>1977</option>
			<option value=1978   selected>1978</option>
			<option value=1979   selected>1979</option>
			<option value=1980   selected>1980</option>
			<option value=1981   selected>1981</option>
			<option value=1982   selected>1982</option>
			<option value=1983   selected>1983</option>
			<option value=1984   selected>1984</option>
			<option value=1985   selected>1985</option>
			<option value=1986   selected>1986</option>
			<option value=1987   selected>1987</option>
			<option value=1988   selected>1988</option>
			<option value=1989   selected>1989</option>
			<option value=1990   selected>1990</option>
			<option value=1991   selected>1991</option>
			<option value=1992   selected>1992</option>
			<option value=1993   selected>1993</option>
			<option value=1994   selected>1994</option>
			<option value=1995   selected>1995</option>
			<option value=1996   selected>1996</option>
			<option value=1997   selected>1997</option>
			<option value=1998   selected>1998</option>
			<option value=1999   selected>1999</option>
			<option value=2000   selected>2000</option>
			<option value=2001   selected>2001</option>
			<option value=2002   selected>2002</option>
			<option value=2004   selected>2004</option>
			<option value=2005   selected>2005</option>
			<option value=2006   selected>2006</option>
			<option value=2007   selected>2007</option>
			<option value=2008   selected>1978</option>
			<option value=2009   selected>1979</option>
			<option value=2010   selected>2010</option>
			
		 </select></td></tr>
		 <tr><td>Pendidikan Terakhir</td>   <td> : 
		  <select  name='pend_terakhir'>
		  <option value=SD>SD</option>
		  <option value=SMP>SMP</option>
		  <option value=SMA>SMA</option>
		  <option value=S1>S1</option>
		  <option value=S2>S2</option>
		  <option value=S3>S3</option>
		  </select>
		  </td></tr>
		  <tr><td>Agama</td>        <td> : 
		  <select  name='agama'>
		  <option value=Islam>Islam</option>
		  <option value=Hindu>Hindu</option>
		  <option value=Budha>Budha</option>
		  <option value=Kristen>Kristen</option>
		  <option value=Katholik>Katholik</option>
		  <option value=Lainnya>Lainnya</option>
		  </select>
		  </td></tr>
		   <tr><td>Suami</td>                 <td> : <input type=text name='suami' size=20 required></td></tr>
		    <tr><td>No telp suami</td>        <td> : <input type=tel name='no_telp_suami' size=20 required></td></tr>  
		  <tr><td>bidan</td>                  <td> : <input type=text name='bidan' size=20 value='$_SESSION[namalengkap]'disabled\></td></tr>
		  
		  
		  
		  
		  <br />

          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    }
    else{
      echo "Anda tidak berhak mengakses halaman ini.";
    }
     break;
    
  case "editpasien":
    $edit=mysql_query("SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
    $r=mysql_fetch_array($edit);

    if ($_SESSION[leveluser]=='admin' OR $_SESSION['leveluser']=='user'){
    echo "<h2>Edit pasien</h2>
          <form method=POST action=$aksi?module=pasien&act=update>
          <input type=hidden name=id value='$r[id_pasien]'>
		  
          <table class='list'>
          <tr><td class='left'>nama</td>         <td> : <input type=text name='nama' value='$r[nama]' >  </td></tr>
          
		 
		 
		   <tr><td>Pendidikan Terakhir</td>   <td> : <input type=text name='pend_terakhir' size=20 value='$r[pend_terakhir]'></td></tr>
		   
          <tr><td class='left'>alamat</td>       <td> : <input type=text name='alamat' size=30  value='$r[alamat]'>
		                                          Kelurahan : <input type=text name='kelurahan' size=10 value='$r[kelurahan]'>  
                                           RT : <input type=text name='rt' size=5 value='$r[rt]'>RW : <input type=text name='rw' size=5 value='$r[rw]'>
										   Kecamatan : <input type=text name='kecamatan' size=10 value='$r[kecamatan]'> Kota : <input type=text name='kota' size=10 value='$r[kota]'></td></tr>
          
          <tr><td class='left'>No.Telp/HP</td>   <td> : <input type=text name='no_telp' size=30 value='$r[no_telp]'></td></tr>
		  <tr><td>Agama</td>        <td> : 
		  <select  name='agama'>
		  <option value=Islam>Islam</option>
		  <option value=Hindu>Hindu</option>
		  <option value=Budha>Budha</option>
		  <option value=Kristen>Kristen</option>
		  <option value=Katholik>Katholik</option>
		  <option value=Lainnya>Lainnya</option>
		  </select>
		  </td></tr>
		   <tr><td>Suami</td>                 <td> : <input type=text name='suami' value='$r[suami]' size=20 ></td></tr>
		    <tr><td>No telp suami</td>        <td> : <input type=text name='no_telp_suami' value='$r[no_telp_suami]' size=20 ></td></tr> 
		  <tr><td class='left'>bidan</td>        <td> : <input type=text name='bidan' size=30 value='$r[bidan]'  disabled> </td></tr>";

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
