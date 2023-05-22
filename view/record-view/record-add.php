<?php
    define('RECORD_CONTROLLER','../record-controller/home-controller.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Record.</title>
    </head>
    <body>
        <h1>Add Record</h1>
        <div>
            <p>
                <?= $error ?>
            </p>
        </div>
        <div>
            <form method="post">
                <div>
                    <label> Record_Name : </label>
                    <input type="text" name="nameRecordAdd" value="<?= $nameRecordAdd ?>" required>
                </div>
                <button type="submit" value="userAddRecord" name="userAddRecord">add record</button>
            </form>
            <?php $cancelUrl = RECORD_CONTROLLER ?>
            <a href=<?= $cancelUrl ?> >cancel</a> 
        </div>
    </body>
</html>
