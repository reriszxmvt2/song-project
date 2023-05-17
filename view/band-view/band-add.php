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
                    <?php echo $error; ?>
                </p>
            </div>
            <div>
                <form method="post">
                    <div>
                        <label> name_band : </label>
                        <input type="text" name="addBandName" value="<?php echo $addBandName ?>" required>
                    </div>
                    <button type="submit" value="userAddBand" name="userAddBand">add band</button>
                </form>
            </div>
            <br />
            <div>
                <?php $cancelUrl = '../band-controller/band-controller.php?recordId=' . $recordId; ?>
                <a href=<?php echo $cancelUrl ?> >cancel</a> 
            </div>
        </div>
    </body>
</html>
