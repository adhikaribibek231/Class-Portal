<?php
session_start();
$value = $_GET['value'] ?? '';
include("config/db.php"); // Include DB config

if (!$_SESSION['username']) :
    header('Location: login.php');
else :
    include("include/header.php");
?>

    <div class="container" id="data">
        <!-- View for Admin -->
        <?php if ($_SESSION['user_role'] > 0) : ?>
            <h1>Welcome back <?php echo $_SESSION['username']; ?>,</h1>

            <section class="services" id="services">
                <div class="container" id="data">
                    <h2></h2>
                    <div class="dash" style="margin: 10px auto 10px auto !important"></div>
                    <a href="view-assignment.php?value=<?php echo urlencode($value); ?>">
                        <div class="cards">
                            <div class="service-card">
                                <img src="./assets/06.svg" alt="">
                                <h3>View Assignment</h3>
                            </div>
                        </div>
                    </a>
                    <a href="add-assignment.php?value=<?php echo urlencode($value); ?>">
                        <div class="cards">
                            <div class="service-card">
                                <img src="./assets/07.svg" alt="">
                                <h3>Add Assignment</h3>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif ?>
    </div>
<?php
endif;
?>