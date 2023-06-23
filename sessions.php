<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        echo "<script> alert('You needs to be logged in to access this page')</script>";
        header("Location: index.php");
    }else{
        $user_id =$_SESSION['userid'];
        $uType = $_SESSION['userType'];
    }
?>