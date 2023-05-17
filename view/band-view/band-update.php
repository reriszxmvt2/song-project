<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Band</title>
</head>
<body>
    <h1>Update Band</h1>
    <form action="../../server/band-list-server.php" method="post">
        <input type="text" name="nameBand" value="<?php echo $nameBand ?>" required>
        <button type="submit" value="<?php ?>" name="update_band">update band</button>
    </form>
    <a href="./band-list-client.php">cancel</a>
</body>

</html>