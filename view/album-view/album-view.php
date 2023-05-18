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
            <?php $backUrl = '../band-controller/band-controller.php?recordId=' . $recordId; ?>
            <a href="<?php echo $backUrl; ?>"> <= back</a>
        </div>
        <br>
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
                                $deleteUrl = '../album-controller/album-controller.php?bandId=' . $bandId . '&recordId=' . $recordId . '&albumId=' . $albumId;
                                $updateUrl = '../album-controller/album-update-controller.php?bandId=' . $bandId . '&recordId=' . $recordId . '&albumId=' . $albumId;
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
            <?php $addUrl = '../album-controller/album-add-controller.php?recordId=' . $recordId . '&bandId=' . $bandId; ?>
            <a href="<?php echo $addUrl; ?>">add</a>
        </div>
    </body>
</html>
