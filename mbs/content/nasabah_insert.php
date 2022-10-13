<?php
	if (!defined('INDEX')) die("");

	$error="";
	$query = mysqli_query($con, "INSERT INTO pegawai SET
		nomor_rekening = '$_POST[no_rek]',
		jenis_kelamin = '$_POST[jk]',
		nama_nasabah = '$_POST[nama]',
		tgl_lahir = '$_POST[tanggal]',
		id_tab = '$_POST[jenis_tabungan]'
		");
	if ($error !="") {
		echo $error;
		echo "<meta http-equiv='refresh' content='2;url=?hal=nasabah_tambah'>";
	}else{
		echo "Tidak dapat menyimpan data!<br>";
		echo mysql_error();
	}
?>