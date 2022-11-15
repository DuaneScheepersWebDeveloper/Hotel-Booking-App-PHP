<?php
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($connect->connect(), $messageAdmin->adminMessageDelete($delete_id)) or die('query failed');
    header('location:admin_messages.php');
 }
?>