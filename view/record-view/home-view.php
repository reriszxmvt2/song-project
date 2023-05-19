<?php 
    define('RECORDCONTROLLER','../record-controller/');
    define('RECORDPATH',[
        'controller' => 'home-controller.php',
        'add' => 'record-add-controller.php',
        'update' => 'record-update-controller.php',
    ]);

    define('BANDCONTROLLER','../band-controller/band-controller.php');
?>
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
                            $deleteUrl = RECORDCONTROLLER . RECORDPATH['controller'] . '?deleteRecordId=' . $recordId;
                            $updateUrl = RECORDCONTROLLER . RECORDPATH['update'] . '?updateRecordId=' . $recordId;
                            $bandUrl = BANDCONTROLLER . '?recordId=' . $recordId;
                    ?> 
                        <tr>
                            <td> <!--review short tag -->
                                <p style="text-align: center;"><?php echo $row['name_record']; ?></p>
                            </td>
                            <td>
                                <p style="text-align: center;"><?php echo $row['total_band']; ?></p>
                            </td>
                            <td>
                                <p style="text-align: center;"><?php echo $row['total_album']; ?></p>
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
                    <?php } ?>
                </tbody>
            </table>
        <?php endif; ?>
        <br>
        <div>
            <?php
                $addUrl = RECORDCONTROLLER . RECORDPATH['add'];
            ?>
            <a href="<?php echo $addUrl; ?>">add record</a>
        </div>
    </body>
</html>
