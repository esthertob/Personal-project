<?php
include('include/config.php');
include('include/database.php');
include('include/functions.php');
secure();
include './include/head.php'; ?>



<div class="container-fluid position-relative d-flex p-0">
    <?php
    ob_start();
    include './include/header.php';



    if (isset($_POST['name'])) {
        if ($stm = $connect->prepare("UPDATE categories set name = ? WHERE id = ? ")) {
            $stm->bind_param('si', $_POST['name'], $_GET['id']);
            $stm->execute();


            $stm->close();

            set_message("Category " . $_GET['id'] . "has been editted");
            header('Location: category.php');
            die();
        } else {
            echo 'Unsuccessful';
        }
    }

    if (isset($_GET['id'])) {
        if ($stm = $connect->prepare("SELECT * FROM categories WHERE id = ?")) {
            $stm->bind_param('i', $_GET['id']);
            $stm->execute();
            $result = $stm->get_result();
            $category = $result->fetch_assoc();
            if ($category) {
    ?>


                <section class="pt-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Category</h6>
                            <form method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="name" class="form-control" id="name" name="name" value=" <?php echo $category['name'] ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Edit category</button>
                            </form>
                        </div>
                    </div>
                </section>




    <?php

            } else {
                echo 'Category not found';
            }
            $stm->close();
        } else {
            echo 'Error: Unable to fetch category: ' . mysqli_error($connect);
        }
    } else {
        echo 'No category selected';
        die();
    }
    include './include/footer.php';
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php include './include/foot.php'; ?>