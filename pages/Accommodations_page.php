<?php
$page_title = "Home";
include("../inc/home_header.php");
//In accommodations this is where you can see an extensive list of all the hotels you can book.
?>

<body>
    <?php
include("../inc/home_nav.inc.php");
include("../inc/Accommodations.inc.php");
?>
    <script src="../static/js/home.js"></script>
</body>
<?php
include("../inc/home_footer.php");
include("../inc/footer.php");
?>