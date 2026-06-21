<?php
session_start();
include_once "php/db.php";

if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
    exit;
}

$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
$row = mysqli_fetch_assoc($sql);
?>

<?php include_once "header.php";?>
<body>
    <div class="wrapper">
        <section class="users" data-id="<?php echo $row['unique_id']; ?>">
            <header>
                <div class="content">
                    <img src="images/<?php echo $row['img']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname']." ".$row['lname']; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="search-text">Select an users to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list"></div>
        </section>
    </div>
</body>
<script src="js/users.js"></script>


</html>
