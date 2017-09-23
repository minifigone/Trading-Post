<?php

/**
 * TPAPI Trading Post API v0.1-a
 *
 * This class handles verification that a user is logged in so components that require user information work correctly
 * Basically it checks that cookies are set
 *
 * Requires tpapiDBConnector.php to interact with the database
 *
 * @author Tsadow Tom Castle <tsadowcreative@gmail.com>
 */

include_once 'tpapiDBConnector.php';

class tpapiVerifyUser extends tpapiDBConnector{

}

?>