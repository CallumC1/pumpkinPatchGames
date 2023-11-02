<?php
session_start();
include '../handlers/connect_database.php';
$connection = connect_to_database(); // Assuming this function returns the database connection.

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if(password_verify($password, $row["password"])) {
                // If password matches - Login user.
                $_SESSION["username"] = $row["username"];
                $_SESSION["user_type"] = $row["user_type"];

                // For added security against some attacks.
                session_regenerate_id();                
                header("Location: ../pages/dashboard"); 
            } else {
                echo("Wrong username & password.");
            }
        }
    } else {
        echo("Username does not exit.");
    }

}
