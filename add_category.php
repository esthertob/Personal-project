<?php 
include('include/config.php');
include('include/database.php');
include('include/functions.php');
secure();
include './include/head.php';?>



<div class="container-fluid position-relative d-flex p-0">
    <?php
    ob_start();
    include './include/header.php';

    if (isset($_POST['name'])) {
        if ($stm = $connect->prepare("INSERT INTO categories (name) VALUES (?) ")) {
            $stm->bind_param('s', $_POST['name']);
            $stm->execute();
    
    
            set_message("A new category " . $_SESSION['name'] . "has been added");
            header('Location: category.php');
            $stm->close();
            die();
        } else {
            echo 'Unsuccessful';
        }
    }
    ?>


    <section class="pt-4">
    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Add Category</h6>
                            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="name" class="form-control" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary">Edit category</button>
            </form>
                        </div>
                    </div>
    </section>




    <?php
    include './include/footer.php';
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php include './include/foot.php'; ?>