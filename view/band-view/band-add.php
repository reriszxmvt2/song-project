<?php
    define('BAND_CONTROLLER','../band-controller/band-controller.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Band</title>
    </head>
    <body>
        <h1>Add Band</h1>
        <div>
            <div>
                <p>
                    <?= $error ?>
                </p>
            </div>
            <div>
                <form method="post">
                    <div>
                        <label> name_band : </label>
                        <input type="text" name="addBandName" value="<?= $addBandName ?>" required>
                    </div>
                    <button type="submit" value="userAddBand" name="userAddBand">add band</button>
                </form>
            </div>
            <br />
            <div>
                <?php $cancelUrl = BAND_CONTROLLER . '?recordId=' . $recordId; ?>
                <a href=<?= $cancelUrl ?> >cancel</a> 
            </div>
        </div>
    </body>
</html>
