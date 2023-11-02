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

    // while ($row = $result->fetch_assoc()) {
    //     echo($row["game_title"]);
    //     echo($row["game_description"]);
    //     echo($row["game_price"]);
    // }
    // $stmt->close();

// } else {
//     die("Error in prepared statement" . $connection->error);
// }

?>
<body>

<div class="grid grid-cols-2 lg:grid-cols-4 grid-rows-2 gap-3">
    <!-- Card Template -->
    <?php while ($row = $result->fetch_assoc()):?>
    <div class="flex flex-col px-5">
        <!-- <img class="w-full h-full object-cover" src="../src/assets/Sprinkle.svg"> -->
        <img class="w-full h-full object-cover" src="data:image/jpeg;base64,<?php echo(base64_encode($row["games_binary_2"])); ?>" alt="">
        <h4 class="text-lg text-white font-semibold"><?= $row["game_title"] ?></h4>
        <p class="text-md text-white"><?= $row["game_description"] ?></p>
        <span class="mt-4">
            <p class="text-xs text-white">Feedback</p>
            <p class="text-xs text-white"><?=rand(1, 100); ?>% positive</p>
            <p class="text-xs text-white"><?=rand(3, 1100) ?> Reviews</p>
        </span>
        <a class="group flex flex-row items-center mt-10 cursor-pointer text-white">
            <p class="group mr-1 group-hover:mr-2 transition-all text-md">Learn More</p>
            <i class="w-6" data-feather="arrow-right"></i>
        </a>
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