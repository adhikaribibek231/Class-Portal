<?php 
    session_start();
    include("config/db.php"); 

    if (isset($_POST['makestd'])) {
        $id = $_POST['id'];
        echo "yp";
        $sql = "UPDATE users SET user_role=0 WHERE id = '$id'";
        $query = $conn->query($sql);

        if ($query) {
            
            header("Location: view-teachers.php");
        }
    }
?>