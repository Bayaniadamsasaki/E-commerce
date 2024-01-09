<?php
require "function.php";

$produkHead = Query("SELECT * FROM produk limit 3");
$produk = Query("SELECT * FROM produk")

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Link CDN FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />


  <!-- Link CSS -->
  <link rel="stylesheet" href="style/style.css">

</head>

<body>

  <!-- Header Section Start -->
  <header>
    <a href="#" class="logo"><i class="fas fa-utensils"></i> WTC Resto</a>

    <nav class="navbar">
      <a class="active" href="#home">home</a>
      <a href="#dishes">dishes</a>
      <a href="#about">about</a>
      <a href="#menu">menu</a>
      <a href="#review">review</a>
      <a href="#order">order</a>
    </nav>

    <div class="icons">
      <i class="fas fa-bars" id="menu-bars"></i>
      <i class="fas fa-search" id="bars"></i>
      <a href="#" class="fas fa-heart"></a>
      <a href="#" class="fas fa-shopping-cart"></a>
    </div>
  </header>
  <!-- Header Section End -->

  <!-- Search Form Start -->
  <form action="" id="search-form">
    <input type="search" placeholder="search here" name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
  </form>
  <!-- Search Form Start -->

  <!-- Home Section Start -->
  <section class="home" id="home">
    <div class="swiper home-slider">
      <div class="swiper-wrapper wrapper">
        <?php if (!empty($produkHead)): ?>
          <?php foreach ($produkHead as $row): ?>
            <div class="swiper-slide slide">
              <div class="content">
                <span>our special dish</span>
                <h3>
                  <?= $row["nama_product"] ?>
                </h3>
                <p>
                  <?= $row["description"] ?>
                </p>
                <a href="#" class="btn">order now</a>
              </div>
              <div class="image">
                <img src="Admin/imgp/<?= $row["gambar"] ?>" id="homepage-1" alt="">
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No products available.</p>
        <?php endif; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <!-- Home Section End -->

  <!-- Dishes Section Start -->
  <section class="dishes" id="dishes">
    <h3 class="sub-heading">our dishes</h3>
    <h1 class="heading">popular dishes</h1>

    <div class="box-container">
      <?php foreach ($produk as $row): ?>
        <div class="box">
          <a href="#" class="fas fa-heart"></a>
          <a href="#" class="fas fa-eye"></a>
          <img id="" src="Admin/imgp/<?= $row["gambar"] ?>" alt="">
          <h3>
            <?= $row["nama_product"] ?>
          </h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
          </div>
          <span>
            <?= $row["harga"] ?>
          </span>
          <a href="#" class="btn">add to cart</a>
        </div>
      <?php endforeach ?>
    </div>
  </section>
  <!-- Dishes Section End -->

  <!-- About Section Start -->
  <sectiom class="about" id="about">
    <h3 class="sub-heading">about us</h3>
    <h1 class="heading">why choose us?</h1>

    <div class="row">
      <div class="image">
        <img src="assets/about.png" alt="">
      </div>

      <div class="content">
        <h3>best food in the country</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam ratione eaque corrupti minima molestiae
          eum iste distinctio accusantium asperiores sunt omnis veniam accusamus architecto velit, ea, dolorem id
          blanditiis enim!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium similique libero quae delectus totam
          inventore suscipit alias quod consectetur eaque.</p>

        <div class="icons-container">
          <div class="icons">
            <i class="fas fa-shipping-fast">
              <span>free delivery</span>
            </i>
          </div>
          <div class="icons">
            <i class="fas fa-dollar-sign">
              <span>easy payments</span>
            </i>
          </div>
          <div class="icons">
            <i class="fas fa-headset">
              <span>24/7 service</span>
            </i>
          </div>
        </div>
        <a href="#" class="btn">learn more</a>
      </div>
    </div>
  </sectiom>qabout
  <!-- About Section End -->









</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="script/script.js"></script>

</html>