<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        $_SESSION["userType"] = NULL;
        $user_id = NULL;
        $uType = NULL;
        echo "<script> 
        alert('You needs to be logged in to access this page')
        window.location.href='login.php';
        </script>";
        
    }else{
        $user_id =$_SESSION['userid'];
        $uType = $_SESSION['userType'];
    }
?>