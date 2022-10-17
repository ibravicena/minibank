<?php
	if(!defined('INDEX')) die("");
?>

<h2 class="judul">Data Nasabah</h2>
<a class="tombol" href="?hal=nasabah-tambah">tambah</a>

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
		$sql = "SELECT * 
				FROM nasabah nas
				LEFT JOIN tabungan tab ON tab.id_tabungan = nas.id_tabungan 
				ORDER BY nas.nama_nasabah";
		$query = mysqli_query($con, $sql);

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
				<td><?= $data['jns_tabungan']?></td>
				<td>
					<a class="tombol edit" href="?hal=nasabah-edit&id=<?= $data['id_nasabah']?>">Edit</a>
					<a class="tombol hapus" href="?hal=nasabah_hapus&id=<?= $data['id_nasabah']?>">Hapus</a>
				</td>
			</tr>
<?php
	}
?>
	
		
	</tbody>
</table>