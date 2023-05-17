<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Album</title>
    </head>
    <body>
        <h1>Add Album</h1>
        <div>
            <div>
                <p>
                    <?php echo $error; ?>
                </p>
            </div>
            <div>
                <form method="post">
                    <div>
                        <label> name_album : </label>
                        <input type="text" name="addAlbumName" value="<?php echo $addAlbumName ?>" required>
                    </div>
                    <button type="submit" value="userAddAlbum" name="userAddAlbum">add album</button>
                </form>
            </div>
            <br />
            <div>
                <?php $cancelUrl = '../album-controller/album-controller.php?recordId=' . $recordId . '&bandId=' . $bandId; ?>
                <a href=<?php echo $cancelUrl ?> >cancel</a> 
            </div>
        </div>
    </body>
</html>