<?php
class HotelClass{
    public function hotelsSelectAll(){
        $hotelSelectAll= "SELECT * FROM `hotel`";
        return $hotelSelectAll; 
    }
    public function hotelSelectByName($name_hotel){
      $hotelSelectByName="SELECT name_hotel FROM 
      `hotel` WHERE name_hotel='$name_hotel' "; 
      return $hotelSelectByName; 
    }

    public function hotelSelectByValues($name_hotel,$price,$image_hotel,$description){
        $hotelSelectByValues="INSERT INTO 
        `hotel`(name_hotel,price_per_night,image_hotel,hotel_description) 
        VALUES('$name_hotel','$price','$image_hotel','$description')";
        return $hotelSelectByValues; 
    }
    public function hotelSelectDeleteByImage($delete_id){
        $hotelSelectDeleteByImage ="SELECT image_hotel FROM `hotel` WHERE id = '$delete_id'";
        return $hotelSelectDeleteByImage;
    }
    public function hotelSelectDeleteById($delete_id){
        $hotelSelectDeleteById ="DELETE FROM `hotel` WHERE id ='$delete_id'";
        return $hotelSelectDeleteById;
    }
    
    
}

?>