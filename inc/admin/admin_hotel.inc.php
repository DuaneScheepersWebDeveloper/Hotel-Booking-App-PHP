<?php

//==================================================================================
 //Adding new hotel
 if (isset($_POST['add_hotel'])){
    $name_hotel = mysqli_real_escape_string($connect->connect(), $_POST['name_hotel']);
    $price=$_POST['price_per_night'];
    //Keep it name not name_hotel
    $image_hotel = $_FILES['image_hotel']['name'];
    $image_size = $_FILES['image_hotel']['size'];
    $image_tmp_name = $_FILES['image_hotel']['tmp_name'];
    $image_folder = '../../static/assets/uploaded_images/'.$image_hotel;
    $description = mysqli_real_escape_string($connect->connect(), $_POST['hotel_description']);

    //select
    $select_hotel_name = mysqli_query($connect->connect(),$hotelAdmin->hotelSelectByName($name_hotel)) or die('query failed');
    
    if(mysqli_num_rows($select_hotel_name)){
        $message[]='hotel name already added';
    }else{
        $add_hotel_query = mysqli_query($connect->connect(),$hotelAdmin->hotelSelectByValues($name_hotel,$price,$image_hotel,$description)) 
        or die('query failed'); 
       
        if($add_hotel_query){
            if($image_size>2000000){
                $message[]='image size limit exceeded';
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[]='hotel added successfully';
            }
          
        }else{
            $message[]='hotel could not be added';
        }
    }

 }
//==================================================================================
 //delete Hotels
if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    $delete_image_query = mysqli_query($connect->connect(), $hotelAdmin->hotelSelectDeleteByImage($delete_id)) or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('../../static/assets/uploaded_images/'.$fetch_delete_image['image_hotel']);
    mysqli_query($connect->connect(), $hotelAdmin->hotelSelectDeleteById($delete_id)) or die('query failed'); 
    header('location:admin_hotels.php');
}
//==================================================================================
//update hotel name
if(isset($_POST['update_hotel'])){
    $update_h_id = $_POST['update_h_id'];
    $update_name = $_POST['update_name'];
    $update_description = $_POST['update_description'];
    $update_price = $_POST['update_price'];
    mysqli_query($connect->connect(), "UPDATE `hotel` SET name_hotel='$update_name', price_per_night='$update_price', hotel_description='$update_description' WHERE id = '$update_h_id'") or die('query failed');
   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_folder = '../../static/assets/uploaded_images/'.$update_image;
   $update_old_image = $_POST['update_old_image'];

   if(!empty($update_image)){
      if($update_image_size > 20000000){
         $message[] = 'image file size is too large';
      }else{
         mysqli_query($connect->connect(), "UPDATE `hotel` SET image_hotel = '$update_image' WHERE id = '$update_h_id'") or die('query failed');
         move_uploaded_file($update_image_tmp_name, $update_folder);
         unlink('../../static/assets/uploaded_images/'.$update_old_image);
      }
   }

   header('location:admin_hotels.php');
}

?>