<?php
session_start();
$value = $_GET['value'] ?? '';
if (!isset($_SESSION['username'])) :
    header('Location:login.php');
else :
    include("config/db.php");
    include("include/header.php");
?>

    <div class="container">
        <?php
        if (!($value > 0)) {
            echo '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; text-align: center;">Contact the Admin to assign you to your Class</div>';
        }
        $sql = "SELECT * FROM assignment WHERE user_role = 1 AND Semester = $value;";
        $result = mysqli_query($conn, $sql) or die('Error');

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $subject = $row['Subject'];
                $title = $row['title'];
                $duedate = $row['duedate'];
                $description = $row['description'];
        ?>
                <div class="assignment-card" id="data">
                    <h2>Subject: <?php echo $subject; ?></h2>
                    <h3><?php echo $title; ?></h3>
                    <h4>Due Date: <?php echo $duedate; ?></h4>

                    <div class="buttons">
                        <?php if ($_SESSION['user_role'] > 0) : ?>
                            <a class="green" href="view.php?id=<?php echo $id; ?>">View</a>
                            <a class="blue" href="edit.php?id=<?php echo $id; ?>">Edit</a>

                            <form id="deleteForm" action="delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="delete" value="Delete" onclick="return confirmDelete();">
                            </form>
                            <script>
                                function confirmDelete() {
                                    return confirm("Are you sure you want to delete this item?");
                                }
                            </script>


                        <?php else : ?>
                            <a class="green" href="view.php?id=<?php echo $id; ?>">View</a>
                        <?php endif ?>
                    </div>
                </div>
        <?php
            }
        } else {
            $error = 'No assignments';
        }
        ?>
    </div>
<?php
endif;
?>