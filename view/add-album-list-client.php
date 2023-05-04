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
    <title>Add Album</title>
</head>

<body>
    <h1>Add Album</h1>
    <div>
        <form action="../server/album-list-server.php" method="post">
            <div>
                <?php if (isset($_SESSION['error'])): ?>
                    <p>
                        <?php echo $_SESSION['error']; ?>
                    </p>
                    <?php unset($_SESSION['error']) ?>
                <?php endif ?>
            </div>
            <div>
                <label for="name_band"> name_album : </label>
                <input type="text" name="nameAlbum"
                    value="<?php echo $_SESSION['nameAlbumAdd'];
                    unset($_SESSION['nameAlbumAdd']); ?>" required>
            </div>
            <button type="submit" value="<?php echo $_SESSION['id'] ?>" name="addAlbum">add album</button>
        </form>
    </div>
    <div>
        <a href="./album-list-client.php">cancle</a>
    </div>
</body>

</html>