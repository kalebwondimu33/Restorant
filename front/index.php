<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>omni food</title>
    <link rel="stylesheet" href="../css/style.css" />
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </head>
  <body>
    <header>
      <nav class="navigation">
        <div>
          <img class="logo" src="../img/omnifood-logo.png" alt="omni food logo" />
        </div>
        <ul class="nav-lists">
          <li><a href="#" class="nav-link">Home</a></li>
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
    <main>
      <section class="section-hero">
        <div class="hero">
          <div class="hero-text-box">
            <h1 class="heading-primary">
              A healthy meal delivered to your door.
            </h1>
            <p class="hero-desc">
              Discover a world of deliciousness through our user-friendly food
              ordering website. It's your gateway to a hassle-free culinary
              journey, packed with flavors that match your cravings.
            </p>
            <a href="menu.html" class="btn btn--full margin-right-sm"
              >Start eating well</a
            >
            <a href="#" class="btn btn--outline">Learn more &darr;</a>
          </div>
          <div class="hero-img-box">
            <img
              src="../img/hero.jpg"
              class="hero-img"
              alt="women enjoying food,meals in storage continer, and food bowls on a table"
            />
          </div>
        </div>
      </section>
      <section class="section-how">
        <div class="container">
          <span class="subheading">How it works</span>
          <h2 class="heading-secondary">
            Your daily dose of health in 3 simple steps
          </h2>
        </div>
        <div class="container grid grid--cols-2 grid--center-v">
          <!-- step 01 -->
          <div class="step-text-box">
            <p class="step-number">01</p>
            <h3 class="heading-tertiary">
              Tell us what you like (and what not)
            </h3>
            <p class="step-description">
              Never again waste time thinking about what to eat! Omnifood AI
              will create a 100% personalized weekly meal plan just for you. It
              makes sure you get all the nutrients and vitamins you need, no
              matter what diet you follow!
            </p>
          </div>
          <div class="step-img-box">
            <img
              src="../img/app-screen-1.png"
              alt="ipone app preferences selecting screen"
              class="step-img"
            />
          </div>
          <!-- step 02 -->
          <div class="step-img-box">
            <img
              src="../img/app-screen-2.png"
              alt="ipone app meal approving plan screen"
              class="step-img"
            />
          </div>
          <div class="step-text-box">
            <p class="step-number">02</p>
            <h3 class="heading-tertiary">order your meal</h3>
            <p class="step-description">
              Explore Our Menu Selection, Choose Your Desired Dish, and Complete
              Your Order for a Culinary Delight.
            </p>
          </div>
          <!-- step 03 -->
          <div class="step-text-box">
            <p class="step-number">03</p>
            <h3 class="heading-tertiary">Receive meals at convenient time</h3>
            <p class="step-description">
              Best chefs in town will cook your selected meal every day, and we
              will deliver it to your door whenever works best for you. You can
              change delivery schedule and address daily
            </p>
          </div>
          <div class="step-img-box">
            <img
              src="../img/app-screen-3.png"
              alt="ipone app delivery screen"
              class="step-img"
            />
          </div>
        </div>
      </section>
    </main>
    <footer class="footer">
      <div class="container grid grid-footer">
        <div class="logo-col">
          <!-- <a href="#" class="footer-logo">
            <img
              class="logo"
              src="img/omnifood-logo.png"
              alt="omni food logo"
            />
          </a> -->
          <ul class="social-links">
            <li>
              <a href="# " class="footer-link"
                ><ion-icon class="social-icon" name="logo-instagram"></ion-icon
              ></a>
            </li>
            <li>
              <a href="# " class="footer-link"
                ><ion-icon class="social-icon" name="logo-facebook"></ion-icon
              ></a>
            </li>
            <li>
              <a href="# " class="footer-link"
                ><ion-icon class="social-icon" name="logo-twitter"></ion-icon
              ></a>
            </li>
          </ul>
          <p class="copyright">
            Copyright &copy;2023 by Omnifood,Inc.All rights reserved
          </p>
        </div>
        <div class="address-col">
          <p class="footer-heading">Contact us</p>
          <address class="contacts">
            <p class="address">
              623 Harrison St., 2nd Floor, San Francisco, CA 94107
            </p>
            <p>
              <a href="tel:415-201-6370" class="footer-link"> 415-201-6370</a>
              <br />
              <a href="mailto:hello@omnifood.com" class="footer-link"
                >hello@omnifood.com</a
              >
            </p>
          </address>
        </div>
        <nav class="nav-col">
          <p class="footer-heading">Developers</p>
          <ul class="footer-nav">
            <li><a class="footer-link" href="#">kaleb wondimu </a></li>
            <li><a class="footer-link" href="#">Abeselom Dejene</a></li>
            <!-- <li><a class="footer-link" href="#">iOS app </a></li>
            <li><a class="footer-link" href="#">Android app </a></li> -->
          </ul>
        </nav>
        <nav class="nav-col">
          <p class="footer-heading">Company</p>
          <ul class="footer-nav">
            <li><a class="footer-link" href="#">About Omnifood</a></li>
            <li><a class="footer-link" href="#">For Business</a></li>
            <li><a class="footer-link" href="#">Cooking partners </a></li>
            <li><a class="footer-link" href="#">Careers</a></li>
          </ul>
        </nav>
        <nav class="nav-col">
          <p class="footer-heading">Resources</p>
          <ul class="footer-nav">
            <li><a class="footer-link" href="#">Recipe directory</a></li>
            <li><a class="footer-link" href="#">Help center </a></li>
            <li><a class="footer-link" href="#">Privacy & terms</a></li>
          </ul>
        </nav>
      </div>
    </footer>
  </body>
</html>
