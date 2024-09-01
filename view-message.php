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
        tr td:first-child{
        padding-right:20px;
        font-weight: bold;
    }
    tr td{
        padding-top: 20px;
        padding-bottom: 20px;
    }
    </style>
</head>
    <div class="container">
        <?php
        $sql = "SELECT * FROM inbox";
        $result = mysqli_query($conn, $sql) or die('Error');

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['user_id'];
                $name = $row['name'];
                $phone = $row['phone_number'];
                $email = $row['email'];
                $message = $row['text_message'];
        ?>
                <div class="assignment-card" id="data">
                <h2><?php echo $name; ?></h2>
                    <table>
                <tr>
                    <td>Phone</td>
                    <td><?php echo $phone; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td> <?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td> <?php echo $message; ?></td>
                </tr>
            </table>
                    <div class="buttons">
                            <form id="deleteForm" action="delete_msg.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="delete" value="Delete" onclick="return confirmDelete();">
                            </form>
                            <script>
                                function confirmDelete() {
                                    return confirm("Are you sure you want to delete this item?");
                                }
                            </script>
                    </div>
                </div>
        <?php
            }
        } else {
            $error = 'No Messages';
        }
        ?>
    </div>
<?php
endif;
?>