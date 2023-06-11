<?php
$conn=new mysqli("sql.freedb.tech:3306","freedb_educo-sliit","!KhPmp6P8HRt4jG", "freedb_educo-sliit");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>