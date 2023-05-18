<?php
    include '../check-login.php';
    include '../../model/record-model.php';

    $error = '';
    $nameRecordAdd = '';

    if (isset($_POST['nameRecordAdd'])) {
        $nameRecordAdd = $_POST['nameRecordAdd'];

        $recordModel = new RecordModel();
        $result = $recordModel->getByName($nameRecordAdd);

        if ($result) {
            $error = 'username already exits';
        } else {
            $recordModel->add($nameRecordAdd);
            header('location:' . $recordControllerPath);
            exit();
        }
    }

    include '../../view/record-view/record-add.php';
