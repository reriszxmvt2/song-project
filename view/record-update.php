<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <input type="text" name="userNameRecordUpdate" value="<?php echo $nameRecordUpdate; ?>" required>
        </div>
        <button type="submit" name="userUpdateRecord" value="userUpdateRecord">update record</button>
    </form>
    <br>
    <a href="../controller/home-controller.php">cancel</a>
</body>

</html>
