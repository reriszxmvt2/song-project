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
                                <th>band_length</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $row) : ?> <!-- refactor -->
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
                                        <form method="post">
                                            <input type="hidden" name="deleteNameRecord" value="<?php echo $row['name_record']; ?>">
                                            <button type="submit" name="deleteRecord" 
                                                    value="deleteRecord" style="background : crimson;">delete record</button>
                                        </form>
                                    </td>
                                    <td><!-- refactor for gorgeous / ไม่ต้องใช้ onclick -->
                                        <button style="background : yellow;" onclick="goToUpdateRecordController()" type="button">update record</button>
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
        <br />
        <div>
            <button onclick="location.href='../controller/record-controller/record-add-controller.php'" 
                    type="submit" style="background : lightgreen;"> add record </button>
        </div>
    </body>
</html>
<script>
    function goToUpdateRecordController() {
        location.href='../controller/record-controller/record-update-controller.php?updateRecordId=<?php echo $row['id']; ?>&updateRecordName=<?php echo $row['name_record']; ?>'
    }
</script>
