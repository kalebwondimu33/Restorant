<?php 
session_start();
if(!isset($_SESSION['username'])){
  $_SESSION['no-login-message'] = 'Please Login first to access the admin panel';

  header('location: http://localhost/onlineRestorant/admin/login.php');
}


?>