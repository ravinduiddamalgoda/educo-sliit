<?php

if (isset($_POST["submit"])){
    $username = $_POST["uname"];
    $pwd = $_POST["pwd"];

    require_once '../database_config.php';
    require_once 'functions.inc.php';

    $emptyInputLog = emptyInputLogin($username, $pwd);

    if ($emptyInputLog !== false) {
        header('location:../login.php?error=emptyinput');
        exit();
    }

    LoginUser($conn, $username, $pwd);

}

else {

    header('location:../login.php');
}