<?php 

if(isset($_POST['send'])){

    $name = mysqli_real_escape_string($connect->connect(), $_POST['name']);
    $email = mysqli_real_escape_string($connect->connect(), $_POST['email']);
    $number = $_POST['number'];
    $msg = mysqli_real_escape_string($connect->connect(), $_POST['message']);
 
    $select_message = mysqli_query($connect->connect(), "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
 
    if(mysqli_num_rows($select_message) > 0){
      //  $message[] = 'message sent already!';
      echo '<script>alert("message sent already!")</script>';
    }else{
       mysqli_query($connect->connect(), "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      //  $message[] = 'message sent successfully!';
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

.heading h3{
   font-size: 3rem;
   color:var(--white);
   text-transform: uppercase;
}

.heading p{
   font-size: 1.8rem;
   color:var(--white);
}

.heading p a{
   color:var(--blue);
}

.heading p a:hover{
   text-decoration: underline;
}
.contact{
margin:1.2rem;
}
.contact form {
   margin: 0 auto;
   background-color: var(--light-bg);
   border-radius: .5rem;
   border: var(--border);
   padding: 2rem;
   max-width: 50rem;
   margin: 0 auto;
   text-align: center;
}

.contact form h3 {
   font-size: 2.5rem;
   text-transform: uppercase;
   margin-bottom: 1rem;
   color: var(--black);
}

.contact form .box {
   margin: 1rem 0;
   width: 100%;
   border: var(--border);
   background-color: var(--white);
   padding: 1.2rem 1.4rem;
   font-size: 1.8rem;
   color: var(--black);
   border-radius: .5rem;
}

.contact form textarea {
   height: 20rem;
   resize: none;
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