<!DOCTYPE html>
<html>

<head>
    <title>Sign In</title>
</head>

<body>

    <div class="header">
        <h1>Sign In</h1>
    </div>

    <form method="post">
        <div>
            <p><?php echo $error; ?></p>
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

        <p>Register for use ==> <a href="sign-up-controller.php">SIGN UP</a></p>
    </form>

</body>

</html>