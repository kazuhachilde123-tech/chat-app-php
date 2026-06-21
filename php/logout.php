<?php
session_start();
include_once "db.php";

if(isset($_GET['logout_id'])){
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    $status = "Offline now";
    mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");

    session_unset();
    session_destroy();
    header("location: ../login.php");
    exit;
}else{
    header("location: ../users.php");
    exit;
}
?>
