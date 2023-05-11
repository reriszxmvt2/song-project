<?php
    include '../model/record-list-model.php';

    $nameRecordUpdate = $_GET['nameRecordUpdate'];
    $idRecordUpdate = $_GET['idRecordUpdate'];
    $recordListModel = new RecordListModel;

    if (isset($_POST['userUpdateRecord'])) {
        $nameRecordUpdate = $_POST['userNameRecordUpdate'];
        $idRecordUpdate = $_POST['idRecordUpdate'];
        $result = $recordListModel->checkRecordForUpdate($nameRecordUpdate, $idRecordUpdate);
        
        if ($result) {
          $error = 'Record Name Already Exist.';
        } else {
          $recordListModel->updateRecord($nameRecordUpdate, $idRecordUpdate);
          header('location: index.php');
        }
    }

    include '../view/record-update.php';
