<?php
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header('location: ./sign-in-client.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Band</title>
</head>

<body>
    <h1>Add Band</h1>
    <div>
        <form action="../server/band-list-server.php" method="post">
            <div>
                <?php if (isset($_SESSION['error'])): ?>
                    <p>
                        <?php echo $_SESSION['error']; ?>
                    </p>
                    <?php unset($_SESSION['error']) ?>
                <?php endif ?>
            </div>
            <div>
                <label for="name_band"> name_band : </label>
                <input type="text" name="nameBand"
                    value="<?php echo $_SESSION['nameBandAdd']; unset($_SESSION['nameBandAdd']); ?>" required>
                <input type="hidden" name="idBand" value="<?php echo $_SESSION['idBand'] ?>">
            </div>
            <button type="submit" value="<?php echo $_SESSION['idRecord'] ?>" name="addBand">add band</button>

        </form>
        <div>
            <a href="./band-list-client.php">cancle</a>
        </div>
    </div>

</body>

</html>