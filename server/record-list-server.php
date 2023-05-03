<?php
    session_start();
    include '../model/record-list-model.php';

    $errors = [];
    $userDeleteRecord = $_POST['deleteRecord'];
    $userAddRecord = $_POST['addRecord'];
    $sendDataToUpdateRecord = $_POST['updateRecord'];
    $userUpdateRecord = $_POST['update_record'];
    $sendDataToBand = $_POST['bandList'];

    if (isset($userAddRecord)) {
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
            addRecord($nameRecordAdd);
            $_SESSION['idRecord'] = $record['id'];
            header('location: ../client/index.php');
        }

        if ($errorsListLength != 0) {
            $_SESSION['error'] = 'Name Record already exists';
            $_SESSION['nameRecordAdd'] = $nameRecordAdd;
            header('location: ../client/add-record-list-client.php');
        }
    }

    if (isset($userDeleteRecord)) {
        $rowList = unserialize($userDeleteRecord);
        $nameRecord = $rowList['name_record'];
        $idRecord = $rowList['id'];
        deleteRecord($idRecord);
        header('location: ../client/index.php');
    }

    if (isset($sendDataToUpdateRecord)) {
        $stringRowList = $_POST['updateRecord'];
        $rowList = unserialize($stringRowList);
        $nameRecord = $rowList['name_record'];
        $idRecord = $rowList['id'];

        if ($nameRecord) {
            $_SESSION['nameRecord'] = $nameRecord;
            $_SESSION['idRecord'] = $idRecord;
            header('location: ../client/update-record-list-client.php');
        }
    }

    if (isset($userUpdateRecord)) {
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
            updateRecord($nameRecordUpdated, $idRecord);
            header('location: ../client/index.php');
        }

        if ($errorsListLength != 0) {
            $_SESSION['error'] = $errors[0];
            $_SESSION['nameRecord'] = $nameRecordUpdated;
            header('location: ../client/update-record-list-client.php');
        }
    }

    if (isset($sendDataToBand)) {
        $nameRecord = $_POST['bandList'];
        $recordList = unserialize($_POST['bandList']);
        $idRecord = $recordList['id'];
        $nameRecord = $recordList['name_record'];
        $_SESSION['idRecord'] = $idRecord;
        $_SESSION['nameRecord'] = $nameRecord;
        header('location: ../client/band-list-client.php');
    }