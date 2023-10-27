<?php include '../components/header.php'; ?>

<?php require '../handlers/authentication.php';
requireAuthentication();
?>

<body>

    <div class="container max-w-7xl mx-auto">
        <h1 class="text-white text-xl">User dashboard</h1>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-4 gap-3 text-white">
        <div class="row-span-2 bg-accent-400 p-3">
            <p class="text-white">Username: <?php echo($_SESSION["username"]);?></p>

            <a class="text-white text-xs bg-background-500 py-1 px-2 rounded-md" href="../handlers/signout_process.php">
                Sign out?
            </a>
        </div>
        <div class="py-5 bg-white">2</div>
        <div class="py-5 bg-white">3</div>
        <div class="py-5 bg-white">4</div>
        <div class="py-5 bg-white">5</div>
    </div>




    <?php include '../components/footer.php'; ?>

</body>
</html>