<?php
class AdminUserClass
{

    public function adminUserSelectAll()
    {
        $selectAllAdminUser = "SELECT * FROM `users`";
        return $selectAllAdminUser;
    }
    public function adminUserDelete($delete_id)
    {
        $adminUserDelete = "DELETE FROM `users` WHERE id = '$delete_id'";
        return $adminUserDelete;
    }
}
?>