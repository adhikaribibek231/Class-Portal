<?php 
    session_start();
    include("config/db.php");

    $id = $_GET['id'];
    $sql = "SELECT * FROM assignment WHERE id = '$id'";
    $result = mysqli_query($conn, $sql) or die('Error');
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $subject = $row['Subject'];
            $title = $row['title'];
            $duedate = $row['duedate'];
            $description = $row['description'];
        }
    }

    if (isset($_POST['assignment'])) {
        $id = $_POST['id'];
        $semester = $_POST['semester'];
        $subject = $_POST['subject'];
        $title = $_POST['title'];
        $duedate = $_POST['duedate'];
        $description = $_POST['description'];


            $sql = "UPDATE assignment SET Semester='$semester', Subject='$subject', title = '$title', duedate = '$duedate', description = '$description' WHERE id = '$id'";
            $query = $conn->query($sql);

            if ($query) {
                header('Location:dashboard.php');
            }
    }
?>
<style>
        /* Style the select element */
        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style the options */
        select option {
            background-color: #f2f2f2;
            color: #333;
        }

        /* Style the hover effect on options */
        select option:hover {
            background-color: #ddd;
        }
    </style>
<?php 
    if (!isset($_SESSION['username'])): 
        header('Location:login.php');        
    else:
        include("include/header.php");
?>
    <div class="container">
        <div class="forms">
            <div class="box" id="data">
                <h1>Update assignment</h1>
                <form action="edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-field">
                        <h3><label for="semester">Semester:</label></h3>
                        <select name="semester" id="semester">
                            <option value="">--- Select Semester ---</option>
                            <?php
                            for ($i = 1; $i <= 8; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-field">
                        <label for="title">Subject Name</label>
                        <input type="text" name="subject" placeholder="Subject" id="title" required>
                    </div>
                    <div class="input-box">
                        <div class="form-field">
                            <label for="title">Add Assignment Title</label>
                            <input type="text" name="title" placeholder="Assignment Title" required id="title" value="<?php  echo $title; ?>">
                        </div>
                        <div class="form-field">
                            <label for="duedate">Add Due Date</label>
                            <input type="date" name="duedate" placeholder="Due Date" required id="duedate" <?php echo $duedate; ?>>
                        </div>
                    </div>
                    <textarea name="description" cols="50" rows="10" placeholder="Description" required id="editor"><?php echo $description; ?></textarea>
                    <br>
                    <input type="submit" name="assignment" value="Update Assignment">   
                 
                    <div class="alert">
                        <?php 
                            if (isset($_POST['assignment'])) {
                                echo $error;
                            }
                        ?>
                    </div>
            </form>
        </div>
    </div>
<?php
    endif;
?>