<?php

require_once "../lib/generate_id.php";

function emptyInputSignup($username, $email, $gender, $aType, $pwd, $pwdRepeat){
    $result=false;
    if ( empty($username) || empty($email) || empty($gender) || empty($aType) || empty($pwd) || empty($pwdRepeat) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emptyInputLogin($username, $pwd){
    $result=false;
    if ( empty($username) || empty($pwd) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result=false;
    if ( !preg_match("/^[a-zA-Z0-9]*$/", $username) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result=false;
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result=false;
    if ( $pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExist($conn, $username){

    $sql = "SELECT * FROM user WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);



    if ($row = mysqli_fetch_assoc($resultData)){
        mysqli_stmt_close($stmt);
        return $row;
    }
    else{
        mysqli_stmt_close($stmt);
        return false;
    }
}


function createuser($conn, $username, $email, $gender, $aType, $pwd){
    $uid = generate_uuid_v4("u");
    $prof_dir = "users/$uid/";
    $sql = "INSERT INTO user (User_ID, Username, Email, Gender, Account_type, Profile_Directory, Verification, Password) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    $verification = 123456;
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../login.php");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssssssis", $uid, $username, $email, $gender, $aType, $prof_dir, $verification, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location:../login.php');
    exit();
}

function LoginUser($conn, $username, $pwd){
    $uidExists = uidExist($conn, $username);
    if ($uidExists === false){
        header('Location:../login.php?error=wronglogin');
        exit();
    }
    $pwdHashed = $uidExists["Password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header('Location:../login.php?error=wronglogin');
        exit();
    }
    else if($checkPwd === true){
        session_start();
       // print_r($uidExists);
        $_SESSION["userid"] = $uidExists["User_ID"];
        $_SESSION["userName"] = $uidExists["Username"];
        $_SESSION["userType"] = $uidExists["Account_Type"];
        header('Location:../index.php');
        exit();
    }

}