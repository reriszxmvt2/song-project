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
            <button name="logout" value="logout" type="submit">Logout</button>
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
                        foreach ($results as $row) {  //todo: refactor.
                            $recordId = $row['id'];
                            $deleteRecordUrl = generateDeleteRecordUrl($recordId);
                            $updateRecordUrl = generateUpdateRecordUrl($recordId);
                            $bandListUrl = generateBandListUrl($recordId);
                    ?> 
                        <tr>
                            <td>
                                <p style="text-align: center;"><?php echo $row['name_record']; ?></p>
                            </td>
                            <td>
                                <p style="text-align: center;"><?php echo $row['total_band']; ?></p>
                            </td>
                            <td>
                                <p style="text-align: center;"><?php echo $row['total_album']; ?></p>
                            </td>
                            <td>
                                <a href="<?php echo $deleteRecordUrl; ?>">delete</a>
                                &nbsp;
                            </td>
                            <td>
                                <a href="<?php echo $updateRecordUrl; ?>">update</a>
                                &nbsp;
                            </td>
                            <td>
                                <a href="<?php echo $bandListUrl; ?>">band_list</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php endif; ?>
        <br>
        <div>
            <?php $addRecordUrl = generateAddRecordUrl() ?>
            <a href="<?php echo $addRecordUrl; ?>">add record</a>
        </div>
    </body>
</html>
