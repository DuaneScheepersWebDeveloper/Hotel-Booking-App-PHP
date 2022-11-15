<?php
include('../../inc/message.inc.php');
?>

<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">Home</a>
         <a href="admin_hotels.php">Hotels</a>
         <a href="admin_bookings.php">Bookings</a>
         <a href="admin_users.php">Users</a>
         <a href="admin_messages.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="../../pages/logout_page.php" class="delete-btn">logout</a>
         <div>new <a href="../.././index.php">login</a> | <a href="../../pages/register_page.php">register</a></div>
      </div>

   </div>

</header>