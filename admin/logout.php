<?php
include("config/config.php");
session_destroy();
header('location: http://localhost/onlineRestorant/admin/login.php');

?>