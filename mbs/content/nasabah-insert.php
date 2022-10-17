<?php
	include '../library/config.php';

	$nomer_rekening = $_POST['no_rek'];
	$nama_nasabah = $_POST['nama'];
	$jenis_kelamin = $_POST['jk'];
	$tgl_lahir = $_POST['tanggal'];
	$jenis_tabungan = $_POST['jenis_tabungan'];

	/**/
	$sql = "SELECT nama_nasabah FROM nasabah WHERE nomor_rekening = '$nomer_rekening'";
	$query = mysqli_query($con, $sql);

	$jumlah = mysqli_num_rows($query);

	if($jumlah > 0){
		header("location:../index.php?hal=error&errtxt=Ditemukan nasabah dengan nomer rekening yang sama");
	}

	/* insert data */
	$sql = "INSERT INTO nasabah(nama_nasabah, jenis_kelamin, tgl_lahir, id_tabungan, nomor_rekening) 
			VALUES('$nama_nasabah', '$jenis_kelamin', '$tgl_lahir', '$jenis_tabungan', '$nomer_rekening')";
	$query = mysqli_query($con, $sql);

	if($query){
		/* kalau query berhasil*/
		header("location:../index.php?hal=nasabah");
	}
	else{
		/* kalau query gagal/error */
		header("location:../index.php?hal=error&errtxt=".mysqli_error($con));
	}

?>