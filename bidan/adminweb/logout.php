<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari halaman admin'); window.location = 'index.php'</script>";
?>
