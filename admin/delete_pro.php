<?php
session_start();
include("config/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the image path for deletion
    $sql = "SELECT image_name FROM menu WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        die('Query failed: ' . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);
    $imagePath = $row['image_name'];

    // Delete the product from the database
    $deleteSql = "DELETE FROM menu WHERE id=$id";
    $deleteResult = mysqli_query($con, $deleteSql);
    if (!$deleteResult) {
        die('Query failed: ' . mysqli_error($con));
    }

    // Remove the associated image from the folder
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $_SESSION['del'] = "Product deleted successfully.";
    header("Location: http://localhost/onlineRestorant/admin/manage_food.php");
    exit();
}
?>
