<head>
  <style>
    .navbar{
      background-color: black !important;
    }
  </style>
</head>
<div class="fasilitas" style="margin-top: 67px;">
  <div class="container-fluid">
<!-- <h3 style="font-weight: bold;">Fasilitas Hotel</h3>
<div class="line" style="background-color: yellow; height: 2px; width: 25%; margin-top: 20px; margin-bottom: 20px;"></div>
      <div class="col-md-6 p-0">
      <p  style="font-size: 14px; margin-top: 10px; color: grey;">Beberapa pilihan kamar spesial untuk anda. Tipe kamar yang beragam fasilitas kamar yang lengkap dan sesuai dengan yang tertera</p>
      </div>
 -->
  <div class="row">
    <?php 
      $fhotelone = $con->query("SELECT*FROM fasilitas_hotel ORDER BY id_fasilitas");
      $jmlh=$fhotelone->num_rows;
       // echo $jmlh;
      while ($onetamp = $fhotelone->fetch_array()) {
    ?>
      <div class="col-md-6 p-0">
      <div class="card" style="min-height: 500px; background:linear-gradient(to bottom,rgba(22,22,22,.3) 0,rgba(22,22,22,.7) 75%,#161616 100%), url(gambar/<?=$onetamp['gambar']?>); color: white; background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed; border-radius: 0px; border: none;">
        <div class="col-md-6 m-auto text-center" style="text-transform: capitalize;">
          <h1><?=$onetamp['fasilitas_hotel']?></h1>
        </div>
      </div>
      </div>
       <div class="col-md-6 p-0">
      <div class="card" style="min-height: 500px; background:linear-gradient(to bottom,rgba(22,22,22,.3) 0,rgba(22,22,22,.7) 75%,#161616 100%), url(gambar/<?=$onetamp['gambar']?>); color: white; background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed; border-radius: 0px; border: none; scroll-behavior: smooth;">
        <div class="col-md-6 m-auto text-center">
          <p style="font-size: 18px;"><?=$onetamp['keterangan']?></p>
        </div>
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
<br>
<br>
<br>