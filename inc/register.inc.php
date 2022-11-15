<?php 
include('../model/database.class.php');

if(isset($_POST['submit'])){

    $connect = new DatabaseConnect();
    $login_name = mysqli_real_escape_string($connect->connect(), $_POST['login_name']);
    $login_email = mysqli_real_escape_string($connect->connect(), $_POST['login_email']);
    $login_password = mysqli_real_escape_string($connect->connect(), md5($_POST['login_password']));
    $login_cpassword = mysqli_real_escape_string($connect->connect(), md5($_POST['login_cpassword']));
    $user_type = $_POST['user_type'];
 
    $select_users = mysqli_query($connect->connect(), "SELECT * FROM `users` WHERE user_email = '$login_email' AND user_password = '$login_password'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
       $message[] = 'user already exist!';
    }else{
       if($login_password != $login_cpassword){
          $message[] = 'confirm password not matched!';
       }else{
          mysqli_query($connect->connect(), "INSERT INTO `users`(user_name, user_email, user_password, user_type) VALUES('$login_name', '$login_email', '$login_cpassword', '$user_type')") or die('query failed');
          $message[] = 'registered successfully!';
       }
    }
 }
?>