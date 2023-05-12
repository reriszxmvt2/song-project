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
                    <?php echo $error; ?>
                </p>
            </div>
            <div>
                <label> name_record : </label>
                <input type="text" name="userUpdateRecordName" value="<?php echo $updateRecordName; ?>" required>
            </div>
            <button type="submit" name="userUpdateRecord" value="userUpdateRecord">update record</button>
        </form>
        <a href="../../controller/home-controller.php">cancel</a>
    </body>
</html>
