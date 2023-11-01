<?php

function connect_to_database() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "pumpkinPatchGames";

    try {
        $connection = new mysqli($hostname,$username,$password); 
    } catch (mysqli_sql_exception $e) {
        header("Location: ../pages/db-error.php");
        echo ("Database connection failed: " . $e->getMessage());
    }

    // Connect to the pumpkinPatchGames database
    mysqli_select_db($connection, $dbName);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    return $connection;
}

?>