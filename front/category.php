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
    <div class="cate_fo_dr">
    <h1 class="category">Categorys</h1>
    </div>
    <section>
    <ul class="foo_dri">
    <li class="fo-link"><a href="http://localhost/onlineRestorant/front/food.php" class="nav-link" >Food</a></li>
    <li class="fo-link"><a href="http://localhost/onlineRestorant/front/drink.php" class="nav-link" >Drink</a></li>
    </ul>

    </section>
    
</body>

</html>