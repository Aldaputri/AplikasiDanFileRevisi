<?php
session_start();
session_destroy();
echo "<script>alert('Anda Telah Keluar Dari Login Sebagai Admin'); window.location = 'login.php'</script>";

?>