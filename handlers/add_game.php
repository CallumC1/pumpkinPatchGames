<?php
session_start();
require "./authentication.php";
echo ("user type: " . getUserType());
if (getUserType() != "admin") { 
    header("Location: ../pages/index.php");
    exit();
}

if (!$_SERVER["REQUEST_METHOD"] == "POST") {
    echo ("Invalid Request Method.");
    exit();
};

// Handle Image upload
// Gets the image from the post object & uploads it to the userUploads folder.
$uploadDir = "../userUploads/";
$tempFileName = $_FILES["game_img"]["tmp_name"];
$originalFileName = $_FILES["game_img"]["name"];

$imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

if($imageFileType == "jpeg"|| $imageFileType == "jpg") {
    $newFileName = uniqid() . "." . $imageFileType;
    $newFilePath = $uploadDir . $newFileName;

    if (move_uploaded_file($tempFileName, $newFilePath)) {
        echo ("File uploaded & renamed.");
    } else {
        echo ("Error whilst uploading file.");
    }
} else { 
    echo ("Only JPG or JPEG file types are supported.");
}


// Connect to Db after user authed & valid request methord ensured.
require "./connect_database.php";
$connection = connect_to_database();

$query = "INSERT INTO games (game_title, game_description, game_price, game_thumbnail_path) VALUES(?, ?, ?, ?)";

if ($addGameStmt = $connection->prepare($query)) {
    $title = $_POST["game_title"];
    $description = $_POST["game_description"];
    $price = $_POST["game_price"];
    $game_thumbnail_path = $newFilePath;
    $game_genre = $_POST["game_genre"];

    $addGameStmt->bind_param("ssdss", $title, $description, $price, $game_thumbnail_path, $game_genre);

    if ($addGameStmt->execute()) {
        echo "New record created successfully";
        echo($imageData);
    } else {
        echo "Error executing statement: " . $addGameStmt->error;
    };

    // Close statement
    $addGameStmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

$connection->close();

header("Location: ../pages/dashboard.php");
?>