<?php
session_start();
include("config/config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the category from the database
    $sql = "DELETE FROM catagorylist WHERE id=$id";
    $res = mysqli_query($con, $sql);
    
    if ($res) {
        
        $_SESSION['del'] = "Category deleted successfully.";
        header("Location: http://localhost/onlineRestorant/admin/manage_category.php");
    } else {
        die('Query failed: ' . mysqli_error($con));
    }
}

?>
