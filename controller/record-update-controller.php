<?php
    include '../model/record-model.php';

    $nameRecordUpdate = $_GET['nameRecordUpdate'];
    $idRecordUpdate = $_GET['idRecordUpdate'];
    $error = '';

    if (isset($_POST['userUpdateRecord'])) { //todo: fix mystery bug;
      $nameRecordUpdate = $_POST['userNameRecordUpdate'];

      $recordModel = new RecordModel();
      $result = $recordModel->getRecordForUpdate($nameRecordUpdate, $idRecordUpdate);

      if ($result) {
        $error = 'Record Name Already Exist.';
      } else {
        $recordModel->updateRecord($nameRecordUpdate, $idRecordUpdate);
        header('location: ./home-controller.php');
      }
    }

    include '../view/record-update.php';
