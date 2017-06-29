<?php

include_once 'tpapiDBConnector.php';

class tpapiCreateNewUser extends tpapiDBConnector{

    public function tpapiCreateNewUser($userName, $password){
        parent::tpapiDBConnector();

        $password = hashPassword($password);

        createNewUser($userName, $password);
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