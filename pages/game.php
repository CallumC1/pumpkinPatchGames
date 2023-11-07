<?php include '../components/header.php'; ?>

<body>

<?php

if (isset($_GET['game_id'])) {
    $game_id = $_GET['game_id'];
} else {
    echo "Game ID is not specified in the URL.";
}

?>


<?php
    include '../handlers/connect_database.php';

    $connection = connect_to_database();
    // This SQL needs securing / preparing
    // Pretty sure it is secure now.

    $query = "SELECT * FROM games WHERE game_id = ?";

    if ($stmt = $connection->prepare($query)) {
        $stmt->bind_param("i", $game_id);

        if ($stmt->execute()) {
            echo ("Selected the game!");
        }
        

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $title = $row["game_title"];
        $genre = $row["game_genre"];
        $description = $row["game_description"];
        $price = $row["game_price"];

        $stmt->close();
    }
    $connection->close();
?>

<div class="grid grid-cols-3 max-w-7xl mx-auto text-white my-10">
<!--  Two Columns - LEft column will be large. Right will be small for buying the game -->
    <div class="col-span-2 p-5">
        <h1 class="text-2xl font-semibold"><?= $title ?></h1>
        <p class="bg-accent-500 w-fit px-2 text-xs rounded-sm"><?= $row["game_genre"] ?></p>

        <!-- Large Hero Img -->
        <div class="w-full h-fit my-4">
            <img src="<?= $row["game_thumbnail_path"] ?>" alt="" class="h-full w-full object-cover aspect-[4/2]">
        </div>

        <span class="flex justify-between">
            <h2 class="text-lg"><?= $row["game_title"] ?></h2>
            <p class="bg-green-500 px-2 rounded-sm my-auto">£<?= $row["game_price"] ?></p>
        </span>
        <p class="text-sm ml-0.5 mt-3"><?= $row["game_description"] ?></p>

    </div>

    <!-- Purchase -->
    <div class="flex col-span-1 items-center justify-center">
        <div class="bg-background-800 drop-shadow-md rounded-lg h-96 w-3/4 flex flex-col gap-3 items-center justify-center">
            <p class="text-accent-500 text-xl font-semibold">Pumpkin Patch</p>
            <a class="text-center bg-zinc-800 py-3 mx-auto w-4/5 rounded-md text-white font-semibold" href="./checkout?game_id=<?=$row["game_id"] ?>">Buy Now</a>
            <button class="bg-transparent border-2 border-white py-3 mx-auto w-4/5 rounded-md text-white font-semibold">Add to Cart</button>
            <button class="bg-transparent border-2 border-white w-8 h-8 flex justify-center items-center rounded-lg hover:bg-red-800"><img src="../src/assets/feather-icons/heart.svg" alt="Favorite Button" class="w-4 h-4 fill-red-800"></button>
            <div class="text-black text-sm px-5 mx-auto">
                <span class="flex">
                    <p class="my-auto text-white">Every £5 = 1 Tree planted </p>
                    <img src="../src/assets/misc-icons/treeIcon.png" alt="" class="w-6 h-6 my-auto">
                </span>
                <p class="text-white">You could plant <?= round($row["game_price"]/5) ?> trees from this purchase.</p>
                <a class="text-primary-800 text-xs " href="./buyers-guarantee">Protected by our <u>Buyers Guarantee</u></a>
            </div>
        </div>
    </div>
</div>

<?php include '../components/footer.php'; ?>

</body>
</html>