<?php
$server = "localhost"; //nama server
$username = "root"; // username 
$password = ""; //  standarnya kosong
$database = "dbcrud"; // buat nama database harus sama 

// Koneksi dan memilih database di server
$koneksi=mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
?>