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

    if (isset($_POST['username'])) {
        if ($stm = $connect->prepare("INSERT INTO users (username, email, password, active) VALUES (?, ?, ?, ?) ")) {
            $hashed = SHA1($_POST['password']);
            $stm->bind_param('ssss', $_POST['username'], $_POST['email'], $hashed, $_POST['active']);
            $stm->execute();
    
    
            set_message("A new user " . $_SESSION['username'] . "has been added");
            header('Location: ./dashboard.php');
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
                            <h6 class="mb-4">Add users</h6>
                            <form method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="username" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <select name="active" id="active" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add users</button>
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