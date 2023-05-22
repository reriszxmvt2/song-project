<?php
    define('RECORD_CONTROLLER','../record-controller/home-controller.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Record</title>
    </head>
    <body>
        <h1>Update Record</h1>
        <form method="post">
            <div>
                <p>
                    <?= $error ?>
                </p>
            </div>
            <div>
                <label> Record_Name : </label>
                <input type="text" name="userUpdateRecordName" value="<?= $updateRecordName ?>" required>
            </div>
            <button type="submit" name="userUpdateRecord" value="userUpdateRecord">update record</button>
        </form>
        <?php $cancelUrl = RECORD_CONTROLLER ?>
        <a href= <?= $cancelUrl ?> >cancel</a>
    </body>
</html>
