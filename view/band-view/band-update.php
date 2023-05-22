<?php
    define('BAND_CONTROLLER','../band-controller/band-controller.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Band</title>
    </head>
    <body>
        <h1>Update Band</h1>
        <div>
            <p>
                <?= $error ?>
            </p>
        </div>
        <form method="post">
            <input type="text" name="nameBand" value="<?= $nameBand ?>" required>
            <button type="submit" value="updateNameBand" name="updateNameBand">update band</button>
        </form>
        <div>
            <?php $cancelUrl = BAND_CONTROLLER . '?recordId=' . $recordId; ?>
            <a href=<?= $cancelUrl ?> >cancel</a> 
        </div>
    </body>
</html>
