<?php include '../../view/path.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Band</title>
    </head>
    <body>
        <h1>Update Band</h1>
        <div>
            <p>
                <?php echo $error; ?>
            </p>
        </div>
        <form method="post">
            <input type="text" name="nameBand" value="<?php echo $nameBand ?>" required>
            <button type="submit" value="updateNameBand" name="updateNameBand">update band</button>
        </form>
        <div>
            <?php $cancelUrl = $bandControllerPath . '?recordId=' . $recordId; ?>
            <a href=<?php echo $cancelUrl ?> >cancel</a> 
        </div>
    </body>
</html>
