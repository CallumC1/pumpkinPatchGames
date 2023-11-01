<!DOCTYPE html>
<html lang="en" class="bg-background-500 font-Rubik">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Swiper CDN -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <title>PumpkinPatch Games</title>
</head>

<?php 
include("../handlers/setup_database.php");

session_start();

if (!isset($_SESSION["database_setup_done"])) {
    setup_database();
    var_dump($_SESSION);
};
?> 


<nav class="hidden md:block bg-background-800 h-24 px-10 w-full drop-shadow-xl overflow-hidden">
    <div class="container max-w-6xl mx-auto flex justify-between items-center h-full w-full">
        <a href="#" class="">
            <img src="../src/assets/PumpkinPatchLogo.png" alt="" class="w-20 object-center">
        </a>
        
        <ul class="flex gap-6 text-white font-semibold text-base">
            <li><a href="./index" id="index-link">Home</a></li>
            <li><a href="./catalogue" id="catalogue-link">Catalogue</a></li>
            <li><a href="./categories" id="categories-link">Categories</a></li>
            <li><a href="./launcher" id="launcher-link">Launcher</a></li>
        </ul>

        <a
        class="flex justify-center items-center bg-secondary-500 rounded-full w-10 h-10 " 
        href=<?php echo((!isset($_SESSION["username"])) ? "./login" : "./dashboard") ?> >
            <img src="../src/assets/feather-icons/user.svg" alt="" class="w-6 h-6">
        </a>
    </div>
</nav>


<!-- Mobile Nav -->
<div class="md:hidden  bg-background-800 h-16 px-5 w-full drop-shadow-xl overflow-hidden  flex justify-between align-middle" >
    <a href="./" class="text-accent-500 font-semibold my-auto">PumpkinPatch</a>
    <img src="../src/assets/feather-icons/menu.svg" alt="" class="w-10 h-10 my-auto cursor-pointer " id="nav-toggle" onclick="toggleMenu()">
</div>
<div class="absolute hidden md:hidden mobile-nav bg-black w-full h-screen right-0 z-50">
    <ul class="flex flex-col gap-6 text-white text-2xl h-full text-center mt-10">
        <li><a href="./index">Home</a></li>
        <li><a href="./catalogue">Catalogue</a></li>
        <li><a href="./categories">Categories</a></li>
        <li><a href="./launcher">Launcher</a></li>
        <!-- If logged in display Dashboard, Else display Login -->
        <?php
        
        if (!isset($_SESSION["username"])) {
            echo('<li><a href="./login">Login</a></li>');
        } else {
            echo('<li><a href="./dashboard">Dashboard</a></li>');
        };

        ?>
        
        
    </ul>
</div>

<script>
    function toggleMenu() {
        var menu = document.querySelector('.mobile-nav');
        var body = document.querySelector('body');

        if (menu.style.display === 'block') {
            menu.style.display = 'none';
            body.style.overflow = 'auto';

        } else {
            menu.style.display = 'block';
            body.style.overflow = 'hidden';
        }
    }
</script>


<script>

 // JavaScript
document.addEventListener("DOMContentLoaded", function () {
    const pagePath = window.location.pathname; // Get the current page path
    let pageName = pagePath.split("/").pop().replace(".php", ""); // Remove ".php" extension
    console.log(pageName)


    // Remove the "active" class from all links
    const links = document.querySelectorAll("ul li a");
    links.forEach(function (link) {
        link.classList.remove("active");
    });

    // Add the "active" class to the link matching the current page
    const activeLink = document.getElementById(`${pageName}-link`);
    if (activeLink) {
        activeLink.classList.add("border-b-2", "border-white");
    }
});



</script>