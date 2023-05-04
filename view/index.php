<?php
    session_start();
    include '../model/connect-db.php';

    if (!isset($_SESSION['username'])) {
        header('location: ./sign-in-client.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        header('location: ./sign-in-client.php');
    }

    $idRecord = $_SESSION['idRecord'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>

<body>

    <h1>Home Page</h1>
    <div>
        <?php if (isset($_SESSION['signUpSuccess'])): ?>
            <p style="color :green;">
                <?php echo $_SESSION['signUpSuccess']; ?>
            </p>
            <?php unset($_SESSION['signUpSuccess']); ?>
        <?php endif; ?>
    </div>
    <div>
        <?php if (isset($_SESSION['username'])): ?>
            <p>Hello!! :
                <?php echo $_SESSION['username']; ?>
            </p>
            <p><a href="index.php?logout='1'"> Logout </a></p>
        <?php endif ?>
    </div>

    <div>
        <form action="../server/record-list-server.php" method="post">
            <div>
                <?php
                $record = new RecordList();
                $result = $record->showRecordList();
                $rowInDb = $result->fetchAll();

                if ($result) {
                    echo '<table>';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>name_record</th>';
                    echo '<th>band_number</th>';
                    echo '<th>delete</th>';
                    echo '<th>update</th>';
                    echo '<th>band_list</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    foreach ($rowInDb as $row) {
                        echo '<tr>';
                        echo "<td style='text-align: center;'>" . $row['name_record'] . "</td>";
                        $sql = 'SELECT * FROM `band_list` WHERE id_record = ' . $row['id'] . '';
                        $resultBand = $connect->query($sql)->fetchAll();
                        echo "<td style='text-align: center;'>" . count($resultBand) . "</td>";
                        echo "<td>" . "<button type='submit' value=" . serialize($row) . " name='deleteRecord' style='background : crimson;'>delete record</button>" . "</td>";
                        echo "<td>" . "<button type='submit' value=" . serialize($row) . " name='updateRecord' style='background : yellow;'>update record</button>" . "</td>";
                        echo "<td>" . "<button type='submit' value=" . serialize($row) . " name='bandList' style='background : skyblue;'>band list</button>" . "</td>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                }
                ?>
            </div>
        </form>
        <br>
        <div>
            <div>
                <button onclick="location.href ='add-record-list-client.php'" style="background : lightgreen;"> add
                    record
                </button>
            </div>
        </div>
    </div>

</body>

</html>