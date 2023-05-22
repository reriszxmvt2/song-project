<?php
    include '../check-login.php';
    include '../../model/record-model.php';

    $error = '';
    $updateRecordId = isset($_GET['updateRecordId']) ? $_GET['updateRecordId'] : '';

    $recordModel = new RecordModel();
    $result = $recordModel->getNameById($updateRecordId);
    $updateRecordName = $result['record_name'];

    if (isset($_POST['userUpdateRecord'])) {
        $updateRecordName = $_POST['userUpdateRecordName'];

        $result = $recordModel->getByName($updateRecordName);
        $recordIdInDb = $result['id'];

        if ($result && $updateRecordId != $recordIdInDb) {
            $error = 'Record Name Already Exist.';
        } else {
          $recordModel->update($updateRecordName, $updateRecordId);
          header('location: ../record-controller/home-controller.php');
          exit();
        }
    }

    include '../../view/record-view/record-update.php';
