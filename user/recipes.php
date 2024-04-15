<?php
include('../include/config.php');
include('../include/database.php');
include('../include/functions.php');

include('includes/head.php');
include('includes/header.php');

// Fectch 2 post from post table
$query = "SELECT * FROM recipes ORDER BY date DESC LIMIT 2";
$recipes   = mysqli_query($connect, $query);
if (!$recipes) {
  die('Error: ' . mysqli_error($connect));
}
?>

<section class="banner">
    <div class="waviy">
        <span style="--i:1">R</span>
        <span style="--i:2">E</span>
        <span style="--i:3">C</span>
        <span style="--i:4">I</span>
        <span style="--i:5">P</span>
        <span style="--i:6">E</span>
        <span style="--i:7">S</span>
        <span style="--i:8">.</span>
    </div>
</section>

<main>
    <section>
        <div class="res-container">
            <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php while ($recipe = mysqli_fetch_assoc($recipes)) : ?>

                <div class="col">
                    <div class="card">
                        <img src="../image/<?php echo $recipe['image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $recipe['title']; ?></h5>
                            <p class="card-text">Last updated <?php echo $recipe['date']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
</main>




<?php


include('includes/foot.php');
include('includes/footer.php');
?>