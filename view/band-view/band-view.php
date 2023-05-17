<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Band Page</title>
    </head>
    <body>
        <h1>Band</h1>
        <div>
            <?php $backtoRecordUrl = generateBackToRecordUrl() ?>
            <a href="<?php echo $backtoRecordUrl; ?>"> <= back</a>
        </div>
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
                                $deleteBandUrl = generateDeleteBandUrl($bandId, $recordId);
                                $updateBandUrl = generateUpdateBandUrl($bandId, $recordId);
                                $albumListUrl = generateAlbumUrl($bandId, $recordId);
                        ?> 
                            <tr>
                                <td>
                                    <p style="text-align: center;"><?php echo $row['name_band']; ?></p>
                                </td>
                                <td>
                                    <p style="text-align: center;"><?php echo $row['total_album']; ?></p>
                                </td>
                                <td>
                                    <a href="<?php echo $deleteBandUrl; ?>">delete</a>
                                    &nbsp;
                                </td>
                                <td>
                                    <a href="<?php echo $updateBandUrl; ?>">update</a>
                                    &nbsp;
                                </td>
                                <td>
                                    <a href="<?php echo $albumListUrl; ?>">album_list</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div>
            <?php $addBandUrl = generateAddBandUrl($recordId) ?>
            <a href="<?php echo $addBandUrl; ?>">add band</a>
        </div>
    </body>
</html>
