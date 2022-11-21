<style>
   .heading h3 {
      color: var(--white);
   }

   .heading {
      background: url("../static/assets/images/01-beach.jpg") no-repeat;
      background-size: cover;
      background-position: center;
   }
</style>
<?php
if (isset($_POST['order_btn'])) {

   $name = mysqli_real_escape_string($connect->connect(), $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($connect->connect(), $_POST['email']);
   $method = mysqli_real_escape_string($connect->connect(), $_POST['method']);
   $address = mysqli_real_escape_string($connect->connect(), 'flat no. ' . $_POST['flat'] . ', ' . $_POST['street'] . ', ' . $_POST['city'] . ', ' . $_POST['country'] . ' - ' . $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $basket_total = 0;
   $basket_hotels[] = '';

   $basket_query = mysqli_query($connect->connect(), "SELECT * FROM `basket` WHERE user_id='$user_id'") or die('query failed');
   if (mysqli_num_rows($basket_query) > 0) {
      while ($basket_item = mysqli_fetch_assoc($basket_query)) {
         //num_of_guests guest_stay
         $basket_hotels[] = $basket_item['name_hotel'] . ' (' . $basket_item['guest_stay'] . ') ';
         $sub_total = $basket_item['price_per_night'] * $basket_item['guest_stay'];
         $basket_total += $sub_total;

         $name_hotel = $basket_item['name_hotel'];
         $number_guests_staying = $basket_item['num_of_guests'];
         $guest_stay = $basket_item['guest_stay'];
         $check_in_date = $basket_item['check_in_date'];
         $check_out_date = $basket_item['check_out_date'];
      }
   }
   $total_hotels = implode(',', $basket_hotels);
   $order_query = mysqli_query($connect->connect(), "SELECT * FROM `bookings` WHERE 
   name_guest='$name'AND number='$number' 
   AND email='$email' 
   AND address_guest='$address' 
   AND method='$method' 
   AND total_bookings='$total_hotels' 
   AND total_price='$basket_total'
   AND name_hotel='$name_hotel'
   AND num_of_guests ='$number_guests_staying'
   AND guest_stay='$guest_stay'
   ") or die('query failed');


   if ($basket_total == 0) {
      echo '<script>alert("you have no bookings")</script>';
      $message[] = 'your basket is empty';
   } else {
      if (mysqli_num_rows($order_query) > 0) {
         echo '<script>alert("your booking is already placed")</script>';
         $message[] = 'your booking is already placed';
      } else {
         mysqli_query($connect->connect(), "INSERT INTO 
         `bookings`(user_id,name_guest,number,email,method,address_guest,total_bookings,total_price,placed_on,name_hotel,num_of_guests,guest_stay) 
         VALUES('$user_id','$name','$number','$email','$method','$address','$total_hotels','$basket_total','$placed_on','$name_hotel','$number_guests_staying','$guest_stay')") or die('query failed');
         $message[] = 'booking confirmed and placed successfully';
         echo '<script>alert("booking confirmed and placed successfully")</script>';
         mysqli_query($connect->connect(), "DELETE FROM `basket` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
}

?>
<div class="heading">
   <h3>Current Hotels you want to book for</h3>
   <p><a href="../pages/home_page.php"></a></p>
</div>

<section class="display-order">
   <?php
   $grand_total = 0;
   $select_booking = mysqli_query($connect->connect(), "SELECT * FROM `basket` WHERE user_id='$user_id'") or die('query failed');
   if (mysqli_num_rows($select_booking) > 0) {
      while ($fetch_basket = mysqli_fetch_assoc($select_booking)) {
         $sub_total_price = ($fetch_basket['price_per_night'] * $fetch_basket['guest_stay']);
         $total_price = ($sub_total_price * $fetch_basket['num_of_guests']);
         $grand_total += $total_price;
   ?>
   <div class="display-order-unit">
      <p>Name of Guest : <span>
            <?php echo $fetch_basket['name_guest']; ?>
         </span></p>
      <p>Name of Hotel: <span>
            <?php echo $fetch_basket['name_hotel']; ?>
         </span></p>
      <p>Number of guests staying: <span>
            <?php echo $fetch_basket['num_of_guests']; ?> people
         </span></p>
      <p>Price per night: <span>
            <?php echo $fetch_basket['price_per_night']; ?>
         </span> </p>
      <p>Nights booked: <span>
            <?php echo $fetch_basket['guest_stay']; ?> nights
         </span></p>
      <p>Your Grand total: <span>
            <?php echo $total_price; ?>
         </span></p>
      <p>
         <?php echo $fetch_basket['placed_on']; ?>
      </p>
   </div>
   <br>
   <?php
      }
   } else {
      echo '<p class="empty">your basket is empty</p>';
   }
   ?>
</section>

<section class="checkout">
   <form action="" method="post">
      <h3>place your Booking</h3>
      <div class="flex">
         <div class="inputBox">
            <span>your name :</span>
            <input type="text" name="name" required placeholder="enter your name">
         </div>
         <div class="inputBox">
            <span>your number :</span>
            <input type="number" name="number" required placeholder="enter your number">
         </div>
         <div class="inputBox">
            <span>your email :</span>
            <input type="email" name="email" required placeholder="enter your email">
         </div>
         <div class="inputBox">
            <span>payment method :</span>
            <select name="method">
               <option value="cash on delivery">cash on day</option>
               <option value="credit card">credit card</option>
               <option value="paypal">paypal</option>
               <option value="paytm">paytm</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 01 :</span>
            <input type="number" min="0" name="flat" required placeholder="e.g. flat no.">
         </div>
         <div class="inputBox">
            <span>address line 01 :</span>
            <input type="text" name="street" required placeholder="e.g. street name">
         </div>
         <div class="inputBox">
            <span>city :</span>
            <input type="text" name="city" required placeholder="e.g. mumbai">
         </div>
         <div class="inputBox">
            <span>state :</span>
            <input type="text" name="state" required placeholder="e.g. maharashtra">
         </div>
         <div class="inputBox">
            <span>country :</span>
            <input type="text" name="country" required placeholder="e.g. india">
         </div>
         <div class="inputBox">
            <span>pin code :</span>
            <input type="number" min="0" name="pin_code" required placeholder="e.g. 123456">
         </div>
      </div>
      <input type="submit" value="Place your Booking" class="btn" name="order_btn">
   </form>
</section>