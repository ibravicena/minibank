<?php
	if (!defined("INDEX")) die("");

	$query = mysqli_query($con,"SELECT * FROM pegawai WHERE id_nasabah = '$GET[id]'");
	$data = mysqli_fetch_array($query);
?>

<h2 class="judul">Tambah Nasabah</h2>
<form method="post" action="?hal=nasabah_updete">
	<input type="hidden" name="id" value="<?= $data['id_nasabah'] ?>">

	<div class="form-group">
		<label for="no_rek">Nomor Rekening</label>
		<div class="input">
			<input type="text" id="no_rek" name="no_rek" value="<?=$data['no_rekening'] ?>">
		</div>
	</div>

	<div class="form-group">
		<label for="jk">Jenis Kelamin</label>
		<?php
			if ($data['jenis_kelamin']=="L") {
			$l = "checked";
			$p = "";
			}else{
			$l = "";
			$p = "checked";
			}
		?>
		<input type="radio" id="jk" name="jk" value="L" <?= $l ?>> Laki-laki
		<input type="radio" id="jk" name="jk" value="P" <?=$p ?>> Perempuan
	</div>

	<div class="form-group">
		<label for="tanggal"> Tanggal </label>
		<div class="input">
			<input type="date" id="tanggal" name="tanggal" value="<?= $data['tgl_lahir'] ?>">
		</div>
	</div>

	<div class="form-group">
		<label for="jns_tab">Jenis Tabungan</label>
		<div class="input">
			<select id="jns_tab" name="jns_tab">
				<option value="">-Pilih Jenis Tabungan-</option>
				<?php
					$queryjns_tab = mysqli_query($con, "SELECT * FROM jns_tab");
					while ($tab = mysqli_fetch_array($queryjns_tab)) {
						echo "<option value='$tab[id_tab]'";
						if ($tab['id_tab']==$data['id_tab']) echo"selected";
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