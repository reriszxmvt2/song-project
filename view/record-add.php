<!DOCTYPE html>
<html>
    <head>
        <title>Add Record.</title>
    </head>
    <body>
        <h1>Add Record</h1>
        <div>
            <p>
                <?php echo $error; ?>
            </p>
        </div>
        <div>
            <form method="post">
                <div>
                    <label> name_record : </label>
                    <input type="text" name="nameRecordAdd" value="<?php echo $nameRecordAdd ?>" required>
                </div>
                <button type="submit" value="userAddRecord" name="userAddRecord">add record</button>
            </form>
            <a href="../../controller/home-controller.php">cancel</a>
        </div>
    </body>
</html>
