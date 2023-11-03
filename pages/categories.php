<?php include '../components/header.php'; ?>

<body>
<?php
include '../handlers/connect_database.php';

$connection = connect_to_database();


?>

<!-- START RPG -->
<h1 class="text-white text-2xl text-center font-semibold mb-5">RPG Genre</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mx-auto max-w-7xl">

    <?php
    $query = "SELECT * FROM games WHERE game_genre = 'RPG'";

    $stmt = $connection->prepare($query);
    
    if ($stmt):
        $stmt->execute();
        $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()):?>
        <a class="group" href="./game?game_id=<?=$row["game_id"] ?>">
            <!-- Game Thumbnail -->
            <div class="w-full h-fit">
                <img class="block object-cover aspect-[4/2]" src="<?= $row["game_thumbnail_path"] ?>" alt="">
            </div>
            <div class="flex flex-col mx-2">
                <h4 class="text-lg text-white font-semibold h-7 overflow-hidden"><?= $row["game_title"] ?></h4>
                <p class="text-xs text-white h-20 overflow-hidden"><?= $row["game_description"] ?></p>
                <span class="mt-5">
                    <p class="text-xs text-white">Feedback</p>
                    <p class="text-xs text-white"><?=rand(1, 100); ?>% positive</p>
                    <p class="text-xs text-white"><?=rand(3, 1100) ?> Reviews</p>
                </span>
            </div>
        </a>

        <?php
        endwhile; 
            $stmt->close();
        else:
            die("Error in prepared statement" . $connection->error);
        endif;
        ?>

</div>

<!-- END RPG -->

<!-- START ACTION -->
<h1 class="text-white text-2xl text-center font-semibold my-5">Action Genre</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mx-auto max-w-7xl">

    <?php
    $query = "SELECT * FROM games WHERE game_genre = 'Action'";

    $stmt = $connection->prepare($query);
    
    if ($stmt):
        $stmt->execute();
        $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()):?>
        <a class="group" href="./game?game_id=<?=$row["game_id"] ?>">
            <!-- Game Thumbnail -->
            <div class="w-full h-fit">
                <img class="block object-cover aspect-[4/2]" src="<?= $row["game_thumbnail_path"] ?>" alt="">
            </div>
            <div class="flex flex-col mx-2">
                <h4 class="text-lg text-white font-semibold h-7 overflow-hidden"><?= $row["game_title"] ?></h4>
                <p class="text-xs text-white h-20 overflow-hidden"><?= $row["game_description"] ?></p>
                <span class="mt-5">
                    <p class="text-xs text-white">Feedback</p>
                    <p class="text-xs text-white"><?=rand(1, 100); ?>% positive</p>
                    <p class="text-xs text-white"><?=rand(3, 1100) ?> Reviews</p>
                </span>
            </div>
        </a>

        <?php
        endwhile; 
            $stmt->close();
        else:
            die("Error in prepared statement" . $connection->error);
        endif
        ?>

</div>

<!-- END ACTION -->

<!-- START SURVIVAL -->
<h1 class="text-white text-2xl text-center font-semibold my-5">Survival Genre</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mx-auto max-w-7xl">

    <?php
    $query = "SELECT * FROM games WHERE game_genre = 'Survival'";

    $stmt = $connection->prepare($query);
    
    if ($stmt):
        $stmt->execute();
        $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()):?>
        <a class="group" href="./game?game_id=<?=$row["game_id"] ?>">
            <!-- Game Thumbnail -->
            <div class="w-full h-fit">
                <img class="block object-cover aspect-[4/2]" src="<?= $row["game_thumbnail_path"] ?>" alt="">
            </div>
            <div class="flex flex-col mx-2">
                <h4 class="text-lg text-white font-semibold h-7 overflow-hidden"><?= $row["game_title"] ?></h4>
                <p class="text-xs text-white h-20 overflow-hidden"><?= $row["game_description"] ?></p>
                <span class="mt-5">
                    <p class="text-xs text-white">Feedback</p>
                    <p class="text-xs text-white"><?=rand(1, 100); ?>% positive</p>
                    <p class="text-xs text-white"><?=rand(3, 1100) ?> Reviews</p>
                </span>
            </div>
        </a>

        <?php
        endwhile; 
            $stmt->close();
        else:
            die("Error in prepared statement" . $connection->error);
        endif;
        $connection->close();
        ?>

</div>

<!-- END ACTION -->


    <?php include '../components/footer.php'; ?>

</body>
</html>