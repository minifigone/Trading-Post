<?php

class dbConnector{

    private static $_dbAddress = "127.0.0.1";
    private static $_dbUser = "client";
    private static $_dbPasskey = "clientinsert";
    private static $_dbSchema = "items_site_data";

    private $_connection;

    public function dbConnector(){
        $this->_connection = mysqli_connect($this->_dbAddress, $this->_dbUser, $this->_dbPasskey, $this->_dbSchema);

        if(!$this->_connection){
            echo "Unable to connect to database" . PHP_EOL;
            echo "Debug errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debug error: " . mysqli_connect_error() . PHP_EOL;
        }
    }

}

?>