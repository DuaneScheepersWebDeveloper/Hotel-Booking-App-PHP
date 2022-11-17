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

</style>
<div class="heading">
   <h3>contact us</h3>
   <p> <a href="home.php">home</a> / basket </p>
</div>


<section class="basket-total">

   <h1 class="title">Hotel bookings added</h1>
    <div class="box-container">
       <?php 
         $grand_total = 0;
         $select_basket = mysqli_query($connect->connect(), "SELECT * FROM `basket` WHERE user_id = '$user_id'") or die('query failed');
       if(mysqli_num_rows($select_basket)>0){

        while($fetch_basket = mysqli_fetch_assoc($select_basket)){


        ?>
        <div class="box">
        <img class="image" src="../static/assets/uploaded_images/<?php echo $fetch_basket['image_hotel']; ?>" alt="image_hotel">
        </div>
        
        <?php
        }
       }else{
        echo "<p class='empty'>You do not have any bookings at this time</p>";
       }
       ?> 
    </div>
  
</section>