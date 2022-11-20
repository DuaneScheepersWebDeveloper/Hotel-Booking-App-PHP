<style>

    
.search-form form{
   max-width: 1200px;
   margin:0 auto;
   display: flex;
   gap:1rem;
}

.search-form form .btn{
   margin-top: 0;
}

.search-form form .box{
   width: 100%;
   padding:1.2rem 1.4rem;
   border:var(--border);
   font-size: 2rem;
   color:var(--black);
   background-color: var(--light-bg);
   border-radius: .5rem;
}

</style>
<div class="heading">
   <h3>search page</h3>
   <p> <a href="home.php">home</a> / search </p>
</div>

<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="search hotel..." class="box">
      <input type="submit" name="submit" value="Search by name" class="btn option-btn" >
   </form>
</section>


<section class="home-hotels ">
<?php 
if(isset($_POST['add_to_basket'])){
    $unique_id=uniqid();
     $hotel_name = $_POST['hotel_name'];
     $hotel_price = $_POST['hotel_price'];
     $hotel_image = $_POST['hotel_image'];
  
     $check_basket_numbers = mysqli_query($connect->connect(), "SELECT * FROM `basket` WHERE name_guest = ' $hotel_name ' AND user_id = '$user_id'") or die('query failed');
  
     if(mysqli_num_rows($check_basket_numbers) > 0){
       echo '<script>alert("Hotel already added!")</script>';
       $message[] = 'Hotel already added!';
     }else{
        mysqli_query($connect->connect(), "INSERT INTO `basket`(user_id, name_hotel, price_per_night, image_hotel) VALUES('$user_id', '$hotel_name', '$hotel_price','$hotel_image')") or die('query failed');
        echo '<script>alert("Hotel booking added!")</script>';
       $message[] = 'Hotel booking added!';
     }
  
  }

if(isset($_POST['submit'])){
$search_item = $_POST['search'];
$select_hotels = mysqli_query($connect->connect(), "SELECT * FROM `hotel` WHERE name_hotel LIKE '%{$search_item }%'") or die('query failed');
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
    echo '<p class="empty">no result found!</p>';
}
}else{
echo '<p class="empty">Search Something</p>';
}
?>

</section>
