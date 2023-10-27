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

?>