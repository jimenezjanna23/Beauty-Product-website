<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
<header class="header">
   <section class="flex">
      <!-- Logo -->
      <a href="home.php" class="logo">
         <img src="images/Jaja.jpg" alt="Logo" class="logo-image">
         <style>/* Define the smaller size and rounded shape for the logo */
.logo img {
   width: 100px; /* Adjust this value to your desired width */
   height: auto; /* Maintain aspect ratio */
   border-radius: 50%; /* Make the image round */
   overflow: hidden; /* Ensure content overflow is hidden to maintain the rounded shape */
}
</style>

      <a href="home.php" class="logo">Janna Store<span></span></a>

     
      <nav class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About</a>
         <a href="orders.php">Orders</a>
         <a href="shop.php">Shop</a>
         <a href="contact.php">Contact</a>
      </nav>
      <div class="icons">
         <?php
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
            $total_wishlist_counts = $count_wishlist_items->rowCount();

            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_counts = $count_cart_items->rowCount();
         ?>
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="search_page.php"><i class="fas fa-search"></i></a>
         <style>
  .shining-heart {
    display: inline-block;
    position: relative;
    animation: pulse 1s infinite alternate;
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
      color: red;
    }
    100% {
      transform: scale(1.2);
      color: #ffcc00; /* Change the color to your preferred shining color */
    }
  }
</style>

<a href="wishlist.php">
  <span class="shining-heart">❤️</span>
  <span>(<?= $total_wishlist_counts; ?>)</span>
</a>

<style>
  .shining-heart {
    display: inline-block;
    position: relative;
    animation: pulse 1s infinite alternate;
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
      color: red; /* Change the color to your preferred shining color */
    }
    100% {
      transform: scale(1.2);
      color: red; /* Change the color to your preferred shining color */
    }
  }
</style>

<a href="cart.php">
  <span class="shining-heart"><i class="fas fa-shopping-cart"></i></span>
  <span>(<?= $total_cart_counts; ?>)</span>
</a>

         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php          
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile["name"]; ?></p>
         <a href="update_user.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
         <?php
            }else{
         ?>
         <p>please login or register first!</p>
         <div class="flex-btn">
            <a href="user_register.php" class="option-btn">register</a>
            <a href="user_login.php" class="option-btn">login</a>
         </div>
         <?php
            }
         ?>      
         
         
      </div>

   </section>

</header>