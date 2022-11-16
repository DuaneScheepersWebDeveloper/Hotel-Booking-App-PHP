<?php
//http://localhost/oop-hotel-booking-app/pages/home_page.php
$page_title = "Home";
//you have to put the session in
require("../inc/page_check_home.php");
include("../inc/home_header.php");
?>
<body>
<?php 
include("../inc/home_nav.inc.php"); 
include("../inc/home.inc.php");
?>

</body>
<script src="../static/js/home.js"></script>

<?php 
include("../inc/home_footer.php"); 
include("../inc/footer.php"); 
?>