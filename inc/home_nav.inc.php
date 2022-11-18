<?php include('../inc/message.inc.php') ?>
<header class="header">

<div class="header-1">
   <div class="flex">
      <div class="share">
         <a href="#" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-instagram"></a>
         <a href="#" class="fab fa-linkedin"></a>
      </div>
      <p> new <a href="login_page.php">login</a> | <a href="register_page.php">register</a> </p>
   </div>
</div>  

<div class="header-2">
   <div class="flex">
      <a href="home_page.php" class="logo">Clone<span>vago.</span></a>

      <nav class="navbar">
         <a href="home_page.php">Home</a>
         <a href="about_page.php">About</a>
         <a href="Accommodations_page.php">Accommodations</a>
         <a href="contact_page.php">Contact</a>
         <a href="bookings_page.php">Your-Bookings</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <span><a href="search_page.php" class="compare fas fa-search">compare hotels</a></span>
         <div id="user-btn" class="fas fa-user"></div>
         <?php
            $select_basket_number = mysqli_query($connect->connect(), "SELECT * FROM `basket` WHERE user_id = '$user_id'") or die('query failed');
            $cart_rows_number = mysqli_num_rows($select_basket_number); 
         ?>
         <a href="basket_page.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
      </div>

      <div class="user-box">
         <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
         <a href="./logout_page.php" class="delete-btn">logout</a>
      </div>
   </div>
</div>

</header>
