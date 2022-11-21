<?php
session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location:login_page.php');
}
include('../../model/database.class.php');
include('../../model/booking.class.php');
include('../../model/users.class.php');
include('../../model/hotels.class.php');
include('../../model/message.class.php');

$booking = new BookingClass();
$connect = new DatabaseConnect();
$adminUser = new AdminUserClass();
$hotelAdmin = new HotelClass();
$messageAdmin = new MessageUserClass();
?>