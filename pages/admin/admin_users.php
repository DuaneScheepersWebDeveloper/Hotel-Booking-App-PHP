<?php
//http://localhost/oop-hotel-booking-app/pages/admin_page.php
$page_title = "Admin Users";
require("../../inc/page_check.php");
require("../../inc/admin/admin_header.php");

?>

<body>
    <?php
    require("../../inc/admin/admin_nav.php");
    include("../../inc/admin/admin.user.inc.php");
    ?>

    <section class="users">
        <h1 class="title">User's account</h1>
        <div class="box-container">
            <?php
        $select_users = mysqli_query($connect->connect(), $adminUser->adminUserSelectAll()) or die('query failed');
        while ($fetch_users = mysqli_fetch_assoc($select_users)) {
        ?>
            <div class="box">
                <p> User id : <span>
                        <?php echo $fetch_users['id']; ?>
                    </span> </p>
                <p> username : <span>
                        <?php echo $fetch_users['user_name']; ?>
                    </span> </p>
                <p> email : <span>
                        <?php echo $fetch_users['user_email']; ?>
                    </span> </p>
                <p> user type : <span
                        style="color:<?php if ($fetch_users['user_type'] == 'admin') {
                echo 'var(--orange)';
            } ?>">
                        <?php echo $fetch_users['user_type']; ?>
                    </span> </p>
                <a href="admin_users.php?delete=<?php echo $fetch_users['id']; ?>"
                    onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
            </div>

            <?php
        }
        ;
        ?>
        </div>
    </section>

</body>
<script src="../../static/js/admin.js"></script>
<?php include("../../inc/footer.php"); ?>