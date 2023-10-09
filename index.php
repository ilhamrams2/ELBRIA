<?php
  include 'lib/koneksi.php'; 
	session_start();
  if (isset($_SESSION['nama_user'])) {
    $nama = $_SESSION['nama_user'];
    $iduser = $_SESSION['id_user'];
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ELBRIA HOTEL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin/fontawesome/css/all.min.css">
  <script type="text/javascript" src="admin/fontawesome/js/all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="admin/fontawesome/css/all.min.css">
<script type="text/javascript" src="admin/fontawesome/js/all.min.js"></script>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/stylef.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto+Serif:ital,wght@1,200&display=swap" rel="stylesheet">
  <script type="text/javascript">
    $(window).on("scroll", function(){
      if($(window).scrollTop() > 2){
        document.getElementById("navbar").style.backgroundColor = "black";
        
      } else {
        document.getElementById("navbar").style.backgroundColor = "transparent";
      }
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  <style>
 .carousel-inner img {
    width: 100%;
    max-height: 567px;
  }
/*  	.navbar-nav li a{
  		color: white;
  		padding: 5px;
  		transition: 0.6s;
  	}
  	.one li a:hover{
  		color: black;
  		background-color: white;/*.nav-item
  	}*/
/*    .ae{
      color: #ffc107;
      border: 1px solid #ffc107;
    }
    .ae .nav-link{
      color: #ffc107;
    }
    .ae a{
      color: #ffc107;
    }*/
  </style>
</head>
<body>
<nav class="navbar navbar-expand-md justify-content-center p-1 fixed-top" id="navbar" style="background-color: transparent;">
	<div class="container">
  <a class="navbar-brand" href="#" style="color: white;">
  	<!-- <img src="gambar/logg.svg" class="img-fluid" style="max-width: 80px;"> -->
  	<img src="gambar/logsn.svg" class="img-fluid" style="max-width: 90px;">ELBRIA HOTEL
  </a>
  <button class="navbar-toggler bg-warning" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav one m-auto p-2">
    	<li class="nav-item">
        <a class="nav-link text-white" href="?page=beranda">Beranda</a>
      </li>
       <li class="nav-item">
        <a class="nav-link text-white" href="#about">Tentang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="?page=fasilitas">Fasilitas</a>
      </li>
       <li class="nav-item">
        <a class="nav-link text-white" href="?page=kamar">Kamar</a>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" style="">Tipe</a>
      <div class="dropdown-menu bg-dark p-3">
      <?php 
        $sql = $con->query("SELECT*FROM tipe_kamar");
        while ($tampil = $sql->fetch_array()) {
          echo "
          <a class='dropdown-item text-white' href='?url=$tampil[tipe_kamar]' style='color:white; font-size: 16px;'>$tampil[tipe_kamar]</a>";
            }    
       ?>
    </div>
  </li>
    </ul>

<ul class="navbar-nav">
<?php 
	if(!isset($_SESSION['nama_user'])){
 ?>
		<li class="nav-item mr-2">
        <a href="?page=login&regis=regis-akun"><button type="button" class="btn btn-outline-warning">DAFTAR</button></a>
      </li>
       <li class="nav-item">
        <a href="?page=login"><button type="button" class="btn btn-outline-warning">MASUK</button></a>
    </li> 
    <?php } else{
    	?>
    <li class="nav-item dropdown ae" style="">
    <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" style="text-transform: uppercase;"><?php echo $nama; ?></a>
    <div class="dropdown-menu bg-dark p-3">
      <a class="dropdown-item text-white" href="?page=profile&profi=<?=$iduser?>">Pemesanan</a>
      <a class="dropdown-item text-white" href="login/logout.php">Log-out</a>
    </div>
  </li>
  </ul>
    <?php }?> 
  </div> 
  </div> 
</nav>
	<?php
  if(isset($_GET['page'])){
		switch ($page=$_GET['page']) {
			case 'regis':
				 include 'login/register.php';
				break;
			case 'login':
				 include 'login/login.php';
				break;
      case 'profil':
         include 'modul/profil.php';
        break;
			case 'beranda':
				 include 'modul/beranda.php';
				break;
			
		}
  }
  if (isset($_GET['page'])) { 
    if ($_GET['page'] == 'detail') {
        include 'modul/detail.php';
    }elseif($_GET['page'] =='reservasi'){
        include 'modul/reservasi.php';
    }elseif($_GET['page'] =='sukses'){
        include 'modul/sukses.php';
    }elseif($_GET['page'] =='profile'){
        include 'modul/profile.php';
    }elseif ($_GET['page'] =='bayar') {
         include 'modul/bayar.php';
    }elseif ($_GET['page'] =='fasilitas') {
        include 'modul/fasilitas-hotel.php';
    }elseif ($_GET['page'] =='kamar') {
        include 'modul/kamar.php';
    }

  }elseif (isset($_GET['url'])) {
      $sqm =$con->query("SELECT*FROM tipe_kamar");
      $vm = $sqm->fetch_array();
      if ($vm['tipe_kamar']) {
        include 'modul/tipekamar.php';
      }
  }else{
    include'modul/beranda.php';
  }
	?>
  <?php include 'modul/footer.php'; ?>
</body>
</html>