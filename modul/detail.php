<style>
  .navbar{
  }
  h1{
    font-weight: bold;
    color: white;
    text-transform: uppercase;
    font-size:  43px;
  }
  .bg-kamar{
    overflow: hidden;
  }
  .pg{
    position: relative;
    top: 190px;
  }
  .pg p{
    font-weight: bold;
    color: white;
  }
    /*.kamar li{
      list-style: none;
      color: black;
      font-size: 125%;
      padding: 10px;
      transition: 1s;
    }
    .kamar li a{
      font-size: 14px;
      margin-left: 10px;
    }
    .kamar li:hover{
      color: yellow;
    }*/
  .kamar .car .card{
    border: none;
    transition: 1s !important;
  }
  .kamar .car .card:hover{
    transition: 1s;
    height: auto;
  }
  p{
    font-weight: bold;
  }
  .gbrkamar .card{
    border: none;
  }
  .lest li{
    display: flex;
    font-size: 20px;
    color: white;
  }
  .lest li a{
    padding: 5px 30px;
  }
  .lest li a:hover{
    background-color: black;
  }
 /* .lest .btn{
    border: 2px solid rgba(0,0,0,1);
    color: black;
  }*/
  /*.lest .btn:hover{
    background-color: rgba(1,1,1,1);
    color: white;
  }*/
</style>
<body style="">
<?php 
  $idkamar = $_GET['id_kamar'];
  $sql = $con->query("SELECT*FROM tb_kamar WHERE id_kamar='$idkamar'");
  $tampil = $sql->fetch_array();
  $jumlah = $tampil['jumlah_kamar'];
  $buatgambar  = $tampil['id_kamar'];
  $sqll = $con->query("SELECT*FROM pemesanan WHERE id_kamar='$idkamar'");
  $total = 0;
  while ($tampel = $sqll->fetch_array()) {
    $total += $tampel['jumlah_kamar'];
  }
  $sisa = $jumlah - $total;
 ?>
<div class="bg-kamar" style="background: linear-gradient(to right, rgba(0,0,0,.6), rgba(0,0,0,.6)),url(gambar/<?=$tampil['gambar_kamar']?>); height: 470px; background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed; position: relative;">
  <div class="container pg">
    <div class="row">
      <div class="col-xl-6 m-auto text-center">
        <h1 class="text-warning"><?=$tampil['nama_kamar']?></h1>
        <div class="col-xl-8 m-auto text-center">
        <p><?=$tampil['desk_singkat']?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col m-auto bg-warning lest">
  <div class="row" style="padding: 10px 0;">
    <div class="col-xl-3 text-center m-auto">
      <center><p class="m-0 text-white">Rp.<?=number_format($tampil['harga_kamar'],0,".",".")?>/MALAM</center>
    </div>
    <div class="col-xl-6">
      <nav class="navbar navbar-expand">

  <!-- Links -->
      <ul class="navbar-nav m-auto">
        <?=$tampil['desk_kamar']?>
      </ul>

    </nav>  
    </div>
    <div class="col-xl-3 m-auto">
      <?php 
          if ($total >= $jumlah) {
      ?>
      <center><button class="btn btn-danger" onclick="myFunction()">Kamar Penuh</button></center>
      <script>
        function myFunction() {
          alert("Kamar Sudah Penuh");
        }
      </script>
      <?php
          }else{
       ?>
      <center style="font-size: 12px; color: red;">*sisa kamar <?=$sisa?></center>
      <center><a class="m-auto" href="?page=reservasi&id_kamar=<?=$tampil['id_kamar']?>"><button class="btn btn-outline-dark">Pesan Sekarang</button></a></center>
    <?php 
      } 
    ?>
    </div>
  </div>
  
</div>
<div class="container kamar p-0" style="margin: 10px auto; position: relative;">
<div class="row gbrkamar" style="">
  <div class="col-md-12">
    <div class="row">
      <?php 
        $kamar = $con->query("SELECT*FROM gambar_fasilitas WHERE id_kamar='$buatgambar'");
        while ($tamps = $kamar->fetch_array()) {
      ?>
      <div class="col-md-3 m-auto" style="padding: 5px;">
      <div class="card" style="background:linear-gradient(to right, rgba(0,0,0,.2), rgba(0,0,0,.2)),url(gambar/<?=$tamps['gambar_fasilitas']?>); height: 220px; background-size: cover; border-radius: 0px; border: none; background-position: center;">
      </div>
      </div>
      <?php
        }
       ?>
    </div>
    </div>
  </div>
</div>
</body>

