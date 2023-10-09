<?php 
 include '../lib/koneksi.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .card{
      border: none;
      overflow: hidden;
    }
    .card .col-lg-12{
      cursor: pointer;
      position: absolute; 
      bottom: -117px; 
      padding: 14px; 
      color: white;
      transition: 0.5s;
    }
    .card .col-lg-12:hover{
      cursor: pointer;
      position: absolute; 
      bottom: 0px; 
      padding: 14px; 
      color: white;
      transition: 0.5s;
    }
    .judul-kamar{
      font-weight: bold;
    }
    .desk-kamar{
      font-size: 12px;
    }
  </style>
</head>
<body>
<br>

<div class="container container-kamar">
  <div class="row">
    <div class="col-xl-3 p-1">
      <div class="card p-0 bg-primary" style="height: 319px; background: url(../gambar/crausel.jpg); background-size: cover; background-repeat: no-repeat; position: relative;">
        <div class="col-lg-12 bg-dark" style="">
          <h6 class="judul-kamar">Cantigi Doble Bed</h6>
          <p class="desk-kamar">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
          <div class="row">
            <div class="col-xl-6 m-auto"><h6 class="harga-kamar">Rp.500.000</h6></div>
            <div class="col-xl-6"><button class="btn btn-primary">learn more</button></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 p-1">
      <div class="card p-0 bg-primary" style="height: 319px; background: url(../gambar/crausel.jpg); background-size: cover; background-repeat: no-repeat; position: relative;">
        <div class="col-lg-12 bg-dark" style="">
          <h6 class="judul-kamar">Cantigi Doble Bed</h6>
          <p class="desk-kamar">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
          <div class="row">
            <div class="col-xl-6 m-auto"><h6 class="harga-kamar">Rp.500.000</h6></div>
            <div class="col-xl-6"><button class="btn btn-primary">learn more</button></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 p-1">
      <div class="card p-0 bg-primary" style="height: 319px; background: url(../gambar/crausel.jpg); background-size: cover; background-repeat: no-repeat; position: relative;">
        <div class="col-lg-12 bg-dark" style="">
          <h6 class="judul-kamar">Cantigi Doble Bed</h6>
          <p class="desk-kamar">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
          <div class="row">
            <div class="col-xl-6 m-auto"><h6 class="harga-kamar">Rp.500.000</h6></div>
            <div class="col-xl-6"><button class="btn btn-primary">learn more</button></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 p-1">
      <div class="card p-0 bg-primary" style="height: 319px; background: url(../gambar/crausel.jpg); background-size: cover; background-repeat: no-repeat; position: relative;">
        <div class="col-lg-12 bg-dark" style="">
          <h6 class="judul-kamar">Cantigi Doble Bed</h6>
          <p class="desk-kamar">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
          <div class="row">
            <div class="col-xl-6 m-auto"><h6 class="harga-kamar">Rp.500.000</h6></div>
            <div class="col-xl-6"><button class="btn btn-primary">learn more</button></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 

</body>
</html>
