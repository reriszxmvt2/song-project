<?php
    session_start();
    include('./connect-db.php');
    $errors = [];
    $userDeleteRecord = $_POST['deleteRecord'];
    $userAddRecord = $_POST['addRecord'];
    $sendDataToUpdateRecord = $_POST['updateRecord'];
    $userUpdateRecord = $_POST['update_record'];
    $sendDataToBand = $_POST['bandList'];

    function fetchRecordList($nameRecord)
    {
        include('./connect-db.php');
        $sql = "SELECT * FROM `record_list` WHERE name_record = '$nameRecord'";
        $query = mysqli_query($connect, $sql);
        $record = mysqli_fetch_assoc($query);

        return $record;
    }

    if (isset($userAddRecord)):
        $nameRecordAdd = $_POST['name_record'];
        $record = fetchRecordList($nameRecordAdd);

        if ($record) {
            $nameRecordInDb = $record['name_record'];

            if ($nameRecordAdd == $nameRecordInDb) {
                array_push($errors, 1);
            }
        }

        $errorsListLength = count($errors);

        if ($errorsListLength == 0) {
            $addData = "INSERT INTO `record_list`(`name_record`)  VALUES ('$nameRecordAdd')";
            $_SESSION['idRecord'] = $record['id'];
            mysqli_query($connect, $addData);
            header('location: ../client/index.php');
        }

        if ($errorsListLength != 0) {
            $_SESSION['error'] = 'Name Record already exists';
            $_SESSION['nameRecordAdd'] = $nameRecordAdd;
            header('location: ../client/add-record-list-client.php');
        }
    endif;

    if (isset($userDeleteRecord)):
        $rowList = unserialize($userDeleteRecord);
        $nameRecord = $rowList['name_record'];
        $idRecord = $rowList['id'];
        // $sql = "DELETE FROM `record_list` WHERE name_record = '$nameRecord'";
        $sql = "DELETE record_list.*, band_list.*, album_list.*, song_list.* 
            FROM record_list 
            LEFT JOIN band_list 
            ON `record_list`.id = `band_list`.id_record 
            LEFT JOIN album_list 
            ON `band_list`.id = `album_list`.id_band 
            LEFT JOIN song_list
            on `album_list`.id = `song_list`.id_album
            WHERE `record_list`.id = $idRecord";
        $query = mysqli_query($connect, $sql);
        header('location: ../client/index.php');
    endif;

    if (isset($sendDataToUpdateRecord)):
        $stringRowList = $_POST['updateRecord'];
        $rowList = unserialize($stringRowList);
        $nameRecord = $rowList['name_record'];
        $idRecord = $rowList['id'];

        if ($nameRecord) {
            $_SESSION['nameRecord'] = $nameRecord;
            $_SESSION['idRecord'] = $idRecord;
            header('location: ../client/update-record-list-client.php');
        }
    endif;

    if (isset($userUpdateRecord)):
        $nameRecordUpdated = $_POST['name_record'];
        $idRecord = $_POST['update_record'];
        $record = fetchRecordList($nameRecordUpdated);

        if ($record) {
            $nameRecordInDb = $record['name_record'];
            $idRecordInDb = $record['id'];

            if ($nameRecordUpdated === $nameRecordInDb && $idRecord !== $idRecordInDb) {
                array_push($errors, 'nameRecord already exists');
            }
        }

        $errorsListLength = count($errors);

        if ($errorsListLength == 0) {
            $sql = "UPDATE record_list SET name_record = '$nameRecordUpdated' WHERE id = '$idRecord'";
            $query = mysqli_query($connect, $sql);
            header('location: ../client/index.php');
        }

        if ($errorsListLength != 0) {
            $_SESSION['error'] = $errors[0];
            $_SESSION['nameRecord'] = $nameRecordUpdated;
            header('location: ../client/update-record-list-client.php');
        }
    endif;

    if (isset($sendDataToBand)):
        $nameRecord = $_POST['bandList'];
        $recordList = unserialize($_POST['bandList']);
        $idRecord = $recordList['id'];
        $nameRecord = $recordList['name_record'];
        $_SESSION['idRecord'] = $idRecord;
        $_SESSION['nameRecord'] = $nameRecord;
        header('location: ../client/band-list-client.php');
    endif;