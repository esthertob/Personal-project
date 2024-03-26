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

    
$query = "SELECT * FROM categories";
$categories = mysqli_query($connect, $query);
if (!$categories) {
    die('Error: ' . mysqli_error($connect)); // Display error message and terminate script
}

if (isset($_POST['title'])) {
    // Check if image file is uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Get file details
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_size = $_FILES['image']['size'];
        
        // Check if the file is an image
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['image']['type'], $allowed_types)) {
            echo 'Invalid file type. Please upload an image.';
            exit;
        }

        // Move the uploaded image to the external folder
        $external_folder = 'image/';
        $destination = $external_folder . $image_name;
        if (!move_uploaded_file($image_tmp, $destination)) {
            echo 'Error: Failed to move uploaded file.';
            exit;
        }

        // Update the image reference in the database
        $query = "UPDATE recipes SET title = ?, content = ?, date = ?, image = ?, category_id = ?, time = ? WHERE id = ?";
        if ($stmt = $connect->prepare($query)) {
            $stmt->bind_param('ssssssi', $_POST['title'], $_POST['content'], $_POST['date'], $destination,  $_POST['category'], $_POST['time'], $_GET['id']);
            $stmt->execute();
            $stmt->close();

            set_message("Post " . $_GET['id'] . " has been edited");
            header('Location: recipe.php');
            exit;
        } else {
            echo 'Error: Unable to prepare SQL statement.';
        }
    } else {
        // No image uploaded, update other post details
        // Prepare and execute the SQL statement to update post data (without image)
        $query = "UPDATE recipes SET title = ?, content = ?, date = ?, category_id = ?, time = ? WHERE id = ?";
        if ($stmt = $connect->prepare($query)) {
            $stmt->bind_param('sssssi', $_POST['title'], $_POST['content'], $_POST['date'],  $_POST['category'], $_POST['time'], $_GET['id']);
            $stmt->execute();
            $stmt->close();

            set_message("Post " . $_GET['id'] . " has been edited");
            header('Location: recipe.php');
            exit;
        } else {
            echo 'Error: Unable to prepare SQL statement.';
        }
    }
}


if (isset($_GET['id'])) {

    if ($stm = $connect->prepare("SELECT * FROM recipes WHERE id = ?")) {

        $stm->bind_param('s', $_GET['id']);
        $stm->execute();


        $result = $stm->get_result();
        $post = $result->fetch_assoc();

        if ($post) {


    ?>


    <section class="pt-4">
    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add users</h6>
                            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="title" class="form-control" id="title" name="title" value=" <?php echo $post['title'] ?>">
                </div>
                <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control">
                        <?php while($category = mysqli_fetch_assoc($categories)): ?>
                        <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                        <?php endwhile ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content"> <?php echo $post['content'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">time</label>
                    <input type="number" class="form-control" id="time" name="time" value=" <?php echo $post['time'] ?>">

                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value=" <?php echo $post['date'] ?>">

                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">

                </div>
                
                <button type="submit" class="btn btn-primary">Edit posts</button>
            </form>
                        </div>
                    </div>
    </section>

    <script src="js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content'
    });
</script>


    <?php

    

}
$stm->close();
} else {
echo 'Unsuccessful';
}
} else {
echo 'no user selected';
die();
}
    include './include/footer.php';
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php include './include/foot.php'; ?>