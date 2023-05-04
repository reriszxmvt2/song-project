<?php
    include '../server/connect-db.php';
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location: ./sign-in-client.php');
    }

    $idBand = $_SESSION['id'];
    $nameBand =  $_SESSION['name_band'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Page</title>
</head>

<body>
    <h1>
        <?php echo $_SESSION['name_band'] ?> Album Page
    </h1>
    <div><a href="./band-list-client.php"> <- back </a></div>
    <br>
    <form action="../server/album-list-server.php" method="post">
        <?php
            $sql = "SELECT * FROM `album_list` WHERE id_band = $idBand ";
            // $query = mysqli_query($connect, $sql);
            // $rowHead = mysqli_num_rows($query);
            $query = $connect->query($sql);
            $rowHead = $query->fetchAll();
            $rowHeadLength = count($rowHead);

            if ($query) {
                if ($rowHeadLength  > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>album_name</th>";
                    echo "<th>delete_album</th>";
                    echo "<th>update_album</th>";
                    echo "<tr>";

                    foreach ($rowHead as $row) {
                        echo "<tr>";
                        echo "<td style='text-align: center;'>" . $row['name_album'] . "</td>";
                        echo "<td><button type='submit' name='delete_album' value=" . serialize($row) . " style='background: crimson'> delete album </button></td>";
                        echo "<td><button type='submit' name='update_album_data' value=" . serialize($row) . " style='background: yellow;'> update album </button></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_free_result($result);
                }
            }
            mysqli_close($connect);
        ?>
    </form>
    <br>
    <div>
        <form action="./add-album-list-client.php" method="post">
            <button value="<?php echo $idBand ?>" style="background : lightgreen;"> add album
            </button>
        </form>
    </div>
</body>

</html>