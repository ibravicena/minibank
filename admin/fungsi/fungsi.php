<?php 
$servername = "localhost";
$database = "tabungan_siswa";
$username = "root";
$password = "";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}



//URL-----------------------------------------------------------
function url(){
	return $url = "//localhost/tabungan-siswa-master/";
}

//SUMMON ADMIN
function summon_admin(){
global $koneksi;

$id = $_SESSION['idtabsis'];

return $query = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id = '$id'");


}

// SELECT ADMIN
function select_admin(){
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_admin ORDER BY id DESC");
}
// INSERT ADMIN
function insert_admin(){
	global $koneksi;
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];
	$foto = $_FILES['foto']['name'];

	// cek username

	$tambah = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username'");
	$row = mysqli_fetch_row($tambah);

	if ($row) {
		echo "<div class='alert alert-danger alert-dismissable'>
  			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  			Maaf, username sudah ada.
  			</div>";
	}else{
			if ($foto != "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
   		$nama_file_baru = $angka_acak.'-'.$foto;
   		    if (in_array($ekstensi, $allowed_ext) 	=== true) {
      			move_uploaded_file($file_tmp, 'img/admin/'.$nama_file_baru);
      			$result = mysqli_query($koneksi, "INSERT INTO tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon', foto='$nama_file_baru'");
      			if ($result) {
      			  header("location: index.php?m=admin");
      				}else{
      			  echo "gagal";
      				}
    }



	}
	}


}

// HAPUS ADMIN
function hapus_admin(){
	global $koneksi;
	$id = $_POST['id'];
	$sql   = "SELECT * FROM tb_admin WHERE id='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);

	$foto = $r['foto'];
	//hapus foto
	unlink("img/admin/$foto");
	return mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id = '$id'");
}

// EDIT ADMIN
function update_admin(){
	global $koneksi;

	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$telepon = $_POST['telepon'];
	$foto = $_FILES['foto']['name'];

	// Unlink
	$sql   = "SELECT * FROM tb_admin WHERE id='$id'";
	$hapus = mysqli_query($koneksi,$sql);
	$r     = mysqli_fetch_array($hapus);

	$hapus_foto = $r['foto'];

	// cek username

	$tambah = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username='$username'");
	$row = mysqli_fetch_row($tambah);

	if(isset($_POST['ubahfoto'])){
		
		if ($foto != "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
   		$nama_file_baru = $angka_acak.'-'.$foto;
   		    if (in_array($ekstensi, $allowed_ext) 	=== true) {
      			move_uploaded_file($file_tmp, 'img/admin/'.$nama_file_baru);
      			$result = mysqli_query($koneksi, "UPDATE tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon', foto='$nama_file_baru' WHERE id='$id'");
      			if ($result) {
      			  unlink("img/admin/$hapus_foto");
      				}else{
      			  echo "gagal";
      				}
    }



	}
	}else{
		return mysqli_query($koneksi, "UPDATE tb_admin SET username='$username', password='$password', nama='$nama', telepon='$telepon' WHERE id='$id'");
	}
}

//SELECT SISWA
function select_siswa(){
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_nas ORDER BY id DESC");
	


}

// HAPUS SISWA
function hapus_siswa(){
	global $koneksi;
	$id = $_POST['id'];
	$query = "DELETE FROM tb_nas WHERE id = '$id'";
	return mysqli_query($koneksi, $query);
}

// INSERT SISWA
function insert_siswa(){
	global $koneksi;

	$nama = addslashes($_POST['nama']);
	$jns_tab = $_POST['jns_tab'];
	$alamat = $_POST['alamat'];
	$notlp = $_POST['notlp'];

	$tambah = mysqli_query($koneksi, "SELECT pengendapan FROM tb_jtab WHERE jns_tab='$jns_tab'");

	$key = mysqli_fetch_assoc($tambah);
	$pengendapan = $key['pengendapan'];


	$save = "INSERT INTO tb_nas (nama, jns_tab, pengendapan, alamat, notlp) VALUES ('$nama', '$jns_tab', '$pengendapan', '$alamat', '$notlp')";
    return $query = mysqli_query($koneksi, $save);
 
}

// EDIT SISWA
function edit_siswa(){
	global $koneksi;

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$jns_tab = $_POST['jns_tab'];
	$alamat = $_POST['alamat'];
	$notlp = $_POST['notlp'];

	return mysqli_query($koneksi, "UPDATE tb_nas SET nama='$nama', jns_tab='$jns_tab', alamat='$alamat', notlp='$notlp' WHERE id='$id'");
}
//JUMLAH SISWA
function jumlah_siswa()
{
global $koneksi;
$sql = "SELECT count(id) AS jsiswa FROM tb_nas";
$query = mysqli_query($koneksi, $sql);
$key = mysqli_fetch_assoc($query);
	echo $key['jsiswa'];


}

// SELECT KELAS
function select_kelas(){
	global $koneksi;

	return mysqli_query($koneksi, "SELECT * FROM tb_jtab");
}

function insert_kelas(){
	global $koneksi;

	$jns_tab = $_POST['jns_tab'];
	$pengendapan = $_POST['pengendapan'];

	return mysqli_query($koneksi, "INSERT INTO tb_jtab SET jns_tab = '$jns_tab', pengendapan = '$pengendapan'");
}

function hapus_kelas(){
	global $koneksi;

	$id = $_POST['id'];

	return mysqli_query($koneksi, "DELETE FROM tb_jtab WHERE id='$id'");
}


//EDIT KELAS
function edit_kelas(){
	global $koneksi;
	$id = $_POST['id'];
	$jns_tab = $_POST['jns_tab'];
	$pengendapan = $_POST['pengendapan'];

	return mysqli_query($koneksi, "UPDATE tb_jtab SET jns_tab = '$jns_tab', pengendapan = '$pengendapan' WHERE id='$id'");

}
// select tabungan
function select_tabungan(){
	global $koneksi;
	// return  mysqli_query($koneksi, "SELECT  id_tabungan, id_siswa,
	// 															  setoran,
	// 															  penarikan,
	// 															  saldo,
	// 															  sum(penarikan) as 																		  jumlah_penarikan,
	// 															  sum(setoran) as jumlah_setoran,
																  
	// 															  id,
	// 															  nama,
	// 															  jenis_kelamin,
	// 															  kelas,
	// 															  tempat
																		
	// 															  from 
	// 															  siswa, tb_tabungan
	// 															  where
	// 															  id_siswa = id
	// 															  group by nama ASC");
	return mysqli_query($koneksi, "SELECT id_tran, nama, jns_tab, saldo FROM tb_tran");
}

//insert setoran awal
function insert_setoran_awal(){
	global $koneksi;

	$id = $_POST['no_rek'];
	$nama = $_POST['nama'];
	$jns_tab = $_POST['jns_tab'];
	$tanggal = $_POST['tanggal'];
	$saldo = $_POST['saldo'];


	// Cek apakah id siswa ada
	$tambah = mysqli_query($koneksi, "SELECT * FROM tb_tran WHERE no_rek='$id'");
	$row = mysqli_fetch_row($tambah);

	if ($row) {
		echo "<div class='alert alert-danger alert-dismissable'>
  			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
  			Maaf data dengan nomor rekening".$id." sudah ada.
  			</div>";
	}else{
		 $query =  "UPDATE tb_nas SET saldo = '$saldo' WHERE id = '$id'";
		 mysqli_query($koneksi, $query);

		 $query =  "INSERT INTO tb_tran SET no_rek='$id', nama='$nama',jns_tab='$jns_tab', tanggal='$tanggal', setoran='$saldo', penarikan=0, saldo='$saldo'";
		 mysqli_query($koneksi, $query);
		 header("location: index.php?m=tabungan&s=print&no_rek=$id");
	}


	


}

// insert setoran / tambah setoran
function tambah_setoran(){
	global $koneksi;

	$id_tran = $_POST['id_tran'];
	$id = $_POST['no_rek'];
	$nama = $_POST['nama'];
	$jns_tab = $_POST['jns_tab'];
	$tanggal = $_POST['tanggal'];
	$setoran = $_POST['setoran'];
	$saldo = $_POST['saldo'];
	$saldo_akhir = $saldo + $setoran;
	$query =  "INSERT INTO tb_tran(no_rek, nama, jns_tab, tanggal, setoran, penarikan, saldo) 
						VALUES('$id', '$nama', '$jns_tab', '$tanggal', '$setoran', 0, '$saldo_akhir')";


	$res = mysqli_query($koneksi, $query);
	if(!$res) die(mysqli_error($koneksi).'|'.$query);



	header("location: index.php?m=tabungan&s=print&no_rek=$id");
}
	// // Penambahan saldo
	// $tambah_saldo = $saldo + $setoran;

	// //cek id siswa
	// $tambah = mysqli_query($koneksi, "SELECT * FROM tb_tran WHERE no_rek='$id");
	// $row = mysqli_fetch_row($tambah);

	// if ($row) {
	// 	$query = mysqli_query($koneksi, "UPDATE tb_tran SET  no_rek = '$id', nama='$nama', jns_tab='$jns_tab', tanggal='$tanggal', setoran='$setoran', penarikan=0, saldo='$tambah_saldo' WHERE id_tran='$id_tran'");
	// 	header("location: index.php?m=tabungan&s=print&no_rek=$id");
	// }else{

// 	if ($query) {
		
// 	}else{
// 		echo "gagal";
// 	}
// }

// Penarikan saldo
function penarikan_saldo(){
	global $koneksi;

	$id = $_POST['no_rek'];
	$nama = $_POST['nama'];
	$jns_tab = $_POST['jns_tab'];
	$tanggal = $_POST['tanggal'];
	$penarikan = $_POST['penarikan'];
	$saldo = $_POST['saldo'];
	$pengendapan = $_POST['pengendapan'];
	$saldo_akhir = $saldo - $penarikan;


	$query =  "UPDATE tb_nas SET saldo = '$saldo' WHERE id = '$id'";
		 mysqli_query($koneksi, $query);
	$query =  "INSERT INTO tb_tran(no_rek, nama, jns_tab, tanggal, setoran, penarikan, saldo) 
						VALUES('$id', '$nama', '$jns_tab', '$tanggal', 0, '$penarikan', '$saldo_akhir')";
						
					

	$res = mysqli_query($koneksi, $query);
	if(!$res) die(mysqli_error($koneksi).'|'.$query);

	if ($query) {
		header("location: index.php?m=tabungan&s=print&no_rek=$id");
	}else{
		echo "gagal";
	}
}

// jumlah uang beranda
function jumlah_tabungan(){
	global $koneksi;

	return mysqli_query($koneksi, "SELECT count(id_tran) AS jtab, count(no_rek) AS jsiswa, sum(setoran) AS jsetoran, sum(penarikan) AS jpenarikan, sum(saldo) AS jsaldo FROM tb_tran");

	

}

// Delete Tabungan
function hapus_tabungan(){
	global $koneksi;

	$id_tabungan = $_POST['id_tran'];

	return mysqli_query($koneksi, "DELETE FROM tb_tran WHERE id_tran = '$id_tabungan'");
}



// select print
function select_print_siswa(){
  global $koneksi;

  $id = $_GET['no_rek'];

  return mysqli_query($koneksi, "SELECT * FROM tb_nas where id = '$id' ");
}

function select_print_tabungan(){
  global $koneksi;

  $id = $_GET['no_rek'];

  return mysqli_query($koneksi, "SELECT * FROM tb_tran where no_rek = '$id' ORDER BY id_tran DESC LIMIT 1
 ");
}

// function rupiah 

function rupiah($angka){
	$hasil = "Rp. ". number_format($angka,2,',','.');
	return $hasil;
}

 ?>