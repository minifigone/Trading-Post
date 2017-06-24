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

    private function query($query){
        $ret = array();

        if(is_object($result = $this->connection->query($query))){
            while($row = $result->fetch_assoc()){
                $ret[] = $row;
            }

            $result->free();
        }

        return $ret;
    }

    //TODO: Create User
    //TODO: Change User Password
    //TODO: Delete User
    //TODO: Create Listing
    //TODO: Delete Listing
    //TODO: Get All Listings
    //TODO: Get All Listings By User
    //TODO: Search Listings
    //TODO: Send Mail
    //TODO: Get Mail For User
    //TODO: Mark Mail Read
    //TODO: Get User Name For User Id

}

?>