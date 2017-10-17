<?php

/**
 * TPAPI Trading Post API @version v0.1-a
 *
 * This class creates a new user record in the database using supplied information
 * If a user with the supplied name already exists, it prints that the username is already in use
 *
 * Requires tpapiDBConnector.php to interact with the database
 *
 * @author Tsadow Tom Castle <tsadowcreative@gmail.com>
 */

include_once 'tpapiDBConnector.php';

class tpapiCreateNewUser extends tpapiDBConnector{

    public function __construct($userName, $password){
        parent::__construct();

        $tempBoolean = $this->checkIfUserNameAvailable($userName);
        
        if($tempBoolean){
            $password = $this->hashPassword($password);

            $this->createNewUser($userName, $password);

            print "User successfully created";
        }else{
            print "Username already in use";
        }
        
    }

    private function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function createNewUser($userName, $password){
        $this->insertNewUser($userName, $password);
    }
}

$newUserName = $_GET['username'];
$newUserPassword = $_GET['password'];

$creator = new tpapiCreateNewUser($newUserName, $newUserPassword);

?>