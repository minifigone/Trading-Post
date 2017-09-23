<?php

/**
 * TPAPI Trading Post API v0.1-a
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

}

?>