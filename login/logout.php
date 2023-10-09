<?php 
 session_start();
 if (!isset($_SESSION['id_akun'])) {
 	session_destroy();
 	header('location:../index.php');
 }else{
 	echo "ea";
 }
 ?>