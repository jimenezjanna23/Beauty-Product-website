<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>
   <link rel="shortcut icon" href="https://scontent.fmnl30-2.fna.fbcdn.net/v/t39.30808-6/346951749_627091685961352_6939832453578659730_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_ohc=umDL9bqOoYEAX9FZj4l&_nc_ht=scontent.fmnl30-2.fna&oh=00_AfDdUvSr-2Fa71Ba5IlR4QBjywsbZq_CPHIslxt6ehnFWA&oe=6551485B" type="image/x-icon">

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/Jaja.jpg" alt="">
      </div>

      <div class="content">
    <h3 style="color: black;">why choose us?</h3>
    <p style="color: black;">We prioritize the quality and safety of our beauty products. Each product is carefully formulated using high-quality ingredients that are sourced from trusted suppliers. Our products undergo rigorous testing and adhere to strict quality control standards to ensure they are safe and effective for your skin.</p>
    <a href="contact.php" class="btn" style="color: white;">contact us</a>
</div>      </div>

   </div>

</section>

<section class="reviews">
   
   <h1 class="heading">client's reviews</h1>

   <div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
    <img src="images/Customer.jpg" alt="">
    <p style="color: black;">Absolutely love this beauty product! It's been a game-changer for my skincare routine. The results are amazing, and it feels great on my skin. Highly recommend!</p>
    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    </div>
    <h3>Customer</h3>
</div>

<div class="swiper-slide slide">
    <img src="images/Customer.jpg" alt="">
    <p style="color: black;">This beauty product exceeded my expectations! From its delightful scent to its remarkable effectiveness, it's become a must-have in my daily regimen.</p>
    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    </div>
    <h3>Customer</h3>
</div>

<div class="swiper-slide slide">
    <img src="images/Customer.jpg" alt="">
    <p style="color: black;">This beauty product is simply fantastic! It's gentle yet effective, and I've noticed a significant difference since I started using it. Nice and beautiful</p>
    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    </div>
    <h3>Customer</h3>
</div>

      </div>

   </div>

   <div class="swiper-pagination"></div>

   </div>

</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
        slidesPerView:1,
      },
      768: {
        slidesPerView: 2,
      },
      991: {
        slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>