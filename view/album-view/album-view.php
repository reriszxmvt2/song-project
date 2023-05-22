<?php
    define('ALBUM_CONTROLLER','../album-controller/album-controller.php');
    define('ADD_ALBUM_PATH','../album-controller/album-add-controller.php');
    define('UPDATE_ALBUM_PATH','../album-controller/album-update-controller.php');
    define('BANDCONTROLLER','../band-controller/band-controller.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Album Page</title>
    </head>
    <body>
        <h1>
            <?php ?> Album Page
        </h1>
        <div>
            <?php $backUrl = BANDCONTROLLER . '?recordId=' . $recordId; ?>
            <a href="<?= $backUrl ?>"> <= back</a>
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
                            <th>name_album</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($results as $row) {
                                $albumId = $row['id'];
                                $deleteUrl = ALBUM_CONTROLLER . '?bandId=' . $bandId . '&recordId=' . $recordId . '&albumId=' . $albumId;
                                $updateUrl = UPDATE_ALBUM_PATH . '?bandId=' . $bandId . '&recordId=' . $recordId . '&albumId=' . $albumId;
                        ?> 
                            <tr>
                                <td>
                                    <p style="text-align: center;"><?= $row['album_name'] ?></p>
                                </td>
                                <td>
                                    <a href="<?= $deleteUrl ?>">delete</a>
                                    &nbsp;
                                </td>
                                <td>
                                    <a href="<?= $updateUrl ?>">update</a>
                                    &nbsp;
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div>
            <?php $addUrl = ADD_ALBUM_PATH . '?recordId=' . $recordId . '&bandId=' . $bandId; ?>
            <a href="<?= $addUrl ?>">add album</a>
        </div>
    </body>
</html>
