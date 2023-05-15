<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>Home Page</h1>
        <div>
            <p>Hello!! :
                <?php echo $_SESSION['username']; ?>
            </p>
        </div>
        <form method="post">
            <button name="logout" value="logout" type="submit"> Logout </button>
        </form>
        <div>
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
                                    <a href="../record-controller/home-controller.php?deleteRecordId=<?php echo $row['id']; ?>"> delete</a>
                                    &nbsp
                                </td>
                                <td>
                                    <a href="../record-controller/record-update-controller.php?updateRecordId=<?php echo $row['id']; ?>&updateRecordName=<?php echo $row['name_record']; ?>">update</a>
                                    &nbsp
                                </td>
                                <td>
                                    <a href="">band_list</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <br />
        <div>
            <a href="../record-controller/record-add-controller.php">add</a>   
        </div>
    </body>
</html>
