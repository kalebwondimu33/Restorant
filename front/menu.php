<?php include("../admin/config/config.php")?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Mogra&family=Montserrat:wght@900&family=Poppins:wght@400;700&family=Rubik:wght@400;500;600;700&family=Sacramento&family=Ubuntu:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="../css/menu.css" />
    <title>Food Ordering Menu</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
<header>
      <nav class="navigation">
        <div>
          <img class="logo" src="../img/omnifood-logo.png" alt="omni food logo" />
        </div>
        <ul class="nav-lists">
          <li><a href="http://localhost/onlineRestorant/front/index.php" class="nav-link">Home</a></li>
          <li><a href="http://localhost/onlineRestorant/front/menu.php" class="nav-link">Menu</a></li>
          <li><a href="http://localhost/onlineRestorant/front/category.php" class="nav-link">Category</a></li>
          <li class="cart-icon">
            <a href="http://localhost/onlineRestorant/front/cart.php"
              ><ion-icon class="icon" name="cart-outline"></ion-icon
            ></a>
          </li>
        </ul>
      </nav>
    </header>
    <section class="section-menu">
    
        <!-- Add more items here -->
        <div class="menu-grid">
        <?php
        $query = "SELECT * FROM menu";
        $result = mysqli_query($con, $query);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
            // Use numerical index for ID
                $id=$row['id'];
                $title = $row['name']; // Use numerical index for username
                $image=$row['image'];
                $description=$row['description'];
                $price=$row['price'];
                $eth=" Birr";
                echo '<div class="frame-22">';
                echo '<div class="frame-17">';
                echo "<img  class='rectangle-26' src='" . $image . "' alt='food image'>";
                echo '<div class="ramachandra-parlour">' . $title . '</div>';
                echo '<div class="desc">'.$description . '</div>';
                echo '<div class="frame-15">';
                // echo '<div class="south-indian">' . $item["category"] . '</div>';
                echo '<div class="frame-12">';
                // echo '<ion-icon class="cart-icon_pro" name="cart-outline"></ion-icon>';   
                echo ' <a class="btn-cart" href="http://localhost/onlineRestorant/front/cart.php?id=' . $id . '"><ion-icon class="cart-icon_pro" name="cart-outline"></ion-icon></a>';
                echo '</div>';
                echo '</div>';
                echo '<div class="frame-16">';
                echo '<div class="frame-13">';
                // echo '<div class="_30-mins">' . $item["deliveryTime"] . '</div>';
                echo '</div>';
                echo '<div class="frame-14">';
                echo '<div class="_200-for-two">' . $price .$eth. '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
            ?>

        </div>
    </section>
</body>

</html>