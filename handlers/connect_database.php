<?php

function connect_to_database() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "pumpkinPatchGames";

    $connection = new mysqli($hostname,$username,$password);

    // Connect to the pumpkinPatchGames database
    mysqli_select_db($connection, $dbName);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    return $connection;
}

?>