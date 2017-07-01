<?php

include_once 'tpapiDBConnector.php';

class tpapiCreateNewUser extends tpapiDBConnector{

    public function __construct($userName, $password){
        parent::__construct();

        if($this->checkIfUserNameAvailable($userName)){
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