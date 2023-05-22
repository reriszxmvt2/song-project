<?php
    define('RECORD_CONTROLLER', '../record-controller/home-controller.php');
    define('APP_RECORD_PATH','../record-controller/record-add-controller.php');
    define('UPDATE_RECORD_PATH','../record-controller/record-update-controller.php');
    define('BAND_CONTROLLER', '../band-controller/band-controller.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h1>Home Page</h1>
        <div>
            <p>Hello!! : <?= $_SESSION['username'] ?></p>
        </div>
        <form method="post">
            <button name="logout" value="logout" type="submit">Sign out</button>
        </form>
        <?php if ($results) : ?>
            <table>
                <thead>
                    <tr>
                        <th>
                            <p> name_record </p> 
                        </th>
                        <th>
                            <p> total_band </p>
                        </th>
                        <th>
                            <p> total_album </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($results as $row) {  
                            $recordId = $row['id'];
                            $deleteUrl = RECORD_CONTROLLER . '?deleteRecordId=' . $recordId;
                            $updateUrl = UPDATE_RECORD_PATH . '?updateRecordId=' . $recordId;
                            $bandUrl = BAND_CONTROLLER . '?recordId=' . $recordId;
                    ?> 
                        <tr>
                            <td> <!--review short tag -->
                                <p style="text-align: center;"><?= $row['record_name'] ?></p>
                            </td>
                            <td>
                                <p style="text-align: center;"><?= $row['total_band'] ?></p>
                            </td>
                            <td>
                                <p style="text-align: center;"><?= $row['total_album'] ?></p>
                            </td>
                            <td>
                                <a href="<?= $deleteUrl ?>">delete</a>
                                &nbsp;
                            </td>
                            <td>
                                <a href="<?= $updateUrl ?>">update</a>
                                &nbsp;
                            </td>
                            <td>
                                <a href="<?= $bandUrl ?>">band_list</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php endif; ?>
        <br>
        <div>
            <?php
                $addUrl = APP_RECORD_PATH;
            ?>
            <a href="<?= $addUrl ?>">add record</a>
        </div>
    </body>
</html>
