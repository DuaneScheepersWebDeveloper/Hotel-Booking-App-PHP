<?php
//http://localhost/oop-hotel-booking-app/pages/admin_page.php
$page_title = "Admin Hotels";
include("../../inc/page_check.php");
include("../../inc/admin/admin_hotel.inc.php");
 include("../../inc/admin/admin_header.php");
 
 ?>
<body>
    <?php include("../../inc/admin/admin_nav.php");
  
    ?>
 <section class="add-hotels">

    <form action="" method="post" enctype="multipart/form-data">
    <h1 class="title">Add Hotel</h1>
<input type="text" name="name_hotel" class="box" placeholder="Enter Hotel" required>
<input type="number" min="0" name="price_per_night" class="box" placeholder="Enter Price per night" required>
<textarea class="box" name="hotel_description" id="" cols="30" rows="10" placeholder="Enter the hotel's description" ></textarea>
<input type="file" name="image_hotel" accept="image/jpg, image/jpeg, image/png" class="box" required>
<input type="submit" name="add_hotel" class="btn-submit" value="add Hotel">
    </form>
 </section>
<!-- show Hotels -->
<section class="show-hotels">
    <div class="box-container">
    <?php 
     
     
    $select_hotels = mysqli_query($connect->connect(),$hotelAdmin->hotelsSelectAll())
    or die('query failed');
    if(mysqli_num_rows($select_hotels)>0){
        while($fetch_hotels=mysqli_fetch_assoc($select_hotels)){
    ?>
    <div class="box">
    <img src="../../static/assets/uploaded_images/<?php  echo $fetch_hotels['image_hotel'];?>" alt="">
        <div class="name"><?php echo $fetch_hotels['name_hotel']; ?></div>
        <div class="price">€<?php echo $fetch_hotels['price_per_night']; ?>/- per night</div>
        <div class="description"><?php echo $fetch_hotels['hotel_description']; ?></div>

        <a href="admin_hotels.php?update=<?php echo $fetch_hotels['id']?>" class="option-btn">Update</a>
        <a href="admin_hotels.php?delete=<?php echo $fetch_hotels['id']?>" class="delete-btn" onclick="return confirm('delete this hotel')">Delete</a>
    </div>
    <?php
     } 
      }else{
        echo '<p class="empty">No Hotels added yet!</p>';
    }
    ?>
    </div>
</section>

<section class="edit-hotel-form">
<?php 
if(isset($_GET['update'])){
   
    $update_id =$_GET['update'];
    $update_query = mysqli_query($connect->connect(), "SELECT * FROM `hotel`
    WHERE id='$update_id'") or die('query failed');
    if(mysqli_num_rows($update_query)>0){
        while($fetch_update = mysqli_fetch_assoc($update_query)){
?>
 <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="update_h_id" value="<?php echo $fetch_update['id']; ?>">
      <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image_hotel']; ?>">
      <img src="../../static/assets/uploaded_images/<?php echo $fetch_update['image_hotel']; ?>" alt="image_hotel">
      <input type="text" name="update_name" value="<?php echo $fetch_update['name_hotel']; ?>" class="box" required placeholder="enter Hotel name">
      
      <textarea type="text "name="update_description" id="" cols="30" rows="4" placeholder="<?php echo $fetch_update['hotel_description'];?>" class="box"></textarea>
      <input type="number" name="update_price" value="<?php echo $fetch_update['price_per_night']; ?>" min="0" class="box" required placeholder="enter price per night">
      <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" value="update" name="update_hotel" class="btn-update">
      <input type="reset" value="cancel" id="close-update" class="btn-cancel">
   </form> 

<?php 
      }
    }
}else{
echo '<script>
document.querySelector(".edit-hotel-form").style.display = "none";
</script>';
}
?>
</section>



<script src="../../static/js/admin.js"></script>
</body>

<?php include("../../inc/footer.php"); ?>