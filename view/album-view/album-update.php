<?php include '../../view/path.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Album</title>
    </head>
    <body>
        <h1>Update Album</h1>
        <div>
            <p>
                <?php echo $error; ?>
            </p>
        </div>
        <form method="post">
            <input type="text" name="nameAlbum" value="<?php echo $nameAlbum ?>" required>
            <button type="submit" value="updateNameAlbum" name="updateNameAlbum">update Album</button>
        </form>
        <div>
            <?php $cancelUrl = $albumControllerPath . '?recordId=' . $recordId . '&bandId=' . $bandId; ?>
            <a href=<?php echo $cancelUrl ?> >cancel</a>  
        </div>
    </body>
</html>
