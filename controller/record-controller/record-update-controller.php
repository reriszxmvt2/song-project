<?php
    include '../../model/record-model.php';

    $updateRecordName = $_GET['updateRecordName'];
    $updateRecordId = $_GET['updateRecordId'];
    $error = '';

    echo $updateRecordName;
    echo "\n";
    echo $updateRecordId;

    if (isset($_POST['userUpdateRecord'])) { //todo: fix mystery bug;
      $updateNameRecord = $_POST['userUpdateRecordName'];

      $recordModel = new RecordModel();
      $result = $recordModel->getRecordForUpdate($updateNameRecord, $updateRecordId);

      if ($result) {
        $error = 'Record Name Already Exist.';
      } else {
        $recordModel->updateRecord($updateNameRecord, $updateRecordId);
        header('location: ../home-controller.php');
      }
    }

    include '../../view/record-update.php';
