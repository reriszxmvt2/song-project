<?php
    session_start();
    include('../server/connect-db.php');

    if (isset($_SESSION['username'])) {
        header('location: ./index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>

    <div class="header">
        <h1>Register</h1>
    </div>

    <form action="../server/sign-up-server.php" method="post">

        <div>
            <?php if (isset($_SESSION['error'])): ?>
                <p>
                    <?php echo $_SESSION['error']; ?>
                </p>
                <?php unset($_SESSION['error']); ?>
            <?php endif ?>
        </div>
        <div>
            <label>username : </label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>password : </label>
            <input type="text" name="password" required>
        </div>
        <div>
            <input value="sign up" type="submit" name="signup">
        </div>

        <p>Have a account to use? ==> <a href="./sign-in-client.php">SIGN IN</a></p>

    </form>

</body>

</html>