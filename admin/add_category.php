<?php include("partial/header.php");?>
<?php include("config/config.php");?>
<?php
    
    if (isset($_POST["submit"]) ) {
        $title = $_POST["title"];
        if(isset($_FILES['image'])){
        // Process the uploaded image
        $targetDir = "../img/category/";  // Specify the directory where you want to store uploaded images
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
                $_SESSION['upload']="The image has been uploaded.";
                
               
                $sql = "INSERT INTO catagorylist VALUES ('','$title','$targetFile')";

                $res=mysqli_query($con,$sql);
                if (!$res) {
                  die('Query failed: ' . mysqli_error($con));
              }
                // Now you can save the category title and image path in your database or perform other actions.
                // Example: Insert into database
                // $sql = "INSERT INTO categories (title, image_path) VALUES ('$title', '$targetFile')";
                // mysqli_query($conn, $sql);
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
      <title>category</title>
      <link rel="stylesheet" href="../css/category.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Mogra&family=Montserrat:wght@900&family=Poppins:wght@400;700&family=Rubik:wght@400;500;600;700&family=Sacramento&family=Ubuntu:wght@300;400&display=swap"
      rel="stylesheet"
    />
</head>
<body>
      

<section class="section-admin_add">
      <h1 class="heading-admin">Add to Category</h1>
      <div class="section-category">
      <form  method="POST"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="category title" required>
            </div>
            <div class="form-group">
                <label >Select image:</label>
                <input type="file" name="image" required>

            </div>
            <button class="add_cate" type="submit" name="submit">Add Category</button>
        </form>
      </div>
      
</section>
</body>
</html>
