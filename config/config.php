<?php
    // set these variables accordingly in respect to your MySQL server configuration
    define("DB_HOST", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "my_school");

    // creating connection
    $con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    
    // checking for connection
    if(!$con)
    {
        die(mysqli_connect_error());
    }
?>