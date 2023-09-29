<?php

include("partial/header.php");
include("config/config.php");

 
          
if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "SELECT * FROM catagorylist WHERE id=$id";
     $res = mysqli_query($con, $sql);
     $row = mysqli_fetch_assoc($res);
     if (!$row) {
      die('Query failed: ' . mysqli_error($con));
  }
}
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
     // Assuming you have a hidden input field with the category ID.

    if (isset($_FILES['image'])) {
        // Process the uploaded image
        $targetDir = "../img/category"; // Specify the directory where you want to store uploaded images
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the image file is a valid image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            $uploadOk = 0;
        }

        // Allow certain image file formats (you can adjust these as needed)
        if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" && $imageFileType !== "gif") {
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            // Image upload failed
            echo "Sorry, your image was not uploaded.";
        } else {
            // Move the uploaded image to the specified directory
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // Image uploaded successfully
                header("Location: http://localhost/onlineRestorant/admin/manage_category.php");
                $_SESSION['upload'] = "The image has been uploaded.";

                $sql = "UPDATE catagorylist SET name='$title', image_name='$targetFile' WHERE id=$id";

                $res = mysqli_query($con, $sql);
                
                if (!$res) {
                    die('Query failed: ' . mysqli_error($con));
                }
                // Now you have updated the category title and image path in your database.
            } else {
                echo "Sorry, there was an error uploading your image.";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="../css/category.css">
    <!-- Other CSS and font links -->
</head>
<body>
<section class="section-admin_edit">
    <h1 class="heading-admin">Edit Category</h1>
    <div class="section-category">
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Select image:</label>
                <input type="file" name="image">
            </div>
            <button class="add_cate" type="submit" name="submit">Update Category</button>
        </form>
    </div>
</section>
</body>
</html>