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

.basket-background{

   background-image: url("../static/assets/images/sand.jpg");
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	scroll-behavior: smooth;
	background-attachment: fixed;
	background-repeat: no-repeat;
  
}

.basket-total .box-container{
   max-width: 100%;
   margin:0 auto;
   display: grid;
   grid-template-columns: repeat(auto-fit, 90rem);
   align-items: center;
   gap:1.5rem;
   justify-content: center;
   
}

.basket-total .box-container .box{

   text-align: center;
   padding:2rem;
   border-radius: .5rem;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   position: relative;
   border:var(--border);
   margin-bottom: 20px;
}

.basket-total .box-container .box .fa-times{
   position: absolute;
   top:1rem; right:1rem;
   height: 4.5rem;
   width: 4.5rem;
   line-height: 4.5rem;
   font-size: 2rem;
   background-color: var(--red);
   color:var(--white);
   border-radius: .5rem;
}

.basket-total .box-container .box .fa-times:hover{
   background-color: var(--black);
}

.basket-total .box-container .box img{
   height: 30rem;
   
}

.basket-total .box-container .box .name{
   padding:1rem 0;
   font-size: 2rem;
   color:var(--black);
}

.basket-total .box-container .box .price{
   padding:1rem 0;
   font-size: 2.5rem;
   color:var(--red);
}

.basket-total .box-container .box .checkDates{
   padding:1rem 0;
   font-size: 2.5rem;
   color:var(--red);
}

.basket-total .box-container .box input[type="number"]{
   margin:.5rem 0;
   border:var(--border);
   border-radius: .5rem;
   padding:1.2rem 1.4rem;
   font-size: 2rem;
   color:var(--black);
   width: 9rem;
}
.basket-total .box-container .box input[type="text"]{
   margin:.5rem 0;
   border:var(--border);
   border-radius: .5rem;
   padding:1.2rem 1.4rem;
   font-size: 2rem;
   color:var(--black);
   width:100%;
}

.basket-total .box-container .box .sub-total{
   padding-top: 1.5rem;
   font-size: 2rem;
   color:var(--light-color);
}
.basket-total .box-container .box h1{
   padding-bottom: 1.5rem;
   font-size: 2rem;
   color:var(--red);
   text-decoration: underline;
}

.basket-total form p{
  
   font-size: 1.4rem;
   
  
}

.basket-total .box-container .box .sub-total span{
   color:var(--red);
}

.basket-total .cart-total{
   max-width: 1200px;
   margin:0 auto;
   border:var(--border);
   padding:2rem;
   text-align: center;
   margin-top: 2rem;
   border-radius: .5rem;
}

.basket-total .cart-total p{
   font-size: 2.5rem;
   color:var(--light-color);
}

.basket-total .cart-total p span{
   color:var(--red);
}

.basket-total .cart-total .flex{
   display: flex;
   flex-wrap: wrap;
   column-gap:1rem;
   margin-top: 1.5rem;
   justify-content: center;
}

.basket-total .disabled{
   pointer-events: none;
   opacity: .5;
   user-select: none;
}

</style>
<div class="basket-background">
<div class="heading">
   <h3>contact us</h3>
   <p> <a href="home.php">home</a> / basket </p>
</div>


<section class="basket-total">

   <h1 class="title">Hotel bookings added</h1>
    <div class="box-container">
       <?php 
        if(isset($_POST['update_basket'])){
         
         $basket_id = $_POST['basket_id'];
         $basket_quantity = $_POST['basket_quantity'];
         $basket_name_guest= $_POST['basket_name_guest'];
         $basket_price = $_POST['basket_price'];
         $basket_check_in_date= $_POST['basket_check_in_date'];
         $basket_check_out_date= $_POST['basket_check_out_date'];
         $dateDiff=strtotime($basket_check_out_date) - strtotime($basket_check_in_date);
         $guestStay=round($dateDiff/86400);
         $priceTotalGuests=$basket_quantity*$basket_price;
         $addingMySQL="UPDATE `basket` SET(price_per_night,check_in_date,check_out_date)=('$basket_price','$basket_check_in_date','$basket_check_out_date')";

         if($basket_check_in_date>$basket_check_out_date){
            echo '<script>alert("Your check-out date cannot be before your check-in date!")</script>';
         }else{
            echo '<script>alert("Your booking has been updated\nPlease Proceed to bookings to finalize your booking")</script>';
            mysqli_query($connect->connect(), "UPDATE `basket` SET num_of_guests = '$basket_quantity', name_guest='$basket_name_guest',price_per_night='$basket_price',check_in_date='$basket_check_in_date',check_out_date='$basket_check_out_date',price='$priceTotalGuests',guest_stay='$guestStay' WHERE id = '$basket_id'") or die('query failed');
            
         }
      
         
      }
      

         $grand_total = 0;
         $select_basket = mysqli_query($connect->connect(), "SELECT * FROM `basket` WHERE user_id = '$user_id'") or die('query failed');
       if(mysqli_num_rows($select_basket)>0){

        while($fetch_basket = mysqli_fetch_assoc($select_basket)){


        ?>
        <div class="box">
         <h1>Create a Booking</h1>
            <a href="basket_page.php?delete=<?php echo $fetch_basket['id']?>" class="fas fa-times" onclick="return confirm('delete all from current basket?');"></a>
            <div class="price">€<?php echo $fetch_basket['price_per_night']?>.oo per night per person</div>
            <img class="image" src="../static/assets/uploaded_images/<?php echo $fetch_basket['image_hotel']; ?>" alt="image_hotel">
        <div class="name underline"><?php echo $fetch_basket['name_hotel']?></div>
       
            <form action="" method="post">
                <input type="hidden" name="basket_id" value="<?php echo $fetch_basket['id']; ?>">
                <input type="hidden" name="basket_price" value="<?php echo $fetch_basket['price_per_night']; ?>">
             
                <p>Name and Surname</p>
                <input type="text" name="basket_name_guest" value="<?php echo $fetch_basket['name_guest']; ?>">
                <br>
                <p>Number of people who will be staying at the hotel</p>
                <br>
                <input type="number" name="basket_quantity" min="1" value="<?php echo $fetch_basket['num_of_guests']; ?>">
                <br>
                <span>Check-In Date</span>
                <input type="date" name="basket_check_in_date" value="<?php echo $fetch_basket['check_in_date']; ?>" class="checkDates">
                <br>
                <span>Check-Out Date</span>
                <input type="date" name="basket_check_out_date" value="<?php echo $fetch_basket['check_out_date']; ?>" class="checkDates">
                <br>
                <input type="submit" name="update_basket" value="Submit Details" class="btn option-btn">
            </form>
            <div class="sub-total">
               sub total: €<?php echo $fetch_basket['num_of_guests']*$fetch_basket['price_per_night']; ?>/-
            </div>
        </div>
        
        <?php
        }
       }else{
        echo "<p class='empty'>You do not have any bookings at this time</p>";
       }
       ?> 
    </div>
    <div style="margin-top: 2rem; text-align:center;">
      <a href="basket_page.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from current basket?');">delete all</a>
   </div>
</section>
</div>