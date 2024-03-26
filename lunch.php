<?php
include('include/config.php');
include('include/database.php');
include('include/functions.php');
secure();
include './include/head.php'; 
?>

<div class="container-fluid position-relative d-flex p-0">
    <?php
// Start output buffering
ob_start();

// Include the header file
include './include/header.php';

// Check if delete action is requested
if (isset($_GET['delete'])) {
    // Prepare the delete statement
    if ($stm = $connect->prepare("DELETE FROM lunch WHERE id = ? ")) {
        // Bind the parameter and execute the statement
        $stm->bind_param('s', $_GET['delete']);
        $stm->execute();

        // Close the statement
        $stm->close();

        // Set success message and redirect
        set_message("A recipe " . $_GET['delete'] . " has been deleted");
        header('Location: lunch.php');
        die();
    } else {
        // Error in preparing the statement
        echo 'Unsuccessful';
    }
}

// Prepare and execute the select query
if ($stm = $connect->prepare("SELECT * FROM lunch")) {
    $stm->execute();

    // Get the result set
    $result = $stm->get_result();

    // Check if there are rows in the result set
    if ($result->num_rows > 0) {
?>
        <!-- HTML output for displaying the table -->
        <section class="pt-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Recipes</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Time Required</th>
                                    <th scope="col">Edit|Delete</th>
                                </tr>
                            </thead>

                            <?php while ($record = mysqli_fetch_assoc($result)) { ?>
                                <!-- Display each row of data -->
                                <tr>
                                    <td><?php echo $record['id'] ?></td>
                                    <td><?php echo $record['title'] ?></td>
                                    <td><?php echo $record['content'] ?></td>
                                    <td><?php echo $record['time'] ?></td>
                                    <td>
                                        <!-- Edit and delete links -->
                                        <a href="edit_lunch.php?id=<?php echo $record['id']; ?>">Edit</a> |
                                        <a href="lunch.php?delete=<?php echo $record['id']; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <a href="add_lunch.php">Add new Recipes</a>
                    </div>
                </div>
            </div>
        </section>

<?php
    } else {
        echo 'No records found';
    }
    // Close the prepared statement
    $stm->close();
} else {
    // Error in preparing the statement
    echo 'Unsuccessful';
}

// Include the footer file
include './include/footer.php';

// End output buffering and flush the output
ob_end_flush();
?>

</div>
<?php include './include/foot.php'; ?>