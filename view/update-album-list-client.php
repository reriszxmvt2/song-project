<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('location: ./sign-in-client.php');
    }

    $idAlbum = $_SESSION['idAlbum'];
    $idBand = $_SESSION['idBand'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Album</title>
</head>

<body>
    <h1>Update Album</h1>
    <form action="../server/album-list-server.php" method="post">
        <div>
            <?php if (isset($_SESSION['error'])): ?>
                <p>
                    <?php echo $_SESSION['error']; ?>
                </p>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
        </div>
        <label for="">name album : </label><br>
        <input type="text" name="nameAlbum" value="<?php echo $_SESSION['nameAlbum']; unset($_SESSION['nameAlbum']); ?>" required>
        <input type="hidden" name="idAlbum" value="<?php echo $idAlbum ?>">
        <input type="hidden" name="idBand" value="<?php echo $idBand ?>">
        <br><br>
        <button type="submit" value="<?php ?>" name="update_album">update album</button>
    </form>
    <br>
    <a href="./album-list-client.php">cancel</a>
</body>

</html>