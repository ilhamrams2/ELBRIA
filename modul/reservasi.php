<?php 
   session_start();
  if (!isset($_SESSION['id_akun'])) {
    include 'login/login.php';
  }else{
    $id_akun = $_SESSION['id_akun'];
    $nama = $_SESSION['nama_user'];
    $iduser = $_SESSION['id_user'];
    // $sql = $con->query("SELECT*FROM petugas WHERE username='$user'");
    // $tampil =$sql->fetch_array();
 ?>
 <?php 
 	$idkamar = $_GET['id_kamar'];
 	$reser = $con->query("SELECT*FROM tb_kamar WHERE id_kamar = '$idkamar'");
 	$tampil = $reser->fetch_array();
 	$b = $tampil['jumlah_kamar'];
  ?>
<style>
	#navbar{
		background-color: black !important;
	}
	.cars li{
	display: inline-block;
	font-size: 20px;
	color: white;
	}
	.cars li a{
	padding: 5px 5px;
	}
	.cars li a:hover{
	background-color: black;
	  }
	 .form-control{
	 	border-radius: 0px;
	 }
</style>
<br>
<br>
<br>
<body>
<div class="container" style="position: relative; padding: 10px;">
 	<div class="row" style="position: relative;">
 		<div class="col-md-5 ml-auto" style="/*box-shadow: rgb(3 18 26 / 20%) 0px 1px 2px;*/ padding-top: 10px; padding-bottom: 20px; overflow: hidden;">
 		<div class="col-md-12 bg-warning" style=" height: 250px; position: absolute; bottom: 16px; left: 0;"></div>
 		<div class="col-md-12" style="">
 		<div class="card" style="min-height: 450px; background: url(gambar/<?=$tampil['gambar_kamar']?>); background-size: cover; background-repeat: no-repeat; background-position: center; overflow: hidden;">
 			<div class="cars" style="width: 100%; min-height: 450px; background-color: rgba(1,1,1,.8); position: absolute; top: 261px; padding: 12px;">			
 			<h4 style="font-weight: bold; color: white; text-transform: uppercase;"><?=$tampil['nama_kamar']?></h4>
 			<span class="badge badge-warning" style="font-size: 16px;"><?=$tampil["tipe_kamar"];?></span>
			<h6 class="text-white mt-2" style="font-size: 12px;"><?=$tampil['desk_singkat']?></h6>
			<h6 class="text-white mt-2" style="font-size: 12px;">Rp.<?=number_format($tampil['harga_kamar'],0,".",".")?></h6>
			<nav class="navbar navbar-expand">
			<ul class="navbar-nav m-auto" style="">
				<?=$tampil['desk_kamar']?>
				 Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</ul>
			</nav>
			</div>
 		</div>
 		
 		
			
		</div>
		</div>
		<div class="col-md-5 col-12 m-auto" style="/*box-shadow: rgb(3 18 26 / 20%) 0px 1px 2px;*/ padding-top: 10px; padding-bottom: 20px;">
			<form action="" method="POST">
			 <div class="row">
				    <select name="id_user" class="form-control" hidden>
				    	<?php 
				    	$sss = $con->query("SELECT*FROM login_user WHERE nama_user='$nama'");
				    	while ($ts = $sss->fetch_array()) {
				    	?>
				    	<option value="<?=$ts['id_user']?>"><?=$ts['nama_user']?></option>
				    	<?php
				    	}
				    	 ?>
					</select>
			 	<div class="col-md-12 p-1">
				  <div class="form-group">
				    <label for="email">Nama Kamar</label>
				    <select name="id_kamar" class="form-control">
				    	<?php 
				    		$kamars = $con->query("SELECT*FROM tb_kamar WHERE id_kamar = '$idkamar'");
				    		while ($nam = $kamars->fetch_array()) {
				    	?>
				    		<option value="<?=$nam['id_kamar']?>"><?=$nam['nama_kamar']?></option>
				    	<?php
				    		}
				    	 ?>
					</select>
				  </div>
				  </div>
				  <div class="col-md-6 p-1">
				   <div class="form-group">
				    <label for="email">Tipe Kamar</label>
				    <select name="tipe" class="form-control" >
						<option value="<?=$tampil['tipe_kamar']?>"><?=$tampil['tipe_kamar']?></option>
					</select>
				  </div>
				  </div>
				  <div class="col-md-6 p-1">
				  	<div class="form-group">
				   	<label for="email">Nama Pemesan</label>
				   	<input type="text" name="namauser" value="<?=$nama?>" class="form-control">
				  </div>
				  </div>
				  <div class="col-md-12 p-1">
				  <div class="form-group">
				    <label for="email">Alamat Email</label>
				    <input type="email" class="form-control"  name="email" placeholder="email">
				  </div>
				  </div>
				  <div class="col-md-6 p-1">
				  <div class="form-group">
				    <label for="email">Nama Tamu</label>
				    <input type="text" class="form-control" name="namatamu" placeholder="nama tamu">
				  </div>
				  </div>
				  <div class="col-md-6 p-1">
				  <div class="form-group">
				    <label for="email">No Handphone</label>
				    <input type="number" class="form-control"  name="nohp" placeholder="nomer hp">
				  </div>
				  </div>
				  <div class="col-md-4 p-1">
				  <div class="form-group">
				    <label for="email">Tanggal Chek-in</label>
				    <input type="date" class="form-control" name="msk" placeholder="chek-in">
				  </div>
				  </div>
				  <div class="col-md-4 p-1">
				  <div class="form-group">
				    <label for="email">Tanggal Chek-out</label>
				    <input type="date" class="form-control" type="date" name="keluar" placeholder="chek-out">
				  </div>
				  </div>
				  <div class="col-md-4 p-1">
				  <div class="form-group">
				    <label for="email">Jumlah Kamar</label>
				    <select type="number" class="form-control" name="jumlah" placeholder="jumlah kamar">
				    	<?php
				    		$no = 0;
				    		$kamars = $con->query("SELECT*FROM tb_kamar WHERE id_kamar = '$idkamar'");
				    		$nam = $kamars->fetch_array();
				    		$jmlh = $con->query("SELECT*FROM pemesanan WHERE id_kamar = '$idkamar'");
				    		$total = 0;
				    		while ($nams = $jmlh->fetch_array()) {
				    			$total += $nams['jumlah_kamar'];
				    		}
				    		$c = $nam['jumlah_kamar'];
				    		$x = $c - $total;
				    		for ($i=1; $i <= $x; $i++) { 
				    			$no = $no+1;
				    		?>
				    		<option><?=$no?></option>
				    		<?php
				    		}
				    		?>
				    </select>
				  </div>
				  </div>
				  <div class="col-md-4">
				  <button type="submit" class="btn btn-primary m-auto" name="btn">Submit</button>
				  </div>
			<?php 
			if (isset($_POST['btn'])) {
				// echo $_POST['id_user'], "<br>";
				// echo $_POST['id_kamar'], "<br>";
				// echo $_POST['namauser'], "<br>";
				// echo $_POST['namatamu'], "<br>";
				// echo $_POST['email'], "<br>";
				// echo $_POST['nohp'], "<br>";
				// echo $_POST['tipe'], "<br>";
				// echo $_POST['msk'], "<br>";
				// echo $_POST['keluar'], "<br>";
				// echo $_POST['jumlah'], "<br>";
				date_default_timezone_set('Asia/Jakarta');
				$time = date("G:i:s");
				$booking = $con->query("INSERT INTO pemesanan VALUES('','$_POST[id_user]','$_POST[id_kamar]','$_POST[namauser]','$_POST[namatamu]','$_POST[email]','$_POST[nohp]','$_POST[tipe]','$_POST[msk]','$_POST[keluar]','$_POST[jumlah]','$time')");
				if ($booking) {
					echo "<script>document.location.href='?page=sukses&users=$iduser';</script>";
				}else{
					echo "pendaftaran gagal";
				}
			}
			 ?>
			 </div>
			</form>
		</div>
	</div>
</div>
<br>
<br>
<br>
</body>
 <?php } ?>