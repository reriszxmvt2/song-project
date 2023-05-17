<?php
    session_start();
    include '../../model/record-model.php';
    include '../login-status.php';

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
            header('location: ../record-controller/home-controller.php');
            exit();
        }
    }

    include '../../view/record-view/record-add.php';
