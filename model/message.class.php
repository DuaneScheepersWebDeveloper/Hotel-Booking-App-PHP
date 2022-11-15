<?php 
class MessageUserClass{
    public function adminMessageSelectAll(){
        $adminMessageSelectAll= "SELECT * FROM `message`";
        return $adminMessageSelectAll; 
    }
    public function adminMessageDelete($delete_id){
        $adminMessageDelete="DELETE FROM `message` WHERE id = '$delete_id'";
        return $adminMessageDelete; 
    }
}
?>