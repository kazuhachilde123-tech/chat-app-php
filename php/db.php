<?php

define("HOSTNAME", "127.0.0.1");
define("USERNAME", "root");
define("PASSWORD", "password");
define("DATABASE", "chat-app-php");

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);


if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}else{
    // echo "berhasil";
}
?>