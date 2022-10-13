<?php
	if (!defined('INDEX')) die("");
?>

<h2 class="judul">Tambah Nasabah</h2>
<form method="post" action="?hal=pegawai-insert">
	
	<div class="form-group">
		<label for="no_rek">Nomor Rekening</label>
		<div class="input"><input type="text" id="no_rek" name="no_rek"></div>
	</div>

	</div>

	<div class="form-group">
		<label for="nama">Nama</label>
		<div class="input"><input type="text" id="nama" name="nama"></div>
	</div>

	<div class="form-group">
		<label for="jk">Jenis Kelamin</label>
		<input type="radio" id="jk" name="jk" value="L">Laki-laki
		<input type="radio" id="jk" name="P">Perempuan
	</div>

	<div class="form-group">
		<label for="tanggal">Tanggal</label>

		<div class="input"><input type="date" id="tanggal" name="tanggal"></div>
	</div>

	<div class="form-group">
		<label for="jenis_tabungan">Jenis Tabungan</label>
		<div class="input">
		<select id="jenis_tabungan" name="jenis_tabungan"><option value="">-Pilih Jenis Tabungan-</option>

<?php
	$queryjns_tab = maysqli_query($con, "SELECT * FROM jns_tab");
	while ($tab = mysqli_fetch_array($queryjns_tab)) {
		echo "<option value='$tab[id_tab]'> $tab[jns_tab]</option>";
	}
?>
		</select>
		</div>
	</div>

	<div class="form-group">
		<input type="submit" value="Simpan" class="tombol simpan">
		<input type="reset" value="Batal" class="tombol reset">
	</div>
</form>