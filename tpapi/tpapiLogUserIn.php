<?php

/**
 * TPAPI Trading Post API @version v0.1-a
 *
 * This class handles logging a user in, including
 * - Verifying that the username and password match the records in the database
 * - Setting cookies so other pages know what user is logged in
 *
 * Requires tpapiDBConnector.php to interact with the database
 *
 * @author Tsadow Tom Castle <tsadowcreative@gmail.com>
 */

include_once 'tpapiDBConnector.php';

class tpapiLogUserIn extends tpapiDBConnector{

    private $_COOKIE_TIMEOUT;
    private $_COOKIE_NAME;

    public function __construct($username, $password){
        parent::__construct();

        $this->_COOKIE_TIMEOUT = (86400 * 5); // 86400 is 1 day
        $this->_COOKIE_NAME = "user";

        $b = $this->verify($username, $password);
        if((int)$b == 1){
            //set cookies
            setcookie($this->_COOKIE_NAME, $username, time() + $this->_COOKIE_TIMEOUT, "/");
            //relay a message that password was correct
            print 'Login Successful.' . PHP_EOL;
        }else{
            //relay a message that password was incorrect
            print 'Password Incorrect.' . PHP_EOL;
        }
    }

    public function verify($username, $password){
        $re = $this->getUserInfoForVerification($username);
        $ar = mysqli_fetch_array($re);
    
        return password_verify($password, $ar[2]);
    }
}

// $test = new tpapiLogUserIn('anewtest', 'anewtest');
$username = $_GET['username'];
$password = $_GET['password'];

$login = new tpapiLogUserIn($username, $password);

?>