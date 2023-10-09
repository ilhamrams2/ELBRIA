<nav class="navbar bg-light navbar-light justify-content-center">
  <ul class="navbar-nav">
  	<?php 
  		$sqle = $con->query("SELECT*FROM tipe_kamar");
  		while ($menu = $sqle->fetch_array()) {
  	?>
  	 <li class="nav-item">
      <a class="nav-link" href="<?php $nanas = $menu['tipe_kamar'] ?>"><?=$menu['tipe_kamar']?></a>
    </li>
  	<?php
  		}
  	 ?>
    <!-- <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li> -->
  </ul>
</nav>

<div class="col-md-10">
  <div class="row r-kamar">
    <?php
    $sql = $con->query("SELECT*FROM tb_kamar");
    while ($tampil = $sql->fetch_array()) {
    ?>
      <div class="col-md-4" id="<?=$tampil['tipe_kamar']?>">
      <div class="card" style="background: url(gambar/<?=$tampil['gambar_kamar']?>); background-position: center; background-size: cover;">
        <div class="card-body c-kamar">
          <h4 class="card-title"><?=$tampil['nama_kamar']?></h4>
          <p class="card-text"><?=$tampil['desk_kamar']?></p>
          <p class="card-text"><?=$tampil['harga_kamar']?></p>
          <p class="card-text"><?=$tampil['tipe_kamar']?></p>
        </div>
      </div>
    </div>
    <?php
    }
     ?>
  </div>
</div>
<ul class="nav nav-tabs">
  <?php 
      $sqle = $con->query("SELECT*FROM tipe_kamar");
      while ($menu = $sqle->fetch_array()) {
    ?>
    <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#<?=$menu['tipe_kamar']?>"><?=$menu['tipe_kamar']?></a>
    </li>
    <?php
      }
     ?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
</div>
</div>
</div>
<div class="col-md-10">
  <div class="row r-kamar">
    <?php
    $sql = $con->query("SELECT*FROM tb_kamar");
    while ($tampil = $sql->fetch_array()) {
    ?>  
      <div class=" container fade" id="<?=$tampil['tipe_kamar']?>">
      <div class="col-md-4" id="home">
      <div class="card" style="background: url(gambar/<?=$tampil['gambar_kamar']?>); background-position: center; background-size: cover;">
        <div class="card-body c-kamar">
          <h4 class="card-title"><?=$tampil['nama_kamar']?></h4>
          <p class="card-text"><?=$tampil['desk_kamar']?></p>
          <p class="card-text"><?=$tampil['harga_kamar']?></p>
          <p class="card-text"><?=$tampil['tipe_kamar']?></p>
        </div>
      </div>
      </div>
      </div>
    <?php
    }
     ?>
  </div>
</div>