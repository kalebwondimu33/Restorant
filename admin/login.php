<?php
// Place this code at the top of your PHP script

include("config/config.php");
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        // Successful login
        $user = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['invalid_username'] = "";
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username']; 
        header('Location: http://localhost/onlineRestorant/admin/manage_admin.php'); // Redirect to dashboard or another authenticated page
        exit();
    } else {
        // Failed login
        $_SESSION['invalid_username']="<span class='error'> Invalid username or password. </span>";
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Mogra&family=Montserrat:wght@900&family=Poppins:wght@400;700&family=Rubik:wght@400;500;600;700&family=Sacramento&family=Ubuntu:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/login.css"> 
</head>
<body>
  <section class="section-login">
    <div class="login-container">
    <?php 
    if(isset($_SESSION['invalid_username']) && !empty($_SESSION['invalid_username'])){
        echo $_SESSION['invalid_username'];
        $_SESSION['invalid_username'] = ""; // Clear the session variable after displaying
    }
    if(isset($_SESSION['no-login-message']) && !empty($_SESSION['no-login-message'])){
        echo $_SESSION['no-login-message'];
        $_SESSION['no-login-message'] = ""; // Clear the session variable after displaying
    }
    ?>
    
  
        <h1 class="title">Login</h1>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="login" type="submit" name="login">Login</button>
        </form>
    </div>
    </section>
</body>
</html>


