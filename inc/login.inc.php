<?php 
include('../model/database.class.php');
if(isset($_POST['submit'])){
    $connect = new DatabaseConnect();
    $login_email = mysqli_real_escape_string($connect->connect(), $_POST['login_email']);
    $login_password = mysqli_real_escape_string($connect->connect(), md5($_POST['login_password']));
  
    $select_users = mysqli_query($connect->connect(), "SELECT * FROM `users` WHERE user_email = '$login_email' AND user_password = '$login_password'") or die('query failed');
    if(mysqli_num_rows($select_users) > 0){
 
     $row = mysqli_fetch_assoc($select_users);
 //logic that allows you to login into admin or homepage
     if($row['user_type'] == 'admin'){
         $_SESSION['admin_id'] = $row['id'];
         $_SESSION['admin_name'] = $row['user_name'];
         $_SESSION['admin_email'] = $row['user_email']; 
        header('location:admin/admin_page.php');
     }elseif($row['user_type'] == 'user'){
         $_SESSION['user_id'] = $row['id'];
         $_SESSION['user_name'] = $row['user_name'];
         $_SESSION['user_email'] = $row['user_email'];
       
        header('location:home_page.php');
     }
 
  }else{
     $message[] = 'incorrect email or password!';
  }
 }
?>