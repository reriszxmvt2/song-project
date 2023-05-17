<?php
    session_start();
    include '../../model/record-model.php';

    if (empty($_SESSION['username'])) {
        header('location: ../../controller/sign-in-controller.php');
        exit();
    }

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
