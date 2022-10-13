<?php
	if(!defined('INDEX')) die("");
	$query = mysqli_query($con, "DELETE FROM pegawai WHERE id_nasabah='$_GET[id]'");
	if ($query) {
		echo "Data berhasil dihapus!";
		echo "meta http-equiv='refresh' content='1;url=?hal=nasabah'>";
	}else{
		echo "Tidak dapat menghapus data!";
		echo mysqli_error();
	}
?>