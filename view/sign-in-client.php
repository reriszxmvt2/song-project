<?php
    session_start();
    include('../model/connect-db.php');

    if (isset($_SESSION['username'])) {
        header('location: ./index.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
</head>

<body>

    <div class="header">
        <h1>Sign In</h1>
    </div>

    <form action="../controller/sign-in-server.php" method="post">
        <div>
            <?php if (isset($_SESSION['error'])): ?>
                <p>
                    <?php echo $_SESSION['error']; ?>
                </p>
                <?php unset($_SESSION['error']); ?>
            <?php endif ?>
        </div>
        <div>
            <label for="username">username : </label>
            <input type="username" name="username" required>
        </div>
        <div>
            <label for="password">password : </label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit" name="signin">SIGN IN</button>
        </div>

        <p>Register for use ==> <a href="./sign-up-view.php">SIGN UP</a></p>
    </form>

</body>

</html>