<?php 
   session_start();
 include '../lib/koneksi.php';
  if (!isset($_SESSION['user'])) {
    include 'login/login.php';
  }else{
    $user = $_SESSION['user'];
    $nama = $_SESSION['nama'];
    $level = $_SESSION['level'];
    // $sql = $con->query("SELECT*FROM petugas WHERE username='$user'");
    // $tampil =$sql->fetch_array();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ELBRIA ADMIN</title>
</head>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <script type="text/javascript" src="fontawesome/js/all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto+Serif:ital,wght@1,200&display=swap" rel="stylesheet">
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<style>
  *{
    padding: 0;
    margin: 0;
    font-family: 'Roboto Condensed', sans-serif;
  }
  .sidebar li{
    border-bottom: 1px solid grey;
    padding: 10px 0 10px 0;
  }
  .sidebar li a{
    color: white;
    transition: 0.6s;
  }
  .sidebar li a:hover{
    color: black;
    background-color: #f8f9fa;
  }
  .navbar-brand{
    /*margin: 10px 0 0 0;*/
    padding: 0px 14px;
    margin: 10px 0 0 0;
  }
  .navbar-brand p{
    font-size: 17px;
    text-transform: uppercase;
    color: #D7AF4D;
  }
  .navbar-brand i{
    position: relative;
    top: -24px;
    font-size: 15px;
  }
  .as{
    color: #D7AF4D;
  }
</style>
<body>
  <div class="row" style="width: 100%; margin: auto;">
  <div class="col-md-2 bg-dark p-0" style="min-height: 635px;">
  <nav class="bg-dark navbar-dark sidebar">
  <!-- Brand -->
  <br>
  <center><div class="navbar-brand m-auto" href="#">
    <img src="../gambar/logsn.svg" class="img-fluid" style="width: 70px;">
    <p>ELBRIA HOTEL</p>
    <p><?php echo $level?></p>
  </div></center>
  <!-- Navbar links -->
    <ul class="nav flex-column" style="">
<?php 
  if ($_SESSION['level']=='admin') {
?>
<li class="nav-item">
        <a class="nav-link" href="?page=beranda"><i class="fa-solid as fa-house"></i>&nbsp;&nbsp;Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=fasilitas-hotel"><i class="fa-solid as fa-hotel"></i>&nbsp;&nbsp;Fasilitas Hotel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=gf-kamar"><i class="fa-solid as fa-archway"></i>&nbsp;&nbsp;Fasilitas Kamar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=kamar"><i class="fa-solid as fa-bed"></i>&nbsp;&nbsp;Kamar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=reservasi"><i class="fa-solid as fa-check-to-slot"></i>&nbsp;&nbsp;Reservasi</a>
      </li>
      <li class="nav-item"> 
      <a class="nav-link" href="?page=tipe-kamar"><i class="fa-solid as fa-list"></i>&nbsp;&nbsp;Tipe Kamar</a>
    </li>
<?php
  }elseif ($_SESSION['level']=='resepsionis') {
?>    
      <li class="nav-item">
        <a class="nav-link" href="?page=beranda"><i class="fa-solid as fa-house"></i>&nbsp;&nbsp;Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?page=reservasi"><i class="fa-solid as fa-check-to-slot"></i>&nbsp;&nbsp;Reservasi</a>
      </li>
<?php
  }
 ?>
    </ul>
  </div>
</nav>
	<!-- <nav class="navbar navbar-expand-md bg-dark navbar-dark"> -->
<div class="col-md-10 p-0">
  <nav class="navbar justify-content-end bg-light navbar-expand-sm" style="box-shadow:  0 10px 34px -15px rgb(0 0 0 / 24%);">
   <ul class="navbar-nav">
    <li class="nav-item aep dropdown">
    <a class="nav-link" style="font-size: 17px;" data-toggle="dropdown" href="#"><button class="btn btn-danger"><img class="mr-2" src="../gambar/logsn.svg" style="max-width: 30px;"> <?php echo $nama; ?></button></a>
    <div class="dropdown-menu bg-light p-4">
     <a class="nav-link text-dark" style=""><?php echo $level;?></a>
     <a class="nav-link text-dark" href="login/logout.php" style=""><i class="fa-solid fa-right-from-bracket"></i> Log Out</a>
    </div>
  </li>
    <li class="nav-item">
      
    </li>
  </ul>
</nav>
<br>
		<div class="row" style="max-width: 100%; margin: auto; padding: 5px 10px">
			<?php
    if(isset($_GET['page'])) {
      switch ($page=$_GET['page']) {
        case 'fasilitas-hotel':
          include 'modul/fasilitas-hotel.php';
          break;
        case 'tipe-kamar':
          include 'modul/tipekamar.php';
          break;
        case 'gf-kamar':
          include 'modul/gambarfasilitaskamar.php';
          break;
        case 'kamar':
          include 'modul/kamar.php';
          break;
        case 'reservasi':
          include 'modul/reservasi.php';
          break;
        case 'beranda':
          include 'modul/beranda.php';
          break;
        case 'bayar':
          include 'modul/bayar.php';
          break;         
        default:
          include 'modul/beranda.php';
          break;
      }
    }else{
      include 'modul/beranda.php';
    }
			?>
	</div>
    </div> 
</body>
</html>
<?php } ?>
