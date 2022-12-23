<?php

if(isset($_POST['update_booking'])){
    $booking_update_id = $_POST['booking_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($connect->connect(),$booking->bookingUpdate($update_payment,$booking_update_id)) or die('query failed');
    // $message[]='payment status has been updated';
    echo '<script>alert("payment status has been updated")</script>';
}

if(isset($_GET['delete'])){
  $delete_id=$_GET['delete'];
  mysqli_query($connect->connect(),$booking->bookingDelete($delete_id)) or die('query failed');
  header('location:admin_bookings.php');
}
?>
<section class="bookings">
    <h1 class="title">Hotel Reservations</h1>
    <div class="box-container">
        <?php
$select_bookings = mysqli_query($connect->connect(),$booking->bookingsSelectAll());
if(mysqli_num_rows($select_bookings)>0){
    while($fetch_bookings=mysqli_fetch_assoc($select_bookings)){
        ?>
        <div class="box">
            <p> User id : <span><?php echo $fetch_bookings['user_id']; ?></span> </p>
            <p> Placed on : <span><?php echo $fetch_bookings['placed_on']; ?></span> </p>
            <p> Name of Guest : <span><?php echo $fetch_bookings['name_guest']; ?></span> </p>
            <p> Name of Hotel : <span><?php echo $fetch_bookings['name_hotel']; ?></span> </p>
            <p> Number : <span><?php echo $fetch_bookings['number']; ?></span> </p>
            <p> Email : <span><?php echo $fetch_bookings['email']; ?></span> </p>
            <p> Total nights : <span><?php echo $fetch_bookings['total_nights']; ?></span> </p>
            <p> Total price : <span>$<?php echo $fetch_bookings['total_price']; ?>/-/-</span> </p>
            <p> Check in date : <span><?php echo $fetch_bookings['check_in_date']; ?></span> </p>
            <p> Check out date : <span><?php echo $fetch_bookings['check_out_date']; ?></span> </p>
            <p> Payment method : <span><?php echo $fetch_bookings['method']; ?></span> </p>

            <form action="" method="post">
                <input type="hidden" name="booking_id" value="<?php echo $fetch_bookings['id']; ?>">
                <select name="update_payment">
                    <option value="" selected disabled><?php echo $fetch_bookings['payment_status']; ?></option>
                    <option value="pending">pending</option>
                    <option value="completed">completed</option>
                </select>
                <input type="submit" value="update" name="update_booking" class="option-btn">
                <a href="admin_bookings.php?delete=<?php echo $fetch_bookings['id']; ?>"
                    onclick="return confirm('delete this booking?');" class="delete-btn">delete</a>
            </form>
        </div>

        <?php 
    }
}else{
    echo '<p>no bookings have been placed yet!</p>';
}
?>
    </div>
</section>