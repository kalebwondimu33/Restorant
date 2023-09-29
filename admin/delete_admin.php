<?php 
include("config/config.php");
$id=$_GET['id'];
$sql="DELETE FROM admin WHERE id='$id'";
$res=mysqli_query($con,$sql);
if ($res){
   $_SESSION['delete']= '<div class="success-message" >Admin Deleted Successfully</div>';;
   header('location:http://localhost/onlineRestorant/admin/manage_admin.php');
}
else{
  $_SESSION['delete']= '<div class="faild-message">Failed to Delete Admin Try Again later</div>';
  header('location:http://localhost/onlineRestorant/admin/manage_admin.php');
}



?>