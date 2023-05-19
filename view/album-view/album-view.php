<?php
    define('ALBUMCONTROLLER','../album-controller/');
    define('ALBUMPATH',[
        'controller' => 'album-controller.php',
        'add' => 'album-add-controller.php',
        'update' => 'album-update-controller.php',
    ]);

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
                            <th>name_album</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($results as $row) {
                                $albumId = $row['id'];
                                $deleteUrl = ALBUMCONTROLLER . ALBUMPATH['controller'] . '?bandId=' . $bandId . '&recordId=' . $recordId . '&albumId=' . $albumId;
                                $updateUrl = ALBUMCONTROLLER . ALBUMPATH['update'] . '?bandId=' . $bandId . '&recordId=' . $recordId . '&albumId=' . $albumId;
                        ?> 
                            <tr>
                                <td>
                                    <p style="text-align: center;"><?php echo $row['name_album']; ?></p>
                                </td>
                                <td>
                                    <a href="<?php echo $deleteUrl; ?>">delete</a>
                                    &nbsp;
                                </td>
                                <td>
                                    <a href="<?php echo $updateUrl; ?>">update</a>
                                    &nbsp;
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div>
            <?php $addUrl = ALBUMCONTROLLER . ALBUMPATH['add'] . '?recordId=' . $recordId . '&bandId=' . $bandId; ?>
            <a href="<?php echo $addUrl; ?>">add album</a>
        </div>
    </body>
</html>
