<?php
    define('BAND_CONTROLLER','../band-controller/band-controller.php');
    define('ADD_BAND_PATH','../band-controller/band-add-controller.php');
    define('UPDATE_BAND_PATH','../band-controller/band-update-controller.php');
    define('RECORD_CONTROLLER','../record-controller/home-controller.php');
    define('ALBUM_CONTROLLER','../album-controller/album-controller.php');
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
                $backUrl = RECORD_CONTROLLER; 
            ?>
            <a href="<?= $backUrl; ?>"> <= back</a>
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
                                $deleteUrl = BAND_CONTROLLER . '?bandId=' . $bandId . '&recordId=' . $recordId ;
                                $updateUrl = UPDATE_BAND_PATH . '?updateBandId=' . $bandId . '&recordId=' . $recordId;
                                $albumUrl =  ALBUM_CONTROLLER . '?bandId=' . $bandId . '&recordId=' . $recordId; 
                        ?> 
                            <tr>
                                <td>
                                    <p style="text-align: center;"><?= $row['band_name'] ?></p>
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
                                    <a href="<?= $albumUrl ?>">album_list</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div>
            <?php 
                $addUrl = ADD_BAND_PATH .'?recordId=' . $recordId; 
            ?>
            <a href="<?= $addUrl ?>">add band</a>
        </div>
    </body>
</html>
