<?php include '../components/header.php'; ?>

<body>

<?php

if (isset($_GET['game_id'])) {
    $game_id = $_GET['game_id'];
} else {
    echo "Game ID is not specified in the URL.";
}

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


<div class="flex justify-center my-10 mx-auto w-full">
    <div class="grid grid-cols-2 bg-slate-200 w-[40rem] h-80 rounded-sm ">
        <div class="flex flex-col justify-center mx-auto">
            <h1 class="text-md font-semibold">Checkout</h1>
            <span class="border-t-2 border-gray-700"></span>
            <p class="text-xs"><?= $title ?></p>
            <p class="text-xs">Price: <?= $price ?></p>
            <p class="text-xs">ID: #<?= $game_id ?></p>

            <p class="text-sm mt-3">Fancy monthly treats?</p>
            <p class="text-xs"><b>Pumpkin pass</b> for just £4.99 a month!</p>
            <span class="flex">
                <input name="pumpkinPass" type="checkbox" class="">
                <p class="text-xs my-auto">Click to add subscription.</p>
            </span>
        </div>
        <!-- Extra div to get border line -->
        <div class="flex flex-col justify-center mx-auto gap-y-3 w-full border-l-2 border-black">
            <div class="flex flex-col justify-center mx-auto gap-y-3">
                <p class="text-xl font-semibold text-orange-600">Mastercard</p>
                <input type="text" placeholder="Card Number" class=" ml-1 rounded-sm drop-shadow-sm">
                <span class="flex justify-between">
                    <input type="text" placeholder="Expiry Date" class="w-24 ml-1 rounded-sm drop-shadow-sm">
                    <input type="text" placeholder="CVC" class="w-16 ml-1 rounded-sm drop-shadow-sm">
                </span>
                <button class="bg-green-700 drop-shadow-lg px-14 py-2 rounded-sm">Pay £<?= $price ?></button>
            </div>
        </div>
    </div>

</div>


<?php include '../components/footer.php'; ?>

</body>
</html>