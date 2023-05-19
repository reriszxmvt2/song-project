<?php include '../../view/path.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Band Page</title>
    </head>
    <body>
        <h1>Band</h1>
        <div>
            <?php 
                $backUrl = $recordControllerPath; 
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
                                $deleteUrl = $bandControllerPath . '?bandId=' . $bandId . '&recordId=' . $recordId ;
                                $updateUrl =  $bandUpdatePath . '?updateBandId=' . $bandId . '&recordId=' . $recordId;
                                $albumUrl =  $albumControllerPath . '?bandId=' . $bandId . '&recordId=' . $recordId; 
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
                $addUrl = $bandAppPath .'?recordId=' . $recordId; 
            ?>
            <a href="<?php echo $addUrl; ?>">add band</a>
        </div>
    </body>
</html>
