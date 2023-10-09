 <style>
 	#navbar{
 		background-color: black !important;
 	}
 	.fa-calendar-check{
 		font-size: 200px;
 	}
 	table td,th{
 		padding: 2px !important;
 	}
 	.chek{
 		color: green;
 	}
 	.mangtap h4{
 		font-weight: bold;
 	}
 	.mangtap{
 		/*border: 1px dotted black;*/
 		box-shadow:  0 10px 34px -15px rgb(0 0 0 / 24%);
 	}
/* 	.mangtap td{
 		padding: 10px !important;
 	}*/
 </style>
<div class="container">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="row mangtap p-5 bg-light">
		<div class="col-xl-3 text-center">
			<i class="fa fa-regular fa-calendar-check text-primary"></i>
		</div>
		<div class="col-xl-8 m-auto">
			<?php
				$userk = $_GET['users'];
				$iduser = $_SESSION['id_user'];
				$sql = $con->query("SELECT*FROM pemesanan WHERE id_user='$userk' ORDER BY id_pesanan DESC");
				$tampil = $sql->fetch_array();
				$kamar = $tampil['id_kamar'];
				$ssql = $con->query("SELECT*FROM tb_kamar WHERE id_kamar = '$kamar'");
				$kts = $ssql->fetch_array();
			?>
				<h4>Pemesanan Berhasil  <i class="chek fa-regular fa-circle-check"></i></h4>
				<p>Silahkan menuju menu <a href="?page=profile&profi=<?=$iduser?>">profile</a> untuk melakukan proses selanjutnya atau mencetak bukti pemesanan</p>
			<table class="" style="">
		    <tbody>
		      <tr>
		        <th>No Pesanan</th><td style="font-weight: bold;">:  <?=$tampil['id_pesanan']?></td>
		      </tr>
		      <tr>
				<th>Nama Pemesan</th><td>:  <?=$tampil['nama_pemesan']?></td>
			  </tr>
		      <tr>
				<th>Nama Kamar</th><td>:  <?=$kts['nama_kamar']?></td>
			  </tr>
			  <tr>
				<th>Tipe Kamar</th><td>:  <?=$kts['tipe_kamar']?></td>
			  </tr>
			  <tr>
				<th>Jam Pemesanan</th><td>:  <?=$tampil['Jam_pesan']?></td>
		      </tr>
		    </tbody>
		  </table>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>