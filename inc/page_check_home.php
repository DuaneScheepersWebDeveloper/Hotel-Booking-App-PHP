<?php 
include("../model/database.class.php");
$connect = new DatabaseConnect();
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
}

?>