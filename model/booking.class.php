<?php 
class BookingClass{

    public function bookingsSelectAll(){
        $selectAll= "SELECT * FROM `bookings`";
        return $selectAll; 
    }

    public function bookingDelete($delete_id){
        $bookingDelete= "DELETE FROM `bookings` WHERE id='$delete_id' ";
        return $bookingDelete; 
    }

    public function bookingUpdate($update_payment,$booking_update_id){
        $bookingUpdate= "  UPDATE `bookings` SET payment_status ='$update_payment' WHERE id ='$booking_update_id'";
        return $bookingUpdate; 
    }
  
}
?>