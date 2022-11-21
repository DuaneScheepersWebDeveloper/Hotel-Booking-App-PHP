<style>
   .heading h3 {
      color: var(--white);
   }

   .heading {
      background: url("../static/assets/images/parrot.jpg") no-repeat;
      background-size: cover;
      background-position: center;
   }
</style>
<div class="basket-background">
   <div class="heading">
      <h3>Finalize your bookings</h3>
      <p> <a href="home.php">home</a> / basket </p>
   </div>


   <section class="basket-total">

      <h1 class="title">Hotel bookings added</h1>
      <div class="box-container">
         <?php
         if (isset($_POST['update_basket'])) {

            $basket_id = $_POST['basket_id'];
            $basket_quantity = $_POST['basket_quantity'];
            $basket_name_guest = $_POST['basket_name_guest'];
            $basket_price = $_POST['basket_price'];
            $basket_check_in_date = $_POST['basket_check_in_date'];
            $basket_check_out_date = $_POST['basket_check_out_date'];
            $dateDiff = strtotime($basket_check_out_date) - strtotime($basket_check_in_date);
            $guestStay = round($dateDiff / 86400);
            $priceTotalGuests = $basket_quantity * $basket_price;
            $addingMySQL = "UPDATE `basket` SET(price_per_night,check_in_date,check_out_date)=('$basket_price','$basket_check_in_date','$basket_check_out_date')";

            if ($basket_check_in_date > $basket_check_out_date) {
               echo '<script>alert("Your check-out date cannot be before your check-in date!")</script>';
            } else {
               echo '<script>alert("Your booking has been updated\nPlease Proceed to bookings to finalize your booking")</script>';
               mysqli_query($connect->connect(), "UPDATE `basket` SET num_of_guests = '$basket_quantity', name_guest='$basket_name_guest',price_per_night='$basket_price',check_in_date='$basket_check_in_date',check_out_date='$basket_check_out_date',price='$priceTotalGuests',guest_stay='$guestStay' WHERE id = '$basket_id'") or die('query failed');
            }
         }
         if (isset($_GET['delete'])) {
            $delete_id = $_GET['delete'];
            mysqli_query($connect->connect(), "DELETE FROM `basket` WHERE id = '$delete_id'") or die('query failed');

         }

         $grand_total = 0;
         $select_basket = mysqli_query($connect->connect(), "SELECT * FROM `basket` WHERE user_id = '$user_id'") or die('query failed');
         if (mysqli_num_rows($select_basket) > 0) {

            while ($fetch_basket = mysqli_fetch_assoc($select_basket)) {


         ?>
         <div class="box">
            <h1>Create a Booking</h1>
            <a href="basket_page.php?delete=<?php echo $fetch_basket['id'] ?>" class="fas fa-times"
               onclick="return confirm('delete from current basket?');"></a>
            <div class="price">€
               <?php echo $fetch_basket['price_per_night'] ?>.oo per night per person
            </div>
            <img class="image" src="../static/assets/uploaded_images/<?php echo $fetch_basket['image_hotel']; ?>"
               alt="image_hotel">
            <div class="name underline">
               <?php echo $fetch_basket['name_hotel'] ?>
            </div>

            <form action="" method="post">
               <input type="hidden" name="basket_id" value="<?php echo $fetch_basket['id']; ?>">
               <input type="hidden" name="basket_price" value="<?php echo $fetch_basket['price_per_night']; ?>">

               <p>Name and Surname</p>
               <input type="text" name="basket_name_guest" value="<?php echo $fetch_basket['name_guest']; ?>">
               <br>
               <p>Number of people who will be staying at the hotel</p>
               <br>
               <input type="number" name="basket_quantity" min="1"
                  value="<?php echo $fetch_basket['num_of_guests']; ?>">
               <br>
               <span>Check-In Date</span>
               <input type="date" name="basket_check_in_date" value="<?php echo $fetch_basket['check_in_date']; ?>"
                  class="checkDates">
               <br>
               <span>Check-Out Date</span>
               <input type="date" name="basket_check_out_date" value="<?php echo $fetch_basket['check_out_date']; ?>"
                  class="checkDates">
               <br>
               <input type="submit" name="update_basket" value="Submit Details" class="btn option-btn">
            </form>
            <div class="sub-total">
               sub total: €
               <?php echo $sub_total = $fetch_basket['num_of_guests'] * $fetch_basket['price_per_night']; ?>/-
            </div>
         </div>

         <?php
               $grand_total += $sub_total;
            }
         } else {
            echo "<p class='empty'>You do not have any bookings at this time</p>";
         }
         ?>

      </div>

      <div class="basket-sub-total">

         <p>Grand total:<span>
               <?php echo $grand_total ?>
            </span></p>
         <div class="flex">
            <a href="../pages/Accommodations_page.php" class="option-btn">continue searching for accommodations</a>
            <a href="../pages/checkout_page.php" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">proceed
               to
               checkout</a>
         </div>
      </div>
   </section>
</div>