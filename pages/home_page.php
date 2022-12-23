<?php
//P
//http://localhost/oop-hotel-booking-app/pages/home_page.php
$page_title = "Home";
//you have to put the session in
include("../inc/home_header.php");
?>

<body>
    <?php
    //The home page
include("../inc/home_nav.inc.php");
include("../inc/home.inc.php");
?>
    <?php include("../inc/home_footer.php"); ?>
</body>
<?php
include("../inc/footer.php");
?>