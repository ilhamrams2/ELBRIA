<head>
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
<br>
<br>
<br>
<br>
<?php 
include 'lib/koneksi.php';
 ?>
 <div class="container">
  <div class="row p-5">
    <div class="col-md-6 ml-auto" style="background: url(gambar/crausel2.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
      <!-- <img class="img-fluid" src="gambar/crausel2.jpg"> -->
    </div>
    <?php 
        if (isset($_GET['regis'])=='regis-akun') {
    ?>
      <div class="col-md-4 mr-auto">
    <h3 style="">Register</h3>
    <form action="" method="POST">
      <div class="form-group">
        <label for="email">Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="email">Username</label>
        <input type="text" class="form-control" name="users" placeholder="Username">
      </div>
      <div class="form-group">
        <label for="pwd">Password</label>
        <input type="password" class="form-control" name="passs" placeholder="password">
      </div>
      <button type="submit" class="btn btn-warning" name="daftar" style="width: 100%;">LOG-IN</button>
      <label style="margin-top: 10px;">Sudah punya akun? <a class="text-warning" href="?page=login">log-in</a></label>

    <?php 
        if (isset($_POST['daftar'])) {
          $biawakid = $_POST['users'];
          $a = md5($_POST['passs']);
          $sqll = $con->query("INSERT INTO login_user VALUES('','$_POST[nama]','$biawakid','$a')");
          if ($sqll) {
            echo "<script>alert('Berhasil Terdaftar');document.location.href='?page=login';</script>";
          }else{
            echo "data gagal";
          }
        
      }
     ?>
    </form>
</div>
    <?php
        }else{
     ?>
  <div class="col-md-4 mr-auto">
    <h3 style="">Log-in</h3>
<form action="" method="POST">
  <div class="form-group">
    <label for="email">Username</label>
    <input type="text" class="form-control" name="user" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="pwd">Password</label>
    <input type="password" class="form-control" name="pass" placeholder="password">
  </div>
  <button type="submit" class="btn btn-warning" name="btn" style="width: 100%;">LOG-IN</button>
  <label style="margin-top: 10px;">belum punya akun? <a class="text-warning" href="?page=login&regis=regis-akun">Daftar</a></label>

<?php 
    if (isset($_POST['btn'])) {
    $a = md5($_POST['pass']);
    $sql = $con->query("SELECT*FROM login_user WHERE id_akun='$_POST[user]' and password='$a'");
    $row = $sql->num_rows;
    $result =$sql->fetch_array();
    if ($row > 0) {
      $_SESSION['id_akun']=$result['id_akun'];
      $_SESSION['nama_user']=$result['nama_user'];
      $_SESSION['id_user']=$result['id_user'];
      echo "<script>alert('login Berhasil');document.location.href='index.php'</script>";
    }else{
      echo "terjadi kesalahan";
    }
  }
 ?>
</form>
</div>
<?php } ?>
</div>
</div>
<br>
<br>
<br>
<br>