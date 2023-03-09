<?php 
if (isset($_GET['hapus'])) {
	require "config/main.php";
	switch ($_GET['hapus']) {
		case 'data_pegawai':
			mysqli_query($koneksi, "DELETE FROM pegawai WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_jabatan':
			mysqli_query($koneksi,"DELETE FROM jabatan WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_pendidikan':
			mysqli_query($koneksi,"DELETE FROM pendidikan WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_keseluruhan':
			mysqli_query($koneksi,"DELETE FROM keseluruhan WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'data_sppd':
			mysqli_query($koneksi,"DELETE FROM sppd WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'perubahan_pangkat':
			mysqli_query($koneksi,"DELETE FROM prb_pangkat WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		case 'admin':
			mysqli_query($koneksi,"DELETE FROM admin WHERE id=".$_GET['id']);
			header('Location:index.php?page='.$_GET['hapus']);
			break;
		
		default:
			require_once("pages/404.php");
			break;
	}
}
else {
	require_once("index.php");
}

 ?>