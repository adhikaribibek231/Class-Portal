<?php
    session_start(); //start new session or resume current session

    session_destroy();
    header('Location: login.php');
?>