<head>
	<style>
		.col-md-4{
			margin-top: 20px;
		}
	</style>
</head>
<div class="container">
	Dashboard
	<div class="row">
		<div class="col-md-4">
			<div class="card bg-info text-white">
				<?php 
				$sql = $con->query('SELECT*FROM pemesanan');
				$jumlah_barang = mysqli_num_rows($sql);
				 ?>
			<div class="card-body text-center">
				<h6>PEMESANAN</h6>
				<h1><?php echo $jumlah_barang; ?></h1>
				<i>DATA</i>
			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-info text-white">
				<?php 
				$sql = $con->query('SELECT*FROM tb_kamar');
				$jumlah_barang = mysqli_num_rows($sql);
				 ?>
			<div class="card-body text-center">
				<h6>KAMAR</h6>
				<h1><?php echo $jumlah_barang; ?></h1>
				<i>DATA</i>
			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-info text-white">
				<?php 
				$sql = $con->query('SELECT*FROM fasilitas_hotel');
				$jumlah_barang = mysqli_num_rows($sql);
				 ?>
			<div class="card-body text-center">
				<h6>PEMESANAN</h6>
				<h1><?php echo $jumlah_barang; ?></h1>
				<i>DATA</i>
			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-info text-white">
				<?php 
				$sql = $con->query('SELECT*FROM gambar_fasilitas');
				$jumlah_barang = mysqli_num_rows($sql);
				 ?>
			<div class="card-body text-center">
				<h6>FASILITAS KAMAR</h6>
				<h1><?php echo $jumlah_barang; ?></h1>
				<i>DATA</i>
			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-info text-white">
				<?php 
				$sql = $con->query('SELECT*FROM tipe_kamar');
				$jumlah_barang = mysqli_num_rows($sql);
				 ?>
			<div class="card-body text-center">
				<h6>TIPE KAMAR</h6>
				<h1><?php echo $jumlah_barang; ?></h1>
				<i>DATA</i>
			</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card bg-info text-white text-center">
				<?php 
				$sql = $con->query('SELECT*FROM login_user');
				$jumlah_barang = mysqli_num_rows($sql);
				 ?>
				 <h6>AKUN TERDAFTAR</h6>
				 <h5><?php echo $jumlah_barang; ?></h5>
			</div>
			<div class="card bg-info text-white text-center mt-4">
				<?php 
				$sql = $con->query('SELECT*FROM login_pekerja');
				$jumlah_barang = mysqli_num_rows($sql);
				 ?>
				  <h6>AKUN PEKERJA</h6>
				 <h5><?php echo $jumlah_barang; ?></h5>
			</div>
			
		</div>
	</div>
</div>