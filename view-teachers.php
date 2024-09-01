<?php
session_start();

if (!isset($_SESSION['username'])) :
    header('Location:login.php');
else :
    include("config/db.php");
    include("include/header.php");
?>
<br>
    <div class="container">
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $sql = "SELECT * FROM users WHERE user_role=2 AND (username LIKE '%$search%' OR email LIKE '%$search%')";
            $result = mysqli_query($conn, $sql) or die('Error');
            echo "<form method='GET'><input type='text' name='search' value='$search'><input type='submit' value='Search'></form>";
            ?>
        <h1 style="text-align: center;">List of all the Teachers</h1>
        <div class="cards" id="data">
        <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $user_role=$row['user_role'];
            ?>
                    <div class="card">
                        <h2><?php echo $username ?></h2>
                        <h3><?php echo $email ?></h3>
                        <form id="deleteForm" action="delete_std.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="delete" value="Remove Teacher" onclick="return confirmDelete();">
                        </form>
                        <br>
                        <form id="makestd" action="make_std.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="makestd" value="Make Student" onclick="return confirmstd();">
                        </form>
                        <script>
                            function confirmDelete() {
                                return confirm("Are you sure you want to delete this teacher?");
                            }
                            function confirmstd() {
                                return confirm("Are you sure you want to turn this person to a student?");
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