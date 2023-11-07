<?php
include '../components/header.php';
include '../handlers/connect_database.php';

$connection = connect_to_database();
?>

<?php

$query = "SELECT * FROM games";

$stmt = $connection->prepare($query);

if ($stmt):
    $stmt->execute();
    $result = $stmt->get_result();

?>
<body>

<h1 class="text-white font-semibold text-2xl my-10 text-center">Browse Games</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 grid-rows-auto gap-4 max-w-7xl mx-auto">
    <!-- Card Template -->
    <?php while ($row = $result->fetch_assoc()):?>
    <div class="group flex flex-col bg-background-700 transition-all ease-in shadow-md shadow-black  hover:shadow-accent-500 rounded-sm overflow-hidden">
        <!-- Game Thumbnail -->
        <div class="relative w-full h-fit">
            <img class="block object-cover aspect-[4/2]" src="<?= $row["game_thumbnail_path"] ?>" alt="">
            <p class="absolute top-0 right-0 w-fit bg-accent-500 rounded-bl-md px-2 text-black font-semibold text-xs"><?=$row["game_genre"] ?></p>
        </div>
        <div class="flex flex-col mx-2">
            <h4 class="text-lg text-white font-semibold h-7 overflow-hidden"><?= $row["game_title"] ?></h4>
            <p class="text-xs text-white h-20 overflow-hidden"><?= $row["game_description"] ?></p>
            <span class="mt-5">
                <p class="text-xs text-white">Feedback</p>
                <p class="text-xs text-white"><?=rand(1, 100); ?>% positive</p>
                <p class="text-xs text-white"><?=rand(3, 1100) ?> Reviews</p>
            </span>
            <a class="group flex flex-row items-center mt-10 cursor-pointer text-white" href="./game?game_id=<?=$row["game_id"] ?>">
                <p class="group mr-1 group-hover:mr-2 transition-all text-sm">Learn More</p>
                <img src="../src/assets/feather-icons/arrow-right.svg" class="w-5">
            </a>
        </div>
            
    </div>
<?php
    endwhile; 
    $stmt->close();
else:
    die("Error in prepared statement" . $connection->error);
endif
?>
</div>

    <?php 
    $connection->close();
    include '../components/footer.php';
    ?>

</body>
</html>