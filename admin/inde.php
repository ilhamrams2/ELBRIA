<?php 
   session_start();
 include '../lib/koneksi.php';
  if (!isset($_SESSION['user'])) {
    include 'login/login.php';
  }else{
    $user = $_SESSION['user'];
    $level = $_SESSION['level'];
    // $sql = $con->query("SELECT*FROM petugas WHERE username='$user'");
    // $tampil =$sql->fetch_array();
 ?>
 <h4>ECHOOO YAAAA AAANNNJAAAAAY</h4>
 <a href="login/logout.php">keluar</a>
 <?php } ?>