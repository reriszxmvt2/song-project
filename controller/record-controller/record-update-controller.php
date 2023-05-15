<?php
    include '../../model/record-model.php';

    $updateRecordName = $_GET['updateRecordName'];
    $updateRecordId = $_GET['updateRecordId'];
    $error = '';

    if (isset($_POST['userUpdateRecord'])) { //todo: fix mystery bug;
      $updateRecordName = $_POST['userUpdateRecordName'];

      $recordModel = new RecordModel();
      $result = $recordModel->getByName($updateRecordName);
      $recordIdInDb = $result['id'];

      if ($result && $updateRecordId != $recordIdInDb) {
        $error = 'Record Name Already Exist.';
      } else {
        $recordModel->update($updateRecordName, $updateRecordId);
        header('location: ../record-controller/home-controller.php');
      }
    }

    include '../../view/record-update.php';
