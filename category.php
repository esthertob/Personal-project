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
    if(isset($_GET['delete'])){
        if ($stm = $connect->prepare("DELETE FROM categories WHERE id = ? ")) {
            $hashed = SHA1($_POST['password']);
            $stm->bind_param('s',$_GET['delete']);
            $stm->execute();
    
    
            set_message("A category " . $_GET['delete'] . "has been deleted");
            header('Location: category.php');
            $stm->close();
            die();
        } else {
            echo 'Unsuccessful';
        }
    }
    
    if ($stm = $connect->prepare("SELECT * FROM categories")) {
        $stm->execute();
    
        $result = $stm->get_result();
    
        if ($result->num_rows > 0) {
    
    
    

    ?>


    <section class="pt-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Users</h6>
<div class="table-responsive">
    
<table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit | Delete</th>
                            </tr>
                        </thead>

                        <?php while ($record = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td> <?php echo $record['id'] ?></td>
                                <td> <?php echo $record['name'] ?></td>
                                <td> <a href="edit_category.php?id= <?php echo $record['id']; ?>">Edit</a> |
                                    <a href="category.php?delete= <?php echo $record['id']; ?>">Delete</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </table>

</div>
                    <a href="add_category.php">Add new Category</a>

                </div>
            </div>
        </div>
</div>
</section>




<?php
    }else {
        echo 'Unsuccessful post';
    }

    $stm->close();
} else {
    echo ' hmmmmm Unsuccessful';
}

include './include/footer.php';
?>


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php include './include/foot.php'; ?>