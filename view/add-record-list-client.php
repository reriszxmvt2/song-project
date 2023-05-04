<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        header('location: ./sign-in-client.php');
    }

    if (!isset($_SESSION['nameRecordAdd'])) {
        $_SESSION['nameRecordAdd'] = '';
    }
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
            <?php echo $_SESSION['error']; ?>
        </p>
        <?php unset($_SESSION['error']); ?>
    </div>
    <div>
        <form action="../server/record-list-server.php" method="post">
            <div>
                <label for="name_record"> name_record : </label>
                <input type="text" name="name_record" value="<?php echo $_SESSION['nameRecordAdd'];
                unset($_SESSION['nameRecordAdd']); ?>" required>
            </div>
            <button type="submit" value="addRecord" name="addRecord">add record</button>
        </form>
        <a href="./index.php">cancel</a>
    </div>
</body>

</html>