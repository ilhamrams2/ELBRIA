
<!-- fasilitas hotel -->
<!-- <div class="fasilitas-hotel" style="background: url(gambar/crausel3.jpg);">
<div class="container">
	<div class="row">
		<div class="col-md-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
	</div>
</div>
</div> -->
<!-- Akhir fasilitas hotel -->
<!-- tentang awal -->
<div class="container">
<div class="tanggal">
  <div class="container c-tanggal" style="padding: 10px 40px 0px 40px;">
    <form action="/action_page.php" class="m-auto">
    <div class="row forms">
    <div class="col-md-10">
    <div class="row">
    <div class="col-md-4">
    <div class="form-group">
      <a>Tanggal Kedatangan</a>
      <input type="date" class="form-control" placeholder="Enter email" id="email">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
      <a>Tanggal Keluar</a>
      <input type="date" class="form-control" placeholder="Enter email" id="email">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
      <a>Jumlah Tamu</a>
      <input type="number" class="form-control" placeholder="Enter email" id="email">
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-2 m-auto">
    <center><button type="submit" class="btn btn-primary m-auto">Submit</button></center>
    </div>
</div>
</form>
</div>
  </div>
</div>
</div>

<!-- tentang akhir -->
<!-- kamar hotel -->
<div class="container con-kamar" style="">
<div class="row kamar">
<div class="col-md-12">
  <ul class="nav nav-tabs justify-content-center" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">ELBRIA</a>
    </li>
    <?php 
        $sql = $con->query("SELECT*FROM tipe_kamar");
        while ($tampil = $sql->fetch_array()) {
    ?>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#<?=$tampil['tipe_kamar']?>"><?=$tampil['tipe_kamar']?></a>
    </li>
    <?php
        }
     ?>
    <?php 
        $sql = $con->query("SELECT*FROM nama_kamar");
        while ($tampil = $sql->fetch_array()) {
    ?>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#<?=$tampil['nama_kamar']?>"><?=$tampil['nama_kamar']?></a>
    </li>
    <?php
        }
     ?>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <?php 
      $sqlm = $con->query("SELECT*FROM tipe_kamar");
      while ($menu = $sqlm->fetch_array()) {
    ?>
     <div id="<?=$menu['tipe_kamar']?>" class="container tab-pane fade"><br>
      <div class="row">
        <?php 
        $sqlee = $con->query("SELECT*FROM tb_kamar WHERE tipe_kamar='$menu[tipe_kamar]'");
        while ($tamps = $sqlee->fetch_array()) {
        ?>
         <div class="col-md-4">
      	<div class="card" style="background: url(gambar/<?=$tamps['gambar_kamar']?>); background-position: center; background-size: cover;">
        <div class="card-body c-kamar">
          <h4 class="card-title"><?=$tamps['nama_kamar']?></h4>
          <p class="card-text"><?=$tamps['desk_kamar']?></p>
          <p class="card-text"><?=$tamps['harga_kamar']?></p>
          <p class="card-text"><?=$tamps['tipe_kamar']?></p>
        </div>
      </div>
      </div>
        <?php
        }
         ?>
      </div>
    </div>
    <?php
      }
     ?>
    <?php 
      $sqlm = $con->query("SELECT*FROM nama_kamar");
      while ($menus = $sqlm->fetch_array()) {
    ?>
     <div id="<?=$menus['nama_kamar']?>" class="container tab-pane fade"><br>
    <center><h3 style="text-transform: uppercase; font-weight: bold;">Kamar <?=$menus['nama_kamar']?></h3></center><br>
      <div class="row">
        <?php 
        $sqlee = $con->query("SELECT*FROM tb_kamar WHERE nama_kamar='$menus[nama_kamar]'");
        while ($tampss = $sqlee->fetch_array()) {
        ?>
        <div class="col-md-4 p-2">
        <div class="card" style="">
        <img class="card-img-top" src="gambar/<?=$tampss['gambar_kamar']?>" alt="Card image">
        <div class="card-body">
          <h4 class="card-title"><?=$tampss['nama_kamar']?></h4>
          <p class="card-text">Some example text.</p>
          <a href="#" class="btn btn-primary">See Profile</a>
        </div>
        </div>
        </div>
        <?php
        }
         ?>
      </div>
    </div>
    <?php
      }
     ?>
</div>
</div>
</div>
</div>
<div class="container">
  <div class="row tentang">
    <div class="col-md-7">
      <!-- <div class="row" style="">
        <div class="col-md-6"> -->
          <img src="gambar/tentang1.jpg" class="img-fluid" style="width: 100%; height: 420px;">
        <!-- </div> -->
        <!-- <div class="col-md-6">
          <img src="gambar/tentang1.jpg" class="img-fluid" style="width: 100%; height: 420px;">
        </div> -->
      </div>
    <!-- </div> -->
    <div class="col-md-5">
      <h1>ELBRIA HOTEL Memberikan Pelayanan Terbaik Untuk Anda</h1>
      <p>Kepuasan anda tanggung jawab kami</p>
      <span>
      <p>Dengan bangunan 12 lantai serta fasilitas yang sangat lengkap, hotel ini bisa di tujukan untuk wisatawan yang ingin menginap, dikarenakan lokasi yang strategis dekat dengan transportasi umum dan tempat wisata.</p></span>
<!--      <h6>Apakah kamu tahu mengapa hotel ini sangat di sukai oleh para tamu?</h6>
        <li>Fasilitas dan kamar yang bersih</li>
        <li>Pemandangan kamar sangat bagus</li>
        <li>Chek out pukul 03.00 PM</li>
        <li>Harga yang terjangkau</li>
        <br>
      <span class="bt">
      <h6>Yang terpenting adalah:</h6>
      <p>Tamu dapat sarapan, makan siang, makan malam gratis</p>
      </span> -->
    </div>
  </div>
</div>
<br>
<br>
<br>
<!-- akhir kamar hotel -->
 <div class="container">
    <center style="font-weight: 100;">
      <h1>Penawaran Khusus</h1>
      <p>Beberapa pilihan kamar spesial untuk anda.</p>
    </center>
    <br>
    <br>
    <div class="row">
<!--       <div class="col-lg-4">
        <div class="card" style="">
    <img class="card-img-top" src="gambar/crausel2.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="#" class="btn btn-primary stretched-link">See Profile</a>
    </div>
  </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="">
    <img class="card-img-top" src="gambar/crausel3.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="#" class="btn btn-primary stretched-link">See Profile</a>
    </div>
  </div>
      </div>
      <div class="col-lg-4">
        <div class="card" style="">
    <img class="card-img-top" src="gambar/crausel.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="#" class="btn btn-primary stretched-link">See Profile</a>
    </div>
  </div>
      </div> -->
      <div class="col-xl-3 p-1">
  <div class="card card-kamar p-0" style="height: 319px; background: url(gambar/crausel.jpg); background-size: cover; background-repeat: no-repeat;"></div>
  <div class="card-over p-3">
    <h4 class="card-title">Cantigi Rose</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>

      </div>
      <div class="col-xl-3 p-1">
  <div class="card card-kamar" style="height: 319px; background: url(gambar/crausel.jpg); background-size: cover; background-repeat: no-repeat;"></div>
  <div class="card-over p-3">
    <h4 class="card-title">Cantigi Rose</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>
  
      </div>
      <div class="col-xl-3 p-1">
  <div class="card card-kamar" style="height: 319px; background: url(gambar/crausel2.jpg); background-size: cover; background-repeat: no-repeat;"></div>
  <div class="card-over p-3">
    <h4 class="card-title">Cantigi Rose</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>

      </div>
      <div class="col-xl-3 p-1">
  <div class="card card-kamar" style="height: 319px; background: url(gambar/crausel3.jpg); background-size: cover; background-repeat: no-repeat;"></div>
  <div class="card-over p-3 m-0">
    <h4 class="card-title">Cantigi Rose</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>

      </div>
    </div>
  </div>
</div>
<div class="col-xl-6 p-1">
          <div class="card" style="min-height: 208px; background: url(gambar/elbriakolamrenang.jpg); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover;">
            
          </div>
        </div>
        <div class="col-xl-6 p-1">
          <div class="card" style="min-height: 208px; background: url(gambar/elbriakolamrenang.jpg); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover;">
            
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="row">
        <div class="col-xl-6 col-6 p-1">
          <div class="card" style="min-height: 208px; background: url(gambar/restoran.jpg); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover; background-position: center;">
            
          </div>
        </div>
        <div class="col-xl-6 col-6 p-1">
          <div class="card" style="min-height: 208px; background: url(gambar/spa.jpg); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover; background-position: center;">
            
          </div>
        </div>
        <div class="col-xl-12 col-12 p-1">
          <div class="card" style="min-height: 208px; background: url(gambar/spa.jpg); color: white; background-attachment: scroll; background-repeat: no-repeat; background-size: cover; background-position: center;">
            
          </div>
        </div>
    </div>