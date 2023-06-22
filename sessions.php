<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("Location: index.php");
    }else{
        $user_id =$_SESSION['userid'];
        $uType = $_SESSION['userType'];
    }
?>