<?php

class tpapiDBConnector{

    private $_dbAddress;
    private $_dbUser;
    private $_dbPasskey;
    private $_dbSchema;

    private $_connection;

    public function __construct(){
        $_dbAddress = "127.0.0.1:3306";
        $_dbUser = "client";
        $_dbPasskey = "clientinsert";
        $_dbSchema = "items_site_data";

        $this->_connection = new mysqli($_dbAddress, $_dbUser, $_dbPasskey, $_dbSchema);

        if(!$this->_connection){
            echo "Unable to connect to database" . PHP_EOL;
            echo "Debug errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debug error: " . mysqli_connect_error() . PHP_EOL;
        }
    }

    private function query($query){
        return $this->_connection->query($query);
    }

    /**
     * Inserts username and hashed password into the user table of the database
     */
    public function insertNewUser($name, $password){
        $sqlQuery = "
            INSERT INTO user
                (username, userpassword)
            VALUES
                ('$name', '$password')
        ";
        $this->query($sqlQuery);
    }
    /*
     * Checks where a username is taking by attempting to select that username from the database
     * Returns true if the username is available, false if it is taken
     */
    public function checkIfUserNameAvailable($username){
        $sqlQuery = "
            SELECT FROM user
            WHERE username = '$username'
        ";
        $ret = $this->query($sqlQuery);
        return ($ret === FALSE ? true : false);
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
    /**
     * Inserts into the listing table a new listing based on given:
     *  iduser, title, description, price, and barter
     */
    public function insertNewListing($idUser, $title, $description, $price, $barter){
        $sqlQuery = "
            INSERT INTO listing
                (iduser, title, description, price, barter)
            VALUES
                ('$idUser', '$title', '$description', '$price', '$barter')
        ";
        $this->query($sqlQuery);
    }
    /**
     * Deletes a listing from the listing based on a given idlisting
     */
    public function deleteListing($idListing){
        $sqlQuery = "
            DELETE FROM listing
            WHERE idlisting = '$idListing'
        ";
        $this->query($sqlQuery);
    }
    /*
     * Selects all listings from the listing table and returns them ordered by most recently posted
     */
    public function selectAllListingsByMostRecent(){
        $sqlQuery = "
            SELECT *
            FROM listing
            ORDER BY idlisting DESC
        ";
        return $this->query($sqlQuery);
    }
    /*
     * Selects the three most recent listings from the listing table and returns them ordered by most recently posted
     */
    public function select3ListingsByMostRecent(){
        $sqlQuery = "
            SELECT *
            FROM listing
            ORDER BY idlisting DESC
            LIMIT 3
        ";
        return $this->query($sqlQuery);
    }
    /*
     * Selects all listings from the listing table based on a given userid
     * Return is ordered by most recently posted
     */
    public function selectAllListingsByUser($userId){
        $sqlQuery = "
            SELECT *
            FROM listing
            WHERE iduser = '$idUser'
            ORDER BY idlisting DESC
        ";
        return $this->query($sqlQuery);
    }
    /*
     * Selects all listings that match a given search term in title or description
     * Return is ordered by most recently posted
     */
    public function selectSearchTerm($searchTerm){
        $sqlQuery = "
            SELECT *
            FROM listing
            WHERE title LIKE '%$searchTerm%'
                OR description LIKE '%$searchTerm%'
            ORDER BY idlisting DESC
        ";
        return $this->query($sqlQuery);
    }
    /*
     * Inserts new mail message containing idusers for the sender and receiver, and the title and body of the message
     */
    public function insertNewMessage($to, $from, $title, $body){
        $sqlQuery = "
            INSERT INTO mail
                (idfrom, idto, title, message, beenread)
            VALUES
                ($from, $to, '$title', '$body', 0)
        ";
        $this->query($sqlQuery);
    }
    /*
     * Selects all mail sent to a given userid
     */
    public function selectAllMailToUser($idUser){
        $sqlQuery = "
            SELECT *
            FROM mail
            WHERE idto = '$idUser'
            ORDER BY idmail DESC
        ";
        return $this->query($sqlQuery);
    }
    /*
     * Changes the read status of a mail message from unread to read
     */
    public function markMailRead($idMail){
        $sqlQuery = "
            INSERT INTO mail
                (beenread)
            VALUES
                (1)
        ";
        $this->query($sqlQuery);
    }
    /*
     * Selects the username for a given iduser
     */
    public function selectUserNameForUserId($idUser){
        $sqlQuery = "
            SELECT username
            FROM user
            WHERE username = '$idUser'
        ";
        return $this->query($sqlQuery);
    }
    /*
     * Selects all mail from a specific conversation (common to and from users)
     */
    public function selectMailForToUserAndFromUser($toUser, $fromUser){
        $sqlQuery = "
            SELECT *
            FROM mail
            WHERE 
                (idto = '$toUser'
                AND idfrom = '$fromUser')
                OR
                (idto = '$fromUser'
                AND idfrom = '$toUser')
            ORDER BY idmail DESC
        ";
        return $this->query($sqlQuery);
    }
    /*
     * Selects information for a given username to be used to verify a login
     */
    public function getUserInfoForVerification($username){
        $sqlQuery = "
            SELECT *
            FROM user
            WHERE username='$username'
        ";
        return $this->query($sqlQuery);
    }
}

?>