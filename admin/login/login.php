<?php 
  include './../lib/koneksi.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    .navbar{
      background-color: black !important;
    }
    label{
      font-weight: 100;
      font-size: 12px;
      text-transform: uppercase;
    }
    .col-md-4{
     box-shadow:  0 10px 34px -15px rgb(0 0 0 / 24%);
     padding:40px;
     margin: 0;
    }
    .col-md-6{
     box-shadow:  0 10px 34px -15px rgb(0 0 0 / 24%);
     margin: 0;
    }
    .form-group{
      margin-top: 20px;
    }
    input{
      background-color: transparent !important; 
    }
  </style>
</head>
<body>
<br>
<br>
<br>
<br>
<?php 
include '../lib/koneksi.php';
 ?>
 <div class="container">
  <div class="row p-5">
    <div class="col-md-6 ml-auto" style="background: url(../gambar/crausel2.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
      <!-- <img class="img-fluid" src="gambar/crausel2.jpg"> -->
    </div>
  <div class="col-md-4 mr-auto">
    <h3 style="">Log-in</h3>
  <form method="POST">
    <div class="form-group">
      <label for="uname">Username</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" name="user">
    </div>
    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
    </div>
    <button type="submit" class="btn btn-warning" name="btn" style="width: 100%;">LOG-IN</button>
  <label style="margin-top: 10px;">belum punya akun? <a class="text-warning" href="">Daftar</a></label>
  </form>
</div>
</div>
</div>
</body>
</html>
<?php 
  if (isset($_POST['btn'])) {
    $sql = $con->query("SELECT*FROM login_pekerja WHERE username='$_POST[user]' and password='$_POST[pass]'");
    $row = $sql->num_rows;
    $result =$sql->fetch_array();
    if ($row > 0) {
      $_SESSION['user']=$result['username'];
      $_SESSION['level']=$result['level'];
      $_SESSION['nama']=$result['nama'];
      header('location:index.php');
    }else{
      echo "terjadi kesalahan";
    }
  }
 ?>