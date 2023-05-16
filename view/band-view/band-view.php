<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Band Page</title>
    </head>
    <body>
        <h1>Band</h1>
        <div>
            <?php $backUrl = '../record-controller/home-controller.php'; ?>
            <a href="<?php echo $backUrl; ?>"> <= back</a>
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
                        <?php foreach ($results as $row) : 
                            // $bandId = $row['id'];
                            // $deleteUrl = '../band-controller/band-controller.php?deleteBandId=' . $bandId;
                            // $updateUrl = '../band-controller/record-band-controller.php?updateBandId=' . $bandId;
                            // $albumUrl = '../album-controller/album-controller.php?bandId=' . $bandId;
                        ?> 
                            <tr>
                                <td>
                                    <p style="text-align: center;"><?php echo $row['name_band']; ?></p>
                                </td>
                                <td>
                                    <p style="text-align: center;"><?php echo $row['total_album']; ?></p>
                                </td>
                                <td>
                                    <a href="<?php ?>">delete</a>
                                    &nbsp;
                                </td>
                                <td>
                                    <a href="<?php ?>">update</a>
                                    &nbsp;
                                </td>
                                <td>
                                    <a href="<?php ?>">album_list</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
        <div>
            <?php $addUrl = ''; ?>
            <a href="<?php echo $addUrl; ?>">add</a>
        </div>
    </body>
</html>
