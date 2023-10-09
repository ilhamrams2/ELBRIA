<head>
  <style>
    .container-kamar .col-xl-3{
      padding: 7px;
    }
    .fasilitas .card{
      border: none;
    }
    .card{
      border-radius: 0px;
    }
    html{
      scroll-behavior: smooth;
    }
  </style>
</head>
<div class="landing-page" style="background: linear-gradient(to bottom,rgba(22,22,22,.3) 0,rgba(22,22,22,.7) 75%,#161616 100%), url(gambar/crausel2.jpg); color: white; background-attachment: fixed; background-repeat: no-repeat; background-position: center; background-size: cover;">
	<div class="container sayang">
		<div class="row header">
			<div class="col-md-7">
				<h1>PENGINAPAN MUDAH DI TANGAN MU</h1>
				<p>Kemudahan dalam menemukan tipe kamar yang kamu inginkan, fasilitas yang lengkap, dan harga yang terjangkau tapi tetap berqualitas</p>
				<button class="btn btn-outline-warning active">Lebih Lanjut</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-outline-warning">Pesan Sekarang</button>
			</div>
      <div class="col-md-5 m-auto text-center">
      </div>
		</div>
</div>
</div>
<br>
<div class="cc-tanggal">
<div class="container" style="position: relative;">
<div class="container c-tanggal">
<form action="/action_page.php" class="m-auto">
    <div class="row forms">
    <div class="col-lg-10">
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
      <center><a>Tanggal Kedatangan</a></center>
      <input type="date" class="form-control" placeholder="Enter email" id="email">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
      <center><a>Tanggal Keluar</a></center>
      <input type="date" class="form-control" placeholder="Enter email" id="date">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
      <center><a>Jumlah Tamu</a></center>
      <input type="number" class="form-control" placeholder="jumlah Kamar" id="email">
    </div>
    </div>
    </div>
    </div>
    <div class="col-lg-2 m-auto">
    <center><button type="submit" class="btn btn-outline-warning m-auto">Submit</button></center>
    </div>
</div>
</form>
</div>
</div>
</div>
<?php 
$ab = $con->query("SELECT*FROM tb_tentang");
$tentang = $ab->fetch_array();
 ?>
<div class="about" style="margin-top: -80px;">
  <div class="container p-5"  id="about">
    <div class="row">
      <div class="col-xl-5" style="position: relative;">
        <div class="col-md-12 m-auto p-0" style="position: relative;">
          <div class="kotak bg-warning" style="height: 200px; width: 100%; position: absolute; top: 230px;">
          </div>
        </div>
        <div class="col-md-10 col-11 m-auto" style="background: url(gambar/crausel2.jpg); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover; height: 400px;"></div>
      </div>
      <div class="col-xl-6 m-auto">
        <h3 style="font-weight: bold; margin-top: 40px;"><?=$tentang['text_1']?></h3>
        <div class="line" style="background-color: yellow; height: 2px; width: 25%; margin-top: 20px;"></div>
        <p style="line-height: 30px; font-size: 20px; margin-top: 20px;"><?=$tentang['text_2']?></p>
        <p style="font-size: 14px; color: grey;">
          <?=$tentang['text_3']?>
        </p>
        <button class="btn btn-outline-warning mt-2">Lebih Lanjut</button>
      </div>
    </div>
  </div>
</div>
<div class="container-kamar" style="margin-top: 80px;">
  <div class="container">
      <h3 style="font-weight: bold;">Rekomendasi Kamar</h3>
      <div class="line" style="background-color: yellow; height: 2px; width: 25%; margin-top: 20px; margin-bottom: 20px;"></div>
      <div class="col-md-6 p-0">
      <p  style="font-size: 14px; margin-top: 10px; color: grey;">Beberapa pilihan kamar spesial untuk anda. Tipe kamar yang beragam fasilitas kamar yang lengkap dan sesuai dengan yang tertera</p>
      </div>
  <div class="row">
    <?php 
      $kamar = $con->query("SELECT*FROM tb_kamar LIMIT 4");
      while ($tkamar = $kamar->fetch_array()) {
    ?>
    <div class="col-xl-3 col-6 p-2">
      <div class="card p-0" style="height: 310px; background: url(gambar/<?=$tkamar['gambar_kamar'];?>); background-size: cover; background-repeat: no-repeat; position: relative; background-position: center;">
        <a class="text-white" href="?page=detail&id_kamar=<?=$tkamar['id_kamar'];?>">
        <div class="col-lg-12 text-white" style="">
          <h6 class="judul-kamar"><?=$tkamar["nama_kamar"];?></h6>
          <span class="badge badge-danger"><?=$tkamar["tipe_kamar"];?></span>
          <p class="desk-kamar"><?=$tkamar["desk_singkat"];?></p>
            <h6 class="harga-kamar">Rp.<?=number_format($tkamar['harga_kamar'],0,".",".")?></h6>
            <!-- <button class="btn btn-primary">learn more</button> -->
            </a>
        </div>
      </div>
    </div>
    <?php
      }
     ?>  
  </div>
</div>
</div>
<div class="fasilitas" style="margin-top: 70px;">
  <div class="container">
<h3 style="font-weight: bold;">Fasilitas Hotel</h3>
<div class="line" style="background-color: yellow; height: 2px; width: 25%; margin-top: 20px; margin-bottom: 20px;"></div>
      <div class="col-md-6 p-0">
      <p  style="font-size: 14px; margin-top: 10px; color: grey;">Beberapa pilihan kamar spesial untuk anda. Tipe kamar yang beragam fasilitas kamar yang lengkap dan sesuai dengan yang tertera</p>
      </div>

  <div class="row">
    <?php 
      $fhotelone = $con->query("SELECT*FROM fasilitas_hotel ORDER BY id_fasilitas");
      $jmlh=$fhotelone->num_rows;
       // echo $jmlh;
      while ($onetamp = $fhotelone->fetch_array()) {
    ?>
     <div class="col-xl-4 col-12 p-1">
      <div class="card" style="min-height: 208px; background: url(gambar/<?=$onetamp['gambar']?>); color: white; background-repeat: no-repeat; background-size: cover; background-position: center;">   
      </div>
    </div>
    <?php
      }
     ?>


    <!--  <?php 
      $fhotel = $con->query("SELECT*FROM fasilitas_hotel ORDER BY id_fasilitas DESC LIMIT 8");
      while ($tamp = $fhotel->fetch_array()) {
      ?>
      <div class="col-xl-3 col-6 p-1">
        <div class="card" style="min-height: 208px; background: url(gambar/<?=$tamp['gambar']?>); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover;">   
        </div>
      </div>
      <?php 
       }
      ?>
     <?php 
      $fhotelsecond = $con->query("SELECT*FROM fasilitas_hotel ORDER BY id_fasilitas LIMIT 1");
      while ($secondtamp = $fhotelsecond->fetch_array()) {
      ?>  
    <div class="col-xl-6 col-12 p-1 ml-auto">
      <div class="card" style="min-height: 208px; background: url(gambar/<?=$secondtamp['gambar'];?>); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover;">   
      </div>
    </div>
    <?php 
      }
     ?> -->
<!--    <div class="col-xl-12">
      <div class="row">
        <div class="col-xl-4 col-6 p-1">
          <div class="card" style="background: url(gambar/restoran.jpg); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover; background-position: center;">
            
          </div>
        </div>
        <div class="col-xl-4 col-6 p-1">
          <div class="card" style="background: url(gambar/spa.jpg); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover; background-position: center;">
            
          </div>
        </div>
        <div class="col-xl-4 col-6 p-1">
          <div class="card" style="background: url(gambar/spa.jpg); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover; background-position: center;">
            
          </div>
        </div>
    </div>
  </div> -->
</div>
</div>
</div>
</div>
<div class="container-kamar" style="margin-top: 80px;">
  <div class="container">
      <h3 style="font-weight: bold;">Pelayanan Kami</h3>
      <div class="line" style="background-color: yellow; height: 2px; width: 25%; margin-top: 20px; margin-bottom: 20px;"></div>
      <div class="col-md-6 p-0">
      <p  style="font-size: 14px; margin-top: 10px; color: grey;">Kami memberikan pelayanan yang sangat baik dan pastinya akan membuat tamu merasa nyaman dalam pelayanan kami</p>
      </div>
  <div class="row">
    <div class="col-xl-3 col-6 p-2">
      <div class="card p-0" style="height: 310px; background-color: white; background-size: cover; background-repeat: no-repeat; position: relative;">
        <i class="fa-solid fa-utensils service fa-5x" style="margin-top: 80px;"></i>
        <!-- <div class="col-lg-12" style=""> -->
          <div class="body p-2 m-auto text-center">
            <h6>RESTAURAN</h6>
          <p class="card-text">Some example text.</p>
          </div>
        </div>
      </div>
     <div class="col-xl-3 col-6 p-2">
      <div class="card p-0" style="height: 310px; background-color: white; background-size: cover; background-repeat: no-repeat; position: relative;">
        <i class="fa-solid fa-users service fa-5x" style="margin-top: 80px;"></i>
        <!-- <div class="col-lg-12" style=""> -->
          <div class="body p-2 m-auto text-center">
            <h6>MEETINGS</h6>
          <p class="card-text">Some example text.</p>
          </div>
          <h6></h6>
        </div>
      </div>
     <div class="col-xl-3 col-6 p-2">
      <div class="card p-0" style="height: 310px; background-color: white; background-size: cover; background-repeat: no-repeat; position: relative;">
        <i class="fa-solid fa-wifi service fa-5x" style="margin-top: 80px;"></i>
        <!-- <div class="col-lg-12" style=""> -->
          <div class="body p-2 m-auto text-center">
            <h6>WI-FI</h6>
          <p class="card-text">Some example text.</p>
          </div>
          </div>
      </div>
     <div class="col-xl-3 col-6 p-2">
      <div class="card p-0" style="height: 310px; background-color: white; background-size: cover; background-repeat: no-repeat; position: relative;">
        <i class="fa-solid fa-clock service fa-5x" style="margin-top: 80px;"></i>
        <!-- <div class="col-lg-12" style=""> -->
          <div class="body p-2 m-auto text-center">
            <h6>CHEK OUT</h6>
          <p class="card-text">Some example text.</p>
          </div>
          <h6></h6>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

 