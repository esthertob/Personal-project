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

// Assuming you have already established a database connection

// Check if data is submitted
if (isset($_POST['title'])) {
    // Check if image file is uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Get file details
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_folder = 'image/' . $image;

        // Move the uploaded image to the external folder
        if (move_uploaded_file($image_tmp, $image_folder)) {
            // Prepare and execute the SQL statement to insert post data
            $sql = "INSERT INTO lunch (title, content, date, time, image) VALUES (?, ?, ?, ?, ?)";
            if ($stmt = $connect->prepare($sql)) {
                // Bind parameters
                $stmt->bind_param('sssss', $_POST['title'], $_POST['content'], $_POST['date'], $_POST['time'], $image);
                // Execute the statement
                if ($stmt->execute()) {
                    // Set success message
                    set_message("A new post " . $_POST['title'] . " has been added");
                    // Redirect to posts page
                    header('Location: lunch.php');
                    exit;
                } else {
                    // Error in executing SQL statement
                    echo 'Error: Unable to execute SQL statement.';
                }
            } else {
                // Error in preparing SQL statement
                echo 'Error: Unable to prepare SQL statement.';
            }
        } else {
            // Error in moving the uploaded file
            echo 'Error: Unable to move uploaded file.';
        }
    } else {
        // No image uploaded
        echo 'Please select an image.';
        exit;
    }
} else {
    // No data submitted
    echo 'No data submitted.';
}
?>



    <section class="pt-4">
    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add users</h6>
                            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="title" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">time</label>
                    <input type="number" class="form-control" id="time" name="time">

                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date" name="date">

                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">

                </div>
                
                <button type="submit" class="btn btn-primary">Add posts</button>
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
    include './include/footer.php';
    ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<?php include './include/foot.php'; ?>