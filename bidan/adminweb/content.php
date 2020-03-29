<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "class_paging.php";
?>


<?php
$aksi="modul/mod_pasien/aksi_pasien.php";
// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){

$jam=date("H:i:s");
$tgl=tgl_indo(date("Y m d")); 	
  echo "<br /><p align=center>Hai <b>$_SESSION[namauser]</b>, selamat datang di halaman Administrator. 
          Silahkan klik menu pilihan yang berada di bagian header untuk mengelola content website. <br /> <b>$hari_ini, $tgl, $jam </b>WIB</p><br />";

	

     echo "<h2>Daftar Pasien</h2>
	 <form action='' method='post'>
          <input type=button value='Tambah Data Pasien' onclick=\"window.location.href='?module=pasien&act=tambahpasien';\">
		    <input type=text value='' class='kanan2' name='cari'>
		  <input type='submit' name'submit' value='Cari' class='button cyan' />
		 </form>";	
		  
	$p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);
	 $tampil=mysql_query("SELECT * FROM pasien ORDER BY id_pasien DESC LIMIT $posisi,$batas");
      $no = $posisi+1;
      
	  
	 echo "<table class='list'><thead>
          <tr>
          <td class='left'>no</td>
          <td class='left'>Nama</td>
          
          <td class='left'>No.Telp/HP</td>
          <td class='left'>Alamat</td>
		  <td class='left'>Umur</td>
		  <td class='left'>Agama</td>
		  <td class='left'>Suami</td>
          <td class='left'>Bidan</td>
          <td class='center'>aksi</td>
          </tr></thead> "; 
		  $cari  = $_POST[cari];
    $query = mysql_query("SELECT * FROM pasien WHERE nama LIKE '%$cari%' order BY Id_pasien DESC LIMIT $posisi,$batas");
	  $no = $posisi+1;
    while ($r = mysql_fetch_array($query)){
		     $YNow = date('Y');
		   $Y = date('Y',strtotime($r['tanggallahir']));
		   $fix = $YNow - $Y;
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'><a href=?module=pasien&act=detail&id=$r[id_pasien]>$r[nama]</a></td>
             
		     <td class='left'>$r[no_telp]</td>
			 <td class='left'>$r[alamat]/$r[kelurahan]/$r[rt]/$r[rw]/$r[kecamatan]/$r[kota]</td>
			 <td class='left'>$fix</td>
			 <td class='left'>$r[agama]</td>
			 <td class='left'>$r[suami]</td>
			 <td class='left'>$r[bidan]</td>
			 <td class='center' width='85'><a href=?module=pasien&act=editpasien&id=$r[id_pasien] ><img src='images/edit.png' border='0' title='edit' /></a> 
			 <a href=$aksi?module=pasien&act=hapus&id=$r[id_pasien]  onclick = 'return confirm (\"anda yakin ingin menghapus data dengan nama = $r[nama]\");'><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
	echo "</table>";
	
	//=============PAGING ========================
			 
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM pasien"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman<div class='kanan'>$jmldata</div></div><br>"; 
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  
  elseif ($_SESSION['leveluser']=='user'){
  echo "<h2>Daftar Pasien</h2>
	 <form action='' method='post'>
          <input type=button value='Tambah Data Pasien' onclick=\"window.location.href='?module=pasien&act=tambahpasien';\">
		    <input type=text value='' class='kanan2' name='cari'>
		  <input type='submit' name'submit' value='Cari' class='button cyan' />
		 </form>";	
		  
	$p      = new Paging;
    $batas  = 7;
    $posisi = $p->cariPosisi($batas);
	 $tampil=mysql_query("SELECT * FROM pasien ORDER BY id_pasien DESC LIMIT $posisi,$batas");
      $no = $posisi+1;
      
	  
	 echo "<table class='list'><thead>
          <tr>
          <td class='left'>no</td>
          <td class='left'>Nama</td>
          
          <td class='left'>No.Telp/HP</td>
          <td class='left'>Alamat</td>
		  <td class='left'>Umur</td>
		  <td class='left'>Agama</td>
		  <td class='left'>Suami</td>
          <td class='left'>Bidan</td>
          <td class='center'>aksi</td>
          </tr></thead> "; 
		  $cari  = $_POST[cari];
    $query = mysql_query("SELECT * FROM pasien WHERE nama LIKE '%$cari%' order BY Id_pasien DESC LIMIT $posisi,$batas");
	  $no = $posisi+1;
    while ($r = mysql_fetch_array($query)){
		     $YNow = date('Y');
		   $Y = date('Y',strtotime($r['tanggallahir']));
		   $fix = $YNow - $Y;
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'><a href=?module=pasien&act=detail&id=$r[id_pasien]>$r[nama]</a></td>
             
		     <td class='left'>$r[no_telp]</td>
			 <td class='left'>$r[alamat]/$r[kelurahan]/$r[rt]/$r[rw]/$r[kecamatan]/$r[kota]</td>
			 <td class='left'>$fix</td>
			 <td class='left'>$r[agama]</td>
			 <td class='left'>$r[suami]</td>
			 <td class='left'>$r[bidan]</td>
			 <td class='center' width='85'><a href=?module=pasien&act=editpasien&id=$r[id_pasien] ><img src='images/edit.png' border='0' title='edit' /></a> 
			 <a href=$aksi?module=pasien&act=hapus&id=$r[id_pasien]  onclick = 'return confirm (\"anda yakin ingin menghapus data dengan nama = $r[nama]\");'><img src='images/del.png' border='0' title='hapus' /></a></td></tr>";
      $no++;
    }
	echo "</table>";
	
	//=============PAGING ========================
			 
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM pasien"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman<div class='kanan'>$jmldata</div></div><br>"; 
	}}


// Bagian User
elseif ($_GET['module']=='profil'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profil/profil.php";
  }
}

// Bagian laporan
elseif ($_GET['module']=='laporan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_laporan/laporan.php";
  }
}


// Bagian Ibu Hamil
elseif ($_GET['module']=='ibuhamil'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_ibuhamil/hamil.php";
  }
}

// Bagian Persalinan
elseif ($_GET['module']=='persalinan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_persalinan/persalinan.php";
  }
}

// Bagian Bayi Beru Lahir
elseif ($_GET['module']=='bayilahir'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_bayilahir/bayi.php";
  }
}

// Bagian Bayi Nifas
elseif ($_GET['module']=='nifas'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_nifas/nifas.php";
  }
}

// Bagian KB
elseif ($_GET['module']=='kb'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_kb/kb.php";
  }
}

// Bagian Gangrep
elseif ($_GET['module']=='gangrep'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_gangrep/gangrep.php";
  }
}

// Bagian Memo
elseif ($_GET['module']=='memo'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_memo/memo.php";
  }
}



// Bagian Pasien
elseif ($_GET['module']=='pasien'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_pasien/pasien.php";
  }
}



// Bagian kunjungan
elseif ($_GET['module']=='kunjungan'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_kunjungan/kunjungan.php";
  }
}






// Bagian User
elseif ($_GET['module']=='user'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_users/users.php";
  }
}


// Bagian Modul
elseif ($_GET['module']=='modul'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_modul/modul.php";
  }
}
// Bagian Modul
elseif ($_GET['module']=='modul'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_modul/modul.php";
  }
}

// Bagian Kategori
elseif ($_GET['module']=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Berita
elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_berita/berita.php";                            
  }
}

// Bagian Komentar Berita
elseif ($_GET['module']=='komentar'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_komentar/komentar.php";
  }
}

// Bagian Tag
elseif ($_GET['module']=='tag'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tag/tag.php";
  }
}

// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_agenda/agenda.php";
  }
}
// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_pasien/pasien.php";
  }
}





// Bagian Banner
elseif ($_GET['module']=='banner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_banner/banner.php";
  }
}

// Bagian Poling
elseif ($_GET['module']=='poling'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_poling/poling.php";
  }
}

// Bagian Download
elseif ($_GET['module']=='download'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_download/download.php";
  }
}

// Bagian Hubungi Kami
elseif ($_GET['module']=='hubungi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Templates
elseif ($_GET['module']=='templates'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_templates/templates.php";
  }
}

// Bagian Shoutbox
elseif ($_GET['module']=='shoutbox'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_shoutbox/shoutbox.php";
  }
}

// Bagian Album
elseif ($_GET['module']=='album'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri Foto
elseif ($_GET['module']=='galerifoto'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_galerifoto/galerifoto.php";
  }
}

// Bagian Kata Jelek
elseif ($_GET['module']=='katajelek'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_katajelek/katajelek.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Menu Utama
elseif ($_GET['module']=='menuutama'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_menuutama/menuutama.php";
  }
}

// Bagian Sub Menu
elseif ($_GET['module']=='submenu'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_submenu/submenu.php";
  }
}

// Bagian Halaman Statis
elseif ($_GET['module']=='halamanstatis'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_halamanstatis/halamanstatis.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Identitas Website
elseif ($_GET['module']=='identitas'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_identitas/identitas.php";
  }
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>DATA BERHASIL DIHAPUS</b></p>";
}
?>
