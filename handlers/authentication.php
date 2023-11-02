<?php

function isUserAuthenticated() {
    return isset($_SESSION["username"]);
}

function requireAuthentication() {
    if (!isUserAuthenticated()) {
        // Redirect the user to the login page or display an error message
        header("Location: ./login.php");
        exit();
    }
}

function getUserType() {
    if (!empty($_SESSION["user_type"])) {
        return $_SESSION["user_type"];
    } else {
        return "No User Type";
    }
}

?>