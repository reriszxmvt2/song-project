<?php
    include '../../model/base-model.php';
    include '../../model/record-model.php';

    $error = '';
    $nameRecordAdd = '';

    if (isset($_POST['nameRecordAdd'])) { //todo: fix mystery bug;
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
