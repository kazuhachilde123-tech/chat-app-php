<?php

session_start();
include_once "db.php";

if(isset($_SESSION['unique_id'])){
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_Id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if(!empty($message)){
        mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')");
    }

}else{
    header("location: ../login.php");
    exit;
}

?>
