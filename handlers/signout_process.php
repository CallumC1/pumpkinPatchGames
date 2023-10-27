<?php
session_start();

header("Location: ../pages/signedout");

unset($_SESSION['username']);

?>