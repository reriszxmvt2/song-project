<?php
    include '../../model/record-model.php';
    //todo: ส่งแค่ id. ทำแล้วครับผม (^ v ^)/
    $error = '';
    $updateRecordId = isset($_GET['updateRecordId']) ? $_GET['updateRecordId'] : '';

    $recordModel = new RecordModel();
    $result = $recordModel->getNameById($updateRecordId);
    $updateRecordName = $result['name_record'];

    if (isset($_POST['userUpdateRecord'])) { //todo: fix mystery bug;
        $updateRecordName = $_POST['userUpdateRecordName'];

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
