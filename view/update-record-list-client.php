<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('location: ./sign-in-client.php');
    }
    
    $idRecord = $_SESSION['idRecord'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>

<body>
    <h1>Update Record</h1>

    <form action="../../server/record-list-server.php" method="post">
        <div>
            <p>
                <?php echo $_SESSION['error']; ?>
            </p>
            <?php unset($_SESSION['error']); ?>
        </div>
        <div>
            <label for="name_record"> name_record : </label>
            <input type="text" name="name_record" value="<?php echo $_SESSION['nameRecord'] ?>" required>
        </div>
        <button type="submit" name="update_record" value="<?php echo $idRecord; ?>" >update record</button>
    </form>
    <br>
    <a href="./index.php">cancel</a>
</body>

</html>