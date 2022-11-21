<?php
//The logout page
session_start();
session_unset();
session_destroy();

header('location:login_page.php');

?>