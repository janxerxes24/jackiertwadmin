<?php

    //resume session
    session_start();

    $user_type = $_SESSION['user_type'];
    //destroy session
    session_destroy();

    //then send user to login page
    if($user_type != 'cust')
        header('location: ../landing/landing.php');
    else
        header('location: ../index.php');
?>