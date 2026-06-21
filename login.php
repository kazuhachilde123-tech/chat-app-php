<?php include_once "header.php";?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email</label>
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="field input">
                    <label>password</label>
                    <input type="password" placeholder="Enter your password" name="password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>
</body>
<script src="js/pass-show-hide.js"></script>
<script src="js/login.js"></script>

</html>
