<?php 
// konfigurasi database
	$host = "localhost";
	$user ="root";
	$pas  ="";
	$db   ="mbs";

// membuat koneksi ke database dengan konfigurasi di atas
	$con = mysqli_connect($host,$user,$pas,$db);
// mencoba koneksi dengan if
	if (mysqli_connect_errno()) {
		echo "Koneksi gagal". mysqli_connect_error();
	}

 ?>