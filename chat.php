<?php
session_start();
include_once "php/db.php";

if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
    exit;
}

if(!isset($_GET['user_id'])){
    header("location: users.php");
    exit;
}
$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
if(mysqli_num_rows($sql) == 0){
    header("location: users.php");
    exit;
}
$row = mysqli_fetch_assoc($sql);
?>

<?php include_once "header.php";?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="images/<?php echo $row['img']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname']." ".$row['lname']; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
            </header>
            <div class="chat-box">
            </div>
            <form action="" class="typing-area" autocomplete="off">
                <input type="hidden" name="outgoing_id" value="<?php echo $_SESSION['unique_id'];?>">
                <input type="hidden" name="incoming_Id" value="<?php echo $user_id;?>">
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fas fa-paper-plane"></i></button>
            </form>
        </section>
    </div>
</body>
<script src="js/chat.js"></script>

</html>