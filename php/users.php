<?php
session_start();
include_once "db.php";

$outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);

$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY unique_id DESC");
$output = "";

if (mysqli_num_rows($sql) == 0) {
    $output .= "No users are available to chat";
} else {
    while ($row = mysqli_fetch_assoc($sql)) {
        $output .= '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                        <div class="content">
                            <img src="images/' . $row['img'] . '" alt="">
                            <div class="details">
                                <span>' . $row['fname'] . ' ' . $row['lname'] . '</span>
                                <p>' . $row['status'] . '</p>
                            </div>
                        </div>
                        <div class="status-dot ' . ($row['status'] == "Active now" ? "online" : "offline") . '"><i class="fas fa-circle"></i></div>
                    </a>';
    }
}
echo $output;
