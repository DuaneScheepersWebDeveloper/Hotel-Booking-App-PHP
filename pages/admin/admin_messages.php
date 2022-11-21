<?php
//http://localhost/oop-hotel-booking-app/pages/admin_page.php
$page_title = "Admin Messages";
include("../../inc/page_check.php");
include("../../inc/admin/admin_header.php");
include("../../inc/admin/admin_nav.php");
include("../../inc/admin/admin_messages.inc.php");
?>

<body>
  <section class="messages">
    <h1 class="title">Messages</h1>
    <div class="box-container">
      <?php
           $select_message = mysqli_query($connect->connect(), $messageAdmin->adminMessageSelectAll()) or die('query failed');
           if (mysqli_num_rows($select_message) > 0) {
             while ($fetch_message = mysqli_fetch_assoc($select_message)) {
           ?>
      <div class="box">
        <p> user id : <span>
            <?php echo $fetch_message['user_id']; ?>
          </span> </p>
        <p> name : <span>
            <?php echo $fetch_message['name']; ?>
          </span> </p>
        <p> number : <span>
            <?php echo $fetch_message['number']; ?>
          </span> </p>
        <p> email : <span>
            <?php echo $fetch_message['email']; ?>
          </span> </p>
        <p> message : <span>
            <?php echo $fetch_message['message']; ?>
          </span> </p>
        <a href="admin_messages.php?delete=<?php echo $fetch_message['id']; ?>"
          onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>

      </div>
      <?php
             }
             ;
           } else {
             echo '<p class="empty">you have no messages!</p>';
           }
           ?>
    </div>
  </section>
  <script src="../../static/js/admin.js"></script>
</body>

<?php include("../../inc/footer.php"); ?>