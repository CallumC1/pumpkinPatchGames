<?php
// This function will get run when a user who doesnt have a db set up loads the site.

function setup_database() {
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "pumpkinPatchGames";

    $connection = new mysqli($hostname,$username,$password);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Try to set up database if it doesn't exist.
    $createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $dbName";
    if ($connection->query($createDatabaseQuery) === TRUE) {
        if ($connection->affected_rows > 0) {
            // Created a fresh new DB.
            echo $dbName . " Database was created.";


            // Connect to the pumpkinPatchGames database
            mysqli_select_db($connection, $dbName);

            // Create users table
            $createUsersTable = "CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                user_type VARCHAR(255),
                created_at TIMESTAMP
            );";

            if ($connection->query($createUsersTable) === TRUE) {
                echo "Table users created successfully.";
            } else {
                echo "Error creating users table: " . $connection->error;
            }

            $createGamesTable = "CREATE TABLE games (
                game_id INT PRIMARY KEY AUTO_INCREMENT,
                game_title VARCHAR(255) NOT NULL,
                game_description TEXT NOT NULL,
                game_price DECIMAL(3, 2) NOT NULL,
                game_thumbnail_binary VARBINARY(65535)
            ); ";

            if ($connection->query($createGamesTable) === TRUE) {
                echo "Table games created successfully.";
            } else {
                echo "Error creating games table: " . $connection->error;
            }
            
        } else {
            // Database already exists. Continue as usual.
            echo  $dbName . " Database already exists.";
        }
    } else {
        die("Uh oh! Error creating database: " . $connection->error);
    }

    $_SESSION["database_setup_done"] = true;

    $connection->close();
}

?>