<?php 
    session_start();
    include("config/db.php"); 

        $id = $_POST['id'];
        $semester = $_POST['semester'];
        echo "yp";
        $sql = "UPDATE users SET Semester=$semester WHERE id = '$id'";
        $query = $conn->query($sql);

        if ($query) {
            
            header("Location: view-students.php");
        }
?>