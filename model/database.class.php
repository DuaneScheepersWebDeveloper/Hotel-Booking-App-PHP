<?php
class DatabaseConnect{

    private $serverName;
    private $userName;
    private $dbPassword;
    private $dbName;

    public function connect(){
        $this->serverName="localhost";
        $this->userName="root";
        $this->dbPassword="";
        $this->dbName="oop-hotel-booking-app-login-db";

        $conn = new mysqli( $this->serverName ,$this->userName,$this->dbPassword,$this->dbName);
        return $conn;
        
    }
}
?>