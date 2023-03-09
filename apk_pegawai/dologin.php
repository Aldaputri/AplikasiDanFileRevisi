<?php
require "config/main.php";

$user 	= $_POST['tUser'];
$pwd   	= $_POST['tPwd'];

$hasil  = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$user' AND
						password='$pwd'");
$hitung = mysqli_num_rows($hasil);
$data   = mysqli_fetch_array($hasil);

if ($hitung > 0){
	session_start();
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['password'];
	$_SESSION['nama'] = $data['nama'];
	
	header('Location:index.php');
}else{
   echo "<script>alert('GAGAL..!!!!!, Silakan Ulangi Lagi'); window.location = 'login.php'</script>";
}
?>