<style>
    .heading h3{
        color:var(--white);
    }
</style>
<?php 

if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($connect->connect(), $_POST['name']);
    $email = mysqli_real_escape_string($connect->connect(), $_POST['email']);
    $number = $_POST['number'];
    $msg = mysqli_real_escape_string($connect->connect(), $_POST['message']);
 
    $select_message = mysqli_query($connect->connect(), "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
 
    if(mysqli_num_rows($select_message) > 0){
       $message[] = 'message sent already!';
      echo '<script>alert("message sent already!")</script>';
    }else{
       mysqli_query($connect->connect(), "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
       $message[] = 'message sent successfully!';
      echo '<script>alert("message sent successfully!!")</script>';
    }
 
 }
 
?>
<style>
 .heading{
   min-height: 30vh;
   display: flex;
   flex-flow: column;
   align-items: center;
   justify-content: center;
   gap:1rem;
   background:url("../static/assets/images/hotel-03.jpg") no-repeat;
   background-size: cover;
   background-position: center;
   text-align: center;
}
</style>
<div class="heading">
   <h3>contact us</h3>
   <p> <a href="home.php">home</a> / contact </p>
</div>

<section class="contact">

   <form action="" method="post">
      <h3>Message us!</h3>
      <input type="text" name="name" required placeholder="enter your name" class="box">
      <input type="email" name="email" required placeholder="enter your email" class="box">
      <input type="number" name="number" required placeholder="enter your number" class="box">
      <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" class="btn option-btn">
   </form>

</section>