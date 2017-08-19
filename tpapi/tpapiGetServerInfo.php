<?php
    // Get the Server Info
    if(file_exists("tpapi/serverInfo.cfg")) {
        echo '<h1>FILE EXISTS</h1>';

        // Open file
        $tempFile = fopen("tpapi/serverInfo.cfg", "r") or die("Server Config could not be loaded.");

        // Make Text
        $_CFG_ADDRESS = fgets($tempFile);
        $_CFG_USER = fgets($tempFile);
        $_CFG_PASSKEY = fgets($tempFile);
        $_CFG_SCHEMA = fgets($tempFile);

        // Close File
        fclose($tempFile);
    }else if(file_exists("serverInfo.cfg")){
        echo '<h1>FILE EXISTS</h1>';

        // Open file
        $tempFile = fopen("serverInfo.cfg", "r") or die("Server Config could not be loaded.");

        // Make Text
        $_CFG_ADDRESS = fgets($tempFile);
        $_CFG_USER = fgets($tempFile);
        $_CFG_PASSKEY = fgets($tempFile);
        $_CFG_SCHEMA = fgets($tempFile);

        // Close File
        fclose($tempFile);
    }else {
        echo '<h1>FILE DOES NOT EXIST</h1>';
    }
?>