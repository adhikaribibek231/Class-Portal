<?php 
    // Deleting an assignment from DB
    session_start();
    include("config/db.php"); // Include DB config

    // Check for delete assignment post data (assignment id)
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        echo "yp";
        $sql = "DELETE FROM inbox WHERE user_id = '$id'";
        $query = $conn->query($sql);

        if ($query) {
            header("Location: view-message.php");
        }
    }
?>