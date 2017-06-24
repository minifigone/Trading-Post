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

    /**
     * Inserts username and hashed password into the user table of the database
     */
    public function insertNewUser($name, $password){
        $sqlQuery = "
            INSERT INTO user
                (username, password)
            VALUES
                ('$username', '$password')
        ";
        $this->query($sqlQuery);
    }
    /**
     * Inserts a new hashed password for a given iduser into the user table of the database
     */
    public function insertNewPassword($idUser, $newPassword){
        $sqlQuery = "
            INSERT INTO user
                (password)
            VALUES
                ('$newPassword')
            WHERE iduser = '$idUser'
        ";
        $this->query($sqlQuery);
    }
    /**
     * Deletes listings for a given iduser from the listing table
     * Deletes sent mail for a given iduser from the mail table
     * Deletes received mail for a given iduser from the mail table
     * Deletes a given iduser from the user table
     */
    public function deleteUserAndListingsAndMail($idUser){
        $sqlQuery = "
            DELETE FROM listings
            WHERE iduser = '$idUser'
        ";
        $this->query($sqlQuery);
        $sqlQuery = "
            DELETE FROM mail
            WHERE idfrom = '$idUser'
        ";
        $this->query($sqlQuery);
        $sqlQuery = "
            DELETE FROM mail
            WHERE idto = '$isUser'        
        ";
        $this->query($sqlQuery);
        $sqlQuery = "
            DELETE FROM user
            WHERE iduser = '$idUser'
        ";
        $this->query($sqlQuery);
    }
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