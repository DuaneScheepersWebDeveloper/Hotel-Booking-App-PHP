<?php
//http://localhost/oop-hotel-booking-app/pages/login_page.php

session_start();
include('../inc/login.inc.php');
$page_title = "Login";
include("../inc/header.php");
?>
<body class="login_page">
<?php 
   include('../inc/message.inc.php');
   
   ?>
    <div class="form-container">
   
<form action="" method="post">
   <div class="cloneVago">
   <h1 class="logo underline">Clone<span>vago.</span></h1>
   </div>
   <div class="login-heading">
   <h1 >Login</h1>
   </div>
      
     
      <input type="email" name="login_email" placeholder="enter your email" required class="box">
      <input type="password" name="login_password" placeholder="enter your password" required class="box">
    
      <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
      <p>don't have an account? <a href="register_page.php">Register now</a></p>
   </form>
   </div>
</body>

<?php include("../inc/footer.php"); ?>