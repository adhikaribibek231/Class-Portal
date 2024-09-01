<?php
session_start();

if (!isset($_SESSION['username'])) :
    header('Location:login.php');
else :
    include("config/db.php");
    include("include/header.php");
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
    <br>
    <div class="container">
        <?php
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sql = "SELECT * FROM users WHERE user_role=0 AND (username LIKE '%$search%' OR email LIKE '%$search%')";
        $result = mysqli_query($conn, $sql) or die('Error');
        echo "<form method='GET'><input type='text' name='search' value='$search'><input type='submit' value='Search'></form>";
        ?>
        <h1 style="text-align: center;">List of all the Students</h1>
        <div class="cards" id="data">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $user_role = $row['user_role'];
                    $semester = $row['Semester'];
            ?>
                    <div class="card">
                        <h2><?php echo $username ?></h2>
                        <h3><?php echo $email ?></h3>
                        <h3>Semester: <?php echo $semester ?></h3>

    <form id="deleteForm" action="delete_std.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="delete" value="Remove Student" onclick="return confirmDelete();">
    </form>
    <br>
    <form id="makestd" action="make_teach.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="submit" name="maketeach" value="Make Teacher" onclick="return confirmteach();">
    </form>
    
    <form id="semester" action="change_sem.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <h3><label for="semester">Semester:</label></h3>
        <select name="semester" id="semester">
            <option value="">--- Select Semester ---</option>
            <?php
        for ($i = 1; $i <= 8; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>
    <br><br>
    <input type="submit" name="semchange" value="Submit">
</form>

                        <script>
                            function confirmDelete() {
                                return confirm("Are you sure you want to delete this item?");
                            }

                            function confirmteach() {
                                return confirm("Are you sure you want to turn this person to a teacher?");
                            }
                        </script>
                    </div>
            <?php
                }
            } else {
                $error = 'No Students found';
            }
            ?>
        </div>
    </div>
<?php
endif;
?>