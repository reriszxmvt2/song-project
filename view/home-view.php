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
                    <?php foreach ($results as $row) : ?>
                        <tr>
                            <td>
                                <p style="text-align: center;"><?php echo $row['name_record']; ?></p>
                            </td>
                            <td>
                                <p style="text-align: center;"><?php echo $row['total_band']; ?></p>
                            </td>
                            <td>
                                <?php 
                                    $deleteRecordId = $row['id'];
                                    $deleteUrl = '../record-controller/home-controller.php?deleteRecordId=' . $deleteRecordId; 
                                ?>
                                <a href="<?php echo $deleteUrl; ?>">delete</a>
                                &nbsp;
                            </td>
                            <td>
                                <?php 
                                    $updateRecordId = $row['id'];
                                    $updateRecordName = $row['name_record'];
                                    $updateUrl = '../record-controller/record-update-controller.php?updateRecordId=' . $updateRecordId . '&updateRecordName=' . $updateRecordName; 
                                ?>
                                <a href="<?php echo $updateUrl; ?>">update</a>
                                &nbsp;
                            </td>
                            <td>
                                <a href="">band_list</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <br>
        <div>
            <a href="<?php echo $addUrl; ?>">add</a>
        </div>
    </body>
</html>
