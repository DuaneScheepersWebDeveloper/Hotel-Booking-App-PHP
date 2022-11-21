<?php
//http://localhost/oop-hotel-booking-app/pages/register_page.php
//The register page
include("../inc/register.inc.php");


$page_title = "Register";
include("../inc/header.php");
?>

<body class="register_page">
   <?php
include('../inc/message.inc.php');
?>
   <div class="form-container">

      <form action="" method="post">
         <h1 class="logo underline">Clone<span>vago.</span></h1>
         <h2>Register now</h2>
         <input type="text" name="login_name" placeholder="enter your name" required class="box">
         <input type="email" name="login_email" placeholder="enter your email" required class="box">
         <input type="password" name="login_password" placeholder="enter your password" required class="box">
         <input type="password" name="login_cpassword" placeholder="confirm your password" required class="box">
         <select name="user_type" class="box">
            <option value="user">user</option>
            <option value="admin">admin</option>
         </select>
         <button type="submit" name="submit" class="btn btn-primary btn-lg">Register Now</button>
         <p>already have an account? <a href="login_page.php">login now</a></p>
      </form>
   </div>
</body>

<?php include("../inc/footer.php"); ?>