<style>
.search-form {
   width: auto;
}
    
.search-form form{
   max-width: 1200px;
   margin:0 auto;
   display: flex;
   gap:1rem;
}
.search-form h1{
  text-align: center;
  font-size: 2rem;
  text-decoration: underline;
  margin-bottom:2rem;
  color: var(--blue);
}

.search-form form .btn{
   margin-top: 0;
}
.search-form form .box{
   text-align: center;
   color: var(--blue);
   
display: grid;
width: 100%;
   padding:1.2rem 1.4rem;
   border:var(--border);
   font-size: 2rem;
   color:var(--black);
   background-color: var(--light-bg);
   border-radius: .5rem;
}
.search-form form input[type="text"]{
   margin:.5rem 0;
   border:var(--border);
   border-radius: .5rem;
   padding:1.2rem 1.4rem;
   font-size: 2rem;
   color:var(--black);
   margin-bottom: 1.4rem;
   
}

.empty{
  padding:1.5rem;
  text-align: center;
  border:var(--border);
  background-color: var(--white);
  color:var(--red);
  font-size: 2rem;
}
.heading{
  background: url(../static/assets/images/beach-rocks.jpg) no-repeat;
  background-size: cover;
  background-position: center;
}
.heading h3{
color:var(--white);
}

</style>
<div class="heading">
   <h3>search page</h3>
   <p> <a href="home.php">home</a> / search </p>
</div>

<section class="search-form">
   <h1>Filter by price</h1>
   <form action="" method="GET">
      <div class="box">
      <p for="start_price">Start Price</p>
      <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price'];}?>" placeholder="starting Price €">
      <p for="end_price">End Price</p>
      <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price'];}?>" placeholder="Ending Price €">
      <input type="submit" name="filter" value="filter" class=" option-btn" >
      </div>
   </form>
</section>


<section class="home-hotels ">
<?php 
//Adding to our basket
if(isset($_POST['add_to_basket'])){
  
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
  
//   isset($_GET['start_price']) && isset($_GET['end_price']) && isset($_POST['filter'])

if(isset($_GET['start_price']) && isset($_GET['end_price'])){

   $startPrice= $_GET['start_price'];
   $endPrice= $_GET['end_price'];



// $search_item = $_POST['filter'];
$select_hotels = mysqli_query($connect->connect(), "SELECT * FROM `hotel` WHERE price_per_night BETWEEN '$startPrice' AND '$endPrice' ") or die('query failed');
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
