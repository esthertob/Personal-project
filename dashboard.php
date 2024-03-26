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


    
if(isset($_GET['delete'])){
    if ($stm = $connect->prepare("DELETE FROM users WHERE id = ? ")) {
        $hashed = SHA1($_POST['password']);
        $stm->bind_param('s',$_GET['delete']);
        $stm->execute();


        set_message("A new user " . $_GET['delete'] . "has been deleted");
        header('Location: dashboard.php');
        $stm->close();
        die();
    } else {    
        echo 'Unsuccessful';
    }   
}

if ($stm = $connect->prepare("SELECT * FROM users")) {
    $stm->execute();

    $result = $stm->get_result();

    if ($result->num_rows > 0) {




    ?>


    <section class="pt-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Users</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Edit|Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($record = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td> <?php echo $record['id'] ?></td>
                                <td> <?php echo $record['username'] ?></td>
                                <td> <?php echo $record['email'] ?></td>
                                <td> <?php echo $record['active'] ?></td>
                                <td> <a href="edit_users.php?id= <?php echo $record['id'] ; ?>">Edit</a> | 
                                <a href="dashboard.php?delete= <?php echo $record['id'] ; ?>">Delete</a>
                            </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                    <a href="add_users.php">Add new user</a>
                </div>
            </div>
        </div>
    </section>




    <?php
   }
   $stm->close();
} else {
   echo 'Unsuccessful';
}
    include './include/footer.php';
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php include './include/foot.php'; ?>