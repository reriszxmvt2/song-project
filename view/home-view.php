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
            <p><a href="home-controller.php?logout='1'"> Logout </a></p>
        </div>
        <form method="post">
            <div>
                <?php if ($results['result']) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>name_record</th>
                                <th>band_length</th>
                                <th>delete</th>
                                <th>update</th>
                                <th>band_list</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results['rowInDb'] as $row) : ?> <!-- refactor -->
                                <tr>
                                    <td>
                                        <p style="text-align: center;">
                                            <?php echo $row['name_record']; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p style="text-align: center;">
                                            <?php echo $row['bandLength']; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <input type="hidden" name="idRecordDelete" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="deleteRecord" value="deleteRecord" style="background : crimson;">delete record</button>
                                    </td>
                                    <td><!-- refactor for ความสวยงาม ไม่ต้องใช้ onclick-->
                                        <button style="background : yellow;" onclick="location.href='../controller/record-update-controller.php?idRecordUpdate=<?php echo $row['id']; ?>&nameRecordUpdate=<?php echo $row['name_record']; ?>'" type="button">update record</button>
                                    </td>
                                    <td>
                                        <button style="background : skyblue;" type="submit" value="bandList" name="bandList">
                                            band slist
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </form>
        <br>
        <div>
            <button onclick="location.href='../controller/record-add-controller.php'" type="submit" style="background : lightgreen;"> add record </button>
        </div>
    </body>
</html>
