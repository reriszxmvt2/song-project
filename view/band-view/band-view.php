<?php
    define('BANDCONTROLLER','../band-controller/');
    define('BANDPATH',[
        'controller' => 'band-controller.php',
        'add' => 'band-add-controller.php',
        'update' => 'band-update-controller.php',
    ]);

    define('RECORDCONTROLLER','../record-controller/home-controller.php');
    define('ALBUMCONTROLLER','../album-controller/album-controller.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Band Page</title>
    </head>
    <body>
        <h1>Band</h1>
        <div>
            <?php 
                $backUrl = RECORDCONTROLLER; 
            ?>
            <a href="<?php echo $backUrl; ?>"> <= back</a>
        </div>
        <br />
        <form method="post">
            <button name="logout" value="logout" type="submit">Sign out</button>
        </form>
        <br />
        <div>
            <?php if ($results) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>name_band</th>
                            <th>total_album</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($results as $row) {
                                $bandId = $row['id'];
                                $deleteUrl = BANDCONTROLLER . BANDPATH['controller'] . '?bandId=' . $bandId . '&recordId=' . $recordId ;
                                $updateUrl =  BANDCONTROLLER . BANDPATH['update'] . '?updateBandId=' . $bandId . '&recordId=' . $recordId;
                                $albumUrl =  ALBUMCONTROLLER . '?bandId=' . $bandId . '&recordId=' . $recordId; 
                        ?> 
                            <tr>
                                <td>
                                    <p style="text-align: center;"><?php echo $row['name_band']; ?></p>
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
                                    <a href="<?php echo $albumUrl; ?>">album_list</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div>
            <?php 
                $addUrl = BANDCONTROLLER . BANDPATH['add'] .'?recordId=' . $recordId; 
            ?>
            <a href="<?php echo $addUrl; ?>">add band</a>
        </div>
    </body>
</html>
