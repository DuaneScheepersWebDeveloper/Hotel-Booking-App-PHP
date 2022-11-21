<?php
//http://localhost/oop-hotel-booking-app/pages/admin_page.php
$page_title = "Admin Panel";

include("../../inc/page_check.php");
include("../../inc/admin/admin_header.php");

?>

<body>
    <div class='admin_page'>
        <?php include("../../inc/admin/admin_nav.php"); ?>
        <section class="dashboard">
            <h1 class="title">dashboard</h1>
            <div class="box-container">
                <div class="box">
                    <?php
$total_pendings = 0;
$select_pending = mysqli_query($connect->connect(), "SELECT total_price FROM `bookings` WHERE payment_status = 'pending'") or die('query failed');
if (mysqli_num_rows($select_pending) > 0) {
    while ($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
        $total_price = $fetch_pendings['total_price'];
        $total_pendings += $total_price;
    }
    ;
}
;
?>
                    <h3>€
                        <?php echo $total_pendings; ?> /-
                    </h3>
                    <p>total pendings</p>
                </div>

                <div class="box">
                    <?php
$total_completed = 0;
$select_completed = mysqli_query($connect->connect(), "SELECT total_price FROM `bookings` WHERE payment_status = 'completed'") or die('query failed');
if (mysqli_num_rows($select_completed) > 0) {
    while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
        $total_price = $fetch_completed['total_price'];
        $total_completed += $total_price;
    }
    ;
}
;
?>
                    <h3>€
                        <?php echo $total_completed; ?> /-
                    </h3>
                    <p>completed payments</p>
                </div>

                <div class="box">
                    <?php
$select_bookings = mysqli_query($connect->connect(), "SELECT * FROM `bookings`") or die('query failed');
$number_of_bookings = mysqli_num_rows($select_bookings);
?>
                    <h3>
                        <?php echo $number_of_bookings; ?>
                    </h3>
                    <p>Bookings placed</p>
                </div>

                <div class="box">
                    <?php
$select_hotels = mysqli_query($connect->connect(), "SELECT * FROM `hotel`") or die('query failed');
$number_of_hotels = mysqli_num_rows($select_hotels);
?>
                    <h3>
                        <?php echo $number_of_hotels; ?>
                    </h3>
                    <p>Hotel entries added</p>
                </div>

                <div class="box">
                    <?php
$select_users = mysqli_query($connect->connect(), "SELECT * FROM `users` WHERE user_type='user'") or die('query failed');
$number_of_users = mysqli_num_rows($select_users);
?>
                    <h3>
                        <?php echo $number_of_users; ?>
                    </h3>
                    <p>Users</p>
                </div>

                <div class="box">
                    <?php
$select_admin = mysqli_query($connect->connect(), "SELECT * FROM `users` WHERE user_type='admin'") or die('query failed');
$number_of_admin = mysqli_num_rows($select_admin);
?>
                    <h3>
                        <?php echo $number_of_admin; ?>
                    </h3>
                    <p>Admin Users</p>
                </div>

                <div class="box">
                    <?php
$select_account = mysqli_query($connect->connect(), "SELECT * FROM `users`") or die('query failed');
$number_of_account = mysqli_num_rows($select_account);
?>
                    <h3>
                        <?php echo $number_of_account; ?>
                    </h3>
                    <p>Total Users</p>
                </div>

                <div class="box">
                    <?php
$select_messages = mysqli_query($connect->connect(), "SELECT * FROM `message`") or die('query failed');
$number_of_messages = mysqli_num_rows($select_messages);
?>
                    <h3>
                        <?php echo $number_of_messages; ?>
                    </h3>
                    <p>New Messages</p>
                </div>

            </div>

        </section>
    </div>
</body>
<script src="../../static/js/admin.js"></script>
<?php include("../../inc/footer.php"); ?>