<style>
  .heading h3 {
    color: var(--white);
  }

  .heading {
    background: url(../static/assets/images/sand02.jpg) no-repeat;
    background-size: cover;
    background-position: center;
  }

  .placed-bookings .box-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 1.5rem;
  }

  .placed-bookings .box-container .empty {
    flex: 1;
  }

  .placed-bookings .box-container .box {
    flex: 1 1 40rem;
    border-radius: .5rem;
    padding: 2rem;
    border: var(--border);
    background-color: var(--light-bg);
    padding: 1rem 2rem;
  }

  .placed-bookings .box-container .box p {
    padding: 1rem 0;
    font-size: 2rem;
    color: var(--light-color);
  }

  .placed-bookings .box-container .box p span {
    color: var(--blue);
  }
</style>
<div class="heading">
  <h3>Your placed Bookings</h3>
  <p> <a href="home.php">home</a> / bookings </p>
</div>

<section class="placed-bookings">
  <h1 class="title">Placed Bookings</h1>

  <div class="box-container">

    <?php
   $order_query = mysqli_query($connect->connect(), "SELECT * FROM `bookings` WHERE user_id = '$user_id'") or die('query failed');
   if (mysqli_num_rows($order_query) > 0) {
     while ($fetch_orders = mysqli_fetch_assoc($order_query)) {
   ?>
    <div class="box">
      <p> placed on : <span>
          <?php echo $fetch_orders['placed_on']; ?>
        </span> </p>
      <p> name of guest : <span>
          <?php echo $fetch_orders['name_guest']; ?>
        </span> </p>
      <p> name of hotel : <span>
          <?php echo $fetch_orders['name_hotel']; ?>
        </span></p>
      <p> number : <span>
          <?php echo $fetch_orders['number']; ?>
        </span> </p>
      <p> email : <span>
          <?php echo $fetch_orders['email']; ?>
        </span> </p>
      <p> address : <span>
          <?php echo $fetch_orders['address_guest']; ?>
        </span> </p>
      <p> payment method : <span>
          <?php echo $fetch_orders['method']; ?>
        </span> </p>
      <p> Nights stay : <span>
          <?php echo $fetch_orders['guest_stay']; ?>
        </span> </p>
      <p> total price : <span>$
          <?php echo $fetch_orders['total_price']; ?>/-
        </span> </p>
      <p> payment status : <span
          style="color:<?php if ($fetch_orders['payment_status'] == 'pending') {
         echo 'red';
       } else {
         echo 'green';
       } ?>;">
          <?php echo $fetch_orders['payment_status']; ?>
        </span> </p>
    </div>
    <?php
     }
   } else {
     echo '<p class="empty">no orders placed yet!</p>';
   }
   ?>
  </div>
</section>