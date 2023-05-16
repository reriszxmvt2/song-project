<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('location: ./sign-in-client.php');
    }

    $idBand = $_SESSION['idBand'];
    $nameBand =  $_SESSION['nameBand'];
    $idRecord = $_SESSION['idRecord'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Band</title>
</head>

<body>
    <h1>Update Band</h1>
    <form action="../../server/band-list-server.php" method="post">
        <div>
            <?php if (isset($_SESSION['error'])) : ?>
                <p><?php echo $_SESSION['error']; ?></p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        </div>
        <label for=""></label>
        <input type="text" name="nameBand" value="<?php echo $nameBand ?>" required>
        <input type="hidden" name="idRecord" value="<?php echo $idRecord ?>">
        <input type="hidden" name="idBand" value="<?php echo $idBand ?>">
        <br><br>
        <button type="submit" value="<?php ?>" name="update_band">update band</button>
    </form>
    <br>
    <a href="./band-list-client.php">cancel</a>
</body>

</html>