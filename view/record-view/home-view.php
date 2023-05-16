<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>Home Page</h1>
        <div>
            <p>Hello!! : <?php echo $_SESSION['username']; ?></p>
        </div>
        <form method="post">
            <button name="logout" value="logout" type="submit">Logout</button>
        </form>
        <?php if ($results) : ?>
            <table>
                <thead>
                    <tr>
                        <th>name_record</th>
                        <th>total_band</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $row) : 
                        $recordId = $row['id'];
                        $deleteUrl = '../record-controller/home-controller.php?deleteRecordId=' . $recordId;
                        $updateUrl = '../record-controller/record-update-controller.php?updateRecordId=' . $recordId;
                        $bandUrl = '../band-controller/band-controller.php?recordId=' . $recordId;
                    ?> 
                        <tr>
                            <td>
                                <p style="text-align: center;"><?php echo $row['name_record']; ?></p>
                            </td>
                            <td>
                                <p style="text-align: center;"><?php echo $row['total_band']; ?></p>
                            </td>
                            <td>
                                <a href="<?php echo $deleteUrl; ?>">delete</a>
                                &nbsp;
                            </td>
                            <td>
                                <a href="<?php echo $updateUrl; ?>">update</a>
                                &nbsp;
                            </td>
                            <td>
                                <a href="<?php echo $bandUrl; ?>">band_list</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <br>
        <div>
            <?php $addUrl = "../record-controller/record-add-controller.php"; ?>
            <a href="<?php echo $addUrl; ?>">add</a>
        </div>
    </body>
</html>
