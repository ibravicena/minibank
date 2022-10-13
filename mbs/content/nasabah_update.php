<?php
if(!defined('INDEX')) die("");

$error = "";
$query = mysqli_query($con, "UPDATE pegawai SET
	nomor_rekening = '$_POST[no_rek]',
	nama_nasabah = '$_POST[nama]',
	jenis_kelamin = '$_POST[jk]',
	tgl_lahir = '$_POST[tanggal]',
	id_tab = '$_POST[jenis_tabungan]'
	WHERE id_nasabah='$_POST[id]'");

$query=mysqli_query($con, "SELECT * FROM pegawai WHERE id_nasabah='$_POST[id]'");
$data=mysqli_fetch_array($query);
$query = mysqli_query($con, "UPDATE pegawai SET
	nomor_rekening ='$_POST[no_rekening]',
	nama_nasabah = '$_POST[nama]',
	jenis_kelamin = '$_POST[jk]',
	id_tab = '$_POST[id]'");
if ($error ! = "") {
	echo $error;
	echo "<meta http-equiv='refresh' content='2;url=?hal=nasabah_edit&id$_POST[id]'>";
}elseif ($query) {
	echo "Data berhasil disimpan!";
	echo "<meta http-equiv='refresh' content='1;url=?hal=nasabah'>";
}else{
	echo "Tidak dapat menyimpan data!<br>";
	echo mysqli_error();
}
?>

 