
<?php 
if(isset($_POST['add_to_basket'])){
   $unique_id=uniqid();
    $hotel_name = $_POST['hotel_name'];
    $hotel_price = $_POST['hotel_price'];
    $hotel_image = $_POST['hotel_image'];
 
    $check_basket_numbers = mysqli_query($connect->connect(), "SELECT * FROM `basket` WHERE name = ' $hotel_name ' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($check_basket_numbers) > 0){
      echo '<script>alert("Hotel already added!")</script>';
    }else{
       mysqli_query($connect->connect(), "INSERT INTO `basket`(user_id, name_hotel, price_per_night, image_hotel) VALUES('$user_id', '$hotel_name', '$hotel_price','$hotel_image')") or die('query failed');
       echo '<script>alert("Hotel booking added!")</script>';
    }
 
 }
?>
<div class="home-background">


<section class="home">
   <div class="content">
        <h3>Book your dream destination</h3>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <a href="./../pages/about_page.php" class="btn option-btn">discover more</a>
   </div> 
</section>


<section class="home-hotels">
<div class="box-container">
    <?php 
    //hotel_nights ->quantity
    $select_hotels = mysqli_query($connect->connect(), "SELECT * FROM `hotel` LIMIT 6") or die('query failed');
    if(mysqli_num_rows($select_hotels)>0){
        while($fetch_hotels= mysqli_fetch_assoc($select_hotels)){
            ?>
    <form action="" method="post" class="box">
      <img class="image" src="../static/assets/uploaded_images/<?php echo $fetch_hotels['image_hotel']; ?>" alt="">
      <div class="name"><?php echo $fetch_hotels['name_hotel']; ?></div>
      <div class="description"><?php echo $fetch_hotels['hotel_description']; ?></div>
      <div class="price">€<?php echo $fetch_hotels['price_per_night']; ?>/- per night</div>
     
      <input type="hidden" name="hotel_name" value="<?php echo $fetch_hotels['name_hotel']; ?>">
      <input type="hidden" name="hotel_price" value="<?php echo $fetch_hotels['price_per_night']; ?>">
      <input type="hidden" name="hotel_image" value="<?php echo $fetch_hotels['image_hotel']; ?>">
      <input type="submit" value="Create a Booking" name="add_to_basket" class="btn option-btn">
     </form>
            <?php
        }
    }else{
        echo '<p class="empty">no hotels added yet</p>';
    }
    ?>
</div>
<div class="load-more" style="margin-top: 2rem; text-align:center">
      <a href="../pages/Accommodations_page.php" class="option-btn">load more</a>
   </div>
</section>


<section class="about">

   <div class="flex">

      <div class="image">
         <img src="../static/assets/images/pineapple.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia corporis ratione saepe sed adipisci?</p>
         <a href="about.php" class="btn option-btn">read more</a>
      </div>

   </div>

</section>

<section class="home-contact">

   <div class="content contact-bottom">
      <h3>have any questions?</h3>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet ullam voluptatibus?</p>
      <a href="contact.php" class="btn option-btn">contact us</a>
   </div>

</section>

</div>