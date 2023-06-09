<?php
 session_start();
$userName = $_SESSION['userName'];
$uid = $_SESSION['userid'];
    echo "User : $userName <br/> UID : $uid";
?>