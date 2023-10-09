<head>
	<style>
	</style>
</head>
<?php 
$idp = $_GET['idp'];
$sql = $con->query("SELECT*FROM pemesanan WHERE id_pesanan='$idp'");
$tampil = $sql->fetch_array();
$user = $tampil['id_user'];
$kamar = $tampil['id_kamar']; 
?>
<div class="container">
	<?php 
		$sqll = $con->query("SELECT*FROM login_user WHERE id_user='$user'");
		$sqq = $con->query("SELECT*FROM tb_kamar WHERE id_kamar='$kamar'");
		$namauser = $sqll->fetch_array();
		$idkamar = $sqq->fetch_array();
	 ?>
	<div class="row">
		<div class="col-md-4 text-left">
			<h6>Invoice Pemabayaran Hotel :</h6>
			<h2 style="text-transform: capitalize;"><?=$namauser['nama_user']?></h2>
			<h6><?=$tampil['email']?></h6>
			<i><?=$tampil['no_hp']?></i>
		</div>
		<div class="col-md-4 text-center">
			<img src="gambar/logsn.svg" style="width: 80px;">
			<h6 style="margin-top: 10px; font-weight: bold;">ELBRIA</h6>
		</div>
		<div class="col-md-4 text-right">
			<h1><?=$tampil['id_pesanan']?></h1>
			<h6>Chek-In <?=$tampil['tgl_masuk']?></h6>
			<h6>Chek-Out <?=$tampil['tgl_keluar']?></h6>
		</div>
	</div>
	<br>
	<div class="row">
		<table class="table text-center">
			<tr>
				<th colspan="2">Deskripsi</th>
				<th>Harga</th>
				<th>Jumlah Kamar</th>
				<th>Malam</th>
				<th>Total</th>
			</tr>
			<tr>
				<td>Kamar <?=$idkamar['nama_kamar']?></td>
				<td>Tipe <?=$idkamar['tipe_kamar']?></td>
				<td>Rp.<?=number_format($idkamar['harga_kamar'],0,".",".")?></td>
				<td><?=$tampil['jumlah_kamar']?></td>
				<td>
					<?php 
					date_default_timezone_set('Asia/Jakarta');
					$a = $tampil['tgl_keluar'];
					$b = $tampil['tgl_masuk'];
					$timestamp = strtotime($a);
					$timestamps = strtotime($b); 
					$msk = idate('d', $timestamp);
					$kluar = idate('d', $timestamps);
					$malam = $msk - $kluar;
					echo $malam , " Malam";
					?>
				</td>
				<td>
					<?php 
					$a = $tampil['jumlah_kamar'];
					$b = $idkamar['harga_kamar'];
					$c = $a * $b * $malam;
					echo "Rp." , number_format($c,0,".",".");
					 ?>
				</td>
			</tr>
		</table>
	</div>
	<br>
	<center><a class="text-white" style="font-weight: bold;" href="../fpdf/buktireservasi.php?isd=<?=$tampil['id_pesanan']?>" onclick="myFunction()"><button class="btn btn-warning" style="font-size: 19px; padding: 5px 10px;">CETAK PEMBAYARAN</button></a></center>
	<script>
		function myFunction() {
          alert("Pemabayaran Berhasil");
        }
	</script>
</div>
<a href="fpdf/buktireservasi.php?isd=<?=$tampil['id_pesanan']?>"></a>
