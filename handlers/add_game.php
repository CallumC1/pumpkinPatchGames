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
$uploadedFile = $uploadDir . basename($_FILES["game_img"]["name"]);

if (move_uploaded_file($_FILES["game_img"]["tmp_name"], $uploadedFile)) {
    echo("File valid. Uploaded to userUploads/");
} else {
    echo(" File upload failed.");
}

$imageData = file_get_contents($uploadedFile);

// If this doesnt send the echo were good to go i think.
if ($imageData == false) {
    echo("Error reading the uploaded file.");
    exit(1);
}

// Connect to Db after user authed & valid request methord ensured.
require "./connect_database.php";
$connection = connect_to_database();

$query = "INSERT INTO games (game_title, game_description, game_price, game_thumbnail_binary, games_binary_2) VALUES(?, ?, ?, ?, ?)";

if ($addGameStmt = $connection->prepare($query)) {
    $title = $_POST["game_title"];
    $description = $_POST["game_description"];
    $price = $_POST["game_price"];
    $test = "tt";

    $addGameStmt->bind_param("ssdss", $title, $description, $price, $test, $imageData);

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
<!-- <img src="data:image/jpeg;base64,<?php echo(base64_encode($imageData)); ?>" alt=""> -->