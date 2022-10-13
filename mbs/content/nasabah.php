<?php
	if(!defined('INDEX')) die("");
?>

<h2 class="judul">Data Nasabah</h2>
<a class="tombol" href="?hal=pegawai-tambah">tambah</a>

<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Rekening</th>
			<th>Nama</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Tabungan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = mysqli_query($con,"SELECT * FROM pegawai LEFT JOIN jns_tab ON pegawai . id_tab=jns_tab . id_tab ORDER BY pegawai . id_pegawai DESC");
		$no = 0;
		while ($data = mysqli_fetch_array($query)) {
			$no++;
		?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $data['nomor_rekening']?></td>
				<td><?= $data['nama_nasabah']?></td>
				<td><?= $data['jenis_kelamin']?></td>
				<td><?= $data['tgl_lahir']?></td>
				<td><?= $data['jenis_tabungan']?></td>
				<td>
					<a class="tombol edit" href="?hal=nasabah_edit&id=<?= $data['id_pegawai']?>">Edit</a>
					<a class="tombol hapus" href="?hal=nasabah_edit&id=<?= $data['id_pegawai']?>">Hapus</a>
				</td>
			</tr>
<?php
	}
?>
	
		
	</tbody>
</table>