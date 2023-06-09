<?php

if (isset($_POST["submit"])){
    $username = $_POST["uname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $aType = $_POST["aType"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    echo "$username $email $gender $aType $pwd $pwdRepeat";
    
    require_once '../database_config.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputSignup($username, $email, $gender, $aType, $pwd, $pwdRepeat);
    $invalidUid = invalidUid($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwdRepeat);
    $uidExist = uidExist($conn, $username, $email);
    

    if ($emptyInput !== false ){
        header('location:../signup.php?error=emptyinput');
        exit();
    }
    if ($invalidUid !== false ){
        header('location:../signup.php?error=invaliduid');
        exit();
    }
    if ($invalidEmail !== false ){
        header('location:../signup.php?error=invalidemail');
        exit();
    }
    if ($pwdMatch !== false ){
        header('location:../signup.php?error=passworddontmatch');
        exit();
    }
    if ($uidExist !== false ){
        header('location:../signup.php?error=usernametaken');
        exit();
    }

    createuser($conn, $username, $email, $gender, $aType, $pwd);
}

else {

    header('location:../signup.php');
}