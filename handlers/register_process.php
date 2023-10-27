<?php

include '../handlers/connect_database.php';
$connection = connect_to_database(); // Assuming this function returns the database connection.

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, password) VALUES(?, ?)";

    if ($statement = $connection->prepare($query)) {
        $statement->bind_param("ss", $username, $hashed_password);

        if ($statement->execute()) {
            // Successful
            echo ("Inserted data into the database.");

            header("Location: ../pages/");

        } else {
            echo ("Error: " . $statement->error);
        }

        $statement->close();
    } else {
        echo "Error in something.";
    }
}

$connection->close();

?>