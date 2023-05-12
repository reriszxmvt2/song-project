<?php
    include '../model/record-model.php';

    if (isset($_POST['nameRecordAdd'])) {
        $nameRecordAdd = $_POST['nameRecordAdd'];

        $recordModel = new RecordModel;
        $result = $recordModel->checkRecordForAdd($nameRecordAdd);

        if ($result) {
            $error = 'username already exits';
        } else {
            $recordModel->addRecord($nameRecordAdd);
            header('location: home-controller.php');
        }
    }

    include '../view/record-add.php';
