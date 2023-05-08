<?php
    include '../controller/sign-up-controller.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h1>Register</h1>
    <form method="post">
        <div>
            <p style="color: red; font-size: x-large; font-weight: bold; ">
                <?php echo $error[0]; ?>
            </p>
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
    </form>
    <p>Have a account to use? ==> <a href="./sign-in-client.php">SIGN IN</a></p>
</body>

</html>