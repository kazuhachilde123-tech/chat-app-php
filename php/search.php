<?php
session_start();
include_once "db.php";

if(isset($_SESSION['unique_id'])){
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ORDER BY unique_id DESC");
    $output = "";

    if(mysqli_num_rows($sql) == 0){
        $output .= "No user found related to your search";
    }else{
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                            <div class="content">
                                <img src="images/'.$row['img'].'" alt="">
                                <div class="details">
                                    <span>'.$row['fname'].' '.$row['lname'].'</span>
                                    <p>'.$row['status'].'</p>
                                </div>
                            </div>
                            <div class="status-dot '.($row['status'] == "Active now" ? "online" : "offline").'"><i class="fas fa-circle"></i></div>
                        </a>';
        }
    }
    echo $output;
}
?>
