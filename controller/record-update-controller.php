<?php
    include '../model/record-model.php';

    $nameRecordUpdate = $_GET['nameRecordUpdate'];
    $idRecordUpdate = $_GET['idRecordUpdate'];

    if (isset($_POST['userUpdateRecord'])) {
        $nameRecordUpdate = $_POST['userNameRecordUpdate'];
        $idRecordUpdate = $_POST['idRecordUpdate'];

        $recordModel = new RecordModel;
        $result = $recordModel->checkRecordForUpdate($nameRecordUpdate, $idRecordUpdate);
        
        if ($result) {
          $error = 'Record Name Already Exist.';
        } else {
          $recordModel->updateRecord($nameRecordUpdate, $idRecordUpdate);
          header('location: index.php');
        }
    }

    include '../view/record-update.php';
