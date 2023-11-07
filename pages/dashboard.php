<?php include '../components/header.php'; ?>

<?php require '../handlers/authentication.php';
requireAuthentication();
?>

<body>

    <div class="container max-w-7xl mx-auto">
        <h1 class="text-white text-xl">User dashboard</h1>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-4 gap-3 my-20 text-white">
        <div class="row-span-2 bg-accent-400 p-3">
            <p class="text-white">Username: <?php echo($_SESSION["username"]);?></p>
            <p class="text-white">User Type: <?php echo(!empty($_SESSION["user_type"]) ? $_SESSION["user_type"] : "Member"); ?></p>

            <a class="text-white text-xs bg-background-500 py-1 px-2 rounded-md" href="../handlers/signout_process.php">
                Sign out?
            </a>
        </div>

        <div class="py-5 bg-white">2</div>
        <div class="py-5 bg-white">3</div>
        <div class="py-5 bg-white">4</div>
        <div class="py-5 bg-white">5</div>
    </div>

    <?php if($_SESSION["user_type"] == "admin"):  ?>
            <div class="">
                <p class="text-white">You are an admin</p>
                <form
                method="POST"
                action="../handlers/add_game.php"
                enctype="multipart/form-data"
                class="bg-system-error w-96 h-80 flex flex-col">
                    <label for="game_title">Game Title</label>
                    <input type="text" name="game_title" placeholder="Game Title" required>
                    
                    <label for="game_dexcription">Game Description</label>
                    <input type="text" name="game_description" placeholder="Game Description" required>

                    <label for="game_genre">Game Genre</label>
                    <input type="string" name="game_genre" placeholder="Game Genre" required>
                    
                    <label for="game_title">Game Price</label>
                    <input type="number" name="game_price" min="0" max="999" step="any" value="0" required>
                    
                    <label for="game_img">Game Image</label>
                    <input type="file" name="game_img" accept="image/jpeg, image/jpg" required>
                
                    <button type="submit" class="bg-primary-50 mt-3">Add game.</button>
                </form>
            </div>
        <?php endif; ?>




    <?php include '../components/footer.php'; ?>

</body>
</html>