<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('location: ./sign-in-client.php');
    }

    print_r($_SESSION);
    
    $nameRecord = $_SESSION['nameRecord'];
    $idRecord = $_SESSION['idRecord'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Band Page</title>
</head>

<body>
    <h1>
        <?php echo $_SESSION['nameRecord']; ?> Band Page
    </h1>
    <div><a href="./index.php"> <- back </a></div><br>
    
    <form action="../server/band-list-server.php" method="post" >
        <?php
            include('../server/connect-db.php');
            $sql = "SELECT * FROM `band_list` WHERE id_record ={$_SESSION['idRecord']}";
            $query = mysqli_query($connect, $sql);
            $rowHead = mysqli_num_rows($query);
            
            if ($query) {
                if ($rowHead > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>band_name</th>";
                    echo "<th>album_number</th>";
                    echo "<th>delete_band</th>";
                    echo "<th>update_band</th>";
                    echo "<th>album_list</th>";
                    echo "<tr>";

                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<td style='text-align: center;'>" . $row['name_band'] . "</td>";

                        $sql = "SELECT * FROM `album_list` WHERE id_band = {$row['id']}";
                        $query2 = mysqli_query($connect, $sql);
                        $resultAlibum = mysqli_fetch_all($query2);

                        echo "<td style='text-align: center;'>" . count($resultAlibum). "</td>";
                        echo "<td><button type='submit' name='delete_band' value=" . serialize($row) . " style='background: red;' > delete band </button></td>";
                        echo "<td><button type='submit' name='update_band_data' value=". serialize($row) ." style='background: yellow;' > update band </button></td>";
                        echo "<td><button type='submit' name='toAlbumPage' value=". serialize($row) ." style='background: skyblue;' > album list </button></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    mysqli_free_result($result);
                }
            }
        ?>
    </form>
    <br>
    <div>
        <form action="add-band-list-client.php" method="post">
            <input type="hidden" name="idRecord" value="<?php echo $_SESSION['idRecord']  ?>">
            <button value="<?php echo $_SESSION['nameRecord']; ?>" style="background : lightgreen;"> add band
            </button>
        </form>    
    </div>
</body>

</html>