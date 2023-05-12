<?php
    include '../../model/record-model.php';

    $error = '';
    $nameRecordAdd = '';

    if (isset($_POST['nameRecordAdd'])) { //todo: fix mystery bug;
        $nameRecordAdd = $_POST['nameRecordAdd'];

        $recordModel = new RecordModel();
        $result = $recordModel->getRecordByName($nameRecordAdd);

        if ($result) {
            $error = 'username already exits';
        } else {
            $recordModel->addRecord($nameRecordAdd);
            header('location: ../home-controller.php');
        }
    }

    include '../../view/record-add.php';
