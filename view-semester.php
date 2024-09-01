<?php 
    session_start();
    include("config/db.php"); // Include DB config

    if (!$_SESSION['username']):
        header('Location: login.php');
    else:
        include("include/header.php");
?>
    <div class="container" id="data">
        <!-- View for Admin -->
        <?php if ($_SESSION['user_role'] >0) : ?>
            <h1>Welcome back <?php echo $_SESSION['username']; ?>,</h1>

            <div class="cards">
                <a href="sem1.php?value=1" style="color: #ff4200">
                <div class="card">
                        <img src="./assets/05.svg" alt="">
                        Semester 1
                    </div>
                </a>
                <a href="sem1.php?value=2" style="color: #ff4200">
                <div class="card">
                        <img src="./assets/05.svg" alt="">
                        Semester 2
                    </div>
                </a>
                <a href="sem1.php?value=3" style="color: #ff4200">
                <div class="card">
                        <img src="./assets/05.svg" alt="">
                        Semester 3
                    </div>
                </a>
                <a href="sem1.php?value=4" style="color: #ff4200">
                <div class="card">
                        <img src="./assets/05.svg" alt="">
                        Semester 4
                    </div>
                </a>
                <a href="sem1.php?value=5" style="color: #ff4200">
                <div class="card">
                        <img src="./assets/05.svg" alt="">
                        Semester 5
                    </div>
                </a>
                <a href="sem1.php?value=6" style="color: #ff4200">
                <div class="card">
                        <img src="./assets/05.svg" alt="">
                        Semester 6
                    </div>
                </a>
                <a href="sem1.php?value=7" style="color: #ff4200">
                <div class="card">
                        <img src="./assets/05.svg" alt="">
                        Semester 7
                    </div>
                </a>
                <a href="sem1.php?value=8" style="color: #ff4200">
                <div class="card">
                        <img src="./assets/05.svg" alt="">
                        Semester 8
                    </div>
                </a>
            </div>
        <?php endif ?>
    </div>
<?php 
    endif;
?>