<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   
   <link rel="shortcut icon" href="https://scontent.fmnl30-2.fna.fbcdn.net/v/t39.30808-6/346951749_627091685961352_6939832453578659730_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_ohc=umDL9bqOoYEAX9FZj4l&_nc_ht=scontent.fmnl30-2.fna&oh=00_AfDdUvSr-2Fa71Ba5IlR4QBjywsbZq_CPHIslxt6ehnFWA&oe=6551485B" type="image/x-icon">

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">
   
   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/ViyLine.png" alt="">
         </div>
         <div class="content">
            <span>Two sides of being a Woman is that you can be sweet as a honey and fierce as the sea breeze', 'A mixture sea breeze scent, Sweet honey and peach extract fragrance/50ml1.6 FL OZ
Price: <s>₱600</s><b>₱499</b>
Quantity in Stock: 100</span>
            <h3>ViyLine Scent</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/Eye Liner.png" alt="">
         </div>
         <div class="content">
            <span>Flormar is a popular brand known for its affordable and high-quality makeup products, including eyeliners.
Flormar eyeliners come in different formulations, such as waterproof, long-lasting, and smudge-proof. They offer various finishes, including matte, metallic, and shimmer.
Price: ₱500
Quantity in Stock: 50</span>
            <h3>Flormar Eyeliner</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/Skin White.jpg" alt="">
         </div>
         <div class="content">
            <span>This whitening lotion contains vitamins B3, B5, B6, C, and E that nourish and moisturize your skin to make it softer and smoother.
Price: ₱622
Quantity in Stock: 25</span>
            <h3>Skinwhite Power Whitening Lotion Spf20 500m</h3>
            <a href="shop.php" class="btn">shop now</a>
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>

<section class="category">

   <h1 class="heading">Beauty Products Category</h1>

   <div class="swiper category-slider">

   <div class="swiper-wrapper">

   <a href="?category=Lipstick" class="swiper-slide slide">
      <img src="images/Lipstick N Matte.jpg" alt="">
      <h3>Lipstick</h3>
   </a>

   <a href="?category=Cleansers" class="swiper-slide slide">
      <img src="images/SKin White.jpg" alt="">
      <h3>Cleansers</h3>
   </a>

   <a href="?category=Moisturizers" class="swiper-slide slide">
      <img src="images/olay-moist-new.jpg" alt="">
      <h3>Moisturizers</h3>
   </a>

   <a href="?category=Sunscreen" class="swiper-slide slide">
      <img src="images/sunglow-by-fresh-creme-tinted-sunscreen.jpg" alt="">
      <h3>Sunscreen</h3>
   </a>


   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>

<section class="home-products">

  <section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

   <?php
   $select_products = $conn->prepare("SELECT * FROM `products` WHERE `id` IN (1, 2, 3)");
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
      <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
      <div class="name"><?= $fetch_product['name']; ?></div>
      <div class="flex">
         <div class="price"><span>₱</span><?= $fetch_product['price']; ?><span>/-</span></div>
         <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
      </div>
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

</section>

<section class="products">

   <h1 class="heading">Sale Products</h1>

   <div class="box-container">

   <?php
$select_products = $conn->prepare("SELECT * FROM `products` WHERE `id` IN (4, 5, 6)");
$select_products->execute();

if ($select_products->rowCount() > 0) {
    while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <form action="" method="post" class="box">
            <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
            <!-- Other input fields go here -->

            <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
            <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
            <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
            <div class="name"><?= $fetch_product['name']; ?></div>
            <div class="flex">
                <div class="price"><span>₱</span><?= $fetch_product['price']; ?><span>/-</span></div>
                <input type="number" name="qty" class="qty" min="1" max="99"
                       onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <input type="submit" value="add to cart" class="btn" name="add_to_cart">
        </form>
        <?php
    }
} else {
    echo '<p class="empty">no products found!</p>';
}
?>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>
var swiperHome = new Swiper(".home-slider", {
   loop: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable: false,
    },
   autoplay: {
      delay: 3200, // 3 seconds
   },
});

var swiperCategory = new Swiper(".category-slider", {
   loop: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable: false,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
  
});

var swiperProducts = new Swiper(".products-slider", {
   loop: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable: false,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
   
});
</script>


</body>
</html>