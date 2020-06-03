<?php
	$server = "localhost"; //nama server
	$username = "root"; // username 
	$password = ""; //  standarnya kosong
	$database = "api-week-14"; // buat nama database harus sama 

	$auth_token = "q1w2e3r4t5y6u7i8o9p0";
	// Koneksi dan memilih database di server
	$link = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
	mysqli_select_db($link, $database) or die("Database tidak bisa dibuka");
?>