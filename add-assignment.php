<?php
session_start();
include("config/db.php");
if (isset($_POST['assignment'])) {
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];
    $title = $_POST['title'];
    $duedate = $_POST['duedate'];
    $description = $_POST['description'];

    $sql = "INSERT INTO assignment (Semester, Subject, title, duedate, description, user_role) VALUES ('$semester', '$subject','$title', '$duedate', '$description', 1)";
    $query = $conn->query($sql);

    if ($query) {
        header('Location:login.php');
    }
}
?>
<head>
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
</head>
<?php
if (!isset($_SESSION['username'])) :
    header('Location:login.php');
else :
    include("include/header.php");
?>
    <div class="container">
        <div class="forms">
            <div class="box" id="data">
                <h1>Add new assignment</h1>
                <form action="add-assignment.php" method="POST">
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
                            <input type="text" name="title" placeholder="Assignment Title" id="title" required>
                        </div>
                        <div class="form-field">
                            <label for="duedate">Add Due Date</label>
                            <input type="date" name="duedate" placeholder="Due Date" id="duedate">
                        </div>
                    </div>
                    <label for="description">Add Description</label>
                    <textarea name="description" cols="30" rows="10" placeholder="Description" id="editor" id="description" required></textarea>
                    <br>
                    <input type="submit" name="assignment" value="Add Assignment">

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
endif
    ?>