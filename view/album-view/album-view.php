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
            <?php $backToBandUrl = generateBacktoBandUrl($recordId) ?>
            <a href="<?php echo $backToBandUrl; ?>"> <= back</a>
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
                                $deleteAlbumUrl = generateDeleteAlbumUrl($bandId, $recordId, $albumId);
                                $updateAlbumUrl = generateUpdateAlbumUrl($bandId, $recordId, $albumId);
                        ?> 
                            <tr>
                                <td>
                                    <p style="text-align: center;"><?php echo $row['name_album']; ?></p>
                                </td>
                                <td>
                                    <a href="<?php echo $deleteAlbumUrl; ?>">delete</a>
                                    &nbsp;
                                </td>
                                <td>
                                    <a href="<?php echo $updateAlbumUrl; ?>">update</a>
                                    &nbsp;
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div>
            <?php $addAlbumUrl = generateAddAlbumUrl($recordId, $bandId) ?>
            <a href="<?php echo $addAlbumUrl; ?>">add album</a>
        </div>
    </body>
</html>
