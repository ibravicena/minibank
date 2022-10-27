<?php 
require 'fungsi/fungsi.php';
foreach (summon_admin() as $adm): 

  date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("Y-m-d");

  if (isset($_POST['simpan'])) {
  	insert_setoran_awal();
  }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Setoran Awal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="vendors/img/logo.png">
<link rel="stylesheet" href="<?= url() ?>vendors/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?= url() ?>vendors/css/bootstrap.min.css">

  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
       <div class="collapse navbar-collapse" id="myNavbar">
   <ul class="nav navbar-nav">
        <li><a href="index.php?m=awal">Dashboard</a></li>

        <li><a href="index.php?m=siswa&s=awal">Customer Service</a></li>
        <li><a href="index.php?m=kelas&s=awal">Jenis Tabungan</a></li>
        <li class="active"><a href="index.php?m=tabungan&s=awal">Transaksi</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">

        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               <img src="img/admin/<?= $adm['foto'];?>" height="50"> </i> <?php echo $adm['nama']; ?>
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li>
                 <a href="index.php?m=admin&s=profil"><i class="fa fa-user"></i> Profil</a>
                    
                
                </li><br>
                <li>
                  <a href="logout.php" onclick="return confirm('yakin ingin logout?');"> <i class="fa fa-sign-out"></i> Logout</a>
                 
                  
                </li>
              </ul>
            </li>
          </ul>
      </nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="index.php?m=awal"><i class="fa fa-diamond" aria-hidden="true"></i>
Dashboard</a></li>

        <li><a href="index.php?m=siswa&s=awal"><i class="fa fa-users" aria-hidden="true"></i>
Customer Service</a></li>
        <li><a href="index.php?m=kelas&s=awal"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
Jenis Tabungan</a></li>
        <li class="active"><a href="index.php?m=tabungan&s=awal"><i class="fa fa-book" aria-hidden="true"></i>

Transaksi</a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <!-- Button trigger modal -->
 


       <div class="row">
        <div class="col-sm-12">
          <div class="well">
          	<form action="" method="POST">
          	   <div class="form-group">
            	
            	<input type="hidden" name="id_tabungan">
            </div>
              <div class="form-group">
            	<label>Nomor Rekening</label>
            	<input type="text" id="id_siswa" class="form-control" name="id_siswa" readonly><span class="input-group-btn">
				<button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#modal">Cari Nomor Rekening</button>
				</span>
            </div>
              <div class="form-group">
            	<label>Nama Nasabah</label>
            	<input type="text" class="form-control" id="nama" name="nama" readonly>
            </div>
             <div class="form-group">
            	<label>Jenis Tabungan</label>
            	<input type="text" class="form-control" id="kelas" name="kelas" readonly>
            </div>
            <div class="form-group">
            	<label>Tanggal</label>
            	<input type="text" name="tanggal" value="<?= $tanggalSekarang;?>" readonly class="form-control">
            </div>


            <div class="form-group">
            	<label>Setoran Awal</label>
            	<input type="number" class="form-control" required="" name="saldo">
            </div>

            <div class="form-group">
            	<button class="btn btn-success" name="simpan">Simpan</button>
            	<button class="btn btn-danger">Batal</button>
            </div>
                          </form>           
                        </div>
                       

          </div>
           
        </div>

      </div> 


    </div>
  </div>
</div>

<!-- modal -->
	<div id="modal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form role="form" id="form-tambah" method="post" action="input.php">
				<div class="modal-header">
					<center>
					<h3 class="modal-title">Pilih Nasabah</h3>
					</center>
				</div>
					<div class="modal-body">
						
						
						
						
							<table width="100%" class="table table-hover"  id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Tabungan</th>
                                        <!--<th>Jenis Kelamin</th>
                                        <th>Tempat</th>
                                        <th>Alamat</th>-->
                                    </tr>
                                </thead>
                                <tbody>
										<?php
											$no = 1;
											$data = mysqli_query ($koneksi, " SELECT  *
																					  from 
																					  tb_nas
																					  order by id ASC");
											foreach ($data as $sa):
												
											
										?>
									<tr id="tb_nas" data-id_siswa="<?php echo $sa['id']; ?>" data-nama="<?php echo $sa['nama']; ?>" data-kelas="<?= $sa['jns_tab']; ?>">
										<td>
											<?php echo $no++; ?>
										</td>
										<td>
											<?php echo $sa['nama']; ?>
										</td>
										<td>
											<?php echo $sa['jns_tab']; ?>
										</td>
										
									</tr>
									<?php
										endforeach;
									?>
                            </table>
						
						
					</div>	
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					</div>
	
	



<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <p class="text-muted" style="font-size: 16px;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> SMK-BP Subulul Huda</p>

</footer>
  <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
  <script src="<?= url() ?>vendors/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      
      $(document).on('click', '#tb_nas', function (e) {
        document.getElementById("no_rek").value = $(this).attr('data-no_rek');
        document.getElementById("nama").value = $(this).attr('data-nama');
        document.getElementById("jns_tab").value = $(this).attr('data-jns_tab');
        $('#modal').modal('hide');
      }); 
      
    });
    </script>
   </body>
</html>
<?php endforeach; ?>
