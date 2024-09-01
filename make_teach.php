<?php 
    session_start();
    include("config/db.php"); 

    if (isset($_POST['maketeach'])) {
        $id = $_POST['id'];
        $sql = "UPDATE users SET user_role=2, Semester=0 WHERE id = '$id'";
        $query = $conn->query($sql);

        if ($query) {
            
            header("Location: view-students.php");
        }
    }
?>